<section class="RecipesForm">
	<div class="row-fluid">
		<div class="span6">
			<div class="well">
				<div class="groups index">
					<h2><?php echo __('Groups'); ?></h2>
					<table class="table">
						<thead>
							<tr>
									<th><?php echo $this->Paginator->sort('id'); ?></th>
									<th><?php echo $this->Paginator->sort('name'); ?></th>
									<th class="actions"><?php echo __('Actions'); ?></th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($groups as $group): ?>
							<tr>
								<td><?php echo h($group['Group']['id']); ?>&nbsp;</td>
								<td><?php echo h($group['Group']['name']); ?>&nbsp;</td>
								<td class="actions">
									<?php echo $this->Html->link(__('View'), array('action' => 'view', $group['Group']['id'])); ?>
									<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $group['Group']['id'])); ?>
									<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $group['Group']['id']), null, __('Are you sure you want to delete # %s?', $group['Group']['id'])); ?>
								</td>
							</tr><?php
							endforeach; ?>
						</tbody>
					</table>
					<p>
					<?php
					echo $this->Paginator->counter(array(
					'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
					));
					?>	</p>

					<div class="paging">
					<?php
						echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
						echo $this->Paginator->numbers(array('separator' => ''));
						echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
					?>
					</div>
				</div>
				<div class="actions">
					<h3><?php echo __('Actions'); ?></h3>
					<div class="btn-group">
		            	<?php echo $this->Html->link(
		            			__('New Group'),
		            			array(
		            				'action' => 'add'
		            			),
		            			array(
		            				'class' => 'btn btn-small'
		            			)
		            		); ?>
		            	<?php echo $this->Html->link(
		            			__('List Users'),
		            			array(
		            				'controller' => 'users'
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
			</div>
		</div>
	</div>
</section>



