<script>
    $(document).ready(function () {
        $("ul#main-menu > li > a > span:contains('Projects')").parent().parent().addClass("active");
    });
</script>
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-12">
                    <h2>Projects </h2>
                </div>
                <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                    <ul class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="<?= site_url('super/view') ?>"><i
                                        class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">All Project</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12">
                <?php if (!empty($msg)) { ?>
                    <span class="btn btn-primary" style="width: 100%"><?= $msg ?></span>
                <?php } ?>
                <div class="card">
                    <div class="body for-btn">
                        <div class="col-md-8 offset-md-1 btns">
                            <div class="row">
                                <div class="col-md-2 btun2">
                                    <button style="width: 100%;position: absolute;z-index: 999;bottom: -20px;margin-left: -158px"
                                            data-toggle="modal" data-target="#exampleModal"
                                            class="btn btn-primary m-b-15"
                                            type="button">
                                        Add  Industry
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped" id="myTable">
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
                                        <td class="actions">
                                            <button onclick="industry(<?= $v['id'] ?>)"
                                                    style="background: #0a6aa1"
                                                    class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit">
                                                <i class="icon-pencil" aria-hidden="true"></i></button>
                                            <button class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove"
                                                    style="background: red"
                                                    onclick="abv('<?= site_url('super/DeleteIndustry') ?>/<?=
                                                    $v['id'] ?>')">
                                                <i class="icon-trash" aria-hidden="true"></i></button>
                                        </td>
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

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Industry Section</h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= site_url('super/CreateIndusry') ?>">
            <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Industry Name</label>
                        <input type="text" class="form-control" name="industry" id="recipient-name">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Add</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </form>

        </div>
    </div>
</div>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });

</script>

<script>
    function industry(id) {
        $.post("<?= site_url('super/industry_modal')?>", {id: id}, function (e) {
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
