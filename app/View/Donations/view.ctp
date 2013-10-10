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
            <li class="<?php echo $this->name == 'PendingDonations' ? 'active' : '' ?>">
                <?php echo $this->Html->link('Pending Donations', array('controller' => 'PendingDonations', 'action' => 'index')) ?>
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
                            echo "<div class='bottommargin2'><b class='fontcolor1'>".$this->Number->currency($sponsee['total_donatedamount'], 'USD')."</b> = Donated</div>";
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
                    <h3 class="fontcolor1">NEEDS</h3>
                    <div class="overlayable">
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
                            echo "<table class='table table-hover table-bordered'>";
                            echo "
                                <tr>
                                    <th></th>
                                    <th>Need Amount</th>
                                    <th>Need</th>
                                </tr>
                            ";
                            $prevCat = 0;
                            foreach ($sponseeneeds as $item) :
                                $need = $item['SponseeNeed'];
                                $category = $item['Category'];
                                $status = $need['status'];

                                if ($prevCat != $category['id']) : ?>
                                    <tr>
                                        <th colspan="4">
                                            <?php echo $category['description'] ?>
                                        </th>
                                    </tr>
                                <?php
                                $prevCat = $category['id'];
                                endif;
                                ?>
                                <tr>
                                    <?php if($status != 'CLOSED') : ?>
                                    <td style="width:30px;">
                                        <input type="checkbox" name="data[Items][][sponsee_need_id]"
                                               value="<?php echo $need['id'] ?>"/>
                                    </td>
                                    <?php else: ?>
                                    <td style="width:30px;">
                                        <?php echo $this->Html->image('check.png'); ?>
                                    </td>
                                    <?php endif; ?>
                                    <td style="width: 50px; text-align: right; font-weight: bold;">
                                        <?php echo $this->Number->currency($need['neededamount']); ?>
                                    </td>
                                    <td>
                                        <?php echo $need['description'] ?>
                                    </td>
                                </tr>
                            <?php
                            endforeach;

                            echo "</table>";
                        }
                        echo '<div id="error"></div>';
                        ?>
                        <?php echo $this->Session->flash(); ?>
                        <div class="modal-backdrop overlay hide"></div>
                    </div>
                </div>
            </div>
            <div style="width:870px;" class="clearfix pull-left leftmargin2 topmargin1 footerstyle">
                <?php echo $this->Form->button('Proceed', array('class' => 'pull-right btn btn-info topmargin1 rightmargin1 btn-large')); ?>
            </div>
            <?php
            // ------- CLOSING FORM ------
            $this->Form->end();
            ?>
        </div>
    </div>
</div>