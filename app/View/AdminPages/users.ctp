<?php
/**
 *
 */

$this->Paginator->options(array(
    'update' => '#content',
    'before' => $this->Js->get('#busy-indicator')->effect('fadeIn', array('buffer' => false)),
    'complete' => $this->Js->get('#busy-indicator')->effect('fadeOut', array('buffer' => false)),
));

Debugger::log($this->Paginator->params());

?>

<div class="row-fluid">
    <div class="span12">
        <div class="well">
            <div class="row-fluid">
                <div class="span12">
                    <!-- <div id="busy-indicator" class="center">Loading...<div class="center"></div></div> -->
                    <?php echo $this->Html->div('center', 'Loading...', array('id' => 'busy-indicator')); ?>
                    <h3><?php echo __('All Users')?></h3>
                    <hr>
                    <?php echo $this->element('pager'); ?>
                    <div id="usersTable">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo __('Username') ?></th>
                                    <th><?php echo __('Role') ?></th>
                                    <th><?php echo __('Group ID') ?></th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach( $users as $user ){ ?>
                                <tr>
                                    <td width="50px"><?php echo $user['User']['id'] ?></td>
                                    <td><?php echo $user['User']['username'] ?></td>
                                    <td><?php echo $user['Group']['name'] ?></td>
                                    <td><?php echo $user['User']['group_id'] ?></td>
                                    <td width="150px">
                                        <?php echo $this->Html->link(__('View'),'/users/view/'.$user['User']['id']) ?> | 
                                        <?php echo $this->Html->link(__('Edit'),'/users/edit/'.$user['User']['id']) ?> |
                                        <?php echo $this->Html->link(
                                            __('Delete'),
                                            '#UsersModal',
                                            array(
                                                'class' => 'btn-remove-modal',
                                                'data-toggle' => 'modal',
                                                'role'  => 'button',
                                                'data-uid' => $user['User']['id'],
                                                'data-uname' => $user['User']['username']
                                            ));
                                        ?>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <p><?php
                        echo $this->Paginator->counter(
                            array(
                                'format' => __(
                                    'Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}'
                                )
                            )
                        ); ?>
                    </p>

                    <?php echo $this->element('pager'); ?>

                </div>
            </div>
            <hr>
            <div class="row-fluid">
                <div class="span6 offset2">
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
            </div>
        </div>
    </div>
</div>
<div class="modal hide" id="UsersModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel"><?php echo __('Remove user') ?></h3>
    </div>
    <div class="modal-body">
        <p><?php echo __('Are you sure you want to delete the user ') ?><span class="label-uname strong"></span> ?</p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true"><?php echo __('Cancel') ?></button>
        <?php echo $this->Html->link(__('Delete'),'/users/delete/0',array('class' => 'btn btn-danger delete-user-link')) ?>
    </div>
</div>

