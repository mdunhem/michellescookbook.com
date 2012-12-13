<section class="RecipesForm">
	<div class="row-fluid">
		<div class="span4">
			<div class="well">
				<div class="groups form">
				<?php echo $this->Form->create('Group'); ?>
					<fieldset>
						<legend>
							<?php echo __('Add Group'); ?>
						</legend>
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
					<?php echo $this->Form->submit(__('Create'), array('class' => 'btn btn-primary', 'div' => 'form-actions')); ?>
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

