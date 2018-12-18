<div id="main-content" class="profilepage_2 blog-page">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-12">
                    <h2>Profile</h2>
                </div>
                <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                    <ul class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="<?= site_url('home/view/') ?>"><i
                                        class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">Admin Profile</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="header">
                        <h2>Info</h2>
                        <ul class="header-dropdown">
                            <li><a href="javascript:void(0);" data-toggle="cardloading" data-loading-effect="pulse"><i
                                            class="icon-refresh"></i></a></li>
                            <li><a href="javascript:void(0);" class="full-screen"><i
                                            class="icon-size-fullscreen"></i></a></li>
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"
                                   role="button" aria-haspopup="true" aria-expanded="false"></a>
                                <ul class="dropdown-menu dropdown-menu-right animated bounceIn">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another Action</a></li>
                                    <li><a href="javascript:void(0);">Something else</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <small class="text-muted">Name:</small>
                        <p><?= $user['username'] ?></p>
                        <hr>
                        <small class="text-muted">Email address:</small>
                        <p><?= $user['email'] ?></p>
                        <hr>
                        <small class="text-muted">Designation:</small>
                        <p><?= $user['type'] ?></p>

                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-12">
                <div class="tab-pane" id="Settings">
                    <div class="card">
                        <div class="body">
                            <h6>Basic Information</h6>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <input type="text" readonly value="<?= $user['username'] ?>" name="name"
                                               class="form-control"  placeholder="First Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" value="<?= $user['email'] ?>" class="form-control"
                                               placeholder="email" readonly>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" value="<?= $user['type'] ?>" class="form-control"
                                               placeholder="email" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="body">
                            <?php if(!empty($msg)){ ?>
                                <span style="width: 100%" class="btn btn-danger"><?= $msg ?></span>
                            <?php }?>
                            <div class="row clearfix">
                                <?= form_open('home/EditPassword') ?>
                                <div class="col-lg-12 col-md-12">
                                    <h6>Change Password</h6>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" placeholder="Current Password">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password1" placeholder="New Password">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password2" placeholder="Confirm New Password">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary pull-right">Update</button> &nbsp;&nbsp;
                                <?= form_close('') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
