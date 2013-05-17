<div class="container tabs">
    <div class="span11 margin3 leftmargin1">
        <div class="pull-right">
            <?php echo $this->Html->link('Go back to Sponsee List', array('controller' => 'sponsees', 'action' => 'index'), array('class' => 'btn btn-info btn-small')); ?>
        </div>
        <div style="background:#f9f9f9;" class="pull-left well leftmargin1 topmargin1 span10">
            <h4 class="fontcolor1">
                <?php
                $sponsee = $sponsee['Sponsee'];
                echo __('Add New ' . $sponsee['firstname'] . " " . $sponsee['middlename'] . " " . $sponsee['lastname'] . ' Needs');
                ?>
            </h4>
            <hr>
            <div>
                <?php
                
                echo $this->Session->flash();
                
                echo $this->Form->create('SponseeNeed', array(
                    'inputDefaults' => array(
                        'div' => false
                        //'label' => false
                    )
                ))
                ?>
                <fieldset>
                    <!--category dropdown / search-->
                    <div>
                        <?php echo $this->Form->input('category_id', array('type' => 'select', 'label' => 'Category', 'class' => 'topmargin4', 'options' => $categories)) ?>
                        <button class="btn btn-medium btn-info" type="button" title="Add New category"><i class="icon-plus icon-white"></i></button>
                        <?php echo $this->Form->input('description', array('label' => 'Description', 'style' => 'width:400px')) ?>
                        <?php echo $this->Form->input('neededamount', array('label' => 'Needed Amount')) ?>
                    </div>
                </fieldset>
                <?php echo $this->Form->end('Save') ?>
            </div>
        </div>
    </div>
</div>