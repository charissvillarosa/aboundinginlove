<style>
    .menulist li.align{
        position: relative;
        top: -11px;
    }

    .menulist li{
        list-style:none;
	display:inline;
    }
</style>
<div class="container topmargin3">
    <div class="dropdown clearfix span2">
        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="display: block; position: static; margin-bottom: 5px; *width: 180px;">
            <li class="<?php echo $this->name == 'Profile' ? 'active' : '' ?>">
                <?php echo $this->Html->link('Account Settings', array('controller' => 'Profile', 'action' => 'index')) ?>
            </li>
            <li class="<?php echo $this->name == 'DonationHistory' ? 'active' : '' ?>">
                <?php echo $this->Html->link('Donation History', array('controller' => 'DonationHistory', 'action' => 'index')) ?>
            </li>
            <li class="<?php echo $this->name == 'InviteFriends' ? 'active' : '' ?>">
                <?php echo $this->Html->link('Invite Friends', array('controller' => 'InviteFriends', 'action' => 'index')) ?>
            </li>
        </ul>
    </div>
    <div class="span9 well" style="padding:0 0 30px 0; background: #fff;">
        <div class="clearfix pull-left headerstyle">
            <div class="pull-left leftmargin2 bottommargin2 banner">
                <p class="fontsize1">INVITE FRIENDS</p>
            </div>
        </div>
        <div class="clearfix pull-left leftmargin2 span8">
            <div class="leftmargin2">
                <ul class="menulist" style="border-bottom:solid 1px #eee;">
                    <li class="align"><a href="#"><?php echo $this->Html->image('email.jpg');?></a></li>
                    <li class="align"><a href="#" id="fb-btn"><?php echo $this->Html->image('fb.jpg');?></a></li>
                    <li>
                        <!--<a id="twitter-btn"
                            href="https://twitter.com/share" 
                            class="twitter-share-button" style="visibility: hidden"
                            data-text="Join AboundingInLove.org now and make a difference!"
                            data-size="large" data-dnt="true">
                                 Tweet
                         </a>-->
                        <a href="https://twitter.com/share" class="twitter-share-button" data-related="jasoncosta" data-lang="en" data-size="large" data-count="none">Tweet</a>
                        <!--<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>-->
                    </li>
                </ul>
                <div class="tab-content topmargin1">
                    <div class="tab-pane leftmargin1" id="tab1">
                        <p>TWITTER</p>
                    </div>
                    <div class="tab-pane leftmargin1" id="tab2">
                        <p>FACEBOOK</p>
                    </div>
                    <div class="tab-pane active leftmargin1" id="tab3">
                        <?php echo $this->Form->create('InviteFriend', array('action' => 'sendMail')); ?>
                        <div style="padding-left:7px;">
                            <p class="fontsize1 bottommargin3">Email Friends</p>
                            <?php echo $this->Session->flash(); ?>
                            <?php echo $this->Form->label('To: *'); ?>
                            <?php echo $this->Form->textarea('to', array('class' => 'span4')); ?>
                        </div>
                        <div style="padding-left:7px;">
                            <?php echo $this->Form->label('Message: '); ?>
                            <?php
                            $defaultMessage = "
AboundingInLove.org gives chance to children with disabilities to live a normal life.

You can join and sponsor a child or give donation to help the children live a normal life.

Join now!

-- $user[firstname]
                                ";

                            echo $this->Form->textarea('message', array('class' => 'span5', 'rows' => '8', 'value' => trim($defaultMessage)));
                            ?>
                        </div>
                        <?php echo $this->Form->end(__('Send invitations')); ?>
                    </div>
                </div>
            </div>
            <div class="leftmargin2">
                <div class="topmargin1">
                    <div style="width:150px;" class="pull-left"><h3 class="fontcolor1">Invite Activity</h3></div>
                    <div style="width:500px;" class="pull-right topmargin1">
                        <?php echo $this->Form->create('', array('type' => 'GET')); ?>
                        <div class="pull-right banner">
                            <div class="pull-left topmargin7">
                                <p>Search by:</p>
                            </div>
                            <div class="pull-left">
                                <?php
                                echo $this->Form->input('cat', array(
                                    'label' => '',
                                    'class' => 'span3',
                                    'value' => $category,
                                    'options' => array('' => 'All', 'email' => 'Email', 'facebook' => 'Facebook', 'twitter' => 'Twitter')));
                                ?>     
                            </div>
                            <div class="pull-left topmargin7">
                                <button type="submit" class="btn btn-info"><i class="icon-search"></i> Search</button>
                            </div>
                        </div>
                        <?php echo $this->Form->end(); ?>
                    </div>
                </div>
                <table class="table table-hover table-bordered topmargin1">
                    <tr>
                        <th>No</th>
                        <th>Date Invited</th>
                        <th>To</th>
                        <th>Sent via</th>
                        <th>Status</th>
                    </tr>
                    <?php
                    $ctr = 1;
                    foreach ($list as $item) :
                        $invite = $item['InviteFriend'];
                        ?>
                        <tr>
                            <td><?php echo $ctr; ?></td>
                            <td><?php echo $this->Time->format($invite['created']) ?></td>
                            <td><?php echo $invite['to'] ?></td>
                            <td><?php echo $invite['type'] ?></td>
                            <td>
                            <?php 
                                if ($invite['type'] == 'email'){ echo $invite['status']; }
                                else {
                                    if($invite['clicks'] > 1) echo $invite['clicks'] . ' clicks';
                                    else echo $invite['clicks'] . ' click';
                                }
                            ?>
                            </td>
                        </tr>
                        <?php
                        $ctr++;
                    endforeach;
                    ?>
                </table>
                <div>
                    <button class="btn"><?php echo $this->Paginator->prev('« Previous', null, null, array('class' => 'disabled')); ?></button>
                    <?php echo $this->Paginator->numbers(); ?>
                    <button class="btn"><?php echo $this->Paginator->next('Next »', null, null, array('class' => 'disabled')); ?></button>
                    <button class="btn"><?php echo $this->Paginator->counter(); ?></button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // init social media buttons
    (function() {
        var tokenId = '<?php echo Security::hash(Security::generateAuthKey(), 'md5') ?>';
        var joinUrl = '<?php echo Configure::read('invite.join.url') ?>';
        var postURL = '<?php echo $this->Html->url('saveInvite', true) ?>';
        var getURL = '<?php echo $this->Html->url('index', true) ?>';

        var joinLink = [joinUrl, '?tokenId=', tokenId].join('');

        // load twitter button
        $.getScript("http://platform.twitter.com/widgets.js", function() {
            function handleTweetEvent(event) {
                if (event) {
                    $.post(postURL, {tokenId: tokenId, type: 'twitter'})
                    .done(function(resp) {
                        reloadPage();
                    })
                    .fail(function(xhr) {
                        alert('Failed to process twitter tweet.');
                    });
                }
            }
            twttr.events.bind('tweet', handleTweetEvent);
            $('#twitter-btn').css('visibility', 'visible');
        });

        // load fb api
        window.fbAsyncInit = function() {
            FB.init({
                appId      : '<?php echo Configure::read('facebook.api.key') ?>',
                channelUrl : '//aboundinginlove.org',
                status     : true
                //xfbml      : true
            });
        };

        $.getScript("//connect.facebook.net/en_US/all.js", function(){
            $('#fb-btn').click(shareOnFb).css('visibility', 'visible');
        });

        function shareOnFb() {
            FB.ui({
                method     : 'feed',
                name       : 'Abounding in Love Organization',
                link       : joinLink,
                picture    : 'http://projects.avare-llc.com/aboundinginloveorig/app/webroot/img/aboundinginlove_logo.png',
                caption    : 'Join AboundingInLove.org',
                description: 'Join now and make a difference!'
            },
            function(response) {
                if (response && response.post_id) {
                    $.post(postURL, {tokenId: tokenId, type: 'facebook'})
                    .done(function(resp) {
                        reloadPage();
                    })
                    .fail(function(xhr) {
                        alert('Failed to process facebook post.');
                    });
                }
            });
        }


        // reload page
        function reloadPage() {
            //$('body').load(getURL);
            window.location.reload();
        }

        // initialize
        $(function() {
            $('#twitter-btn').attr('data-url', joinLink);
        });
    })();
</script>