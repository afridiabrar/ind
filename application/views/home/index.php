<script>
    $(document).ready(function(){
        $("ul#main-menu > li > a > span:contains('Dashboard')").parent().parent().addClass("active");
    });
</script>
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-12">
                    <h2>Dashboard</h2>
                </div>
                <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                    <ul class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="javascript:void(0)"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-12">
                <div class="card card2 top_report">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="body">
                                <div class="clearfix">
                                    <div class="float-left">
                                        <i class="fa fa-2x fa-dollar text-col-orange" style="color: #DC2427!important;"></i>
                                    </div>
                                    <div class="number float-right text-right">
                                        <h6>Invoice Due</h6>
                                        <span class="font700" style="color: #FFCC2C!important;">$<?= (!empty($total_invoice)) ?
                                                $total_invoice[0]['total'] : "" ?></span>
                                    </div>
                                </div>
                                <!--                                    <div class="progress progress-xs progress-transparent custom-color-blue mb-0 mt-3">
                                                                        <div class="progress-bar" data-transitiongoal="87"></div>
                                                                    </div>
                                                                    <small class="text-muted">19% compared to last week</small>-->
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="body">
                                <div class="clearfix">
                                    <div class="float-left">
                                        <i class="fa fa-2x fa-bar-chart-o text-col-green" style="color: #DC2427!important;"></i>
                                    </div>
                                    <div class="number float-right text-right">
                                        <h6>Projects</h6>
                                        <span class="font700" style="color: #FFCC2C!important;"><?= (!empty($total_project)) ?
                                                $total_project[0]['total'] : "" ?></span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="body">
                                <div class="clearfix">
                                    <div class="float-left">
                                        <i class="fa fa-2x fa-user-circle" style="color: #DC2427!important;"></i>
                                    </div>
                                    <div class="number float-right text-right">
                                        <h6>Applicants</h6>
                                        <span class="font700" style="color: #FFCC2C!important;"><?= (!empty($total_seeker)) ?
                                                $total_seeker[0]['total'] : "" ?> </span>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="body">
                                <div class="clearfix">
                                    <div class="float-left">
                                        <i class="fa fa-2x fa-thumbs-up text-col-yellow" style="color: #DC2427!important;"></i>
                                    </div>
                                    <div class="number float-right text-right" style="color: #DC2427!important;">
                                        <h6>Employers</h6>
                                        <span class="font700" style="color: #FFCC2C!important;"><?= (!empty($total_employer)) ?
                                                $total_employer[0]['total'] : "" ?> </span>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-8">
                <div class="card">
                    <div class="body">
                        <div id="calendar">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4">
                <div class="card">
                    <div class="header">
                        <h2><strong>New</strong> Employers</h2>
                    </div>
                    <div class="body">
                        <ul class="right_chat list-unstyled mb-0">
                            <?php foreach ($employer as $v){ ?>
                                <li class="online">
                                    <a href="javascript:void(0);">
                                        <div class="media">
                                            <img class="media-object " src="<?= base_url('assets_b')?>/images/xs/avatar4.jpg" alt="">
                                            <div class="media-body">
                                                <span class="name"><?= $v['c_name']?></span>
                                                <span class="message"><?= $v['e_state']?>, <?= $v['e_industry']?></span>
                                                <span class="badge badge-outline status"></span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-xl-6 col-lg-12 col-md-12">
                <div class="card">
                    <div class="header">
                        <h2>ToDo List <small>task list</small></h2>
                        <ul class="header-dropdown">
                            <li> <a href="javascript:void(0);" data-toggle="cardloading" data-loading-effect="pulse"><i class="icon-refresh"></i></a></li>
                            <li><a href="javascript:void(0);" class="full-screen"><i class="icon-size-fullscreen"></i></a></li>

                        </ul>
                    </div>
                    <div class="body todo_list">
                        <?= form_open('home/get_task')?>

                        <ul class="list-unstyled mb-4">
                            <?php foreach ($todo as $v){ ?>
                                <?php if($v['status'] == 'pending'){ ?>
                            <li>
                                <label class="fancy-checkbox mb-0">
                                    <input type="checkbox" id="todo-<?= $v['id']?>" value="<?= $v['id']?>" name="id[]">
                                    <span><?= $v['title']?></span>
                                </label>
                                <hr>
                            </li>
                            <?php } ?>
                            <?php } ?>
                            <button type="submit" class="btn btn-success" style="padding: 1px 20px">Move To Completed</button>
                        </ul>
                        <?= form_close() ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>

<script>
    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay,listWeek'
        },
        defaultDate: '<?= date('Y-m')?>',
        editable: true,
        droppable: true, // this allows things to be dropped onto the calendar
        drop: function() {
            // is the "remove after drop" checkbox checked?
            if ($('#drop-remove').is(':checked')) {
                // if so, remove the element from the "Draggable Events" list
                $(this).remove();
            }
        },
        eventLimit: true, // allow "more" link when too many events
        events: [
            <?php if(!empty($reminder)){ ?>
            <?php foreach ($reminder as $v){ ?>
            {
                title: '<?= $v['title'] ?>',
                start: '<?= date('Y-m-d',strtotime($v['remin_der'])) ?>',
                className: 'bg-info',

            },
            <?php } ?>
            <?php } ?>
            /*                {
                                title: 'Long Event',
                                start: '2018-07-07',
                                end: '2018-07-10',
                                className: 'bg-danger'
                            },
                            {
                                id: 999,
                                title: 'Repeating Event',
                                start: '2018-08-09T16:00:00',
                                className: 'bg-dark'
                            },
                            {
                                id: 999,
                                title: 'Repeating Event',
                                start: '2018-06-16T16:00:00',
                                className: 'bg-success'
                            },
                            {
                                title: 'Conference',
                                start: '2018-08-11',
                                end: '2018-08-14',
                                className: 'bg-primary'
                            },
                            {
                                title: 'Meeting',
                                start: '2018-08-12T10:30:00',
                                end: '2018-08-12 T12:30:00',
                                className: 'bg-warning'
                            },
                            {
                                title: 'Lunch',
                                start: '2018-08-12T12:00:00',
                                className: 'bg-dark'
                            },
                            {
                                title: 'Meeting',
                                start: '2018-08-12T14:30:00',
                                className: 'bg-secondary'
                            },
                            {
                                title: 'Happy Hour',
                                start: '2018-07-12T17:30:00',
                                className: 'bg-dark'
                            },
                            {
                                title: 'Dinner',
                                start: '2018-06-12T20:00:00',
                                className: 'bg-warning'
                            },
                            {
                                title: 'Birthday Party',
                                start: '2018-08-13T07:00:00',
                                className: 'bg-success'
                            },
                            {
                                title: 'Click for Google',
                                url: 'http://google.com/',
                                start: '2018-08-28',
                                className: 'bg-primary'
                            }*/
        ]
    });
</script>