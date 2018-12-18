<script>
    $(document).ready(function () {
        $("ul#main-menu > li > a > span:contains('Applicant')").parent().parent().addClass("active");
        $("ul#main-menu > li > ul > li > a > span:contains('Create Applicant')").parent().parent().addClass("active");
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
                        <?= form_open_multipart('super/AddSeeker') ?>
                        <div class="row">
                            <div class="col-md-2 text-center">
                                <label style="margin-top: 5px">First Name</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="s_first" class="form-control" placeholder="First Name">
                            </div>
                            <div class="col-md-2 text-center">
                                <label style="margin-top: 5px">Last Name</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="s_last" class="form-control" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="row" style="margin-top: 5px">
                            <div class="col-md-2 text-center">
                                <label style="margin-top: 5px">Email</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="s_email" class="form-control" placeholder="abc@gmail.com">
                            </div>
                            <div class="col-md-2 text-center">
                                <label style="margin-top: 5px">Gender</label>
                            </div>
                            <div class="col-md-4">
                                <select class="form-control" name="s_gender">
                                    <option hidden>Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 5px">
                            <div class="col-md-2 text-center">
                                <label style="margin-top: 5px">Date Of Birth</label>
                            </div>
                            <div class="col-md-4">
                                <input type="date" class="form-control" name="s_dob">
                            </div>
                            <div class="col-md-2 text-center">
                                <label style="margin-top: 5px">National Id</label>
                            </div>
                            <div class="col-md-4">
                                <input type="number" name="s_national_id" class="form-control" placeholder="123">
                            </div>
                        </div>
                        <div class="row" style="margin-top: 5px">
                            <div class="col-md-2 text-center">
                                <label style="margin-top: 5px">Marital Status</label>
                            </div>
                            <div class="col-md-4">
                                <select name="s_marital" class="select-md form-control">
                                    <option hidden>Select Marital Status</option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                </select>
                            </div>
                            <div class="col-md-2 text-center">
                                <label style="margin-top: 5px">Contact</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="s_contact">
                            </div>
                        </div>
                        <div class="row" style="margin-top: 5px">
                            <div class="col-md-2 text-center">
                                <label style="margin-top: 5px">State</label>
                            </div>
                            <div class="col-md-4">
                                <select name="s_state" required class="form-control">
                                    <option value="aci">Ashmore and Cartier Islands</option>
                                    <option value="aat">Australian Antarctic Territory</option>
                                    <option value="act">Australian Capital Territory</option>
                                    <option value="ci">Christmas Island</option>
                                    <option value="ki">Cocos (Keeling) Islands</option>
                                    <option value="csi">Coral Sea Islands</option>
                                    <option value="himi">Heard Island and McDonald Islands</option>
                                    <option value="jb">Jervis Bay Territory</option>
                                    <option value="nsw">New South Wales</option>
                                    <option value="ni">Norfolk Island</option>
                                    <option value="nt">Northern Territory</option>
                                    <option value="qld">Queensland</option>
                                    <option value="sa">South Australia</option>
                                    <option value="tas">Tasmania</option>
                                    <option value="vic">Victoria</option>
                                    <option value="wa">Western Australia</option>
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
                                <input type="text" name="s_address" class="form-control" placeholder="Address">
                            </div>
                            <div class="col-md-2 text-center">
                                <label style="margin-top: 5px">Upload C.v</label>
                            </div>
                            <div class="col-md-4">
                                <input type="file" required name="s_cv" class="form-control">
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

