<?php
$user = $this->Session->read('Auth.User');
?>
<style>
    .headerstyle {
        width:1130px;
        padding:40px 10px 10px 30px;
    }
    .center {
        width:910px;
        margin:30px auto;
    }
</style>
<div class="container tabs">
    <div>
        <div class="pull-right headerstyle banner span11">
            <div class="pull-left"><p class="fontsize1">VIEW SPONSEE RECORD</p></div>
            <div class="pull-right"><?php echo $this->Html->link('Go back to Sponsee List', array('action' => 'index'), array('class' => 'btn btn-info btn-medium')); ?></div>
        </div>
        <div class="clearfix pull-left">
            <div class="span2 box bottommargin1">
                <div>
                    <?php
                    $imageURl = array(
                        'controller' => 'SponseeImages',
                        'action' => 'view',
                        $sponsee['id'], $sponseeImage['hash_key']
                    );
                    
                    $attrs = array('alt' => '', 'width' => '160', 'class' => 'img-polaroid');
                    echo $this->Html->image($imageURl, $attrs);
                    ?>
                </div>
                <?php if (!empty($user) && $user['role'] == 'admin') : ?>
                <div>
                    <?php
                    $action = array('controller' => 'SponseeImages', 'action' => 'upload', $sponsee['id']);
                    echo $this->Html->link('Change Photo', $action, array('class' => 'btn btn-info btn-large btn-block'));
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
                        echo $this->Html->link('Donate Now!', array('controller' => 'donations', 'action' => 'view', $sponsee['id']), array('class' => 'btn btn-info btn-large btn-block'));
                    ?>
                </div>
            </div>
            <div class="pull-left span9">
                <div class="leftmargin1 bottommargin1">
                    <h4 class="fontcolor1">BIOGRAPHY</h4>
                    <p>
                       <?php
                            $information = explode("\n", $sponsee['long_description']);

                            foreach ($information as $line):
                                echo '<p style="text-align: justify;"> ' . $line . "</p>\n";
                            endforeach;
                       ?>
                    </p>
                    <h4 class="fontcolor1 topmargin2">NEEDS</h4>
                    <?php
                        $user = $this->Session->read('Auth.User');
                        $addbutton = $this->Html->url(array('controller'=>'Sponsees', 'action' => 'add'));
                        
                        if(empty($sponseeneeds)){

                            $controller = $this->name;

                            if ($user && $user['role'] == 'admin'){
                                echo "<div class='alert alert-info'>
                                    <h4>Not yet specified.</h4> 
                                    <p class='topmargin1'>To add, just click the add button below.</p>";
                                echo "<a href=\"$addbutton\" class=\"btn btn-info add\"><i class=\"icon-plus\"></i> Add Record</a>";
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
                                    $addedby = $item['AddedBy'];
 
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
                                                 <td bgcolor='#f9f9f9'>Date Created</td>
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
                                            echo "<td bgcolor='#fff'>".$addedby['firstname'].' '.$addedby['lastname']."</td>";
                                            echo "<td bgcolor='#fff'>".$this->Time->format($need['created'])."</td>";
                                            echo "<td bgcolor='#fff'>".$this->Time->format($need['modified'])."</td>";
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