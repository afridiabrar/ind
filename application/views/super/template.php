<script>
    $(document).ready(function(){
        $("ul#main-menu > li > a > span:contains('Email Template')").parent().parent().addClass("active");
    });
</script>
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-12">
                    <!--<h2>Email</h2>-->
                </div>
                <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                    <ul class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="<?= site_url('super/view')?>"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">Email Template</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="header">
                        <h2>Email Template</h2>
                    </div>
                    <?php if(!empty($msg)){ ?>
                        <span style="width: 100%" class="btn btn-primary"><?= $msg ?></span>
                    <?php } ?>
                    <?= form_open('super/Template/AddTemplate')?>
                    <div class="body">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" required name="title" placeholder="Email Title" >
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">Title</span>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <select name="seeker_sending_status" class="form-control">
                                <option value="Step1">Cv Information</option>
                                <option value="Step2">Reference Check</option>
                                <option value="Step3">Work Readiness</option>
                                <option value="Step4">Mock Interview</option>
                                <option value="Step5">Address Barrier</option>
                                <option value="Step6">Job Seeker Ready</option>
                                <option value="Step7">Completed</option>
                                <option value="other">others</option>
                            </select>
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">Module</span>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" disabled value="{name}"  aria-label="Recipient's username"
                                   aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">Short Tags</span>
                            </div>
                        </div>
                        <textarea name="email" class="ckeditor"></textarea>
                        <button type="submit" class="btn btn-primary pull-right" style="width: 10%;margin-top: 14px;">Submit</button>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>

<!-- Include Editor JS files. -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.5/js/froala_editor.pkgd.min.js"></script>
