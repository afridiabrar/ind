<!doctype html>
<html lang="en">
<head>
    <title>IEP | Super</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="icon" href="<?= site_url('assets_b/images/logo222.png') ?>" type="image/x-icon">
    <!-- VENDOR CSS -->
    <script src="<?= site_url('assets_b') ?>/jquery.js"></script>
    <script src="<?= base_url('assets_b') ?>/bundles/fullcalendarscripts.bundle.js"></script>
    <!--Css-->
    <script src="https://use.fontawesome.com/37bc3cb76e.js"></script>
    <link rel="stylesheet" href="<?= site_url('assets_b') ?>/datatable/datatables.css">
    <link rel="stylesheet" href="<?= site_url('assets_b') ?>/datatable/datatables.min.css">
    <link rel="stylesheet" href="<?= site_url('assets_b') ?>/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= site_url('assets_b') ?>/vendor/animate-css/animate.min.css">
    <link rel="stylesheet" href="<?= site_url('assets_b') ?>/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= site_url('assets_b') ?>/vendor/jquery-steps/jquery.steps.css">
    <link rel="stylesheet"
          href="<?= site_url('assets_b') ?>/vendor/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css">
    <link rel="stylesheet" href="<?= site_url('assets_b') ?>/vendor/chartist/css/chartist.min.css">
    <link rel="stylesheet"
          href="<?= site_url('assets_b') ?>/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="<?= site_url('assets_b') ?>/css/main.css">
    <link rel="stylesheet" href="<?= site_url('assets_b') ?>/css/inbox.css">
    <link rel="stylesheet" href="<?= site_url('assets_b') ?>/css/chatapp.css">

    <link rel="stylesheet" href="<?= site_url('assets_b') ?>/css/color_skins.css">
    <link rel="stylesheet" href="<?= site_url('assets_b') ?>/vendor/fullcalendar/fullcalendar.min.css">
    <!-- Include external CSS. -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet"
          type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
    <!-- Include Editor style. -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.5/css/froala_editor.pkgd.min.css"
          rel="stylesheet" type="text/css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.5/css/froala_style.min.css" rel="stylesheet"
          type="text/css"/>

    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>


    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/bootstrap.min.css"/>
    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(n+2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.item input {
            padding-left: 5px;
        }

        .invoice-box table tr.item td:first-child input {
            margin-left: -5px;
            width: 100%;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        .invoice-box input[type=number] {
            width: 60px;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .rtl table {
            text-align: right;
        }

        .rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>
<body class="theme-blue">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <!--<div class="m-t-30"><img src="<? /*= site_url('assets_b') */ ?>/images/thumbnail.png" width="48" height="48" alt="indigenous employment"></div>-->
        <p>Welcome to Indigenous employment...</p>
    </div>
</div>
<!-- Overlay For Sidebars -->
<div class="overlay" style="display: none;"></div>
<div id="wrapper">
    <nav class="navbar navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-brand">
                <a href="<?= site_url('home/view') ?>" class="text-center">
                    <img src="<?= site_url('assets_b/images/logo222.png') ?>" alt="Indigenous Logo"
                         class="img-responsive logo"
                         style="width: 90%">
                </a>
            </div>
            <div class="navbar-right">
                <ul class="list-unstyled clearfix mb-0">
                    <li>
                        <div class="navbar-btn btn-toggle-show">
                            <button type="button" class="btn-toggle-offcanvas"><i onclick="togg()"
                                                                                  class="lnr lnr-menu fa fa-bars"></i>
                            </button>
                        </div>
                        <a href="javascript:void(0);" class="btn-toggle-fullwidth btn-toggle-hide"><i onclick="togg()"
                                                                                                      class="fa fa-bars"></i></a>
                    </li>
                    <li>
                        <div id="navbar-menu">
                            <ul class="nav navbar-nav">
                                <li><a href="<?= site_url('home/view/inbox') ?>"><i class="icon-envelope-open"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle icon-menu"
                                       data-toggle="dropdown">
                                        <img class="rounded-circle"
                                             src="<?= site_url('assets_b') ?>/images/user-small.png" width="30" alt="">
                                    </a>
                                    <div class="dropdown-menu animated flipInY user-profile">
                                        <div class="d-flex p-3 align-items-center">
                                            <div class="drop-left m-r-10">
                                                <img src="<?= site_url('assets_b') ?>/images/user-small.png"
                                                     class="rounded" width="50" alt="">
                                            </div>
                                            <div class="drop-right">
                                                <h4><?= $user['fname'] ?> <?= $user['lname'] ?></h4>
                                                <p class="user-name"><?= $user['type'] ?></p>
                                                <p class="user-name"><?= $user['email'] ?></p>
                                            </div>
                                        </div>
                                        <div class="m-t-10 p-3 drop-list">
                                            <ul class="list-unstyled">
                                                <li><?= anchor('home/view/profile',' Profile','class="icon-user"') ?>
                                                </li>
                                                <li><?= anchor('home/view',' Message',
                                                        'class="icon-envelope-open"') ?>
                                                </li>
                                                <li class="divider"></li>
                                                <li><?= anchor('home/Logout',' LogOut',
                                                        'class="icon-power"') ?>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div id="leftsidebar" class="sidebar">
        <div class="sidebar-scroll">
            <nav id="leftsidebar-nav" class="sidebar-nav">
                <ul id="main-menu" class="metismenu">
                    <li>
                        <a href="<?= site_url('home/view') ?>"><i class="icon-home"></i><span>Dashboard</span></a>
                    </li>


                    <?php if(!empty($user && $user['employer_page'] == 'Yes')){ ?>
                    <li class="middle">
                        <a href="#uiElements" class="has-arrow"><i class="icon-diamond"></i><span>Employer</span></a>
                        <ul>
                            <?php if($user['user_type'] == 'ReadOnly'){ ?>
                            <?php }else{ ?>
                            <li><a href="<?= site_url('home/view/create_employer') ?>"><span>Create Employer</span></a></li>
                                <?php } ?>
                            <li><a href="<?= site_url('home/view/view_employer') ?>"><span>View Employer</span></a>
                            </li>
                        </ul>
                    </li>
                    <?php } ?>

                    <?php if(!empty($user && $user['project'] == 'Yes')){ ?>
                    <li><a href="<?= site_url('home/view/project') ?>"><i
                                    class="icon-info"></i><span>Projects</span></a></li>
                    <?php } ?>

                    <?php if(!empty($user && $user['applicant'] == 'Yes')){ ?>
                    <li class="middle">
                        <a href="#uiElements" class="has-arrow"><i class="icon-diamond"></i><span>Applicant</span></a>
                        <ul>
                            <?php if($user['user_type'] == 'ReadOnly'){ ?>
                            <?php }else{ ?>
                                <li><a href="<?= site_url('home/view/applicant ') ?>"><span>Create Applicant</span></a></li>
                            <?php } ?>
                            <li>
                                <a href="<?= site_url('home/view/applicant_request ') ?>"><span>Applicant Request</span></a>
                            </li>
                        </ul>
                    </li>
                    <?php } ?>


                    <?php if(!empty($user && $user['users'] == 'Yes')){ ?>
                        <li class="middle">
                            <a href="#uiElements" class="has-arrow"><i class="icon-trophy"></i><span>Contacts</span></a>
                            <ul>
                                <li><a href="<?= site_url('home/view/contacts') ?>"><span>Create Contacts</span></a></li>
                                <li><a href="<?= site_url('home/view/view_contact') ?>"><span>View Contacts</span></a></li>
                            </ul>
                        </li>
                    <?php } ?>
                    <?php if(!empty($user && $user['training'] == 'Yes')){ ?>
                        <li class="middle">
                            <a href="#uiElements" class="has-arrow"><i class="icon-trophy"></i><span>Trainings</span></a>
                            <ul>
                                <li><a href="<?= site_url('home/view/create_training') ?>"><span>Create Training</span></a></li>
                                <li><a href="<?= site_url('home/view/view_training') ?>"><span>View Training</span></a></li>
                            </ul>
                        </li>
                    <?php } ?>


                    <?php if(!empty($user && $user['invoice'] == 'Yes')){ ?>
                    <li class="middle">
                        <a href="#uiElements" class="has-arrow"><i class="icon-folder"></i><span>Invoice</span></a>
                        <ul>
                            <?php if($user['user_type'] == 'ReadOnly'){ ?>
                            <?php }else{ ?>
                                <li><a href="<?= site_url('home/view/create_invoice') ?>"><span>Create Invoice</span></a></li>
                            <?php } ?>
                            <li><a href="<?= site_url('home/view/invoice_history') ?>"><span>View Invoice</span></a>
                            </li>
                        </ul>
                    </li>
                    <?php } ?>

                    <?php if(!empty($user && $user['campaign'] == 'Yes')){ ?>
                        <li><a href="<?= site_url('home/view/view_campaign') ?>">
                                <i class="icon-envelope"></i><span>Campaign</span>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if(!empty($user && $user['template'] == 'Yes')){ ?>
                        <li class="middle">
                            <a href="#uiElements" class="has-arrow"><i class="icon-folder"></i><span>Email Templates</span></a>
                            <ul>
                                <?php if($user['user_type'] == 'ReadOnly'){ ?>
                                <?php }else{ ?>
                                    <li><a href="<?= site_url('home/view/template') ?>"><span>Create Template</span></a></li>
                                <?php } ?>
                                <li><a href="<?= site_url('home/view/view_template') ?>"> <span>View Template</span> </a></li>
                            </ul>
                        </li>
                    <?php } ?>
                    <?php if(!empty($user && $user['event'] == 'Yes')){ ?>
                        <li><a href="<?= site_url('home/view/event') ?>"><i class="icon-emoticon-smile"></i><span>Event</span></a></li>

                    <?php } ?>
                    <?php if(!empty($user && $user['supplier'] == 'Yes')){ ?>
                    <li class="middle">
                        <a href="#uiElements" class="has-arrow"><i class="icon-folder"></i><span>Supplier</span></a>
                        <ul>

                            <?php if($user['user_type'] == 'ReadOnly'){ ?>
                            <?php }else{ ?>
                                <li><a href="<?= site_url('home/view/create_suppliers') ?>">Create Supplier</a></li>
                            <?php } ?>
                            <li><a href="<?= site_url('home/view/view_supplier') ?>">View Supplier</a></li>
                        </ul>
                    </li>
                    <?php } ?>

                    <?php if(!empty($user && $user['supplier'] == 'Yes')){ ?>

                        <li class="middle">
                            <a href="#uiElements" class="has-arrow"><i class="icon-folder"></i><span>KnowledgeBase</span></a>
                            <ul>
                                <?php if($user['user_type'] == 'ReadOnly'){ ?>
                                <?php }else{ ?>
                                    <li><a href="<?= site_url('home/view/acknowledgment') ?>">Create </a></li>
                                <?php } ?>

                                <li><a href="<?= site_url('home/view/knowledgebase') ?>">View KnowledgeBase</a></li>
                            </ul>
                        </li>
                    <?php } ?>
            </nav>
        </div>
    </div>

