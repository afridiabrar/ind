<script>
    $(document).ready(function(){
        $("ul#main-menu > li > a > span:contains('Supplier')").parent().parent().addClass("active");
        $("ul#main-menu > li > ul > li > a > span:contains('Create Supplier')").parent().parent().addClass("active");
    });
</script>
<?php $v = $supp_data[0] ?>
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-12">
                    <!--                        <h2>Supplier Page</h2>-->
                </div>
                <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                    <ul class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="<?= site_url('home/view')?>"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">Supplier</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="header">
                        <h2> Supplier </h2>
                    </div>
                    <?php if(!empty($msg)) { ?>
                        <span style="width: 100%" class="btn btn-primary"><?= $msg ?></span>
                    <?php } ?>
                    <div class="body">
                        <form action="<?= site_url('home/EditSupplier/').$v['id']?>" method="post">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Company Name</label>
                                <input type="text" class="form-control" value="<?= $v['s_c_name'] ?>"  name="s_c_name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">First Name</label>
                                <input type="text" class="form-control" value="<?= $v['s_f_name'] ?>"  name="s_f_name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Last Name</label>
                                <input type="text" class="form-control" value="<?= $v['s_l_name'] ?>"  name="s_l_name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Contact</label>
                                <input type="text" class="form-control" value="<?= $v['s_contact'] ?>" name="s_contact">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Type</label>
                                <input type="text" class="form-control" value="<?= $v['s_type'] ?>" name="s_type">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Amount Due</label>
                                <input type="text" class="form-control" value="<?= $v['s_a_due'] ?>" name="s_a_due">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Bill</label>
                                <input type="text" class="form-control" value="<?= $v['s_bill'] ?>" name="s_bill" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Amount Paid</label>
                                <input type="text" class="form-control" value="<?= $v['s_paid'] ?>"  name="s_paid" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Amount for</label>
                                <input type="text" class="form-control"value="<?= $v['s_for'] ?>" name="s_for">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Description</label>
                                <textarea name="s_desc" class="form-control"><?= $v['s_desc'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Status</label>
                                <select class="form-control" name="s_status">
                                    <option value="Done" <?= $v['s_status'] == 'Done' ? "selected" : "" ?>>Done</option>
                                    <option value="Pending" <?= $v['s_status'] == 'Pending' ? "selected" : "" ?>>Pending</option>
                                </select>
                            </div>
                        <button type="submit" class="btn btn-primary" >Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

