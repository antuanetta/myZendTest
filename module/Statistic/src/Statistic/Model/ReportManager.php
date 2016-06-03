<?php
namespace Statistic\Model;

use Doctrine\ORM\EntityManager;

/**
 * Filtered Statistic Report Manager
 */
class ReportManager
{
    const KEY_DATE_FROM = 'dateFrom';
    const KEY_DATE_TO = 'dateBefore';

    /**
     * Extra criteria
     * @var array $filter
     */
    protected $filter = [];

    /**
     * Entity manager
     * todo:
     * @var EntityManager $em
     */
    protected $em = null;

    /**
     * Statistic Manager
     * @var null
     */
    protected $sm = null;

    /**
     * StatisticManager constructor.
     *
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @param array $filter
     * @throws \Exception
     */
    protected function setFilter($filter)
    {
        if (!empty($filter[self::KEY_DATE_FROM])) {
            $this->setFilterDate(self::KEY_DATE_FROM, $filter[self::KEY_DATE_FROM]);
        }

        if (!empty($filter[self::KEY_DATE_TO])){
            $this->setFilterDate(self::KEY_DATE_TO, $filter[self::KEY_DATE_TO]);
        }
    }

    /**
     * Check date value stored in filter under $filterKey key
     * @param string $filterKey
     * @param string $value
     *
     * @return StatisticReportManager
     * @throws \Exception
     */
    private function setFilterDate($filterKey, $value)
    {
        try {
            $date = new \DateTime('@' . $value);
            $this->filter[$filterKey] =  $value;
        } catch (\Exception $exception) {
            throw new \Exception('Неправильный формат даты');
        }

        return $this;
    }

    /**
     * @return \Advisor\Model\CallsRepository
     */
    protected function getCallsRepository()
    {
        return $this->em->getRepository('Advisor\Entity\Calls');
    }

    /**
     * @return \Contacts\Model\ContactsRepository
     */
    protected function getContactsRepository()
    {
        return $this->em->getRepository('Contacts\Entity\Contacts');
    }

    /**
     * @return \Advisor\Model\MeetingsRepository
     */
    protected function getMeetingsRepository()
    {
        return $this->em->getRepository('Advisor\Entity\Meetings');
    }

    /**
     * @return \Employees\Model\EmployeesRepository
     */
    protected function getEmployeesRepository()
    {
        return $this->em->getRepository('Employees\Entity\Employees');
    }

    /**
     * @return \Statistic\Model\DivisionRepository
     */
    protected function getDivisionRepository()
    {
        return $this->em->getRepository('Statistic\Entity\Division');
    }
}