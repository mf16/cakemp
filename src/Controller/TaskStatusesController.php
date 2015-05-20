<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TaskStatuses Controller
 *
 * @property \App\Model\Table\TaskStatusesTable $TaskStatuses
 */
class TaskStatusesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('taskStatuses', $this->paginate($this->TaskStatuses));
        $this->set('_serialize', ['taskStatuses']);
    }

    /**
     * View method
     *
     * @param string|null $id Task Status id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $taskStatus = $this->TaskStatuses->get($id, [
            'contain' => []
        ]);
        $this->set('taskStatus', $taskStatus);
        $this->set('_serialize', ['taskStatus']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $taskStatus = $this->TaskStatuses->newEntity();
        if ($this->request->is('post')) {
            $taskStatus = $this->TaskStatuses->patchEntity($taskStatus, $this->request->data);
            if ($this->TaskStatuses->save($taskStatus)) {
                $this->Flash->success('The task status has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The task status could not be saved. Please, try again.');
            }
        }
        $this->set(compact('taskStatus'));
        $this->set('_serialize', ['taskStatus']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Task Status id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $taskStatus = $this->TaskStatuses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $taskStatus = $this->TaskStatuses->patchEntity($taskStatus, $this->request->data);
            if ($this->TaskStatuses->save($taskStatus)) {
                $this->Flash->success('The task status has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The task status could not be saved. Please, try again.');
            }
        }
        $this->set(compact('taskStatus'));
        $this->set('_serialize', ['taskStatus']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Task Status id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $taskStatus = $this->TaskStatuses->get($id);
        if ($this->TaskStatuses->delete($taskStatus)) {
            $this->Flash->success('The task status has been deleted.');
        } else {
            $this->Flash->error('The task status could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
