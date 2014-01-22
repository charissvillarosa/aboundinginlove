<div class="container tabs">
    <div class="headerstyle banner">
        <div class="leftmargin1"><p class="fontsize1">DONATE A SPONSEE</p></div>
    </div>
    <div class="span12 bottommargin1">
        <?php
        $user = $this->Session->read('Auth.User');
        ?>
        <?php
        foreach ($sponseeList as $item) :
            $sponsee = $item['SponseeListingItem'];
            ?>
            <div class="pull-left rightmargin1 box">
                <div>
                    <?php
                        $imageURl = array('controller' => 'SponseeImages', 'action' => 'view', $sponsee['id']);
                        $attrs = array('alt' => '', 'width' => '210', 'class' => 'img-polaroid');
                        echo $this->Html->image($imageURl, $attrs);
                    ?>
                </div>
                <div class="topmargin1">
                    <p>
                        <b class="fontcolor1">
                            <?php echo $sponsee['firstname'] . ' ' . $sponsee['lastname'] ?>
                        </b><br>
                        <hr>
                    </p>
                    <?php
                        echo "<div><b class='fontcolor1 fontsize1'>".$this->Number->toPercentage($sponsee['percentage'])."</b> raised</div>";
                        echo "<div class='progress'><div class='bar' style='width:".$this->Number->toPercentage($sponsee['percentage'])."'></div></div>";
                        echo "<div class='bottommargin2'><b class='fontcolor1'>".$this->Number->currency($sponsee['total_neededamount'], 'USD')."</b> = Needed</div>";
                        echo "<div class='bottommargin2'><b class='fontcolor1'>".$this->Number->currency($sponsee['total_donatedamount'], 'USD')."</b> = Donated</div>";
                        echo $this->Html->link('Donate Now!', array('controller' => 'donations', 'action' => 'view', $sponsee['id']), array('class' => 'btn btn-info btn-large btn-block'));
                    ?>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="clearfix pull-left">
            <button class="btn topmargin1"><?php echo $this->Paginator->prev('« Previous', null, null, array('class' => 'disabled')); ?></button>
            <button class="btn topmargin1"><?php echo $this->Paginator->next('Next »', null, null, array('class' => 'disabled')); ?></button>
        </div>
    </div>
</div>