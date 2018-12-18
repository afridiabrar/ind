<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <style>
        .over {
            background: url('<?= base_url('assets_b/images/logoooo1.png')  ?>');
            background-repeat: no-repeat;
            background-size: cover;
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: 15;
            min-height: 1000px;
        }

        body {
            line-height: 0;
        }
    </style>
</head>
<br>
<div class="over">
    <div class="container">
        <?php if (!empty($msg)) { ?>
            <!-- <span style="width: 100%;display: block" >
                        <img src="<? /*= base_url('assets_b')*/ ?>/images/tick.png" >
                    </span>-->
            <div class="modal fade active show in" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document" style="position: relative;top: 20%;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" onclick="testtt()" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                           <h6 style="text-align: center">
                               <img style="height: 164px;"
                                                               src="<?= base_url('assets_b')?>/images/tick.png"></h6>
                            <p style="text-align: center;letter-spacing: 3px;text-transform: uppercase;"><?= $msg ?></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" onclick="testtt()" data-dismiss="modal">Close</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>
        <?php }elseif(!empty($error)){ ?>
            <div class="modal fade active show in" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document" style="position: relative;top: 20%;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" onclick="testtt()" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <h6 style="text-align: center">
                                <img style="height: 164px;"
                                     src="<?= base_url('assets_b')?>/images/canceled.jpg"></h6>
                            <p style="text-align: center;letter-spacing: 3px;text-transform: uppercase;"><?= $error ?></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" onclick="testtt()" data-dismiss="modal">Close</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>
        <?php } ?>
    </div>
</div>


<div class="conf">
</div>
<script>
    function test() {
        var region = $("[name=e_state]").val();
        var cate = $("[name=e_industry]").val();
        $(".over").css({"z-index": "0"});
        $("#state").val(region);
        $("#industry").val(cate);
    }
    function testtt() {
        location.reload('');
    }
</script>
</body>
</html>

<!------ Include the above in your HEAD tag ---------->

