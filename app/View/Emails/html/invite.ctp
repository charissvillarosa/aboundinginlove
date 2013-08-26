<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <div style="margin: 0 auto; max-width: 600px">
            <table style="border:1px solid #ccc;" border="0" cellspacing="0" cellpadding="5" width="100%">
                <tr>
                    <td style="background: #f5f5f5;" colspan="2">
                        <a href="http://aboundinginlove.org">
                            <img src="http://aboundinginlove.org/app/webroot/img/aboundinginlove_logo.png"
                                 height="100"/>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td width="150" style="padding: 20px 10px;" valign="top">
                        <strong>Invitation From</strong>
                        <div style="border: solid 1px #ccc; width:100px; height: 100px;"></div>
                        <strong><?php echo "$user[firstname] $user[lastname] " ?></strong>
                        <p>
                            Member since: <?php $this->Time->format($user['created'])?>
                        </p>
                    </td>
                    <td  style="padding: 20px 10px;" valign="top">
                        <strong>Message</strong>

                        <?php
                        $message = explode("\n", $message);

                        foreach ($message as $line):
                            echo '<p> ' . $line . "</p>\n";
                        endforeach;
                        ?>
                        <p>
                            <a href="http://aboundinginlove.org/index.php/join/<?php echo $tokenId ?>">
                                Join Now!
                            </a>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">

                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>
