<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * ProjectsTrackers Controller
 *
 * @property \App\Model\Table\ProjectsTrackersTable $ProjectsTrackers
 */
class ProjectsTrackersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->ProjectsTrackers->find()
            ->contain(['Projects', 'Trackers']);
        $projectsTrackers = $this->paginate($query);

        $this->set(compact('projectsTrackers'));
    }

    /**
     * View method
     *
     * @param string|null $id Projects Tracker id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $projectsTracker = $this->ProjectsTrackers->get($id, contain: ['Projects', 'Trackers']);
        $this->set(compact('projectsTracker'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $projectsTracker = $this->ProjectsTrackers->newEmptyEntity();
        if ($this->request->is('post')) {
            $projectsTracker = $this->ProjectsTrackers->patchEntity($projectsTracker, $this->request->getData());
            if ($this->ProjectsTrackers->save($projectsTracker)) {
                $this->Flash->success(__('The projects tracker has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The projects tracker could not be saved. Please, try again.'));
        }
        $projects = $this->ProjectsTrackers->Projects->find('list', limit: 200)->all();
        $trackers = $this->ProjectsTrackers->Trackers->find('list', limit: 200)->all();
        $this->set(compact('projectsTracker', 'projects', 'trackers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Projects Tracker id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $projectsTracker = $this->ProjectsTrackers->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $projectsTracker = $this->ProjectsTrackers->patchEntity($projectsTracker, $this->request->getData());
            if ($this->ProjectsTrackers->save($projectsTracker)) {
                $this->Flash->success(__('The projects tracker has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The projects tracker could not be saved. Please, try again.'));
        }
        $projects = $this->ProjectsTrackers->Projects->find('list', limit: 200)->all();
        $trackers = $this->ProjectsTrackers->Trackers->find('list', limit: 200)->all();
        $this->set(compact('projectsTracker', 'projects', 'trackers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Projects Tracker id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $projectsTracker = $this->ProjectsTrackers->get($id);
        if ($this->ProjectsTrackers->delete($projectsTracker)) {
            $this->Flash->success(__('The projects tracker has been deleted.'));
        } else {
            $this->Flash->error(__('The projects tracker could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
