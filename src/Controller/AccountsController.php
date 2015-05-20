<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Accounts Controller
 *
 * @property \App\Model\Table\AccountsTable $Accounts
 */
class AccountsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('accounts', $this->paginate($this->Accounts));
        $this->set('_serialize', ['accounts']);
    }

    /**
     * View method
     *
     * @param string|null $id Account id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $account = $this->Accounts->get($id, [
            'contain' => ['Credits', 'Projects', 'Purchases']
        ]);
        $this->set('account', $account);
        $this->set('_serialize', ['account']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $account = $this->Accounts->newEntity();
        if ($this->request->is('post')) {
            $account = $this->Accounts->patchEntity($account, $this->request->data);
            if ($this->Accounts->save($account)) {
                $this->Flash->success('The account has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The account could not be saved. Please, try again.');
            }
        }
        $this->set(compact('account'));
        $this->set('_serialize', ['account']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Account id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $account = $this->Accounts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $account = $this->Accounts->patchEntity($account, $this->request->data);
            if ($this->Accounts->save($account)) {
                $this->Flash->success('The account has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The account could not be saved. Please, try again.');
            }
        }
        $this->set(compact('account'));
        $this->set('_serialize', ['account']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Account id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $account = $this->Accounts->get($id);
        if ($this->Accounts->delete($account)) {
            $this->Flash->success('The account has been deleted.');
        } else {
            $this->Flash->error('The account could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
