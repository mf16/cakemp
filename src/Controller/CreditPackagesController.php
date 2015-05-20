<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CreditPackages Controller
 *
 * @property \App\Model\Table\CreditPackagesTable $CreditPackages
 */
class CreditPackagesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('creditPackages', $this->paginate($this->CreditPackages));
        $this->set('_serialize', ['creditPackages']);
    }

    /**
     * View method
     *
     * @param string|null $id Credit Package id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $creditPackage = $this->CreditPackages->get($id, [
            'contain' => ['Purchases']
        ]);
        $this->set('creditPackage', $creditPackage);
        $this->set('_serialize', ['creditPackage']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $creditPackage = $this->CreditPackages->newEntity();
        if ($this->request->is('post')) {
            $creditPackage = $this->CreditPackages->patchEntity($creditPackage, $this->request->data);
            if ($this->CreditPackages->save($creditPackage)) {
                $this->Flash->success('The credit package has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The credit package could not be saved. Please, try again.');
            }
        }
        $this->set(compact('creditPackage'));
        $this->set('_serialize', ['creditPackage']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Credit Package id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $creditPackage = $this->CreditPackages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $creditPackage = $this->CreditPackages->patchEntity($creditPackage, $this->request->data);
            if ($this->CreditPackages->save($creditPackage)) {
                $this->Flash->success('The credit package has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The credit package could not be saved. Please, try again.');
            }
        }
        $this->set(compact('creditPackage'));
        $this->set('_serialize', ['creditPackage']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Credit Package id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $creditPackage = $this->CreditPackages->get($id);
        if ($this->CreditPackages->delete($creditPackage)) {
            $this->Flash->success('The credit package has been deleted.');
        } else {
            $this->Flash->error('The credit package could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
