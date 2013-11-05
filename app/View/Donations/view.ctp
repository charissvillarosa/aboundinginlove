<?php
$user = $this->Session->read('Auth.User');
?>

<style>
    .container form {
        padding: 0;
        margin: 0;
        width: 100%;
    }

    .container form div {
        padding-left: 0;
    }
</style>

<div class="container">
    <div class="dropdown clearfix span2 topmargin3">
        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="display: block; position: static; margin-bottom: 5px; *width: 180px;">
            <li class="<?php echo $this->name == 'Profile' ? 'active' : '' ?>">
                <?php echo $this->Html->link('Donor Profile', array('controller' => 'Profile', 'action' => 'index')) ?>
            </li>
            <li class="<?php echo $this->name == 'DonationHistory' ? 'active' : '' ?>">
                <?php echo $this->Html->link('Donation History', array('controller' => 'DonationHistory', 'action' => 'index')) ?>
            </li>
            <li class="<?php echo $this->name == 'InviteFriends' ? 'active' : '' ?>">
                <?php echo $this->Html->link('Invite Friends', array('controller' => 'InviteFriends', 'action' => 'index')) ?>
            </li>
        </ul>
    </div>
    <div class="span9 well" style="padding:0 0 0 0; background: #fff; margin-top:103px;">
        <div class="clearfix pull-left headerstyle">
            <?php
            $sponsee = $sponsee['SponseeListingItem'];
            ?>
            <div class="pull-left leftmargin2 bottommargin2">
                <p class="fontsize1 banner">DONATE FOR <?php echo strtoupper($sponsee['firstname'] . ' ' . $sponsee['lastname']) ?></p>
            </div>
        </div>
        <div style="width:870px;" class="clearfix pull-left">
            <?php
            // ----- FORM BLOCK ---------
            echo $this->Form->create('SponseeDonation', array('url' => array('controller' => 'donations', 'action' => 'mydonation', $sponsee['id'])));
            ?>
            <div class="pull-left box topmargin1 span3">
                <div style="margin-right:10px;" class="leftmargin1">
                    <?php
                            $imageURl = array('controller' => 'SponseeImages', 'action' => 'view', $sponsee['id'], $sponseeImage['hash_key']);
                            $attrs = array('alt' => '', 'width' => '300', 'class' => 'img-polaroid');
                            echo $this->Html->image($imageURl, $attrs);
                    ?>
                    <div class="topmargin1">
                        <hr>
                        <?php
                            echo "<div><b class='fontcolor1 fontsize1'>".$this->Number->toPercentage($sponsee['percentage'])."</b> raised</div>";
                            echo "<div class='progress'><div class='bar' style='width:".$this->Number->toPercentage($sponsee['percentage'])."'></div></div>";
                            echo "<div class='bottommargin2'><b class='fontcolor1'>".$this->Number->currency($sponsee['total_neededamount'], 'USD')."</b> = Needed</div>";
                        ?>
                        <hr>
                    </div>
                 </div>
            </div>
            <div class="pull-left">
                <div class="pull-left span5">
                    <h3 class="fontcolor1">BIOGRAPHY</h3>
                    <p style="text-align: justify;">
                        <?php
                             $information = explode("\n", $sponsee['long_description']);

                             foreach ($information as $line):
                                 echo '<p style="text-align: justify;"> ' . $line . "</p>\n";
                             endforeach;
                        ?>
                     </p>
                     <h3 class="fontcolor1">SPONSEE NEEDS</h3>
                     <p class="bottommargin3">
                        By selecting the recurring or monthly support payments,
                        at abounding in love you may pause or cancel your support at any time for any reason.
                     </p>
                     <?php
                        foreach ($sponseeneeds as $itemLabel=>$itemArray) :

                            $ctr = 1;
                            $prevCat = 0;

                            echo "<h4 class='fontcolor1'>$itemLabel</h4>";
                            echo "<table class='table table-hover table-bordered'>";
                            echo "<tr>
                                <th colspan='2' bgcolor='#f9f9f9'>Needed Amount</th>
                                <th bgcolor='#f9f9f9'>Description</th>
                                <th bgcolor='#f9f9f9'>Date of Donation</th>
                                <th bgcolor='#f9f9f9'>Donor</th>
                            </tr>";
                            
                            foreach ($itemArray as $item) :

                                $need = $item['SponseeNeed'];
                                $status = $item['SponseeNeed']['status'];
                                $category = $item['Category'];
                                $addedBy = $item['AddedBy'];
                                $donation = $item['Donation'];

                                if ($prevCat != $category['id']) : ?>
                                    <tr>
                                        <th bgcolor="#eef6fa" colspan="9">
                                            <?php echo '<span class="category leftmargin1">'.$category['description'].'</span>'; ?>
                                        </th>
                                    </tr
                                <?php
                                $prevCat = $category['id'];
                                endif;
                                ?>
                                <tr>
                                    <?php if($status != 'CLOSED') : ?>
                                        <td style="width:30px; padding-left:30px;">
                                            <input type="checkbox" name="data[Items][][sponsee_need_id]"
                                                   value="<?php echo $need['id'] ?>"/>
                                        </td>
                                        <?php else: ?>
                                        <td style="width:30px; padding-left:30px;">
                                            <?php echo $this->Html->image('check.png'); ?>
                                        </td>
                                    <?php endif; ?>
                                    <td bgcolor="#fff" style="text-align: right;"><?php echo '<span class="neededamount">'.$this->Number->currency($need['neededamount']).'</span>'; ?></td>
                                    <td bgcolor="#fff"><?php echo '<span class="description">'.$need['description'].'</span>'; ?></td>
                                    <?php if($status != 'CLOSED') : ?>
                                        <td style="padding-left:30px;" colspan="2">
                                            <?php echo "<div>For how long?</div>"; ?>
                                            <?php echo "<div><div class='pull-left'>".$this->Form->input('month', array('label' => '', 'class' => 'span1', 'style'=>'text-align:right;'))."</div>"; ?>
                                            <?php echo "<div class='pull-left topmargin4 leftmargin1'>Months</div></div>"; ?>
                                        </td>
                                        <?php else: ?>
                                        <td>
                                            <?php echo $this->Time->format($donation['payment_date']); ?>
                                        </td>
                                        <td>
                                            <a href="#"><?php echo $donation['first_name'].' '.$donation['last_name']; ?></a>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                                <?php $ctr++;
                            endforeach;

                            echo '</table>';

                        endforeach;
                        ?>
                </div>
            </div>
            <div style="width:870px;" class="clearfix pull-left leftmargin2 topmargin1 footerstyle">
                <?php echo $this->Form->button('Proceed', array('type' => 'submit', 'class' => 'pull-right btn btn-info topmargin1 rightmargin1 btn-large')); ?>
            </div>
            <?php
            // ------- CLOSING FORM ------
            $this->Form->end();
            ?>
        </div>
    </div>
</div>