<?php
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
            <li class="<?php echo $this->name == 'InviteFriends' ? 'active' : '' ?>">
                <?php echo $this->Html->link('Invite Friends', array('controller' => 'InviteFriends', 'action' => 'index')) ?>
            </li>
        </ul>
    </div>
    <div class="span9 well" style="padding:0 0 30px 0; background: #fff; margin-top:103px;">
        <div class="clearfix pull-left headerstyle">
            <div class="pull-left leftmargin2 bottommargin2">
                <p class="banner fontsize1">DONATION HISTORY</p>
            </div>
        </div>
        <div class="clearfix pull-left leftmargin2 width2">
            <?php
            $user = $this->Session->read('Auth.User');
            ?>
            <div>
                <div class="pull-left">
                <?php
                foreach ($sponseeList as $item) :
                    $sponseeImage = $item['Image'];
                endforeach;

                $imageURl = array('controller' => 'ProfileImages', 'action' => 'view', $user['id'], $sponseeImage['hash_key']);
                $attrs = array('alt' => '', 'width' => '190px', 'class' => 'img-polaroid');
                echo $this->Html->image($imageURl, $attrs);
                ?>
                </div>
                <div class="pull-left span6">
                    <h2 class="fontcolor1"><?php echo $user['firstname'] . ' ' . $user['lastname']; ?></h2>
                    <p>
                        Lorem ipsum dolor sit amet, orci sed quisque venenatis eget nullam ut, eget eros bibendum condimentum 
                        tellus suscipit non, eget viverra a pulvinar, wisi fringilla etiam at qui. Risus nullam libero gravida 
                        ligula, diam vivamus ullamcorper sit sapien, nulla id dolor semper nunc, felis nulla enim quam wisi 
                        lorem integer, fringilla sed accumsan mauris. Pellentesque sit.
                    </p>
                    <hr>
                </div>
                <div class="clearfix"></div>
            </div>
            <div>
                <div class="pull-left"><h4 class="fontcolor1">Donation Record</h4></div>
                <div class="pull-right">
                    <div class="pull-right leftmargin5">
                        <?php echo $this->Html->link('Donate any amount', array('controller'=>'donations', 'action' => 'donation'), array('class' => 'btn btn-info')); ?>
                    </div>
                    <div class="pull-right">
                        <?php echo $this->Html->link('Donate a sponsee', array('controller'=>'donations', 'action' => 'sponseedonation'), array('class' => 'btn btn-info')); ?>
                    </div>
                </div>
            </div>
            <div>
                <table width="100%" class="table table-hover table-bordered">
                    <tr>
                        <th>Reference No.</th>
                        <th>Date</th>
                        <th>Sponsored To</th>
                        <th>Sponsee Need</th>
                        <th>Amount</th>
                        <th>Status</th>
                    </tr>
                    <tr><th colspan="5">One Time Donation<th></tr>
                    <?php

                    foreach ($onetimedonationitems as $item) :

                        $donation = $item['DonationHistory'];
                        $sponsee = $item['SponseeListingItem'];
                        $need = $item['SponseeNeed'];

                        ?>
                        <tr>
                            <td><?php echo $donation['id'] ?></td>
                            <td style="text-align: center;"><?php echo $this->Time->format($donation['payment_date']) ?></td>
                            <td>
                                <?php
                                if($donation['donation_type']=='organization'){
                                    echo "Organization";
                                }
                                else{
                                    echo $sponsee['firstname'].' '.$sponsee['lastname'];
                                }
                                ?>
                            </td>
                            <td><?php echo $need['description']; ?></td>
                            <td style="text-align: right;"><?php echo $this->Number->currency($donation['amount']); ?></td>
                            <td><?php echo 'Completed'; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <div>
                <div class="pull-right">
                    <button class="btn"><?php echo $this->Paginator->prev('« Previous', null, null, array('class' => 'disabled')); ?></button>
                    <?php echo $this->Paginator->numbers(); ?>
                    <button class="btn"><?php echo $this->Paginator->next('Next »', null, null, array('class' => 'disabled')); ?></button>
                    <button class="btn"><?php echo $this->Paginator->counter(); ?></button>
                </div>
            </div>
            <div class="topmargin3">
                <table width="100%" class="table table-hover table-bordered">
                    <tr><th colspan="5">Monthly Donation<th></tr>
                    <?php
                    foreach ($monthlydonationitems as $item) :

                        $donation = $item['DonationHistory'];
                        $sponsee = $item['SponseeListingItem'];
                        $need = $item['SponseeNeed'];

                        ?>
                        <tr>
                            <td><?php echo $donation['id'] ?></td>
                            <td style="text-align: center;"><?php echo $this->Time->format($donation['payment_date']) ?></td>
                            <td>
                                <?php
                                if($donation['donation_type']=='organization'){
                                    echo "Organization";
                                }
                                else{
                                    echo $sponsee['firstname'].' '.$sponsee['lastname'];
                                }
                                ?>
                            </td>
                            <td><?php echo $need['description']; ?></td>
                            <td style="text-align: right;"><?php echo $this->Number->currency($donation['amount']); ?></td>
                            <td><?php echo 'Completed'; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <div>
                <div class="pull-right">
                    <button class="btn"><?php echo $this->Paginator->prev('« Previous', null, null, array('class' => 'disabled')); ?></button>
                    <?php echo $this->Paginator->numbers(); ?>
                    <button class="btn"><?php echo $this->Paginator->next('Next »', null, null, array('class' => 'disabled')); ?></button>
                    <button class="btn"><?php echo $this->Paginator->counter(); ?></button>
                </div>
            </div>
        </div>
        <div>
            <div class="leftmargin2 width2">
                <h4 class="fontcolor1">Queued Donation</h4>
                <div class="topmargin1">
                    <table width="100%" class="table table-hover table-bordered">
                        <tr>
                            <th>Months to Donate</th>
                            <th>Months Donated</th>
                            <th>Last Donation Date</th>
                            <th>Sponsee</th>
                            <th>Sponsee Need</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                        <?php foreach ($queueditems as $item) :
                            $donreq = $item['DonationRequest'];
                            $sponsee = $item['Sponsee'];
                            $need = $item['SponseeNeed'];

                        ?>
                            <tr>
                                <td><?php echo $donreq['no_of_months']; if($donreq['no_of_months'] > 1){echo " Months";} else{echo " Month";} ?></td>
                                <td><?php echo $donreq['months_completed']; if($donreq['months_completed'] > 1){echo " Months Completed";} else{echo " Month Completed";} ?></td>
                                <td><?php echo $this->Time->format($donreq['last_month_completed']); ?></td>
                                <td><?php echo $sponsee['firstname'].' '.$sponsee['lastname'];?></td>
                                <td><?php echo $need['description'] ?></td>
                                <td style="text-align: right;"><?php echo $this->Number->currency($donreq['total']); ?></td>
                                <td><?php echo 'Ongoing'; ?></td>
                                <td style="width:115px;">
                                    <?php echo $this->Html->link('Cancel', array('controller'=>'', 'action' => ''), array('class' => 'btn btn-info btn-small')); ?>
                                    <?php echo $this->Html->link('Pause', array('controller'=>'', 'action' => ''), array('class' => 'btn btn-info btn-small')); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <div>
                    <div class="clear pull-right">
                        <button class="btn"><?php echo $this->Paginator->prev('« Previous', null, null, array('class' => 'disabled')); ?></button>
                        <?php echo $this->Paginator->numbers(); ?>
                        <button class="btn"><?php echo $this->Paginator->next('Next »', null, null, array('class' => 'disabled')); ?></button>
                        <button class="btn"><?php echo $this->Paginator->counter(); ?></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>