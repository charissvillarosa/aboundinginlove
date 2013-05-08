<div class="container tabs">
    <div class="span11 margin3 leftmargin1">
        <div class="pull-right">
            <?php echo $this->Html->link('Go back to Sponsee List', array('action' => 'index'), array('class' => 'btn btn-info btn-small')); ?>
        </div>
        <div style="background:#f9f9f9;" class="pull-left well leftmargin2 topmargin1">
            <h4 class="fontcolor1"><?php echo __('Edit Sponsee\'s record'); ?></h4>
            <hr>
            <div style="padding:0 30px 0 50px;">
                <fieldset>
                    <?php echo $this->Form->create('Sponsee'); ?>
                    <div class="pull-left">
                        <?php
                        $imageURl = 'sponsees/nophoto.jpg';
                        $attrs = array('alt' => '', 'width' => '250', 'class' => 'img-polaroid');
                        echo $this->Html->image($imageURl, $attrs);
                        ?>
                    </div>
                    <?php
                    echo '<div class="pull-left">' . $this->Form->input('firstname', array('class' => 'span2')) . '</div>';
                    echo '<div class="pull-left">' . $this->Form->input('middlename', array('class' => 'span2')) . '</div>';
                    echo '<div class="pull-left">' . $this->Form->input('lastname', array('class' => 'span2')) . '</div>';
                    echo '<div class="pull-left">' . $this->Form->input('address', array('class' => 'span6')) . '</div>';
                    echo '<div class="pull-left">' . $this->Form->input('country', array(
                        'class' => 'span2',
                        'options' => array('country' => 'blabla')
                    )) . '</div>';
                    echo '<div class="pull-left">' . $this->Form->input('maplocation', array('class' => 'span4')) . '</div>';
                    echo '<div class="pull-left">' . $this->Form->input('information', array('class' => 'span9', 'rows' => '10')) . '</div>';
                    echo '<div class="pull-left">' . $this->Form->input('birthdate', array('class' => 'span3', 'maxYear' => date('Y'), 'minYear' => 1950)) . '</div>';
                    $this->Form->input('id', array('type' => 'hidden'));
                    ?>
                    <div class="pull-left">
                        <h4 class="fontcolor1">Sponsee's Needs</h4>
                        <hr>
                        <?php echo $this->Form->create('SponseeNeeds'); ?>
                        <?php
                        echo '<div class="pull-left">' . $this->Form->input('Category 1', array('class' => 'span4')) . '</div>';
                        echo '<div class="pull-left">' . $this->Form->input('Category 2', array('class' => 'span4')) . '</div>';
                        echo '<div class="pull-left">' . $this->Form->input('Category 3', array('class' => 'span4')) . '</div>';
                        echo '<div class="pull-left">' . $this->Form->input('Category 4', array('class' => 'span4')) . '</div>';
                        echo '<div class="pull-left">' . $this->Form->input('Category 5', array('class' => 'span4')) . '</div>';
                        echo '<div class="pull-left">' . $this->Form->input('Category 6', array('class' => 'span4')) . '</div>';
                        echo '<div class="pull-left">' . $this->Form->input('Category 7', array('class' => 'span4')) . '</div>';
                        echo '<div class="pull-left">' . $this->Form->input('Category 8', array('class' => 'span4')) . '</div>';
                        echo '<div class="pull-right rightmargin2"><a class="btn btn-info btn-small">Add more category fields</a></div>';
                        ?>
                    </div>
                    <div class="pull-left">
                        <?php echo $this->Form->end(__('Save Changes')); ?>
                    </div>
                </fieldset>
                
            </div>
        </div>
    </div>
</div>