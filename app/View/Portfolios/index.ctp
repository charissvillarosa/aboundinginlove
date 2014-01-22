<div class="clearfix container topmargin3">
    <div class="pull-right span12">
        <div class="well banner">
            <div class="topmargin1">
            <?php
                foreach ($sponseelist as $item) :
                   $sponsee = $item['Sponsee'];
                   $sponseeImage = $item['Image'];
            ?>
            <?php
                $imageURl = array('controller' => 'SponseeImages', 'action' => 'view', $sponsee['id'], $sponseeImage['hash_key']);
                $attrs = array('alt' => '', 'width' => '165', 'class' => 'img-polaroid');
                echo '<div class="pull-left bottommargin3">
                        <div class="pull-left box leftmargin2">
                            <div style="margin-left:0;" class="pull-left span2">'.$this->Html->image($imageURl, $attrs).'</div>';
                        echo '<div class="pull-left span3">
                                <h4 class="fontcolor1">'.$sponsee['firstname'].' '.$sponsee['middlename'].' '.$sponsee['lastname'].'</h4>
                                <p style="text-align:justify;">
                                    Lorem ipsum dolor sit amet, venenatis lectus amet rhoncus rutrum semper, nunc dolores pulvinar
                                    adipiscing sollicitudin enim, accumsan suscipit, ultrices platea nunc pulvinar et donec, euismod sed.</p><p>'
                                    . $this->Html->link('View portfolio', array('controller' => 'portfolios', $sponsee['id'], 'action' => 'view'), array('class' => 'btn btn-info btn-large btn-block')).
                                '</p>
                             </div>
                        </div>
                     </div>';
            ?>
            <?php
                endforeach;
            ?>
            </div>
            <div style="margin-right:45px;" class="pull-right">
                <button class="btn"><?php echo $this->Paginator->prev('« Previous', null, null, array('class' => 'disabled')); ?></button>
                <?php echo $this->Paginator->numbers(); ?>
                <button class="btn"><?php echo $this->Paginator->next('Next »', null, null, array('class' => 'disabled')); ?></button>
                <button class="btn"><?php echo $this->Paginator->counter(); ?></button>
            </div>
         </div>
    </div>
</div>

