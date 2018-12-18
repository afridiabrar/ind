<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-lg-5 col-md-8 col-sm-12">
                    <h2>Project Pipeline</h2>
                </div>
                <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                    <ul class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="<?= site_url('super/view/') ?>"><i
                                        class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">Project Pipeline</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Project : <?= $project_data[0]['com_name'] ?> </h2>
                        <ul class="header-dropdown dropdown dropdown-animated scale-left">
                            <li><a href="javascript:void(0);" data-toggle="cardloading" data-loading-effect="pulse"><i
                                            class="icon-refresh"></i></a></li>
                            <li><a href="javascript:void(0);" class="full-screen"><i
                                            class="icon-size-fullscreen"></i></a></li>
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"
                                   role="button" aria-haspopup="true" aria-expanded="false"></a>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another Action</a></li>
                                    <li><a href="javascript:void(0);">Something else</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body  header2">
                        <div id="wizard_horizontal">
                            <h2>Job Seeker Information</h2>
                            <section style="width: 100%">
                                <fieldset>
                                    <div class="row clearfix">
                                        <div class="col-lg-12 col-md-12">
                                            <table class="table table-bordered table-hover table-striped" id="myTable">
                                                <thead>
                                                <tr style="background-color: #ffffff">
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Cv</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach ($seeker_data as $v) { ?>
                                                    <?php if ($v['verification_status'] == 'Step1') { ?>
                                                        <tr>
                                                            <td><?= $v['s_first'] ?> <?= $v['s_last'] ?></td>
                                                            <td><?= $v['s_email'] ?></td>
                                                            <?php $link = (!empty($v['s_cv'])) ? base_url('csv_files') . "/" .
                                                                $v['s_cv']
                                                                : "Not 
                                                        Available" ?>
                                                            <td>
                                                                <?= $v['s_cv'] ?>
                                                                <a href="<?= (!empty($v['s_cv'])) ? base_url('csv_files') . "/" .
                                                                    $v['s_cv'] :
                                                                    "#" ?>" target="_blank">download</a>
                                                            </td>
                                                            <td>
                                                                <button style="background: #0a6aa1" class="btn btn-sm btn-icon btn-pure btn-default on-defaul
                                                                 m-r-5
                                                            button-edit">
                                                                    <a href="<?= site_url('super/view/profile1') ?>/<?=
                                                                    $v['id'] ?>"
                                                                    ><i class="icon-users"></i></a>
                                                                </button>
                                                                <button class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5
                                                            button-edit" style="background: #0a6aa1"
                                                                        onclick="pipeline('<?= $v['id'] ?>')">
                                                                    <i class="icon-pencil" aria-hidden="true">
                                                                    </i>
                                                                </button>
                                                                <button style="background: red"
                                                                        class="btn btn-sm btn-icon btn-pure btn-default on-default                                                                                          button-remove">
                                                                    <i class="icon-trash"
                                                                       aria-hidden="true"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                <?php } ?>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </fieldset>
                            </section>
                            <h2>Police Verification</h2>
                            <section style="width: 100%">
                                <section>
                                    <fieldset>
                                        <div class="row clearfix">
                                            <div class="col-lg-12 col-md-12">
                                                <table class="table table-bordered table-hover table-striped"
                                                       id="myTable">
                                                    <thead>
                                                    <tr style="background-color: #ffffff">
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Cv</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach ($seeker_data as $v) { ?>
                                                        <?php if ($v['verification_status'] == 'Step2') { ?>
                                                            <tr style="background-color: #f7f7f7">
                                                                <td><?= $v['s_first'] ?> <?= $v['s_last'] ?></td>
                                                                <td><?= $v['s_email'] ?></td>
                                                                <?php $link = (!empty($v['s_cv'])) ? base_url('csv_files') . "/" . $v['s_cv']
                                                                    : "Not 
                                                        Available" ?>
                                                                <td>
                                                                    <?= $v['s_cv'] ?>
                                                                    <a href="<?= (!empty($v['s_cv'])) ? base_url('csv_files') . "/" .
                                                                        $v['s_cv'] :
                                                                        "#" ?>" target="_blank">download</a>
                                                                </td>
                                                                <td>
                                                                    <button style="background: #0a6aa1" class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5
                                                            button-edit">
                                                                        <a href="<?= site_url('super/view/profile1') ?>/<?= $v['id'] ?>"
                                                                        ><i class="icon-users"></i></a>
                                                                    </button>
                                                                    <button onclick="pipeline('<?= $v['id'] ?>')"
                                                                            style="background: #0a6aa1" class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5
                                                            button-edit"
                                                                            data-toggle="tooltip"
                                                                            data-original-title="Edit">
                                                                        <i class="icon-pencil" aria-hidden="true">
                                                                        </i>
                                                                    </button>
                                                                    <button style="background: red"
                                                                            class="btn btn-sm btn-icon btn-pure btn-default on-default                                                                                          button-remove">
                                                                        <i class="icon-trash"
                                                                           aria-hidden="true"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    <?php } ?>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </fieldset>
                                </section>
                            </section>
                            <h2>Work Readiness</h2>
                            <section style="width: 100%">
                                <section>
                                    <fieldset>
                                        <div class="row clearfix">
                                            <div class="col-lg-12 col-md-12">
                                                <table class="table table-bordered table-hover table-striped"
                                                       id="myTable">
                                                    <thead>
                                                    <tr style="background-color: #ffffff">
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Cv</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach ($seeker_data as $v) { ?>
                                                        <?php if ($v['verification_status'] == 'Step3') { ?>
                                                            <tr>
                                                                <td><?= $v['s_first'] ?> <?= $v['s_last'] ?></td>
                                                                <td><?= $v['s_email'] ?></td>
                                                                <?php $link = (!empty($v['s_cv'])) ? base_url('csv_files') . "/" . $v['s_cv']
                                                                    : "Not 
                                                        Available" ?>
                                                                <td>
                                                                    <?= $v['s_cv'] ?>
                                                                    <a href="<?= (!empty($v['s_cv'])) ? base_url('csv_files') . "/" .
                                                                        $v['s_cv'] :
                                                                        "#" ?>" target="_blank">download</a>
                                                                </td>
                                                                <td>
                                                                    <button style="background: #0a6aa1" class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5
                                                            button-edit">
                                                                        <a href="<?= site_url('super/view/profile1') ?>/<?=
                                                                        $v['id'] ?>"
                                                                        ><i class="icon-users"></i></a>
                                                                    </button>
                                                                    <button onclick="pipeline('<?= $v['id'] ?>')"
                                                                            style="background: #0a6aa1" class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5
                                                            button-edit"
                                                                            data-toggle="tooltip"
                                                                            data-original-title="Edit">
                                                                        <i class="icon-pencil" aria-hidden="true">
                                                                        </i>
                                                                    </button>
                                                                    <button style="background: red"
                                                                            class="btn btn-sm btn-icon btn-pure btn-default on-default                                                                                          button-remove">
                                                                        <i class="icon-trash"
                                                                           aria-hidden="true"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    <?php } ?>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </fieldset>
                                </section>
                            </section>
                            <h2>Mock Interview</h2>
                            <section style="width: 100%">
                                <section>
                                    <fieldset>
                                        <div class="row clearfix">
                                            <div class="col-lg-12 col-md-12">
                                                <table class="table table-bordered table-hover table-striped"
                                                       id="myTable">
                                                    <thead>
                                                    <tr style="background-color: #ffffff">
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Cv</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach ($seeker_data as $v) { ?>
                                                        <?php if ($v['verification_status'] == 'Step4') { ?>
                                                            <tr style="background-color: #F7F7F7">
                                                                <td><?= $v['s_first'] ?> <?= $v['s_last'] ?></td>
                                                                <td><?= $v['s_email'] ?></td>
                                                                <?php $link = (!empty($v['s_cv'])) ? base_url('csv_files') . "/" . $v['s_cv']
                                                                    : "Not 
                                                        Available" ?>
                                                                <td>
                                                                    <?= $v['s_cv'] ?>
                                                                    <a href="<?= (!empty($v['s_cv'])) ? base_url('csv_files') . "/" .
                                                                        $v['s_cv'] :
                                                                        "#" ?>" target="_blank">download</a>
                                                                </td>
                                                                <td>
                                                                    <button style="background: #0a6aa1" class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5
                                                            button-edit">
                                                                        <a href="<?= site_url('super/view/profile1') ?>/<?= $v['id'] ?>"
                                                                        ><i class="icon-users"></i></a>
                                                                    </button>
                                                                    <button onclick="pipeline('<?= $v['id'] ?>')" style="background:
                                                                    #0a6aa1" class="btn btn-sm btn-icon btn-pure btn-default
                                                                    on-default m-r-5
                                                            button-edit"
                                                                            data-toggle="tooltip"
                                                                            data-original-title="Edit">
                                                                        <i class="icon-pencil" aria-hidden="true">
                                                                        </i>
                                                                    </button>
                                                                    <button style="background: red"
                                                                            class="btn btn-sm btn-icon btn-pure btn-default on-default                                                                                          button-remove">
                                                                        <i class="icon-trash"
                                                                           aria-hidden="true"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    <?php } ?>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </fieldset>
                                </section>

                            </section>
                            <h2>Add Barriers </h2>
                            <section style="width: 100%">
                                <section>
                                    <fieldset>
                                        <div class="row clearfix">
                                            <div class="col-lg-12 col-md-12">
                                                <table class="table table-bordered table-hover table-striped"
                                                       id="myTable">
                                                    <thead>
                                                    <tr style="background-color: #ffffff">
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Cv</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach ($seeker_data as $v) { ?>
                                                        <?php if ($v['verification_status'] == 'Step5') { ?>
                                                            <tr style="background-color: #F7F7F7">
                                                                <td><?= $v['s_first'] ?> <?= $v['s_last'] ?></td>
                                                                <td><?= $v['s_email'] ?></td>
                                                                <?php $link = (!empty($v['s_cv'])) ? base_url('csv_files') . "/" . $v['s_cv']
                                                                    : "Not 
                                                        Available" ?>
                                                                <td>
                                                                    <?= $v['s_cv'] ?>
                                                                    <a href="<?= (!empty($v['s_cv'])) ? base_url('csv_files') . "/" .
                                                                        $v['s_cv'] :
                                                                        "#" ?>" target="_blank">download</a>
                                                                </td>
                                                                <td>
                                                                    <button style="background: #0a6aa1" class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5
                                                            button-edit">
                                                                        <a href="<?= site_url('super/view/profile1') ?>/<?= $v['id'] ?>"
                                                                        ><i class="icon-users"></i></a>
                                                                    </button>
                                                                    <button style="background: #0a6aa1" class="btn btn-sm btn-icon btn-pure btn-default
                                                                    on-default m-r-5 button-edit"
                                                                            data-toggle="tooltip"
                                                                            data-original-title="Edit"
                                                                            onclick="pipeline('<?= $v['id'] ?>')"
                                                                    >
                                                                        <i class="icon-pencil" aria-hidden="true">
                                                                        </i>
                                                                    </button>
                                                                    <button style="background: red"
                                                                            class="btn btn-sm btn-icon btn-pure btn-default on-default                                                                                          button-remove">
                                                                        <i class="icon-trash"
                                                                           aria-hidden="true"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    <?php } ?>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </fieldset>
                                </section>

                            </section>

                            <h2> Ready For Work</h2>
                            <section style="width: 100%">
                                <section>
                                    <fieldset>
                                        <div class="row clearfix">
                                            <div class="col-lg-12 col-md-12">
                                                <table class="table table-bordered table-hover table-striped"
                                                       id="myTable">
                                                    <thead>
                                                    <tr style="background-color: #ffffff">
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Cv</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach ($seeker_data as $v) { ?>
                                                        <?php if ($v['verification_status'] == 'Step6') { ?>
                                                            <tr style="background-color: #F7F7F7">
                                                                <td><?= $v['s_first'] ?> <?= $v['s_last'] ?></td>
                                                                <td><?= $v['s_email'] ?></td>
                                                                <?php $link = (!empty($v['s_cv'])) ? base_url('csv_files') . "/" . $v['s_cv']
                                                                    : "Not 
                                                        Available" ?>
                                                                <td>
                                                                    <?= $v['s_cv'] ?>
                                                                    <a href="<?= (!empty($v['s_cv'])) ? base_url('csv_files') . "/" .
                                                                        $v['s_cv'] :
                                                                        "#" ?>" target="_blank">download</a>
                                                                </td>
                                                                <td>
                                                                    <button style="background: #0a6aa1" class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5
                                                            button-edit">
                                                                        <a href="<?= site_url('super/view/profile1') ?>/<?= $v['id'] ?>"
                                                                        ><i class="icon-users"></i></a>
                                                                    </button>
                                                                    <button onclick="pipeline('<?= $v['id'] ?>')"
                                                                            style="background: #0a6aa1" class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5
                                                            button-edit"
                                                                            data-toggle="tooltip"
                                                                            data-original-title="Edit">
                                                                        <i class="icon-pencil" aria-hidden="true">
                                                                        </i>
                                                                    </button>
                                                                    <button style="background: red"
                                                                            class="btn btn-sm btn-icon btn-pure btn-default on-default                                                                                          button-remove">
                                                                        <i class="icon-trash"
                                                                           aria-hidden="true"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    <?php } ?>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </fieldset>
                                </section>

                            </section>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="conf">
</div>
<script>

    function pipeline(id) {
        $.post("<?= site_url('super/ModalStatus')?>", {id: id}, function (e) {
            $('.conf').html(e);
            $("#modal").modal();
        })
    }
</script>
<script src="<?= base_url('assets_b') ?>/vendor/jquery-validation/jquery.validate.js"></script> <!-- Jquery Validation Plugin Css -->
<script src="<?= base_url('assets_b') ?>/vendor/jquery-steps/jquery.steps.js"></script> <!-- JQuery Steps Plugin Js -->
