<div style="margin-left:32px;" class="span11">
    <?php
    if (empty($folderModel['Images'])) :

        echo '<h3>No uploaded photos yet.</h3>';

    else :

        echo '<ul class="thumbnails">';

        foreach ($folderModel['Images'] as $image) :
            $imageURl = array('controller' => 'PortfolioImages', 'action' => 'view', $image['id']);

            $attrs = array(
                'alt' => '',
                'style' => 'margin-left:0; width:203px;',
                'class' => 'html5lightbox span2 img-polaroid',
                'data-group' => 'mygroup'
            );

            echo '<li>';
            echo " <a href=\"{$this->Html->url($imageURl)}\" class=\"html5lightbox thumbnail pull-left\" data-group=\"mygroup\">";
            echo $this->Html->image($imageURl, $attrs);
            echo " <div class='text-center'>$image[description]</div>";
            echo " </a>";
            echo '</li>';
        endforeach;

        echo '</ul>';

    endif;
    ?>
</div>