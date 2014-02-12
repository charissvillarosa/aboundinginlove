<style type="text/css">
    li {display:inline;}
    #mask {
      position:absolute;
      left:0;
      top:0;
      z-index:2000;
      background-color:#000;
      display:none;
    }
    .modal {
        padding:5px 10px;
        z-index:2010;
    }
    .dashedbox {
        border:dashed 1px #ccc;
        margin:20px;
        padding-bottom:20px;
        background:#eee;
    }
</style>
<div id="slider" class="banner">
    <ul id="slider1">
        <li>
            <?php
            echo $this->Html->image('sliders/image1.png');
            ?>
        </li>
        <li>
            <?php
            echo $this->Html->image('sliders/image2.png');
            ?>
        </li>
        <li>
            <?php
            echo $this->Html->image('sliders/image3.png');
            ?>
        </li>
    </ul>
</div>
<div class="container">
    <div class="row margin1">
        <div class="well span3">
            <div>
                <h4 class="fontcolor1">How We Works</h4>
                <hr>
                <p>
                    <span class="badge badge-info">1</span> Ipsum purus lobortis porttitor sit. Qui ut orci, suscipit pede vitae suspendisse sociis eu feugiat, sed massa amet, ac orci, posuere felis et. Qui ut orci, suscipit pede vitae suspendisse sociis eu feugiat, sed massa amet, ac orci, posuere felis et.<br><br>
                    <span class="badge badge-info">2</span> Eros integer massa phasellus magna donec neque. A wisi a, lorem venenatis varius malesuada vivamus aliquam.<br><br>
                    <span class="badge badge-info">3</span> Tortor in vel. Nibh id. Et ut morbi amet aliquam, sit suspendisse orci, in porta libero orci dolor. Morci, in porta libero orci dolor. Amet aliquam, sit suspendisse orci, in porta libero.<br><br>
                    <span class="badge badge-info">4</span> Tortor in vel. Nibh id. Et ut morbi amet aliquam, sit suspendisse orci, in porta libero orci dolor. Morci, in porta libero orci dolor. Amet aliquam, sit suspendisse orci, in porta libero.Sit suspendisse orci, in porta libero orci dolor. Morci, in porta libero orci dolor. Amet aliquam, sit suspendisse orci, in porta libero.<br>
                </p>
            </div>
            <div>
                <div class="pull-left">
                    <a href="https://www.paypal.com/us/verified/pal=mae%2ealolod%40avare%2dllc%2ecom" target="_blank">
                        <img src="https://www.paypal.com/en_US/i/icon/verification_seal.gif" border="0" width="90px" alt="Official PayPal Seal">
                    </a>
                </div>
                <div class="pull-left">
                    <?php
                        echo $this->Html->image('paypal.jpg', array('width' => '175px'));
                    ?>
                </div>
            </div>
        </div>
        <div class="well span8">
            <div>
                <div>
                    <div class="pull-left"><h4 class="fontcolor1">SPONSOR A CHILD TODAY</h4></div>
                    <div class="pull-right">
                        <?php echo $this->Html->link('View more', array('controller' => 'sponsees', 'action' => 'index'), array('class' => 'btn btn-info btn-large')); ?>
                    </div>
                </div>
                <?php
                foreach ($sponseeList as $item) :
                    $sponsee = $item['SponseeListingItem'];
                    $sponseeImage = $item['Image'];
                    ?>
                    <div class="pull-left topmargin1 box">
                        <div class="pull-left">
                            <?php
                            $imageURl = array(
                                'controller' => 'SponseeImages',
                                'action' => 'view',
                                $sponsee['id'], $sponseeImage['hash_key']
                            );
                            $attrs = array('alt' => '', 'width' => '165', 'class' => 'img-polaroid');
                            echo $this->Html->image($imageURl, $attrs);
                            ?>
                        </div>
                        <div class="pull-left leftmargin1">
                            <div class="pull-left span3">
                                <p>
                                    <p class="fontcolor1">
                                        <?php echo $sponsee['firstname'] . ' ' . $sponsee['lastname'] ?>
                                    </p>
                                    <p class="fontsize3"><?php $flag = "/img/flag/".$sponsee['country'].".png"; echo $this->Html->image("$flag"); echo ' ' . $sponsee['country']; ?> : <a href="<?php echo $sponsee['maplocation'] ?>" target="_blank">Map Location</a></p>
                                </p>
                                <p>
                                    <?php
                                    $info = $sponsee['long_description'];
                                    echo $this->Text->truncate($info, 150, array('exact' => false));
                                    ?>
                                </p>
                                <?php
                                $user = $this->Session->read('Auth.User');

                                if ($user && $user['role'] == 'admin') $value = "adminview";
                                else $value = "view";

                                echo $this->Html->link('Read more', array('controller' => 'sponsees', 'action' => $value, $sponsee['id']), array('class' => 'btn btn-info btn-small'));
                                ?>
                            </div>
                            <div class="rightfloat span2 verticalline">
                                <?php
                                    echo "<div class='fontcolor1 fontsize1 fontcolor2'><center><p>".$this->Number->toPercentage($sponsee['percentage'])." Raised </p></center></div>";
                                    echo "<div class='progress'><div class='bar' style='width:".$this->Number->toPercentage($sponsee['percentage'])."'></div></div>";
                                    echo "<div class='bottommargin2 fontcolor1 fontsize3'><p>".$this->Number->currency($sponsee['total_neededamount'], 'USD')." = Needed Amount</p></div>";
                                    echo "<div class='bottommargin2 fontcolor1 fontsize3'><p>".$this->Number->currency($sponsee['total_donatedamount'], 'USD')." = Donated Amount</p></div>";
                                    echo $this->Html->link('Donate Now!', array('controller' => 'donations', 'action' => 'view', $sponsee['id']), array('class' => 'btn btn-primary btn-block'));
                                ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<div>
    <div id="modal" class="modal">
        <div><a href="#" class="close">x</a></div>
        <div class="fontcolor1 fontsize1 topmargin1"><center>"Thank you for your donation."</center></div>
        <div class="fontcolor1 fontsize3 topmargin1">
            <center>
                Your transaction has been completed and notification has been emailed to you. You may
                log on to your abounding in love or paypal account to view details of this transaction.
            </center>
        </div>
        <div class="topmargin1 dashedbox">
            <ul>
                <li class="fontcolor1"><center><br>You want to share this organization on:</center></li>
                <center>
                    <li class="align"><a href="#" id="fb-btn"><?php echo $this->Html->image('fb.png');?></a></li>
                    <li style="position:relative; top:11px; left:0;">
                        <a href="https://twitter.com/share" class="twitter-share-button" data-related="jasoncosta" data-lang="en" data-size="large" data-count="none">Tweet</a>
                    </li>
                </center>
            </ul>
        </div>
    </div>
    <!-- Mask to cover the whole screen -->
    <div style="width: 1478px; height: 602px; display: none; opacity: 0.8;" id="mask"></div>
</div>

<script>
    $(document).ready(function() {

        var id = '#modal';

        //Get the screen height and width
        var maskHeight = $(document).height();
        var maskWidth = $(window).width();

        //Set heigth and width to mask to fill up the whole screen
        $('#mask').css({'width':maskWidth,'height':maskHeight});

        //transition effect
        $('#mask').fadeIn(700);
        $('#mask').fadeTo("slow",0.8);

        //transition effect
        $(id).fadeIn(2000);

	//if close button is clicked
	$('.modal .close').click(function (e) {
		//Cancel the link behavior
		e.preventDefault();

		$('#mask').hide();
		$('.modal').hide();
	});

	//if mask is clicked
	$('#mask').click(function () {
		$(this).hide();
		$('.modal').hide();
	});

    });


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

