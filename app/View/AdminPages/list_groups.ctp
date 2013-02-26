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
                        <th><?php echo $this->Paginator->sort('id'); ?></th>
                        <th><?php echo $this->Paginator->sort('name'); ?></th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($groups as $group): ?>
                        <tr>
                            <td><?php echo h($group['Group']['id']); ?>&nbsp;</td>
                            <td><?php echo h($group['Group']['name']); ?>&nbsp;</td>
                            <td class="actions">
                                <?php echo $this->Html->link(
                                    __('View'),
                                    array(
                                        'controller' => 'adminpages',
                                        'action' => 'view',
                                        $group['Group']['id']
                                    )
                                ); ?>
                                <?php echo $this->Html->link(
                                    __('Edit'),
                                    array(
                                        'controller' => 'adminpages',
                                        'action' => 'edit',
                                        $group['Group']['id']
                                    )
                                ); ?>
                                <?php echo $this->Html->link(
                                    __('Delete'),
                                    '#GroupsModal',
                                    array(
                                        'id' => 'deleteButton',
                                        'class' => 'btn-remove-modal',
                                        'data-toggle' => 'modal',
                                        'role'  => 'button',
                                        'data-deleteId' => $group['Group']['id'],
                                        'data-deleteName' => $group['Group']['name']
                                    ));
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal hide" id="GroupsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel"><?php echo __('Remove group') ?></h3>
    </div>
    <div class="modal-body">
        <p><?php echo __('Are you sure you want to delete the group ') ?><span class="delete-modal-name strong"></span> ?</p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true"><?php echo __('Cancel') ?></button>
        <?php echo $this->Html->link(
            __('Delete'),
            array('controller' => 'groups', 'action' => 'delete', ),
            array('class' => 'btn btn-danger delete-user-link')) ?>
    </div>
</div>

