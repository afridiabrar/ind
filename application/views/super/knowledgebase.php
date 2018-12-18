<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-12">
                </div>
                <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                    <ul class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="<?= site_url('super/')?>"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">Knowledge base </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-md-7 align-right headddding" >
                <h4><strong>Knowledge Base Document</strong></h4>
            </div>
            <div id="main-content" class="file_manager" style="">
                    <div class="row clearfix">
                        <?php foreach ($knowledge as $v){ ?>
                        <div class="col-lg-3 col-md-4 col-sm-12">
                            <div class="card">
                                <div class="file">
                                    <div class="hover">
                                      <a href="<?= site_url('super/deleteknowledge')?>/<?= $v['id']?>"><button type="button" class="btn btn-icon btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                      </a>
                                    </div>
                                    <a href="javascript:void(0);" onclick="knowled('<?= $v['id'] ?>')">
                                        <div class="icon">
                                            <p class="m-b-5 text-muted"><?= $v['title']?></p>
                                        </div>
                                        <div class="file-name">
                                            <small>Last Modified By<span class="date text-muted"><?= $v['user'][0]['username'] ?></span></small>
                                            <small>Last Modified<span class="date text-muted"><?= date('M d Y',strtotime($v['modified_date'])) ?></span></small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php } ?>


                    </div>
            </div>
            <div class="col-lg-12">
                <div class="chat-app">
                    <div class="row hellotest">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function knowled(id)
    {
        $(".hellotest").css('display','');
        $.post("<?= site_url('super/Knowledge')?>",{id:id},function (e) {
            console.log(e);
            $(".hellotest").html(e);
            $(".file_manager").css('display','none');
        });
    }
    function historyy(id)
    {
        $.post("<?= site_url('super/LastModified')?>",{id:id},function (e) {
           console.log(e);
            $("#chat-left").html(e);

        });
    }

    function backkk()
    {
        $(".hellotest").css('display','none');
        $(".file_manager").css('display','');
    }


</script>
