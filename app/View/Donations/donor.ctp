<div>
    <div class="pull-left">
        <?php
            $imageURl = array('controller' => 'ProfileImages', 'action' => 'view', $donor['id']);
                $attrs = array('alt' => '', 'width' => '190px', 'class' => 'img-polaroid');
                echo $this->Html->image($imageURl, $attrs);
        ?>
    </div>
    <div class="pull-left leftmargin1">
        <p class="fontsize1"><?php echo $donor['firstname'].' '.$donor['middlename'].' '.$donor['lastname']?></p>
        <p class="fontsize1"><?php echo $donor['address']?></p>
        <p class="fontsize1"><?php $flag = "/img/flag/".$donor['country'].".png"; echo $this->Html->image("$flag"); echo ' '.$donor['country']?></p>
    </div>
    <div class="clearfix pull-left topmargin1">
        <?php echo $donor['purpose_of_donation']; ?></b>
    </div>
</div>