<div class="pull-left span12 topmargin1">
    <div class="navbar">
        <div class="navbar-inner">
            <ul class="nav">
                <li class="active">
                    <?php echo $this->Html->link('Portfolio', array('controller' => 'portfolios', 'action' => 'index')); ?>
                </li>
                <li>
                    <?php echo $this->Html->link('Gallery', array('controller' => 'portfolios', 'action' => 'gallery')); ?>
                </li>
            </ul>
        </div>
    </div>
    <div>
        <?php
            $prevCat = 0;

            if(empty($listing)){
                echo "<div class='alert alert-info'>
                    <p><h3>Not yet specified.</h3></p>
                </div>";
            }
            else {
                foreach ($listing as $item) :
                    $portfolio = $item['Portfolio'];
                    $category= $item['Category'];

                    if ($prevCat != $category['id']) : ?>
                        <div class="fontcolor1 span11 topmargin1">
                            <h2>
                                <?php echo $category['description'] ?>
                            </h2>
                        </div>
                        <div class="span11">
                            <hr>
                            <p>
                                <?php echo $portfolio['description'] ?>
                            </p>
                        </div>
                    <?php
                    $prevCat = $category['id'];
                    endif;
                    ?>
                    <div class="span11 margin3">
                        <?php
                        foreach ($item['Images'] as $image) :
                            $imageURl = array('controller' => 'PortfolioImages', 'action' => 'view', $image['id']);
                            $attrs = array('alt' => '', 'class' => 'img-polaroid');
                            echo '<div class="span2">'.$this->Html->image($imageURl, $attrs).'</div>';
                        endforeach;
                        ?>
                     </div>
                <?php endforeach;
             }
          ?> 
     </div>
</div>
