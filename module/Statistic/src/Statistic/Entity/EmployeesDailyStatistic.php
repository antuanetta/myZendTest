<?php

namespace Statistic\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EmployeesDailyStatistic Entity Class
 * todo: nullable
 * @ORM\Table(name="employees_daily_statistic", options={"collate"="utf8_general_ci", "charset"="utf8"})
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="Statistic\Model\EmployeesDailyStatisticRepository")
 */
class EmployeesDailyStatistic
{
    /**
     * Table's primary key
     * @var integer
     * @ORM\Column(name="id", type="integer", nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * Employee statistic  (relate to employees table)
     * todo: edit
     * @var integer
     * @ORM\Column(name="employeeId", type="integer", nullable=false, unique=false)
     */
    private $employeeId;

    /**
     * Division employee belongs to (relate to divisions table)
     * todo: edit
     * @var integer
     * @ORM\Column(name="divisionId", type="integer", nullable=false, unique=false)
     */
    private $divisionId;

    /**
     * Date when record was created
     * todo: need?
     * @var integer
     * @ORM\Column(name="createdAt", type="integer", nullable=false, unique=false)
     */
    private $createdAt;

    /**
     * When record was updated
     * todo: need?
     * @var integer
     * @ORM\Column(name="updatedAt", type="integer", nullable=true, unique=false)
     */
    private $updatedAt;

    /**
     * Who updated this record the last one
     * todo: need?
     * @var integer
     * @ORM\Column(name="updatedBy", type="integer", nullable=true, unique=false)
     */
    private $updatedBy;

    /**
     * Date of report
     * todo: edit
     * @var integer
     * @ORM\Column(name="reportDate", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $reportDate;

    /**
     * Number of first calls
     * @var integer
     * @ORM\Column(name="firstCalls", type="integer", nullable=false, unique=false)
     */
    private $firstCalls = 0;

    /**
     * Number of first calls (calculated value)
     * @var integer
     * @ORM\Column(name="firstCallsCalc", type="integer", nullable=false, unique=false)
     */
    private $firstCallsCalc = 0;

    /**
     * Number of preSaleCalls (second) calls
     * @var integer
     * @ORM\Column(name="preSaleCalls", type="integer", nullable=false, unique=false)
     */
    private $preSaleCalls = 0;

    /**
     * Number of preSaleCalls (second) calls (calculated value)
     * @var integer
     * @ORM\Column(name="preSaleCallsCalc", type="integer", nullable=false, unique=false)
     */
    private $preSaleCallsCalc = 0;

    /**
     * Number of saleCalls (third) calls
     * @var integer
     * @ORM\Column(name="saleCalls", type="integer", nullable=false, unique=false)
     */
    private $saleCalls = 0;

    /**
     * Number of saleCalls (third) calls (calculated value)
     * @var integer
     * @ORM\Column(name="saleCallsCalc", type="integer", nullable=false, unique=false)
     */
    private $saleCallsCalc = 0;

    /**
     * Number of afterSaleCalls (third) calls
     * @var integer
     * @ORM\Column(name="afterSaleCalls", type="integer", nullable=false, unique=false)
     */
    private $afterSaleCalls = 0;

    /**
     * Number of afterSaleCalls (third) calls (calculated value)
     * @var integer
     * @ORM\Column(name="afterSaleCallsCalc", type="integer", nullable=false, unique=false)
     */
    private $afterSaleCallsCalc = 0;

    /**
     * Number of appointed meetings
     * @var integer
     * @ORM\Column(name="appointedMeetings", type="integer", nullable=false, unique=false)
     */
    private $appointedMeetings = 0;

    /**
     * Number of appointed meetings (calculated value)
     * @var integer
     * @ORM\Column(name="appointedMeetingsCalc", type="integer", nullable=false, unique=false)
     */
    private $appointedMeetingsCalc = 0;

    /**
     * Number of first office meetings
     * @var integer
     * @ORM\Column(name="firstOfficeMeetings", type="integer", nullable=false, unique=false)
     */
    private $firstOfficeMeetings = 0;

    /**
     * Number of first office meetings (calculated value)
     * @var integer
     * @ORM\Column(name="firstOfficeMeetingsCalc", type="integer", nullable=false, unique=false)
     */
    private $firstOfficeMeetingsCalc = 0;

    /**
     * Number of second office meetings
     * @var integer
     * @ORM\Column(name="secondOfficeMeetings", type="integer", nullable=false, unique=false)
     */
    private $secondOfficeMeetings = 0;

    /**
     * Number of second office meetings (calculated value)
     * @var integer
     * @ORM\Column(name="secondOfficeMeetingsCalc", type="integer", nullable=false, unique=false)
     */
    private $secondOfficeMeetingsCalc = 0;

    /**
     * Number of first out of office meetings
     * @var integer
     * @ORM\Column(name="firstOutMeetings", type="integer", nullable=false, unique=false)
     */
    private $firstOutMeetings = 0;

    /**
     * Number of first out of office meetings (calculated value)
     * @var integer
     * @ORM\Column(name="firstOutMeetingsCalc", type="integer", nullable=false, unique=false)
     */
    private $firstOutMeetingsCalc = 0;

    /**
     * Number of second out of office meetings
     * @var integer
     * @ORM\Column(name="secondOutMeetings", type="integer", nullable=false, unique=false)
     */
    private $secondOutMeetings = 0;

    /**
     * Number of second out of office meetings (calculated value)
     * @var integer
     * @ORM\Column(name="secondOutMeetingsCalc", type="integer", nullable=false, unique=false)
     */
    private $secondOutMeetingsCalc = 0;

    /**
     * Number of support meetings
     * @var integer
     * @ORM\Column(name="supportMeetings", type="integer", nullable=false, unique=false)
     */
    private $supportMeetings = 0;

    /**
     * Number of support meetings (calculated value)
     * @var integer
     * @ORM\Column(name="supportMeetingsCalc", type="integer", nullable=false, unique=false)
     */
    private $supportMeetingsCalc = 0;

    /**
     * Number of meetings this employee accompany another
     * @var integer
     * @ORM\Column(name="meetingsCompanion", type="integer", nullable=false, unique=false)
     */
    private $meetingsCompanion = 0;

    /**
     * Number of meetings this employee accompany another (calculated value)
     * @var integer
     * @ORM\Column(name="meetingsCompanionCalc", type="integer", nullable=false, unique=false)
     */
    private $meetingsCompanionCalc = 0;

    /**
     * Number of support meetings this employee accompany another
     * @var integer
     * @ORM\Column(name="supportMeetingsCompanion", type="integer", nullable=false, unique=false)
     */
    private $supportMeetingsCompanion = 0;

    /**
     * Number of support meetings this employee accompany another (calculated value)
     * @var integer
     * @ORM\Column(name="supportMeetingsCompanionCalc", type="integer", nullable=false, unique=false)
     */
    private $supportMeetingsCompanionCalc = 0;

    /**
     * Number of first interviews
     * @var integer
     * @ORM\Column(name="firstInterviews", type="integer", nullable=false, unique=false)
     */
    private $firstInterviews = 0;

    /**
     * Number of trainees
     * @var integer
     * @ORM\Column(name="trainees", type="integer", nullable=false, unique=false)
     */
    private $trainees = 0;

    /**
     * Number of recommendations
     * @var integer
     * @ORM\Column(name="recommendations", type="integer", nullable=false, unique=false)
     */
    private $recommendations = 0;

    /**
     * Number of signed contracts
     * @var integer
     * @ORM\Column(name="signedContracts", type="integer", nullable=false, unique=false)
     */
    private $signedContracts = 0;

    /**
     * Number of new clients (closed mute funds)
     * @var integer
     * @ORM\Column(name="acquisitionCmfs", type="integer", nullable=false, unique=false)
     */
    private $acquisitionCmfs = 0;

    /**
     * Number of new clients (financialConsulting and trustManagement)
     * @var integer
     * @ORM\Column(name="acquisitionFcsAndTms", type="integer", nullable=false, unique=false)
     */
    private $acquisitionFcsAndTms = 0;

    /**
     * Number of replenishment deals (old clients)
     * @var integer
     * @ORM\Column(name="replenishmentDeals", type="integer", nullable=false, unique=false)
     */
    private $replenishmentDeals = 0;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set employeeId
     *
     * @param integer $employeeId
     * @return EmployeesDailyStatistic
     */
    public function setEmployeeId($employeeId)
    {
        $this->employeeId = $employeeId;

        return $this;
    }

    /**
     * Get employeeId
     *
     * @return integer
     */
    public function getEmployeeId()
    {
        return $this->employeeId;
    }

    /**
     * Set departmentId
     *
     * @param integer $departmentId
     * @return EmployeesDailyStatistic
     */
    public function setDepartmentId($departmentId)
    {
        $this->departmentId = $departmentId;

        return $this;
    }

    /**
     * Get departmentId
     *
     * @return integer
     */
    public function getDepartmentId()
    {
        return $this->departmentId;
    }

    /**
     * Get createdAt
     *
     * @return integer
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set createdAt
     *
     * @param integer $createdAt
     * @return EmployeesDailyStatistic
     */
    public function setCreatedBy($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Set updatedAt
     *
     * @param integer $updatedAt
     * @return EmployeesDailyStatistic
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return integer
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set updatedBy
     *
     * @param integer $updatedBy
     * @return EmployeesDailyStatistic
     */
    public function setUpdatedBy($updatedBy)
    {
        $this->updatedBy = $updatedBy;

        return $this;
    }

    /**
     * Get updatedBy
     * @return integer
     */
    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }

    /**
     * Set firstCalls
     *
     * @param integer $firstCalls
     * @return EmployeesDailyStatistic
     */
    public function setFirstCalls($firstCalls)
    {
        $this->firstCalls = $firstCalls;

        return $this;
    }

    /**
     * Get firstCalls
     *
     * @return integer
     */
    public function getFirstCalls()
    {
        return $this->firstCalls;
    }

    /**
     * Set firstCallsCalc
     *
     * @param integer $firstCallsCalc
     * @return EmployeesDailyStatistic
     */
    public function setFirstCallsCalc($firstCallsCalc)
    {
        $this->firstCallsCalc = $firstCallsCalc;

        return $this;
    }

    /**
     * Get firstCallsCalc
     *
     * @return integer
     */
    public function getFirstCallsCalc()
    {
        return $this->firstCallsCalc;
    }

    /**
     * Set preSaleCalls
     *
     * @param integer $preSaleCalls
     * @return EmployeesDailyStatistic
     */
    public function setPreSaleCalls($preSaleCalls)
    {
        $this->preSaleCalls = $preSaleCalls;

        return $this;
    }

    /**
     * Get preSaleCalls
     *
     * @return integer
     */
    public function getPreSaleCalls()
    {
        return $this->preSaleCalls;
    }

    /**
     * Set preSaleCallsCalc
     *
     * @param integer $preSaleCallsCalc
     * @return EmployeesDailyStatistic
     */
    public function setPreSaleCallsCalc($preSaleCallsCalc)
    {
        $this->preSaleCallsCalc = $preSaleCallsCalc;

        return $this;
    }

    /**
     * Get preSaleCallsCalc
     *
     * @return integer
     */
    public function getPreSaleCallsCalc()
    {
        return $this->preSaleCallsCalc;
    }

    /**
     * Set saleCalls
     *
     * @param integer $saleCalls
     * @return EmployeesDailyStatistic
     */
    public function setSaleCalls($saleCalls)
    {
        $this->saleCalls = $saleCalls;

        return $this;
    }

    /**
     * Get preSaleCalls
     *
     * @return integer
     */
    public function getSaleCalls()
    {
        return $this->saleCalls;
    }

    /**
     * Set saleCallsCalc
     *
     * @param integer $saleCallsCalc
     * @return EmployeesDailyStatistic
     */
    public function setSaleCallsCalc($saleCallsCalc)
    {
        $this->saleCallsCalc = $saleCallsCalc;

        return $this;
    }

    /**
     * Get preSaleCallsCalc
     *
     * @return integer
     */
    public function getSaleCallsCalc()
    {
        return $this->saleCallsCalc;
    }

    /**
     * Set afterSaleCalls
     *
     * @param integer $afterSaleCalls
     * @return EmployeesDailyStatistic
     */
    public function setAfterSaleCalls($afterSaleCalls)
    {
        $this->afterSaleCalls = $afterSaleCalls;

        return $this;
    }

    /**
     * Get preSaleCalls
     *
     * @return integer
     */
    public function getAfterSaleCalls()
    {
        return $this->afterSaleCalls;
    }

    /**
     * Set afterSaleCallsCalc
     *
     * @param integer $afterSaleCallsCalc
     * @return EmployeesDailyStatistic
     */
    public function setAfterSaleCallsCalc($afterSaleCallsCalc)
    {
        $this->afterSaleCallsCalc = $afterSaleCallsCalc;

        return $this;
    }

    /**
     * Get preSaleCallsCalc
     *
     * @return integer
     */
    public function getAfterSaleCallsCalc()
    {
        return $this->afterSaleCallsCalc;
    }

    /**
     * Set appointedMeetings
     *
     * @param integer $appointedMeetings
     *
     * @return EmployeesDailyStatistic
     */
    public function setAppointedMeetings($appointedMeetings)
    {
        $this->appointedMeetings = $appointedMeetings;

        return $this;
    }

    /**
     * Get appointedMeetings
     *
     * @return integer
     */
    public function getAppointedMeetings()
    {
        return $this->appointedMeetings;
    }

    /**
     * Set appointedMeetingsCalc
     *
     * @param integer $appointedMeetingsCalc
     *
     * @return EmployeesDailyStatistic
     */
    public function setAppointedMeetingsCalc($appointedMeetingsCalc)
    {
        $this->appointedMeetingsCalc = $appointedMeetingsCalc;

        return $this;
    }

    /**
     * Get appointedMeetingsCalc
     *
     * @return integer
     */
    public function getAppointedMeetingsCalc()
    {
        return $this->appointedMeetingsCalc;
    }

    /**
     * Set firstOfficeMeetings
     *
     * @param integer $firstOfficeMeetings
     * @return EmployeesDailyStatistic
     */
    public function setFirstOfficeMeetings($firstOfficeMeetings)
    {
        $this->firstOfficeMeetings = $firstOfficeMeetings;

        return $this;
    }

    /**
     * Get firstOfficeMeetings
     *
     * @return integer
     */
    public function getFirstOfficeMeetings()
    {
        return $this->firstOfficeMeetings;
    }

    /**
     * Set firstOfficeMeetingsCalc
     *
     * @param integer $firstOfficeMeetingsCalc
     * @return EmployeesDailyStatistic
     */
    public function setFirstOfficeMeetingsCalc($firstOfficeMeetingsCalc)
    {
        $this->firstOfficeMeetingsCalc = $firstOfficeMeetingsCalc;

        return $this;
    }

    /**
     * Get firstOfficeMeetingsCalc
     *
     * @return integer
     */
    public function getFirstOfficeMeetingsCalc()
    {
        return $this->firstOfficeMeetingsCalc;
    }

    /**
     * Set secondOfficeMeetings
     *
     * @param integer $secondOfficeMeetings
     * @return EmployeesDailyStatistic
     */
    public function setSecondOfficeMeetings($secondOfficeMeetings)
    {
        $this->secondOfficeMeetings = $secondOfficeMeetings;

        return $this;
    }

    /**
     * Get firstOfficeMeetings
     *
     * @return integer
     */
    public function getSecondOfficeMeetings()
    {
        return $this->secondOfficeMeetings;
    }

    /**
     * Set secondOfficeMeetingsCalc
     *
     * @param integer $secondOfficeMeetingsCalc
     * @return EmployeesDailyStatistic
     */
    public function setSecondOfficeMeetingsCalc($secondOfficeMeetingsCalc)
    {
        $this->secondOfficeMeetingsCalc = $secondOfficeMeetingsCalc;

        return $this;
    }

    /**
     * Get firstOfficeMeetingsCalc
     *
     * @return integer
     */
    public function getSecondOfficeMeetingsCalc()
    {
        return $this->secondOfficeMeetingsCalc;
    }

    /**
     * Set firstOutMeetings
     *
     * @param integer $firstOutMeetings
     * @return EmployeesDailyStatistic
     */
    public function setFirstOutMeetings($firstOutMeetings)
    {
        $this->firstOutMeetings = $firstOutMeetings;

        return $this;
    }

    /**
     * Get firstOutMeetings
     *
     * @return integer
     */
    public function getFirstOutMeetings()
    {
        return $this->firstOutMeetings;
    }

    /**
     * Set firstOutMeetingsCalc
     *
     * @param integer $firstOutMeetingsCalc
     * @return EmployeesDailyStatistic
     */
    public function setFirstOutMeetingsCalc($firstOutMeetingsCalc)
    {
        $this->firstOutMeetingsCalc = $firstOutMeetingsCalc;

        return $this;
    }

    /**
     * Get firstOutMeetingsCalc
     *
     * @return integer
     */
    public function getFirstOutMeetingsCalc()
    {
        return $this->firstOutMeetingsCalc;
    }

    /**
     * Set secondOutMeetings
     *
     * @param integer $secondOutMeetings
     * @return EmployeesDailyStatistic
     */
    public function setSecondOutMeetings($secondOutMeetings)
    {
        $this->secondOutMeetings = $secondOutMeetings;

        return $this;
    }

    /**
     * Get secondOutMeetings
     *
     * @return integer
     */
    public function getSecondOutMeetings()
    {
        return $this->secondOutMeetings;
    }

    /**
     * Set secondOutMeetingsCalc
     *
     * @param integer $secondOutMeetingsCalc
     * @return EmployeesDailyStatistic
     */
    public function setSecondOutMeetingsCalc($secondOutMeetingsCalc)
    {
        $this->secondOutMeetingsCalc = $secondOutMeetingsCalc;

        return $this;
    }

    /**
     * Get secondOutMeetingsCalc
     *
     * @return integer
     */
    public function getSecondOutMeetingsCalc()
    {
        return $this->secondOutMeetingsCalc;
    }

    /**
     * Set supportMeetings
     *
     * @param integer $supportMeetings
     * @return EmployeesDailyStatistic
     */
    public function setSupportMeetings($supportMeetings)
    {
        $this->supportMeetings = $supportMeetings;

        return $this;
    }

    /**
     * Get supportMeetings
     *
     * @return integer
     */
    public function getSupportMeetings()
    {
        return $this->supportMeetings;
    }

    /**
     * Set supportMeetingsCalc
     *
     * @param integer $supportMeetingsCalc
     * @return EmployeesDailyStatistic
     */
    public function setSupportMeetingsCalc($supportMeetingsCalc)
    {
        $this->supportMeetingsCalc = $supportMeetingsCalc;

        return $this;
    }

    /**
     * Get supportMeetingsCalc
     *
     * @return integer
     */
    public function getSupportMeetingsCalc()
    {
        return $this->supportMeetingsCalc;
    }

    /**
     * Set meetingsCompanion
     *
     * @param integer $meetingsCompanion
     *
     * @return EmployeesDailyStatistic
     */
    public function setMeetingsCompanion($meetingsCompanion)
    {
        $this->meetingsCompanion = $meetingsCompanion;

        return $this;
    }

    /**
     * Get meetingsCompanion
     *
     * @return integer
     */
    public function getMeetingsCompanion()
    {
        return $this->meetingsCompanion;
    }

    /**
     * Set meetingsCompanionCalc
     *
     * @param integer $meetingsCompanionCalc
     *
     * @return EmployeesDailyStatistic
     */
    public function setMeetingsCompanionCalc($meetingsCompanionCalc)
    {
        $this->meetingsCompanionCalc = $meetingsCompanionCalc;

        return $this;
    }

    /**
     * Get meetingsCompanionCalc
     *
     * @return integer
     */
    public function getMeetingsCompanionCalc()
    {
        return $this->meetingsCompanionCalc;
    }

    /**
     * Set supportMeetingsCompanion
     *
     * @param integer $supportMeetingsCompanion
     *
     * @return EmployeesDailyStatistic
     */
    public function setSupportMeetingsCompanion($supportMeetingsCompanion)
    {
        $this->supportMeetingsCompanion = $supportMeetingsCompanion;

        return $this;
    }

    /**
     * Get supportMeetingsCompanion
     *
     * @return integer
     */
    public function getSupportMeetingsCompanion()
    {
        return $this->supportMeetingsCompanion;
    }

    /**
     * Set supportMeetingsCompanionCalc
     *
     * @param integer $supportMeetingsCompanionCalc
     *
     * @return EmployeesDailyStatistic
     */
    public function setSupportMeetingsCompanionCalc($supportMeetingsCompanionCalc)
    {
        $this->supportMeetingsCompanionCalc = $supportMeetingsCompanionCalc;

        return $this;
    }

    /**
     * Get supportMeetingsCompanionCalc
     *
     * @return integer
     */
    public function getSupportMeetingsCompanionCalc()
    {
        return $this->supportMeetingsCompanionCalc;
    }

    /**
     * Set firstInterviews
     *
     * @param integer $firstInterviews
     *
     * @return EmployeesDailyStatistic
     */
    public function setFirstInterviews($firstInterviews)
    {
        $this->firstInterviews = $firstInterviews;

        return $this;
    }

    /**
     * Get firstInterviews
     *
     * @return integer
     */
    public function getFirstInterviews()
    {
        return $this->firstInterviews;
    }

    /**
     * Set trainees
     *
     * @param integer $trainees
     *
     * @return EmployeesDailyStatistic
     */
    public function setTrainees($trainees)
    {
        $this->trainees = $trainees;

        return $this;
    }

    /**
     * Get trainees
     *
     * @return integer
     */
    public function getTrainees()
    {
        return $this->trainees;
    }

    /**
     * Set recommendations
     *
     * @param integer $recommendations
     *
     * @return EmployeesDailyStatistic
     */
    public function setRecommendations($recommendations)
    {
        $this->recommendations = $recommendations;

        return $this;
    }

    /**
     * Get recommendations
     *
     * @return integer
     */
    public function getRecommendations()
    {
        return $this->recommendations;
    }

    /**
     * Set signedContracts
     *
     * @param integer $signedContracts
     *
     * @return EmployeesDailyStatistic
     */
    public function setSignedContracts($signedContracts)
    {
        $this->signedContracts = $signedContracts;

        return $this;
    }

    /**
     * Get signedContracts
     *
     * @return integer
     */
    public function getSignedContracts()
    {
        return $this->signedContracts;
    }

    /**
     * Set acquisitionCmfs
     *
     * @param integer $acquisitionCmfs
     *
     * @return EmployeesDailyStatistic
     */
    public function setAcquisitionCmfs($acquisitionCmfs)
    {
        $this->acquisitionCmfs = $acquisitionCmfs;

        return $this;
    }

    /**
     * Get acquisitionCmfs
     *
     * @return integer
     */
    public function getAcquisitionCmfs()
    {
        return $this->acquisitionCmfs;
    }

    /**
     * Set acquisitionFcsAndTms
     *
     * @param integer $acquisitionFcsAndTms
     *
     * @return EmployeesDailyStatistic
     */
    public function setAcquisitionFcsAndTms($acquisitionFcsAndTms)
    {
        $this->acquisitionFcsAndTms = $acquisitionFcsAndTms;

        return $this;
    }

    /**
     * Get acquisitionFcsAndTms
     *
     * @return integer
     */
    public function getAcquisitionFcsAndTms()
    {
        return $this->acquisitionFcsAndTms;
    }

    /**
     * Set replenishmentDeals
     *
     * @param integer $replenishmentDeals
     *
     * @return EmployeesDailyStatistic
     */
    public function setReplenishmentDeals($replenishmentDeals)
    {
        $this->replenishmentDeals = $replenishmentDeals;

        return $this;
    }

    /**
     * Get replenishmentDeals
     *
     * @return integer
     */
    public function getReplenishmentDeals()
    {
        return $this->replenishmentDeals;
    }
}