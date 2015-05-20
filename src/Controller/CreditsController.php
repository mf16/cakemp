<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Credits Controller
 *
 * @property \App\Model\Table\CreditsTable $Credits
 */
class CreditsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Purchases', 'Accounts']
        ];
        $this->set('credits', $this->paginate($this->Credits));
        $this->set('_serialize', ['credits']);
    }

    /**
     * View method
     *
     * @param string|null $id Credit id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $credit = $this->Credits->get($id, [
            'contain' => ['Purchases', 'Accounts']
        ]);
        $this->set('credit', $credit);
        $this->set('_serialize', ['credit']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $credit = $this->Credits->newEntity();
        if ($this->request->is('post')) {
            $credit = $this->Credits->patchEntity($credit, $this->request->data);
            if ($this->Credits->save($credit)) {
                $this->Flash->success('The credit has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The credit could not be saved. Please, try again.');
            }
        }
        $purchases = $this->Credits->Purchases->find('list', ['limit' => 200]);
        $accounts = $this->Credits->Accounts->find('list', ['limit' => 200]);
        $this->set(compact('credit', 'purchases', 'accounts'));
        $this->set('_serialize', ['credit']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Credit id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $credit = $this->Credits->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $credit = $this->Credits->patchEntity($credit, $this->request->data);
            if ($this->Credits->save($credit)) {
                $this->Flash->success('The credit has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The credit could not be saved. Please, try again.');
            }
        }
        $purchases = $this->Credits->Purchases->find('list', ['limit' => 200]);
        $accounts = $this->Credits->Accounts->find('list', ['limit' => 200]);
        $this->set(compact('credit', 'purchases', 'accounts'));
        $this->set('_serialize', ['credit']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Credit id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $credit = $this->Credits->get($id);
        if ($this->Credits->delete($credit)) {
            $this->Flash->success('The credit has been deleted.');
        } else {
            $this->Flash->error('The credit could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
