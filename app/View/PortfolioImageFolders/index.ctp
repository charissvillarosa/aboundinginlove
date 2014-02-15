<div  class="clearfix container topmargin3">
    <div style="margin-left:0;" class="pull-left span12">
        <div class="well">
            <div class="banner"></div>

            <div class="fontcolor1 span11 topmargin1">
                <span class="fontsize1">
                    <?php echo $folderModel['PortfolioImageFolder']['name'] ?>
                </span>
                <hr style="border:dashed 1px #ccc;">
            </div>

            <div style="margin-left:32px;" class="span11">
                <?php
                if (empty($folderModel['Images'])) :
                    ?>
                    <h3>No uploaded photos yet.</h3>
                    <?php
                endif;

                foreach ($folderModel['Images'] as $image) :
                    $imageURl = array('controller' => 'PortfolioImages', 'action' => 'view', $image['id']);
                    $attrs = array(
                        'alt' => '',
                        'style' => 'margin-left:0; width:203px;',
                        'class' => 'html5lightbox span2 img-polaroid',
                        'data-group' => 'mygroup'
                    );

                    echo "<a href=\"{$this->Html->url($imageURl)}\" class=\"html5lightbox\" data-group=\"mygroup\">";
                    echo $this->Html->image($imageURl, $attrs);
                    echo "</a>";
                endforeach;
                ?>
            </div>
        </div>
    </div>
</div>
