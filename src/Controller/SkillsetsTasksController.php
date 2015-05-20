<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SkillsetsTasks Controller
 *
 * @property \App\Model\Table\SkillsetsTasksTable $SkillsetsTasks
 */
class SkillsetsTasksController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Tasks', 'Skillsets']
        ];
        $this->set('skillsetsTasks', $this->paginate($this->SkillsetsTasks));
        $this->set('_serialize', ['skillsetsTasks']);
    }

    /**
     * View method
     *
     * @param string|null $id Skillsets Task id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $skillsetsTask = $this->SkillsetsTasks->get($id, [
            'contain' => ['Tasks', 'Skillsets']
        ]);
        $this->set('skillsetsTask', $skillsetsTask);
        $this->set('_serialize', ['skillsetsTask']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $skillsetsTask = $this->SkillsetsTasks->newEntity();
        if ($this->request->is('post')) {
            $skillsetsTask = $this->SkillsetsTasks->patchEntity($skillsetsTask, $this->request->data);
            if ($this->SkillsetsTasks->save($skillsetsTask)) {
                $this->Flash->success('The skillsets task has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The skillsets task could not be saved. Please, try again.');
            }
        }
        $tasks = $this->SkillsetsTasks->Tasks->find('list', ['limit' => 200]);
        $skillsets = $this->SkillsetsTasks->Skillsets->find('list', ['limit' => 200]);
        $this->set(compact('skillsetsTask', 'tasks', 'skillsets'));
        $this->set('_serialize', ['skillsetsTask']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Skillsets Task id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $skillsetsTask = $this->SkillsetsTasks->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $skillsetsTask = $this->SkillsetsTasks->patchEntity($skillsetsTask, $this->request->data);
            if ($this->SkillsetsTasks->save($skillsetsTask)) {
                $this->Flash->success('The skillsets task has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The skillsets task could not be saved. Please, try again.');
            }
        }
        $tasks = $this->SkillsetsTasks->Tasks->find('list', ['limit' => 200]);
        $skillsets = $this->SkillsetsTasks->Skillsets->find('list', ['limit' => 200]);
        $this->set(compact('skillsetsTask', 'tasks', 'skillsets'));
        $this->set('_serialize', ['skillsetsTask']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Skillsets Task id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $skillsetsTask = $this->SkillsetsTasks->get($id);
        if ($this->SkillsetsTasks->delete($skillsetsTask)) {
            $this->Flash->success('The skillsets task has been deleted.');
        } else {
            $this->Flash->error('The skillsets task could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
