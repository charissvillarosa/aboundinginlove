<div class="container tabs">
    <div class="span11 margin3 leftmargin1">
        <?php
        foreach ($sponseeList as $item) :
            $sponsee = $item['SponseeListingItem'];
        ?>
        <div class="well topmargin2">
            <div class="pull-left rightmargin1 span3">
            <?php
                    $imageURl;
                    if ($sponsee['primaryimage']) {
                        $imageURl = array('controller' => 'SponseeImages', 'action' => 'view', $sponsee['primaryimage']);
                    } else {
                        $imageURl = 'sponsees/nophoto.jpg';
                    }
                    $attrs = array('alt' => '', 'width' => '300', 'class' => 'img-polaroid');
                    echo $this->Html->image($imageURl, $attrs);
            ?>
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
            <div class="pull-left">
                <div class="pull-left span7">
                    <p>
                        <h2 class="fontcolor1">
                            <?php echo $sponsee['firstname'] . ' ' . $sponsee['lastname'] ?>
                        </h2>
                    </p>
                    <p class="topmargin1">
                        <hr>
                        <?php
                        echo $sponsee['information'];
                        ?>
                    </p>
                </div>
            </div>
        </div>
        <?php
        endforeach;
        ?>
        <div class="topmargin1">
            <button class="btn"><?php echo $this->Paginator->numbers(); ?></button>
            <button class="btn"><?php echo $this->Paginator->prev('« Previous', null, null, array('class' => 'disabled')); ?></button>
            <button class="btn"><?php echo $this->Paginator->next('Next »', null, null, array('class' => 'disabled')); ?></button>
            <button class="btn"><?php echo $this->Paginator->counter(); ?></button>
        </div>
    </div>
</div>