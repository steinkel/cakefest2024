<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * IssueCategories Controller
 *
 * @property \App\Model\Table\IssueCategoriesTable $IssueCategories
 */
class IssueCategoriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->IssueCategories->find()
            ->contain(['Projects']);
        $issueCategories = $this->paginate($query);

        $this->set(compact('issueCategories'));
    }

    /**
     * View method
     *
     * @param string|null $id Issue Category id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $issueCategory = $this->IssueCategories->get($id, contain: ['Projects']);
        $this->set(compact('issueCategory'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $issueCategory = $this->IssueCategories->newEmptyEntity();
        if ($this->request->is('post')) {
            $issueCategory = $this->IssueCategories->patchEntity($issueCategory, $this->request->getData());
            if ($this->IssueCategories->save($issueCategory)) {
                $this->Flash->success(__('The issue category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The issue category could not be saved. Please, try again.'));
        }
        $projects = $this->IssueCategories->Projects->find('list', limit: 200)->all();
        $this->set(compact('issueCategory', 'projects'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Issue Category id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $issueCategory = $this->IssueCategories->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $issueCategory = $this->IssueCategories->patchEntity($issueCategory, $this->request->getData());
            if ($this->IssueCategories->save($issueCategory)) {
                $this->Flash->success(__('The issue category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The issue category could not be saved. Please, try again.'));
        }
        $projects = $this->IssueCategories->Projects->find('list', limit: 200)->all();
        $this->set(compact('issueCategory', 'projects'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Issue Category id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $issueCategory = $this->IssueCategories->get($id);
        if ($this->IssueCategories->delete($issueCategory)) {
            $this->Flash->success(__('The issue category has been deleted.'));
        } else {
            $this->Flash->error(__('The issue category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
