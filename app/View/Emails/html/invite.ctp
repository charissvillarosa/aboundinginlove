<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <div style="margin: 0 auto; max-width: 600px">
            <table style="font-family: verdana, arial; font-size: 12px; border:1px solid #fff;" border="0" cellspacing="0" cellpadding="5" width="100%">
                <tr>
                    <td style="background: #349bb9;">
                        <a href="http://aboundinginlove.org">
                            <img src="http://aboundinginlove.org/app/webroot/img/aboundinginlove_logo.png"
                                 height="100"/>
                        </a>
                    </td>
                    <td style="background: #349bb9;">
                        <a href="http://aboundinginlove.org">
                            <img src="http://aboundinginlove.org/app/webroot/img/slogan.png"
                                 height="100"/>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td width="150" style="background: #f7f7f7; padding: 20px 10px;" valign="top">
                        <p style="margin-top:20px; text-align:center;"><strong>Invitation From</strong></p>
                        <div style="border: solid 1px #ccc; width:150px; height: 150px;"></div>
                        <p style="margin-top:20px; text-align:center;"><strong>Caren Carpenter</strong></p>
                        <p style="text-align:center; width:150px;">
                            Member since: Jan. 1, 2013
                        </p>
                    </td>
                    <td  style="background: #f7f7f7; padding: 70px 10px 20px 10px;" valign="top">
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
                    <td style="background: #349bb9;" colspan="2">
                        <p style="color:#fff; text-align: center;">
                            Abounding in love is a not profit organization located <br>
                            at 0-1765 Chicago Drive Jenison, MI 49428 USA
                        </p>
                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>
