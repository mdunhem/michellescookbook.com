<?php
/**
 *
 */
?>
<div class="pagination pagination-centered">
    <ul>
        <?php 
            echo $this->Paginator->first('<<', array('tag' => 'li'));

            echo $this->Paginator->prev(
                '<',
                array(
                    'tag' => 'li',
                    'class' => 'prev',
                ),
                $this->Paginator->link(
                    '<',
                    array()
                ),
                array(
                    'tag' => 'li',
                    'escape' => false,
                    'class' => 'prev disabled',
                )
            );
            
            echo $this->Paginator->numbers(
                array(
                    'separator' => '',
                    'tag' => 'li',
                    'currentClass' => 'active',
                    'currentTag' => 'a'
                )
            );
           
            echo $this->Paginator->next(
                '>',
                array(
                    'tag' => 'li',
                    'class' => 'next',
                ),
                $this->Paginator->link(
                    '>',
                    array()
                ),
                array(
                    'tag' => 'li',
                    'escape' => false,
                    'class' => 'next disabled',
                )
            );

            echo str_replace(
                '<>',
                '',
                $this->Html->tag(
                    'li',
                    $this->Paginator->last(
                        '>>',
                        array(
                            'tag' => null,
                        )
                    ),
                    array(
                        'class' => 'next',
                    )
                )
            );
        ?>
    </ul>
</div>