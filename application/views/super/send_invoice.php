
<table cellpadding="0" cellspacing="0" border="2" style="width: 60%;">
    <tr class="top">
        <td colspan="4">
            <table>
                <tr>
                    <td><img src="http://devlabx.com/ind_dev/assets_b/images/email_log.PNG" width="200px"></td>
                    <td style="position: relative;left: 380px;">
                        #:<?= $single_invoice[0]['i_id'] ?>
                        <br> Created: <?= $single_invoice[0]['i_create'] ?>
                        <br> Due:    <?= $single_invoice[0]['i_end'] ?>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr class="information">
        <td colspan="4">
            <table>
                <tr>
                    <td>
                        INDEGENOUS, Inc.<br> 12345 Sunny Road<br> Sunnyville, CA 12345
                    </td>
                    <td style=" position: relative;left: 436px;">
                        <?= $single_invoice[0]['i_name'] ?>
                        <br><?= $single_invoice[0]['i_address'] ?>
                        <br><?= $single_invoice[0]['i_email'] ?>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr class="heading">
        <td>Item</td>
        <td>Unit Cost</td>
        <td>Quantity</td>
        <td>Price</td>
    </tr>
    <tbody>
    <?php
    $desc = json_decode($single_invoice[0]['i_desc'], true); ?>
    <?php $total = 0; for ($i = 0; $i < count($desc['desc']); $i++) {     ?>
        <tr>
            <td><?= $desc['desc'][$i] ?></td>
            <td><?= $desc['qty'][$i] ?></td>
            <td><?= $desc['cost'][$i] ?></td>
            <td>$<?= $desc['amount'][$i] ?></td>
            <?php $total += $desc['amount'][$i] ; ?>
        </tr>
    <?php } ?>
    </tbody>
    <tr class="total">
        <td colspan="3"></td>
        <td id="total_damage">
            $ <?= $total ?>
        </td>
    </tr>
</table>