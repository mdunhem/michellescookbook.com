<section class="RecipesForm">
	<div class="row-fluid">
		<div class="span4">
			<div class="well">
				<div class="groups form">
				<?php echo $this->Form->create('Group'); ?>
					<fieldset>
						<legend>
							<?php echo __('Edit Group'); ?>
						</legend>
						<?php echo $this->Form->input('id'); ?>
						<ul class="nav nav-tabs nav-stacked">
	                        <li>
	                            <?php echo $this->Form->text(
	                                'name',
	                                array(
	                                    'class' => '',
	                                    'placeholder' => 'Name'
	                                )
	                            ); ?>
	                        </li>
	                    </ul>
					</fieldset>
					<div class="form-actions">
						<?php echo $this->Form->submit(
							__('Save'),
							array(
								'class' => 'btn btn-primary',
								'div' => false
							)
						); ?>
						<?php echo $this->Form->postLink(
							__('Delete'),
							array(
								'action' => 'delete',
								$this->Form->value('Group.id')
							),
							array(
								'class' => 'btn btn-danger'
							),
							__('Are you sure you want to delete # %s?', $this->Form->value('Group.id'))
						); ?>
					</div>
					<?php echo $this->Form->end(); ?>
				</div>
				<div class="actions">
					<h3><?php echo __('Actions'); ?></h3>
					<div class="btn-group">
		            	<?php echo $this->Html->link(
		            			__('List Groups'),
		            			array(
		            				'action' => 'index'
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