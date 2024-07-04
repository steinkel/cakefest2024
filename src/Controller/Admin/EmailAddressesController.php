<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * EmailAddresses Controller
 *
 * @property \App\Model\Table\EmailAddressesTable $EmailAddresses
 */
class EmailAddressesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->EmailAddresses->find()
            ->contain(['Users']);
        $emailAddresses = $this->paginate($query);

        $this->set(compact('emailAddresses'));
    }

    /**
     * View method
     *
     * @param string|null $id Email Address id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $emailAddress = $this->EmailAddresses->get($id, contain: ['Users']);
        $this->set(compact('emailAddress'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $emailAddress = $this->EmailAddresses->newEmptyEntity();
        if ($this->request->is('post')) {
            $emailAddress = $this->EmailAddresses->patchEntity($emailAddress, $this->request->getData());
            if ($this->EmailAddresses->save($emailAddress)) {
                $this->Flash->success(__('The email address has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The email address could not be saved. Please, try again.'));
        }
        $users = $this->EmailAddresses->Users->find('list', limit: 200)->all();
        $this->set(compact('emailAddress', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Email Address id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $emailAddress = $this->EmailAddresses->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $emailAddress = $this->EmailAddresses->patchEntity($emailAddress, $this->request->getData());
            if ($this->EmailAddresses->save($emailAddress)) {
                $this->Flash->success(__('The email address has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The email address could not be saved. Please, try again.'));
        }
        $users = $this->EmailAddresses->Users->find('list', limit: 200)->all();
        $this->set(compact('emailAddress', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Email Address id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $emailAddress = $this->EmailAddresses->get($id);
        if ($this->EmailAddresses->delete($emailAddress)) {
            $this->Flash->success(__('The email address has been deleted.'));
        } else {
            $this->Flash->error(__('The email address could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
