<?php
/**
 *
 */
?>

<div class="row-fluid">
    <div class="span12">
        <div class="well">
            <h3><?php echo __('All Users')?></h3>
            <hr>
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

