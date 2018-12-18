<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-12">
                    <h2>Chat</h2>
                </div>
                <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                    <ul class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="<?= site_url('super/')?>"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">Chat</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="chat-app">
                    <div class="row">
                        <div class="col-lg-3 col-md-4">
                            <div class="hidden-xs">
                                <div id="plist" class="people-list">

                                    <ul class="list-unstyled chat-list mt-2 mb-0">
                                        <?php foreach ($msgg as $v){ ?>
                                            <?php if($v['id'] != $super['id']){ ?>
                                                <li class="clearfix">
                                                    <?php $image = (!empty($v['image'])) ? base_url('csv_files')."/".$v['image'] : base_url('assets_b/images/xs/avatar1.jpg')?>
                                                    <div class="float-left list-left">
                                                        <a href="#<?= $v['id'] ?>">
                                                            <div class="img-preview">
                                                                <img style="width: 100px" src="<?= $image?>" alt="avatar" />
                                                                <div class="status"><i class="fa fa-circle online"></i></div>
                                                            </div>
                                                        </a>
                                                        <div class="about">
                                                            <a href="#<?= $v['id'] ?>">
                                                                <div class="name"><?= $v['username']?></div>
                                                            </a>
                                                            <div class="msg"> <?= (!empty($v['msg'][0]['message'])) ? $v['msg'][0]['message'] : "No Message " ?> </div>
                                                        </div>
                                                    </div>
                                                    <div class="float-right">
                                                        <div class="time"><?= (!empty($v['msg'][0]['date'])) ? date('d M',strtotime($v['msg'][0]['date'])) : "" ?></div>
                                                        <?php foreach ($v['totall'] as $vv){ ?>
                                                            <div class="badge badge-danger bg-danger text-white"><?= $vv['total'] ?></div>
                                                        <?php } ?>
                                                    </div>
                                                </li>
                                            <?php } ?>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-8">
                            <div id="chat-left" class="chat bg-white">
                                <div class="chat-header clearfix">

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <!--    <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                                <img src="<?/*= base_url('assets_b')*/?>/images/xs/avatar2.jpg" alt="avatar" />
                                            </a>-->
                                            <div class="chat-about">
                                                <h6 class="m-b-0" id="showname">Aiden Chavez</h6>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="chat-history">
                                    <!--<li class="clearfix">
                                                <div class="message-data">
                                                    <img src="<?/*= base_url('assets_b')*/?>/images/xs/avatar7.jpg" alt="avatar">
                                                </div>
                                                <div class="detail-right">
                                                    <div class="message other-message float-right">
                                                        <span class="message-data-time d-block mt-1" >10:10</span>
                                                        <p>Hi Aiden, how are you? How is the project coming along?</p>
                                                    </div>
                                                </div>
                                            </li>-->
                                    <!--<li class="clearfix">
                                                <div class="message-data float-left">
                                                    <img src="<?/*= base_url('assets_b')*/?>/images/xs/avatar7.jpg" alt="avatar">
                                                </div>
                                                <div class="detail-right">
                                                    <div class="message my-message">
                                                        <span class="message-data-time d-block mt-1" >10:12</span>
                                                        <p>Are we meeting today?</p>
                                                    </div>
                                                </div>
                                            </li>-->
                                </div>
                                <div class="chat-message clearfix">
                                    <div class="input-group mb-0">
                                        <input type="text" id="btn_input" class="form-control" placeholder="Enter text here...">
                                        <div class="input-group-append">
                                            <!--<button type="button" onclick="msg()" class="input-group-text"><i class="icon-paper-plane"></i></button>-->
                                            <button class="btn btn-theme" type="button" onclick="SendMsg()">Send</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    setInterval(function () {
        var id = window.location.hash;
        id = id.replace("#","");
        $.post("<?= site_url('super/chat/GetMsg')?>",{userid:id},function (e) {
            var data = JSON.parse(e);
            if(data['status'] == "ok"){
                if(data['html'] != null && data['html'] != ""){
                    $(".chat-history").html(data['html']);
                    $("#showname").html(data['user']);
                }
                else{
                    $(".chat-history").html("");
                    $("#showname").html(data['user']);
                }
            }
        });
    },200);
    function SendMsg() {
        var id = window.location.hash;
        id = id.replace("#","");
        var msg = $('#btn_input').val();
        $.post("<?= site_url('super/chat/SendMsg')?>", {msg:msg,userid:id}, function (e) {

            $(".chat-history").animate({ scrollTop: $('.chat-history')[0].scrollHeight }, 1000);
            $('#btn_input').val('');
        });
    }

</script>


<!--<script>
    // cwidget scroll
    $('.chat-list').slimScroll({
        height: 'calc(100vh - 220px)',
        wheelStep: 10,
        touchScrollStep: 50,
        color: '#2b2e33',
        size: '4px',
        borderRadius: '3px',
        alwaysVisible: true,
        position: 'right',
    });

    // cwidget scroll
    $('.chat-history ul').slimScroll({
        height: 'calc(100vh - 340px)',
        wheelStep: 10,
        touchScrollStep: 50,
        color: '#2b2e33',
        size: '4px',
        borderRadius: '3px',
        alwaysVisible: false,
        position: 'right',
    });
</script>
-->