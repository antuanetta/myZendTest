<?php

namespace Statistic\Model;

use Statistic\Entity\Division;

/**
 * Class DivisionInfo
 * @package Statistic\Model
 */
class DivisionInfo
{
    /**
     * Division ID
     * @return number
     */
    protected $id;

    /**
     * Division symCode
     * @return string
     */
    protected $symCode;

    /**
     * Division name
     * @return string
     */
    protected $divisionName;

    /**
     * Department Boss Id
     * @var int;
     */
    protected $bossId;

    /**
     * Department Boss FIO
     * @var string;
     */
    protected $bossFIO;

    /**
     * Department Boss job title
     * @var string;
     */
    protected $bossTitleShort;

    /**
     * DivisionInfo constructor.
     * @param Division|null    $division
     */
    public function __construct($division)
    {
        $this->id = $division->getId();
        $this->setSymCode($division->getSymCode());
        $this->setDivisionName($division->getDivName());

        $boss = $division->getBossId();
        $this->setBossId($boss->getId());
        // todo rewrite
        $this->setBossFIO($boss->getLastName() . ' ' . $boss->getFirstName() . '. ' . $boss->getPatronymic() . '.');
        $this->setBossTitleShort($division->getBossTitleShort());
    }

    public function getDivisionId()
    {
        return $this->id;
    }

    public function getSymCode()
    {
        return $this->symCode;
    }

    public function setSymCode($symCode)
    {
        $this->symCode = $symCode;
    }

    public function getDivisionName()
    {
        return $this->divisionName;
    }

    public function setDivisionName($divisionName)
    {
        $this->divisionName = $divisionName;
    }

    public function setBossId($bossId)
    {
        $this->bossId = $bossId;
    }

    public function getBossFIO()
    {
        return $this->bossFIO;
    }

    public function setBossFIO($boss)
    {
        $this->bossFIO = $boss;
    }

    public function setBossTitleShort($boss)
    {
        $this->bossTitleShort = $boss;
    }
}