<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * TimeEntries Controller
 *
 * @property \App\Model\Table\TimeEntriesTable $TimeEntries
 */
class TimeEntriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->TimeEntries->find()
            ->contain(['Projects', 'Users', 'Issues']);
        $timeEntries = $this->paginate($query);

        $this->set(compact('timeEntries'));
    }

    /**
     * View method
     *
     * @param string|null $id Time Entry id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $timeEntry = $this->TimeEntries->get($id, contain: ['Projects', 'Users', 'Issues']);
        $this->set(compact('timeEntry'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $timeEntry = $this->TimeEntries->newEmptyEntity();
        if ($this->request->is('post')) {
            $timeEntry = $this->TimeEntries->patchEntity($timeEntry, $this->request->getData());
            if ($this->TimeEntries->save($timeEntry)) {
                $this->Flash->success(__('The time entry has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The time entry could not be saved. Please, try again.'));
        }
        $projects = $this->TimeEntries->Projects->find('list', limit: 200)->all();
        $users = $this->TimeEntries->Users->find('list', limit: 200)->all();
        $issues = $this->TimeEntries->Issues->find('list', limit: 200)->all();
        $this->set(compact('timeEntry', 'projects', 'users', 'issues'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Time Entry id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $timeEntry = $this->TimeEntries->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $timeEntry = $this->TimeEntries->patchEntity($timeEntry, $this->request->getData());
            if ($this->TimeEntries->save($timeEntry)) {
                $this->Flash->success(__('The time entry has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The time entry could not be saved. Please, try again.'));
        }
        $projects = $this->TimeEntries->Projects->find('list', limit: 200)->all();
        $users = $this->TimeEntries->Users->find('list', limit: 200)->all();
        $issues = $this->TimeEntries->Issues->find('list', limit: 200)->all();
        $this->set(compact('timeEntry', 'projects', 'users', 'issues'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Time Entry id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $timeEntry = $this->TimeEntries->get($id);
        if ($this->TimeEntries->delete($timeEntry)) {
            $this->Flash->success(__('The time entry has been deleted.'));
        } else {
            $this->Flash->error(__('The time entry could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
