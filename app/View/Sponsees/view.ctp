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

<div class="clearfix topmargin1 well span11 pull-right bottommargin2">
    <div class="pull-right">
        <?php echo $this->Html->link('Go back to Sponsees', array('action' => 'index'), array('class' => 'btn btn-info btn-medium')); ?>
    </div>
    <div style="margin-left:0;" class="span3 pull-left topmargin1 bottommargin2">
        <?php
        $imageURl = array('controller' => 'SponseeImages', 'action' => 'view', $sponsee['id'], $sponseeImage['hash_key']);
        $attrs = array('alt' => '', 'width' => '260px', 'class' => 'img-polaroid');
        echo $this->Html->image($imageURl, $attrs);
        ?>
        <!--Button to trigger modal-->
        <a data-toggle="modal" href="#myVideo" class="btn btn-info btn-large btn-block">Watch my Video</a>
        <a data-toggle="modal" href="#myStory" class="btn btn-info btn-large btn-block">Read my Story</a>
    </div>
    <div style="width:720px;" class="span7 pull-right box topmargin1">
        <div style="margin-left:0;" class="span3 pull-left">
            <table style="border:none;">
                <tr>
                    <td>
                        <p class="fontcolor1">Name: <?php echo $sponsee['firstname'].' '.$sponsee['lastname']; ?></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="fontcolor1">Gender: <?php echo $sponsee['gender']; ?></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="fontcolor1">Birth Date: <?php echo $this->Time->Format($sponsee['birthdate']); ?></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="fontcolor1">Location: 
                            <?php $flag = "/img/flag/".$sponsee['country'].".png"; echo $this->Html->image("$flag");?>
                            <?php echo $sponsee['country']; ?>
                        </p>
                    </td>
                </tr>
            </table>
        </div>
        <div style="border-left:solid 1px #e3e3e3; padding-left:40px;" class="span4 pull-left">
            <p>
                <?php
                     $information = explode("\n", $sponsee['short_description']);

                     foreach ($information as $line):
                         echo '<p style="text-align: justify;">' . $line . "</p>\n";
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
            <div class="pull-left"><?php echo $sponsee['videolink']; ?></div>
            <div class="pull-left leftmargin1">
                <table style="border:none;">
                    <tr>
                        <td><p class="fontcolor1">Name: <?php echo $sponsee['firstname'].' '.$sponsee['lastname']; ?></p></td>
                    </tr>
                    <tr>
                        <td><p class="fontcolor1">Gender: <?php echo $sponsee['gender']; ?></p></td>
                    </tr>
                    <tr>
                        <td><p class="fontcolor1">Birth Date: <?php echo $this->Time->Format($sponsee['birthdate']); ?></p></td>
                    </tr>
                    <tr>
                        <td>
                            <p class="fontcolor1">Location:
                            <?php $flag = "/img/flag/".$sponsee['country'].".png"; echo $this->Html->image("$flag");?>
                            <?php echo $sponsee['country']; ?></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo $this->Html->link('Donate Now!', array('controller' => 'donations', 'action' => 'view', $sponsee['id']), array('class' => 'btn btn-info btn-block btn-large')); ?>
                        </td>
                    </tr>
                </table>
            </div>
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
                $imageURl = array('controller' => 'SponseeImages', 'action' => 'view', $sponsee['id'], $sponseeImage['hash_key']);
                $attrs = array('alt' => '', 'width' => '260px', 'class' => 'img-polaroid');
                echo $this->Html->image($imageURl, $attrs);
                ?>
                <?php echo $this->Html->link('Donate Now!', array('controller' => 'donations', 'action' => 'view', $sponsee['id']), array('class' => 'btn btn-info btn-block btn-large')); ?>
            </div>
            <div class="span5 pull-left">
                <table style="border:none;">
                    <tr>
                        <td><p class="fontcolor1">Name: <?php echo $sponsee['firstname'].' '.$sponsee['lastname']; ?></p></td>
                    </tr>
                    <tr>
                        <td><p class="fontcolor1">Gender: <?php echo $sponsee['gender']; ?></p></td>
                    </tr>
                    <tr>
                        <td><p class="fontcolor1">Birth Date: <?php echo $this->Time->Format($sponsee['birthdate']); ?></p></td>
                    </tr>
                    <tr>
                        <td>
                            <p class="fontcolor1">Location:
                            <?php $flag = "/img/flag/".$sponsee['country'].".png"; echo $this->Html->image("$flag");?>
                            <?php echo $sponsee['country']; ?></p>
                        </td>
                    </tr>
                </table>
                <hr>
                <div>
                    <?php
                    $totalneededamount = 0;
                    $totaldonatedamount = 0;
                    $percentage = 0;
                    if(empty($sponseeneeds)){
                        
                    }
                    else{
                        foreach ($sponseeneeds as $itemLabel=>$itemArray) :
                            foreach ($itemArray as $item) :
                                $need = $item['SponseeNeed'];
                                $totalneededamount = $totalneededamount + $need['neededamount'];
                                $totaldonatedamount = $totaldonatedamount + $need['donatedamount'];
                            endforeach;
                        endforeach;
                    }
                    if ($totaldonatedamount == 0 or $totalneededamount == 0) {
                        $percentage = 0;
                    }
                    else {
                        $percentage = ($totaldonatedamount / $totalneededamount) * 100;
                    }
                    ?>
                    <?php
                    echo "<div><center><p class='fontcolor2 fontsize1'>" . $this->Number->toPercentage($percentage) . " Raised </p></center></div>";
                    echo "<div class='progress'><div class='bar' style='width:" . $this->Number->toPercentage($percentage) . "'></div></div>";
                    echo "<div class='bottommargin2 fontcolor1 fontsize3'><p>" . $this->Number->currency($totalneededamount, 'USD') . " = Needed Amount </p></div>";
                    echo "<div class='bottommargin2 fontcolor1 fontsize3'><p>" . $this->Number->currency($totaldonatedamount, 'USD') . " = Donated Amount </p></div>";
                    ?>
                </div>
                <hr>
            </div>
        </div>
        <h4 class="fontcolor1">BIOGRAPHY</h4>
        <p>
           <?php
                $information = explode("\n", $sponsee['long_description']);

                foreach ($information as $line):
                    echo '<p class="topmargin1" style="text-align: justify;"> ' . $line . "</p>\n";
                endforeach;
           ?>
        </p>
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
                foreach ($sponseeneeds as $itemLabel=>$itemArray) :

                    $ctr = 1;
                    $prevCat = 0;

                    echo "<h3 class='fontcolor1 topmargin1'>$itemLabel</h3>";
                    echo '<table class="table table-hover table-bordered">';

                    foreach ($itemArray as $item) :

                        $need = $item['SponseeNeed'];
                        $category = $item['Category'];
                        $addedBy = $item['AddedBy'];

                        if ($prevCat != $category['id']) : ?>
                            <tr>
                                <th colspan="9">
                                    <?php echo '<span class="category">'.$category['description'].'</span>'; ?>
                                </th>
                            </tr
                            <tr>
                                <td>No.</td>
                                <td>Description</td>
                                <td>Needed Amount</td>
                                <td>Donated Amount</td>
                            </tr>
                        <?php
                        $prevCat = $category['id'];
                        endif;
                        ?>
                        <tr>
                            <td>
                                <?php echo $ctr.'.'; ?>
                                <span class="id" style="display:none;"><?php echo $need['id'] ?></span>
                                <span class="sponseeid" style="display:none;"><?php echo $need['sponsee_id'] ?></span>
                                <span class="donationmethod" style="display:none;"><?php echo $need['donation_method'] ?></span>
                            </td>
                            <td><?php echo '<span class="description">'.$need['description'].'</span>'; ?></td>
                            <td style="text-align: right;"><?php echo '<span class="neededamount">'.$this->Number->currency($need['neededamount']).'</span>'; ?></td>
                            <td style="text-align: right;"><?php echo $this->Number->currency($need['donatedamount'])?></td>
                        </tr>
                        <?php $ctr++;
                    endforeach;

                    echo '</table>';

                endforeach;
            }?>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal">Close</button>
    </div>
</div>