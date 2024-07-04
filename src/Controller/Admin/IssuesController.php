<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Issues Controller
 *
 * @property \App\Model\Table\IssuesTable $Issues
 */
class IssuesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Issues->find()
            ->contain(['Trackers', 'Projects', 'Statuses', 'ParentIssues']);
        $issues = $this->paginate($query);

        $this->set(compact('issues'));
    }

    /**
     * View method
     *
     * @param string|null $id Issue id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $issue = $this->Issues->get($id, contain: ['Trackers', 'Projects', 'Statuses', 'ParentIssues', 'ChildIssues', 'TimeEntries']);
        $this->set(compact('issue'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $issue = $this->Issues->newEmptyEntity();
        if ($this->request->is('post')) {
            $issue = $this->Issues->patchEntity($issue, $this->request->getData());
            if ($this->Issues->save($issue)) {
                $this->Flash->success(__('The issue has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The issue could not be saved. Please, try again.'));
        }
        $trackers = $this->Issues->Trackers->find('list', limit: 200)->all();
        $projects = $this->Issues->Projects->find('list', limit: 200)->all();
        $statuses = $this->Issues->Statuses->find('list', limit: 200)->all();
        $parentIssues = $this->Issues->ParentIssues->find('list', limit: 200)->all();
        $this->set(compact('issue', 'trackers', 'projects', 'statuses', 'parentIssues'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Issue id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $issue = $this->Issues->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $issue = $this->Issues->patchEntity($issue, $this->request->getData());
            if ($this->Issues->save($issue)) {
                $this->Flash->success(__('The issue has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The issue could not be saved. Please, try again.'));
        }
        $trackers = $this->Issues->Trackers->find('list', limit: 200)->all();
        $projects = $this->Issues->Projects->find('list', limit: 200)->all();
        $statuses = $this->Issues->Statuses->find('list', limit: 200)->all();
        $parentIssues = $this->Issues->ParentIssues->find('list', limit: 200)->all();
        $this->set(compact('issue', 'trackers', 'projects', 'statuses', 'parentIssues'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Issue id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $issue = $this->Issues->get($id);
        if ($this->Issues->delete($issue)) {
            $this->Flash->success(__('The issue has been deleted.'));
        } else {
            $this->Flash->error(__('The issue could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
