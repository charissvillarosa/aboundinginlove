<div  class="clearfix container topmargin3">
    <div style="margin-left:0;" class="pull-left span12">
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
                                <p class="fontsize1">
                                    <?php echo $category['description'] ?>
                                </p>
                                <hr style="border:dashed 1px #ccc;">
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
                                $attrs = array('alt' => '', 'style' => 'margin-left:0; width:203px;', 'class' => 'html5lightbox span2 img-polaroid', 'data-group' => 'mygroup');
    //                            echo '<div style="margin-left:0; width:203px;" class="span2 img-polaroid">'.$this->Html->image($imageURl, $attrs).'</div>';
                                echo "<a href=\"/aboundinginlove/index.php/PortfolioImages/view/"; echo $image['id']; echo "\" class=\"html5lightbox\" data-group=\"mygroup\">";
                                     echo $this->Html->image($imageURl, $attrs);
                                echo "</a>";
                            endforeach;
                            ?>
                       </div>
                    <?php endforeach;
                 }
              ?>
         </div>
    </div>
</div>
