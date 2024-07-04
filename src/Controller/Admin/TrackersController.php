<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Trackers Controller
 *
 * @property \App\Model\Table\TrackersTable $Trackers
 */
class TrackersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Trackers->find();
        $trackers = $this->paginate($query);

        $this->set(compact('trackers'));
    }

    /**
     * View method
     *
     * @param string|null $id Tracker id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tracker = $this->Trackers->get($id, contain: ['Projects', 'Issues']);
        $this->set(compact('tracker'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tracker = $this->Trackers->newEmptyEntity();
        if ($this->request->is('post')) {
            $tracker = $this->Trackers->patchEntity($tracker, $this->request->getData());
            if ($this->Trackers->save($tracker)) {
                $this->Flash->success(__('The tracker has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tracker could not be saved. Please, try again.'));
        }
        $projects = $this->Trackers->Projects->find('list', limit: 200)->all();
        $this->set(compact('tracker', 'projects'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tracker id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tracker = $this->Trackers->get($id, contain: ['Projects']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tracker = $this->Trackers->patchEntity($tracker, $this->request->getData());
            if ($this->Trackers->save($tracker)) {
                $this->Flash->success(__('The tracker has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tracker could not be saved. Please, try again.'));
        }
        $projects = $this->Trackers->Projects->find('list', limit: 200)->all();
        $this->set(compact('tracker', 'projects'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tracker id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tracker = $this->Trackers->get($id);
        if ($this->Trackers->delete($tracker)) {
            $this->Flash->success(__('The tracker has been deleted.'));
        } else {
            $this->Flash->error(__('The tracker could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
