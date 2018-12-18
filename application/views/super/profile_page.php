<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <!--/col-3-->
                <div class="col-sm-12">
                    <div class="tab-content">
                        <div class="tab-pane active" id="home">
                            <h3 style="text-align: center">Profile Page</h3>
                            <hr>
                            <h4 style="text-align: center"><?= $seeker_dataa[0]['s_first'] ?> <?= $seeker_dataa[0]['s_last'] ?></h4>
                            <hr>
                            <form class="form" action="<?= site_url('super/changeStatus')?>/<?= $seeker_dataa[0]['id'] ?>"
                                  method="post" id="registrationForm">
                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="first_name"><h4>Verification Status</h4></label>

                                        <select name="verification_status" class="form-control" style="background: #3b3e42;color:
                                         white">
                                            <option selected hidden>Verification Step</option>
                                            <option Step1"
                                                <?= $seeker_dataa[0]['verification_status'] == 'Step1' ? "selected" : "" ?>
                                            >Cv Information</option>
                                            <option Step2"
                                                <?= $seeker_dataa[0]['verification_status'] == 'Step2' ? "selected" : "" ?>
                                            >Reference Check & Police Verification</option>
                                            <option Step3"
                                                <?= $seeker_dataa[0]['verification_status'] == 'Step3' ? "selected" : "" ?>
                                            >Work Readiness</option>
                                            <option Step4"
                                                <?= $seeker_dataa[0]['verification_status'] == 'Step4' ? "selected" : "" ?>
                                            >Mock Interview</option>
                                            <option Step5"
                                                <?= $seeker_dataa[0]['verification_status'] == 'Step5' ? "selected" : "" ?>
                                            >Address Barriers</option>
                                            <option Step6"
                                                <?= $seeker_dataa[0]['verification_status'] == 'Step6' ? "selected" : "" ?>>
                                                Job Seeker Ready
                                            </option>
                                            <option Step7"
                                                <?= $seeker_dataa[0]['verification_status'] == 'Step7' ? "selected" : "" ?>>
                                                Completed
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <label for="first_name" class=""><h4>First name</h4></label>
                                        <input style="width: 85%;float: right" type="text" class="form-control" name="s_last"
                                        <?= $seeker_dataa[0]['s_first'] ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="last_name"><h4>Last name</h4></label>
                                        <input style="width: 85%;float: right" type="text" class="form-control" name="s_last" <?= $seeker_dataa[0]['s_last'] ?>">
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="phone"><h4>Email</h4></label>
                                        <input style="width: 85%;float: right" type="text" class="form-control" name="s_email" <?= $seeker_dataa[0]['s_email'] ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="mobile"><h4>Contact</h4></label>
                                        <input style="width: 85%;float: right" type="text" class="form-control" name="s_contact"
                                               <?= $seeker_dataa[0]['s_contact'] ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="email"><h4>Location</h4></label>
                                        <input style="width: 85%;float: right" type="text" <?= $seeker_dataa[0]['s_state'] ?>" class="form-control" name="s_state">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="email"><h4>Industry</h4></label>
                                        <input style="width: 85%;float: right" type="text" <?= $seeker_dataa[0]['s_industry'] ?>" class="form-control"
                                               name="s_industry">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="email"><h4>Cv</h4></label>
                                        <a style="width: 85%;float: right" type="text" target="_blank" href="<?= base_url('csv_files') ?>/<?=
                                        $seeker_dataa[0]['s_cv']?>" class="form-control"
                                               name="s_industry">
                                            Cv
                                        </a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <br>
                                        <button class="btn btn-lg btn-success" type="submit"><i
                                                    class="icon-user"></i> Save
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <hr>
                        </div><!--/tab-pane-->
                    </div><!--/tab-pane-->
                </div><!--/tab-content-->

            </div><!--/col-9-->
        </div>
    </div>
</div>