<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body style="background:#f7f7f7;">
        <div style="margin: 0 auto; width: 700px;">
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
                    <th style="background: #fff; padding: 30px 20px 20px 20px; font:20px/1.3 'Segoe UI',Arial, sans-serif;" valign="top" colspan="2">
                        Thank you from Abounding in Love
                    </th>
                </tr>
                <tr>
                    <th style="background: #fff;" colspan="2">
                <hr style="border:dashed 1px #ccc;">
                </th>
                </tr>
                <tr>
                    <td style="background: #fff; padding: 10px 20px; font:14px/1.3 'Segoe UI',Arial, sans-serif; text-align:justify;" valign="top" colspan="2">
                        Dear <?php echo $donor; ?>,
                    </td>
                </tr>
                <tr>
                    <td style="background: #fff; padding: 10px 20px; font:14px/1.3 'Segoe UI',Arial, sans-serif; text-align:justify;" valign="top" colspan="2">
                        I would like to sincerely thank you for your generous donation worth $<?php echo $donation . ' to ' . $sponseename . ' on ' . $paypal_paymentdate; ?> .
                        Every Donation helps ensure that we can continue with our work.
                    </td>
                </tr>
                <tr>
                    <td style="background: #fff; padding: 10px 20px; font:14px/1.3 'Segoe UI',Arial, sans-serif; text-align:justify;" valign="top" colspan="2">
                        I know there are a lot of other ways you can have spent this money, and we appreciate the support you have given to our cause.
                    </td>
                </tr>
                <tr>
                    <td style="background: #fff; padding: 10px 20px; font:14px/1.3 'Segoe UI',Arial, sans-serif; text-align:justify;" valign="top" colspan="2">
                        Please consider telling your friends and family about this children and this organization. Share the link on your blogs or social network.
                    </td>
                </tr>
                <tr>
                    <td style="background: #fff; padding: 10px 20px; font:14px/1.3 'Segoe UI',Arial, sans-serif; text-align:justify;" valign="top" colspan="2">
                        Thank you again and warm regards.
                    </td>
                </tr>
                <tr>
                    <td style="background: #fff; padding: 10px 20px; font:14px/1.3 'Segoe UI',Arial, sans-serif; text-align:justify;" valign="top" colspan="2">
                        With gratitude,<br>
                        Abounding in Love
                    </td>
                </tr>
                <tr>
                    <th style="background: #fff;" colspan="2">
                <hr style="border:dashed 1px #ccc;">
                </th>
                </tr>
                <tr>
                    <td style="background: #fff; padding:10px 20px; font:20px/1.3 'Segoe UI',Arial, sans-serif;" colspan="2">Latest update about <?php echo $sponseename; ?></td>
                </tr>
                <tr>
                    <td style="background: #fff; padding:20px;" valign="top"><img src="<?php echo Configure::read('sponsee.image.url') . $sponseeid ?>" alt="" width="150px" class="img-polaroid"></td>
                    <td style="background: #fff; padding:10px 20px; font:14px/1.3 'Segoe UI',Arial, sans-serif; text-align:justify;" valign="top">
                        <br><?php echo $portfoliocontent; ?>
                        <br><br>
                        <a href="<?php echo Configure::read('sponsee.portfolio.url'); ?><?php echo $sponseeid; ?>">
                            Read more
                        </a><br><br><br>
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
