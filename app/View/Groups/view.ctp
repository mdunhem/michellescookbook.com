<section class="RecipesForm">
	<div class="row-fluid">
		<div class="span6">
			<div class="well">
				<div class="groups view">
				<h2><?php  echo __('Group'); ?></h2>
					<dl>
						<dt><?php echo __('Id'); ?></dt>
						<dd>
							<?php echo h($group['Group']['id']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Name'); ?></dt>
						<dd>
							<?php echo h($group['Group']['name']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Created'); ?></dt>
						<dd>
							<?php echo h($group['Group']['created']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Modified'); ?></dt>
						<dd>
							<?php echo h($group['Group']['modified']); ?>
							&nbsp;
						</dd>
					</dl>
				</div>
				<div class="actions">
					<h3><?php echo __('Actions'); ?></h3>
					<div class="btn-group">
		            	<?php echo $this->Html->link(
		            			__('Edit Group'),
		            			array(
		            				'action' => 'edit',
		            				$group['Group']['id']
		            			),
		            			array(
		            				'class' => 'btn'
		            			)
		            		); ?>
		            	<?php echo $this->Html->link(
		            			__('Delete Group'),
		            			array(
		            				'action' => 'delete',
		            				$group['Group']['id']
		            			),
		            			array(
		            				'class' => 'btn btn-danger'
		            			),
		            			__('Are you sure you want to delete # %s?', $group['Group']['id'])
		            		); ?>
		            </div>
		            <hr>
		            <div class="btn-group">
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
			        <!-- </div>
		            <hr>
		            <div class="btn-group"> -->
			            <?php echo $this->Html->link(
			            		__('List Users'),
			            		array(
			            			'controller' => 'users',
			            			'action' => 'index'
			            		),
			            		array(
			            			'class' => 'btn btn-small'
			            		)
			            	); ?>
			            <?php echo $this->Html->link(
			            		__('New User'),
			            		array(
			            			'controller' => 'users',
			            			'action' => 'add'
			            		),
			            		array(
			            			'class' => 'btn btn-small'
			            		)
			            	); ?>
		            </div>
				</div>
				<div class="related">
					<h3><?php echo __('Related Users'); ?></h3>
					<?php if (!empty($group['User'])): ?>
					<table class="table">
						<thead>
							<tr>
								<th><?php echo __('Id'); ?></th>
								<th><?php echo __('Username'); ?></th>
								<th class="actions"><?php echo __('Actions'); ?></th>
							</tr>
						</thead>
						<tbody>
							<?php
								$i = 0;
								foreach ($group['User'] as $user): ?>
								<tr>
									<td><?php echo $user['id']; ?></td>
									<td><?php echo $user['username']; ?></td>
									<td class="actions">
										<?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
										<?php echo $this->Html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
										<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users', 'action' => 'delete', $user['id']), null, __('Are you sure you want to delete # %s?', $user['id'])); ?>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				<?php endif; ?>

					<div class="actions">
						<?php echo $this->Html->link(
								__('New User'),
								array(
									'controller' => 'users',
									'action' => 'add'
								),
								array(
									'class' => 'btn')
							); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


