<div class="taskHeader col-md-12">
	<div class="row">
		<div class="col-md-6">
			<h1>Task Timeline</h1>
		</div>
		<div class="col-md-6 mg-t-lg text-right">
			<?php
			// this logic is fucked.
			if($userRole=='client'){
				//debug($task);die;
				
				if(!in_array($task->task_status->status,['completed','cancelled','client review'])){
				//if($task->task_status->status!='completed' && $task->task_status->status!='cancelled'){
					if ($task->task_status->id<6){
						$message='Task cancelled by client.';
						$btnText='Cancel Task Request';
						$status=$this->Form->hidden('status_id',['value' => 9]);
						$actionName=$this->Form->hidden('actionName',['value'=>'cancel']);
					} else {
						$message='Task marked complete by client.';
						$btnText='Mark Task Complete';
						$status=$this->Form->hidden('status_id',['value' => 8]);
						$actionName=$this->Form->hidden('actionName',['value'=>'confirmComplete']);
					} 
					echo $this->Form->create(null,[
						'url' => ['controller'=>'TaskTimeline','action'=>'view']
					]);
					echo $this->Form->hidden('message',['type'=>'textarea','style'=>'width:100%;height:150px;','value'=>$message,'label'=>false]);
					echo $this->Form->hidden('task_id',['value'=>$task->id]);
					echo $status;
					echo $actionName;
					echo $this->Form->button($btnText,
					[
						'class' => 'btn btn-primary mg-t-md'
						,'type'=>'submit'
					]);
					echo $this->Form->end();
				}
			} else if($userRole=='developer'){
				if ($task->task_status->id==6){
					$message='Task sent to client for review.';
					$status=$this->Form->hidden('status_id',['value' => 7]);
					$btnText='Send task to client for review.';
					$actionName=$this->Form->hidden('actionName',['value'=>'markForReview']);

					echo $this->Form->create(null,[
						'url' => ['controller'=>'TaskTimeline','action'=>'view']
					]);
					echo $this->Form->hidden('message',['type'=>'textarea','style'=>'width:100%;height:150px;','value'=>$message,'label'=>false]);
					echo $this->Form->hidden('task_id',['value'=>$task->id]);
					echo $status;
					echo $actionName;
					echo $this->Form->button($btnText,
					[
						'class' => 'btn btn-primary mg-t-md'
						,'type'=>'submit'
					]);
					echo $this->Form->end();
				}
			}
			?>
		</div>
	</div>
	<div class="col-md-12 taskDescription">
		<?php
		echo $task->name;
		echo '<br/>';
		echo $task->project->name;
		echo '<br/>';
		echo __($task->description);
		?>
	</div>
	<section class="panel">
		<div class="panel-body">
			<div class="text-center mbot30">
				<h2 class="timeline-title">Task Timeline</h2>
			</div>

			<div class="timeline">
				<?php
						foreach($timelineEvents as $key=>$event){
							$altText='alt';
							if($curUser==$event->user->id){
								$altText='';
							}
							?>
							<article class="timeline-item <?php echo $altText;?>">
								<div class="timeline-desk">
									<div class="panel">
										<div class="panel-body">
											<span class="arrow-<?php echo $altText;?>"></span>
											<span class="timeline-icon red"></span>
											<span class="timeline-date"><?php echo date('h:i a',strtotime($event['created']));?></span>
											<h1 class="red"><?php echo date('j F | l',strtotime($event['created']));?></h1>
											<?php
											//get author's name
											/*
											$sql="SELECT * FROM users WHERE id=?;";
											$eventUser=query($sql,$event['author']);
											$eventUser=$eventUser[0];
											$eventUser=$eventUser['first_name'].' '.$eventUser['last_name'];
											*/
											?>
											<?php echo __($event->user->first_name.' '.$event->user->last_name).' <b>('.ucwords($event->user->role).')</b>';?>
											<br/>
											<br/>
											<?php 
											if($event->attachment['id']){
												echo $this->Html->link($event->attachment['name']
													,$event->attachment['uri']
													,['download'=>$event->attachment['name']]
												);
												echo '<br/>';
												echo '<br/>';
											}
											?>
											<?php echo ($event['message']);?>
										</div>
									</div>
								</div>
							</article>
							<?php
						}
				?>

				<?php
				if($task->task_status->status!='completed' && $task->task_status->status!='cancelled'){
					if($userRole=='developer' && $task->task_status->status=='awaiting bid'){
						?>
						<article class="timeline-item">
							<div class="timeline-desk">
								<div class="panel">
									<div class="panel-body">
										<span class="arrow"></span>
										<span class="timeline-icon light-green"></span>
											<?php
											echo '<h1 class="light-green">Submit Bid</h1>';
											//<textarea id="clientMessage" class="form-control"></textarea>
											echo $this->Form->create('sendBid',[
												'url' => ['controller'=>'TaskTimeline','action'=>'view']
											]);
											echo $this->Form->input('wait_time',[
												'type' => 'number'
												,'label' => 'Lead Time (days)'
												,'required'
											]);
											echo $this->Form->input('work_time',[
												'type' => 'number'
												,'label' => 'Work Time (hrs)'
												,'required'
											]);
											echo $this->Form->hidden('actionName',['value'=>'submitBid']);
											echo $this->Form->hidden('task_id',['value'=>$task->id]);
											echo $this->Form->button('Submit Bid',
											[
												'class' => 'btn btn-primary mg-t-md'
												,'type'=>'submit'
											]);
											echo $this->Form->end();
											?>
									</div>
								</div>
							</div>
						</article>
						<?php
					} else if ($userRole=='client' && $task->task_status->status=='awaiting bid acceptance'){
						?>
						<article class="timeline-item">
							<div class="timeline-desk">
								<div class="panel">
									<div class="panel-body">
										<span class="arrow"></span>
										<span class="timeline-icon light-green"></span>
											<?php
											echo '<h1 class="light-green">Accept/Deny Bid</h1>';
											echo 'The current bid is a lead time of '.end($task->bids)->wait_time.' days and a cost of '.end($task->bids)->work_time.' credits.';
											//<textarea id="clientMessage" class="form-control"></textarea>
											echo $this->Form->create('acceptBid',[
												'url' => ['controller'=>'TaskTimeline','action'=>'view']
											]);
											echo $this->Form->hidden('actionName',['value'=>'acceptBid']);
											$message='Bid accepted by client.';
											echo $this->Form->hidden('message',['type'=>'textarea','style'=>'width:100%;height:150px;','value'=>$message,'label'=>false]);
											echo $this->Form->hidden('task_id',['value'=>$task->id]);
											echo $this->Form->button('Accept Bid',
											[
												'class' => 'btn btn-primary mg-t-md'
												,'type'=>'submit'
											]);
											echo $this->Form->end();
											echo $this->Form->create('denyBid',[
												'url' => ['controller'=>'TaskTimeline','action'=>'view']
											]);
											echo $this->Form->hidden('actionName',['value'=>'denyBid']);
											$message='Bid rejected by client.';
											echo $this->Form->hidden('message',['type'=>'textarea','style'=>'width:100%;height:150px;','value'=>$message,'label'=>false]);
											echo $this->Form->hidden('task_id',['value'=>$task->id]);
											echo $this->Form->button('Deny Bid',
											[
												'class' => 'btn btn-primary mg-t-md'
												,'type'=>'submit'
											]);
											echo $this->Form->end();
											?>
									</div>
								</div>
							</div>
						</article>
						<?php
					} else if ($userRole=='client' && $task->task_status->status=='client review'){
						?>
						<article class="timeline-item">
							<div class="timeline-desk">
								<div class="panel">
									<div class="panel-body">
										<span class="arrow"></span>
										<span class="timeline-icon light-green"></span>
											<?php
											echo '<h1 class="light-green">Confirm Work Complete</h1>';
											echo 'Please do not click accept until the work is totally complete.';
											echo 'This will cost: '.end($task->bids)->work_time.' credits.';
											//<textarea id="clientMessage" class="form-control"></textarea>
											echo $this->Form->create('acceptBid',[
												'url' => ['controller'=>'TaskTimeline','action'=>'view']
											]);
											echo $this->Form->hidden('actionName',['value'=>'confirmComplete']);
											echo $this->Form->hidden('task_id',['value'=>$task->id]);
											echo $this->Form->hidden('status_id',['value'=>8]);
											echo $this->Form->hidden('message',['value'=>'Task marked complete by client.']);
											echo $this->Form->button('Accept Work as Complete',
											[
												'class' => 'btn btn-primary mg-t-md'
												,'type'=>'submit'
											]);
											echo $this->Form->end();
											echo $this->Form->create('denyBid',[
												'url' => ['controller'=>'TaskTimeline','action'=>'view']
											]);
											echo $this->Form->hidden('actionName',['value'=>'rejectComplete']);
											echo $this->Form->hidden('task_id',['value'=>$task->id]);
											echo $this->Form->hidden('status_id',['value'=>6]);
											echo $this->Form->hidden('message',['value'=>'Task rejected complete by client.']);
											echo $this->Form->button('Reject Work as Incomplete',
											[
												'class' => 'btn btn-primary mg-t-md'
												,'type'=>'submit'
											]);
											echo $this->Form->end();
											?>
									</div>
								</div>
							</div>
						</article>
						<?php
				} else if(!($userRole=='developer' && $task->task_status->status=='client review')){
					?>
					<article class="timeline-item">
						<div class="timeline-desk">
							<div class="panel">
								<div class="panel-body">
									<span class="arrow"></span>
									<span class="timeline-icon light-green"></span>
										<?php
										echo '<h1 class="light-green">New message</h1>';
										//<textarea id="clientMessage" class="form-control"></textarea>
										echo $this->Form->create(null,[
											'url' => ['controller'=>'TaskTimeline','action'=>'view']
											,'enctype' => 'multipart/form-data'
										]);
										echo $this->Form->input('message',['type'=>'textarea','style'=>'width:100%;height:150px;','label'=>false]);
										echo $this->Form->input('file',['type'=>'file','label'=>'Attachment']);
										echo $this->Form->hidden('actionName',['value'=>'upload']);
										echo $this->Form->hidden('task_id',['value'=>$task->id]);
										echo $this->Form->button('Send Message',
										[
											'class' => 'btn btn-primary mg-t-md'
											,'type'=>'submit'
										]);
										echo $this->Form->end();
										?>
								</div>
							</div>
						</div>
					</article>
					<?php
				}
			}
				?>
			</div>
			<div class="clearfix">&nbsp;</div>
		</div>
	</section>
</div>
