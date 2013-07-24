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
                       <h6>Address: </h6>
                        <p class='leftmargin1 fontsize3'>0-1765 Chicago Drive Jenison, MI 49428 USA</p>
                        <h6>Phone Number: </h6>
                        <p class='leftmargin1 fontsize3'>(616) 669-1640 </p>
                        <hr>
                        <h6>Email: </h6>
                        <p class='fontsize3 leftmargin1'>aboundinginlove@aboundinginlove.org</p>
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