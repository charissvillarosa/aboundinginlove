<div class="container tabs">
    <div style="width:500px; margin:80px auto; ">
        <h3 class="fontcolor1 banner">Change Profile Image</h3>
        <div style="width:500px; height:300px; border:dashed 4px #ddd; margin:10px auto; padding:20px;">
            <div style="text-align: center; width:380px; margin:100px auto;">
                <?php echo $this->Session->flash(); ?>
                <p>File must be less than 2 megabytes.</p>
                <?php echo $this->Form->create('SponseeImage', array('type'=>'file'));?>
                <fieldset>
                    <?php
                    echo $this->Form->input('image', array('type' => 'file', 'label'=>'', 'class' => 'btn btn-large'));
                    ?>
                </fieldset>
            </div>
        </div>
        <div class="pull-right"><?php echo $this->Form->end(__('UPLOAD IMAGE')); ?></div>
    </div>
</div>