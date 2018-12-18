<?php if(!empty($user && $user['industry'] == 'No')){ ?>
    <?= "You Don't have access to view this page" ;die;?>
<?php } ?>

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-12">
                    <h2>Add Industry</h2>
                </div>
                <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                    <ul class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="<?= site_url('super/view') ?>"><i
                                        class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">Industry</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <?= form_open('home/CreateIndusry') ?>
                    <div class="body">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Industry</span>
                            </div>
                            <input type="text" class="form-control" placeholder="IT" name="industry">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <?php if (!empty($msg)) { ?>
                            <span style="width: 100%" class="btn btn-success"><?= $msg ?></span>
                        <?php } ?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped" id="mydata">
                                <thead>
                                <tr>
                                    <th>Industry</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($industry as $v) { ?>
                                    <tr class="gradeA">
                                        <td><?= $v['industry'] ?></td>
                                        <?php if($user['user_type'] == 'ReadOnly'){ ?>
                                            <td>Access Denied</td>
                                        <?php }else{ ?>
                                            <td class="actions">
                                                <button onclick="industry(<?= $v['id'] ?>)"
                                                        style="background: #0a6aa1"  class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5
                                                        button-edit">
                                                    <i class="icon-pencil" aria-hidden="true"></i></button>
                                                <button class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove"
                                                        style="background: red"  onclick="abv('<?= site_url('home/DeleteIndustry') ?>/<?=
                                                $v['id'] ?>')">
                                                    <i class="icon-trash" aria-hidden="true"></i></button>
                                            </td>
                                        <?php } ?>
                                    </tr>
                                <?php } ?>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="conf">

</div>
<script>
    function industry(id) {
        $.post("<?= site_url('home/industry_modal')?>", {id: id}, function (e) {
            console.log(e);
            $('.conf').html(e);
            $('#modal').modal();
        });
    }

    function abv(url) {
        var a = '<div class="modal fade in" id="deleteModal" role="dialog" tabindex="-1" aria-labelledby="myLargeModalLabel"> ' +
            '<div class="modal-dialog modal-sm" role="document"> ' +
            '<div class="modal-content"> ' +
            '<div class="modal-header"> ' +
            '<button type="button" class="close" data-dismiss="modal" aria-label="Close"> ' +
            '<span aria-hidden="true">×</span> ' +
            '</button> ' +
            '</div> ' +
            '<div class="modal-body clearfix"> ' +
            '<div class="col-md-12"> ' +
            '<p>Are you sure you want to delete?</p>' +
            '<p style="text-align: right">' +
            '<a href="' + url + '"><span class="btn btn-primary">Yes</span></a> ' +
            '<span data-dismiss="modal" aria-label="Close" class="btn btn-primary">No</span> ' +
            '</p>' +
            '</div> ' +
            '</div> ' +
            '</div> ' +
            '</div> ' +
            '</div>';
        $(".conf").html(a);
        $("#deleteModal").modal();
    }
</script>