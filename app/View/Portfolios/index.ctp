<div class="pull-right span11 topmargin1">
    <div class="navbar banner">
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
        <div class="topmargin1">
        <?php
            foreach ($sponseelist as $item) :
               $sponsee = $item['Sponsee'];
        ?>
        <?php
            $imageURl = array('controller' => 'SponseeImages', 'action' => 'view', $sponsee['id']);
            $attrs = array('alt' => '', 'width' => '165', 'class' => 'img-polaroid');
            echo '<div class="pull-left bottommargin3">
                    <div class="pull-left span2">'.$this->Html->image($imageURl, $attrs).'</div>';
                    echo '<div class="pull-left span3">
                        <h4 class="fontcolor1">'.$sponsee['firstname'].' '.$sponsee['middlename'].' '.$sponsee['lastname'].'</h4>
                        <p>
                            Lorem ipsum dolor sit amet, venenatis lectus amet rhoncus rutrum semper, nunc dolores pulvinar
                            adipiscing sollicitudin enim, accumsan suscipit, ultrices platea nunc pulvinar et donec, euismod sed.</p><p class="leftmargin2">'
                            . $this->Html->link('View portfolio', array('controller' => 'portfolios', $sponsee['id'], 'action' => 'view'), array('class' => 'btn btn-info btn-small')).
                        '</p>
                    </div>
                 </div>';
        ?>
        <?php
            endforeach;
        ?>
        </div>
     </div>
</div>
