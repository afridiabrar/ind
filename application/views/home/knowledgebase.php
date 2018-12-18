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
            <div class="col-lg-12">
                <div class="chat-app">
                    <div class="row">
                        <div class="col-lg-3 col-md-4" style="position: relative;bottom: 9px;">
                            <div class="hidden-xs">
                                <div id="plist" class="people-list">
                                    <ul class="list-unstyled chat-list mt-2 mb-0">
                                        <?php foreach ($knowledge as $v){ ?>
                                            <li class="clearfix">
                                                <div class="float-left list-left">
                                                    <div class="about">
                                                        <span onclick="knowled('<?= $v['id'] ?>')">
                                                            <div class="name"><strong><?= $v['title']?></strong></div>
                                                        </span>
                                                        <span onclick="knowled('<?= $v['id'] ?>')">
                                                            <div class="msg">Last Modified by :<?= $v['user'][0]['username'] ?></div>
                                                        </span>
                                                    </div>
                                                </div>
                                                <span onclick="historyy('<?= $v['id'] ?>')">
                                                <div class="float-right">
                                                    <div class="time">Last Modified</div>
                                                    <div class="badge badge-danger bg-danger text-white"><?= $v['modified_date'] ?></div>
                                                </div>
                                                </span>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-8">
                            <div id="chat-left" class="chat bg-white">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function knowled(id)
    {
        $.post("<?= site_url('super/Knowledge')?>",{id:id},function (e) {
            console.log(e);
            $("#chat-left").html(e);
        });
    }
    function historyy(id)
    {
        $.post("<?= site_url('super/LastModified')?>",{id:id},function (e) {
           console.log(e);
            $("#chat-left").html(e);

        });
    }


</script>
