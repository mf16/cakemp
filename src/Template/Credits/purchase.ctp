purchase here
<?php
//debug($package);
echo $package->id;
echo '<br/>';
echo $package->name;
echo '<br/>';
echo $package->description;
echo '<br/>';
echo $package->price;
echo '<br/>';
require_once ROOT.'/vendor/braintree/lib/Braintree.php';
require_once ROOT.'/config/braintreeConfig.php';
$clientToken = Braintree_ClientToken::generate(array(
));
		try{
			$customer=Braintree_Customer::find($userid);
			if(!empty($customer->creditCards)){
				foreach($customer->creditCards as $key=>$cardInfo){
					//d($cardInfo);
					echo '
					<div class="savedContainer">
					<form id="" method="post" action="/credits/purchase/'.$package->id.'">
					';
						//hidden field with package id -> do not pass cost to prevent hacking
						echo '<input type="hidden" name="packageid" value="'.$package->id.'">';
						echo '<input type="hidden" name="paymentToken" value="'.$cardInfo->token.'">';
						echo '
						<input style="" type="submit" id="savedCheckout" value="Pay $'.$package->price.' with '.$cardInfo->cardType.' ending in '.$cardInfo->last4.'">
					</form>
					</div>
					<br/>
					';
				}
			}
		} catch (Exception $e){
			debug($e);
		}
		echo '
		<div class="btcontainer">
		<form id="checkout" method="post" action="/credits/purchase/'.$package->id.'">
		';
		echo '
		<script src="https://js.braintreegateway.com/v2/braintree.js"></script>
			<div id="dropin"></div>
			';
			//hidden field with package id -> do not pass cost to prevent hacking
			echo '<input type="hidden" name="packageid" value="'.$package->id.'">';
			$keepInfoString='<input type="checkbox" name="keepInfo" value="keepInfoVal">Save this info for later';
			echo $keepInfoString;
			echo '
			<input type="submit" value="Pay $'.$package->price.'">
		</form>
		</div>
		';
		echo '
		<script>
  braintree.setup(
  "'.$clientToken.'",
  \'dropin\', {
	container: dropin
	,form:$("#checkout")
  });

  </script>
	';

?>
