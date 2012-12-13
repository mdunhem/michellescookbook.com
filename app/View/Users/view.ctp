<section class="RecipesForm">
	<div class="row-fluid">
		<div class="span6">
			<div class="well">
				<div class="users view">
				<h2><?php  echo __('User'); ?></h2>
					<dl>
						<dt><?php echo __('Id'); ?></dt>
						<dd>
							<?php echo h($user['User']['id']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Username'); ?></dt>
						<dd>
							<?php echo h($user['User']['username']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Password'); ?></dt>
						<dd>
							<?php echo h($user['User']['password']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Group'); ?></dt>
						<dd>
							<?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Created'); ?></dt>
						<dd>
							<?php echo h($user['User']['created']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Modified'); ?></dt>
						<dd>
							<?php echo h($user['User']['modified']); ?>
							&nbsp;
						</dd>
					</dl>
				</div>
				<div class="actions">
					<h3><?php echo __('Actions'); ?></h3>
					<div class="btn-group">
						<?php echo $this->Html->link(
		            			__('Edit User'),
		            			array(
		            				'action' => 'edit',
		            				$user['User']['id']
		            			),
		            			array(
		            				'class' => 'btn'
		            			)
		            		); ?>
						<?php echo $this->Form->postLink(
								__('Delete User'),
								array(
									'action' => 'delete',
									$user['User']['id']
								),
								array(
									'class' => 'btn'
								),
								__('Are you sure you want to delete # %s?', $user['User']['id'])
							); ?>
					</div>
					<hr>
					<div class="btn-group">
		            	<?php echo $this->Html->link(
		            			__('List Users'),
		            			array(
		            				'action' => 'index'
		            			),
		            			array(
		            				'class' => 'btn btn-small'
		            			)
		            		); ?>
		            	<?php echo $this->Html->link(
		            			__('New User'),
		            			array(
		            				'action' => 'add'
		            			),
		            			array(
		            				'class' => 'btn btn-small'
		            			)
		            		); ?>
		            	<?php echo $this->Html->link(
		            			__('List Groups'),
		            			array(
		            				'controller' => 'groups',
		            				'action' => 'index'
		            			),
		            			array(
		            				'class' => 'btn btn-small'
		            			)
		            		); ?>
		            	<?php echo $this->Html->link(
			            		__('New Group'),
			            		array(
			            			'controller' => 'groups',
			            			'action' => 'add'
			            		),
			            		array(
			            			'class' => 'btn btn-small'
			            		)
			            	); ?>
		            </div>
					
				</div>
			</div>
		</div>
	</div>
</section>


