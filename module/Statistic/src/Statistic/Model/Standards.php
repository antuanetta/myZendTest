<?php

namespace Statistic\Model;

/**
 * Class Standards
 * @package Statistic\Model
 */
class Standards
{
    private $standardsForBranch = [];

    private $firstCalls;
    private $firstCallsRel;
    private $preSaleCalls;
    private $preSaleCallsRel;
    private $thirdCalls;
    private $thirdCallsRel;
    private $appointedMeetings;
    private $appointedMeetingsRel;
    private $firstCallToAppointment;
    private $firstMeetings;
    private $firstMeetingsRel;
    private $appointedToFirstMeetings;
    private $secondMeetings;
    private $secondMeetingsRel;
    private $firstToSecondMeetings;

    private $meetingsCompanion;
    private $meetingsCompanionPercentage; // fraction

    private $supportMeetingsCompanion;
    private $supportMeetingsCompanionPercentage; // fraction

    private $firstInterviews;
    private $trainees;
    private $interviewsToTraineesRel;

    private $recommendations;
    private $recommendationsPercentage; // fraction
    private $meetingsToRecommendations;

    public function __construct()
    {
        $this->setDefaults();
    }

    public function getFirstCalls()
    {
        return $this->firstCalls;
    }

    public function getFirstCallsRel()
    {
        return $this->firstCallsRel;
    }

    public function getPreSaleCalls()
    {
        return $this->preSaleCalls;
    }
    public function getPreSaleCallsRel()
    {
        return $this->preSaleCallsRel;
    }

    public function getThirdCalls()
    {
        return $this->thirdCalls;
    }

    public function getThirdCallsRel()
    {
        return $this->thirdCallsRel;
    }

    public function getAppointedMeetings()
    {
        return $this->appointedMeetings;
    }

    public function getAppointedMeetingsRel()
    {
        return $this->appointedMeetingsRel;
    }

    public function getFirstCallToAppointment()
    {
        return $this->firstCallToAppointment;
    }

    public function getFirstMeetings()
    {
        return $this->firstMeetings;
    }

    public function getFirstMeetingsRel()
    {
        return $this->firstMeetingsRel;
    }

    public function getAppointedToFirstMeetings()
    {
        return $this->appointedToFirstMeetings;
    }

    public function getSecondMeetings()
    {
        return $this->secondMeetings;
    }

    public function getSecondMeetingsRel()
    {
        return $this->secondMeetingsRel;
    }

    public function getFirstToSecondMeetings()
    {
        return $this->firstToSecondMeetings;
    }

    public function getMeetingsCompanion()
    {
        return $this->meetingsCompanion;
    }

    public function getSupportMeetingsCompanion()
    {
        return $this->supportMeetingsCompanion;
    }

    public function getFirstInterviews()
    {
        return $this->firstInterviews;
    }

    public function getTrainees()
    {
        return $this->trainees;
    }

    public function getInterviewsToTraineesRel()
    {
        return $this->interviewsToTraineesRel;
    }

    public function getMeetingsToRecommendations()
    {
        return $this->meetingsToRecommendations;
    }

    public function getRecommendations()
    {
        return $this->recommendations;
    }

    private function setDefaults()
    {
        $this->firstCallsRel = 20;
        $this->preSaleCallsRel = 20;
        $this->thirdCallsRel = 15;
        $this->appointedMeetingsRel = 3;
        $this->firstCallToAppointment = 6;
        $this->firstMeetingsRel = 3;
        $this->appointedToFirstMeetings = 5;
        $this->secondMeetingsRel = 1;
        $this->firstToSecondMeetings = 3;

        $this->standardsForBranch = [
            1 => [
                'meetingsCompanionPercentage' => 0.6,
                'supportMeetingsCompanionPercentage' => 0.6,
                'meetingsToRecommendations' => 2
            ],
            2 => [
                'meetingsCompanionPercentage' => 0.4,
                'supportMeetingsCompanionPercentage' => 0.4,
                'meetingsToRecommendations' => 2
            ],
            3 => [
                'meetingsCompanionPercentage' => 0.4,
                'supportMeetingsCompanionPercentage' => 0.4,
                'meetingsToRecommendations' => 2
            ],
        ];

        $this->firstInterviews = 24;
        $this->trainees = 2.4;
        $this->interviewsToTraineesRel = 10;
        $this->recommendationsPercentage = 1.0;
    }

    /**
     * @ param BranchStatistic $branch
     * @param $branchId
     * @param $numEmployees
     * @param $numDays
     * @param $numFirstAndSecondMeetings
     * @param $numSupportMeetings
     * @param $meetingsTotal
     */
    public function updateByBranchData($branchId, $numEmployees, $numDays,
        $numFirstAndSecondMeetings, $numSupportMeetings, $meetingsTotal )
    {
        $this->setMeetingsCompanionPercentageByBranchId($branchId);
        $this->setSupportMeetingsCompanionPercentageByBranchId($branchId);
        $this->setMeetingsToRecommendationsByBranchId($branchId);

        $factor = $numEmployees * $numDays;
        $this->firstCalls = $this->getFirstCallsRel() * $factor;
        $this->preSaleCalls = $this->getPreSaleCallsRel() * $factor;
        $this->thirdCalls = $this->getThirdCallsRel() * $factor;
        $this->appointedMeetings = $this->getAppointedMeetingsRel() * $factor;

        $this->firstMeetings = $this->getFirstMeetingsRel() * $numEmployees;
        $this->secondMeetings = $this->getSecondMeetingsRel() * $numEmployees;

        // todo: ceil ? floor
        $this->meetingsCompanion = floor($numFirstAndSecondMeetings * $this->meetingsCompanionPercentage);
        $this->supportMeetingsCompanion = floor($numSupportMeetings * $this->supportMeetingsCompanionPercentage);
        $this->recommendations = floor($meetingsTotal * $this->recommendationsPercentage);
    }


    public function getBranchStandards()
    {
        return [
            'firstCalls' => $this->getFirstCalls(),
            'firstCallsRel' => $this->getFirstCallsRel(),
            'preSaleCalls' => $this->getPreSaleCalls(),
            'preSaleCallsRel' => $this->getPreSaleCallsRel(),
            'thirdCalls' => $this->getPreSaleCalls(),
            'thirdCallsRel' => $this->getPreSaleCallsRel(),
            'appointedMeetings' => $this->getAppointedMeetings(),
            'appointedMeetingsRel' => $this->getAppointedMeetingsRel(),
            'firstCallToAppointment' => $this->getFirstCallToAppointment(),
            'firstMeetings' => $this->getFirstMeetings(),
            'firstMeetingsRel' => $this->getFirstMeetingsRel(),
            'appointedToFirstMeetings' => $this->getAppointedToFirstMeetings(),
            'secondMeetings' => $this->getSecondMeetings(),
            'secondMeetingsRel' => $this->getSecondMeetingsRel(),
            'firstToSecondMeetings' => $this->getFirstToSecondMeetings(),
            'meetingsCompanion' => $this->getMeetingsCompanion(),
            'supportMeetingsCompanion' => $this->getSupportMeetingsCompanion(),
            'firstInterviews' => $this->getFirstInterviews(),
            'trainees' => $this->getTrainees(),
            'interviesToTraineesRel' => $this->getInterviewsToTraineesRel(),
            'recommendations' => $this->getRecommendations(),
            'meetingsToRecommendations' => $this->getMeetingsToRecommendations(),
        ];
    }

    private function setMeetingsCompanionPercentageByBranchId($branchId)
    {
        $this->meetingsCompanionPercentage = isset($this->standardsForBranch[$branchId]['meetingsCompanionPercentage'])
            ? $this->standardsForBranch[$branchId]['meetingsCompanionPercentage']
            : null;
    }

    private function setSupportMeetingsCompanionPercentageByBranchId($branchId)
    {
        $this->supportMeetingsCompanionPercentage = isset($this->standardsForBranch[$branchId]['supportMeetingsCompanionPercentage'])
            ? $this->standardsForBranch[$branchId]['supportMeetingsCompanionPercentage']
            : null;
    }

    private function setMeetingsToRecommendationsByBranchId($branchId)
    {
        $this->meetingsToRecommendations = isset($this->standardsForBranch[$branchId]['meetingsToRecommendations'])
            ? $this->standardsForBranch[$branchId]['meetingsToRecommendations']
            : null;
    }
}