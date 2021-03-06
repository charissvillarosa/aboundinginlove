<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body style="background:#f7f7f7;">
        <div style="margin: 0 auto; max-width: 600px;">
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
					<th style="background:#fff; padding: 20px 10px; text-align:center; font:20px/1.3 'Segoe UI',Arial, sans-serif;" colspan="2">Friend Invitation</th>
				</tr>
				<tr>
                    <th style="background: #fff;" colspan="2">
					<hr style="border:dashed 1px #ccc;">
                    </th>
                </tr>
				<tr>
                    <td style="background: #fff;" colspan="2">
					<p style="margin-left:15px; font:18px/1.3 'Segoe UI',Arial, sans-serif;">Invitation From</p>
                    </td>
                </tr>
                <tr>
                    <td width="150" style="background: #fff; padding: 0px 20px 20px 20px;" valign="top">
                        <img src="<?php echo Configure::read('profile.image.url') . $user['id'] ?>" alt="" width="150px" class="img-polaroid">
                        <p class="topmargin1" style="text-align:center; font:15px/1.3 'Segoe UI',Arial, sans-serif;"><b><?php echo $user['firstname'].' '.$user['lastname'] ?></b></p>
                        <p style="text-align:center; width:150px; font:15px/1.3 'Segoe UI',Arial, sans-serif;">
                            Member since: <?php echo $this->Time->format($user['created']); ?>
                        </p>
                    </td>
                    <td style="background: #fff; padding: 0px 10px 20px 10px; font:15px/1.3 'Segoe UI',Arial, sans-serif;" valign="top">
                            <?php
							$message = explode("\n", $message);

							foreach ($message as $line):
								echo '<p> ' . $line . "</p>\n";
							endforeach;
							?>
							<br><br>
                            <a href="<?php echo Configure::read('invite.join.url'); ?>?tokenId=<?php echo $tokenId ?>">
                                Join Now!
                            </a>
                    </td>
                </tr>
                <tr>
                    <td style="background: #349bb9;" colspan="2">
                        <p style="color:#fff; text-align: center; font:14px/1.3 'Segoe UI',Arial, sans-serif;">
                            Abounding in Love is a 501 (c)(3) nonprofit recognized by the IRS, and all donations to Abounding in Love are tax-deductible in accordance with IRS regulations.
                        </p>
                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>
