<div class="container tabs">
    <div class="span11 margin3">
        <div style="margin-bottom:20px;" class="users">
            <?php echo $this->Form->create('Sponsee'); ?>
            <fieldset>
                <legend class="fontcolor1"><?php echo __('Edit Sponsee\'s record'); ?></legend>
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
                echo $this->Form->input('birthdate', array('class' => 'span2', 'maxYear'=>date('Y'), 'minYear'=>1950));
                echo $this->Form->input('id', array('type' => 'hidden'));
                ?>
            </fieldset>
<?php echo $this->Form->end(__('Save Changes')); ?>
        </div>
    </div>
</div>