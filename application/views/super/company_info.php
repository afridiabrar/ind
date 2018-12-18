<script>
    $(document).ready(function(){
        $("ul#main-menu > li > a > span:contains('Employer')").parent().parent().addClass("active");
        $("ul#main-menu > li > ul > li > a > span:contains('View Employer')").parent().parent().addClass("active");
    });
</script>
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">
                        <h2>All Employer Detail</h2>
                    </div>
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                        <ul class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="#"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item">Employer</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
                            <?php if(!empty($msg)) { ?>
                                <span style="width: 100%" class="btn btn-success"><?= $msg ?></span>
                            <?php } ?>
                            <div class="col-md-3 offset-md-4 btun">
                                <a href="<?= site_url('super/view/create_employer')?>"> <button id="addToTable" class="btn btn-primary m-b-15" type="button">
                                    <i class="icon wb-plus" aria-hidden="true"></i> Add new Employer
                                </button></a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped" id="mydata">
                                    <thead>
                                    <tr>
                                        <th>Company Name</th>
                                        <th>Full Name</th>
                                        <th>Industry</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($employer as $v){ ?>
                                        <?php $check = str_replace(' ','',$v['c_name']) ;?>
                                        <?php if($_GET['name'] == $check){ ?>
                                    <tr class="gradeA">
                                        <a href=""><td><?= $v['c_name'] ?></td></a>
                                        <td><?= $v['f_name'] ?> <?= $v['l_name'] ?></td>
                                        <td><?= $v['e_industry'] ?></td>
                                        <td><?= date('Y-m-d',strtotime($v['date'])) ?></td>
                                        <td class="actions">
                                            <button class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit"><i class="icon-pencil" aria-hidden="true"></i></button>
                                            <button class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove"
                                                    onclick="abv('<?= site_url('super/DeleteEmployer') ?>/<?= $v['id']?>')"><i class="icon-trash" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                    <?php } ?>
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
            $('#mydata').DataTable();
        } );
    </script>

