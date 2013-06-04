<div class="pull-left span12">
    <h2 class="fontcolor1">Recent Work</h2>
    <div class="navbar">
        <div class="navbar-inner">
            <ul class="nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">Link</a></li>
                <li><a href="#">Link</a></li>
            </ul>
        </div>
    </div>
    <?php
        foreach ($sponseelist as $item) :
           $sponsee = $item['Sponsee'];
    ?>
    <?php
        $imageURl;
        if ($sponsee['primaryimage']) {
            $imageURl = array('controller' => 'SponseeImages', 'action' => 'view', $sponsee['primaryimage']);
        }
        else {
            $imageURl = 'sponsees/nophoto.jpg';
        }
        $attrs = array('alt' => '', 'width' => '165', 'class' => 'img-polaroid');
        echo '<div class="pull-left leftmargin1 bottomargin3 well"><div class="pull-left">'.$this->Html->image($imageURl, $attrs).'</div>';
        echo '<div class="pull-left leftmargin1"><h4>'.$sponsee['firstname'].' '.$sponsee['middlename'].' '.$sponsee['lastname'].'</h4></div></div>';
    ?>
    <?php
        endforeach;
    ?>
</div>
