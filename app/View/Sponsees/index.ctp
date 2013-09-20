<div class="container">
    <div class="logincontent well">
        <div class="pull-right rightmargin2 banner"><h4 class="fontcolor1 leftmargin2">Sponsor a child now!</h4></div>
        <?php
        foreach ($sponseeList as $item) :
            $sponsee = $item['SponseeListingItem'];
            ?>
            <div class="pull-left topmargin1 leftmargin1 box">
                <div class="pull-left rightmargin1">
                    <?php
                        $imageURl = array('controller' => 'SponseeImages', 'action' => 'view', $sponsee['id']);
                        $attrs = array('alt' => '', 'width' => '165', 'class' => 'img-polaroid');
                        echo $this->Html->image($imageURl, $attrs);
                    ?>
                </div>
                <div class="pull-left">
                    <div class="pull-left span3">
                        <p>
                            <b class="fontcolor1">
                                <?php echo $sponsee['firstname'] . ' ' . $sponsee['lastname'] ?>
                            </b><br>
                            <b><?php $flag = "/img/flag/".$sponsee['country'].".png"; echo $this->Html->image("$flag"); echo ' ' . $sponsee['country']; ?> : <a href="<?php echo $sponsee['maplocation'] ?>" target="_blank">Map Location</a></b>
                        </p>
                        <p>
                            <?php
                            $info = $sponsee['long_description'];
                            echo $this->Text->truncate($info, 150, array('exact' => false));
                            ?>
                        </p>
                        <?php echo $this->Html->link('Read more', array('controller' => 'sponsees', 'action' => 'view', $sponsee['id']), array('class' => 'btn btn-info btn-small')); ?>
                    </div>
                    <div style="background:#eae9e9;" class="rightfloat span3 verticalline box">
                        <?php 
                            echo "<div><b class='fontcolor1 fontsize1'>".$this->Number->toPercentage($sponsee['percentage'])."</b> raised</div>";
                            echo "<div class='progress'><div class='bar' style='width:".$this->Number->toPercentage($sponsee['percentage'])."'></div></div>";
                            echo "<div class='bottommargin2'><b class='fontcolor1'>".$this->Number->currency($sponsee['total_neededamount'], 'USD')."</b> = Needed</div>";
                            echo "<div class='bottommargin2'><b class='fontcolor1'>".$this->Number->currency($sponsee['total_donatedamount'], 'USD')."</b> = Donated</div>";
                            echo $this->Html->link('Donate Now', array('controller' => 'donations', 'action' => 'view', $sponsee['id']), array('class' => 'btn btn-primary btn-large btn-block'));
                        ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="clear pull-left leftmargin1">
            <button class="btn topmargin1"><?php echo $this->Paginator->numbers(); ?></button>
            <button class="btn topmargin1"><?php echo $this->Paginator->prev('« Previous', null, null, array('class' => 'disabled')); ?></button>
            <button class="btn topmargin1"><?php echo $this->Paginator->next('Next »', null, null, array('class' => 'disabled')); ?></button>
            <button class="btn topmargin1"><?php echo $this->Paginator->counter(); ?></button>
        </div>
    </div>
</div>