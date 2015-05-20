<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProjectsPermissions Controller
 *
 * @property \App\Model\Table\ProjectsPermissionsTable $ProjectsPermissions
 */
class ProjectsPermissionsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Projects', 'Users', 'PermissionStatuses']
        ];
        $this->set('projectsPermissions', $this->paginate($this->ProjectsPermissions));
        $this->set('_serialize', ['projectsPermissions']);
    }

    /**
     * View method
     *
     * @param string|null $id Projects Permission id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $projectsPermission = $this->ProjectsPermissions->get($id, [
            'contain' => ['Projects', 'Users', 'PermissionStatuses']
        ]);
        $this->set('projectsPermission', $projectsPermission);
        $this->set('_serialize', ['projectsPermission']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $projectsPermission = $this->ProjectsPermissions->newEntity();
        if ($this->request->is('post')) {
            $projectsPermission = $this->ProjectsPermissions->patchEntity($projectsPermission, $this->request->data);
            if ($this->ProjectsPermissions->save($projectsPermission)) {
                $this->Flash->success('The projects permission has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The projects permission could not be saved. Please, try again.');
            }
        }
        $projects = $this->ProjectsPermissions->Projects->find('list', ['limit' => 200]);
        $users = $this->ProjectsPermissions->Users->find('list', ['limit' => 200]);
        $permissionStatuses = $this->ProjectsPermissions->PermissionStatuses->find('list', ['limit' => 200]);
        $this->set(compact('projectsPermission', 'projects', 'users', 'permissionStatuses'));
        $this->set('_serialize', ['projectsPermission']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Projects Permission id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $projectsPermission = $this->ProjectsPermissions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $projectsPermission = $this->ProjectsPermissions->patchEntity($projectsPermission, $this->request->data);
            if ($this->ProjectsPermissions->save($projectsPermission)) {
                $this->Flash->success('The projects permission has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The projects permission could not be saved. Please, try again.');
            }
        }
        $projects = $this->ProjectsPermissions->Projects->find('list', ['limit' => 200]);
        $users = $this->ProjectsPermissions->Users->find('list', ['limit' => 200]);
        $permissionStatuses = $this->ProjectsPermissions->PermissionStatuses->find('list', ['limit' => 200]);
        $this->set(compact('projectsPermission', 'projects', 'users', 'permissionStatuses'));
        $this->set('_serialize', ['projectsPermission']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Projects Permission id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $projectsPermission = $this->ProjectsPermissions->get($id);
        if ($this->ProjectsPermissions->delete($projectsPermission)) {
            $this->Flash->success('The projects permission has been deleted.');
        } else {
            $this->Flash->error('The projects permission could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
