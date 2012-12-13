<div class="row-fluid">
	<div class="span12">
		<div class="well">
			<div class="users index">
				<h2><?php echo __('Users'); ?></h2>
				<table class="table">
					<thead>
						<tr>
							<th><?php echo $this->Paginator->sort('id'); ?></th>
							<th><?php echo $this->Paginator->sort('username'); ?></th>
							<th><?php echo $this->Paginator->sort('group_id'); ?></th>
							<th class="actions"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($users as $user): ?>
							<tr>
								<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
								<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
								<td>
									<?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
								</td>
								<td class="actions">
									<?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?>
									<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?>
									<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
								</td>
							</tr><?php
						endforeach; ?>
					</tbody>
				</table>
				<blockquote>
					<p><?php
						echo $this->Paginator->counter(
							array(
								'format' => __(
									'Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}'
								)
							)
						); ?>
					</p>
				</blockquote>

				<!-- <div class="pagination pagination-centered">
		            <ul>
		                <li class="disabled"><a href="#">«</a></li>
		                <li class="active"><a href="#">1</a></li>
		                <li><a href="#">2</a></li>
		                <li><a href="#">3</a></li>
		                <li><a href="#">4</a></li>
		                <li><a href="#">5</a></li>
		                <li><a href="#">»</a></li>
		            </ul>
	            </div> -->
				<div class="pagination pagination-centered">
					<ul>
						<?php
							echo $this->Paginator->prev(
								'< ' . __('previous'),
								array(
									'tag' => 'li'
								),
								null,
								array(
									'class' => 'disabled',
									'tag' => 'li'
								)
							);
							echo $this->Paginator->numbers(
								array(
									'separator' => '',
									'tag' => 'li',
									'currentClass' => 'active'
								)
							);
							echo $this->Paginator->next(
								__('next') . ' >',
								array(
									'tag' => 'li'
								),
								null,
								array(
									'class' => 'disabled',
									'tag' => 'li'
								)
							);
						?>
					</ul>
				</div>
			</div>

			<div class="actions">
				<h3><?php echo __('Actions'); ?></h3>
				<div class="btn-group">
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
	            				'controller' => 'groups'
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
