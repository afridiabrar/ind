<script>
    $(document).ready(function () {
        $("ul#main-menu > li > a > span:contains('Supplier')").parent().parent().addClass("active");
        $("ul#main-menu > li > ul > li > a > span:contains('View Supplier')").parent().parent().addClass("active");
    });
</script>
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-12">
                    <!--                        <h2>Jquery Datatable</h2>-->
                </div>
                <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                    <ul class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="<?= site_url('super/view')?>"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Supplier</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body for-btn">
                        <div class="col-md-8 offset-md-1 btns">
                            <div class="row">
                                <div class="col-md-2 btun2">
                                    <a href="<?= site_url('super/view/create_supplier') ?>"
                                       style="position: absolute;z-index: 999;bottom:-20px;width: 100%;right: 160px"
                                       class="btn btn-primary m-b-15">
                                        Add New Supplier
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped" id="myTable">
                                <thead>
                                <tr>
                                    <th>Company Name</th>
                                    <th>Full Name</th>
                                    <th>Contact</th>
                                    <th>Amount Paid</th>
                                    <th>Amount Due</th>
                                    <th>Amount For</th>
                                    <th>Add Child</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($supplier as $v) { ?>
                                    <tr class="gradeA">
                                        <td><?= $v['s_c_name'] ?></td>
                                        <td><?= $v['s_f_name'] ?> <?= $v['s_l_name'] ?></td>
                                        <td><?= $v['s_contact'] ?></td>
                                        <td><?= $v['s_paid'] ?></td>
                                        <td><?= $v['s_a_due'] ?></td>
                                        <td><?= $v['s_for'] ?></td>
                                        <td><a href="<?= site_url('super/view/supp') ?>/<?= $v['id'] ?>">
                                                <button style="background: #0a6aa1"
                                                        class="btn btn-sm btn-icon btn-primary">
                                                    Add Child
                                                </button>
                                            </a>
                                        </td>
                                        <td class="actions">
                                            <a href="<?= site_url('super/view/single_supplier')?>/<?= $v['id']?>">
                                                <button class="btn btn-sm btn-icon btn-pure btn-default">
                                                    <i class="icon-eye" aria-hidden="true"></i></button>
                                            </a>
                                            <button class="btn btn-sm btn-icon btn-pure btn-default"
                                                    data-toggle="modal" data-target="#addevent"><i class="icon-pencil"
                                                                                                   aria-hidden="true"></i>
                                            </button>
                                            <button class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove"
                                                    onclick="abv('<?= site_url('super/DeleteSupplier') ?>/<?= $v['id'] ?>')">
                                                <i class="icon-trash" aria-hidden="true"></i></button>
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
    function employer(id) {
        $.post("<?= site_url('super/employer_modal')?>", {id: id}, function (e) {
            console.log(e);
            $('.conf').html(e);
            $('#modal').modal();
        });
    }

    function abv(url) {
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
            '<a href="' + url + '"><span class="btn btn-primary">Yes</span></a> ' +
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