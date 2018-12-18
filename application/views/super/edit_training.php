<script>
    $(document).ready(function(){
        $("ul#main-menu > li > a > span:contains('Training')").parent().parent().addClass("active");
        $("ul#main-menu > li > ul > li > a > span:contains('Create Training')").parent().parent().addClass("active");
    });
</script>
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-12">
                    <h2>Training </h2>
                </div>
                <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                    <ul class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="<?= site_url('super/view')?>"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">Admin</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12">
                <?php if(!empty($msg)) { ?>
                    <span style="width: 100%" class="btn btn-success"><?= $msg ?></span>
                <?php } ?>
                <div class="card">
                    <!--<div class="header">
                        <h2>Application Registration Page</h2>
                    </div>-->
                    <?php $val = $s_training[0];?>
                    <?= form_open('super/training/training_edit/'.$val['id']) ?>
                    <div class="body">
                      <div class="row">
                          <div class="col-md-2 text-center">
                              <label  style="margin-top: 5px">Training Name</label>
                          </div>
                          <div class="col-md-4">
                              <input type="text" class="form-control" name="t_title" value="<?= $val['t_title']?>">
                          </div>
                          <div class="col-md-2 text-center">
                              <label  style="margin-top: 5px">Training Attending</label>
                          </div>
                          <div class="col-md-4">
                              <input type="text" class="form-control" name="t_attending" value="<?= $val['t_attending']?>">
                          </div>
                      </div>
                        <div class="row" style="margin-top: 5px">
                            <div class="col-md-2 text-center">
                                <label  style="margin-top: 5px">training Objective</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="t_objective" value="<?= $val['t_objective']?>">
                            </div>
                            <div class="col-md-2 text-center">
                                <label  style="margin-top: 5px">Type</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="t_type" value="<?= $val['t_type']?>">
                            </div>
                        </div>
                        <div class="row" style="margin-top: 5px">
                            <div class="col-md-2 text-center">
                                <label  style="margin-top: 5px">Trainer Name</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="t_instructor" value="<?= $val['t_instructor']?>">
                            </div>
                            <div class="col-md-2 text-center">
                                <label  style="margin-top: 5px">Location</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="t_location" value="<?= $val['t_location']?>">
                            </div>
                        </div>
                        <div class="row" style="margin-top: 5px">
                            <div class="col-md-2 text-center">
                                <label  style="margin-top: 5px">Outcome</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="t_outcome" value="<?= $val['t_outcome']?>">
                            </div>

                            <div class="col-md-2 text-center">
                                <label  style="margin-top: 5px">Training Duration</label>
                            </div>
                            </hr>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="t_duration" value="<?= $val['t_duration']?>">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary pull-right" style="margin: 20px">Submit</button>
                    </div>
                    <?=  form_close() ?>
                </div>
            </div>
        </div>
        <div class="card">

            <div class="body">
                <div class="col-md-3 btun">
                        <button class="btn btn-primary m-b-15" type="button" onclick="course('<?= $val['id']?>')">
                            <i class="icon wb-plus" aria-hidden="true">

                            </i> Add new Course
                        </button>

                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped" id="mydata">
                        <thead>
                        <tr>
                            <th>Course Name</th>
                            <th>Course Type</th>
                            <th>Course Training</th>
                            <th>Course Duration</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($s_course as $v){ ?>
                            <tr class="gradeA">

                                <td><?= $v['course_name'] ?></td>
                                <td><?= $v['course_type'] ?></td>
                                <td><?= $v['course_training'] ?></td>
                                <td><?= $v['course_duration'] ?></td>
                                <td><?= date('M d Y',strtotime($v['date']))?></td>
                                <td class="actions">

                                        <button onclick="course_modal('<?= $v['id']?>')" class="btn btn-sm btn-icon btn-pure btn-default
                                            on-default m-r-5 button-edit" type="button">
                                            <i class="icon-pencil" aria-hidden="true"></i></button>
                                    <button class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove"
                                            onclick="abv('<?= site_url('super/deletecourse') ?>/<?= $v['id']?>')"><i
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

<div class="conf">

</div>
<script>

    function course(id) {
        $.post("<?= site_url('super/course_modal')?>",{id:id},function (e) {
            console.log(e);
            $('.conf').html(e);
            $('#modal').modal();
        });
    }
    function course_modal(id)
    {
        $.post("<?= site_url('super/see_course_modal')?>",{id:id},function (e) {
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


