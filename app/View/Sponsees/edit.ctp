<style>
    .headerstyle {
        width:1130px;
        padding:40px 10px 10px 30px;
    }
    .center {
        width:910px;
        margin:30px auto;
    }
</style>
<div class="container tabs">
    <div class="leftmargin1">
        <div class="pull-right headerstyle banner span11">
            <div class="pull-left"><p class="fontsize1">EDIT SPONSEE RECORD</p></div>
            <div class="pull-right"><?php echo $this->Html->link('Go back to Sponsee List', array('action' => 'index'), array('class' => 'btn btn-info btn-medium')); ?></div>
        </div>
        <div class="clearfix pull-left span11">
            <div class="center">
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
                    <div class="pull-left"><?php echo $this->Form->input('maplocation', array('class' => 'span9')); ?></div>
                    <div class="pull-left"><?php echo $this->Form->input('videolink', array('class' => 'span9', 'rows' => '10')); ?></div>
                    <div class="pull-left"><?php echo $this->Form->input('short_description', array('class' => 'span9', 'rows' => '15')); ?></div>
                    <div class="pull-left"><?php echo $this->Form->input('long_description', array('class' => 'span9', 'rows' => '15')); ?></div>
                    <?php echo $this->Form->hidden('id') ?>
                </fieldset>
                <div class="leftmargin5"><?php echo $this->Form->end('Update') ?></div>
            </div>
        </div>
    </div>
</div>