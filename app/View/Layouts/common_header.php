<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container pull-right">
            <ul class="nav">
                <li class="<?php echo $this->name == 'Home' ? 'active' : '' ?>">
                    <?php echo $this->Html->link('HOME', '/home'); ?>
                </li>
                <li class="<?php echo $this->name == 'Projects' ? 'active' : '' ?>">
                    <?php echo $this->Html->link('PROJECTS', '/projects'); ?>
                </li>
                <li class="<?php echo $this->name == 'Programs' ? 'active' : '' ?>">
                    <?php echo $this->Html->link('PROGRAMS', '/programs'); ?>
                </li>
                <li class="<?php echo $this->name == 'Donations' ? 'active' : '' ?>">
                    <?php echo $this->Html->link('DONATE NOW', array('controller' => 'donations', 'action' => 'listing')); ?>
                </li>
                <li class="<?php echo $this->name == 'Sponsees' ? 'active' : '' ?>">
                    <?php echo $this->Html->link('SPONSOR A CHILD', array('controller'=>'sponsees'));  ?>
                </li>
                <li class="<?php echo $this->name == 'Portfolio' ? 'active' : '' ?>">
                    <?php echo $this->Html->link('PORTFOLIO', array('controller' => 'portfolios', 'action' => 'index')); ?>
                </li>
                <li>
                    <a href="#" class="dropdown-toggle" 
                       rel="popover" 
                       data-toggle="popover" 
                       data-placement="bottom" 
                       data-toggle="popover"
                       data-content="
                       <p>Choose from the three options below to contact us online:</p>
                       <ul class='leftmargin1'>
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
                       title="CONTACT US">CONTACT US</a>
               </li>
                <?php if ($this->Session->read('Auth.User')) : ?>
                    <li class="<?php echo $this->name == 'Dashboard' ? 'active' : '' ?>">
                        <?php echo $this->Html->link('DASHBOARD', array('controller'=>'dashboard')); ?>
                    </li>
                    <li class="<?php echo $this->name == 'Users' ? 'active' : '' ?>">
                        <?php echo $this->Html->link('LOGOUT', '/logout'); ?>
                    </li>
                <?php else : ?>
                    <li class="<?php echo $this->name == 'Users' ? 'active' : '' ?>">
                        <?php echo $this->Html->link('REGISTER', '/register'); ?>
                    </li>
                   <li class="<?php echo $this->name == 'Login' ? 'active' : '' ?>">
                      <a href="#loginModal" role="button" data-toggle="modal">LOGIN</a>
                   </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>