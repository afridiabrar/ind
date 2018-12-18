<script>
    $(document).ready(function(){
        $("ul#main-menu > li > a > span:contains('Training')").parent().parent().addClass("active");
        $("ul#main-menu > li > ul > li > a > span:contains('View Training')").parent().parent().addClass("active");
    });
</script>
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-12">
                    <h2>All Training Detail</h2>
                </div>
                <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                    <ul class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="#"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Training</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body for-btn">
                        <?php if(!empty($msg)) { ?>
                            <span style="width: 100%" class="btn btn-success"><?= $msg ?></span>
                        <?php } ?>
                        <div class="col-md-8 offset-md-1 btns">
                            <div class="row">
                                <div class="col-md-2 btun2">
                                    <a style="position: absolute;z-index: 999;bottom: 6px"
                                       href="<?= site_url('home/view/create_training') ?>">
                                        <button style="width: 100%" class="btn btn-primary m-b-15"
                                                type="button">
                                            Add New Training
                                        </button>
                                    </a>
                                </div>
                                <div class="col-md-2 btun2">
                                    <button style="width: 100%;position: absolute;z-index: 999;bottom: 6px;margin-left: 25px"
                                            data-toggle="modal" data-target="#exampleModal"
                                            class="btn btn-primary m-b-15"
                                            type="button">
                                        Add  Attendies
                                    </button>
                                </div>
                                <div class="col-md-2 btun2">
                                    <a href="<?= site_url('home/view/view_attend')?>">
                                        <button style="width: 100%;position: absolute;z-index: 999;bottom: 6px;margin-left: 39px"
                                                class="btn btn-primary m-b-15"
                                                type="button">
                                            View Attendies
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped" id="mydata">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Attending</th>
                                    <th>Object</th>
                                    <th>Instructor</th>
                                    <th>Confirm Attender</th>
                                    <th>Location</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($training as $v){ ?>
                                    <tr class="gradeA">

                                        <td><?= $v['t_title'] ?></td>
                                        <td><?= $v['t_attending'] ?></td>
                                        <td><?= $v['t_objective'] ?></td>
                                        <td><?= $v['t_instructor'] ?></td>
                                        <td><a href="<?= site_url('super/view/view_attend')?>?attend=<?= $v['id'] ?>">
                                                <span style="color: green"><?= $v['confirm_attender'] ?></span></td></a>
                                        <td><?= $v['t_location'] ?></td>
                                        <td class="actions">
                                            <a href="<?= site_url('super/view/edit_training')?>/<?= $v['id'] ?>">
                                                <button class="btn btn-sm btn-icon btn-pure btn-default
                                            on-default m-r-5 button-edit">
                                                    <i class="icon-pencil" aria-hidden="true"></i></button>
                                            </a>

                                            <button class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove"
                                                    onclick="abv('<?= site_url('super/training/DeleteTraining') ?>/<?= $v['id']?>')"><i
                                                        class="icon-trash" aria-hidden="true"></i></button>
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
<div class="conf"></div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" >Attendies Section</h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form method="post" action="<?= site_url('home/CreateAttender')?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Training Name</label>
                        <select class="form-control" name="training_id" required>
                            <?php foreach ($training as $v){ ?>
                                <option value="<?= $v['id']?>"><?= $v['t_title']?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Name</label>
                        <input type="text" class="form-control" required name="name" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Email</label>
                        <input type="text" class="form-control" required name="email" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Contact No</label>
                        <input type="text" class="form-control" required name="phone" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Attendies Type</label>
                        <select name="attend_status" class="form-control" required>
                            <option value="External">External</option>
                            <option value="Internal">Internal</option>
                        </select>
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
<script>
    function training(id)
    {
        $.post("<?= site_url('home/training_modal')?>",{id:id},function (e) {
            console.log(e);
            $('.conf').html(e);
            $('#modal').modal();
        });
    }
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
        $('#mydata').DataTable();
    } );
</script>

