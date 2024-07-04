<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * MemberRoles Controller
 *
 * @property \App\Model\Table\MemberRolesTable $MemberRoles
 */
class MemberRolesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->MemberRoles->find()
            ->contain(['Members', 'Roles']);
        $memberRoles = $this->paginate($query);

        $this->set(compact('memberRoles'));
    }

    /**
     * View method
     *
     * @param string|null $id Member Role id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $memberRole = $this->MemberRoles->get($id, contain: ['Members', 'Roles']);
        $this->set(compact('memberRole'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $memberRole = $this->MemberRoles->newEmptyEntity();
        if ($this->request->is('post')) {
            $memberRole = $this->MemberRoles->patchEntity($memberRole, $this->request->getData());
            if ($this->MemberRoles->save($memberRole)) {
                $this->Flash->success(__('The member role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The member role could not be saved. Please, try again.'));
        }
        $members = $this->MemberRoles->Members->find('list', limit: 200)->all();
        $roles = $this->MemberRoles->Roles->find('list', limit: 200)->all();
        $this->set(compact('memberRole', 'members', 'roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Member Role id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $memberRole = $this->MemberRoles->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $memberRole = $this->MemberRoles->patchEntity($memberRole, $this->request->getData());
            if ($this->MemberRoles->save($memberRole)) {
                $this->Flash->success(__('The member role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The member role could not be saved. Please, try again.'));
        }
        $members = $this->MemberRoles->Members->find('list', limit: 200)->all();
        $roles = $this->MemberRoles->Roles->find('list', limit: 200)->all();
        $this->set(compact('memberRole', 'members', 'roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Member Role id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $memberRole = $this->MemberRoles->get($id);
        if ($this->MemberRoles->delete($memberRole)) {
            $this->Flash->success(__('The member role has been deleted.'));
        } else {
            $this->Flash->error(__('The member role could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
