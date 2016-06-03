<?php

namespace Statistic\Model;

use Statistic\Entity\Division;
use Statistic\Model\Standards;

/**
 * Class BranchIntervalStatistic
 * @package Statistic\Model
 */
class BranchIntervalStatistic extends DivisionInfo
{
    /**
     * Interval for calculating statistics
     * @var array
     */
    protected $interval;

    /**
     * Number fo employees
     * @var int
     */
    protected $numEmployees;

    /**
     * SubDivisions
     * @var array
     */
    private $divisions = [];

    /**
     * Standards (norms)
     * @var Standards
     */
    private $standards;

    /**
     * Totals for subDivisions
     * @var array
     */
    private $totals;

    /**
     * Completion  results
     * @var array
     */
    private $completionPercentage;

    public function __construct($division, $interval)
    {
        parent::__construct($division);

        $this->setInterval($interval);
        $this->setStandards(new Standards());
    }

    /**
     * Alias for getDivisionId
     * @return int
     */
    public function getBranchId()
    {
        return $this->getDivisionId();
    }

    /**
     * Alias for getDivisionName
     * @return string
     */
    public function getBranchName()
    {
        return $this->getDivisionName();
    }

    /**
     * @param Division $division
     */
    public function addDivision($division)
    {
        $key = $division->getId();
        if (!$this->hasDivision($key)) {
            $this->divisions[$key] = new DivisionStatistic($division);
        }
    }

    /**
     * Check if the Branch contains the Division with specified Key
     * @param $key
     * @return bool
     */
    public function hasDivision($key)
    {
        return isset($this->divisions[$key]);
    }

    /**
     * Get Divisions
     * @return array
     */
    public function getDivisions()
    {
        return $this->divisions;
    }

    /**
     * Array of divisions Ids
     * @return array
     */
    public function getDivisionsIds()
    {
        return array_keys($this->divisions);
    }

    /**
     * Set Interval
     * @param $interval
     */
    public function setInterval($interval)
    {
        $this->interval = $interval;
    }

    /**
     * @return array
     */
    public function getInterval()
    {
        return $this->interval;
    }

    /**
     * Set branch standards
     * @param Standards $standards
     */
    public function setStandards ($standards)
    {
        $this->standards = $standards;
    }

    /**
     * @return Standards
     */
    public function getStandards()
    {
        return $this->standards;
    }

    /**
     * @return array
     */
    public function getTotals()
    {
        return $this->totals;
    }

    public function getCompletionPercentage()
    {
        return $this->completionPercentage;
    }

    /**
     * Updates
     * @param $totals
     */
    public function calculateRelativeTotalValues(&$totals)
    {
        if (empty($totals)) {
            return;
        }

        $totals['firstCallsRel'] = StatisticSet::calculateRelativeByEmployeesOnDay($totals['firstCalls'], $this->numEmployees, $this->interval['days']);
        $totals['preSaleCallsRel'] = StatisticSet::calculateRelativeByEmployeesOnDay($totals['preSaleCalls'], $this->numEmployees, $this->interval['days']);
        $totals['thirdCallsRel'] = StatisticSet::calculateRelativeByEmployeesOnDay($totals['thirdCalls'], $this->numEmployees, $this->interval['days']);
        $totals['appointedMeetingsRel'] = StatisticSet::calculateRelativeByEmployeesOnDay($totals['appointedMeetings'], $this->numEmployees, $this->interval['days']);

        $totals['firstCallToAppointment'] = StatisticSet::calculateRelativeValue($totals['firstCalls'], $totals['appointedMeetings']);
        $totals['appointedToFirstMeetings'] = StatisticSet::calculateRelativeValue($totals['appointedMeetings'], $totals['firstMeetings']);
        $totals['firstToSecondMeetings'] = StatisticSet::calculateRelativeValue($totals['firstMeetings'], $totals['secondMeetings']);
        $totals['interviewsToTrainees'] = StatisticSet::calculateRelativeValue($totals['firstInterviews'], $totals['trainees']);
        $totals['meetingsToRecommendations'] = StatisticSet::calculateRelativeValue($totals['meetingsTotal'], $totals['recommendations']);

        $totals['firstMeetingsRel'] = StatisticSet::calculateRelativeByEmployees($totals['firstMeetings'], $this->numEmployees);
        $totals['secondMeetingsRel'] = StatisticSet::calculateRelativeByEmployees($totals['secondMeetings'], $this->numEmployees);
    }

    /**
     * Counts total statistics on divisions statistics
     */
    public function calculateTotals()
    {
        $totals = [];
        $numEmployees = 0;

        /* @var DivisionStatistic $division */
        foreach($this->getDivisions() as $divisionId => &$division) {
            $divisionStatistic = $division->getStatistic();
            foreach ($divisionStatistic->getStatistic() as $key => $value) {
                $totals[$key] = (isset($totals[$key]) ? $totals[$key] : 0) + $value;
            }
            $numEmployees += ($divisionStatistic->getNumEmployees());
        }

        $this->numEmployees = $numEmployees;

        $this->calculateRelativeTotalValues($totals);

        $this->totals = $totals;

        $this->updateStandards();
    }

    /**
     * Counts the percentage of completion of standarts
     */
    public function calculatePercentage()
    {
        $percentage = [];
        $totals = $this->getTotals();

        foreach ($this->getStandards()->getBranchStandards() as $key => $standard) {
            if (!isset($totals[$key])) {
                continue;
            }
            $percentage[$key] = !empty($totals[$key]) ? round($standard / $totals[$key]) : 0;
        }

        $this->completionPercentage = $percentage;
    }


    protected function updateStandards()
    {
        $totals = $this->getTotals();

        if (empty($totals)) {
            return;
        }

        $standards = $this->getStandards();
        $standards->updateByBranchData(
            $this->getBranchId(),
            $this->numEmployees,
            $this->interval['days'],
            $totals['firstMeetings'] + $totals['secondMeetings'],
            $totals['supportMeetingsCompanion'],
            $totals['meetingsTotal']
        );

        $this->setStandards($standards);
    }
}