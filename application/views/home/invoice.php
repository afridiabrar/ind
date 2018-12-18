<?php if(!empty($user && $user['invoice'] == 'No')){ ?>
    <?= "You Don't have access to view this page" ;die;?>
<?php } ?>
<style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }

    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }

    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }

    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }

    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }

    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }

    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }

    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }

    .invoice-box table tr.item.last td {
        border-bottom: none;
    }

    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }

    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }

        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }

    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }

    .rtl table {
        text-align: right;
    }

    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
</style>
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-12">
                    <h2>Invoices</h2>
                </div>
                <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                    <ul class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="<?= site_url('super/view') ?>"><i
                                        class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">Invoices</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="invoice-box">
                        <table cellpadding="0" cellspacing="0">
                            <tr class="top">
                                <td colspan="4">
                                    <table>
                                        <tr>
                                            <td class="title">
                                                <img <img src="http://devlabx.com/ind_dev/assets_b/images/logo_22222.png" style="width:40%;
                                                max-width:300px;">
                                            </td>

                                            <td style="float: right">
                                                Invoice #: <?= $single_invoice[0]['i_id'] ?><br>
                                                Created: <?= date('M d,Y',strtotime($single_invoice[0]['i_create'])) ?><br>
                                                Due: <?= date('M d,Y',strtotime($single_invoice[0]['i_end'])) ?>

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
                                                <strong>INDEGENOUS, Inc.</strong><br>
                                                12345 Sunny Road<br>
                                                Sunnyville, CA 12345
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td style="float:right;text-align: right" >
                                                <strong><?= $single_invoice[0]['i_name'] ?>.</strong><br>
                                                <?= $single_invoice[0]['i_address'] ?><br>
                                                <?= $single_invoice[0]['i_email'] ?>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr class="heading">
                                <td>
                                    Item</td>
                                <td>
                                    Price
                                </td>
                                <td>
                                    Qty
                                </td>
                                <td>
                                    Sub total
                                </td>
                            </tr>
                            <?php
                            $desc = json_decode($single_invoice[0]['i_desc'], true); ?>
                            <?php $total = 0; for ($i = 0; $i < count($desc['desc']); $i++) {     ?>
                                <tr class="item">
                                    <td><?= $desc['desc'][$i] ?></td>
                                    <td><?= $desc['qty'][$i] ?></td>
                                    <td><?= $desc['cost'][$i] ?></td>
                                    <td>$<?= $desc['amount'][$i] ?></td>
                                    <?php $total += $desc['amount'][$i] ; ?>
                                </tr>
                            <?php } ?>
                            <tr class="total">
                                <td></td>
                                <td style="position: relative;left:46%;">
                                    Total: $<?= $total ?>
                                </td>
                            </tr>
                        </table>

                    </div>
                    <a  target="_blank" href="<?= site_url('home/ViewPdf')?>/<?= $single_invoice[0]['id'] ?>">
                        <button style="position: relative;left:75%;top:21px;width: 92px" type="submit" class="btn btn-primary">
                            PDF
                        </button>
                    </a>
                    <a  target="_blank" href="<?= site_url('home/SendInvoice')?>/<?= $single_invoice[0]['id'] ?>">
                        <button class="btn btn-sm btn-icon btn-pure btn-default" style="position: relative;left:58%;top:21px;width: 92px">
                            <i class="icon-envelope" aria-hidden="true"></i></button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

