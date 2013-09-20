<div class="container tabs">
    <div class="span11 margin3 leftmargin1">
        <div class="pull-right">
            <?php echo $this->Html->link('Go back to Sponsee List', array('action' => 'index'), array('class' => 'btn btn-info btn-small')); ?>
        </div>
        <div class="leftmargin2 topmargin1">
            <h4 class="fontcolor1 banner"><?php echo __('Edit Sponsee\'s record'); ?></h4>
            <hr>
            <div style="padding:0 30px 0 50px;">
                <?php
                echo $this->Form->create('Sponsee', array('action' => "add"));
                ?>
                <fieldset>
                    <?php echo $this->Form->input('firstname', array('class' => 'span3')); ?>
                    <?php echo $this->Form->input('middlename', array('class' => 'span3')); ?>
                    <?php echo $this->Form->input('lastname', array('class' => 'span3')); ?>
                    <?php echo $this->Form->input('address', array('class' => 'span3')); ?>
                    <?php echo $this->Form->input('country', array('type' => 'select', 'options' => $countryList)); ?>
                    <?php
                    echo $this->Form->input('gender', array(
                        'class' => 'span2',
                        'options' => array('Male' => 'Male', 'Female' => 'Female')
                    ));
                    ?>
                    <?php echo $this->Form->input('maplocation', array('class' => 'span5')); ?>
                    <?php echo $this->Form->input('videolink', array('class' => 'span5')); ?>
                    <?php echo $this->Form->input('short_description', array('class' => 'span5', 'rows' => '15')); ?>
                    <?php echo $this->Form->input('long_description', array('class' => 'span5', 'rows' => '15')); ?>
                <?php echo $this->Form->input('birthdate', array('style' => 'width:150px;', 'maxYear' => date('Y'), 'minYear' => 1950)); ?>
                <?php echo $this->Form->hidden('id') ?>
                </fieldset>
                <?php echo $this->Form->end('Save') ?>
            </div>
        </div>
    </div>
</div>