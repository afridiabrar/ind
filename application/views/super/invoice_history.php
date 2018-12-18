<script>
    $(document).ready(function () {
        $("ul#main-menu > li > a > span:contains('Invoice')").parent().parent().addClass("active");
        $("ul#main-menu > li > ul > li > a > span:contains('View Invoice')").parent().parent().addClass("active");
    });
</script>
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-12">
                    <h2>Invoices History</h2>
                </div>
                <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                    <ul class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="<?= site_url('super/view') ?>"><i class="icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">All History</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <!--  <div class="header">
                          <h2>Add Row</h2>
                      </div>-->
                    <div class="body">
                        <?php if(!empty($msg)) { ?>
                            <span style="width: 100%" class="btn btn-success"><?= $msg ?></span>
                        <?php } ?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped" id="myTable">
                                <thead>
                                <tr>
                                    <th>Invoice No</th>
                                    <th>Company Name</th>
                                    <th>Company Email</th>
                                    <th>Total Amount</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php  foreach ($invoice as $v){ $total = 0; ?>
                                <tr class="gradeA">
                                    <td><?= $v['i_id'] ?></td>
                                    <td><?= $v['i_name'] ?></td>
                                    <td><?= $v['i_email'] ?></td>
                                    <?php $desc = json_decode($v['i_desc'],true)?>
                                    <?php for ($i = 0; $i < count($desc['amount']); $i++) { ?>
                                       <?php $total += $desc['amount'][$i] ; ?>
                                    <?php } ?>
                                    <td><?= $total ?></td>
                                    <td><?= $v['payment_status'] ?></td>
                                    <td class="actions">
                                        <a href="<?= site_url('super/view/invoice') ?>/<?= $v['id'] ?>"
                                           class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove"
                                           data-toggle="tooltip" data-original-title="View"><i class="icon-eye" aria-hidden="true"></i>
                                        </a>
                                        <a href="<?= site_url('super/SendInvoice') ?>/<?= $v['id'] ?>"
                                           class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove"
                                           data-toggle="tooltip" data-original-title="Send"><i class="icon-envelope" aria-hidden="true"></i>
                                        </a>
                                        <button class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove"
                                                onclick="abv('<?= site_url('super/DeleteInvoice') ?>/<?= $v['id']?>')">
                                            <i class="icon-trash" aria-hidden="true"></i>
                                        </button>

                                    </td>
                                </tr>
                                <?php } ?>
                               </tbody>
                                <tfoot>

                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="conf"></div>
<script>
    function abv(url){
        var a = '<div class="modal fade in" id="deleteModal" role="dialog" tabindex="-1" aria-labelledby="myLargeModalLabel"> ' +
            '<div class="modal-dialog modal-sm" role="document"> ' +
            '<div class="modal-content"> ' +
            '<div class="modal-header"> ' +
            '<button type="button" class="close" data-dismiss="modal" aria-label="Close"> ' +
            '<span aria-hidden="true">×</span> ' +
            '</button> ' +
            '</div> ' +
            '<div class="modal-body clearfix"> ' +
            '<div class="col-md-12"> ' +
            '<p>Are you sure you want to delete?</p>' +
            '<p style="text-align: right">' +
            '<a href="'+ url +'"><span class="btn btn-primary">Yes</span></a> ' +
            '<span data-dismiss="modal" aria-label="Close" class="btn btn-primary">No</span> ' +
            '</p>' +
            '</div> ' +
            '</div> ' +
            '</div> ' +
            '</div> ' +
            '</div>';
        $(".conf").html(a);
        $("#deleteModal").modal();
    }

</script>
<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });

</script>