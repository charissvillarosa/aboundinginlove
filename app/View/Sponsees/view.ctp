<div class="container">
    <div class="well">
        <div class="span2">
            <div>
                <?php
                $imageURl;
                if ($sponsee['primaryimage']) {
                    $imageURl = array('controller' => 'SponseeImages', 'action' => 'view', $sponsee['primaryimage']);
                } else {
                    $imageURl = 'sponsees/nophoto.jpg';
                }
                $attrs = array('alt' => '', 'width' => '165', 'class' => 'img-polaroid');
                echo $this->Html->image($imageURl, $attrs);
                ?>
            </div>
            <div class="margin1">
                <b class="fontcolor1">
                    <?php echo $sponsee['firstname'] . ' ' . $sponsee['lastname'] ?>
                </b><br>
                <b>Flag : <?php echo $sponsee['country'] ?></b>
            </div>
            <hr/>
            <div>
                <p><b class="fontcolor1 fontsize1">45%</b> raised</p>
                <div class="progress progress-success">
                    <div class="bar" style="width: 45%"></div>
                </div>
                <p><b class="fontcolor1">$ 1,000.00</b> - Donation needed</p>
                <div class="pull-right"><a class="btn btn-success btn-small">Donate</a></div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="span5">
            <h4>Biography</h4>
            <hr/>
            <p class="">
                <?php echo $sponsee['information']; ?>
            </p>
        </div>
    </div>
</div>