<?php
// ----- LOAD OBJECTS ------
$user = $this->Session->read('Auth.User');
?>

<div class="container">
    <div class="dropdown clearfix span2 topmargin3">
        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="display: block; position: static; margin-bottom: 5px; *width: 180px;">
            <li class="<?php echo $this->name == 'Profile' ? 'active' : '' ?>">
                <?php echo $this->Html->link('Donor Profile', array('controller' => 'Profile', 'action' => 'index')) ?>
            </li>
            <li class="<?php echo $this->name == 'DonationHistory' ? 'active' : '' ?>">
                <?php echo $this->Html->link('Donation History', array('controller' => 'DonationHistory', 'action' => 'index')) ?>
            </li>
            <li class="<?php echo $this->name == 'Donations' ? 'active' : '' ?>">
                <?php echo $this->Html->link('Pending Donations', array('controller' => 'Donations', 'action' => 'pendingdonation')) ?>
            </li>
            <li class="<?php echo $this->name == 'InviteFriends' ? 'active' : '' ?>">
                <?php echo $this->Html->link('Invite Friends', array('controller' => 'InviteFriends', 'action' => 'index')) ?>
            </li>
        </ul>
    </div>
    <div class="span9 well" style="padding:0 0 30px 0; background: #fff; margin-top:103px;">
        <div class="clearfix pull-left headerstyle">
            <div class="pull-left leftmargin2 bottommargin2">
                <p class="banner fontsize1">PENDING DONATIONS</p>
            </div>
        </div>
        <div class="clearfix pull-left leftmargin2 width2">
            <table width="100%" class="table table-hover table-bordered">
                <tr>
                    <th>Created</th>
                    <th>Sponsee</th>
                    <th>Donation Method</th>
                    <th>Sponsee Needs = Needed Amount</th>
                    <th>Status</th>
                    <th>View</th>
                </tr>
                <?php
                    if(empty($donation)){
                        echo"
                            <tr>
                                <td colspan='6'>No pending donation records.</td>
                            </tr>
                        ";
                    }else{
                ?>
                <?php
                    foreach ($donation as $item) :
                        $sponseeDonation = $item['SponseeDonation'];
                        $sponsee = $item['Sponsee'];
                        $sponseeneeds = $item['Items'];
                ?>
                <tr>
                    <td><?php echo $this->Time->format($sponseeDonation['created'])?></td>
                    <td><?php echo $sponsee['firstname'].' '.$sponsee['middlename'].' '.$sponsee['lastname']?></td>
                    <td>
                    <?php
                        if($sponseeDonation['donation_method'] == 'onetime'){echo "One Time Donation";}
                        elseif($sponseeDonation['donation_method'] == 'monthly'){
                            echo "Monthly Donation";
                            echo "<br>From: ".$this->Time->format($sponseeDonation['from']);
                            echo "<br>To: ".$this->Time->format($sponseeDonation['to']);
                        }
                        else{echo "Not yet specified";}
                    ?>
                    </td>
                    <td>
                        <?php
                            foreach ($sponseeneeds as $items) :
                                $need = $items['SponseeNeed'];
                                echo $need['description'].' = '.$this->Number->currency($need['neededamount']).'<br>';
                            endforeach;
                        ?>
                    </td>
                    <td><?php if($sponseeDonation['status'] == 'pending') {echo "Pending";} ?></td>
                    <td>
                        <i>
                            <?php
                                if($sponseeDonation['donation_method'] != ''){
                                    echo $this->Html->link('', array('action' => 'confirmdonation', $sponsee['id']), array('class' => 'icon-folder-open','title' => 'View Details'));
                                }
                                else{
                                    echo $this->Html->link('', array('action' => 'donationmethod', $sponsee['id']), array('class' => 'icon-folder-open','title' => 'View Details'));
                                }
                            ?>
                        </i>
                    </td>
                </tr>
                <?php endforeach; }?>
            </table>
        </div>
    </div>
</div>