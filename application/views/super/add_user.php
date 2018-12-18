<script>
    $(document).ready(function () {
        $("ul#main-menu > li > a > span:contains('Users')").parent().parent().addClass("active");
        $("ul#main-menu > li > ul > li > a > span:contains('Create Users')").parent().parent().addClass("active");
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
                        <?= form_open_multipart('super/admin') ?>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="fname">First Name</label>
                                            <input type="text" class="form-control" id="fname" name="fname" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="lname">Last Name</label>
                                            <input type="text" class="form-control" id="lname" name="lname" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="contact">Contact</label>
                                            <input type="tel" class="form-control" id="contact" name="contact"  required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" required id="email" name="email">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" id="username" name="username" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="type">Designation</label>
                                            <input type="text" class="form-control" name="type" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6" >
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" required style="margin-bottom:14px" name="password">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="password">User Type</label>
                                        <select class="form-control" required="required" name="user_type">
                                            <option hidden disabled>Select User Type</option>
                                            <option value="Normal">Normal</option>
                                            <option value="ReadOnly">Read Only</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Users">Contacts</label>
                                            <select name="users" required id="production" class="form-control">
                                                <option hidden>Select</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Projects">Projects</label>
                                            <select name="project" class="form-control">
                                                <option hidden>Select</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Users">Employer</label>
                                            <select name="employer_page" class="form-control">
                                                <option hidden>Select</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Projects">Events</label>
                                            <select name="project" class="form-control">
                                                <option hidden>Select</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Applicant">Applicant</label>
                                            <select name="applicant"  class="form-control">
                                                <option hidden>Select</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Industry">Industry</label>
                                            <select name="industry" id="mktng_rep" class="form-control">
                                                <option hidden>Select</option>
                                                <option value="Yes">Yes</option>
                                                <option  value="No">No</option>
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
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Invoice">Invoice</label>
                                            <select name="invoice" id="mktng_approver" class="form-control">
                                                <option hidden>Select</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Campaign">Campaign</label>
                                                <select  required name="campaign" id="client_access" class="form-control">
                                                <option hidden>Select</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Email">Email Template</label>
                                            <select name="template" required id="marketing_access" class="form-control">
                                                <option >Select</option>
                                                <option>Yes</option>
                                                <option>No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Supplier">Supplier</label>
                                            <select name="supplier" required  class="form-control">
                                                <option hidden>Select</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Supplier">Todo</label>
                                            <select name="todo" required  class="form-control">
                                                <option hidden>Select</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projects_access">User Image</label>
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <button class="btn btn-primary pull-right" style="position: relative;width: 129px;bottom: -33px"
                                                type="submit">Add</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>

                        <?= form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

