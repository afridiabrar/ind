<script>
    $(document).ready(function () {
        $("ul#main-menu > li > a > span:contains('Contacts')").parent().parent().addClass("active");
        $("ul#main-menu > li > ul > li > a > span:contains('Create contacts')").parent().parent().addClass("active");
    });
</script>
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-12">
                    <h2>Contact Page</h2>
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
                    <?php if (!empty($msg)) { ?>
                        <span style="width: 100%" class="btn btn-primary"><?= $msg ?></span>
                    <?php } ?>
                    <div class="body">
                        <?= form_open_multipart('home/AddContact') ?>
                        <div class="row">
                            <div class="col-md-2 text-center">
                                <label style="margin-top: 5px">First Name</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="name" class="form-control" placeholder="First Name">
                            </div>
                            <div class="col-md-2 text-center">
                                <label style="margin-top: 5px">Last Name</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="last" class="form-control" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="row" style="margin-top: 5px">
                            <div class="col-md-2 text-center">
                                <label style="margin-top: 5px">Email</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="email" class="form-control" placeholder="abc@gmail.com">
                            </div>
                            <div class="col-md-2 text-center">
                                <label style="margin-top: 5px">Phone Number</label>
                            </div>
                            <div class="col-md-4">
                                <input type="number" name="phone" class="form-control" placeholder="3113321123">
                            </div>
                        </div>
                        <div class="row" style="margin-top: 5px">
                            <div class="col-md-2 text-center">
                                <label style="margin-top: 5px">Campaign</label>
                            </div>
                            <div class="col-md-4">
                                <select name="parent_id" onchange="changeCampaign()" class="form-control">
                                    <?php foreach ($campaign as $v) { ?>
                                        <?php if ($v['p_id'] == '0') { ?>
                                            <option hidden>Select Campaign</option>
                                            <option value="<?= $v['id'] ?>"><?= $v['p_title'] ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-2 text-center">
                                <label style="margin-top: 5px">Campaign Step</label>
                            </div>
                            <div class="col-md-4">
                                <select name="child_id" class="form-control">
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary pull-right" style="margin: 20px;width: 10%">
                            Submit
                        </button>
                        <?= form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    function changeCampaign() {
        var id = $("[name=parent_id]").val();
        $.post("<?= site_url('super/ajaxCampaign') ?>", {id: id}, function (e) {
            var data = JSON.parse(e);
            var row = "";
            $.each(data, function (key, val) {
                row += '<option value='+val['id']+'>'+val['cam_title']+'</option>';
            });
            if(row != ""){
                $("[name=child_id]").html(row);
            }else{
                alertify.error('Campaign Not Found')
            }
        });
    }
</script>

