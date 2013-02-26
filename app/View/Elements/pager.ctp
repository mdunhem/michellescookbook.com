<?php
/** 
 * MIT License
 * ===========
 * 
 * Copyright (c) 2012 Mikael Dunhem <mikael.dunhem@gmail.com>
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a
 * copy of this software and associated documentation files (the "Software"),
 * to deal in the Software without restriction, including without limitation
 * the rights to use, copy, modify, merge, publish, distribute, sublicense,
 * and/or sell copies of the Software, and to permit persons to whom the
 * Software is furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL
 * THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
 * FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER
 * DEALINGS IN THE SOFTWARE.
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