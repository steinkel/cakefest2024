<?php
declare(strict_types=1);

namespace ReportBuilder\Controller;

use Cake\Datasource\Paging\SimplePaginator;
use Cake\ORM\Locator\LocatorAwareTrait;

/**
 * Reports Controller
 *
 * @property \ReportBuilder\Model\Table\ReportsTable $Reports
 */
class ApiController extends AppController
{
    use LocatorAwareTrait;

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index(int $id)
    {
        $reportsTable = $this->fetchTable('ReportBuilder.Reports');
        $report = $reportsTable->get($id, contain: ['Associations']);
        $paginator = new SimplePaginator();
        $reportRun = $paginator->paginate(
            $reportsTable->run($report),
            $this->request->getQueryParams()
        );

        $this->set(compact('reportRun'));
        $this->viewBuilder()->setOption('serialize', ['reportRun']);
        // forced to return json
        $this->viewBuilder()->setClassName('Json');
    }
}
