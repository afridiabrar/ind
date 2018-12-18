<script>
    $(document).ready(function () {
        $("ul#main-menu > li > a > span:contains('Applicant')").parent().parent().addClass("active");
        $("ul#main-menu > li > ul > li > a > span:contains('Edit Applicant')").parent().parent().addClass("active");
    });
</script>
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-12">
                    <h2>Application Registration Page</h2>
                </div>
                <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                    <ul class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="<?= site_url('super/view') ?>"><i
                                        class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">Admin</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <!--<div class="header">
                        <h2>Application Registration Page</h2>
                    </div>-->
                    <?php if(!empty($msg)){ ?>
                        <span style="width: 100%" class="btn btn-primary"><?= $msg ?></span>
                    <?php }?>
                    <div class="body">
                        <?= form_open_multipart('super/EditSeeker/'.$seeker_dataa[0]['id']) ?>
                        <div class="row">
                            <div class="col-md-2 text-center">
                                <label style="margin-top: 5px">First Name</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="s_first" value="<?= $seeker_dataa[0]['s_first'] ?>"
                                       class="form-control">
                            </div>
                            <div class="col-md-2 text-center">
                                <label style="margin-top: 5px">Last Name</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="s_last" class="form-control" value="<?= $seeker_dataa[0]['s_last'] ?>">
                            </div>
                        </div>
                        <div class="row" style="margin-top: 5px">
                            <div class="col-md-2 text-center">
                                <label style="margin-top: 5px">Email</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="s_email" class="form-control" value="<?= $seeker_dataa[0]['s_email'] ?>">
                            </div>
                            <div class="col-md-2 text-center">
                                <label style="margin-top: 5px">Gender</label>
                            </div>
                            <div class="col-md-4">
                                <select class="form-control" name="s_gender">
                                    <option hidden>Select Gender</option>
                                    <option value="Male" <?= $seeker_dataa[0]['s_gender'] == 'Male' ? "selected" : "" ?>>Male</option>
                                    <option value="Female" <?= $seeker_dataa[0]['s_gender'] == 'Femail' ? "selected" : "" ?>>Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 5px">
                            <div class="col-md-2 text-center">
                                <label style="margin-top: 5px">Date Of Birth</label>
                            </div>
                            <div class="col-md-4">
                                <input type="date" class="form-control" name="s_dob" value="<?= $seeker_dataa[0]['s_dob'] ?>">
                            </div>
                            <div class="col-md-2 text-center">
                                <label style="margin-top: 5px">National Id</label>
                            </div>
                            <div class="col-md-4">
                                <input type="number" name="s_national_id" class="form-control" value="<?= $seeker_dataa[0]['s_national_id']
                                ?>">
                            </div>
                        </div>
                        <div class="row" style="margin-top: 5px">
                            <div class="col-md-2 text-center">
                                <label style="margin-top: 5px">Marital Status</label>
                            </div>
                            <div class="col-md-4">
                                <select name="s_marital" class="select-md form-control">
                                    <option hidden>Select Marital Status</option>
                                    <option value="Single" <?= $seeker_dataa[0]['s_marital'] == 'Single' ? "selected" : "" ?>>Single</option>
                                    <option value="Married" <?= $seeker_dataa[0]['s_marital'] == 'Married' ? "selected" : ""
                                    ?>>Married</option>
                                </select>
                            </div>
                            <div class="col-md-2 text-center">
                                <label style="margin-top: 5px">Contact</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="s_contact" value="<?= $seeker_dataa[0]['s_contact'] ?>">
                            </div>
                        </div>
                        <div class="row" style="margin-top: 5px">
                            <div class="col-md-2 text-center">
                                <label style="margin-top: 5px">State</label>
                            </div>
                            <div class="col-md-4">
                                <select name="s_state" required class="form-control">
                                    <option hidden>Select State</option>
                                    <option value="aci" <?= $seeker_dataa[0]['s_state'] == "aci" ? "selected" : ""?> >
                                        Ashmore and Cartier Islands</option>
                                    <option value="aat" <?= $seeker_dataa[0]['s_state'] == "aat" ? "selected" : ""?> >
                                        Australian Antarctic Territory</option>
                                    <option value="act" <?= $seeker_dataa[0]['s_state'] == "act" ? "selected" : ""?>>
                                        Australian Capital Territory</option>
                                    <option value="ci" <?= $seeker_dataa[0]['s_state'] == "ci" ? "selected" : ""?>>
                                        Christmas Island</option>
                                    <option value="ki" <?= $seeker_dataa[0]['s_state'] == "ki" ? "selected" : ""?>>
                                        Cocos (Keeling) Islands</option>
                                    <option value="csi" <?= $seeker_dataa[0]['s_state'] == "csi" ? "selected" : ""?>>
                                        Coral Sea Islands</option>
                                    <option value="himi" <?= $seeker_dataa[0]['s_state'] == "himi" ? "selected" : ""?>>
                                        Heard Island and McDonald Islands</option>
                                    <option value="jb" <?= $seeker_dataa[0]['s_state'] == "jb" ? "selected" : ""?>>
                                        Jervis Bay Territory</option>
                                    <option value="nsw" <?= $seeker_dataa[0]['s_state'] == "nsw" ? "selected" : ""?>>
                                        New South Wales</option>
                                    <option value="ni" <?= $seeker_dataa[0]['s_state'] == "ni" ? "selected" : ""?>>
                                        Norfolk Island</option>
                                    <option value="nt" <?= $seeker_dataa[0]['s_state'] == "nt" ? "selected" : ""?>>
                                        Northern Territory</option>
                                    <option value="qld" <?= $seeker_dataa[0]['s_state'] == "qld" ? "selected" : ""?>>
                                        Queensland</option>
                                    <option value="sa" <?= $seeker_dataa[0]['s_state'] == "sa" ? "selected" : ""?>
                                    >South Australia</option>
                                    <option value="tas" <?= $seeker_dataa[0]['s_state'] == "tas" ? "selected" : ""?>
                                    >Tasmania</option>
                                    <option value="vic" <?= $seeker_dataa[0]['s_state'] == "vic" ? "selected" : ""?>>
                                        Victoria</option>
                                    <option value="wa" <?= $seeker_dataa[0]['s_state'] == "wa" ? "selected" : ""?>>
                                        Western Australia</option>
                                </select>
                            </div>
                            <div class="col-md-2 text-center">
                                <label style="margin-top: 5px">Industry</label>
                            </div>
                            <div class="col-md-4">
                                <select name="s_industry" required class="form-control">
                                    <?php foreach ($industry as $v) { ?>
                                        <option value="<?= $v['industry'] ?>"><?= $v['industry'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 5px">
                            <div class="col-md-2 text-center">
                                <label style="margin-top: 5px">Address</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="s_address" class="form-control" value="<?= $seeker_dataa[0]['s_first'] ?>">
                            </div>
                            <div class="col-md-2 text-center">
                                <label style="margin-top: 5px">Upload C.v</label>
                            </div>
                            <div class="col-md-4">
                                <input type="file"  name="s_cv" class="form-control">
                                <?= $seeker_dataa[0]['s_cv'] ?>

                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary pull-right" style="margin: 20px;width: 10%">Submit</button>
                        <?= form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

