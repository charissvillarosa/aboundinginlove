<div class="container tabs">
    <div class="span11 margin3 leftmargin1">
        <div class="pull-right">
            <?php echo $this->Html->link('Go back to Category List', array('controller' => 'sponseeneedcategories', 'action' => 'listing'), array('class' => 'btn btn-info btn-small')); ?>
        </div>
        <div style="background:#f9f9f9;" class="pull-left well leftmargin1 topmargin1 span10">
            <h4 class="fontcolor1">
                <?php
                echo __('Edit Category');
                ?>
            </h4>
            <hr>
            <div>
                <?php
                echo $this->Form->create('SponseeNeedCategory');
                ?>
                <fieldset>
                    <?php echo $this->Form->input('description', array('label' => 'Description', 'style' => 'width:400px')) ?>
                </fieldset>
                <?php echo $this->Form->end('Save Changes') ?>
            </div>
        </div>
    </div>
</div>