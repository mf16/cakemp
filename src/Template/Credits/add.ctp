<?php
foreach($packages as $package){
	//debug($package);
	echo $this->Html->link('purchase',
	[
		'controller' => 'credits'
		,'action' => 'purchase'
		,$package->id
	]);
	echo $package->name;
	echo '<br/>';
	echo $package->description;
	echo '<br/>';
	echo $package->credits;
	echo '<br/>';
	echo $package->price;
	echo '<br/>';
	echo '<br/>';
}
