<script>
    $(document).ready(function(){
        $("ul#main-menu > li > a > span:contains('Event')").parent().parent().addClass("active");
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
                        <li class="breadcrumb-item"><a href="<?= site_url('super/view')?>"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">Events</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <button class="btn btn-primary m-b-15" type="button" href="#defaultModal" data-toggle="modal" data-target="#defaultModal">
                            <i class="icon wb-plus" aria-hidden="true"></i> Add Event
                        </button>
                        <?php if(!empty($msg)){ ?>
                            <span style="width: 100%" class="btn btn-primary"><?= $msg ?></span>
                        <?php }?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped" id="myTable">
                                <thead>
                                <tr>
                                    <th>Reminder Title </th>
                                    <th>Description</th>
                                    <th>Event Date</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($reminder as $v){ ?>
                                    <tr class="gradeA">
                                        <td><?= $v['title']?></td>
                                        <td><?= $v['desc']?></td>
                                        <td><?= date('Y-m-d',strtotime($v['remin_der']))?></td>
                                        <td class="actions">
                                            <button class="btn btn-sm btn-icon btn-pure btn-primary"
                                                    data-toggle="tooltip" data-target="#addevent" data-original-title="Edit "><i class="icon-pencil" aria-hidden="true"></i></button>
                                            <a href="<?= site_url('super/deleteevent')?>/<?= $v['id'] ?>" class="btn btn-sm btn-icon btn-pure btn-primary on-default button-remove"><i class="icon-trash" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" action="<?= site_url('super/AddRemin')?>">
                <div class="modal-header">
                    <h4 class="title" id="largeModalLabel">Event</h4>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title"  class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="desc"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Date</label>
                            <input type="date" name="remin_der"  class="form-control">
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
                </div>
            </form>
        </div>

    </div>
</div>
<script>
    $('#edit').froalaEditor({
        height: 400,
    });
</script>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );

</script>