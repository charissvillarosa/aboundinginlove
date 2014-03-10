<?php

$user = $this->Session->read('Auth.User');
$controller = $this->name;

$folderViewUrl = $this->Html->url(array(
    'controller' => 'PortfolioImageFolders',
    'action' => 'view'
));

?>


<style>
    .thumbnails > li {
        width: auto;
    }
</style>

<div style="margin-top:60px;" class="clearfix container tabs">
    <?php

    if ($user && $user['role'] == 'admin') :

    ?>
    <div class="navbar navbar-static-top" style="margin: -1px -1px 0;">
        <div class="navbar-inner">
            <div class="container" style="width: auto; padding: 0 20px;">
                <ul class="nav">
                    <li class="divider-vertical"></li>
                    <li class="<?php echo $controller == 'Sponsees' ? 'active' : '' ?>">
                        <?php echo $this->Html->link('Sponsees', array('controller' => 'sponsees', 'action' => 'index')); ?>
                    </li>
                    <li class="divider-vertical"></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Categories <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li class="<?php echo $controller == 'SponseeNeedCategories' ? 'active' : '' ?>">
                                <?php echo $this->Html->link('Need Categories', array('controller' => 'SponseeNeedCategories', 'action' => 'listing')); ?>
                            </li>
                            <li class="<?php echo $controller == 'PortfolioCategories' ? 'active' : '' ?>">
                                <?php echo $this->Html->link('Portfolio Categories', array('controller' => 'PortfolioCategories', 'action' => 'listing')); ?>
                            </li>
                        </ul>
                    </li>
                    <li class="divider-vertical"></li>
                    <li class="<?php echo $controller == 'Users' ? 'active' : '' ?>">
                        <?php echo $this->Html->link('Users', array('controller' => 'users', 'action' => 'index')); ?>
                    </li>
                    <li class="divider-vertical"></li>
                    <li class="<?php echo $controller == 'DonationHistory' ? 'active' : '' ?>">
                        <?php echo $this->Html->link('Donations', array('controller' => 'DonationHistory', 'action' => 'listing')); ?>
                    </li>
                    <li class="divider-vertical"></li>
                    <li class="<?php echo $controller == 'SendUpdate' ? 'active' : '' ?>">
                        <?php echo $this->Html->link('Send Update Email', array('controller' => 'SendUpdate', 'action' => 'listing')); ?>
                    </li>
                    <li class="divider-vertical"></li>
                    <li class="<?php echo $controller == 'InviteFriends' ? 'active' : '' ?>">
                        <?php echo $this->Html->link('Invites', array('controller' => 'InviteFriends', 'action' => 'listing')); ?>
                    </li>
                    <li class="divider-vertical"></li>
                </ul>
            </div>
        </div>
    </div>
    <?php else: ?>
    <div class="navbar navbar-static-top" style="margin: -1px -1px 0;">
        <div class="navbar-inner">
            <div class="container" style="width: auto; padding: 0 20px;">
                <ul class="nav">
                    <li class="divider-vertical"></li>
                    <li class="<?php echo $controller == 'Profile' ? 'active' : '' ?>">
                        <?php echo $this->Html->link('Donor Profile', array('controller' => 'Profile', 'action' => 'index')) ?>
                    </li>
                    <li class="divider-vertical"></li>
                    <li class="<?php echo $controller == 'DonationHistory' ? 'active' : '' ?>">
                        <?php echo $this->Html->link('Donation History', array('controller' => 'DonationHistory', 'action' => 'index')) ?>
                    </li>
                    <li class="divider-vertical"></li>
                    <li class="<?php echo $controller == 'InviteFriends' ? 'active' : '' ?>">
                        <?php echo $this->Html->link('Invite Friends', array('controller' => 'InviteFriends', 'action' => 'index')) ?>
                    </li>
                    <li class="divider-vertical"></li>
                </ul>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <div class="span11 margin3">
        <div class="pull-right bottommargin2 banner">
            <!-- Button to trigger modal -->
            <a href="#" id="add-portfolio" class="btn btn-info"><i class="icon-plus"></i> Add Record</a>
        </div>
        <div class="leftmargin1">
            <?php echo $this->Session->flash(); ?>
        </div>
        <table id="portfolio-list" class="leftmargin1 table table-bordered">
            <?php
                $prevCat = 0;

                if(empty($listing)){
                    echo "<tr class='alert alert-info'>
                        <td><p class='fontcolor1'>Not yet specified.</p></td>
                    </tr>";
                }
                else {
                    foreach ($listing as $item) :
                        $portfolio = $item['Portfolio'];
                        $category= $item['Category'];
                        
                        if ($prevCat != $category['id']) : ?>
                            <tr>
                                <th bgcolor="#eef6fa" colspan="4">
                                    <span class="cat"><?php echo $category['description'] ?></div>
                                </th>
                            </tr
                        <?php
                        $prevCat = $category['id'];
                        endif;
                        ?>
                        <tr>
                            <td>
                                <span class="cat-id" style="display:none;"><?php echo $category['id'] ?></span>
                                <span class="id" style="display:none;"><?php echo $portfolio['id'] ?></span>
                                <span class="sponseeid" style="display:none;"><?php echo $portfolio['sponsee_id'] ?></span>
                                <span class="desc"><?php echo $portfolio['description'] ?></span>
                            </td>
                            <td width="300" style="text-align: right">
                                <a href="#" class="edit-portfolio btn" title="Edit">
                                    <i class="icon-edit"></i> Edit
                                </a>
                                <?php
                                $id = $portfolio['id'];
                                $sponsee_id = $portfolio['sponsee_id'];

                                echo $this->Html->link(
                                    '<i class="icon-trash"></i> Delete',
                                    array('action' => 'delete', $id, $sponsee_id),
                                    array('class' => 'btn','title' => 'Delete', 'escape' => false),
                                    'Are you sure you want to delete this item?'
                                );

                                ?>
                                <a href="#" class="add-folder btn" title="Create new folder">
                                    <i class="icon-plus"></i> New Folder
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor='#fff' colspan='2' class="portfolio-<?php echo $portfolio['id'] ?>">
                            <?php
                                if(empty($item['Folders'])) :
                                    
                                    echo "<p>No photo uploaded</p><br>";

                                else :

                                    echo '<ul class="thumbnails">';
                                    foreach ($item['Folders'] as $folder) :
                                        ?>

                                        <li>
                                            <a href="<?php echo "$folderViewUrl/$folder[id]" ?>" class="thumbnail span2">
                                                <img src="<?php echo "{$this->webroot}/img/portfolio/folder-icon.png" ?>"
                                                     width="60"/>
                                                <div class="text-center"><?php echo $folder['name'] ?></div>
                                                <button href="#" class="close" 
                                                        data-id="<?php echo $folder['id'] ?>"
                                                        data-portfolio="<?php echo $portfolio['id'] ?>">
                                                    &times;
                                                </button>
                                            </a>
                                        </li>

                                        <?php
                                    endforeach;
                                    echo '</ul>';
                                    
                                endif;
                    endforeach;
                }
            ?>
                            </td>
                        </tr>
        </table>
    </div>
</div>

<!-- Modal -->
<div id="portfolio-modal" class="modal hide fade"
     tabindex="-1" role="dialog"
     aria-labelledby="portfolio-modal-label"
     aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="portfolio-modal-label" style="margin-left:30px;"></h3>
    </div>
    <div class="modal-body">
        <div class="leftmargin1">
            <?php
            echo $this->Session->flash();
            echo $this->Form->create('Portfolio', array('action' => "add/$sponsee_id"));
            ?>
            <fieldset>
                <?php echo $this->Form->input('category_id', array('type' => 'select', 'options' => $portfoliolisting, 'class' => 'span4')); ?>
                <?php echo $this->Form->input('description', array('label' => 'Description', 'class' => 'span5', 'rows' => '10')); ?>
                <?php echo $this->Form->hidden('id') ?>
            </fieldset>
            <?php echo $this->Form->end() ?>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn btn-info save rightmargin4"><i class="icon-hdd"></i> Save</button>
    </div>
</div>

<div id="folder-modal" class="modal hide fade"
     tabindex="-1" role="dialog"
     aria-labelledby="folder-modal-label"
     aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="folder-modal-label" style="margin-left:30px;">Folder</h3>
    </div>
    <div class="modal-body">
        <form class="form-horizontal" onsubmit="return false">
            <label>
                <span class="control-label">Folder Name :</span>
                <div class="controls">
                    <input type="text" name="name" placeholder="Folder Name" required/>
                </div>
            </label>
            <input type="hidden" name="id" value=""/>
            <input type="hidden" name="portfolio_id" value=""/>
        </form>
    </div>
    <div class="modal-footer">
        <button class="btn btn-info save rightmargin4"><i class="icon-hdd"></i> Save</button>
    </div>
</div>

<div id="loading-modal" class="modal hide fade">
    <div class="modal-body">
        <h3>Processing...</h3>
    </div>
</div>

<script>
    // portfolio save handler
    $('#portfolio-modal .save').click(function() {
        var elems = $('input, select, textarea', '#portfolio-modal form div.required');
        var errors = [];
        var firstError;
        elems.each(function(idx,elem) {
            if (elem.value.trim().length === 0) {
                if (!firstError) firstError = elem;
                elem.value = '';
                var lbl = $('label[for=' +elem.id+ ']');
                errors.push(lbl.html() + ' is required.');
            }
        });

        if (errors.length > 0) {
            alert(errors.join('\n'));
            $(firstError).focus();
            return;
        }

        $('#portfolio-modal form').submit();
    });
    
    // portfolio add handler
    $('#add-portfolio').click(function(e) {
        e.preventDefault();
        var tr = $(this).closest('tr');
        $('#portfolio-modal-label').html('Add User');
        $('#portfolio-modal fieldset input').val('');
        $('#portfolio-modal').modal('show');
    });

    // portfolio edit handler
    $('#portfolio-list .edit-portfolio').click(function(e) {
        e.preventDefault();
        var tr = $(this).closest('tr');
        $('#portfolio-modal-label').html('Edit Portfolio');
        $('#portfolio-modal [id*=CategoryId]').val(tr.find('.cat-id').html().trim());
        $('#portfolio-modal [id*=Description]').val(tr.find('.desc').html().trim());
        $('#portfolio-modal [id*=Id]').val(tr.find('.id').html());
        $('#portfolio-modal').modal('show');
    });

    // folder add handler
    $('#portfolio-list .add-folder').click(function(e) {
        e.preventDefault();
        var tr = $(this).closest('tr');
        $('#folder-modal')
                .find('[name=portfolio_id]')
                .val(tr.find('.id').html())  // update hidden field's value
                .end() 
                .modal('show');
    });

    // folder save handler
    $('#folder-modal .save').click(function(e) {
        e.preventDefault();

        var form = $('#folder-modal form');
        if (!$.trim(form[0].name.value)) {
            alert('Name is required.');
            form[0].name.focus();
            return;
        }
        
        var postUrl = '<?php echo $this->Html->url(array('controller'=>'PortfolioImageFolders', 'action'=>'save'));?>';
        var postData = form.serialize();
        var controls = $([this, form[0].name]);
        controls.attr('disabled', 'disabled');

        $.post(postUrl, postData, null, 'json')
                .always(function() {
                    controls.removeAttr('disabled');
                })
                .done(function(resp) {
                    if (resp.success) {
                        form.trigger('reset');
                        $('#folder-modal').modal('hide');
                        updateFolders(form[0].portfolio_id.value,  resp.list);
                    }
                    else {
                        alert(resp.message || 'Something went wrong. Please try again.');
                    }
                });
    });

    // folder remove handler
    $(document).on('click', '.thumbnail > .close', function(e) {
        e.preventDefault();
        
        if (!confirm('Are you sure you want to delete this folder?')) return;


        var postUrl = '<?php echo $this->Html->url(array('controller'=>'PortfolioImageFolders', 'action'=>'remove'));?>';
        var folderId = $(this).data('id');
        var portfolioId = $(this).data('portfolio');
    
        $.post(postUrl, {id: folderId}, null, 'json')
                .done(function(resp) {
                    if (resp.success) {
                        updateFolders(portfolioId,  resp.list);
                    }
                    else {
                        alert(resp.message || 'Something went wrong. Please try again.');
                    }
                });
    });

    // helper functions
    function updateFolders(portfolioId, list)
    {
        var container = $('#portfolio-list .portfolio-' + portfolioId)
                .empty()
                .append('<ul class="thumbnails"></ul>')
                .find('.thumbnails');
        
        $(list).each(function(idx, item) {
            $('<a class="thumbnail span2"></a>')
                    .attr('href', '<?php echo $folderViewUrl ?>/' + item.id)
                    .append('<img src="<?php echo "{$this->webroot}/img/portfolio/folder-icon.png" ?>" width="60"/>')
                    .append('<div class="text-center">' +item.name+ '</div>')
                    .append(
                        $('<button class="close">&times;</button>')
                                .data('id', item.id)
                                .data('portfolio', portfolioId)
                     )
                    .wrap('<li></li>')
                    .parent()
                    .css('opacity', 0)
                    .appendTo(container)
                    .delay((idx+1) * 50)
                    .animate({'opacity' : 1}, 1000);
        });
    }
</script>