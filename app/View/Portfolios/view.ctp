<div style="margin-left:0;" class="pull-left span12">
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
    <div class="well">
        <?php
            $prevCat = 0;

            if(empty($listing)){
                echo "<div class='topmargin2 alert alert-info'>
                    <p><h3>Not yet specified.</h3></p>
                </div>";
            }
            else {
                echo "<div class=\"banner\"></div>";
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
                            <p style="text-align:justify;">
                                <?php echo $portfolio['description'] ?>
                            </p>
                        </div>
                    <?php
                    $prevCat = $category['id'];
                    endif;
                    ?>
                    <div style="margin-left:32px;" class="span11">
                        <?php
                        foreach ($item['Images'] as $image) :
                            $imageURl = array('controller' => 'PortfolioImages', 'action' => 'view', $image['id']);
                            $attrs = array('alt' => '');
                            echo '<div style="margin-left:0; width:203px;" class="span2 img-polaroid">'.$this->Html->image($imageURl, $attrs).'</div>';
                        endforeach;
                        ?>
                     </div>
                <?php endforeach;
             }
          ?> 
     </div>
</div>
