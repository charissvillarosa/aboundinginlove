<div class="tabs">
    <div class="span12">
        <h3 class="leftmargin2 fontcolor1">Donate Now</h3>
    </div>
    <div class="span12">
        <?php
        foreach ($sponseeList as $item) :
            $sponsee = $item['SponseeListingItem'];
        ?>
        <div class="pull-left box span3 topmargin1 rightmargin1">
            <div class="rightmargin1">
                <?php
                $imageURl;
                if ($sponsee['primaryimage']) {
                    $imageURl = array('controller' => 'SponseeImages', 'action' => 'view', $sponsee['primaryimage']);
                } else {
                    $imageURl = 'sponsees/nophoto.jpg';
                }
                $attrs = array('alt' => '', 'width' => '250', 'class' => 'img-polaroid');
                echo $this->Html->image($imageURl, $attrs);
                ?>
            </div>
            <div class="topmargin1">
                <hr>
                <?php
                    echo "<div><b class='fontcolor1 fontsize1'>".$this->Number->toPercentage($sponsee['percentage'])."</b> raised</div>";
                    echo "<div class='progress'><div class='bar' style='width:".$this->Number->toPercentage($sponsee['percentage'])."'></div></div>";
                    echo "<div class='bottomargin2'><b class='fontcolor1'>".$this->Number->currency($sponsee['total_neededamount'], 'USD')."</b> = Needed</div>";
                    echo "<div class='bottomargin2'><b class='fontcolor1'>".$this->Number->currency($sponsee['total_donatedamount'], 'USD')."</b> = Donated</div>";
                    echo $this->Html->link('Donate', array('controller' => 'donations', 'action' => 'view', $sponsee['id']), array('class' => 'btn btn-info'));
                ?>
                <hr>
            </div>
        </div>
        <?php
        endforeach;
        ?>
    </div>
    <div class="clearfix margin3 span12">
        <div class="leftmargin2">
            <button class="btn"><?php echo $this->Paginator->numbers(); ?></button>
            <button class="btn"><?php echo $this->Paginator->prev('« Previous', null, null, array('class' => 'disabled')); ?></button>
            <button class="btn"><?php echo $this->Paginator->next('Next »', null, null, array('class' => 'disabled')); ?></button>
            <button class="btn"><?php echo $this->Paginator->counter(); ?></button>
        </div>
    </div>
</div>