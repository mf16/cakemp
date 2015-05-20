<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SkillsetsUsers Controller
 *
 * @property \App\Model\Table\SkillsetsUsersTable $SkillsetsUsers
 */
class SkillsetsUsersController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Skillsets']
        ];
        $this->set('skillsetsUsers', $this->paginate($this->SkillsetsUsers));
        $this->set('_serialize', ['skillsetsUsers']);
    }

    /**
     * View method
     *
     * @param string|null $id Skillsets User id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $skillsetsUser = $this->SkillsetsUsers->get($id, [
            'contain' => ['Users', 'Skillsets']
        ]);
        $this->set('skillsetsUser', $skillsetsUser);
        $this->set('_serialize', ['skillsetsUser']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $skillsetsUser = $this->SkillsetsUsers->newEntity();
        if ($this->request->is('post')) {
            $skillsetsUser = $this->SkillsetsUsers->patchEntity($skillsetsUser, $this->request->data);
            if ($this->SkillsetsUsers->save($skillsetsUser)) {
                $this->Flash->success('The skillsets user has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The skillsets user could not be saved. Please, try again.');
            }
        }
        $users = $this->SkillsetsUsers->Users->find('list', ['limit' => 200]);
        $skillsets = $this->SkillsetsUsers->Skillsets->find('list', ['limit' => 200]);
        $this->set(compact('skillsetsUser', 'users', 'skillsets'));
        $this->set('_serialize', ['skillsetsUser']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Skillsets User id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $skillsetsUser = $this->SkillsetsUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $skillsetsUser = $this->SkillsetsUsers->patchEntity($skillsetsUser, $this->request->data);
            if ($this->SkillsetsUsers->save($skillsetsUser)) {
                $this->Flash->success('The skillsets user has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The skillsets user could not be saved. Please, try again.');
            }
        }
        $users = $this->SkillsetsUsers->Users->find('list', ['limit' => 200]);
        $skillsets = $this->SkillsetsUsers->Skillsets->find('list', ['limit' => 200]);
        $this->set(compact('skillsetsUser', 'users', 'skillsets'));
        $this->set('_serialize', ['skillsetsUser']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Skillsets User id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $skillsetsUser = $this->SkillsetsUsers->get($id);
        if ($this->SkillsetsUsers->delete($skillsetsUser)) {
            $this->Flash->success('The skillsets user has been deleted.');
        } else {
            $this->Flash->error('The skillsets user could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
