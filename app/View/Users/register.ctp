<style>
    .registration label {
        float: left;
        width: 150px;
        padding-left:25px;
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
        <div class="pull-left topmargin2 span4">
            <h3 class="fontcolor1">Lorem ipsum met fusce</h3>
             <ul>
                 <li>Lorem ipsum dolor sit amet, ante fusce porttitor augue, turpis wisi, vestibulum tortornisl accumsan, sapien eu, lacus posuere. </li>
                 <li>Ac porta nunc, in tincidunt lorem maecenas egestas est. </li>
             </ul>
             <?php echo $this->html->image('join.jpg', array('width' => '490'))?>
        </div>
        <div style="border-left:solid 1px #eee;" class="pull-right  span5">
            <h3 class="fontcolor1 banner leftmargin2">
                Register Now!
            </h3>
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
                    echo $this->Form->input('country', array('type'=>'select','options'=>$countryList));
                    echo $this->Form->input('password');
                    echo $this->Form->input('password_confirm', array('type' => 'password'));
                    echo $this->Form->input('email');
                    echo $this->Form->input('role', array('type' => 'hidden', 'value' => 'user'));
                    ?>
                </fieldset>
                <div class="leftmargin1"><?php echo $this->Form->end(__('Submit')); ?></div>
            <?php endif; ?>
        </div>
    </div>
</div>