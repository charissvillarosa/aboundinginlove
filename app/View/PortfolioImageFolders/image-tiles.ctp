<?php $user = $this->Session->read('Auth.User') ?>

<div id="folder-image-tiles" style="margin-left:32px;" class="span11">
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

            echo '<li data-id="' .$image['id']. '">';
            echo " <a href=\"{$this->Html->url($imageURl)}\" class=\"html5lightbox thumbnail pull-left\" data-group=\"mygroup\">";
            echo $this->Html->image($imageURl, $attrs);
            echo " <div class='text-center'>$image[description]</div>";

            if ($user['role'] === 'admin') :
                echo '<button class="close">&times;</button>';
            endif;

            echo " </a>";
            echo '</li>';
        endforeach;

        echo '</ul>';

    endif;
    ?>
</div>

<?php if ($user['role'] === 'admin') : ?>
<script>

    $(function() {
        $('<button class="close">&times;</button>')
                .attr('title', 'Delete this image')
                .click(function(e) {
                    e.stopPropagation();
                    e.preventDefault();
                    removeImage(this);
                })
                .appendTo('.thumbnail');
    });

    function removeImage(button)
    {
        if (!confirm('Are you sure you want to delete this image?')) return;

        var imgId = $(button).closest('li').data('id');
        var postUrl = '<?php echo $this->Html->url(array('controller' => 'PortfolioImages', 'action' => 'remove')) ?>';

        $.post(postUrl, {id: imgId})
                .done(function(resp) {
                    $('#folder-image-tiles').html(resp);
                })
                .fail(function() {
                    alert('Failed to remove the image at this moment. Please try again later.');
                });
    }

</script>
<?php endif; ?>