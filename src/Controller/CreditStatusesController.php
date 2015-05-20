<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CreditStatuses Controller
 *
 * @property \App\Model\Table\CreditStatusesTable $CreditStatuses
 */
class CreditStatusesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('creditStatuses', $this->paginate($this->CreditStatuses));
        $this->set('_serialize', ['creditStatuses']);
    }

    /**
     * View method
     *
     * @param string|null $id Credit Status id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $creditStatus = $this->CreditStatuses->get($id, [
            'contain' => []
        ]);
        $this->set('creditStatus', $creditStatus);
        $this->set('_serialize', ['creditStatus']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $creditStatus = $this->CreditStatuses->newEntity();
        if ($this->request->is('post')) {
            $creditStatus = $this->CreditStatuses->patchEntity($creditStatus, $this->request->data);
            if ($this->CreditStatuses->save($creditStatus)) {
                $this->Flash->success('The credit status has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The credit status could not be saved. Please, try again.');
            }
        }
        $this->set(compact('creditStatus'));
        $this->set('_serialize', ['creditStatus']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Credit Status id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $creditStatus = $this->CreditStatuses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $creditStatus = $this->CreditStatuses->patchEntity($creditStatus, $this->request->data);
            if ($this->CreditStatuses->save($creditStatus)) {
                $this->Flash->success('The credit status has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The credit status could not be saved. Please, try again.');
            }
        }
        $this->set(compact('creditStatus'));
        $this->set('_serialize', ['creditStatus']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Credit Status id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $creditStatus = $this->CreditStatuses->get($id);
        if ($this->CreditStatuses->delete($creditStatus)) {
            $this->Flash->success('The credit status has been deleted.');
        } else {
            $this->Flash->error('The credit status could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
