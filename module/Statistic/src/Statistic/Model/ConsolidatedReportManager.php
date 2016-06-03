<?php

namespace Statistic\Model;

use Employees\Entity\Employees;
use Statistic\Model\BranchesStatisticManager;

/**
 * Class ConsolidatedReportManager
 * @package Statistic\Model
 */
class ConsolidatedReportManager extends ReportManager
{
	/**
	 * Key for $filter array
	 */
	const KEY_CALCULATION_TYPE = 'calculationType';
	

    /**
     * Get divisions
     * todo: rewrite
     * @return array
     */
    private function getDivisions()
    {
        $divisionRepository = $this->getDivisionRepository();
        return $divisionRepository->findAll();
    }

	/**
	 * Calculates intervals in reported period
     * @return array
	 */
    private function getIntervals()
    {
        $dateFrom = new \DateTime('@' . $this->filter[self::KEY_DATE_FROM]);
        $dateTo = new \DateTime('@' . $this->filter[self::KEY_DATE_TO]);

        // todo: period
        return $this->calculateWeeks($dateFrom, $dateTo);
    }

    /**
     * todo: rename
     * @param $filter
     * @return int
     */
	private function getCalculationType($filter)
	{
		return $filter[self::KEY_CALCULATION_TYPE] === BranchesStatisticManager::SHOW_WEEKLY
			? BranchesStatisticManager::SHOW_WEEKLY 
			: BranchesStatisticManager::SHOW_MONTHLY;
	}

	// todo: fridays, saturdays, holidays
    private function calculateWeeks($dateFrom, $dateTo)
    {
        $intervals = array();
        $oneday = new \DateInterval("P1D");

        /** @var \DateTime $weekFrom */
        $weekFrom = $dateFrom; $days = $workingDays = 0;
        foreach(new \DatePeriod($dateFrom, $oneday, $dateTo->add($oneday)) as $day) {
            $weekDay = $day->format("N");

            if (!$weekFrom && ($weekDay == 1)) {
                $weekFrom = $day;
                $days = $workingDays = 0;
            }

            $days++;

            /** @var \DateTime $friday */
            if ($weekDay == 5) {
                $friday = $day;
                $workingDays = $days;
            }

            /** @var \DateTime $weekTo */
            if($weekDay == 7) {
                $weekTo = $day;
                $weekTo->modify('23:59:59');
                $intervals[] = [
                    self::KEY_DATE_FROM => $weekFrom->getTimestamp(),
                    self::KEY_DATE_TO => $weekTo->getTimestamp(), //todo 23:59
                    'friday' => isset($friday) ? $friday->getTimestamp() : null,
                    'days' => $workingDays
                ];
                $weekFrom = null;
            }

        }
        return $intervals;
    }

    /**
     * Get all statistic from database
     * @param array $filter
     * @return BranchesStatisticManager
     */
    public function getStatistic($filter = [])
    {
        $filter = [self::KEY_DATE_FROM => 1456790400, self::KEY_DATE_TO => 1464739200, self::KEY_CALCULATION_TYPE => BranchesStatisticManager::SHOW_WEEKLY ]; // TEMP!!!
        $this->setFilter($filter);

        $statisticManager = new BranchesStatisticManager($this->em);
        $statisticManager->setBranchesAndIntervals($this->getDivisions(),$this->getIntervals());
        $statisticManager->setCalculationType($this->getCalculationType($filter));
        $statisticManager->calculateBranchesStatistic();

        return $statisticManager;
    }
}