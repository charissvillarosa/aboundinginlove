<style>
    .registration label {
        float: left;
        width: 150px;
    }

    .registration div.input {
        padding-top: 5px;
        padding-bottom: 5px;
    }

    .registration div.error-message {
        display: inline;
        margin-left: 5px;
    }
</style>

<div class="container">
    <div class="logincontent well">
        <div class="pull-right rightmargin2">
            <h3 class="fontcolor1 banner leftmargin2">
                Register Now!
            </h3>
        </div>
        <div class="clearfix"></div>
        <hr/>
        <?php if ($TOKEN_NOT_FOUND) : ?>
            <div class="alert alert-error text-center">
                <h3>Token Id not found or may have been used.</h3>
            </div>
        <?php else: ?>
            <?php echo $this->Session->flash(); ?>
            <?php echo $this->Form->create('User', array('class' => 'registration')); ?>
            <fieldset>
                <?php
                echo $this->Form->input('firstname');
                echo $this->Form->input('middlename');
                echo $this->Form->input('lastname');
                echo $this->Form->input('username');
                echo $this->Form->input('password');
                echo $this->Form->input('password_confirm', array('type' => 'password'));
                echo $this->Form->input('email');
                echo $this->Form->input('role', array('type' => 'hidden', 'value' => 'user'));
                ?>
            </fieldset>
            <?php echo $this->Form->end(__('Submit')); ?>
        <?php endif; ?>
    </div>
</div>