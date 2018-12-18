<script>
    $(document).ready(function () {
        $("ul#main-menu > li > a > span:contains('Users')").parent().parent().addClass("active");
        $("ul#main-menu > li > ul > li > a > span:contains('users')").parent().parent().addClass("active");
    });
</script>
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-12">
                    <h2>All Users</h2>
                </div>
                <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                    <ul class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="#"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Employer</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body for-btn">
                        <?php if (!empty($msg)) { ?>
                            <span style="width: 100%" class="btn btn-success"><?= $msg ?></span>
                        <?php } ?>
                        <div class="col-md-8 offset-md-1 btns">
                            <div class="row">
                                <div class="col-md-2 btun2">
                                    <a href="<?= site_url('super/view/add_user') ?>"
                                       style="position: absolute;z-index: 999;bottom:-20px;width: 100%;right: 160px"
                                       class="btn btn-primary m-b-15">
                                        Add User
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped" id="mydata">
                                <thead>
                                <tr>
                                    <th>Full Name</th>
                                    <th>Contact</th>
                                    <th>Email</th>
                                    <th>Designation</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($user as $v) { ?>
                                    <tr class="gradeA">
                                        <td><?= $v['fname'] ?> <?= $v['lname'] ?></td>
                                        <td><?= $v['contact'] ?></td>
                                        <td><?= $v['email'] ?></td>
                                        <td><?= $v['type'] ?></td>
                                        <td><?= $v['status'] ?></td>
                                        <td class="actions">
                                            <a href="<?= site_url('super/view/edit_user')?>/<?= $v['id'] ?>">
                                                <button style="background: #0a6aa1" class="btn btn-sm btn-icon btn-pure btn-default
                                            on-default m-r-5 button-edit">
                                                <i class="icon-pencil" aria-hidden="true"></i>
                                            </button>
                                            </a>
                                            <button style="background: red" class="btn btn-sm btn-icon btn-pure btn-default on-default
                                            button-remove"
                                                    onclick="abv('<?= site_url('super/DeleteUser') ?>/<?= $v['id'] ?>')">
                                                <i class="icon-trash" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                <?php } ?>
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
        $('#mydata').DataTable();
    });
</script>

