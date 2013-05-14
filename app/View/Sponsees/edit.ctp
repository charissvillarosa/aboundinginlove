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
                        $imageURl;
                        $imgId = $this->data['Sponsee']['primaryimage'];
                        
                        if ($imgId) {
                            $imageURl = array('controller' => 'sponseeimages', 'action' => 'view', $imgId);
                        } else {
                            $imageURl = 'sponsees/nophoto.jpg';
                        }
                        
                        $attrs = array('alt' => '', 'width' => '165', 'class' => 'img-polaroid');
                        echo $this->Html->image($imageURl, $attrs);
                        ?>
                    </div>
                    <?php
                    echo '<div class="pull-left">' . $this->Form->input('firstname', array('class' => 'span2')) . '</div>';
                    echo '<div class="pull-left">' . $this->Form->input('middlename', array('class' => 'span2')) . '</div>';
                    echo '<div class="pull-left">' . $this->Form->input('lastname', array('class' => 'span2')) . '</div>';
                    echo '<div class="pull-left">' . $this->Form->input('address', array('class' => 'span6')) . '</div>';
                    echo '<div class="pull-left">' . $this->Form->input('country', array('type'=>'select','options'=>$countryList)) . '</div>';
                    echo '<div class="pull-left">' . $this->Form->input('maplocation', array('class' => 'span9')) . '</div>';
                    echo '<div class="pull-left">' . $this->Form->input('information', array('class' => 'span9', 'rows' => '10')) . '</div>';
                    echo '<div class="pull-left">' . $this->Form->input('birthdate', array('class' => 'span3', 'maxYear' => date('Y'), 'minYear' => 1950)) . '</div>';
                    $this->Form->input('id', array('type' => 'hidden'));
                    ?>
                    <div class="pull-left">
                        <?php echo $this->Form->end(__('Save Changes')); ?>
                    </div>
                </fieldset>
                
            </div>
        </div>
    </div>
</div>