<?php

namespace Statistic\Model;

use Doctrine\ORM\EntityRepository;
use Statistic\Entity\EmployeesDailyStatistic;

class EmployeesDailyStatisticRepository extends EntityRepository
{
    /**
     * Get statistic for specified divisions for specified time interval
     * @param array $ids     divisions ids list
     * @param array $filter  additional parameters (time interval)
     * @return array
     */
    public function getDivisionsStatistic($ids, $filter = [])
    {
        $select = $this->getEntityManager()->createQueryBuilder();

        $select->select([
            'c.divisionId',
            'COUNT(DISTINCT c.employeeId) AS numEmployees',
            'SUM(COALESCE(c.firstCalls, c.firstCallsCalc)) AS firstCalls',
            'SUM(COALESCE(c.preSaleCalls, c.preSaleCallsCalc)) AS preSaleCalls',
            'SUM(COALESCE(c.saleCalls, c.saleCallsCalc)) AS saleCalls',
            'SUM(COALESCE(c.afterSaleCalls, c.afterSaleCallsCalc)) AS afterSaleCalls',
            'SUM(COALESCE(c.appointedMeetings, c.appointedMeetingsCalc)) AS appointedMeetings',
            'SUM(COALESCE(c.firstOfficeMeetings, c.firstOfficeMeetingsCalc)) AS firstOfficeMeetings',
            'SUM(COALESCE(c.firstOutMeetings, c.firstOutMeetingsCalc)) AS firstOutMeetings',
            'SUM(COALESCE(c.firstOfficeMeetings, c.firstOfficeMeetingsCalc, 0) + COALESCE(c.firstOutMeetings, c.firstOutMeetingsCalc, 0)) AS firstMeetings',
            'SUM(COALESCE(c.secondOfficeMeetings, c.secondOfficeMeetingsCalc)) AS secondOfficeMeetings',
            'SUM(COALESCE(c.secondOutMeetings, c.secondOutMeetingsCalc)) AS secondOutMeetings',
            'SUM(COALESCE(c.secondOfficeMeetings, c.secondOfficeMeetingsCalc, 0) + COALESCE(c.secondOutMeetings, c.secondOutMeetingsCalc, 0)) AS secondMeetings',
            'SUM(COALESCE(c.supportMeetings, c.supportMeetingsCalc)) AS supportMeeting',
            'SUM(COALESCE(c.firstOfficeMeetings, c.firstOfficeMeetingsCalc, 0) + COALESCE(c.firstOutMeetings, c.firstOutMeetingsCalc, 0)
                + COALESCE(c.secondOfficeMeetings, c.secondOfficeMeetingsCalc, 0) + COALESCE(c.secondOutMeetings, c.secondOutMeetingsCalc, 0)
                + COALESCE(c.supportMeetings, c.supportMeetingsCalc, 0)) AS meetingsTotal',
            'SUM(COALESCE(c.meetingsCompanion, c.meetingsCompanionCalc)) AS meetingsCompanion',
            'SUM(COALESCE(c.supportMeetingsCompanion, c.supportMeetingsCompanionCalc)) AS supportMeetingsCompanion',
            'SUM(c.firstInterviews) AS firstInterviews',
            'SUM(c.trainees) AS trainees',
            'SUM(c.recommendations) AS recommendations',
            'SUM(c.signedContracts) AS signedContracts',
            'SUM(c.acquisitionCmfs) AS acquisitionCmfs',
            'SUM(c.acquisitionFcsAndTms) AS acquisitionFcsAndTms',
            'SUM(COALESCE(c.acquisitionCmfs, 0) + COALESCE(c.acquisitionFcsAndTms, 0)) AS acquisitionTotal',
            'SUM(c.replenishmentDeals) AS replenishmentDeals',
            'SUM(COALESCE(c.acquisitionCmfs, 0) + COALESCE(c.acquisitionFcsAndTms, 0) + COALESCE(c.replenishmentDeals, 0)) AS salesTotal'
        ])
            ->from('Statistic\Entity\EmployeesDailyStatistic', 'c')
            ->where('c.divisionId in (:divisions)')
            ->groupBy('c.divisionId')
            ->setParameters([
                'divisions' => $ids,
            ])
            ->indexBy('c', 'c.divisionId');

        // todo timezone?
        if(!empty($filter['dateFrom'])){
            $select->andWhere('c.reportDate >= :from')->setParameter('from', gmdate('Y-m-d', $filter['dateFrom']));
        }
        if(!empty($filter['dateBefore'])){
            $select->andWhere('c.reportDate <= :before')->setParameter('before', gmdate('Y-m-d', $filter['dateBefore']));
        }

        return $select->getQuery()->getArrayResult();
    }
}