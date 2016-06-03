<?php

namespace Statistic\Model;

/**
 * Class StatisticSet
 * @package Statistic\Model
 */
class StatisticSet
{
    protected $numEmployees;

    /**
     * Number of first calls
     * @return number
     */
    protected $firstCalls;

    /**
     * Number of first calls per day
     * @return float
     */
    protected $firstCallsRel;

    /**
     * Number of presale calls
     * @return number
     */
    protected $preSaleCalls;

    /**
     * Number of presale calls per day
     * @return float
     */
    protected $preSaleCallsRel;

    /**
     * Number of sale calls
     * @return number
     */
    protected $saleCalls;

    /**
     * Number of after sale calls
     * @return number
     */
    protected $afterSaleCalls;

    /**
     * Number of third Calls (sale + afterSale)
     * @return number
     */
    protected $thirdCalls;

    /**
     * Number of third Calls per day
     * @return float
     */
    protected $thirdCallsRel;

    /**
     * Number of appointed meetings
     * @return number
     */
    protected $appointedMeetings;

    /**
     * Number of appointed meetings per day
     * @return float
     */
    protected $appointedMeetingsRel;

    /**
     * Number of firstCall To Appointment
     * @return float
     */
    protected $firstCallToAppointment;

    /**
     * Number of first in-office meetings
     * @return number
     */
    protected $firstOfficeMeetings;

    /**
     * Number of first out-of-office meetings
     * @return number
     */
    protected $firstOutMeetings;

    /**
     * Number of first meetings
     * @return number
     */
    protected $firstMeetings;

    /**
     * Number of first meetings per week
     * @return float
     */
    protected $firstMeetingsRel;

    /**
     * Number of appointed to first meetings
     * @return float
     */
    protected $appointedToFirstMeetings;

    /**
     * Number of second in-office meetings
     * @return number
     */
    protected $secondOfficeMeetings;

    /**
     * Number of second out-of-office meetings
     * @return number
     */
    protected $secondOutMeetings;

    /**
     * Number of second meetings
     * @return number
     */
    protected $secondMeetings;

    /**
     * Number of second meetings per week
     * @return float
     */
    protected $secondMeetingsRel;

    /**
     * Number of first to second meetings
     * @return float
     */
    protected $firstToSecondMeetings;

    /**
     * Number of support meetings
     * @return number
     */
    protected $supportMeetings;

    /**
     * Number of total meetings
     * @return number
     */
    protected $meetingsTotal;

    /**
     * Number of meetings companion
     * @return number
     */
    protected $meetingsCompanion;

    /**
     * Number of support meetings companion
     * @return number
     */
    protected $supportMeetingsCompanion;

    /**
     * Number of first interviews
     * @return number
     */
    protected $firstInterviews;

    /**
     * Number of trainees
     * @return number
     */
    protected $trainees;

    /**
     * Number of first interviews to trainees
     * @return float
     */
    protected $firstInterviewsToTrainees;

    /**
     * Number of recommendations
     * @return number
     */
    protected $recommendations;

    /**
     * Number of meetings to recommendations
     * @return float
     */
    protected $meetingsToRecommendations;

    /**
     * Number of signed contracts
     * @return number
     */
    protected $signedContracts;

    /**
     * Number of acquisition Cmfs
     * @return number
     */
    protected $acquisitionCmfs;

    /**
     * Number of acquisition FcsAndTms
     * @return number
     */
    protected $acquisitionFcsAndTms;

    /**
     * Number of acquisition Total
     * @return number
     */
    protected $acquisitionTotal;

    /**
     * Number of replenishment deals
     * @return number
     */
    protected $replenishmentDeals;

    /**
     * Number of sales total
     * @return number
     */
    protected $salesTotal;


    public function getFirstCalls()
    {
        return $this->firstCalls;
    }

    public function setFirstCalls($firstCalls)
    {
        $this->firstCalls = $firstCalls;
    }

    public function getFirstCallsRel()
    {
        return $this->firstCallsRel;
    }

    public function setFirstCallsRel($firstCallsRel)
    {
        $this->firstCallsRel = $firstCallsRel;
    }

    public function getPreSaleCalls()
    {
        return $this->preSaleCalls;
    }

    public function setPreSaleCalls($preSaleCalls)
    {
        $this->preSaleCalls = $preSaleCalls;
    }

    public function getPreSaleCallsRel()
    {
        return $this->preSaleCallsRel;
    }

    public function setPreSaleCallsRel($preSaleCallsRel)
    {
        $this->preSaleCallsRel = $preSaleCallsRel;
    }

    public function getSaleCalls ()
    {
        return $this->saleCalls;
    }

    public function setSaleCalls ($saleCalls)
    {
        $this->saleCalls = $saleCalls;
    }

    public function getAfterSaleCalls ()
    {
        return $this->afterSaleCalls;
    }

    public function setAfterSaleCalls ($afterSaleCalls)
    {
        $this->afterSaleCalls = $afterSaleCalls;
    }

    public function getThirdCalls()
    {
        return $this->thirdCalls;
    }

    public function setThirdCalls($thirdCalls)
    {
        $this->thirdCalls = $thirdCalls;
    }

    public function getThirdCallsRel()
    {
        return $this->thirdCallsRel;
    }

    public function setThirdCallsRel($thirdCalls)
    {
        $this->thirdCallsRel = $thirdCalls;
    }

    public function getAppointedMeetings()
    {
        return $this->appointedMeetings;
    }

    public function setAppointedMeetings($appointedMeetings)
    {
        $this->appointedMeetings = $appointedMeetings;
    }

    public function getAppointedMeetingsRel()
    {
        return $this->appointedMeetingsRel;
    }

    public function setAppointedMeetingsRel($appointedMeetings)
    {
        $this->appointedMeetingsRel = $appointedMeetings;
    }

    public function getFirstCallToAppointment()
    {
        return $this->firstCallToAppointment;
    }

    public function setFirstCallToAppointment($firstCallToAppointment)
    {
        $this->firstCallToAppointment = $firstCallToAppointment;
    }

    public function getFirstOfficeMeetings()
    {
        return $this->firstOfficeMeetings;
    }

    public function setFirstOfficeMeetings($firstOfficeMeetings)
    {
        $this->firstOfficeMeetings = $firstOfficeMeetings;
    }

    public function getFirstOutMeetings()
    {
        return $this->firstOutMeetings;
    }

    public function setFirstOutMeetings($firstOutMeetings)
    {
        $this->firstOutMeetings = $firstOutMeetings;
    }

    public function getFirstMeetings()
    {
        return $this->firstMeetings;
    }

    public function setFirstMeetings($firstMeetings)
    {
        $this->firstMeetings = $firstMeetings;
    }

    public function getFirstMeetingsRel()
    {
        return $this->firstMeetingsRel;
    }

    public function setFirstMeetingsRel($firstMeetings)
    {
        $this->firstMeetings = $firstMeetings;
    }

    public function getAppointedToFirstMeetings()
    {
        return $this->appointedToFirstMeetings;
    }

    public function setAppointedToFirstMeetings($appointedToFirstMeetings)
    {
        $this->appointedToFirstMeetings = $appointedToFirstMeetings;
    }

    public function getSecondOfficeMeetings()
    {
        return $this->secondOfficeMeetings;
    }

    public function setSecondOfficeMeetings($secondOfficeMeetings)
    {
        $this->secondOfficeMeetings = $secondOfficeMeetings;
    }

    public function getSecondOutMeetings()
    {
        return $this->secondOutMeetings;
    }

    public function setSecondOutMeetings($secondOutMeetings)
    {
        $this->secondOutMeetings = $secondOutMeetings;
    }

    public function getSecondMeetings()
    {
        return $this->secondMeetings;
    }

    public function setSecondMeetings($secondMeetings)
    {
        $this->secondMeetings = $secondMeetings;
    }

    public function getSecondMeetingsRel()
    {
        return $this->secondMeetingsRel;
    }

    public function setSecondMeetingsRel($secondMeetings)
    {
        $this->secondMeetings = $secondMeetings;
    }

    public function getFirstToSecondMeetings()
    {
        return $this->firstToSecondMeetings;
    }

    public function setFirstToSecondMeetings($firstToSecondMeetings)
    {
        $this->firstToSecondMeetings = $firstToSecondMeetings;
    }

    public function getSupportMeetings()
    {
        return $this->supportMeetings;
    }

    public function setSupportMeetings($supportMeetings)
    {
        $this->supportMeetings = $supportMeetings;
    }

    public function getMeetingsTotal()
    {
        return $this->meetingsTotal;
    }

    public function setMeetingsTotal($meetingsTotal)
    {
        $this->meetingsTotal = $meetingsTotal;
    }

    public function getMeetingsCompanion()
    {
        return $this->meetingsCompanion;
    }

    public function setMeetingsCompanion($meetingsCompanion)
    {
        $this->meetingsCompanion = $meetingsCompanion;
    }

    public function getSupportMeetingsCompanion()
    {
        return $this->supportMeetingsCompanion;
    }

    public function setSupportMeetingsCompanion($supportMeetingsCompanion)
    {
        $this->supportMeetingsCompanion = $supportMeetingsCompanion;
    }

    public function getFirstInterviews()
    {
        return $this->firstInterviews;
    }

    public function setFirstInterviews($interviews)
    {
        $this->firstInterviews = $interviews;
    }

    public function getTrainees()
    {
        return $this->trainees;
    }

    public function setTrainees($trainees)
    {
        $this->trainees = $trainees;
    }

    public function getFirstInterviewsToTrainees()
    {
        return $this->firstInterviewsToTrainees;
    }

    public function setFirstInterviewsToTrainees($interviewsToTrainees)
    {
        $this->firstInterviewsToTrainees = $interviewsToTrainees;
    }

    public function getRecommendations()
    {
        return $this->recommendations;
    }

    public function setRecommendations($recommendations)
    {
        $this->recommendations = $recommendations;
    }

    public function getMeetingsToRecommendations()
    {
        return $this->meetingsToRecommendations;
    }

    public function setMeetingsToRecommendations($meetingsToRecommendations)
    {
        $this->meetingsToRecommendations = $meetingsToRecommendations;
    }

    public function getSignedContracts()
    {
        return $this->signedContracts;
    }

    public function setSignedContracts($signedContracts)
    {
        $this->signedContracts = $signedContracts;
    }

    public function getAcquisitionCmfs()
    {
        return $this->acquisitionCmfs;
    }

    public function setAcquisitionCmfs($acquisitionCmfs)
    {
        $this->acquisitionCmfs = $acquisitionCmfs;
    }

    public function getAcquisitionFcsAndTms()
    {
        return $this->acquisitionFcsAndTms;
    }

    public function setAcquisitionFcsAndTms($acquisitionFcsAndTms)
    {
        $this->acquisitionFcsAndTms = $acquisitionFcsAndTms;
    }

    public function getAcquisitionTotal()
    {
        return $this->acquisitionTotal;
    }

    public function setAcquisitionTotal($acquisitionTotal)
    {
        $this->acquisitionTotal = $acquisitionTotal;
    }

    public function getReplenishmentDeals()
    {
        return $this->replenishmentDeals;
    }

    public function setReplenishmentDeals($replenishmentDeals)
    {
        $this->replenishmentDeals = $replenishmentDeals;
    }

    public function getSalesTotal()
    {
        return $this->salesTotal;
    }

    public function setSalesTotal($salesTotal)
    {
        $this->salesTotal = $salesTotal;
    }

    public function setNumEmployees($num)
    {
        $this->numEmployees = $num;
    }

    public function getNumEmployees()
    {

        return $this->numEmployees;
    }

    /**
     * StatisticSet constructor
     * // todo hidrate??
     * // todo numemployees=0 ?
     * @param array $statistic
     */
    public function __construct($statistic = [])
    {
        $this->setFirstCalls(isset($statistic['firstCalls']) ? $statistic['firstCalls'] : 0);
        $this->setPreSaleCalls(isset($statistic['preSaleCalls']) ? $statistic['preSaleCalls'] : 0);
        $this->setSaleCalls(isset($statistic['saleCalls']) ? $statistic['saleCalls'] : 0);
        $this->setAfterSaleCalls(isset($statistic['afterSaleCalls']) ? $statistic['afterSaleCalls'] : 0);
        $this->setThirdCalls($this->getSaleCalls() + $this->getAfterSaleCalls());
        $this->setAppointedMeetings(isset($statistic['appointedMeetings']) ? $statistic['appointedMeetings'] : 0);
        $this->setFirstOfficeMeetings(isset($statistic['firstOfficeMeetings']) ? $statistic['firstOfficeMeetings'] : 0);
        $this->setFirstOutMeetings(isset($statistic['firstOutMeetings']) ? $statistic['firstOutMeetings'] : 0);
        $this->setFirstMeetings(isset($statistic['firstMeetings']) ? $statistic['firstMeetings'] : 0);
        $this->setSecondOfficeMeetings(isset($statistic['secondOfficeMeetings']) ? $statistic['secondOfficeMeetings'] : 0);
        $this->setSecondOutMeetings(isset($statistic['secondOutMeetings']) ? $statistic['secondOutMeetings'] : 0);
        $this->setSecondMeetings(isset($statistic['secondMeetings']) ? $statistic['secondMeetings'] : 0);
        $this->setSupportMeetings(isset($statistic['supportMeeting']) ? $statistic['supportMeeting'] : 0);
        $this->setMeetingsTotal(isset($statistic['meetingsTotal']) ? $statistic['meetingsTotal'] : 0);
        $this->setMeetingsCompanion(isset($statistic['meetingsCompanion']) ? $statistic['meetingsCompanion'] : 0);
        $this->setSupportMeetingsCompanion(isset($statistic['supportMeetingsCompanion']) ? $statistic['supportMeetingsCompanion'] : 0);
        $this->setFirstInterviews(isset($statistic['firstInterviews']) ? $statistic['firstInterviews'] : 0);
        $this->setTrainees(isset($statistic['trainees']) ? $statistic['trainees'] : 0);
        $this->setRecommendations(isset($statistic['recommendations']) ? $statistic['recommendations'] : 0);
        $this->setSignedContracts(isset($statistic['signedContracts']) ? $statistic['signedContracts'] : 0);
        $this->setAcquisitionCmfs(isset($statistic['acquisitionCmfs']) ? $statistic['acquisitionCmfs'] : 0);
        $this->setAcquisitionFcsAndTms(isset($statistic['acquisitionFcsAndTms']) ? $statistic['acquisitionFcsAndTms'] : 0);
        $this->setAcquisitionTotal(isset($statistic['acquisitionTotal']) ? $statistic['acquisitionTotal'] : 0);
        $this->setReplenishmentDeals(isset($statistic['replenishmentDeals']) ? $statistic['replenishmentDeals'] : 0);
        $this->setSalesTotal(isset($statistic['salesTotal']) ? $statistic['salesTotal'] : 0);

        $this->setNumEmployees(isset($statistic['numEmployees']) ? $statistic['numEmployees'] : 0);
    }

    /**
     * Calculates new value by formula
     * @param $value
     * @param int $numEmployees
     * @return float
     */
    public static function calculateRelativeByEmployees($value = null, $numEmployees)
    {
        if (is_null($value) || empty($numEmployees)) {
            return null;
        }

        return $value / $numEmployees;
    }

    /**
     * Calculates new value by formula
     * @param $value
     * @param int $numEmployees
     * @param int $days
     * @return float
     */
    public static function calculateRelativeByEmployeesOnDay($value, $numEmployees, $days)
    {
        if (empty($days)) {
            return null;
        }

        return self::calculateRelativeByEmployees($value, $numEmployees) / $days ?: null;
    }

    public static function calculateRelativeValue($value1, $value2)
    {
        return !is_null($value1) && !empty($value2) ? $value1 / $value2 : null;
    }

    public function getStatistic()
    {
        return [
            'firstCalls' => $this->getFirstCalls(),
            'firstCallsRel' => $this->getFirstCallsRel(),
            'preSaleCalls' => $this->getPreSaleCalls(),
            'preSaleCallsRel' => $this->getPreSaleCallsRel(),
            'saleCalls' => $this->getSaleCalls(),
            'afterSaleCalls' => $this->getAfterSaleCalls(),
            'thirdCalls' => $this->getThirdCalls(),
            'thirdCallsRel' => $this->getThirdCalls(),
            'appointedMeetings' => $this->getAppointedMeetings(),
            'appointedMeetingsRel' => $this->getAppointedMeetingsRel(),
            'firstCallToAppointment' => $this->getFirstCallToAppointment(),
            'firstOfficeMeetings' => $this->getFirstOfficeMeetings(),
            'firstOutMeetings' => $this->getFirstOutMeetings(),
            'firstMeetings' => $this->getFirstMeetings(),
            'firstMeetingsRel' => $this->getFirstMeetingsRel(),
            'appointedToFirstMeetings' => $this->getAppointedToFirstMeetings(),
            'secondOfficeMeetings' => $this->getSecondOfficeMeetings(),
            'secondOutMeetings' => $this->getSecondOutMeetings(),
            'secondMeetings' => $this->getSecondMeetings(),
            'secondMeetingsRel' => $this->getSecondMeetingsRel(),
            'firstToSecondMeetings' => $this->getFirstToSecondMeetings(),
            'supportMeeting' => $this->getSupportMeetings(),
            'meetingsTotal' => $this->getMeetingsTotal(),
            'meetingsCompanion' => $this->getMeetingsCompanion(),
            'supportMeetingsCompanion' => $this->getSupportMeetingsCompanion(),
            'firstInterviews' => $this->getFirstInterviews(),
            'trainees' => $this->getTrainees(),
            'interviewsToTrainees' => $this->getFirstInterviewsToTrainees(),
            'recommendations' => $this->getRecommendations(),
            'meetingsToRecommendations' => $this->getMeetingsToRecommendations(),
            'signedContracts' => $this->getSignedContracts(),
            'acquisitionCmfs' => $this->getAcquisitionCmfs(),
            'acquisitionFcsAndTms' => $this->getAcquisitionFcsAndTms(),
            'acquisitionTotal' => $this->getAcquisitionTotal(),
            'replenishmentDeals' => $this->getReplenishmentDeals(),
            'salesTotal' => $this->getSalesTotal()
        ];
    }

    public function getStatisticKeys()
    {
        return array_keys($this->getStatistic());
    }
}