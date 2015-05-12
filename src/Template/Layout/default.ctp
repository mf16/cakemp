<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Maintain Plus | App, Web, and Server Maintenance</title>
	<meta name="description" content="Code maintenance and small development tasks that are fast, dependable, and affordable. We handle the upkeep for your app, website, or server. Join today!">
	<meta name="keywords" content="Code maintenance, app maintenance, server maintenance, web development">
	
		<!--
        <?= $this->fetch('title') ?>
		-->
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
	<?= $this->Html->head() ?>

    <?= $this->Html->css('normalize') ?>
    <?= $this->Html->css('style') ?>
    <?= $this->Html->css('font-awesome.min') ?>
    <?= $this->Html->css('animate') ?>
    <?= $this->Html->script('backstretch') ?>
</head>
<body>
    <header>
		<nav class="navbar navbar-default navbar-fixed-top">
		  <div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			<?php
			echo $this->Html->link(
				$this->Html->image('logo.png', array(
					'alt'=>'Logo'
				)),
				array('controller'=>'home','action'=>'index'),
				array('class'=>'navbar-brand','escape'=>false)
			);
			?>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<?php
			if(isset($_SESSION['user_id'])){
			?>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			  <ul class="nav navbar-nav navbar-right">
				<li><a href="/dashboard">Dashboard</a></li>
				<li class="dropdown">
				<?php
					if(isset($_SESSION['user_firstName']) && isset($_SESSION['user_lastName'])){
						$name=$_SESSION['user_firstName'].' '.$_SESSION['user_lastName'];
					} else {
						$name=$_SESSION['display_name'];
					}
				?>
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $name?><span class="caret"></span></a>
				  <ul class="dropdown-menu" role="menu">
					<li><a href="/user/settings">Account Settings</a></li>
					<li><a href="/credits/add">Add Credits</a></li>
					<li class="divider"></li>
					<li><a href="/logout">Logout</a></li>
				  </ul>
				</li>
			  </ul>
			</div><!-- /.navbar-collapse -->
			<?php
			}
			else{
				?>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<li style="line-height:81px; padding-right:15px;"><span>+2 credits for free</span></li>
						<li><a class="loginHeader" href="/register/client">SIGN UP NOW</a></li>
						<li><a href="/login">LOGIN</a></li>
					</ul>
				</div>
				<?php
			}
			?>
		  </div><!-- /.container-fluid -->
		</nav>
	



	
		<!--
		ORIGINAL CAKEPHP HEADER

        <div class="header-title" style="margin-top:50px;">
            <span><?= $this->fetch('title') ?></span>
        </div>
        <div class="header-help">
            <span><a target="_blank" href="http://book.cakephp.org/3.0/">Documentation</a></span>
            <span><a target="_blank" href="http://api.cakephp.org/3.0/">API</a></span>
        </div>
		-->
    </header>
    <div id="container">

        <div id="content">
            <?= $this->Flash->render() ?>

            <div class="row">
                <?= $this->fetch('content') ?>
            </div>
        </div>
        <footer>
        </footer>
    </div>
</body>
</html>
