<script>
    $(document).ready(function(){
        $("ul#main-menu > li > a > span:contains('Training')").parent().parent().addClass("active");
        $("ul#main-menu > li > ul > li > a > span:contains('Create Training')").parent().parent().addClass("active");
    });
</script>
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-12">
                    <h2>Training </h2>
                </div>
                <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                    <ul class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="<?= site_url('super/view')?>"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">Admin</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12">
                <?php if(!empty($msg)) { ?>
                    <span style="width: 100%" class="btn btn-success"><?= $msg ?></span>
                <?php } ?>
                <div class="card">
                    <!--<div class="header">
                        <h2>Application Registration Page</h2>
                    </div>-->
                    <?= form_open('super/CreateTraining') ?>
                    <div class="body">
                      <div class="row">
                          <div class="col-md-2 text-center">
                              <label  style="margin-top: 5px">Training Name</label>
                          </div>
                          <div class="col-md-4">
                              <input type="text" class="form-control" name="t_title" placeholder="Name">
                          </div>
                          <div class="col-md-2 text-center">
                              <label  style="margin-top: 5px">Training Attending</label>
                          </div>
                          <div class="col-md-4">
                              <input type="text" class="form-control" name="t_attending">
                          </div>
                      </div>
                        <div class="row" style="margin-top: 5px">
                            <div class="col-md-2 text-center">
                                <label  style="margin-top: 5px">training Objective</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="t_objective">
                            </div>
                            <div class="col-md-2 text-center">
                                <label  style="margin-top: 5px">Type</label>
                            </div>
                            <div class="col-md-4">
                                <select name="t_type" class="form-control">
                                    <option value="skill development">Skill development</option>
                                    <option value="IT">IT</option>
                                    <option value="session">Session</option>
                                </select>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 5px">
                            <div class="col-md-2 text-center">
                                <label  style="margin-top: 5px">Trainer Name</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="t_instructor">
                            </div>
                            <div class="col-md-2 text-center">
                                <label  style="margin-top: 5px">Location</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="t_location">
                            </div>
                        </div>
                        <div class="row" style="margin-top: 5px">
                            <div class="col-md-2 text-center">
                                <label  style="margin-top: 5px">Outcome</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="t_outcome">
                            </div>

                            <div class="col-md-2 text-center">
                                <label  style="margin-top: 5px">Training Duration</label>
                            </div>

                            </hr>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="t_duration">
                            </div>
                            <div class="col-md-2 text-center">
                                <label  style="margin-top: 5px">Course Name</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="course_name">
                            </div>
                            <div class="col-md-2 text-center">
                                <label  style="margin-top: 5px">Course Type</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="course_type">
                            </div>
                            <div class="col-md-2 text-center">
                                <label  style="margin-top: 5px">Course Training</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="course_training">
                            </div>
                            <div class="col-md-2 text-center">
                                <label  style="margin-top: 5px">Course Duration</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="course_duration">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary pull-right" style="margin: 20px">Submit</button>
                    </div>
                    <?=  form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>

