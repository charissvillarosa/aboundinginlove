<div class="container tabs">
    <div class="span11 margin3 leftmargin1">
        <div class="pull-right">
            <?php echo $this->Html->link('Go back to User List', array('action' => 'index'), array('class' => 'btn btn-info btn-small')); ?>
        </div>
        <div style="background:#f9f9f9;" class="pull-left well leftmargin2 topmargin1">
            <h4 class="fontcolor1"><?php echo __('Edit User\'s Record'); ?></h4>
            <hr>
            <div style="padding-left:30px;">
                <?php echo $this->Form->create('User'); ?>
                <fieldset>
                    <?php
                    echo '<div class="pull-left">' . $this->Form->input('firstname', array('class' => 'span3')) . '</div>';
                    echo '<div class="pull-left">' . $this->Form->input('middlename', array('class' => 'span3')) . '</div>';
                    echo '<div class="pull-left">' . $this->Form->input('lastname', array('class' => 'span3')) . '</div>';
                    echo '<div class="pull-left">' . $this->Form->input('address', array('class' => 'span6')) . '</div>';
                    echo '<div class="pull-left">' . $this->Form->input('country', array(
                        'class' => 'span3',
                        'options' => array('country' => 'blabla')
                    )) . '</div>';
                    echo '<div class="pull-left">' .$this->Form->input('username', array('class' => 'span3')) . '</div>';
                    echo '<div class="pull-left">' .$this->Form->input('password', array('class' => 'span3')) . '</div>';
                    echo '<div class="pull-left">' .$this->Form->input('confirmpassword', array('class' => 'span3')) . '</div>';
                    echo '<div class="pull-left">' .$this->Form->input('role', array(
                        'class' => 'span3',
                        'options' => array('admin' => 'Admin', 'user' => 'User')
                    )). '</div>';
                    ?>
                </fieldset>
                <hr>
                <?php echo $this->Form->end(__('Save Changes')); ?>
            </div>
        </div>
    </div>
</div>