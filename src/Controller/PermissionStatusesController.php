<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PermissionStatuses Controller
 *
 * @property \App\Model\Table\PermissionStatusesTable $PermissionStatuses
 */
class PermissionStatusesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('permissionStatuses', $this->paginate($this->PermissionStatuses));
        $this->set('_serialize', ['permissionStatuses']);
    }

    /**
     * View method
     *
     * @param string|null $id Permission Status id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $permissionStatus = $this->PermissionStatuses->get($id, [
            'contain' => []
        ]);
        $this->set('permissionStatus', $permissionStatus);
        $this->set('_serialize', ['permissionStatus']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $permissionStatus = $this->PermissionStatuses->newEntity();
        if ($this->request->is('post')) {
            $permissionStatus = $this->PermissionStatuses->patchEntity($permissionStatus, $this->request->data);
            if ($this->PermissionStatuses->save($permissionStatus)) {
                $this->Flash->success('The permission status has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The permission status could not be saved. Please, try again.');
            }
        }
        $this->set(compact('permissionStatus'));
        $this->set('_serialize', ['permissionStatus']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Permission Status id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $permissionStatus = $this->PermissionStatuses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $permissionStatus = $this->PermissionStatuses->patchEntity($permissionStatus, $this->request->data);
            if ($this->PermissionStatuses->save($permissionStatus)) {
                $this->Flash->success('The permission status has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The permission status could not be saved. Please, try again.');
            }
        }
        $this->set(compact('permissionStatus'));
        $this->set('_serialize', ['permissionStatus']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Permission Status id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $permissionStatus = $this->PermissionStatuses->get($id);
        if ($this->PermissionStatuses->delete($permissionStatus)) {
            $this->Flash->success('The permission status has been deleted.');
        } else {
            $this->Flash->error('The permission status could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
