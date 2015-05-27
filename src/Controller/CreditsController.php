<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Credits Controller
 *
 * @property \App\Model\Table\CreditsTable $Credits
 */
class CreditsController extends AppController
{

    /**
     * Admin Index method
     *
     * @return void
     */
    public function admin_index()
    {
        $this->paginate = [
            'contain' => ['Purchases', 'Accounts']
        ];
        $this->set('credits', $this->paginate($this->Credits));
        $this->set('_serialize', ['credits']);

    }

    /**
     * View method
     *
     * @param string|null $id Credit id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $credit = $this->Credits->get($id, [
            'contain' => ['Purchases', 'Accounts']
        ]);
        $this->set('credit', $credit);
        $this->set('_serialize', ['credit']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function admin_add()
    {
        $credit = $this->Credits->newEntity();
        if ($this->request->is('post')) {
            $credit = $this->Credits->patchEntity($credit, $this->request->data);
            if ($this->Credits->save($credit)) {
                $this->Flash->success('The credit has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The credit could not be saved. Please, try again.');
            }
        }
        $purchases = $this->Credits->Purchases->find('list', ['limit' => 200]);
        $accounts = $this->Credits->Accounts->find('list', ['limit' => 200]);
        $this->set(compact('credit', 'purchases', 'accounts'));
        $this->set('_serialize', ['credit']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Credit id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $credit = $this->Credits->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $credit = $this->Credits->patchEntity($credit, $this->request->data);
            if ($this->Credits->save($credit)) {
                $this->Flash->success('The credit has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The credit could not be saved. Please, try again.');
            }
        }
        $purchases = $this->Credits->Purchases->find('list', ['limit' => 200]);
        $accounts = $this->Credits->Accounts->find('list', ['limit' => 200]);
        $this->set(compact('credit', 'purchases', 'accounts'));
        $this->set('_serialize', ['credit']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Credit id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $credit = $this->Credits->get($id);
        if ($this->Credits->delete($credit)) {
            $this->Flash->success('The credit has been deleted.');
        } else {
            $this->Flash->error('The credit could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }

    public function index()
    {
        $this->paginate = [
            'contain' => ['Purchases']
			,'where' => 'Credits.account_id = '.$this->Auth->user('id')
        ];
        $this->set('credits', $this->paginate($this->Credits));
        $this->set('_serialize', ['credits']);

    }

	public function add()
	{
		$creditPackages=TableRegistry::get('CreditPackages');
		$query=$creditPackages->find('all');
		$packages=$query->toArray();
		if($packages){
			$this->set('packages',$packages);
		} else {
			return $this->redirect(['action' => 'purchase']);
		}
	}

	public function purchase($id=null)
	{
		if($this->request->data){
			//debug($this->request->data);
			//die;

			// get package for purchase
			$creditPackages=TableRegistry::get('CreditPackages');
			$package=$creditPackages->get($this->request->data['packageid']);

			require_once ROOT.'/vendor/braintree/lib/Braintree.php';
			require_once ROOT.'/config/braintreeConfig.php';

			if(!empty($this->request->data['paymentToken'])){
				$result=\Braintree_Transaction::sale([
					'paymentMethodToken' => $this->request->data['paymentToken']
					,'amount' => $package->price
				]);
				// use saved payment info
			} else if($this->request->data['payment_method_nonce']){
				if(!empty($this->request->data['keepInfo']) && $this->request->data['keepInfo']){
					try{
						//delete payment method
						//Braintree_PaymentMethod::delete('bbgp7g');
						$customerResult=\Braintree_Customer::find($this->Auth->user('id'));
						//create new payment method, fail on duplicate
						$newPaymentMethodResult=\Braintree_PaymentMethod::create(array(
							'customerId'=>$this->Auth->user('id')
							,'paymentMethodNonce'=>$this->request->data['payment_method_nonce']
							,'options'=>array(
								'failOnDuplicatePaymentMethod'=>true
							)
						));
						$result=\Braintree_Transaction::sale(array(
							'amount'=>$package->price
							,'paymentMethodNonce'=>$this->request->data['payment_method_nonce']
						));
					} catch (\Exception $e){
						// no customer found
						// add new customer here
						$result=\Braintree_Transaction::sale(array(
							'amount'=>$package->price
							,'paymentMethodNonce'=>$this->request->data['payment_method_nonce']
							,'customer'=>array(
								'id'=>$this->Auth->user('id')
							)
							,'options'=>array(
								'storeInVaultOnSuccess'=>true
							)
						));
					} finally {
					}
				} else {
					$result=\Braintree_Transaction::sale([
						'amount' => $package->price
						,'paymentMethodNonce' => $this->request->data['payment_method_nonce']
					]);
				}
			}
			$this->set('result',$result);
			if($result->success){
				// add purchase history
				$purchases=TableRegistry::get('Purchases');
				$purchase=$purchases->newEntity();
				$purchase->account_id=$this->Auth->user('account_id');
				$purchase->quantity=$package->credits;
				$purchase->total=$result->transaction->amount;
				$purchase->token=$result->transaction->id;
				$purchase->credit_package_id=$package->id;
				$purchase=$purchases->save($purchase);

				// add credits
				$credits=TableRegistry::get('Credits');
				for($i=0;$i<$package->credits;$i++){
					$credit=$credits->newEntity();
					$credit->purchase_id=$purchase->id;
					$credit->account_id=$this->Auth->user('account_id');
					$credit=$credits->save($credit);
				}

				$this->Flash->success('Successful payment! Credits now ready for use.');
				return $this->redirect(['controller' => 'dashboard']);
			}
		} 
		if(!$this->request->data || !$result->success){
			$creditPackages=TableRegistry::get('CreditPackages');
			if(isset($result->success)){
				if(!$result->success){
					debug($result);
					$this->Flash->error('Error, please try again.');
				}
			}
			if($id){
				$query=$creditPackages->find('all')
					->where(['id =' => $id])
				;
				$package=$query->toArray();
				$this->set('package',$package[0]);
				$this->set('userid',$this->Auth->user('id'));
			} else {
				return $this->redirect(['action' => 'add']);
			}
			$this->render('purchase');
		}
	}

	public function checkout()
	{
	}

	public function isAuthorized($user=null)
	{
		if($this->Auth->user('id')){
			if($this->request->action=='index'){
				return true;
			}
			if(($this->request->action=='checkout' || $this->request->action=='add' || $this->request->action=='purchase') && $this->Auth->user('role')=='client'){
				return true;
			}
		}
	}

}
