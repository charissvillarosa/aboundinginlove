<div class="container tabs">
    <div class="span11 margin3 leftmargin1">
        <div class="pull-right">
            <?php echo $this->Html->link('<< Back to List', array('action' => 'index'), array('class' => 'btn btn-info btn-small')); ?>
        </div>
        <div style="background:#f9f9f9;" class="pull-left well leftmargin2 topmargin1">
            <h4 class="fontcolor1"><?php echo __('Add New User'); ?></h4>
            <hr>
            <div style="padding-left:30px;">
                <?php echo $this->Form->create('User'); ?>
                <fieldset>
                    <?php
                    echo '<div class="pull-left">' . $this->Form->input('firstname', array('class' => 'span3')) . '</div>';
                    echo '<div class="pull-left">' . $this->Form->input('middlename', array('class' => 'span3')) . '</div>';
                    echo '<div class="pull-left">' . $this->Form->input('lastname', array('class' => 'span3')) . '</div>';
                    echo '<div class="pull-left">' . $this->Form->input('address', array('class' => 'span3')) . '</div>';
                    echo '<div class="pull-left">' . $this->Form->input('country', array('type'=>'select','options'=>$countryList)) . '</div>';
                    echo '<div class="pull-left">' . $this->Form->input('username', array('class' => 'span3')) . '</div>';
                    echo '<div class="pull-left">' . $this->Form->input('password', array('class' => 'span3')) . '</div>';
                    echo '<div class="pull-left">' . $this->Form->input('confirmpassword', array('class' => 'span3')) . '</div>';
                    echo '<div class="pull-left">' . $this->Form->input('role', array(
                        'class' => 'span3',
                        'options' => array('admin' => 'Admin', 'user' => 'User')
                    )). '</div>';
                    ?>
                </fieldset>
                <hr>
                <?php echo $this->Form->end(__('Save')); ?>
            </div>
        </div>
    </div>
</div>