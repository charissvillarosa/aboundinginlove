<div class="logincontent">
    <div style="margin-bottom:20px; width:500px;" class="leftfloat">
        <h3 class="fontcolor1">Lorem ipsum dolor sit amet</h3>
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
    </div>
    <div style="margin-bottom:20px; width:250px;" class="users form">
        <!-- app/View/Users/add.ctp -->
        <?php echo $this->Form->create('User'); ?>
            <fieldset>
                <legend class="fontcolor1"><?php echo __('Add User'); ?></legend>
                <?php echo $this->Form->input('username');
                echo $this->Form->input('password');
                echo $this->Form->input('role', array(
                    'options' => array('admin' => 'Admin', 'user' => 'User')
                ));
            ?>
            </fieldset>
        <?php echo $this->Form->end(__('Submit')); ?>
    </div>
 </div>