<script>
    $(document).ready(function () {
        $("ul#main-menu > li > a > span:contains('Campaign')").parent().parent().addClass("active");
        $("ul#main-menu > li > ul > li > a > span:contains('Create Campaign').parent().parent().addClass("active");
    });
</script>
<style>
    .accordion {
        background-color: #eee;
        color: #444;
        cursor: pointer;
        padding: 18px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
        transition: 0.4s;
    }

    .active, .accordion:hover {
        background-color: #ccc;
    }

    .panel {
        padding: 0 18px;
        display: none;
        background-color: white;
        overflow: hidden;
    }
</style>

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-12">
                    <!--                        <h2>Create Campaign</h2>-->
                </div>
                <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                    <ul class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="<?= site_url('super/view') ?>"><i
                                        class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">Campaign</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="header">
                        <h2>Campaign Template</h2>
                    </div>
                    <?php if (!empty($msg)) { ?>
                        <span style="width: 100%;background-color: #0a6aa1" class="btn btn-success"><?= $msg ?></span>
                    <?php } ?>
                    <?php $id = $this->uri->segment(4) ?>
                    <?= form_open('super/campaign/ChildCampaign/' . $id) ?>
                    <div class="body">
                        <div id="adddd">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="cam_title" placeholder="Enter Tile">
                                <div class="input-group-append">
                                    <span class="input-group-text">Title</span>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <?php $rang = range(1, 30) ?>
                                <select required class="form-control" name="cam_days">
                                    <option hidden>Select Day</option>
                                    <?php foreach ($rang as $v) { ?>
                                        <option value="<?= $v ?>"><?= $v ?></option>
                                    <?php } ?>
                                </select>
                                <div class="input-group-append">
                                    <span class="input-group-text">Select Day</span>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <select required class="form-control" name="cam_steps">
                                    <?php $ranggg = range(1, 10) ?>
                                    <option hidden>Select Steps Day</option>
                                    <?php foreach ($ranggg as $v) { ?>
                                        <option value="<?= $v ?>"><?= $v ?></option>
                                    <?php } ?>
                                </select>
                                <div class="input-group-append">
                                    <span class="input-group-text">Sending Step</span>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <select required class="form-control" name="cam_status">
                                    <option value="Active">Active</option>
                                    <option value="InActive">InActive</option>
                                </select>
                                <div class="input-group-append">
                                    <span class="input-group-text">Status</span>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" readonly value="{}"
                                       aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">Short Tags</span>
                                </div>
                            </div>
                            <textarea id="ckeditor" name="cam_email"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary pull-right" style="margin-top: 10px">Submit</button>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= site_url('assets_b') ?>/ckeditor/ckeditor.js"></script>


<script>
    CKEDITOR.replace('ckeditor');
</script>
<script>
    var jj = 2;
    function add_rowsss() {
        $("#adddd").append('<div class="input-group mb-3">' +
            '<input type="text" class="form-control" name="cam_title" placeholder="Enter Tile">' +
            '<div class="input-group-append">' +
            '<span class="input-group-text" >Title</span>' +
            '</div></div>' +
            '<div class="input-group mb-3">' +
            '<?php $rang = range(1, 30) ?>' +
            '<select required class="form-control" name="cam_days">' +
            '<option hidden>Select Day</option>' +
            '<?php foreach ($rang as $v){ ?>' +
            '<option <?= $v ?>"><?= $v ?></option>' +
            '<?php } ?>' +
            '</select>' +
            '    <div class="input-group-append">' +
            '        <span class="input-group-text" >Interval Days</span>' +
            '    </div>' +
            '</div>' +
            '<div class="input-group mb-3">' +
            '    <select required class="form-control" name="cam_steps">' +
            '        <?php $ranggg = range(1, 10) ?>' +
            '        <option hidden>Select Steps Day</option>' +
            '        <?php foreach ($ranggg as $v){ ?>' +
            '        <option <?= $v ?>"><?= $v?></option>' +
            '        <?php } ?>' +
            '    </select>' +
            '    <div class="input-group-append">' +
            '        <span class="input-group-text">Interval Days</span>' +
            '    </div>' +
            '</div>' +
            '<div class="input-group mb-3">' +
            '    <select required class="form-control" name="cam_status">' +
            '      <option Active">Active</option>' +
            '      <option InActive">InActive</option>' +
            '    </select>' +
            '    <div class="input-group-append">' +
            '        <span class="input-group-text" >Status</span>'+
            '    </div>' +
            '</div>' +
            '<div class="input-group mb-3">' +
            '    <input type="text" class="form-control" readonly {}"' +
            '           aria-label="Recipient username" aria-describedby="basic-addon2">' +
            '    <div class="input-group-append">' +
            '        <span class="input-group-text" id="basic-addon2">Short Tags</span>' +
            ' </div></div>' +
            ' <textarea class="ckeditor" name="cam_email"></textarea>');
        jj++;
    }

    function doc_remove(id) {
        $('#remove_doc' + id).remove();
    }
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>

<!-- Include Editor JS files. -->
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.5/js/froala_editor.pkgd.min.js"></script>
<script>
    $('#edit').froalaEditor({
        height: 400,
        width: '1000%'
    });
</script>

