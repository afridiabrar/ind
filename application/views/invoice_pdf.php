<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice PDF</title>
</head>
<style>
    body{
        font-family: Sans-Serif;
    }
.data td , th {
    border: 1px solid black;
}
</style>
<body>
<table style="width: 100%" >
  <tr>
      <td style="width: 70%"><img src="<?php echo APPPATH.'logo_22222.png'; ?>" style="width: 200px"></td>
      <td></td>
      <td></td>
      <td>
        <span>Invoice #: <?= $single_invoice[0]['i_id'] ?></span> <br>
          <span>Created: <?= date('M d,Y',strtotime($single_invoice[0]['i_create'])) ?> </span> <br>
          <span> Due: <?= date('M d,Y',strtotime($single_invoice[0]['i_end'])) ?></span>
      </td>
  </tr>
    <tr>
        <td colspan="4" style="height: 50px"></td>
    </tr>
    <tr>
        <td>
             <b>INDEGENOUS, Inc.</b> <br>
            12345 Sunny Road<br>
            Sunnyville, CA 12345
        </td>
        <td></td>
        <td></td>
        <td>
            <b> <?= $single_invoice[0]['i_name'] ?>.</b>  <br>
            <?= $single_invoice[0]['i_address'] ?> <br>
            <?= $single_invoice[0]['i_email'] ?>
        </td>
    </tr>

    <tr>
        <td colspan="4" style="height: 50px"></td>
    </tr>
    <tr class="data">
        <th> Item</th>
        <th> Price </th>
        <th> Qty </th>
        <th> Sub Total </th>
    </tr>
    <?php
    $desc = json_decode($single_invoice[0]['i_desc'], true); ?>
    <?php $total = 0; for ($i = 0; $i < count($desc['desc']); $i++) {     ?>
    <tr class="data">
        <td><?= $desc['desc'][$i] ?></td>
        <td><?= $desc['qty'][$i] ?></td>
        <td><?= $desc['cost'][$i] ?></td>
        <td>$<?= $desc['amount'][$i] ?></td>
        <?php $total += $desc['amount'][$i] ; ?>
    </tr>
    <?php } ?>
    <tr class="data">
        <td colspan="3"> Sub Total</td>
        <td >$<?= $total ?></td>
    </tr>
</table>
<a href="<?= site_url('home/payment')?>/<?= $single_invoice[0]['id']?>">Pay Now</a>
</body>
</html>
 </br>
 </br>
