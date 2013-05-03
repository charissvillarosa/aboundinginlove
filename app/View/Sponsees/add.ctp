<div class="container">
    <div style="background: #fff;" class="logincontent well">
        <div style="margin-bottom:20px;" class="users">
            <?php echo $this->Form->create('Sponsee'); ?>
            <fieldset>
                <legend class="fontcolor1"><?php echo __('Add New Sponsee'); ?></legend>
                <?php
                echo $this->Form->input('firstname');
                echo $this->Form->input('middlename');
                echo $this->Form->input('lastname');
                echo $this->Form->input('address');
                echo $this->Form->input('country', array(
                    'options' => array('country' => 'blabla')
                ));
                echo $this->Form->input('maplocation');
                echo $this->Form->input('information');
                echo $this->Form->input('birthdate', array('width' => '100px'));
                ?>
            </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
        </div>
    </div>
</div>