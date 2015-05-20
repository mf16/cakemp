	<?php
	// can't put in header for some read
	echo $this->Html->script('backstretch');
	?>
<div style="width:100%;">
	<div class="text-center container pageWrapper">
		<?php
		echo $this->Html->image('icon.png',['fullBase'=>true,'class'=>'homeIcon']);
		?>
		<div class="clearfix"></div>
		<span class="headerText">Let us fret the small stuff,<br>so you don't have to</span>
	</div>
	<div class="clearfix"></div>
	<div class="tealBg text-center">
		<div class="container">
			<div class="col-md-12">
				<i class="fa fa-plus"></i>
				<p>We know how it is, you're busy. You've got important-person stuff to do.<br>Deals to close, investors to meet, industries to revolutionize. The last thing you want is to waste your time convincing a developer to do a "small fix" or "quick change" for you.</p>
				<p>Maintain plus takes code upkeep off your hands so you can worry about more important things.</p>
				<div class="clearfix"></div>
				<i class="fa fa-plus"></i>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="grayBg text-center">
		<div class="container">
			<div class="col-md-12 text-center mg-b-lg">
				<h2 class="tealHeader">FAST - RELIABLE - AFFORDABLE</h2>
			</div>
			<div class="col-md-4 text-center points">
				<?php echo $this->Html->image('icon1.png',
					['alt'=>'code maintenance icon']
				); ?>
				<br>
				<h3>
					CODE MAINTENANCE
				</h3>
				<div class="col-md-10 col-md-offset-1 text-left">
					Submit any bug report or quick fix and our expert coders will get it done, lickity split.
				</div>
			</div>
			<div class="col-md-4 text-center points">
				<?php echo $this->Html->image('icon2.png',
					['alt'=>'app upkeep icon']
				); ?>
				<br>
				<h3>
					APP UPKEEP
				</h3>
				<div class="col-md-10 col-md-offset-1 text-left">
					OS updates, new screen sizes, updated content. Maintaining your mobile app is an ongoing process. Let us save you the hassle.
				</div>
			</div>
			<div class="col-md-4 text-center points">
				<?php echo $this->Html->image('icon3.png',
					['alt'=>'small jobs icon']
				); ?>
				<br>
				<h3>
					SMALL JOBS
				</h3>
				<div class="col-md-10 col-md-offset-1 text-left">
					Need a small improvement or a simple new feature for your app or website? We've got you covered.
				</div>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="whiteBg text-center">
		<div class="container">
			<div class="col-md-12">
				<h2 class="tealHeader">MAINTENANCE TASKS?</h2>
				<h3 class="teal">AIN'T NOBODY GOT TIME FOR THAT</h3>
			</div>
			<div class="col-md-10 text-left mg-t-lg">
				<h3 class="red">STEP 1: GET SET UP</h3>
				<ul class="dashed">
					<li> Share your code and requirements and we'll take a look under the hood.</li>
					<li> Score free credits or buy some on sale while you wait.</li>
				</ul>
			</div>
			<div class="col-md-2 mg-t-lg" style="padding-top:50px;">
				<a href="/register" class="btn btn-default" style="color:white;">SIGN UP</a>
			</div>
			<div class="col-md-10 mg-t-lg text-center col-md-offset-1" style="position:relative;">
				<?php
				echo $this->Html->image('step1.jpg',['alt'=>'step1']);
				?>
			</div>
		</div>
	</div>
	<div class="whiteBg text-center shadowOverlay">
		<div class="container">
			<div class="col-md-6 text-left mg-t-lg">
				<h3 class="red">STEP 2: GET A TIMELINE</h3>
				<br>
				<ul class="dashed">
					<li> In less than 48 hours we'll let you know how long we need to complete your task.</li>
					<li> If the task is outside our scope, we'll help you find a good developer who can handle it.</li>
				</ul>
			</div>
			<div class="col-md-6 mg-t-lg text-right" style="padding-top: 75px;">
				<?php
				echo $this->Html->image('step2.jpg',['alt'=>'step2']);
				?>
			</div>
		</div>
	</div>
	<hr>
	<div class="whiteBg text-center">
		<div class="container">
			<div class="col-md-7 mg-t-lg text-right">
				<?php
				echo $this->Html->image('step3.jpg',['alt'=>'step3']);
				?>
			</div>
			<div class="col-md-4 text-left mg-t-lg">
				<h3 class="red">STEP 3: GIT 'ER DONE</h3>
				<br>
				<ul class="dashed">
					<li> After you approve the timeline, we'll crank out the fixes.</li>
					<li> If we have any questions, we'll communicate with you on the Task Timeline.</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="grayBg text-center" style="padding: 85px 0;">
		<div class="container">
			<div class="col-md-12 text-center mg-b-lg">
				<h2 class="tealHeader" style="color:#737374">- THE TEAM -</h2>
				<h3>WHERE THE MAGIC HAPPENS</h3>
			</div>
			<div class="col-md-3 text-center">
				<?php
				echo $this->Html->image('jd.jpg',['fullBase'=>true,'class'=>'rounded profile','alt'=>'JD Tueller']);
				?>
				<br>
				<h3>JD Tueller</h3>
				<p>UX/Strategy</p>
			</div>
			<div class="col-md-3 text-center">
				<?php
				echo $this->Html->image('lisa.jpg',['fullBase'=>true,'class'=>'rounded profile','alt'=>'Lisa Webster']);
				?>
				<br>
				<h3>Lisa Webster</h3>
				<p>UX/UI Designer</p>
			</div>
			<div class="col-md-3 text-center">
				<?php
				echo $this->Html->image('tyler.jpg',['fullBase'=>true,'class'=>'rounded profile','alt'=>'Tyler Slater']);
				?>
				<br>
				<h3>Tyler Slater</h3>
				<p>Front-end Developer</p>
			</div>
			<div class="col-md-3 text-center">
				<?php
				echo $this->Html->image('mitch.jpg',['fullBase'=>true,'class'=>'rounded profile','alt'=>'Mitch Facer']);
				?>
				<br>
				<h3>Mitch Facer</h3>
				<p>Back-end Developer</p>
			</div>
		</div>
	</div>
	<div class="tealBg" style="margin-top:0">
		<div class="container">
			<div class="col-md-4 text-center smaller">
				<div class="col-md-12 darkBg demand" style="padding: 20px 40px;">
					<h3>ON-DEMAND</h3><br>
					<span class="pull-left">5 credits/month</span><span class="pull-right">$100/mo</span>
					<span class="pull-left">Early Bird Bonus:</span><span class="pull-right">+2 credits</span>
					<div class="clearfix">	</div>
					<hr class="black">
					<span class="pull-left">10 credits/month</span><span class="pull-right">$175/mo</span>
					<span class="pull-left">Early Bird Bonus:</span><span class="pull-right">+5 credits</span>
					<div class="clearfix">	</div>
					<hr class="black">
					<span class="pull-left">20 credits/month</span><span class="pull-right">$300/mo</span>
					<span class="pull-left">Early Bird Bonus:</span><span class="pull-right">+10 credits</span>
				</div>
			</div>
			<div class="col-md-4 text-center">
				<div class="col-md-12 darkBg" style="padding: 20px 40px;">
					<h3>MONTHLY<br> SUBSCRIPTION</h3><br>
					<span class="pull-left">5 credits/month</span><span class="pull-right">$80/mo</span>
					<span class="pull-left">Early Bird Bonus:</span><span class="pull-right">+2 credits</span>
					<div class="clearfix">	</div>
					<hr class="black">
					<span class="pull-left">10 credits/month</span><span class="pull-right">$150/mo</span>
					<span class="pull-left">Early Bird Bonus:</span><span class="pull-right">+5 credits</span>
					<div class="clearfix">	</div>
					<hr class="black">
					<span class="pull-left">20 credits/month</span><span class="pull-right">$250/mo</span>
					<span class="pull-left">Early Bird Bonus:</span><span class="pull-right">+10 credits</span>
					<div class="clearfix">	</div>
					<a href="/register"><button class="btn btn-primary red text-center" style="width:100%;padding: 14px;margin: 20px 0;">SIGN UP NOW</button></a>
				</div>
			</div>
			<div class="col-md-4 text-center smaller">
				<div class="col-md-12 darkBg">
					<div class="col-md-12 darkBg text-center custom" style="padding: 20px 40px;">
						<h3>CUSTOM</h3><br><br>
						<span>Have more than 5 projects that need constant maintenance?</span>
						<div class="clearfix">	</div>
						<hr class="black">
						<span>Contact us and we can tell you more about our services.</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="darkBg">
		<div class="container">
			<p><?php echo date("Y")?> Copyright Maintain Plus</p>
		</div>
	</div>
</div>

	<script>
		$.backstretch("/img/bg.jpg");

		$( document ).ready(function() {
		  $('.custom').height($('.demand').height());
		});
	</script>

