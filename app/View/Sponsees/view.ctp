<?php
$user = $this->Session->read('Auth.User');
?>
<style>
    table tr td {
        background: #efefef;
        border: none;
    }
    .modal-header{
        background:#349bb9;
        overflow: auto;
    }
    
</style>
<div class="well span8 pull-right">
    <div style="margin-left:0;" class="span2 pull-left">
        <?php
        $imageURl = array('controller' => 'SponseeImages', 'action' => 'view', $sponsee['id']);
        $attrs = array('alt' => '', 'width' => '160px', 'class' => 'img-polaroid');
        echo $this->Html->image($imageURl, $attrs);
        ?>
        <!--Button to trigger modal 
        <a href="#myModal" role="button" class="btn btn-info btn-block video"><i class="icon-facetime-video"></i> Watch my video</a>
        <a href="#myModal" role="button" class="btn btn-info btn-block story"><i class="icon-book"></i> Read my story</a>-->
        <a data-toggle="modal" href="#myVideo" class="btn btn-info btn-medium btn-block"><i class="icon-facetime-video"></i> Watch my Video</a>
        <a data-toggle="modal" href="#myStory" class="btn btn-info btn-medium btn-block"><i class="icon-book"></i> Read my Story</a>
    </div>
    <div style="width:515px;" class="span6 pull-right box">
        <div style="margin-left:0;" class="span2 pull-left">
            <table style="border:none;">
                <tr>
                    <td><strong>Name: </strong></td>
                    <td><?php echo $sponsee['firstname'].' '.$sponsee['lastname']; ?></td>
                </tr>
                <tr>
                    <td><strong>Gender: </strong></td>
                    <td><?php echo $sponsee['gender']; ?></td>
                </tr>
                <tr>
                    <td><strong>Birth Date: </strong></td>
                    <td><?php echo $sponsee['birthdate']; ?></td>
                </tr>
                <tr>
                    <td><strong>Location: </strong></td>
                    <td>
                        <span class="pull-left">
                            <?php $flag = "/img/flag/".$sponsee['country'].".png"; echo $this->Html->image("$flag");?>
                            <?php echo $sponsee['country']; ?>
                        </span>
                    </td>
                </tr>
            </table>
        </div>
        <div style="border-left:solid 1px #e3e3e3; padding-left:20px;" class="span3 pull-left">
            <h5>Short Story</h5>
            <p style="text-align: justify;">
                <?php
                     $information = explode("\n", $sponsee['short_description']);

                     foreach ($information as $line):
                         echo '<p> ' . $line . "</p>\n";
                     endforeach;
                ?>
             </p>
             <?php echo $this->Html->link('Donate Today!', array('controller' => 'donations', 'action' => 'view', $sponsee['id']), array('class' => 'btn btn-info btn-block btn-large')); ?>
        </div>
    </div>
</div>




<div style="width:880px; left: 18%; margin: 0 auto;" id="myVideo" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 id="myModalLabel">
            <span class="pull-left">
                <?php echo $this->Html->image('aboundinginlove_logo.png', array('alt'=>'Abounding in Love Organization Logo', 'width' => '60px'));?>
            </span>
            <span class="span6 pull-left">
                <?php echo $this->Html->image('slogan.png', array('alt'=>'Abounding in Love Organization Slogan', 'width' => '280px'));?>
            </span>
        </h3>
    </div>
    <div style="clear:both;" class="modal-body">
        <div style="margin-left:0; width:810px;" class="pull-left box">
            <div style="margin-left:0;" class="span3 pull-left">
                <?php
                $imageURl = array('controller' => 'SponseeImages', 'action' => 'view', $sponsee['id']);
                $attrs = array('alt' => '', 'width' => '260px', 'class' => 'img-polaroid');
                echo $this->Html->image($imageURl, $attrs);
                ?>
                <?php echo $this->Html->link('Donate Now!', array('controller' => 'donations', 'action' => 'view', $sponsee['id']), array('class' => 'btn btn-info btn-block btn-large')); ?>
            </div>
            <div class="span2 pull-left">
                <table style="border:none;">
                    <tr>
                        <td><strong>Name: </strong></td>
                        <td><?php echo $sponsee['firstname'].' '.$sponsee['lastname']; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Gender: </strong></td>
                        <td><?php echo $sponsee['gender']; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Birth Date: </strong></td>
                        <td><?php echo $sponsee['birthdate']; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Location: </strong></td>
                        <td>
                            <?php $flag = "/img/flag/".$sponsee['country'].".png"; echo $this->Html->image("$flag");?>
                            <?php echo $sponsee['country']; ?>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="span2 pull-left"><?php echo $sponsee['videolink']; ?></div>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal">Close</button>
    </div>
</div>

<div style="width:880px; left: 18%; margin: 0 auto;" id="myStory" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 id="myModalLabel">
            <span class="pull-left">
                <?php echo $this->Html->image('aboundinginlove_logo.png', array('alt'=>'Abounding in Love Organization Logo', 'width' => '60px'));?>
            </span>
            <span class="span6 pull-left">
                <?php echo $this->Html->image('slogan.png', array('alt'=>'Abounding in Love Organization Slogan', 'width' => '280px'));?>
            </span>
        </h3>
    </div>
    <div style="clear:both;" class="modal-body">
        <div style="margin-left:0; width:790px; margin-bottom: 20px;" class="pull-left box">
            <div style="margin-left:0;" class="span3 pull-left">
                <?php
                $imageURl = array('controller' => 'SponseeImages', 'action' => 'view', $sponsee['id']);
                $attrs = array('alt' => '', 'width' => '260px', 'class' => 'img-polaroid');
                echo $this->Html->image($imageURl, $attrs);
                ?>
                <?php echo $this->Html->link('Donate Now!', array('controller' => 'donations', 'action' => 'view', $sponsee['id']), array('class' => 'btn btn-info btn-block btn-large')); ?>
            </div>
            <div class="span5 pull-left">
                <table style="border:none;">
                    <tr>
                        <td><strong>Name: </strong></td>
                        <td><?php echo $sponsee['firstname'].' '.$sponsee['lastname']; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Gender: </strong></td>
                        <td><?php echo $sponsee['gender']; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Birth Date: </strong></td>
                        <td><?php echo $sponsee['birthdate']; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Location: </strong></td>
                        <td>
                            <?php $flag = "/img/flag/".$sponsee['country'].".png"; echo $this->Html->image("$flag");?>
                            <?php echo $sponsee['country']; ?>
                        </td>
                    </tr>
                </table>
                <hr>
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
                    if ($totaldonatedamount == 0 or $totalneededamount == 0) {
                        $percentage = 0;
                    }
                    else {
                        $percentage = ($totaldonatedamount / $totalneededamount) * 100;
                    }
                    ?>
                    <?php
                    echo "<div><b class='fontcolor1 fontsize1'>" . $this->Number->toPercentage($percentage) . "</b> raised</div>";
                    echo "<div class='progress'><div class='bar' style='width:" . $this->Number->toPercentage($percentage) . "'></div></div>";
                    echo "<div class='bottommargin2'><b class='fontcolor1'>" . $this->Number->currency($totalneededamount, 'USD') . "</b> = Needed</div>";
                    echo "<div class='bottommargin2'><b class='fontcolor1'>" . $this->Number->currency($totaldonatedamount, 'USD') . "</b> = Donated</div>";
                    ?>
                </div>
                <hr>
            </div>
        </div>
        <h4 class="fontcolor1">BIOGRAPHY</h4>
        <p style="text-align: justify;">
           <?php
                $information = explode("\n", $sponsee['long_description']);

                foreach ($information as $line):
                    echo '<p> ' . $line . "</p>\n";
                endforeach;
           ?>
        </p>
        <h4 class="fontcolor1 topmargin2">NEEDS</h4>
        <?php
            $user = $this->Session->read('Auth.User');

            if(empty($sponseeneeds)){

                $controller = $this->name;

                if ($user && $user['role'] == 'admin'){
                    echo "<div class='alert alert-info'>
                        <h4>Not yet specified.</h4> 
                        <p class='topmargin1'>To add, just click the add button below.</p>";
                    echo "<a href='#myModal' role='button' class='btn btn-info add'><i class='icon-plus'></i> Add Record</a>";
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
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal">Close</button>
    </div>
</div>