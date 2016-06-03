<?php

namespace Statistic\Model;

use Doctrine\ORM\EntityManager;
use Statistic\Entity\Division;

/**
 * Class BranchesStatisticManager
 * @package Statistic\Model
 */
class BranchesStatisticManager
{
    const SHOW_WEEKLY = 1;
    const SHOW_MONTHLY = 2;

    /**
     * Branches of The company
     * @var array
     */
    private $branches = [];

    /**
     * Statistic calculation period
     * @var int
     */
    private $calculationPeriod;

    /**
     * Number of intervals
     * @var int
     */
    private $numIntervals = 0;

    /**
     * @var EntityManager
     */
    private $em;

    /**
     * BranchesStatisticManager constructor.
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * Build hierarchy of divisions and intervals
     * @param array $divisions
     * @param $intervals
     * @throws \Exception
     */
    public function setBranchesAndIntervals($divisions, $intervals)
    {
        $this->numIntervals = count($intervals);

        $children = [];

        /** @var Division $division */
        foreach ($divisions as $division) {
            if (empty($division->getParentDivId())) {
                $this->setBranchStatistic($division, $intervals);
            } else {
                $children[] = $division;
            }
        }

        foreach ($children as $division) {
            $this->setDivisionStatistic($division, $intervals);
        }
    }


    public function setCalculationType($type)
    {
        $this->calculationPeriod = $type;
    }

    public function setMonthlyPeriod()
    {
        $this->setCalculationType(self::SHOW_MONTHLY);
    }

    public function setWeeklyPeriod()
    {
        $this->setCalculationType(self::SHOW_WEEKLY);
    }

    /**
     * Calculate each branch statistics
     */
    public function calculateBranchesStatistic()
    {
        if (empty($this->branches)) {
            throw new \Exception('No Branches!');
        }

        foreach ($this->branches as &$branch) {
            /** @var BranchIntervalStatistic $branchIntervalStatistic */
            foreach ($branch['intervals'] as &$branchIntervalStatistic) {

                $this->calculateDivisionsStatistic($branchIntervalStatistic);

                $branchIntervalStatistic->calculateTotals();
                $branchIntervalStatistic->calculatePercentage();
                //var_dump($branchIntervalStatistic);
            }
        }
        var_dump($this->branches);die();
    }

    /**
     * Calculate each statistics for divisions of Branch
     * @param BranchIntervalStatistic $branchStatistic
     */
    public function calculateDivisionsStatistic(&$branchStatistic)
    {
        $ids = $branchStatistic->getDivisionsIds();

        if (!$ids) {
            return; // todo unset?
        }

        $statistics = $this->getDivisionsStatistic($ids, $branchStatistic->getInterval());

        /** @var DivisionStatistic $divisionStatistic */
        foreach ($branchStatistic->getDivisions() as $divisionId => &$divisionStatistic) {
            $divisionStatistic->calculateStatisticForInterval(
                isset($statistics[$divisionId]) ? $statistics[$divisionId] : [],
                $branchStatistic->getInterval()
            );
        }
    }

    public function getDivisionsStatistic($ids = [], $filter)
    {
        /** @var EmployeesDailyStatisticRepository $statisticRepository */
        $statisticRepository = $this->em->getRepository('Statistic\Entity\EmployeesDailyStatistic');

        // получить статистику за период для сотрудников
        $statistic = $statisticRepository->getDivisionsStatistic($ids, $filter);
        return $statistic;
    }

    /**
     * todo: need?
     * @throws \Exception
     */
    public function getStatistic()
    {
        if (empty($this->branches)) {
            throw new \Exception('No Branches!');
        }
        return $this->branches;
    }

    public function getArray()
    {
        $result = [];

        foreach ($this->branches as $branchId => $branch) {

            $branchData = [
                'branchId' => $branchId,
                'branchName' => $branch['branchName'],
                'branchCode' => $branch['branchCode'],
                'bossFIO' => 'TEMP!!',
                //'bossFIO' => $branchStatistic->getBossFIO(), todo
                'numIntervals' => $this->numIntervals,
            ];

            $intervals = [];

            /** @var BranchIntervalStatistic $branchIntervalStatistic */
            foreach ($branch['intervals'] as $key => $branchIntervalStatistic)
                $intervals += [$key => [

                'totals' => $branchIntervalStatistic->getTotals(),
                'standards' => $branchIntervalStatistic->getStandards()->getBranchStandards(),
                'completion' => $branchIntervalStatistic->getCompletionPercentage()
            ]];
        }
var_dump("<pre>", $result, "</pre>");
        return ['branches' => $result];
    }

    /**
     * @param Division $division
     * @param $intervals
     */
    private function setBranchStatistic($division, $intervals)
    {
        $branchId = $division->getId();
        $arr = [];

        foreach ($intervals as $key => $interval) {
            $branch = new BranchIntervalStatistic($division, $interval);
            $arr[$key] = $branch;
        }
        $this->branches[$branchId] = [
            'branchId' => $branchId, // todo code??
            'branchName' => $division->getDivName(),
            'branchCode' => $division->getSymCode(),
            'intervals' => $arr
        ];
    }

    private function setDivisionStatistic($division, $intervals)
    {
        /** @var Division  $division */
        $parentId = $division->getParentDivId()->getId();

        if (!$parentId) {
            throw new \Exception('No parent for division');
        }

        /** @var BranchIntervalStatistic $parent */
        foreach ($intervals as $key => $interval) {
            $parent = isset($this->branches[$parentId]['intervals'][$key]) ? $this->branches[$parentId]['intervals'][$key] : null;
            if ($parent) {
                $parent->addDivision($division);
            }
        }
    }

}