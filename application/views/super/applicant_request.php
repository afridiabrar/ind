<script>
    $(document).ready(function () {
        $("ul#main-menu > li > a > span:contains('Applicant')").parent().parent().addClass("active");
        $("ul#main-menu > li > ul > li > a > span:contains('Applicant Request')").parent().parent().addClass("active");
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
                                        class="icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Applicant Request</li>
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
                                <div class="col-md-2">
                                    <div style="z-index: 999;position: absolute;bottom: -5px">
                                        <label for="">Select All</label>
                                        <input type="checkbox" id="check_all" value="check all" ">
                                    </div>
                                </div>
                                <div class="col-md-3 btun2">
                                    <button type="button" onclick="templateModal()"
                                            style="position: absolute;z-index: 999;bottom: -20px;right: 125px;"
                                            class="btn btn-primary m-b-15">
                                        <i class="icon wb-plus" aria-hidden="true">
                                        </i>Send Email
                                    </button>
                                </div>
                                <div class="col-md-3 btun2">
                                    <a style="position: absolute;z-index: 999;bottom: -20px;right: 90px;"
                                       href="<?= site_url('super/view/applicant') ?>">
                                        <button style="width: 100%" class="btn btn-primary m-b-15"
                                                type="button">
                                            <i class="icon wb-plus" aria-hidden="true"></i>Add New Applicant
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped" id="myTable">
                                <thead>
                                <tr>
                                    <th>check</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>industry</th>
                                    <th>Location</th>
                                    <th>Cv</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if (!empty($_GET)) { ?>
                                    <?php foreach ($seeker as $v) { ?>
                                        <?php if ($_GET['state'] == $v['s_state'] && $_GET['industry'] == $v['s_industry']) { ?>
                                            <?php if ($v['s_status'] == 'New_Applicant') { ?>

                                                <tr>
                                                    <td><input type="checkbox" id="single_check" name="id[]"
                                                               value="<?= $v['id'] ?>"></td>
                                                    <td><?= $v['s_first'] ?>.<?= $v['s_last'] ?></td>
                                                    <td><?= $v['s_email'] ?></td>
                                                    <td><?= $v['s_industry'] ?></td>
                                                    <td><?= $v['s_state'] ?></td>
                                                    <?php $file = (!empty($v['s_cv'])) ? base_url('csv_files') . "/" . $v['s_cv'] :
                                                        "#Not Available" ?>
                                                    <td>
                                                        <?php if (!empty($v['$_cv'])) { ?>
                                                            <a target="_blank" href="<?= $file ?>">Download</a>
                                                        <?php } else { ?>
                                                            Not Available
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <button onclick="Moveto('<?= $v['id'] ?>')"
                                                                class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5
                                                                button-edit">
                                                            Move To
                                                        </button>

                                                        <a href="<?= site_url('super/view/edit_applicant') ?>/<?= $v['id'] ?>">
                                                            <button class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5
                                                        button-edit">
                                                                <i class="icon-pencil" aria-hidden="true"></i>
                                                            </button>
                                                        </a>
                                                        <button class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove"
                                                                onclick="abvvvv('<?= site_url('super/DeleteSeeker') ?>/<?= $v['id']
                                                                ?>')">
                                                            <i class="icon-trash"
                                                               aria-hidden="true"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php }
                                        }
                                    } ?>
                                <?php } else { ?>
                                    <?php foreach ($seeker as $v) { ?>
                                        <?php if ($v['s_status'] == 'New_Applicant') { ?>
                                            <tr>
                                                <td><input type="checkbox" class="single_check" name="id[]"
                                                           value="<?= $v['id'] ?>"></td>
                                                <td><?= $v['s_first'] ?>.<?= $v['s_last'] ?></td>
                                                <td><?= $v['s_email'] ?></td>
                                                <td><?= $v['s_industry'] ?></td>
                                                <td><?= $v['s_state'] ?></td>
                                                <?php $file = (!empty($v['s_cv'])) ? base_url('csv_files') . "/" . $v['s_cv'] :
                                                    "#Not Available" ?>
                                                <td>
                                                    <?php if (!empty($v['$_cv'])) { ?>
                                                        <a target="_blank" href="<?= $file ?>">Download</a>
                                                    <?php } else { ?>
                                                        Not Available
                                                    <?php } ?>
                                                </td>
                                                <td>

                                                    <button onclick="MoveModal11('<?= $v['id'] ?>')"
                                                            class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit">
                                                        Move To
                                                    </button>
                                                    <a href="<?= site_url('super/view/profile1') ?>/<?= $v['id'] ?>">
                                                        <button class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5
                                                        button-edit">
                                                            <i class="icon-user" aria-hidden="true"></i>
                                                        </button>
                                                    </a>
                                                    <a href="<?= site_url('super/view/edit_applicant') ?>/<?= $v['id'] ?>">
                                                        <button class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5
                                                        button-edit">
                                                            <i class="icon-pencil" aria-hidden="true"></i>
                                                        </button>
                                                    </a>
                                                    <button class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove"
                                                            onclick="abvvvv('<?= site_url('super/DeleteSeeker') ?>/<?= $v['id'] ?>')">
                                                        <i class="icon-trash"
                                                           aria-hidden="true"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="conf">
</div>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
<script>

    function Moveto(id) {
        var state = '<?= (!empty($_GET)) ? $_GET['state'] : "" ?>';
        var industry = '<?= (!empty($_GET)) ? $_GET['industry'] : "" ?>';
        $.post("<?= site_url('super/MoveModal')?>", {id: id, state: state, industry: industry}, function (e) {
            console.log(e);
            $('.conf').html(e);
            $('#addevent').modal();
        });
    }

    function MoveModal11(id) {
        $.post("<?= site_url('super/MoveModal11')?>", {id: id}, function (e) {
            console.log(e);
            $('.conf').html(e);
            $('#addevent').modal();
        });
    }

    function abvvvv(url) {
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
    $("#check_all").change(function () {
        $("input:checkbox").prop('checked', $(this).prop("checked"));
    });

    function templateModal() {
        var chId = [];
        var checkboxes = document.getElementsByName("id[]");
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked == true) {
                chId.push(checkboxes[i].value);
            }
        }
        if (chId != '') {
            $.post("<?= site_url('super/SendMail')?>", {id: chId}, function (e) {
                console.log(e);
                $('.conf').html(e);
                $("#modal").modal();
            });
        }else{
            alertify.error('Please Select Check Box First')
        }
        //////////////
    }

    $(document).ready(function () {
        $('#myTable').DataTable();
    });


</script>
