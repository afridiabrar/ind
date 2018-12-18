<script>
    $(document).ready(function () {
        $("ul#main-menu > li > a > span:contains('KnowledgeBase')").parent().parent().addClass("active");
        $("ul#main-menu > li > ul > li > a > span:contains('Create ')").parent().parent().addClass("active");
    });
</script>
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-12">
                    <h2>KnowledgeBase</h2>
                </div>
                <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                    <ul class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="<?= site_url('super/')?>"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">KnowledgeBase</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <?= form_open_multipart('super/EditKnow/'.$his_know[0]['id']) ?>
                    <div class="body">
                        <div class="form-group">
                            <input type="text" name="title" value="<?= $his_know[0]['title']?>" class="form-control" placeholder="Enter title" />
                        </div>
                        <div class="summernote" style="position: relative;top: 10px;">
                            <textarea name="description" class="ckeditor"><?= $his_know[0]['description']?></textarea>
                            <p></p>
                        </div>
                        <div class="form-group m-t-20 m-b-20">
                            <?= (!empty($his_know[0]['file'])) ? $his_know[0]['file'] : "No Attachment" ?>
                            <input type="file" name="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
                        </div>
                        <button type="submit" class="btn btn-block btn-primary   m-t-20" style="float: right;width: 10%">Post</button>
                    </div>
                    <?=  form_close()?>
                </div>
            </div>
        </div>

    </div>
</div>