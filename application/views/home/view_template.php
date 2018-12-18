<?php if(!empty($user && $user['template'] == 'No')){ ?>
    <?= "You Don't have access to view this page" ;die;?>
<?php } ?>
<script>
    $(document).ready(function () {
        $("ul#main-menu > li > a > span:contains('Email Template')").parent().parent().addClass("active");
        $("ul#main-menu > li > ul > li > a > span:contains('View Template')").parent().parent().addClass("active");
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
                        <li class="breadcrumb-item"><a href="<?= site_url('home/view') ?>"><i class="icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Template</li>
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
                                    <a href="<?= site_url('super/view/template') ?>"
                                       style="position: absolute;z-index: 999;bottom:5px;width: 100%;right: 122px"
                                       class="btn btn-primary m-b-15">
                                        Add New Template
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped" id="myTable">
                                <thead>
                                <tr>
                                    <th>Campaign Title</th>
                                    <th>Email</th>
                                    <th>Sending Step</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($template as $v) { ?>
                                    <tr class="gradeA">
                                        <td><?= $v['title'] ?></td>
                                        <td><?= $v['email'] ?></td>
                                        <td>
                                            <select class="form-control">
                                                <option <?= $v['seeker_sending_status'] == 'Step1' ? "selected" : ""?>>Cv Information</option>
                                                <option <?= $v['seeker_sending_status'] == 'Step2' ? "selected" : ""?>>Reference Check</option>
                                                <option <?= $v['seeker_sending_status'] == 'Step3' ? "selected" : ""?>>Work Readiness</option>
                                                <option <?= $v['seeker_sending_status'] == 'Step4' ? "selected" : ""?>>Mock Interview</option>
                                                <option <?= $v['seeker_sending_status'] == 'Step5' ? "selected" : ""?>>Address Barrier</option>
                                                <option <?= $v['seeker_sending_status'] == 'Step6' ? "selected" : ""?>>Job Seeker Ready</option>
                                                <option <?= $v['seeker_sending_status'] == 'Step7' ? "selected" : ""?>>Completed</option>
                                                <option <?= $v['seeker_sending_status'] == 'other' ? "selected" : ""?>>Cv Information</option>
                                            </select>
                                        </td>
                                        <td class="actions">
                                            <a href="<?= site_url('super/view/s_template') ?>/<?= $v['id'] ?>">
                                                <button class="btn btn-sm btn-icon btn-pure btn-default">
                                                    <i class="icon-eye" aria-hidden="true"></i></button>
                                            </a>
                                            <button class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove"
                                                    onclick="abv('<?= site_url('super/Template/DeleteTemplate') ?>/<?= $v['id'] ?>')">
                                                <i class="icon-trash" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
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
<div class="conf"></div>
<script>
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