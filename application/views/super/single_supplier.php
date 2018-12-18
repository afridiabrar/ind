<script>
    $(document).ready(function () {
        $("ul#main-menu > li > a > span:contains('Applicant')").parent().parent().addClass("active");
        $("ul#main-menu > li > ul > li > a > span:contains('Create Applicant')").parent().parent().addClass("active");
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
                        <li class="breadcrumb-item"><a href="<?= site_url('super/view') ?>"><i
                                        class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">Supplier</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <?php if(!empty($msg)){ ?>
                        <span style="width: 100%" class="btn btn-primary"><?= $msg ?></span>
                    <?php }?>
                    <div class="body">
                        <?= form_open_multipart('super/editSupp/'.$supp_data[0]['id']) ?>
                        <div class="row">
                            <div class="col-md-2 text-center">
                                <label style="margin-top: 5px">Company Name</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="s_c_name" <?= $supp_data['0']['s_c_name']?>"
                                       class="form-control" placeholder="First Name">
                            </div>
                            <div class="col-md-2 text-center">
                                <label style="margin-top: 5px">First Name</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="s_f_name" <?= $supp_data['0']['s_f_name']?>"
                                       class="form-control" placeholder="E-mail">
                            </div>
                        </div>
                        <div class="row" style="margin-top: 5px">
                            <div class="col-md-2 text-center">
                                <label style="margin-top: 5px">Last Name</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="s_l_name" <?= $supp_data['0']['s_l_name']?>"
                                       class="form-control" placeholder="abc@gmail.com">
                            </div>
                            <div class="col-md-2 text-center">
                                <label style="margin-top: 5px">Contact</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="s_contact" <?= $supp_data['0']['s_contact']?>"
                                       class="form-control" placeholder="abc@gmail.com">
                            </div>

                        </div>
                        <div class="row" style="margin-top: 5px">
                            <div class="col-md-2 text-center">
                                <label style="margin-top: 5px">Type</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="s_type" <?= $supp_data['0']['s_type']?>"
                                       class="form-control" placeholder="abc@gmail.com">
                            </div>
                            <div class="col-md-2 text-center">
                                <label style="margin-top: 5px">Due</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="s_a_due" <?= $supp_data['0']['s_a_due']?>"
                                       class="form-control" placeholder="abc@gmail.com">
                            </div>

                        </div>
                        <div class="row" style="margin-top: 5px">
                            <div class="col-md-2 text-center">
                                <label style="margin-top: 5px">Bill</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="s_bill" <?= $supp_data['0']['s_bill']?>"
                                       class="form-control" placeholder="abc@gmail.com">
                            </div>
                            <div class="col-md-2 text-center">
                                <label style="margin-top: 5px">Paid</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="s_paid" <?= $supp_data['0']['s_paid']?>"
                                       class="form-control" >
                            </div>

                        </div>
                        <div class="row" style="margin-top: 5px">
                            <div class="col-md-2 text-center">
                                <label style="margin-top: 5px">For</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="s_bill" <?= $supp_data['0']['s_for']?>"
                                       class="form-control" placeholder="abc@gmail.com">
                            </div>
                            <div class="col-md-2 text-center">
                                <label style="margin-top: 5px">Description</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="s_desc" <?= $supp_data['0']['s_desc']?>"
                                       class="form-control" >
                            </div>
                        </div>
                        <div class="row" style="margin-top: 5px">
                            <div class="col-md-2 text-center">
                                <label style="margin-top: 5px">Status</label>
                            </div>
                            <div class="col-md-4">
                                <select class="form-control" name="s_status">
                                    <option Done" <?= $supp_data[0]['s_status'] == 'Done' ? "selected" : "" ?>>Done</option>
                                    <option Pending" <?= $supp_data[0]['s_status'] == 'Pending' ? "selected" : ""
                                    ?>>Pending</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary pull-right" style="margin: 20px">Submit</button>
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
                                            <button class="btn btn-sm btn-icon btn-pure btn-default"
                                                    data-toggle="modal" data-target="#addevent"><i class="icon-pencil"
                                                                                                   aria-hidden="true"></i>
                                            </button>
                                            <button class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove"
                                                    onclick="abv('<?= site_url('super/DeleteSupplier') ?>/<?= $v['id'] ?>')">
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

