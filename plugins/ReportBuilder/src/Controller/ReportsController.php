<?php
declare(strict_types=1);

namespace ReportBuilder\Controller;

/**
 * Reports Controller
 *
 * @property \ReportBuilder\Model\Table\ReportsTable $Reports
 */
class ReportsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Reports->find()->contain('Associations');
        $reports = $this->paginate($query);

        $this->set(compact('reports'));
    }

    /**
     * View method
     *
     * @param string|null $id Report id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $report = $this->Reports->get($id, contain: []);
        $this->set(compact('report'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $report = $this->Reports->newEmptyEntity();
        if ($this->request->is('post')) {
            $report = $this->Reports->patchEntity($report, $this->request->getData());
            if ($this->Reports->save($report)) {
                $this->Flash->success(__('The report has been saved.'));

                return $this->redirect([
                    'action' => 'editAssociations',
                    $report->id,
                ]);
            }
            $this->Flash->error(__('The report could not be saved. Please, try again.'));
        }
        $this->set(compact('report'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Report id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $report = $this->Reports->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $report = $this->Reports->patchEntity($report, $this->request->getData());
            if ($this->Reports->save($report)) {
                $this->Flash->success(__('The report has been saved.'));

                return $this->redirect([
                    'action' => 'editAssociations',
                    $report->id,
                ]);
            }
            $this->Flash->error(__('The report could not be saved. Please, try again.'));
        }
        $this->set(compact('report'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Report id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $report = $this->Reports->get($id);
        if ($this->Reports->delete($report)) {
            $this->Flash->success(__('The report has been deleted.'));
        } else {
            $this->Flash->error(__('The report could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function editAssociations(int $id, ?string $association = null)
    {
        $this->navigateAssociations($id, $association);
        $this->viewBuilder()->enableAutoLayout();
    }

    public function navigateAssociations(int $id, ?string $association = null)
    {
        $report = $this->Reports->get($id);
        $startingTable = $report->starting_table;
        [$currentTable, $tableAssociations] = $this->Reports->goToAssociation($startingTable, $association);
        $this->set(compact('report', 'currentTable', 'tableAssociations', 'startingTable', 'association'));
        $this->viewBuilder()->disableAutoLayout();
    }

    public function addAssociation(int $id, ?string $association = null)
    {
        $result = 'OK';
        $message = __('Association saved');
        $association = $this->fetchTable('ReportBuilder.Associations')
            ->findOrCreate([
                'report_id' => $id,
                'name' => $association,
            ]);
        if (!$association) {
            $result = 'FAILED';
            $message = __('Unable to save association');
        }

        $this->set(compact('result', 'message'));
        $this->viewBuilder()->setOption('serialize', ['result', 'message']);
        // forced to return json
        $this->viewBuilder()->setClassName('Json');
    }

    public function selectColumns(int $id)
    {
        $report = $this->Reports->get($id, contain: ['Associations']);
        $this->set(compact('report'));
        if ($this->request->is('post')) {
            if ($this->Reports->saveAssociationColumns($report, $this->request->getData())) {
                $this->Flash->success(__('Columns saved'));
                dd($report);

                return $this->redirect([
                    'action' => 'editFilters',
                    $report->id,
                ]);
            }

            $this->Flash->error(__('Unable to save association columns'));
        }
    }
}
