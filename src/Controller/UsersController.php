<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('users', $this->paginate($this->Users));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Skillsets', 'ProjectsPermissions', 'UserMetas']
        ]);
        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success('The user has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The user could not be saved. Please, try again.');
            }
        }
        $skillsets = $this->Users->Skillsets->find('list', ['limit' => 200]);
        $this->set(compact('user', 'skillsets'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Skillsets']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success('The user has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The user could not be saved. Please, try again.');
            }
        }
        $skillsets = $this->Users->Skillsets->find('list', ['limit' => 200]);
        $this->set(compact('user', 'skillsets'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success('The user has been deleted.');
        } else {
            $this->Flash->error('The user could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }

	public function login()
	{
		// redirect to dashboard if already logged in
		if($this->Auth->user('id')){
			return $this->redirect(['controller' => 'dashboard', 'action' => 'index']);
		}

		if($this->request->is('post')){
			$user=$this->Auth->identify();
			if($user){
				$this->Auth->setUser($user);
				return $this->redirect(['controller' => 'dashboard', 'action' => 'index']);
			}
			$this->Flash->error('Your username or password is incorrect.');
		}
	}
	
	public function logout()
	{
		$this->Flash->success('You are now logged out.');
		return $this->redirect($this->Auth->logout());
	}

	public function beforeFilter(\Cake\Event\Event $event)
	{
		// allows registration
		$this->Auth->allow(['register','logout']);
	}

	// public register function
    public function register($role=NULL)
    {

		// pass role to view
		if($role=='client' || $role=='developer' || $role=='manager'){
			$this->set('role',$role);
		} else {
			// if no role is set or it is not allowed, set as client
			$this->set('role','client');
		}

        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
			// set role
			if($role=='client' || $role=='developer' || $role=='manager'){
				$this->request->data['role']=$role;
			} else {
				// if no role is set or it is not allowed, set as client
				$this->request->data['role']='client';
			}
			// find manager, set 
			if(!empty($this->request->data['managerEmail'])){
				$query=$this->Users->find('all')
					->where(['Users.email =' => $this->request->data['managerEmail']])
				;
				$manager=$query->first();
				if(!empty($manager)){
					$this->request->data['manager']=$manager['id'];
				}
			}
			//debug($this->request->data);die;
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {

                $this->Flash->success('The user has been saved.');
				$this->Auth->setUser($user->toArray());
                return $this->redirect(['controller' => 'dashboard']);
            } else {
                $this->Flash->error('The user could not be saved. Please, try again.');
            }
        }
        $skillsets = $this->Users->Skillsets->find('list', ['limit' => 200,'keyField'=>'id','valueField'=>'skill']);
        $this->set(compact('user', 'skillsets'));
        $this->set('_serialize', ['user']);
    }

	public function settings()
	{
		require_once ROOT.'/vendor/braintree/lib/Braintree.php';
		require_once ROOT.'/config/braintreeConfig.php';

        $user = $this->Users->get($this->Auth->user('id'), [
            'contain' => ['Skillsets']
        ]);
		$query = $this->Users->find('all')
			->where(['Users.id = ' => $this->Auth->user('manager')])
		;
		$manager=$query->first();
		if($manager){
			$user->managerEmail=$manager->email;
		}

		// braintree payment method editing logic
        if ($this->request->is('post')) {

			//debug($this->request->data);
			if(!empty($this->request->data['token'])){
				try {
					\Braintree_PaymentMethod::delete($this->request->data['token']);
					$this->Flash->success('That card has been deleted.');
				} catch (\Exception $e) {
					$this->Flash->error('Card not able to be deleted, please try again.');
				}
			}
		}

		// user editing logic
        if ($this->request->is(['patch', 'put'])) {
			// find manager, set 
			if(!empty($this->request->data['managerEmail'])){
				$query=$this->Users->find('all')
					->where(['Users.email =' => $this->request->data['managerEmail']])
				;
				$manager=$query->first();
				if(!empty($manager)){
					$this->request->data['manager']=$manager['id'];
				}
			}
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success('The user has been saved.');
                return $this->redirect(['action' => 'settings']);
            } else {
                $this->Flash->error('The user could not be saved. Please, try again.');
            }
        }

        $skillsets = $this->Users->Skillsets->find('list', ['limit' => 200]);
        $this->set(compact('user', 'skillsets'));
        $this->set('_serialize', ['user']);

		if($this->Auth->user('role')=='client'){

			try{
				$customer=\Braintree_Customer::find($this->Auth->user('id'));
				$this->set('creditCards',$customer->creditCards);
				//paypal here too
			} catch (\Exception $e) {
				// no customer info
			}
		}
	}

	public function isAuthorized($account=null)
	{
		if($this->Auth->user('id')){
			if($this->request->action=='settings'){
				return true;
			}
		}
	}
}
