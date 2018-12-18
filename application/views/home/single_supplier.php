<?php if(!empty($user && $user['supplier'] == 'No')){ ?>
    <?= "You Don't have access to view this page" ;die;?>
<?php } ?>

<script>
    $(document).ready(function () {
        $("ul#main-menu > li > a > span:contains('Supplier')").parent().parent().addClass("active");
        $("ul#main-menu > li > ul > li > a > span:contains('View Supplier')").parent().parent().addClass("active");
    });
</script>
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-12">
                    <h2>Supplier Page</h2>
                </div>
                <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                    <ul class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="<?= site_url('home/view') ?>"><i
                                        class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">Supplier</li>
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
                    <?php if(!empty($msg)){ ?>
                        <span style="width: 100%" class="btn btn-primary"><?= $msg ?></span>
                    <?php }?>
                    <div class="body">
                        <?= form_open_multipart('home/EditSupplier/'.$supp_data[0]['id']) ?>
                        <div class="row">
                            <div class="col-md-2 text-center">
                                <label style="margin-top: 5px">Company Name</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="s_c_name" value="<?= $supp_data['0']['s_c_name']?>"
                                       class="form-control" placeholder="First Name">
                            </div>
                            <div class="col-md-2 text-center">
                                <label style="margin-top: 5px">First Name</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="s_f_name" value="<?= $supp_data['0']['s_f_name']?>"
                                       class="form-control" placeholder="E-mail">
                            </div>
                        </div>
                        <div class="row" style="margin-top: 5px">
                            <div class="col-md-2 text-center">
                                <label style="margin-top: 5px">Last Name</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="s_l_name" value="<?= $supp_data['0']['s_l_name']?>"
                                       class="form-control" placeholder="abc@gmail.com">
                            </div>
                            <div class="col-md-2 text-center">
                                <label style="margin-top: 5px">Contact</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="s_contact" value="<?= $supp_data['0']['s_contact']?>"
                                       class="form-control" placeholder="abc@gmail.com">
                            </div>

                        </div>
                        <div class="row" style="margin-top: 5px">
                            <div class="col-md-2 text-center">
                                <label style="margin-top: 5px">Type</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="s_type" value="<?= $supp_data['0']['s_type']?>"
                                       class="form-control" placeholder="abc@gmail.com">
                            </div>
                            <div class="col-md-2 text-center">
                                <label style="margin-top: 5px">Due</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="s_a_due" value="<?= $supp_data['0']['s_a_due']?>"
                                       class="form-control" placeholder="abc@gmail.com">
                            </div>

                        </div>
                        <div class="row" style="margin-top: 5px">
                            <div class="col-md-2 text-center">
                                <label style="margin-top: 5px">Bill</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="s_bill" value="<?= $supp_data['0']['s_bill']?>"
                                       class="form-control" placeholder="abc@gmail.com">
                            </div>
                            <div class="col-md-2 text-center">
                                <label style="margin-top: 5px">Paid</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="s_paid" value="<?= $supp_data['0']['s_paid']?>"
                                       class="form-control" >
                            </div>

                        </div>
                        <div class="row" style="margin-top: 5px">
                            <div class="col-md-2 text-center">
                                <label style="margin-top: 5px">For</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="s_bill" value="<?= $supp_data['0']['s_for']?>"
                                       class="form-control" placeholder="abc@gmail.com">
                            </div>
                            <div class="col-md-2 text-center">
                                <label style="margin-top: 5px">Description</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="s_desc" value="<?= $supp_data['0']['s_desc']?>"
                                       class="form-control" >
                            </div>
                        </div>
                        <div class="row" style="margin-top: 5px">
                            <div class="col-md-2 text-center">
                                <label style="margin-top: 5px">Status</label>
                            </div>
                            <div class="col-md-4">
                                <select class="form-control" name="s_status">
                                    <option value="Done" <?= $supp_data[0]['s_status'] == 'Done' ? "selected" : "" ?>>Done</option>
                                    <option value="Pending" <?= $supp_data[0]['s_status'] == 'Pending' ? "selected" : ""
                                    ?>>Pending</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary pull-right" style="margin: 20px">Update</button>
                        <?= form_close() ?>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped" id="myTable">
                                <thead>
                                <tr>
                                    <th>Full Name</th>
                                    <th>Contact</th>
                                    <th>Amount Paid</th>
                                    <th>Amount Due</th>
                                    <th>Amount For</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($supp_dataa as $v) { ?>
                                    <?php $id = $this->uri->segment(4);
                                if($v['s_child_id'] == $id ){ ?>
                                    <tr class="gradeA">
                                        <td><?= $v['s_f_name'] ?> <?= $v['s_l_name'] ?></td>
                                        <td><?= $v['s_contact'] ?></td>
                                        <td><?= $v['s_paid'] ?></td>
                                        <td><?= $v['s_a_due'] ?></td>
                                        <td><?= $v['s_for'] ?></td>
                                        <td class="actions">
                                            <a href="<?= site_url('home/view/edit_supp')?>/<?= $v['id']?>">

                                            <button class="btn btn-sm btn-icon btn-pure btn-default">
                                                <i class="icon-pencil" aria-hidden="true">
                                                </i>
                                            </button>
                                            </a>
                                            <button class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove"
                                                    onclick="abv('<?= site_url('home/DeleteSupplier') ?>/<?= $v['id'] ?>')">
                                                <i class="icon-trash" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                <?php } ?>
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

<script>
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
