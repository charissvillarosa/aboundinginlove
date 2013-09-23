<div class="container tabs">
    <div class="span11 margin3 leftmargin1">
        <div class="pull-right">
            <?php echo $this->Html->link('Go back to Sponsee List', array('action' => 'index'), array('class' => 'btn btn-info btn-small')); ?>
        </div>
        <div class="leftmargin2 topmargin1">
            <h4 class="fontcolor1 banner"><?php echo __('New Sponsee Record'); ?></h4>
            <hr>
            <div>
                <?php
                echo $this->Form->create('Sponsee', array('action' => "add"));
                ?>
                <fieldset>
                    <div class="pull-left"><?php echo $this->Form->input('firstname', array('class' => 'span3')); ?></div>
                    <div class="pull-left"><?php echo $this->Form->input('middlename', array('class' => 'span3')); ?></div>
                    <div class="pull-left"><?php echo $this->Form->input('lastname', array('class' => 'span3')); ?></div>
                    <div class="pull-left"><?php echo $this->Form->input('address', array('class' => 'span3')); ?></div>
                    <div class="pull-left"><?php echo $this->Form->input('country', array('type' => 'select', 'class' => 'span3', 'options' => $countryList)); ?></div>
                    <div class="pull-left"><?php
                    echo $this->Form->input('gender', array(
                        'class' => 'span3',
                        'options' => array('Male' => 'Male', 'Female' => 'Female')
                    ));
                    ?></div>
                     <div class="pull-left"><?php echo $this->Form->input('birthdate', array('style' => 'width:150px;', 'maxYear' => date('Y'), 'minYear' => 1950)); ?></div>
                    <div class="pull-left"><?php echo $this->Form->input('maplocation', array('class' => 'span8')); ?></div>
                    <div class="pull-left"><?php echo $this->Form->input('videolink', array('class' => 'span8')); ?></div>
                    <div class="pull-left"><?php echo $this->Form->input('short_description', array('class' => 'span8', 'rows' => '15')); ?></div>
                    <div class="pull-left"><?php echo $this->Form->input('long_description', array('class' => 'span8', 'rows' => '15')); ?></div>
                    <?php echo $this->Form->hidden('id') ?>
                </fieldset>
                <?php echo $this->Form->end('Save') ?>
            </div>
        </div>
    </div>
</div>