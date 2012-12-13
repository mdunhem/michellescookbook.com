<section class="RecipesForm" id="addUserForm">
	<div class="row-fluid">
		<div class="span4">
			<div class="well">
				<div class="users form">
				<?php echo $this->Form->create('User'); ?>
					<fieldset>
						<legend>
							<?php echo __('Add User'); ?>
						</legend>
						<ul class="nav nav-tabs nav-stacked">
	                        <li>
	                            <?php echo $this->Form->text(
	                                'username',
	                                array(
	                                    'class' => '',
	                                    'placeholder' => 'Username'
	                                )
	                            ); ?>
	                        </li>
	                        <li>
	                            <?php echo $this->Form->text(
	                                'password',
	                                array(
	                                    'class' => '',
	                                    'placeholder' => 'Password'
	                                )
	                            ); ?>
	                        </li>
	                    </ul>
	                    <?php echo $this->Form->input('group_id'); ?>
					</fieldset>
					<?php echo $this->Form->submit(__('Create'), array('class' => 'btn btn-primary', 'div' => 'form-actions')); ?>
				<?php echo $this->Form->end(); ?>
				</div>
				<div class="actions">
					<h3><?php echo __('Actions'); ?></h3>
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
