<!-- File: /app/View/Recipes/search.ctp -->
<?php
if (isset($recipes) && !empty($recipes)) {
    $count = 1;
?>
    <div class="row-fluid">
        <div class="span12">
            <div class="page-header">
                <h1><?php echo __('Results'); ?></h1>
            </div>
        </div>
        <div class="span11">
            <ul data-role="listview">
                <?php foreach ($recipes as $recipe) { ?>
                        <li class="overflow-search-formatting">
                            <a href="<?php 
                                echo $this->Html->url(
                                    array(
                                        'controller' => 'recipes',
                                        'action' => 'search',
                                        'action' => 'recipe',
                                        $recipe['Recipe']['id']
                                    )
                                ); ?>">
                                <div class="row-fluid">
                                    <div class="span9">
                                        <h1><?php echo $recipe['Recipe']['name']; ?></h1>
                                        <p><?php echo $recipe['Recipe']['description']; ?></p>
                                    </div>
                                    <div class="span3"><?php
                                        $class = 'pull-left';
                                        if (strlen($recipe['Recipe']['prep_time'])) {
                                            echo '<p class="pull-left">Prep Time: ' . $recipe['Recipe']['prep_time'] . ' minutes</p>';
                                            $class = 'pull-right';
                                        }
                                        if (strlen($recipe['Recipe']['cook_time'])) {
                                            echo '<p class="'.$class.'">Cook Time: ' . $recipe['Recipe']['cook_time'] . ' minutes</p>';
                                        } ?>
                                    </div>
                                </div>
                            </a>
                        </li>
                <?php } ?>
            </ul>
        </div>
    </div>
<?php
} else {
    echo $this->Html->div(
        'row-fluid',
        $this->Html->div(
            'span10 offset1',
            $this->Html->tag(
                'h1',
                $this->Html->link('Sorry, no recipes found.', '/')
            )
        )
    );
}
?>

