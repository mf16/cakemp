<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Tasks Controller
 *
 * @property \App\Model\Table\TasksTable $Tasks
 */
class TasksController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Projects', 'TaskStatuses']
        ];
        $this->set('tasks', $this->paginate($this->Tasks));
        $this->set('_serialize', ['tasks']);
    }

    /**
     * View method
     *
     * @param string|null $id Task id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $task = $this->Tasks->get($id, [
            'contain' => ['Projects', 'TaskStatuses', 'Attachments', 'Skillsets', 'TaskTimeline']
        ]);
        $this->set('task', $task);
        $this->set('_serialize', ['task']);
    }

    /**
     * Client Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $task = $this->Tasks->newEntity();
        if ($this->request->is('post')) {
			$this->request->data['status_id']=1;
			$projectid=$this->request->pass[0];
			$this->request->data['project_id']=$projectid;
            $task = $this->Tasks->patchEntity($task, $this->request->data);
			$record=$this->Tasks->save($task);
            if ($record) {
				//patch everything to timeline
				$timelineVars=[
					'task_id'=>$record->id
					,'author'=>$this->Auth->user('id')
					,'message'=>'Task created.'
					//todo -> attachments
				];
				$timelineEvents=TableRegistry::get('TaskTimeline');
				$timelineEvent=$timelineEvents->newEntity($timelineVars);
				$timelineEvents->save($timelineEvent);

                $this->Flash->success('The task has been saved.');
                return $this->redirect(['controller'=>'dashboard','action' => 'index']);
            } else {
                $this->Flash->error('The task could not be saved. Please, try again.');
            }
        }
        $projects = $this->Tasks->Projects->find('list')
			->contain(['Accounts'])
			->where(['Accounts.id =' => $this->Auth->user('account_id')])
		;
        $taskStatuses = $this->Tasks->TaskStatuses->find('list', ['limit' => 200]);
        $attachments = $this->Tasks->Attachments->find('list', ['limit' => 200]);
        $skillsets = $this->Tasks->Skillsets->find('list', ['limit' => 200, 'keyField'=>'id','valueField'=>'skill']);
        $this->set(compact('task', 'projects', 'taskStatuses', 'attachments', 'skillsets'));
        $this->set('_serialize', ['task']);
    }

    /**
     * Admin Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function admin_add()
    {
        $task = $this->Tasks->newEntity();
        if ($this->request->is('post')) {
            $task = $this->Tasks->patchEntity($task, $this->request->data);
            if ($this->Tasks->save($task)) {
                $this->Flash->success('The task has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The task could not be saved. Please, try again.');
            }
        }
        $projects = $this->Tasks->Projects->find('list', ['limit' => 200]);
        $taskStatuses = $this->Tasks->TaskStatuses->find('list', ['limit' => 200]);
        $attachments = $this->Tasks->Attachments->find('list', ['limit' => 200]);
        $skillsets = $this->Tasks->Skillsets->find('list', ['limit' => 200]);
        $this->set(compact('task', 'projects', 'taskStatuses', 'attachments', 'skillsets'));
        $this->set('_serialize', ['task']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Task id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $task = $this->Tasks->get($id, [
            'contain' => ['Attachments', 'Skillsets']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $task = $this->Tasks->patchEntity($task, $this->request->data);
            if ($this->Tasks->save($task)) {
                $this->Flash->success('The task has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The task could not be saved. Please, try again.');
            }
        }
        $projects = $this->Tasks->Projects->find('list', ['limit' => 200]);
        $taskStatuses = $this->Tasks->TaskStatuses->find('list', ['limit' => 200]);
        $attachments = $this->Tasks->Attachments->find('list', ['limit' => 200]);
        $skillsets = $this->Tasks->Skillsets->find('list', ['limit' => 200]);
        $this->set(compact('task', 'projects', 'taskStatuses', 'attachments', 'skillsets'));
        $this->set('_serialize', ['task']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Task id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $task = $this->Tasks->get($id);
        if ($this->Tasks->delete($task)) {
            $this->Flash->success('The task has been deleted.');
        } else {
            $this->Flash->error('The task could not be deleted. Please, try again.');
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
			// make sure user can access this project
			$projectid=$this->request->pass[0];
			$project=$this->Tasks->Projects->get($projectid);
			if($project->account_id==$this->Auth->user('account_id')){
				return true;
			}
		}
	}
}
