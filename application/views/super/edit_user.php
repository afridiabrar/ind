<?php $v = $e_user[0] ?>
<script>
    $(document).ready(function () {
        $("ul#main-menu > li > a > span:contains('Users')").parent().parent().addClass("active");
        $("ul#main-menu > li > ul > li > a > span:contains('edit_user')").parent().parent().addClass("active");
    });
</script>
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-12">
                    <h2>User  Page</h2>
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
                    <?php if(!empty($msg)){ ?>
                        <span style="width: 100%" class="btn btn-primary"><?= $msg ?></span>
                    <?php }?>
                    <div class="body">
                        <?= form_open_multipart('super/EditAdmin/'.$v['id']) ?>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="First_Name">First Name</label>
                                            <input type="text" value="<?= $v['fname']?>"
                                                   class="form-control" id="fname" name="fname"">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="lname">Last Name</label>
                                            <input type="text" value="<?= $v['lname']?>"
                                                   class="form-control" id="lname" name="lname" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="contact">Contact</label>
                                            <input type="tel" value="<?= $v['contact'] ?>"
                                                   class="form-control" id="contact" name="contact" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" value="<?= $v['email'] ?>" class="form-control" id="email" name="email" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" value="<?= $v['username'] ?>" class="form-control"
                                                   id="username" name="username">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="type">Designation</label>
                                            <input type="text" value="<?= $v['type'] ?>" class="form-control" name="type">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12" >
                                        <label for="password">Password</label>
                                        <input type="text" class="form-control" value="<?= $v['password']?>" style="margin-bottom:14px"
                                               name="password">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Users">Employer</label>
                                            <select name="employer_page" id="production" class="form-control">
                                                <option hidden>Select</option>
                                                <option value="Yes" <?= $v['employer_page'] == 'Yes' ? "selected" : "" ?>>Yes</option>
                                                <option value="No" <?= $v['employer_page'] == 'No' ? "selected" : "" ?>>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Projects">Events</label>
                                            <select name="project" id="expenses" class="form-control">
                                                <option hidden>Select</option>
                                                <option value="Yes" <?= $v['project'] == 'Yes' ? "selected" : "" ?>>Yes</option>
                                                <option value="No" <?= $v['project'] == 'No' ? "selected" : "" ?>>No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Users">Contact</label>
                                            <select name="users" id="production" class="form-control">
                                                <option hidden>Select</option>
                                                <option value="Yes" <?= $v['users'] == 'Yes' ? "selected" : "" ?>>Yes</option>
                                                <option value="No" <?= $v['users'] == 'No' ? "selected" : "" ?>>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Projects">Projects</label>
                                            <select name="project" id="expenses" class="form-control">
                                                <option hidden>Select</option>
                                                <option value="Yes" <?= $v['project'] == 'Yes' ? "selected" : "" ?>>Yes</option>
                                                <option value="No" <?= $v['project'] == 'No' ? "selected" : "" ?>>No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Applicant">Applicant</label>
                                            <select name="applicant" id="lead_generator" class="form-control">
                                                <option hidden>Select</option>
                                                <option value="Yes" <?= $v['applicant'] == 'Yes' ? "selected" : "" ?>>Yes</option>
                                                <option value="No" <?= $v['applicant'] == 'No' ? "selected" : "" ?>>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Industry">Industry</label>
                                            <select name="industry" id="mktng_rep" class="form-control">
                                                <option hidden>Select</option>
                                                <option value="Yes" <?= $v['industry'] == 'Yes' ? "selected" : "" ?>>Yes</option>
                                                <option  value="No" <?= $v['industry'] == 'No' ? "selected" : "" ?>>No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Training">Training</label>
                                            <select name="training" id="mktng_mgr" class="form-control">
                                                <option hidden>Select</option>
                                                <option value="Yes" <?= $v['training'] == 'Yes' ? "selected" : "" ?>>Yes</option>
                                                <option value="No"  <?= $v['training'] == 'No' ? "selected" : "" ?>>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Invoice">Invoice</label>
                                            <select name="invoice" id="mktng_approver" class="form-control">
                                                <option hidden>Select</option>
                                                <option value="Yes" <?= $v['invoice'] == 'Yes' ? "selected" : "" ?>>Yes</option>
                                                <option value="No"  <?= $v['invoice'] == 'No' ? "selected" : "" ?>>No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Campaign">Campaign</label>
                                                <select name="campaign" id="client_access" class="form-control">
                                                <option hidden>Select</option>
                                                <option value="Yes" <?= $v['campaign'] == 'Yes' ? "selected" : "" ?>>Yes</option>
                                                <option value="No"  <?= $v['campaign'] == 'No' ? "selected" : "" ?>>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Email">Email Template</label>
                                            <select name="template" id="marketing_access" class="form-control">
                                                <option hidden>Select</option>
                                                <option <?= $v['template'] == 'Yes' ? "selected" : "" ?>>Yes</option>
                                                <option <?= $v['template'] == 'No' ? "selected" : "" ?>>No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Supplier">Supplier</label>
                                            <select name="supplier" id="projects_access" class="form-control">
                                                <option hidden>Select</option>
                                                <option value="Yes" <?= $v['supplier'] == 'Yes' ? "selected" : "" ?>>Yes</option>
                                                <option value="No" <?= $v['supplier'] == 'No' ? "selected" : "" ?>>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Supplier">User Status</label>
                                            <select name="status" id="projects_access" class="form-control">
                                                <option hidden>Select</option>
                                                <option value="Active" <?= $v['status'] == 'Active' ? "selected" : "" ?>>Active</option>
                                                <option value="InActive" <?= $v['status'] == 'InActive' ? "selected" : ""
                                                ?>>InActive</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <img src="<?= base_url('csv_files/').$v['image'] ?>"
                                     class="img-fluid" style="border: 2px solid #000;height: 250px">
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-primary pull-right" type="submit">Update</button>
                        <?= form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

