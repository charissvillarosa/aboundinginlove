<div class="container">
    <div class="well">
        <h4 class="fontcolor1">Sponsor a child today</h4>
        <?php
        foreach ($sponseeList as $item) :
            $sponsee = $item['Sponsee'];
            ?>
            <div class="leftfloat">
                <div class="leftfloat">
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
                <div class="leftfloat leftmargin1 width6 box">
                    <div class="leftfloat width7">
                        <p>
                            <b class="fontcolor1">
                                <?php echo $sponsee['firstname'] . ' ' . $sponsee['lastname'] ?>
                            </b><br>
                            <b>Flag : <?php echo $sponsee['country'] ?></b>
                        </p>
                        <p>
                            <?php
                            $info = $sponsee['information'];
                            echo $this->Text->truncate($info, 150, array('exact' => false));
                            ?>
                        </p>
                        <?php echo $this->Html->link('Read more', array('action' => 'view', $sponsee['id']), array('class' => 'btn btn-info btn-small')); ?>

                    </div>
                    <div class="rightfloat width7 verticalline">
                        <p><b class="fontcolor1 fontsize1">45%</b> raised</p>
                        <div class="progress progress-success">
                            <div class="bar" style="width: 45%"></div>
                        </div>
                        <p><b class="fontcolor1">$ 1,000.00</b> - Donation needed</p>
                        <div class="rightfloat"><a class="btn btn-success btn-small">Donate</a></div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>  
    </div>
</div>