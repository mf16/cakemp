<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Bids Controller
 *
 * @property \App\Model\Table\BidsTable $Bids
 */
class BidsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Tasks', 'Bidders']
        ];
        $this->set('bids', $this->paginate($this->Bids));
        $this->set('_serialize', ['bids']);
    }

    /**
     * View method
     *
     * @param string|null $id Bid id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bid = $this->Bids->get($id, [
            'contain' => ['Tasks', 'Bidders']
        ]);
        $this->set('bid', $bid);
        $this->set('_serialize', ['bid']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bid = $this->Bids->newEntity();
        if ($this->request->is('post')) {
            $bid = $this->Bids->patchEntity($bid, $this->request->data);
            if ($this->Bids->save($bid)) {
                $this->Flash->success('The bid has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The bid could not be saved. Please, try again.');
            }
        }
        $tasks = $this->Bids->Tasks->find('list', ['limit' => 200]);
        $bidders = $this->Bids->Bidders->find('list', ['limit' => 200]);
        $this->set(compact('bid', 'tasks', 'bidders'));
        $this->set('_serialize', ['bid']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Bid id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bid = $this->Bids->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bid = $this->Bids->patchEntity($bid, $this->request->data);
            if ($this->Bids->save($bid)) {
                $this->Flash->success('The bid has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The bid could not be saved. Please, try again.');
            }
        }
        $tasks = $this->Bids->Tasks->find('list', ['limit' => 200]);
        $bidders = $this->Bids->Bidders->find('list', ['limit' => 200]);
        $this->set(compact('bid', 'tasks', 'bidders'));
        $this->set('_serialize', ['bid']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Bid id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bid = $this->Bids->get($id);
        if ($this->Bids->delete($bid)) {
            $this->Flash->success('The bid has been deleted.');
        } else {
            $this->Flash->error('The bid could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
