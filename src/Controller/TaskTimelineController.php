<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * TaskTimeline Controller
 *
 * @property \App\Model\Table\TaskTimelineTable $TaskTimeline
 */
class TaskTimelineController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Tasks', 'Attachments']
        ];
        $this->set('taskTimeline', $this->paginate($this->TaskTimeline));
        $this->set('_serialize', ['taskTimeline']);
    }

    /**
     * Admin View method
     *
     * @param string|null $id Task Timeline id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function admin_view($id = null)
    {
        $taskTimeline = $this->TaskTimeline->get($id, [
            'contain' => ['Tasks', 'Attachments']
        ]);
        $this->set('taskTimeline', $taskTimeline);
        $this->set('_serialize', ['taskTimeline']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $taskTimeline = $this->TaskTimeline->newEntity();
        if ($this->request->is('post')) {
            $taskTimeline = $this->TaskTimeline->patchEntity($taskTimeline, $this->request->data);
            if ($this->TaskTimeline->save($taskTimeline)) {
                $this->Flash->success('The task timeline has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The task timeline could not be saved. Please, try again.');
            }
        }
        $tasks = $this->TaskTimeline->Tasks->find('list', ['limit' => 200]);
        $attachments = $this->TaskTimeline->Attachments->find('list', ['limit' => 200]);
        $this->set(compact('taskTimeline', 'tasks', 'attachments'));
        $this->set('_serialize', ['taskTimeline']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Task Timeline id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $taskTimeline = $this->TaskTimeline->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $taskTimeline = $this->TaskTimeline->patchEntity($taskTimeline, $this->request->data);
            if ($this->TaskTimeline->save($taskTimeline)) {
                $this->Flash->success('The task timeline has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The task timeline could not be saved. Please, try again.');
            }
        }
        $tasks = $this->TaskTimeline->Tasks->find('list', ['limit' => 200]);
        $attachments = $this->TaskTimeline->Attachments->find('list', ['limit' => 200]);
        $this->set(compact('taskTimeline', 'tasks', 'attachments'));
        $this->set('_serialize', ['taskTimeline']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Task Timeline id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $taskTimeline = $this->TaskTimeline->get($id);
        if ($this->TaskTimeline->delete($taskTimeline)) {
            $this->Flash->success('The task timeline has been deleted.');
        } else {
            $this->Flash->error('The task timeline could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }

	public function view($taskid = null)
	{
        $taskTimeline = $this->TaskTimeline->newEntity();
        if ($this->request->is('post')) {
			$this->request->data['author']=$this->Auth->user('id');
			//$this->request->data['task_id']=$this->request->data

			// upload files if needed
			if(!empty($this->request->data['file']) && $this->request->data['file']['size']>0){
				$newFilename='img/uploads/'.$this->request->data['task_id'].'_'.time().'_'.$this->request->data['file']['name'];
				$fileOK=move_uploaded_file($this->request->data['file']['tmp_name'],$newFilename);
				if($fileOK){
					$attachments=TableRegistry::get('Attachments');
					$attachmentVars=['uri'=>$newFilename,'name'=>$this->request->data['file']['name']];
					$attachment=$attachments->newEntity($attachmentVars);
					$record=$attachments->save($attachment);
					$this->request->data['attachment_id']=$record->id;
				}
			}
			//debug($this->request->data);die;
			if(!isset($this->request->data['message'])){
				if($this->request->data['actionName']=='submitBid'){
					$this->request->data['message']='Bid on by '.$this->Auth->user('first_name').' '.$this->Auth->user('last_name').' with a lead time of '.$this->request->data['wait_time'].' days and work time of '.$this->request->data['work_time'].' hours.';

					// add to bid table
					$bids=TableRegistry::get('Bids');
					$bid = $bids->newEntity();
					$bid->tasks_id=$this->request->data['task_id'];
					$bid->bidder_id=$this->Auth->user('id');
					$bid->work_time=$this->request->data['work_time'];
					$bid->wait_time=$this->request->data['wait_time'];
					$bids->save($bid);
				}
			}

			// mark as compelte if needed
			$tasks=TableRegistry::get('Tasks');
			$query=$tasks->find('all')
				->contain('Bids')
				->where(['Tasks.id =' => $this->request->data['task_id']])
			;
			$task=$query->first();
			//debug($this->request->data());
			//debug($task);die;
			//$task=$tasks->get($this->request->data['task_id']);

			//debug($this->request->data);die;
			/*
			if($this->Auth->User('role')=='client' && $this->request->data['message']=='Task marked complete by client.'){

				// if status was in progress or client review
				// mark credits as used

				// set complete
				$task->status_id=8;
				$tasks->save($task);
			} else if(isset($this->request->data['actionName']) && $this->request->data['actionName']=='cancel'){
				$task->status_id=9;
				$tasks->save($task);
			} else if (isset($this->request->data['actionName']) && $this->request->data['actionName']=='submitBid'){
				$task->status_id=3;
				$tasks->save($task);
			} else if (isset($this->request->data['actionName']) && $this->request->data['actionName']=='acceptBid'){
				$task->status_id=6;
				$tasks->save($task);
			} else if (isset($this->request->data['actionName']) && $this->request->data['actionName']=='denyBid'){
				$task->status_id=5;
				$tasks->save($task);
			} 
			*/
			$tasks->patchEntity($task,$this->request->data());

			if($this->request->data['actionName']=='confirmComplete'){
				// mark credits as used
				$credits=TableRegistry::get('Credits');
				$query=$credits->find('all')
					->contain(['CreditStatuses'])
					->where(['CreditStatuses.status =' => 'unused'
					,'Credits.account_id =' => $this->Auth->user('account_id')
					// todo
					// add in expiration here
					])
				;
				$availableCredits=$query->toArray();
				debug(end($task->bids)->work_time);
				if(count($availableCredits) < end($task->bids)->work_time){
					$this->Flash->error('You don\'t have enough credits to mark this as complete!');
					return $this->redirect(['action' => 'view',$this->request->data['task_id']]);
				} else {
					// use credits to mark as complete
					foreach($availableCredits as $credit){
						$credit->status=2;
						$credits->save($credit);
					}
					$tasks->save($task);
					$taskTimeline = $this->TaskTimeline->patchEntity($taskTimeline, $this->request->data);
					$this->TaskTimeline->save($taskTimeline);
					$this->Flash->success('Task marked complete.');
					return $this->redirect(['controller' => 'dashboard']);
				}
			} else {
				$tasks->save($task);
				$taskTimeline = $this->TaskTimeline->patchEntity($taskTimeline, $this->request->data);
				$this->TaskTimeline->save($taskTimeline);
			}
			//debug($task);die;
			//$this->Flash->success('The task timeline has been saved.');
			return $this->redirect(['action' => 'view',$this->request->data['task_id']]);
        }
	
		if(empty($taskid)){
			return $this->redirect(['controller' => 'Dashboard', 'action' => 'index']);
		} else {
			$tasks=TableRegistry::get('Tasks');
			//debug($this->Auth->user('account_id'));die;
			$query=$tasks->find('all')
				->contain(['Projects'])
				->contain(['TaskStatuses'])
				->contain(['Users'])
				->contain(['Bids'])
				->where(['Projects.account_id =' => $this->Auth->user('account_id')])
				->orWhere(['Tasks.assignee =' => $this->Auth->user('id')])
				->orWhere(['Users.manager =' => $this->Auth->user('id')])
				->andWhere(['Tasks.id =' => $taskid])
			;
			$task=$query->first();
			if(empty($task)){
				return $this->redirect(['controller' => 'Dashboard', 'action' => 'index']);
			} else {
				$this->set(['task' => $task]);

				$query=$this->TaskTimeline->find('all')
					->contain(['Users'])
					->contain(['Attachments'])
					->where(['TaskTimeline.task_id =' =>$taskid])
					->order(['created' => 'ASC'])
				;
				$results=$query->all();
				$timelineEvents=$results->toArray();
				$this->set(['timelineEvents' => $timelineEvents]);

				$this->set(['userRole' => $this->Auth->user('role')]);
				$this->set(['curUser' => $this->Auth->user('id')]);
			}
		}
	}

	public function isAuthorized($user=null)
	{
		return true;
	}
}
