<div class="container tabs">
    <div class="span11 margin3 leftmargin1">
        <div class="pull-right">
            <?php echo $this->Html->link('Go back to Sponsee List', array('controller' => 'sponsees', 'action' => 'index'), array('class' => 'btn btn-info btn-small')); ?>
        </div>
        <div style="background:#f9f9f9;" class="pull-left well leftmargin1 topmargin1 span10">
            <h4 class="fontcolor1"><?php echo __('Add New Sponsee Needs'); ?></h4>
            <hr>
            <div style="padding-left:30px;">
                <?php echo $this->Form->create('User'); ?>
                <fieldset>
                    <?php
                    echo '<div class="pull-left">' . $this->Form->input('sponseecategory', array('type'=>'select','options'=>$countryList)) . '</div>';
                    ?>
                </fieldset>
                <hr>
                <?php echo $this->Form->end(__('Save')); ?>
            </div>
        </div>
    </div>
</div>