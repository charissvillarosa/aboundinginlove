<div class="container tabs">
    <div class="span11 margin3 leftmargin1">
        <?php
        foreach ($sponseeList as $item) :
            $sponsee = $item['SponseeListingItem'];
        ?>
        <div class="pull-left rightmargin1 span3">
        <?php
                $imageURl;
                if ($sponsee['primaryimage']) {
                    $imageURl = array('controller' => 'sponseeimages', 'action' => 'view', $sponsee['primaryimage']);
                } else {
                    $imageURl = 'sponsees/nophoto.jpg';
                }
                $attrs = array('alt' => '', 'width' => '300', 'class' => 'img-polaroid');
                echo $this->Html->image($imageURl, $attrs);
        ?>
        <div class="topmargin1">
            <hr>
            <?php 
                echo "<div><b class='fontcolor1 fontsize1'>".$this->Number->toPercentage($sponsee['percentage'])."</b> raised</div>";
                echo "<div class='progress'><div class='bar' style='width:".$this->Number->toPercentage($sponsee['percentage'])."'></div></div>";
                echo "<div class='bottomargin2'><b class='fontcolor1'>".$this->Number->currency($sponsee['total_neededamount'], 'USD')."</b> = Needed</div>";
                echo "<div class='bottomargin2'><b class='fontcolor1'>".$this->Number->currency($sponsee['total_donatedamount'], 'USD')."</b> = Donated</div>";
            ?>
            <hr>
        </div>
        </div>
        <div class="pull-left">
            <div class="pull-left span7">
                <p>
                    <h2 class="fontcolor1">
                        <?php echo $sponsee['firstname'] . ' ' . $sponsee['lastname'] ?>
                    </h2>
                </p>
                <p class="topmargin1">
                    <hr>
                    <?php
                    echo $sponsee['information'];
                    ?>
                </p>
                <h3 class="fontcolor1">Needs</h3>
                <p>
                    <?php
                    if(empty($sponseeneeds)){
                                
                                $user = $this->Session->read('Auth.User');
                                $controller = $this->name;

                                if ($user && $user['role'] == 'admin'){
                                    echo "<div class='alert alert-info'>
                                        <h4>Not yet specified.</h4> 
                                        <p class='topmargin1'>To add, just click the add button below.</p>";
                                        echo $this->Html->link('Add Sponsee Needs', array('controller' => 'sponseeneeds', 'action' => 'add', $sponsee['id']), array('class' => 'btn btn-info btn-big'));
                                    echo "</div>";
                                }
                                else {
                                    echo "<div class='alert alert-info'><h4>Not yet specified.</h4></div>";
                                }
                    }
                    else {
                        $prevCat = 0;
                        echo "<table class='table table-hover'>";
                        foreach ($sponseeneeds as $item) :
                            $need = $item['SponseeNeed'];
                            $category = $item['Category'];
                            $selected = $item['SponseeNeed']['id'];
                            $options = $item['SponseeNeed']['description'];
                            
                            if ($prevCat != $category['id']) : ?>
                                <tr>
                                    <th>
                                        <?php echo $category['description'] ?>
                                    </th>
                                </tr>
                            <?php 
                            $prevCat = $category['id'];
                            endif; 
                            ?>
                            <tr>
                                <td>
                                    <?php echo $this->Form->input('sponsee_need', array(
                                        'type' => 'checkbox',
                                        'label' => $this->Number->currency($need['neededamount'], 'USD').' - '.$need['description'],
                                        'multiple' => 'checkbox',
                                        'options' => $options,
                                        'selected' => $selected,
                                        'id' => $options,
                                        'value' => $selected
                                    )); ?>
                                </td>
                            </tr>
                        <?php
                        endforeach;
                        echo "</table>";
                        echo $this->paypal->button('Donate', array('type' => 'donate', 'amount' => '60.00'));
                    }
                    ?>
                </p>
            </div>
        </div>
        <?php
        endforeach;
        ?>
    </div>
</div>