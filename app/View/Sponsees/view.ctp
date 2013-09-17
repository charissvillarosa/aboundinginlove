<?php
$user = $this->Session->read('Auth.User');
?>
<style>
    table tr td {
        background: #efefef;
        border: none;
    }
</style>
<div class="well span8 pull-right">
    <div style="margin-left:0;" class="span2 pull-left">
        <?php
        $imageURl = array('controller' => 'SponseeImages', 'action' => 'view', $sponsee['id']);
        $attrs = array('alt' => '', 'width' => '160px', 'class' => 'img-polaroid');
        echo $this->Html->image($imageURl, $attrs);
        ?>
        <!--Button to trigger modal 
        <a href="#myModal" role="button" class="btn btn-info btn-block video"><i class="icon-facetime-video"></i> Watch my video</a>
        <a href="#myModal" role="button" class="btn btn-info btn-block story"><i class="icon-book"></i> Read my story</a>-->
        <a data-toggle="modal" href="#myVideo" class="btn btn-info btn-medium btn-block"><i class="icon-facetime-video"></i> Watch my video</a>
        <a data-toggle="modal" href="#myStory" class="btn btn-info btn-medium btn-block"><i class="icon-book"></i> Read my story</a>
    </div>
    <div style="width:515px;" class="span6 pull-right box">
        <div style="margin-left:0;" class="span2 pull-left">
            <table style="border:none;">
                <tr>
                    <td><strong>Name: </strong></td>
                    <td><?php echo $sponsee['firstname'].' '.$sponsee['lastname']; ?></td>
                </tr>
                <tr>
                    <td><strong>Gender: </strong></td>
                    <td><?php echo $sponsee['gender']; ?></td>
                </tr>
                <tr>
                    <td><strong>Birth Date: </strong></td>
                    <td><?php echo $sponsee['birthdate']; ?></td>
                </tr>
                <tr>
                    <td><strong>Location: </strong></td>
                    <td><?php echo $sponsee['country']; ?></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <?php echo $this->Html->link('Donate Today!', array('controller' => 'donations', 'action' => 'view', $sponsee['id']), array('class' => 'btn btn-info')); ?>
                    </td>
                </tr>
            </table>
        </div>
        <div style="border-left:solid 1px #e3e3e3; padding-left:20px;" class="span3 pull-left">
            <h5>Short Story</h5>
            <p style="text-align: justify;">
                <?php
                     $information = explode("\n", $sponsee['short_description']);

                     foreach ($information as $line):
                         echo '<p> ' . $line . "</p>\n";
                     endforeach;
                ?>
             </p>
        </div>
    </div>
</div>




<div id="myVideo" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 id="myModalLabel">Video</h3>
    </div>
    <div class="modal-body">
        <h4>Text in a modal</h4>
        <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem.</p>

        <h4>Popover in a modal</h4>
        <p>This <a href="#" role="button" class="btn popover-test" title="A Title" data-content="And here's some amazing content. It's very engaging. right?">button</a> should trigger a popover on click.</p>

        <h4>Tooltips in a modal</h4>
        <p><a href="#" class="tooltip-test" title="Tooltip">This link</a> and <a href="#" class="tooltip-test" title="Tooltip">that link</a> should have tooltips on hover.</p>

        <hr>

        <h4>Overflowing text to show optional scrollbar</h4>
        <p>We set a fixed <code>max-height</code> on the <code>.modal-body</code>. Watch it overflow with all this extra lorem ipsum text we've included.</p>
        <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
        <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
        <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
        <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal">Close</button>
    </div>
</div>

<div id="myStory" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 id="myModalLabel">Story</h3>
    </div>
    <div class="modal-body">
        <h4>Text in a modal</h4>
        <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem.</p>

        <h4>Popover in a modal</h4>
        <p>This <a href="#" role="button" class="btn popover-test" title="A Title" data-content="And here's some amazing content. It's very engaging. right?">button</a> should trigger a popover on click.</p>

        <h4>Tooltips in a modal</h4>
        <p><a href="#" class="tooltip-test" title="Tooltip">This link</a> and <a href="#" class="tooltip-test" title="Tooltip">that link</a> should have tooltips on hover.</p>

        <hr>

        <h4>Overflowing text to show optional scrollbar</h4>
        <p>We set a fixed <code>max-height</code> on the <code>.modal-body</code>. Watch it overflow with all this extra lorem ipsum text we've included.</p>
        <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
        <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
        <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
        <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal">Close</button>
    </div>
</div>