<?php
/**
 * Statistic Entity file
 */
namespace Statistic\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Worklog Entity Class
 *
 * @ORM\Table(name="divisions", options={"collate"="utf8_general_ci", "charset"="utf8"})
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="Statistic\Model\DivisionRepository")
 */
class Division
{

    /**
     * Primary Key
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     */
    private $id;
    
    /**
     * Parent Division ID
     * @var integer
     * 
     * @ORM\ManyToOne(targetEntity="Statistic\Entity\Division",inversedBy="id")
     * @ORM\JoinColumn(name="parentDivId", referencedColumnName="id", nullable=true)*
     */
    private $parentDivId;

    /**
     * Employee to log work
     * @var \Employees\Entity\Employees
     *
     * @ORM\ManyToOne(targetEntity="Employees\Entity\Employees")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="bossId", referencedColumnName="id")
     * })
     */
    private $bossId;

    /**
     * Boss job title short
     * @var string
     *
     * @ORM\Column(name="bossTitleShort", type="string", length=32, nullable=true)
     */
    private $bossTitleShort;

    /**
     * Division name
     * @var string
     *
     * @ORM\Column(name="divName", type="string", length=32, nullable=true)
     */
    private $divName;

    /**
     * Symbolic Code of division
     * @var string
     *
     * @ORM\Column(name="symCode", type="string", length=32, nullable=true)
     */
    private $symCode;


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
     * @param \Employees\Entity\Employees $employeeId
     * @return Worklog
     */
    public function setBossId(\Employees\Entity\Employees $bossId = null)
    {
        $this->bossId = $bossId;

        return $this;
    }

    /**
     * Get employeeId
     *
     * @return \Employees\Entity\Employees
     */
    public function getBossId()
    {
        return $this->bossId;
    }

    public function setTitleShort($title)
    {
        $this->bossTitleShort = $title;
    }

    public function getBossTitleShort()
    {
        return $this->bossTitleShort;
    }

    /**
     * Set divName
     * @param string $divName
     * @return Division
     */
    public function setDivName($divName)
    {
        $this->divName = $divName;

        return $this;
    }

    /**
     * Get divName
     * @return string
     */
    public function getDivName()
    {
        return $this->divName;
    }

    /**
     * Set symCode
     * @param string $symCode
     * @return Division
     */
    public function setSymCode($symCode)
    {
        $this->symCode = $symCode;

        return $this;
    }

    /**
     * Get symCode timestamp
     * @return string
     */
    public function getSymCode()
    {
        return $this->symCode;
    }

    public function getParentDivId()
    {
        return $this->parentDivId;
    }
    
    /**
     * Get title timestamp
     * @return string
     */
    public function getTitle()
    {
        return $this->getDivName() . ' (' . $this->getSymCode() . ')';
    }
}
