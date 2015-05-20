<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AttachmentsTasks Controller
 *
 * @property \App\Model\Table\AttachmentsTasksTable $AttachmentsTasks
 */
class AttachmentsTasksController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Attachments', 'Tasks']
        ];
        $this->set('attachmentsTasks', $this->paginate($this->AttachmentsTasks));
        $this->set('_serialize', ['attachmentsTasks']);
    }

    /**
     * View method
     *
     * @param string|null $id Attachments Task id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $attachmentsTask = $this->AttachmentsTasks->get($id, [
            'contain' => ['Attachments', 'Tasks']
        ]);
        $this->set('attachmentsTask', $attachmentsTask);
        $this->set('_serialize', ['attachmentsTask']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $attachmentsTask = $this->AttachmentsTasks->newEntity();
        if ($this->request->is('post')) {
            $attachmentsTask = $this->AttachmentsTasks->patchEntity($attachmentsTask, $this->request->data);
            if ($this->AttachmentsTasks->save($attachmentsTask)) {
                $this->Flash->success('The attachments task has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The attachments task could not be saved. Please, try again.');
            }
        }
        $attachments = $this->AttachmentsTasks->Attachments->find('list', ['limit' => 200]);
        $tasks = $this->AttachmentsTasks->Tasks->find('list', ['limit' => 200]);
        $this->set(compact('attachmentsTask', 'attachments', 'tasks'));
        $this->set('_serialize', ['attachmentsTask']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Attachments Task id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $attachmentsTask = $this->AttachmentsTasks->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $attachmentsTask = $this->AttachmentsTasks->patchEntity($attachmentsTask, $this->request->data);
            if ($this->AttachmentsTasks->save($attachmentsTask)) {
                $this->Flash->success('The attachments task has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The attachments task could not be saved. Please, try again.');
            }
        }
        $attachments = $this->AttachmentsTasks->Attachments->find('list', ['limit' => 200]);
        $tasks = $this->AttachmentsTasks->Tasks->find('list', ['limit' => 200]);
        $this->set(compact('attachmentsTask', 'attachments', 'tasks'));
        $this->set('_serialize', ['attachmentsTask']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Attachments Task id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $attachmentsTask = $this->AttachmentsTasks->get($id);
        if ($this->AttachmentsTasks->delete($attachmentsTask)) {
            $this->Flash->success('The attachments task has been deleted.');
        } else {
            $this->Flash->error('The attachments task could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
