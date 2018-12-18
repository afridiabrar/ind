<script>
    $(document).ready(function () {
        $("ul#main-menu > li > a > span:contains('Campaign')").parent().parent().addClass("active");
        $("ul#main-menu > li > ul > li > a > span:contains('View Campaign')").parent().parent().addClass("active");
    });
</script>
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-12">
                    <!--                        <h2>Jquery Datatable</h2>-->
                </div>
                <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                    <ul class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="<?= site_url('super/') ?>"><i class="icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Campaign</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body for-btn">
                        <div class="col-md-8 offset-md-1 btns">
                            <div class="row">
                                <div class="col-md-2 btun2">
                                        <button style="position: absolute;z-index: 999;bottom: -20px;width: 100%;right: 160px"
                                                class="btn btn-primary m-b-15"
                                                type="button" data-toggle="modal" data-target="#exampleModal">
                                            Add Campaign
                                        </button>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped" id="myTable">
                                <thead>
                                <tr>
                                    <th>Campaign Title</th>
                                    <th>Add Activity</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($campaign as $v) { ?>
                                    <?php if ($v['p_id'] == 0) { ?>
                                        <tr class="gradeA">
                                            <td><?= $v['p_title'] ?></td>
                                            <td><a href="<?= site_url('super/view/campaign') ?>/<?= $v['id'] ?>">
                                                    <button style="background: #0a6aa1"
                                                            class="btn btn-sm btn-icon btn-primary">
                                                        Add Activity
                                                    </button>
                                                </a>
                                            </td>
                                            <td class="actions">
                                                <a href="<?= site_url('super/view/single_campaign') ?>/<?= $v['id'] ?>">
                                                    <button class="btn btn-sm btn-icon btn-pure btn-default">
                                                        <i class="icon-eye" aria-hidden="true"></i></button>
                                                </a>
                                                <button onclick="campaign('<?= $v['id'] ?>')" class="btn btn-sm btn-icon btn-pure
                                                btn-default">
                                                    <i class="icon-pencil" aria-hidden="true"></i>
                                                </button>
                                                <button class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove"
                                                        onclick="abv('<?= site_url('super/campaign/DeleteCampaign') ?>/<?= $v['id']
                                                        ?>')">
                                                    <i class="icon-trash" aria-hidden="true"></i></button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" >Add Campaign</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form method="post" action="<?= site_url('super/campaign/CreateCampaign')?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Campaign Title</label>
                        <input type="text" class="form-control" name="p_title" id="recipient-name">
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
<div class="conf"></div>
<script>
    function campaign(id) {
            $.post("<?= site_url('super/Campaign_modal')?>",{id:id},function (e) {
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
<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>