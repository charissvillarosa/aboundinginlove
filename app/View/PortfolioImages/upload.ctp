<style>
    .headerstyle {
        width:1130px;
        padding:40px 10px 10px 30px;
    }
</style>
<div class="container tabs">
    <div>
        <div class="pull-right headerstyle banner">
            <div class="pull-left"><p class="fontsize1">PORTFOLIO UPLOAD IMAGE</p></div>
            <div class="pull-right"><?php echo $this->Html->link('Go back to Sponsee List', array('controller' => 'sponsees','action' => 'index'), array('class' => 'btn btn-info btn-medium')); ?></div>
        </div>
        <div class="clearfix topmargin1">
            <div class="box" style="width:393px; padding: 20px; margin: 30px auto; overflow: auto;">
                <div class="clearfix pull-left">
                    <?php echo $this->Session->flash(); ?>
                    <?php echo $this->Form->create('PortfolioImage', array('type'=>'file'));?>
                    <fieldset>
                        <?php
                        echo $this->Form->input('description', array('label' => 'Description','class'=>'span4'));
                        echo $this->Form->input('image', array('type' => 'file', 'label'=>'', 'class' => 'btn btn-large'));
                        ?>
                    </fieldset>
                    <center><p>File must be less than 2 megabytes.</p></center>
                    <hr style="margin-left:10px;">
                    <span style="text-align: right;"><?php echo $this->Form->end(__('UPLOAD IMAGE')); ?></span>
                </div>
            </div>
         </div>
    </div>
</div>