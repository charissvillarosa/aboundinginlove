<div class="topmargin3 span11"> 
    <div class="pull-left span7 well">
        <div class="pull-right rightmargin2 banner"><h1 class="fontcolor1" style="font-size:30px;">Autem enim tellus</h1></div>
        <div class="clearfix pull-left">
            <hr>
            <p class="topmargin1">
                Vulputate wisi aenean elementum, accumsan nunc cras adipiscing odio, elit arcu ultricies quis,
                tellus commodo eget semper dolor vel rutrum. Eu felis, vivamus urna sagittis quam sit lorem.
                Ante suspendisse vel aliquam magna adipiscing nam, et potenti a sed viverra arcu.
            </p>
            <p class="topmargin1">
                Dui nascetur
                mauris sagittis eu et massa, eget placerat scelerisque varius viverra maecenas mattis, earum
                elit tincidunt urna convallis aliquam, lacus ullamcorper, nec a accumsan nibh mauris proin.
            </p>
            <p class="topmargin1">
                Vulputate wisi aenean elementum, accumsan nunc cras adipiscing odio, elit arcu ultricies quis,
                tellus commodo eget semper dolor vel rutrum. Eu felis, vivamus urna sagittis quam sit lorem.
                Ante suspendisse vel aliquam magna adipiscing nam, et potenti a sed viverra arcu.
            </p>
            <p class="topmargin1">
                Vulputate wisi aenean elementum, accumsan nunc cras adipiscing odio, elit arcu ultricies quis,
                tellus commodo eget semper dolor vel rutrum. Eu felis, vivamus urna sagittis quam sit lorem.
            </p>
            <p class="topmargin1">
                Vulputate wisi aenean elementum, accumsan nunc cras adipiscing odio, elit arcu ultricies quis,
                tellus.
            </p>
        </div>
    </div>
    <div class="span3">
        <?php echo $this->Session->flash(); ?>
        <?php echo $this->Session->flash("auth"); ?>
        <div style="background:#fafafa; width:230px;" class="pull-right well bottommargin1">
            <?php echo $this->Form->create("User"); ?>
            <div style="padding: 0px 15px 15px 5px;" class="modal-header">
                <h3 id="myModalLabel">Login</h3>
            </div>
            <fieldset>
                <div style="padding-left:0;" class="topmargin1">
                    <?php
                    echo $this->Form->input("username");
                    echo $this->Form->input("password");
                    ?>
                </div>
            </fieldset>
            <div>
                <div class="pull-right"><?php echo $this->Form->end("Login"); ?></div>
                <div class="pull-left" style="width:120px; margin:10px 0 0 0; font-style:italic; font-size:12px;"><?php echo $this->Html->link("Not yet register? Register now!", array('action' => 'register')); ?></div>
            </div>
            <script>
                $('#UserUsername').focus();
            </script>
        </div>
    </div>
 </div>