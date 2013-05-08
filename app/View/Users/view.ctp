<div class="container tabs">
    <div class="pull-right topmargin1 rightmargin1">
        <?php echo $this->Html->link('Go back to Sponsee List', array('action' => 'index'), array('class' => 'btn btn-info btn-small')); ?>
    </div>
    <div class="span11 margin3">
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
                <p>
                    <b class="fontcolor1">
                        <?php echo $sponsee['firstname'] . ' ' . $sponsee['lastname'] ?>
                    </b><br>
                    <b><?php echo $sponsee['country'] ?> : <a href="<?php echo $sponsee['maplocation'] ?>" target="_blank">Map Location</a></b>
                </p>
            </div>
            <hr/>
            <div>
                <p><b class="fontcolor1 fontsize1">45%</b> raised</p>
                <div class="progress">
                    <div class="bar" style="width: 45%"></div>
                </div>
                <p><b class="fontcolor1">$ 1,000.00</b> - Donation needed</p>
                <div class="pull-right"><a class="btn btn-info btn-small">Donate</a></div>
                <div class="clearfix"></div>
            </div>
            <hr/>
        </div>
        <div class="pull-right span8">
            <div class="leftmargin2 bottomargin1">
                <h4 class="fontcolor1">Biography</h4>
                <hr/>
                <p class="">
                    <?php echo $sponsee['information']; ?>
                </p>
                <h4 class="fontcolor1 topmargin2">Needs</h4>
                <hr>
                <ul class="leftmargin2">
                    <li>1,000 monthly for basic educational needs and food</li>
                    <li>2,000 for new dental work</li>
                    <li>1,500 for medical assistance/check up</li>
                    <li>500 for clothing allowance</li>
                    <li>500 for transportation allowance</li>
                </ul>
            </div>
        </div>
    </div>
</div>