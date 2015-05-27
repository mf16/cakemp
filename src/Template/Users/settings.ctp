<?php
//debug($user);
echo $this->Form->create($user);
echo $this->Form->input('first_name',[
	'label'=>'First Name'
]);
echo $this->Form->input('last_name',[
	'label'=>'Last Name'
]);
echo $this->Form->input('email',[
	'label'=>'Email'
]);
if($user->role=='developer'){
	echo $this->Form->input('managerEmail',[
		'label'=>'Manager\'s Email'
	]);
}
echo $this->Form->input('password',[
	'label'=>'Password'
	,'value'=>''
]);
echo $this->Form->button('Save');
echo $this->Form->end();

// payment settings form
if($user->role=='client'){
	echo '<h1>credit cards</h1>';
	if(!empty($creditCards)){
		foreach($creditCards as $cc){
			//debug($cc);
			echo $this->Form->create();
			echo 'last 4: '.$cc->last4;
			echo '<br/>';
			echo 'type: '.$cc->cardType;
			echo '<br/>';
			echo 'expires: '.$cc->expirationMonth.' / '.$cc->expirationYear;
			echo $this->Form->hidden('token',[
				'value' => $cc->token
			]);
			echo $this->Form->button('Delete');
			echo $this->Form->end();
		}
	}
	echo '<h1>paypals</h1>';
}
?>
