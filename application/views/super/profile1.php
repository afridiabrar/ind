<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-lg-5 col-md-8 col-sm-12">
                    <h2>Seeker Profile</h2>
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
                    <div class="body">
                        <div class="form-group">
                            <h4 style="text-align: center"><?= $seeker_dataa[0]['s_first'] ?> <?= $seeker_dataa[0]['s_last'] ?></h4>
                            <div class="col-xs-6 pull-right">
                                <label for="first_name"><h4>Verification Status</h4></label>
                                <select name="verification_status" onchange="seeker()"
                                        class="form-control" style="background: #DC2427;color:
                                         white;margin-bottom: 15px;">
                                    <option selected>Select Verification Step</option>
                                    <option value="Step1" <?= $seeker_dataa[0]['verification_status'] == 'Step1' ? "selected" : "" ?>>
                                        Cv Information
                                    </option>
                                    <option value="Step2"
                                        <?= $seeker_dataa[0]['verification_status'] == 'Step2' ? "selected" : "" ?>
                                    >Reference Check & Police Verification
                                    </option>
                                    <option value="Step3"
                                        <?= $seeker_dataa[0]['verification_status'] == 'Step3' ? "selected" : "" ?>>
                                        Work Readiness
                                    </option>
                                    <option value="Step4"
                                        <?= $seeker_dataa[0]['verification_status'] == 'Step4' ? "selected" : "" ?>
                                    >Mock Interview
                                    </option>
                                    <option
                                            value="Step5"
                                        <?= $seeker_dataa[0]['verification_status'] == 'Step5' ? "selected" : "" ?>
                                    >Address Barriers
                                    </option>
                                    <option value="Step6"
                                        <?= $seeker_dataa[0]['verification_status'] == 'Step6' ? "selected" : "" ?>>
                                        Job Seeker Ready
                                    </option>
                                    <option value="Step7"
                                        <?= $seeker_dataa[0]['verification_status'] == 'Step7' ? "selected" : "" ?>>
                                        Completed
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div id="wizard_horizontal">
                            <h2>Basic Info</h2>
                            <section style="width: 100%">
                                <form class="form"
                                      action="<?= site_url('super/AddInfo') ?>/<?= $seeker_dataa[0]['id'] ?>"
                                      method="post" id="registrationForm">
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <label for="first_name" class=""><h4>First name</h4></label>
                                            <input style="width: 85%;float: right" readonly type="text"
                                                   class="form-control"
                                                   name="s_last" value="<?= $seeker_dataa[0]['s_first'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="last_name"><h4>Last name</h4></label>
                                            <input style="width: 85%;float: right" type="text" class="form-control"
                                                   readonly name="s_last" value="<?= $seeker_dataa[0]['s_last'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <div class="col-xs-6">
                                            <label for="phone"><h4>Email</h4></label>
                                            <input style="width: 85%;float: right" type="text" class="form-control"
                                                   readonly name="s_email" value="<?= $seeker_dataa[0]['s_email'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="mobile"><h4>Contact</h4></label>
                                            <input style="width: 85%;float: right" type="text" class="form-control"
                                                   readonly name="s_contact"
                                                   value="<?= $seeker_dataa[0]['s_contact'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="email"><h4>Location</h4></label>
                                            <input style="width: 85%;float: right" type="text"
                                                   readonly value="<?= $seeker_dataa[0]['s_state'] ?>"
                                                   class="form-control"
                                                   name="s_state">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="email"><h4>Industry</h4></label>
                                            <input style="width: 85%;float: right" type="text"
                                                   readonly value="<?= $seeker_dataa[0]['s_industry'] ?>"
                                                   class="form-control"
                                                   name="s_industry">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="email"><h4>Cv</h4></label>
                                            <a style="width: 85%;float: right" type="text" target="_blank"
                                               href="<?= base_url('csv_files') ?>/<?=
                                               $seeker_dataa[0]['s_cv'] ?>" class="form-control"
                                               name="s_industry">
                                                Click here to Open Cv
                                            </a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="email"><h5>Rating</h5></label>
                                            <select name="info_rating" style="width: 85%;float: right"
                                                    class="form-control" required>
                                                <option value="1"
                                                    <?= (!empty($info_seeker[0]['info_rating'])) == "1" ? "selected" : "" ?>>
                                                    1
                                                </option>
                                                <option value="2"
                                                    <?= (!empty($info_seeker[0]['info_rating'])) == "2" ? "selected" : "" ?>
                                                >2
                                                </option>
                                                <option value="3"
                                                    <?= (!empty($info_seeker[0]['info_rating'])) == "3" ? "selected" : "" ?>
                                                >3
                                                </option>
                                                <option value="4"
                                                    <?= (!empty($info_seeker[0]['info_rating'])) == "4" ? "selected" : "" ?>
                                                >4
                                                </option>
                                                <option value="5"
                                                    <?= (!empty($info_seeker[0]['info_rating'])) == "5" ? "selected" : "" ?>
                                                >5
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="email"><h5>Notes</h5></label>
                                            <textarea class="form-control" style="width: 85%;float: right"
                                                      name="info_note"
                                                      rows="3"><?= (!empty($info_seeker[0]['info_note']) ? $info_seeker[0]['info_note'] : "")
                                                ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <br>
                                            <?php if (empty($info_seeker[0]['id'])) { ?>
                                                <button style="margin-top: 10px"
                                                        class="btn btn-lg btn-success pull-right" type="submit"><i
                                                            class="icon-user"></i> Save
                                                </button>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </form>
                            </section>
                            <h2>Education</h2>
                            <section style="width: 100%">
                                <form class="form"
                                      action="<?= site_url('super/InfoChange') ?>/<?= $seeker_dataa[0]['id'] ?>"
                                      method="post" id="registrationForm">
                                    <h3 style="text-align: center">Education</h3>
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <label for="first_name" class=""><h4>School</h4></label>
                                            <input style="width: 85%;float: right" required type="text"
                                                   class="form-control"
                                                   value="<?= (!empty($info_seeker[0]['school'])) ? $info_seeker[0]['school'] : "" ?>"
                                                   name="school">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <label for="first_name" class=""><h4>Field of Study</h4></label>
                                            <input style="width: 85%;float: right" required type="text"
                                                   class="form-control" name="field"
                                                   value="<?= (!empty($info_seeker[0]['field'])) ?
                                                       $info_seeker[0]['field'] : "" ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <label for="first_name" class=""><h4>Degree</h4></label>
                                            <input style="width: 85%;float: right" type="text"
                                                   class="form-control" name="degree"
                                                   value="<?= (!empty($info_seeker[0]['degree'])) ?
                                                       $info_seeker[0]['degree'] : "" ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <div class="row" style="position: relative;left:16%">
                                                <div class="col-xs-3">
                                                    <input type="text" class="form-control" name="degree_year"
                                                           placeholder="Enter year"
                                                           value="<?= (!empty($info_seeker[0]['degree_year'])) ?
                                                               $info_seeker[0]['degree_year'] : "" ?>">
                                                </div>
                                                <div class="col-xs-2">
                                                    <input type="text" class="form-control" name="degree_month"
                                                           placeholder="Enter Month eg 12"
                                                           value="<?= (!empty($info_seeker[0]['degree_month'])) ?
                                                               $info_seeker[0]['degree_month'] : "" ?> ">
                                                </div>
                                                <div class="col-xs-2">
                                                    <h5 style="margin-left: 14px;margin-right: 13px;">To</h5>
                                                </div>
                                                <div class="col-xs-3">
                                                    <input type="text" class="form-control" name="to_year"
                                                           placeholder="Enter year"
                                                           value="<?= (!empty($info_seeker[0]['to_year'])) ?
                                                               $info_seeker[0]['to_year'] : "" ?>">
                                                </div>
                                                <div class="col-xs-2">
                                                    <input type="text" class="form-control" name="to_month"
                                                           placeholder="Enter Month eg 12"
                                                           value="<?= (!empty($info_seeker[0]['to_month'])) ?
                                                               $info_seeker[0]['to_month'] : "" ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="inner-section">
                                        <h3 style="text-align: center">Employment</h3>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <label for="first_name" class=""><h4>Company</h4></label>
                                                <input style="width: 85%;float: right" type="text"
                                                       class="form-control" name="emp_company"
                                                       value="<?= (!empty($info_seeker[0]['emp_company'])) ?
                                                           $info_seeker[0]['emp_company'] : "" ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                    <label for="first_name" class=""><h4>Job Title</h4></label>
                                                <input style="width: 85%;float: right" type="text"
                                                       class="form-control" name="job_title"
                                                       value="<?= (!empty ($info_seeker[0]['job_title'])) ? $info_seeker[0]['job_title']
                                                           : "" ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                    <label for="first_name" class=""><p>Expected Salary</p></label>
                                                <input style="width: 85%;float: right" type="text"
                                                       class="form-control" name="salary"
                                                       value="<?= (!empty ($info_seeker[0]['salary']))
                                                    ? $info_seeker[0]['salary'] : "" ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <label for="first_name" class=""><h4>Experience</h4></label>
                                                <div class="row" style="position: relative;left:16%;bottom: 40px;">
                                                    <div class="col-xs-5">
                                                        <input type="text" class="form-control" name="job_year_to"
                                                               placeholder="Enter year"
                                                               value="<?= (!empty($info_seeker[0]['job_year_to'])) ?
                                                                   $info_seeker[0]['job_year_to'] : "" ?>">
                                                    </div>
                                                    <div class="col-xs-2">
                                                        <h5 style="margin-left: 14px;margin-right: 13px;">To</h5>
                                                    </div>
                                                        <div class="col-xs-5">
                                                        <input type="text" class="form-control" name="job_year_from"
                                                               placeholder="Enter year"
                                                               value="<?= (!empty($info_seeker[0]['job_year_from'])) ?
                                                                   $info_seeker[0]['job_year_from'] : "" ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <label for="first_name" class=""><h4>Summary</h4></label>
                                                <input style="width: 85%;float: right" type="text"
                                                       class="form-control" name="summary"
                                                       value="<?= (!empty($info_seeker[0]['summary'])) ?
                                                           $info_seeker[0]['summary'] : "" ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <button class="btn btn-primary"
                                                        style="position: absolute;right: 6px;width: 10%">save
                                                </button>
                                            </div>
                                        </div>
                                </form>
                        </div>
                        </section>
                        <h2>Assement</h2>
                        <section style=" width: 100%">
                            <section>
                                <form method="post"
                                      action="<?= site_url('super/UpdatePol') ?>/<?= $seeker_dataa[0]['id'] ?>">
                                    <fieldset>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="mobile"><h5 style="margin-left: 4px">Police Verification</h5></label>
                                                    <input name="police_check" style=" float:
                                                left;display: block;margin-top: 6px"
                                                           type="checkbox"
                                                        <?= (!empty($info_seeker[0]['police_check'])) == '1' ? "checked" : "" ?>>
                                                </div>
                                                <div class="col-md-9" >
                                                    <label for="mobile"><h5 style="margin-left: 4px">Character Verification </h5></label>
                                                    <input style="float:
                                                left;display: block;margin-top: 6px"
                                                           name="police_char"
                                                           type="checkbox"
                                                        <?= (!empty($info_seeker[0]['police_char'])) == '1' ? "checked" : "" ?>>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-10">
                                                <label for="email"><h4> Notes</h4></label>
                                                <textarea class="form-control" style=" width: 85%;float: right"
                                                          name="police_note"
                                                          rows="4"><?= (!empty($info_seeker[0]['police_note'])) == '1' ?
                                                        $info_seeker[0]['police_note']
                                                        : ""
                                                    ?></textarea>
                                            </div>
                                            <div class="col-md-2">
                                                <button style="background:
                                                    #3E4146;padding: 35px"
                                                        class="btn btn-lg btn-success pull-right" type="submit"><i
                                                            class="icon-user"></i> Save
                                                </button>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </section>
                            <div class="row" style="position: relative;top:5%">
                                <div class="col-md-6">
                                    <label><h4>Title</h4></label>
                                    <select class="form-control" onchange="test()" style=" width:419px;float: right;" name="testttt">
                                        <option>Please Select</option>
                                        <?php foreach ($question as $v) { ?>
                                            <option value="<?= $v['id'] ?>"><?= $v['title'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <a href="<?= site_url('super/view/form_builder')?>/<?= $seeker_dataa[0]['id'] ?>">
                                    <button type="button" class="btn btn-primary" style=" width: 365px;">Add Questions
                                    </button>
                                    </a>
                                </div>
                            </div>
                            <div class="checkkkk">

                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" action="<?= site_url('super/New_template/') . $seeker_dataa[0]['id'] ?>">
                <div class="modal-header">
                    <h4 class="title" id="largeModalLabel">Interview</h4>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Question Description</label>
                            <textarea class="form-control" name="ques"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Description Answer</label>
                            <textarea class="form-control" name="ans"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
                </div>
            </form>
        </div>

    </div>
</div>

<div class="conf"></div>
<script>
    function test() {
        var id = $("[name=testttt]").val();
        $.post("<?= site_url('super/ModalInterview')?>", {id: id}, function (e) {
            $('.checkkkk').html(e);
        })
    }
    function updateeeee(id)
    {
        var ques = $("[name=ques]").val();
        var ans = $("[name=ans]").val();
        $.post("<?= site_url('super/updateQuest')?>", {ques:ques,ans:ans,id: id}, function (e) {
            console.log(e);
            alertify.error('Answer Updated')

        })
    }

    function updateeeeemqs(id)
    {
        var question = $("[name=question]").val();
        var checkmc = $("[name=checkmc]:checked").val();
        console.log(checkmc);
        $.post("<?= site_url('super/updateMcq')?>", {question:question,checkmc:checkmc,id: id}, function (e) {
//            console.log(e);
          alertify.error('Updated')

        })
    }
    function seeker() {
        var status = $("[name=verification_status]").val();
        var id = '<?= $seeker_dataa[0]['id'] ?>';
        $.post("<?= site_url('super/changeStatus')?>", {status: status, id: id}, function (e) {
           // console.log(e);
           location.reload();
        });
    }
</script>
<script src="<?= base_url('assets_b') ?>/vendor/jquery-validation/jquery.validate.js"></script> <!-- Jquery Validation Plugin Css -->
<script src="<?= base_url('assets_b') ?>/vendor/jquery-steps/jquery.steps.js"></script> <!-- JQuery Steps Plugin Js -->
