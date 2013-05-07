<div class="container">
    <div style="background: #fff;" class="logincontent well">
        <h4 class="fontcolor1 leftmargin1">Sponsor a child today</h4>
        <?php
        foreach ($sponseeList as $item) :
            $sponsee = $item['Sponsee'];
            ?>
            <div class="pull-left topmargin1 leftmargin1 box">
                <div class="pull-left rightmargin1">
                    <?php
                    $imageURl;
                    if ($sponsee['primaryimage']) {
                        $imageURl = array('controller' => 'SponseeImages', 'action' => 'view', $sponsee['primaryimage']);
                    } else {
                        $imageURl = 'sponsees/nophoto.jpg';
                    }
                    $attrs = array('alt' => '', 'width' => '170', 'class' => 'img-polaroid');
                    echo $this->Html->image($imageURl, $attrs);
                    ?>
                </div>
                <div class="pull-left">
                    <div class="pull-left span3">
                        <p>
                            <b class="fontcolor1">
                                <?php echo $sponsee['firstname'] . ' ' . $sponsee['lastname'] ?>
                            </b><br>
                            <b><?php echo $sponsee['country'] ?> : <a href="<?php echo $sponsee['maplocation'] ?>" target="_blank">Map Location</a></b>
                        </p>
                        <p>
                            <?php
                            $info = $sponsee['information'];
                            echo $this->Text->truncate($info, 150, array('exact' => false));
                            ?>
                        </p>
                        <?php echo $this->Html->link('Read more', array('action' => 'view', $sponsee['id']), array('class' => 'btn btn-info btn-small')); ?>

                    </div>
                    <div class="rightfloat span3 verticalline">
                        <p><b class="fontcolor1 fontsize1">45%</b> raised</p>
                        <div class="progress">
                            <div class="bar" style="width: 45%"></div>
                        </div>
                        <p><b class="fontcolor1">$ 1,000.00</b> - Donation needed</p>
                        <div class="rightfloat"><a class="btn btn-info btn-small">Donate</a></div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="leftmargin1">
            <button class="btn topmargin1"><?php echo $this->Paginator->numbers(); ?></button>
            <button class="btn topmargin1"><?php echo $this->Paginator->prev('« Previous', null, null, array('class' => 'disabled')); ?></button>
            <button class="btn topmargin1"><?php echo $this->Paginator->next('Next »', null, null, array('class' => 'disabled')); ?></button>
            <button class="btn topmargin1"><?php echo $this->Paginator->counter(); ?></button>
        </div>
    </div>
</div>