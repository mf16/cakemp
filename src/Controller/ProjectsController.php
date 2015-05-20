<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Projects Controller
 *
 * @property \App\Model\Table\ProjectsTable $Projects
 */
class ProjectsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Accounts']
        ];
        $this->set('projects', $this->paginate($this->Projects));
        $this->set('_serialize', ['projects']);
    }

    /**
     * View method
     *
     * @param string|null $id Project id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $project = $this->Projects->get($id, [
            'contain' => ['Accounts', 'Tasks']
        ]);
        $this->set('project', $project);
        $this->set('_serialize', ['project']);
    }

    /**
     * client Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
		// make sure user has an account
		if(!empty($this->Auth->user('account_id'))){
			$project = $this->Projects->newEntity();
			if ($this->request->is('post')) {
				// add accountid
				$this->request->data['account_id']=$this->Auth->user('account_id');
				$project = $this->Projects->patchEntity($project, $this->request->data);
				if ($this->Projects->save($project)) {
					$this->Flash->success('The project has been saved.');
					return $this->redirect(['controller' => 'dashboard','action' => 'index']);
				} else {
					$this->Flash->error('The project could not be saved. Please, try again.');
				}
			}
			$accounts = $this->Projects->Accounts->find('list', ['limit' => 200]);
			$this->set(compact('project', 'accounts'));
			$this->set('_serialize', ['project']);
			$this->render('add');
		} else {
			//have user join/create account
			echo 'join/create account';
		}
    }

    /**
     * Admin Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function admin_add()
    {
        $project = $this->Projects->newEntity();
        if ($this->request->is('post')) {
            $project = $this->Projects->patchEntity($project, $this->request->data);
            if ($this->Projects->save($project)) {
                $this->Flash->success('The project has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The project could not be saved. Please, try again.');
            }
        }
        $accounts = $this->Projects->Accounts->find('list', ['limit' => 200]);
        $this->set(compact('project', 'accounts'));
        $this->set('_serialize', ['project']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Project id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $project = $this->Projects->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $project = $this->Projects->patchEntity($project, $this->request->data);
            if ($this->Projects->save($project)) {
                $this->Flash->success('The project has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The project could not be saved. Please, try again.');
            }
        }
        $accounts = $this->Projects->Accounts->find('list', ['limit' => 200]);
        $this->set(compact('project', 'accounts'));
        $this->set('_serialize', ['project']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Project id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $project = $this->Projects->get($id);
        if ($this->Projects->delete($project)) {
            $this->Flash->success('The project has been deleted.');
        } else {
            $this->Flash->error('The project could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }

	public function isAuthorized($userid)
	{
		if($this->Auth->user('role')=='admin'){
			return true;
		}

		$action=$this->request->params['action'];
		if($this->Auth->user('role')=='client' && $action=='add'){
			return true;
		}
	}
}
