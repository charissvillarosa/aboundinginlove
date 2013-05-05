<div class="logincontent">
    <div style="margin-bottom:20px; width:550px;" class="pull-left">
        <p>
            <?php echo $this->Html->image('smalllogo.png', array('alt' => 'logo')); ?>
            <b class="fontcolor1 fontsize2">Lorem ipsum dolor sit</b>
        </p>
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
    </div>
    <div style="margin-bottom:20px; width:250px;" class="users form">
        <?php echo $this->Session->flash(); ?>
        <?php echo $this->Session->flash("auth"); ?>
        <?php echo $this->Form->create("User"); ?>
        <div class="modal-header">
            <h3 id="myModalLabel">Login</h3>
        </div>
        <fieldset>
            <?php
            echo $this->Form->input("username");
            echo $this->Form->input("password");
            ?>
        </fieldset>
        <?php echo $this->Form->end("Login"); ?>
        <script>
            $('#UserUsername').focus();
        </script>
    </div>
</div>