<style>
    .span11 {width:1105px;}
</style>
<div class="clearfix container">
    <?php
    $user = $this->Session->read('Auth.User');
    $controller = $this->name;

    if ($user && $user['role'] == 'admin') :
    ?>
        <div class="navbar navbar-static-top" style="margin: -1px -1px 0;">
            <div class="navbar-inner">
                <div class="container" style="width: auto; padding: 0 20px;">
                    <ul class="nav">
                        <li class="divider-vertical"></li>
                        <li class="<?php echo $controller == 'Sponsees' ? 'active' : '' ?>">
                            <?php echo $this->Html->link('Sponsees', array('controller'=>'sponsees', 'action'=>'index')); ?>
                        </li>
                        <li class="divider-vertical"></li>
                        <li class="<?php echo $controller == 'Users' ? 'active' : '' ?>">
                            <?php echo $this->Html->link('Users', array('controller'=>'users', 'action'=>'index')); ?>
                        </li>
                        <li class="divider-vertical"></li>
                        <li class="<?php echo $controller == 'SponseeNeedCategories' ? 'active' : '' ?>">
                            <?php echo $this->Html->link('Need Categories', array('controller'=>'SponseeNeedCategories', 'action'=>'listing')); ?>
                        </li>
                        <li class="divider-vertical"></li>
                        <li class="<?php echo $controller == 'PortfolioCategories' ? 'active' : '' ?>">
                            <?php echo $this->Html->link('Portfolio Categories', array('controller'=>'PortfolioCategories', 'action'=>'listing')); ?>
                        </li>
                        <li class="divider-vertical"></li>
                        <li class="<?php echo $controller == 'DonationHistory' ? 'active' : '' ?>">
                            <?php echo $this->Html->link('Donations', array('controller'=>'DonationHistory', 'action'=>'listing')); ?>
                        </li>
                        <li class="divider-vertical"></li>
                        <li class="<?php echo $controller == 'SendUpdate' ? 'active' : '' ?>">
                            <?php echo $this->Html->link('Send Update Email', array('controller'=>'SendUpdate', 'action'=>'listing')); ?>
                        </li>
                        <li class="divider-vertical"></li>
                        <li class="<?php echo $controller == 'InviteFriends' ? 'active' : '' ?>">
                            <?php echo $this->Html->link('Invites', array('controller'=>'InviteFriends', 'action'=>'listing')); ?>
                        </li>
                        <li class="divider-vertical"></li>
                    </ul>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="navbar navbar-static-top" style="margin: -1px -1px 0;">
            <div class="navbar-inner">
                <div class="container" style="width: auto; padding: 0 20px;">
                    <ul class="nav">
                        <li class="divider-vertical"></li>
                        <li class="<?php echo $controller == 'Profile' ? 'active' : '' ?>">
                            <?php echo $this->Html->link('Donor Profile', array('controller' => 'Profile', 'action' => 'index')) ?>
                        </li>
                        <li class="divider-vertical"></li>
                        <li class="<?php echo $controller == 'DonationHistory' ? 'active' : '' ?>">
                            <?php echo $this->Html->link('Donation History', array('controller' => 'DonationHistory', 'action' => 'index')) ?>
                        </li>
                        <li class="divider-vertical"></li>
                        <li class="<?php echo $controller == 'InviteFriends' ? 'active' : '' ?>">
                            <?php echo $this->Html->link('Invite Friends', array('controller' => 'InviteFriends', 'action' => 'index')) ?>
                        </li>
                        <li class="divider-vertical"></li>
                    </ul>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

<div class="container tabs">
    <div class="headerstyle banner">
        <div class="leftmargin1"><p class="fontsize1">DONATION HISTORY</p></div>
    </div>
    <div class="topmargin1 span12 bottommargin1">
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
            <div class="pull-left span9">
                <h2 class="fontcolor1"><?php echo $user['firstname'] . ' ' . $user['lastname']; ?></h2>
                <hr style="border:dashed 1px #ccc;">
                <p>
                    Lorem ipsum dolor sit amet, orci sed quisque venenatis eget nullam ut, eget eros bibendum condimentum
                    tellus suscipit non, eget viverra a pulvinar, wisi fringilla etiam at qui. Risus nullam libero gravida
                    ligula, diam vivamus ullamcorper sit sapien, nulla id dolor semper nunc, felis nulla enim quam wisi
                    lorem integer, fringilla sed accumsan mauris. Pellentesque sit.
                </p>
            </div>
            <div class="clearfix"></div>
        </div>
        <div>
            <div style="margin-left:0;" class="span11">
                <div class="pull-left topmargin1"><h4 class="fontcolor1">Donation Record</h4></div>
                <div class="pull-right topmargin1">
                    <div class="pull-right leftmargin5">
                        <?php echo $this->Html->link('Donate any amount', array('controller'=>'donations', 'action' => 'donation'), array('class' => 'btn btn-info')); ?>
                    </div>
                    <div class="pull-right">
                        <?php echo $this->Html->link('Donate a sponsee', array('controller'=>'donations', 'action' => 'sponseedonation'), array('class' => 'btn btn-info')); ?>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div style="margin-left:0;" class="span11">
                <table width="100%" class="table table-hover table-bordered">

                    <tr><th colspan="5">One Time Donation<th></tr>
                    <tr>
                        <th>Reference No.</th>
                        <th>Date</th>
                        <th>Sponsored To</th>
                        <th>Sponsee Need</th>
                        <th>Amount</th>
                        <th>Status</th>
                    </tr>
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
                            <td style="text-align: right;"><?php echo $this->Number->currency($donation['payment_gross']); ?></td>
                            <td><?php echo 'Completed'; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <div style="margin-left:0;" class="span11">
                <div class="pull-right">
                    <button class="btn"><?php echo $this->Paginator->prev('« Previous', null, null, array('class' => 'disabled')); ?></button>
                    <?php echo $this->Paginator->numbers(); ?>
                    <button class="btn"><?php echo $this->Paginator->next('Next »', null, null, array('class' => 'disabled')); ?></button>
                    <button class="btn"><?php echo $this->Paginator->counter(); ?></button>
                </div>
            </div>
            <div style="margin-left:0;" class="topmargin1 span11">
                <table width="100%" class="table table-hover table-bordered">

                    <tr><th colspan="5">Monthly Donation<th></tr>
                    <tr>
                        <th>Reference No.</th>
                        <th>Date</th>
                        <th>Sponsored To</th>
                        <th>Sponsee Need</th>
                        <th>Amount</th>
                        <th>Status</th>
                    </tr>

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
                            <td style="text-align: right;"><?php echo $this->Number->currency($donation['payment_gross']); ?></td>
                            <td><?php echo 'Completed'; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <div style="margin-left:0;" class="span11">
                <div class="pull-right">
                    <button class="btn"><?php echo $this->Paginator->prev('« Previous', null, null, array('class' => 'disabled')); ?></button>
                    <?php echo $this->Paginator->numbers(); ?>
                    <button class="btn"><?php echo $this->Paginator->next('Next »', null, null, array('class' => 'disabled')); ?></button>
                    <button class="btn"><?php echo $this->Paginator->counter(); ?></button>
                </div>
            </div>
            <div style="margin-left:0;" class="span11">
                <h4 class="fontcolor1">Queued Donation</h4>
                <div class="topmargin1">
                    <table width="100%" class="table table-hover table-bordered">
                        <tr>
                            <th>Months to Donate</th>
                            <th>Months Donated</th>
                            <th>Reference No. - Last Donation Date</th>
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
            </div>
            <div style="margin-left:0;" class="span11">
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