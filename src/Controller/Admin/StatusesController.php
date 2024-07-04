<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Statuses Controller
 *
 * @property \App\Model\Table\StatusesTable $Statuses
 */
class StatusesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Statuses->find()
            ->contain(['Users', 'Projects']);
        $statuses = $this->paginate($query);

        $this->set(compact('statuses'));
    }

    /**
     * View method
     *
     * @param string|null $id Status id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $status = $this->Statuses->get($id, contain: ['Users', 'Projects', 'Issues']);
        $this->set(compact('status'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $status = $this->Statuses->newEmptyEntity();
        if ($this->request->is('post')) {
            $status = $this->Statuses->patchEntity($status, $this->request->getData());
            if ($this->Statuses->save($status)) {
                $this->Flash->success(__('The status has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The status could not be saved. Please, try again.'));
        }
        $users = $this->Statuses->Users->find('list', limit: 200)->all();
        $projects = $this->Statuses->Projects->find('list', limit: 200)->all();
        $this->set(compact('status', 'users', 'projects'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Status id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $status = $this->Statuses->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $status = $this->Statuses->patchEntity($status, $this->request->getData());
            if ($this->Statuses->save($status)) {
                $this->Flash->success(__('The status has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The status could not be saved. Please, try again.'));
        }
        $users = $this->Statuses->Users->find('list', limit: 200)->all();
        $projects = $this->Statuses->Projects->find('list', limit: 200)->all();
        $this->set(compact('status', 'users', 'projects'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Status id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $status = $this->Statuses->get($id);
        if ($this->Statuses->delete($status)) {
            $this->Flash->success(__('The status has been deleted.'));
        } else {
            $this->Flash->error(__('The status could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
