<div class="span12">
    <div class="pull-left">
        <?php
        echo $this->Html->image('logo.png', array('width' => '300px'));
        ?>
    </div>
    <div class="pull-right topmargin2">
        <span id="home"><?php echo $this->Html->link('HOME', '/home'); ?></span>
        <span id="projects"><?php echo $this->Html->link('PROJECTS', '/projects'); ?></span>
        <span id="program"><?php echo $this->Html->link('PROGRAMS', '/programs'); ?></span>
        <?php if ($this->Session->read('Auth.User')) : ?>
            <span id="dashboard"><?php echo $this->Html->link('DASHBOARD', array('controller'=>'dashboard')); ?></span>
            <span id="logout"><?php echo $this->Html->link('LOGOUT', '/logout'); ?></span>
        <?php else : ?>
            <span id="register"><?php echo $this->Html->link('REGISTER', '/register'); ?></span>
            <span id="login"><a href="#loginModal" role="button" data-toggle="modal">LOGIN</a></span>
        <?php endif; ?>
    </div>
</div>