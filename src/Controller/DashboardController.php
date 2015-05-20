<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Accounts Controller
 *
 * @property \App\Model\Table\AccountsTable $Accounts
 */
class DashboardController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
		if($this->Auth->user('role')=='client'){
			// if user has account_id
			if(!empty($this->Auth->user('account_id'))){
				$projects=TableRegistry::get('Projects');
				$query=$projects->find('all')
					->where(['Projects.account_id =' => $this->Auth->user('account_id')])
				;
				$myProjects=$query->toArray();
				$this->set('myProjects',$myProjects);

				// get tasks
				$myTasks=array();
				$tasks=TableRegistry::get('Tasks');
				foreach($myProjects as $myProject){
					$query=$tasks->find('all')
						->where(['Tasks.project_id =' => $myProject->id])
					;
					$myTasks[$myProject->id]=$query->toArray();
				}
				$this->set('myTasks',$myTasks);

				//set taskid / status array
				$task_statuses=TableRegistry::get('Task_statuses');
				$query=$task_statuses->find('all');
				$task_statuses=$query->toArray();
				$this->set('task_statuses',$task_statuses);
			} else {
				// todo: make user add/join account
			}
		} else if ($this->Auth->user('role')=='manager'){
			$tasks=TableRegistry::get('Tasks');

			if($this->request->data){
				$task=$tasks->get($this->request->data['id'],[
					//'contain'=>['TaskStatuses']
				]);
				$task=$tasks->patchEntity($task,$this->request->data);
				$record=$tasks->save($task);
				if($record){
					//patch everything to timeline
					$timelineVars=[
						'task_id'=>$record->id
						,'author'=>$this->Auth->user('id')
						,'message'=>'Task assigned to developer for bid estimate.'
					];
					$timelineEvents=TableRegistry::get('TaskTimeline');
					$timelineEvent=$timelineEvents->newEntity($timelineVars);
					$timelineEvents->save($timelineEvent);
					
					$this->Flash->success('The task has been assigned.');
					//return $this->redirect
				} else {
					$this->Flash->error('Task could not be assigned. Please, try again.');
				}
			}

			// New Tasks
			$query=$tasks->find('all')
				->contain('TaskStatuses')
				->contain('Skillsets')
				->where(['TaskStatuses.status =' => 'new'])
			;
			$this->set('availableTasks',$query->toArray());

			// Tasks awaiting a bid
			$query=$tasks->find('all')
				->contain('TaskStatuses')
				->contain('Skillsets')
				->contain('Users')
				->where(['TaskStatuses.status =' => 'awaiting bid'])
				->andWhere(['Users.manager =' => $this->Auth->user('id')])
			;
			$this->set('awaitingTasks',$query->toArray());

			// Tasks bid rejected
			$query=$tasks->find('all')
				->contain('TaskStatuses')
				->contain('Skillsets')
				->contain('Users')
				->where(['TaskStatuses.status =' => 'bid rejected'])
				->andWhere(['Users.manager =' => $this->Auth->user('id')])
			;
			$this->set('rejectedTasks',$query->toArray());

			// Tasks in progress (bid accepted)
			$query=$tasks->find('all')
				->contain('TaskStatuses')
				->contain('Skillsets')
				->contain('Users')
				->where(['TaskStatuses.status =' => 'in progress'])
				->andWhere(['Users.manager =' => $this->Auth->user('id')])
			;
			$this->set('inProgressTasks',$query->toArray());

			// get available developers
			$users=TableRegistry::get('Users');
			$query=$users->find('all')
				->contain('Skillsets')
				->where(['Users.manager =' => $this->Auth->user('id')])
			;
			$this->set('myDevelopers',$query->toArray());

		} else if ($this->Auth->user('role')=='developer'){
			$tasks=TableRegistry::get('Tasks');

			// get tasks awaiting bid
			$query=$tasks->find('all')
				->contain('TaskStatuses')
				->contain('Skillsets')
				->where(['TaskStatuses.status =' => 'awaiting bid'])
				->andWhere(['assignee =' => $this->Auth->user('id')])
			;
			$this->set('awaitingBidTasks',$query->toArray());

			// get tasks awaiting client acceptance
			$query=$tasks->find('all')
				->contain('TaskStatuses')
				->contain('Skillsets')
				->where(['TaskStatuses.status =' => 'awaiting bid acceptance'])
				->andWhere(['assignee =' => $this->Auth->user('id')])
			;
			$this->set('awaitingAcceptanceTasks',$query->toArray());

			// get tasks in progress
			$query=$tasks->find('all')
				->contain('TaskStatuses')
				->contain('Skillsets')
				->where(['TaskStatuses.status =' => 'in progress'])
				->andWhere(['assignee =' => $this->Auth->user('id')])
			;
			$this->set('inProgressTasks',$query->toArray());
		}
		$this->render($this->Auth->user('role'));
    }

	public function isAuthorized($userid)
	{
		return true;
	}

}
