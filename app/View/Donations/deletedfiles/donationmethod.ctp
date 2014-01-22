<?php
// ----- LOAD OBJECTS ------
$user = $this->Session->read('Auth.User');
$sponsee = $donation['Sponsee'];
$sponseeImage = $sponsee['Image'];
$sponseeneeds = $donation['Items'];
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

    .container form div.message {
        padding-left: .5em;
    }

    .container form .monthly-opt select[id*=Day]  { width: 60px; }
    .container form .monthly-opt select[id*=Year] { width: 70px; }

    .container form .monthly-opt select {
        width: 120px;
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
        <div style="padding:0 10px 0 0;" class="clearfix pull-left headerstyle">
            <div class="pull-left leftmargin2 bottommargin2">
                <p class="fontsize1 banner topmargin1">DONATIONS</p>
            </div>
            <div class="pull-right">
                <div style="position:relative; top:0px; right:0;">
                    <div id="donationmethod"></div>
                </div>
            </div>
        </div>
        <div class="clearfix pull-left">
            <?php
            // ----- FORM BLOCK ---------
            echo $this->Form->create('SponseeDonation', array('url' => array('controller' => 'donations', 'action' => 'donationmethod', $sponsee['id'])));
            ?>
            <div class="pull-left topmargin1 span3">
                <?php
                        $imageURl = array('controller' => 'SponseeImages', 'action' => 'view', $sponsee['id'], $sponseeImage['hash_key']);
                        $attrs = array('alt' => '', 'width' => '300', 'class' => 'img-polaroid');
                        echo $this->Html->image($imageURl, $attrs);
                ?>
                <center><h3 class="fontcolor1"><?php echo strtoupper($sponsee['firstname'] . ' ' . $sponsee['lastname']) ?></h3></center>
            </div>
            <div class="pull-left">
                <div class="pull-left span5 topmargin1">
                    <div>
                        <?php echo $this->Session->flash(); ?>
                        <div class="pull-left">
                            <p class="fontcolor1"><b>Donation Method</b></p>
                            <?php
                                echo $this->Form->input('donation_method', array(
                                    'label' => '',
                                    'class' => 'span2',
                                    'options' => array('onetime' => 'One Time Donation', 'monthly' => 'Monthly Donation')
                                ));
                            ?>
                        </div>
                        <div class="pull-right monthly-opt hide">
                            <label class="fontcolor1"><strong>From:</strong> [ month - day - year ]</label>
                            <?php echo $this->Form->dateTime('from', 'MDY', null);?>
                            <label class="fontcolor1"><strong>To:</strong> [ month - day - year ]</label>
                            <?php echo $this->Form->dateTime('to', 'MDY', null);?>
                        </div>
                    </div>
                    <div class="clearfix topmargin1">
                        <div class="pull-left"><p class="fontcolor1"><b>Categories</b></p></div>
                        <div class="pull-right"><p class="fontcolor1"><b>Donated Amount</b></p></div>
                    </div>
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
                            $prevCat = 0;
                            $ctr = 1;
                            $total = 0;
                            foreach ($sponseeneeds as $item) :
                                $need = $item['SponseeNeed'];
                                $category = $need['Category'];
                                $status = $need['status'];
                                $total = $total + $need['neededamount'];

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
                                    <td>
                                        <span class="pull-left rightmargin1"><?php echo $ctr.'.'; ?></span>
                                        <span class="pull-left"><?php echo $need['description'] ?></span>
                                        <span class="pull-right"><?php echo $this->Number->currency($need['neededamount']) ?></span>
                                    </td>
                                </tr>
                            <?php
                            $ctr++;
                            endforeach;
                            $formattotal = $this->Number->currency($total);
                            echo "
                                <tr>
                                    <td style='text-align:right'; colspan='4'><span class='rightmargin1'><strong>TOTAL DONATION:</strong></span><strong>$formattotal<strong></td>
                                </tr>
                            </table>";
                        }
                        echo '<div id="error"></div>';
                        ?>

                        <div class="modal-backdrop overlay hide"></div>
                    </div>
                </div>
            </div>
            <div class="clearfix pull-left leftmargin2 topmargin1 footerstyle">
                <?php echo $this->Form->button('Proceed', array('class' => 'pull-right btn btn-info topmargin1 rightmargin1 btn-large')); ?>
                <?php echo $this->Html->link('Cancel',
                        array('controller'=>'Donations', 'action'=>'cancel', $sponsee['id']),
                        array('class' => 'pull-right btn btn-info topmargin1 rightmargin1 btn-large'),
                        'Sorry to see you go. Are you sure you want to cancel this donation?');
                ?>
            </div>
            <?php
            // ------- CLOSING FORM ------
            $this->Form->end();
            ?>
        </div>
    </div>
</div>

<script>
    // this script handles event when
    // the DonationMethod's value is changed
    $('[id*=DonationMethod]').click(function() {
        if ($(this).val() === 'monthly') {
            $('.monthly-opt').fadeIn();
        }
        else {
            $('.monthly-opt')
                    .fadeOut()
                    .find('select')
                    .val('');
        }
    }).trigger('click');
</script>