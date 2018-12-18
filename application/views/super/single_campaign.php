<script>
    $(document).ready(function(){
        $("ul#main-menu > li > a > span:contains('Campaign')").parent().parent().addClass("active");
        $("ul#main-menu > li > ul > li > a > span:contains('View Campaign')").parent().parent().addClass("active");
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
                        <li class="breadcrumb-item"><a href="<?= site_url('user/view/')?>"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">Campaign</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <?php $id = $this->uri->segment(4)?>
                        <a href="<?= site_url('super/view/campaign')?>/<?= $id ?>"><button class="btn btn-primary m-b-15" type="button">
                                <i class="icon wb-plus" aria-hidden="true"></i> Add New Activity
                            </button>
                        </a>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped" id="myTable">
                                <thead>
                                <tr>
                                    <th>Step</th>
                                    <th>Campaign Title</th>
                                    <th>Selected day</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $id = $this->uri->segment(4);  foreach($campaign as $v){ ?>
                                    <?php if($v['p_id'] == $id){ ?>
                                        <tr class="gradeA">
                                            <td><?= $v['cam_steps']?></td>
                                            <td><?= $v['cam_title']?></td>
                                            <td><?= $v['cam_days']?></td>
                                            <td><?= $v['cam_email']?></td>
                                            <td><?= $v['cam_status']?></td>
                                            <td class="actions">

                                                <button class="btn btn-sm btn-icon btn-pure btn-default"
                                                        data-toggle="modal" data-target="#addevent"><i
                                                            class="icon-pencil" aria-hidden="true"></i></button>
                                                <button class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove"
                                                        onclick="abv('<?= site_url('super/campaign/DeleteCampaign') ?>/<?= $v['id'] ?>')">
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
<div class="conf"></div>
<script>
    function abv(url){
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
            '<a href="'+ url +'"><span class="btn btn-primary">Yes</span></a> ' +
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
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>