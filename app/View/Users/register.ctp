<div class="logincontent">
    <div class="pull-left span5">
        <p>
            <?php echo $this->Html->image('smalllogo.png', array('alt' => 'logo')); ?>
        </p>
        <hr>
        <p class="topmargin1">
            Vulputate wisi aenean elementum, accumsan nunc cras adipiscing odio, elit arcu ultricies quis,
            tellus commodo eget semper dolor vel rutrum. Eu felis, vivamus urna sagittis quam sit lorem.
            Ante suspendisse vel aliquam magna adipiscing nam, et potenti a sed viverra arcu.
        </p>
        <p class="topmargin1">
            Dui nascetur
            mauris sagittis eu et massa, eget placerat scelerisque varius viverra maecenas mattis, earum
            elit tincidunt urna convallis aliquam, lacus ullamcorper, nec a accumsan nibh mauris proin.
        </p>
        <p class="topmargin1">
            Vulputate wisi aenean elementum, accumsan nunc cras adipiscing odio, elit arcu ultricies quis,
            tellus commodo eget semper dolor vel rutrum. Eu felis, vivamus urna sagittis quam sit lorem.
            Ante suspendisse vel aliquam magna adipiscing nam, et potenti a sed viverra arcu.
        </p>
        <p class="topmargin1">
            Vulputate wisi aenean elementum, accumsan nunc cras adipiscing odio, elit arcu ultricies quis,
            tellus commodo eget semper dolor vel rutrum. Eu felis, vivamus urna sagittis quam sit lorem.
        </p>
    </div>
    <div style="background:#fafafa;" class="pull-right well bottomargin1">
        <?php echo $this->Form->create('User'); ?>
        <fieldset>
            <legend class="fontcolor1"><?php echo __('Register User'); ?></legend>
            <?php
            echo $this->Form->input('username');
            echo $this->Form->input('password');
            echo $this->Form->input('password_confirm', array('type' => 'password'));
            echo $this->Form->input('email');
            echo $this->Form->input('role', array('type'=>'hidden', 'value'=>'user'));
            ?>
        </fieldset>
        <?php echo $this->Form->end(__('Submit')); ?>
    </div>
 </div>