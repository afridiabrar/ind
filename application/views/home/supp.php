<script>
    $(document).ready(function(){
        $("ul#main-menu > li > a > span:contains('Supplier')").parent().parent().addClass("active");
        $("ul#main-menu > li > ul > li > a > span:contains('Create Supplier')").parent().parent().addClass("active");
    });
</script>
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
                        <form action="<?= site_url('home/ChildSupplier/'.$supp_data[0]['id'])?>" method="post">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Company Name</label>
                                <input type="text" class="form-control" value="<?= $supp_data[0]['s_c_name']?>" readonly
                                       name="s_c_name" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">First Name</label>
                                <input type="text" class="form-control"  name="s_f_name"  placeholder="First Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Last Name</label>
                                <input type="text" class="form-control"  name="s_l_name"  placeholder="Last Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Contact</label>
                                <input type="text" class="form-control"  name="s_contact"  placeholder="+1231232">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Type</label>
                                <input type="text" class="form-control"  name="s_type"  placeholder="Supplier Type">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Amount Due</label>
                                <input type="text" class="form-control"  name="s_a_due"  placeholder="$">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Bill</label>
                                <input type="text" class="form-control"  name="s_bill"  placeholder="$">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Amount Paid</label>
                                <input type="text" class="form-control"  name="s_paid"  placeholder="$">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Amount for</label>
                                <input type="text" class="form-control" name="s_for"  placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Description</label>
                                <textarea name="s_desc" class="form-control"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary pull-right" >Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

