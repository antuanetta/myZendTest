<?php

namespace Statistic\Model;

/**
 * Class DivisionStatistic
 * @package Statistic\Model
 */
class DivisionStatistic extends DivisionInfo
{
    /**
     * Division statistic
     * @var StatisticSet
     */
    protected $statistic;

    /**
     * @return StatisticSet
     */
    public function getStatistic()
    {
        return $this->statistic;
    }

    /**
     * @param $statistic
     */
    private function setStatistic($statistic)
    {
        $this->statistic = $statistic;
    }

    /**
     * Calculate division statistic
     * @param array $statisticData
     * @param array $filter
     * @return DivisionStatistic
     */
    public function calculateStatisticForInterval($statisticData = [], $filter = [])
    {
        $statistic = new StatisticSet($statisticData);
        $this->setStatistic($statistic);
        $this->calculateRelativeStatistics($statistic, $filter['days']);

        return $this;
    }

    /**
     * Calculates relative statistics
     * @param StatisticSet $statistic
     * @param $days
     * @return mixed
     */
    public function calculateRelativeStatistics(StatisticSet $statistic, $days)
    {
        $numEmployees = $this->statistic->getNumEmployees();

        if (empty($numEmployees)) return $statistic; // TEMP!!

        $statistic->setFirstCallsRel(StatisticSet::calculateRelativeByEmployeesOnDay($statistic->getFirstCalls(), $numEmployees, $days));
        $statistic->setPreSaleCallsRel(StatisticSet::calculateRelativeByEmployeesOnDay($statistic->getPreSaleCalls(), $numEmployees, $days));
        $statistic->setThirdCallsRel(StatisticSet::calculateRelativeByEmployeesOnDay($statistic->getThirdCalls(), $numEmployees, $days));
        $statistic->setAppointedMeetingsRel(StatisticSet::calculateRelativeByEmployeesOnDay($statistic->getAppointedMeetings(), $numEmployees, $days));

        $statistic->setFirstMeetingsRel(StatisticSet::calculateRelativeByEmployees($statistic->getFirstMeetings(), $numEmployees));
        $statistic->setSecondMeetingsRel(StatisticSet::calculateRelativeByEmployees($statistic->getSecondMeetings(), $numEmployees));

        $statistic->setFirstCallToAppointment(StatisticSet::calculateRelativeValue($statistic->getFirstCalls(), $statistic->getAppointedMeetings()));
        $statistic->setAppointedToFirstMeetings(StatisticSet::calculateRelativeValue($statistic->getAppointedMeetings(), $statistic->getFirstMeetings()));
        $statistic->setFirstToSecondMeetings(StatisticSet::calculateRelativeValue($statistic->getFirstMeetings(), $statistic->getSecondMeetings()));
        $statistic->setFirstInterviewsToTrainees(StatisticSet::calculateRelativeValue($statistic->getFirstInterviews(), $statistic->getTrainees()));
        $statistic->setMeetingsToRecommendations(StatisticSet::calculateRelativeValue($statistic->getMeetingsTotal(), $statistic->getRecommendations()));

        $this->setStatistic($statistic);
    }

}