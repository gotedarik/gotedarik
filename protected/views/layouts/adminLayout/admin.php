<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo Yii::app()->name; ?></title>

    <!-- Bootstrap -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/frontadmin/css/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/frontadmin/css/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/frontadmin/css/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/frontadmin/css/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- jVectorMap -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/frontadmin/css/maps/jquery-jvectormap-2.0.3.css" rel="stylesheet"/>

    <link href="<?php echo Yii::app()->request->baseUrl; ?>/frontadmin/css/vendors/select2/dist/css/select2.min.css" rel="stylesheet">

    <link href="<?php echo Yii::app()->request->baseUrl; ?>/frontadmin/css/custom.min.css" rel="stylesheet">

    <link href="<?php echo Yii::app()->request->baseUrl; ?>/frontadmin/css/system/org.css" rel="stylesheet">


    <script src="<?php echo Yii::app()->request->baseUrl; ?>/frontpartner/ckeditor/ckeditor.js"></script>

    <script src="<?=Yii::app()->baseUrl?>/frontpartner/js/system/org.js"></script>
    <?php Yii::app()->clientScript->registerCoreScript('jquery');?>
    

    <script>
    params.site="<?=Yii::app()->baseUrl?>";

    if ( CKEDITOR.env.ie && CKEDITOR.env.version < 9 )
        CKEDITOR.tools.enableHtml5Elements( document );

    // The trick to keep the editor in the sample quite small
    // unless user specified own height.
    CKEDITOR.config.toolbarCanCollapse = false;
    CKEDITOR.config.height = 350;
    CKEDITOR.config.width = 'auto';
    CKEDITOR.config.language = 'tr';
    CKEDITOR.config.toolbar = [
        { name: 'document', items: [ 'Source'] },
        { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike'] },
        { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote','-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'] },
        { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
        { name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'PageBreak', 'Iframe' ] },
        '/',
        { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
        { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
        { name: 'tools', items: [ 'Maximize' ] },
    ];

    </script>
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="<?=Yii::app()->createUrl("panel/index")?>" class="site_title"><i class="fa fa-envira"></i> <span>Organize Tedarik</span></a>
                </div>

                <div class="clearfix"></div>

                <div class="profile">
                    <div class="profile_info">
                        <span>Hoşgeldiniz</span>
                        <h5 style="color: #fff"><?php echo Yii::app()->user->getState("name"); ?></h5>
                        <h6 style="color: #fff"><?php echo Yii::app()->user->getState("title"); ?></h6>
                    </div>
                </div>

                <div class="clearfix"></div>

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <ul class="nav side-menu">
                            <li><a href="<?=Yii::app()->createUrl("panel/index")?>"><i class="fa fa-home"></i> Anasayfa</a>
                                
                            </li>
                            <li><a><i class="fa fa-user"></i> Alıcı <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="<?=Yii::app()->createUrl("users/admin")?>">Yönet</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-hand-o-right"></i> Tedarikçiler <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="<?=Yii::app()->createUrl("suppliers/admin")?>">Yönet</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-user-secret"></i> Fake Hesaplar <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="<?=Yii::app()->createUrl("buildfake/admin")?>">Yönet</a></li>
                                    <li><a href="<?=Yii::app()->createUrl("buildfake/urladmin")?>">Ürün Url Yönet</a></li>
                                    <li><a href="<?=Yii::app()->createUrl("buildfake/create")?>">Bot Tedarikçi Ekle</a></li>
                                    <li><a href="<?=Yii::app()->createUrl("buildfake/urunekle")?>">Ürün Ekle</a></li>
                                    <li><a href="<?=Yii::app()->createUrl("buildfake/botrun")?>">Bot Yönetimi</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-tag"></i> Ürünler <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="<?=Yii::app()->createUrl('productsedit/admin') ?>">Yönet</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-info-circle"></i> Bilgi Sayfaları <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="<?=Yii::app()->createUrl('staticpages/admin') ?>">Yönet</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-list-ol"></i> Ürün Grupları <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="<?=Yii::app()->createUrl('productgroup/admin') ?>">Yönet</a></li>
                                    <li><a href="<?=Yii::app()->createUrl('productgroup/create') ?>">Ekle</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-edit"></i> İhaleler <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                </ul>
                            </li>
                            <li><a><i class="fa fa-users"></i> Yöneticiler <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="<?=Yii::app()->createUrl("admins/admin")?>">Yönet</a></li>
                                    <li><a href="<?=Yii::app()->createUrl("admins/create")?>">Ekle</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-newspaper-o"></i> Haberler <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="<?=Yii::app()->createUrl("news/admin")?>">Yönet</a></li>
                                    <li><a href="<?=Yii::app()->createUrl("news/create")?>">Ekle</a></li>
                                </ul>
                            </li>

                            <li><a><i class="fa fa-share-square-o"></i> Sosyal Hesaplar <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="<?=Yii::app()->createUrl("socialnetworks/admin")?>">Yönet</a></li>
                                </ul>
                            </li>

                            <li><a><i class="fa fa-bullhorn"></i> Duyurular <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="<?=Yii::app()->createUrl("helpannouncement/admin")?>">Yönet</a></li>
                                    <li><a href="<?=Yii::app()->createUrl("helpannouncement/create")?>">Ekle</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-question"></i> Yardım Bölümü <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="<?=Yii::app()->createUrl("helpcategories/admin")?>">Yardım Kategorilerini Yönet</a></li>
                                    <li><a href="<?=Yii::app()->createUrl("helpquestions/admin")?>">Yardım Sorularını Yönet</a></li>
                                    <li><a href="<?=Yii::app()->createUrl("helpcategories/create")?>">Kategori Ekle</a></li>
                                    <li><a href="<?=Yii::app()->createUrl("helpquestions/create")?>">Soru Ekle</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-bar-chart-o"></i> Raporlar <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                </ul>
                            </li>
                            <li><a><i class="fa fa-comments"></i> Müşteri Görüşleri <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="<?=Yii::app()->createUrl("customertestimonials/admin")?>">Yönet</a></li>
                                    <li><a href="<?=Yii::app()->createUrl("customertestimonials/create")?>">Ekle</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-cog"></i> Site Ayarları <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="<?=Yii::app()->createUrl('settingsdb/admin') ?>">Yönet</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                </div>
                <!-- /sidebar menu -->

            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav class="" role="navigation">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                Organize Tedarik
                                <span class="fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="javascript:;"> Profile</a></li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="badge bg-red pull-right">50%</span>
                                        <span>Settings</span>
                                    </a>
                                </li>
                                <li><a href="javascript:;">Help</a></li>
                                <li><?php echo CHtml::link("Çıkış Yap",array("site/logout"))?></li>
                            </ul>
                        </li>

                        <li role="presentation" class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-envelope-o"></i>
                                <span class="badge bg-green">6</span>
                            </a>
                            <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">

                                <li>
                                    <a>
                                        <span class="image"><img src="<?php echo Yii::app()->request->baseUrl; ?>/frontadmin/images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                                    </a>
                                </li>
                                <li>
                                    <div class="text-center">
                                        <a>
                                            <strong>See All Alerts</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <?=$content;?>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
            
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>


<!-- Bootstrap -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/frontadmin/css/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/frontadmin/css/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/frontadmin/css/vendors/nprogress/nprogress.js"></script>
<!-- Chart.js -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/frontadmin/css/vendors/Chart.js/dist/Chart.min.js"></script>
<!-- gauge.js -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/frontadmin/css/vendors/bernii/gauge.js/dist/gauge.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/frontadmin/css/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/frontadmin/css/vendors/iCheck/icheck.min.js"></script>
<!-- Skycons -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/frontadmin/css/vendors/skycons/skycons.js"></script>
<!-- Flot -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/frontadmin/css/vendors/Flot/jquery.flot.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/frontadmin/css/vendors/Flot/jquery.flot.pie.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/frontadmin/css/vendors/Flot/jquery.flot.time.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/frontadmin/css/vendors/Flot/jquery.flot.stack.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/frontadmin/css/vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/frontadmin/js/flot/jquery.flot.orderBars.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/frontadmin/js/flot/date.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/frontadmin/js/flot/jquery.flot.spline.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/frontadmin/js/flot/curvedLines.js"></script>
<!-- jVectorMap -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/frontadmin/js/maps/jquery-jvectormap-2.0.3.min.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/frontadmin/js/moment/moment.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/frontadmin/js/datepicker/daterangepicker.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/frontadmin/css/vendors/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/frontadmin/css/vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>

<!-- Custom Theme Scripts -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/frontadmin/js/custom.min.js"></script>
<!-- jquery.inputmask -->
<script>
    $(document).ready(function() {
        $(":input").inputmask();
    });
</script>
<!-- /jquery.inputmask -->
<!-- Flot -->
<script>
    $(document).ready(function() {
        var data1 = [
            [gd(2012, 1, 1), 17],
            [gd(2012, 1, 2), 74],
            [gd(2012, 1, 3), 6],
            [gd(2012, 1, 4), 39],
            [gd(2012, 1, 5), 20],
            [gd(2012, 1, 6), 85],
            [gd(2012, 1, 7), 7]
        ];

        var data2 = [
            [gd(2012, 1, 1), 82],
            [gd(2012, 1, 2), 23],
            [gd(2012, 1, 3), 66],
            [gd(2012, 1, 4), 9],
            [gd(2012, 1, 5), 119],
            [gd(2012, 1, 6), 6],
            [gd(2012, 1, 7), 9]
        ];
        $("#canvas_dahs").length && $.plot($("#canvas_dahs"), [
            data1, data2
        ], {
            series: {
                lines: {
                    show: false,
                    fill: true
                },
                splines: {
                    show: true,
                    tension: 0.4,
                    lineWidth: 1,
                    fill: 0.4
                },
                points: {
                    radius: 0,
                    show: true
                },
                shadowSize: 2
            },
            grid: {
                verticalLines: true,
                hoverable: true,
                clickable: true,
                tickColor: "#d5d5d5",
                borderWidth: 1,
                color: '#fff'
            },
            colors: ["rgba(38, 185, 154, 0.38)", "rgba(3, 88, 106, 0.38)"],
            xaxis: {
                tickColor: "rgba(51, 51, 51, 0.06)",
                mode: "time",
                tickSize: [1, "day"],
                //tickLength: 10,
                axisLabel: "Date",
                axisLabelUseCanvas: true,
                axisLabelFontSizePixels: 12,
                axisLabelFontFamily: 'Verdana, Arial',
                axisLabelPadding: 10
            },
            yaxis: {
                ticks: 8,
                tickColor: "rgba(51, 51, 51, 0.06)",
            },
            tooltip: false
        });

        function gd(year, month, day) {
            return new Date(year, month - 1, day).getTime();
        }
    });
</script>
<!-- /Flot -->

</body>
</html>