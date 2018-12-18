<script>
    $(document).ready(function () {
        $("ul#main-menu > li > a > span:contains('Invoice')").parent().parent().addClass("active");
        $("ul#main-menu > li > ul > li > a > span:contains('Create Invoice')").parent().parent().addClass("active");
    });
</script>
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-12">

                </div>
                <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                    <ul class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="<?= site_url('super/view') ?>"><i
                                        class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">Invoice</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="header">
                        <h2> Create Invoice </h2>
                    </div>
                    <div class="body">
                        <form class="form-group" method="post" action="<?= site_url('super/SendInvoice/').$single_invoice[0]['id'] ?>">
                            <div class="invoice-box">
                                <table cellpadding="0" cellspacing="0">
                                    <tr class="top">
                                        <td colspan="4">
                                            <table>
                                                <tr>
                                                    <td><img src="<?= base_url('assets_b')?>/images/logo222.png" width="500px"></td>
                                                    <td>
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
                                                    <td>
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
                                        <td id="total_damage" style="position:relative;top: 10px;">
                                            $ <?= $total ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <button style="position: relative;left:76%;top:14px;width: 92px" type="submit" class="btn btn-primary">
                                Send
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function test(id) {
        var unit = $("#unit_cost" + id).val();
        var qty = $("#quantity" + id).val();
        var ans = unit * qty;
        $("#total_amount" + id).val(ans);
        addup();
    }
    function addup() {
        var tt = 0;
        $(".item > tr :nth-child(4) > input ").each(function(e){
            tt += $(this).val();
        });
        $("#dsdsdfs").text(tt);
    }
    var jj = 2;
    function add_rowsss() {
        $(".item").append('<tr id="remove_doc' + jj + '">' +
            '<td><input  name="i_desc[desc][]" placeholder="Description"/></td>' +
            '<td><input name="i_desc[cost][]" onkeyup="test(' + jj + ')" id="unit_cost' + jj + '" type="number"  placeholder="1"/></td>' +
            '<td><input  name="i_desc[qty][]" onkeyup="test(' + jj + ')"  type="number" id="quantity' + jj + '" placeholder="2"/></td>' +
            '<td>$<input type="text" class="totalss" style="width: 69px;" readonly ' +
            'name="i_desc[amount][]"  id="total_amount' + jj + '"></td>' +
            '<td><input type="button" value="Delete" onclick="doc_remove(' + jj + ')" class="btn btn-danger" ></td>' +
            '</tr>');
        jj++;
    }
    function doc_remove(id) {
        $('#remove_doc' + id).remove();
    }

</script>

