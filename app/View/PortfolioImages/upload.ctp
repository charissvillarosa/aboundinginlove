<div class="container tabs">
    <div class="span11 margin3 leftmargin1 well">
        <?php echo $this->Form->create('PortfolioImage', array('type'=>'file')); ?>
        <fieldset>
            <h4 class="fontcolor1"><?php echo __('Upload Image'); ?></h4>
            <hr>
            <?php echo $this->Form->input('description', array('label' => 'Description', 'style' => 'width:400px')) ?>
            <?php
            echo $this->Form->input('image', array('type' => 'file', 'label' => 'Upload Image'));
            ?>
        </fieldset>
        <?php echo $this->Form->end(__('Submit')); ?>
    </div>
</div>