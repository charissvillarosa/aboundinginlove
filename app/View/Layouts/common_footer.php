<div class="span11">
    <div class="tree pull-left">
        <div class="span2 pull-right topmargin3">
            <p class="fontcolor1 leftmargin1 topmargin1">
                <?php echo $this->Html->link('About Us', array('controller' => 'pages', 'action' => 'aboutus')); ?>
            </p>
            <p class="fontcolor1 leftmargin1 topmargin1">
                <?php echo $this->Html->link("What we do?", array('controller' => 'pages', 'action' => 'whatwedo')); ?>
            </p>
            <p class="fontcolor1 leftmargin1 topmargin1"><a href="#">Portfolio</a></p>
            <p class="fontcolor1 leftmargin1 topmargin1">
                <a href="#"
                   rel="popover"
                   data-toggle="popover"
                   data-placement="left"
                   data-toggle="popover"
                   data-content="
                   <p>Choose from the three options below to contact us online:</p>
                   <ul>
                   <li><a href='#'>Questions</a></li>
                   <li><a href='#'>Feedback</a></li>
                   <li><a href='#'>Report Website Problem</a></li>
                   </ul>
                   <hr>
                   <h6>Phone Numbers: </h6>
                   <p class='leftmargin1'>(032)438-9390 / (032)438-9390</p>
                   <hr>
                   <p><b>Email : </b><span class='leftmargin1'>example@yahoo.com</span></p>
                   "
                   title="CONTACT US">Contact Us
                </a>
            </p>
        </div>
        <div class="span2 pull-right topmargin3">
            <p class="fontcolor1 leftmargin1 topmargin1"><?php echo $this->Html->link('Register', '/register'); ?></p>
            <p class="fontcolor1 leftmargin1 topmargin1"><?php echo $this->Html->link('Donate Now', array('controller' => 'donations', 'action' => 'listing')); ?></p>
            <p class="fontcolor2 leftmargin1 topmargin1">Sponsor a child</p>
            <ul>
                <li class="leftmargin1"><a href="#">List of Sponsees</a></li>
            </ul>
        </div>
        <div class="span2 pull-right topmargin3">
            <p class="fontcolor1 leftmargin1 topmargin1"><?php echo $this->Html->link('Home', '/home'); ?></p>
            <p class="fontcolor1 leftmargin1 topmargin1"><?php echo $this->Html->link('Projects', '/projects'); ?></p>
            <p class="fontcolor1 leftmargin1 topmargin1"><?php echo $this->Html->link('Programs', '/programs'); ?></p>
            <p class="fontcolor1 leftmargin1 topmargin1"><a href="#loginModal" role="button" data-toggle="modal">Login</a></p>
        </div>
    </div>
</div>