<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Skillsets Controller
 *
 * @property \App\Model\Table\SkillsetsTable $Skillsets
 */
class SkillsetsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('skillsets', $this->paginate($this->Skillsets));
        $this->set('_serialize', ['skillsets']);
    }

    /**
     * View method
     *
     * @param string|null $id Skillset id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $skillset = $this->Skillsets->get($id, [
            'contain' => ['Tasks', 'Users']
        ]);
        $this->set('skillset', $skillset);
        $this->set('_serialize', ['skillset']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $skillset = $this->Skillsets->newEntity();
        if ($this->request->is('post')) {
            $skillset = $this->Skillsets->patchEntity($skillset, $this->request->data);
            if ($this->Skillsets->save($skillset)) {
                $this->Flash->success('The skillset has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The skillset could not be saved. Please, try again.');
            }
        }
        $tasks = $this->Skillsets->Tasks->find('list', ['limit' => 200]);
        $users = $this->Skillsets->Users->find('list', ['limit' => 200]);
        $this->set(compact('skillset', 'tasks', 'users'));
        $this->set('_serialize', ['skillset']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Skillset id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $skillset = $this->Skillsets->get($id, [
            'contain' => ['Tasks', 'Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $skillset = $this->Skillsets->patchEntity($skillset, $this->request->data);
            if ($this->Skillsets->save($skillset)) {
                $this->Flash->success('The skillset has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The skillset could not be saved. Please, try again.');
            }
        }
        $tasks = $this->Skillsets->Tasks->find('list', ['limit' => 200]);
        $users = $this->Skillsets->Users->find('list', ['limit' => 200]);
        $this->set(compact('skillset', 'tasks', 'users'));
        $this->set('_serialize', ['skillset']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Skillset id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $skillset = $this->Skillsets->get($id);
        if ($this->Skillsets->delete($skillset)) {
            $this->Flash->success('The skillset has been deleted.');
        } else {
            $this->Flash->error('The skillset could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
