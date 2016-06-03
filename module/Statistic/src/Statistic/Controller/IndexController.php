<?php
namespace Statistic\Controller;
use Statistic\Model\DailyReportManager;
use Zend\Http\Request;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Core\Controller;
use Core\Model;
use Statistic\Model\StatisticReportManager;
use Statistic\Model\ConsolidatedReportManager;
/**
 * @package Statistic\Controller
 */
class IndexController extends AbstractActionController
{
    const CSVFILENAME = 'Статистика_финансовых_советников';
    use Controller\Traits\File, Model\Traits\Doctrine;


    /**
     * Get Consolidated Report
     * @return JsonModel
     */
    public function consolidatedReportAction()
    {
        $post = $this->params()->fromPost('filter');

        $filter['dateFrom'] = isset($post['dateFromUTCTimestamp']) ? $post['dateFromUTCTimestamp'] : null;
        $filter['dateBefore'] = isset($post['dateBeforeUTCTimestamp']) ? $post['dateBeforeUTCTimestamp'] : null;
        $filter['calculationPeriod'] = isset($post['calculationPeriod']) ? $post['calculationPeriod'] : null;

        $statisticManager = new ConsolidatedReportManager($this->getEntityManager());
        $statistics = $statisticManager->getStatistic($filter);

        return new JsonModel([
            'statistic' => $statistics->getArray()
        ]);
    }


}
