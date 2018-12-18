<script>
    $(document).ready(function () {
        $("ul#main-menu > li > a > span:contains('Employer')").parent().parent().addClass("active");
        $("ul#main-menu > li > ul > li > a > span:contains('Create Employer')").parent().parent().addClass("active");
    });
</script>
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-12">
                </div>
                <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                    <ul class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="<?= site_url('super/view') ?>"><i
                                        class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">Employer</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="header">
                        <h2>Add Course </h2>
                    </div>
                    <?php if(!empty($msg)) { ?>
                        <span style="width: 100%" class="btn btn-success"><?= $msg ?></span>
                    <?php } ?>
                    <?= form_open('super/training/AddCourse')?>
                    <div class="body">

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Course Name</span>
                            </div>
                            <input type="text" name="course_title" class="form-control"  >
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Type</span>
                            </div>
                            <input type="text" class="form-control"  name="course_type">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Status</span>
                            </div>
                            <select name="course_status" class="form-control">
                                <option Active">Active</option>
                                <option InActive">InActive</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <?= form_close()?>
                </div>
            </div>
        </div>
    </div>
</div>
    
