<?php
$user = $this->Session->read('Auth.User');
?>
<div class="container tabs">
    <div class="span11 margin3 leftmargin1">
        <div class="pull-right">
            <?php echo $this->Html->link('Go back to Sponsee List', array('action' => 'index'), array('class' => 'btn btn-info btn-small')); ?>
            <?php
            
            if (!empty($user) && $user['role'] == 'admin') {
                echo $this->Html->link('Add New Sponsee', array('action' => 'add'), array('class' => 'btn btn-info btn-small'));
            }
            
            ?>
        </div>
        <div style="background:#f9f9f9;" class="pull-left well leftmargin2 topmargin1">
            <h4 class="fontcolor1"><?php echo __('View Sponsee record'); ?></h4>
            <hr>
            <div>
                <div class="span2">
                    <div>
                        <?php
                        $imageURl = array('controller' => 'SponseeImages', 'action' => 'view', $sponsee['id']);
                        $attrs = array('alt' => '', 'width' => '165', 'class' => 'img-polaroid');
                        echo $this->Html->image($imageURl, $attrs);
                        ?>
                    </div>
                    <?php if (!empty($user) && $user['role'] == 'admin') : ?>
                    <div>
                        <?php
                        $action = array('controller' => 'SponseeImages', 'action' => 'upload', $sponsee['id']);
                        echo $this->Html->link('Change Photo', $action);
                        ?>
                    </div>
                    <?php endif; ?>
                    <div class="margin1">
                        <p>
                            <b class="fontcolor1">
                                <?php echo $sponsee['firstname'] . ' ' . $sponsee['lastname'] ?>
                            </b><br>
                            <b><?php echo $sponsee['country'] ?> : <a href="<?php echo $sponsee['maplocation'] ?>" target="_blank">Map Location</a></b>
                        </p>
                    </div>
                    <hr/>
                    <div>
                        <?php 
                            $totalneededamount = 0;
                            $totaldonatedamount = 0;
                            $percentage = 0;
                            foreach ($sponseeneeds as $item) :
                                $need = $item['SponseeNeed'];
                                $totalneededamount = $totalneededamount + $need['neededamount'];
                                $totaldonatedamount = $totaldonatedamount + $need['donatedamount'];
                            endforeach;
                            if($totaldonatedamount == 0 or $totalneededamount == 0){
                                $percentage = 0;
                            }else {
                                $percentage = ($totaldonatedamount/$totalneededamount)*100;
                            }
                            
                        ?>
                        <?php
                            echo "<div><b class='fontcolor1 fontsize1'>".$this->Number->toPercentage($percentage)."</b> raised</div>";
                            echo "<div class='progress'><div class='bar' style='width:".$this->Number->toPercentage($percentage)."'></div></div>";
                            echo "<div class='bottommargin2'><b class='fontcolor1'>".$this->Number->currency($totalneededamount, 'USD')."</b> = Needed</div>";
                            echo "<div class='bottommargin2'><b class='fontcolor1'>".$this->Number->currency($totaldonatedamount, 'USD')."</b> = Donated</div>";
                            echo $this->Html->link('Donate', array('controller' => 'donations', 'action' => 'view', $sponsee['id']), array('class' => 'btn btn-info'));
                        ?>
                    </div>
                    <hr/>
                </div>
                <div class="pull-right span8">
                    <div class="leftmargin2 bottommargin1">
                        <h4 class="fontcolor1">Biography</h4>
                        <hr/>
                        <p class="">
                            <?php echo $sponsee['information']; ?>
                        </p>
                        <h4 class="fontcolor1 topmargin2">Needs</h4>
                        <?php
                            $user = $this->Session->read('Auth.User');

                            if(empty($sponseeneeds)){
                                
                                $controller = $this->name;

                                if ($user && $user['role'] == 'admin'){
                                    echo "<div class='alert alert-info'>
                                        <h4>Not yet specified.</h4> 
                                        <p class='topmargin1'>To add, just click the add button below.</p>";
                                        echo $this->Html->link('Add Sponsee Needs', array('controller' => 'SponseeNeeds', 'action' => 'add', $sponsee['id']), array('class' => 'btn btn-info btn-big'));
                                    echo "</div>";
                                }
                                else {
                                    echo "<div class='alert alert-info'><h4>Not yet specified.</h4></div>";
                                }
                         }
                            else {
                                $ctr = 1;
                                $prevCat = 0;
                                echo "<table class='table table-hover table-bordered'>";
                                    foreach ($sponseeneeds as $item) :
                                        $need = $item['SponseeNeed'];
                                        $category = $item['Category'];
                                        
                                        if ($prevCat != $category['id']) : ?>
                                            <tr>
                                                <th bgcolor="#eef6fa" colspan="7">
                                                    <?php echo $category['description'] ?>
                                                </th>
                                            </tr
                                            <tr>
                                                <td bgcolor="#f9f9f9">No.</td>
                                                <td bgcolor="#f9f9f9">Description</td>
                                                <td bgcolor="#f9f9f9">Needed Amount</td>
                                                <td bgcolor="#f9f9f9">Donated Amount</td>
                                                <?php if ($user && $user['role'] == 'admin'){
                                                   echo "
                                                     <td bgcolor='#f9f9f9'>Added By</td>
                                                     <td bgcolor='#f9f9f9'>Date Added</td>
                                                     <td bgcolor='#f9f9f9'>Date Modified</td>
                                                   ";
                                                }?>
                                            </tr>
                                        <?php 
                                        $prevCat = $category['id'];
                                        endif; 
                                        ?>
                                        <tr>
                                            <td bgcolor="#fff"><?php echo $ctr.'.'; ?></td>
                                            <td bgcolor="#fff"><?php echo $need['description'] ?></td>
                                            <td bgcolor="#fff" style="text-align: right;"><?php echo $this->Number->currency($need['neededamount']) ?></td>
                                            <td bgcolor="#fff" style="text-align: right;"><?php echo $this->Number->currency($need['donatedamount'])?></td>
                                            <?php if ($user && $user['role'] == 'admin'){
                                                echo "<td bgcolor='#fff'>".$need['added_by']."</td>";
                                                echo "<td bgcolor='#fff'>".$need['created']."</td>";
                                                echo "<td bgcolor='#fff'>".$need['modified']."</td>";
                                             }?>
                                        </tr>
                                        <?php
                                    $ctr++;
                                    endforeach;
                               echo "</table>";
                            }?>
                    </div>
                </div>
            </div>
        </div>
     </div>
</div>