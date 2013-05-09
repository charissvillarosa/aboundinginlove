<div class="container tabs">
    <div class="span11 margin3 leftmargin1">
        <div class="pull-right">
            <?php echo $this->Html->link('Go back to Sponsee List', array('action' => 'index'), array('class' => 'btn btn-info btn-small')); ?>
        </div>
        <div style="background:#f9f9f9;" class="pull-left span10 well leftmargin2 topmargin1">
            <h4 class="fontcolor1"><?php echo __('View User record'); ?></h4>
            <hr>
            <div class="pull-left">
                <?php
                $imageURl = 'sponsees/nophoto.jpg';
                $attrs = array('alt' => '', 'width' => '300', 'class' => 'img-polaroid');
                echo $this->Html->image($imageURl, $attrs);
                ?>
            </div>
            <div class="pull-left leftmargin3">
                <h3>
                    <b class="fontcolor1">
                        <?php echo $user['firstname'] . ' ' . $user['middlename'] . ' ' . $user['lastname'] ?>
                    </b>
                </h3>
                <p>
                    Address : 
                    <?php echo $user['firstname'] ?>
                </p>
                <p>
                    Country : 
                    <?php echo $user['country'] ?>
                </p>
                <p>
                    Username : 
                    <?php echo $user['username'] ?>
                </p>
                <p>
                    Password : 
                    <?php echo $user['password'] ?>
                </p>
                <p>
                    Date Created : 
                    <?php echo $user['created'] ?>
                </p>
                <p>
                    Date Modified : 
                    <?php echo $user['modified'] ?>
                </p>
            </div>
        </div>
    </div>
</div>
