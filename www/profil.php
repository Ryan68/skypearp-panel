<?php
include('inc/functions.php');

if(!$_SESSION['logged']){
    header("Location: logout.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>SkypeaRP Panel | Profil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="description" content="">
    <meta name="keywords" content="coco bootstrap template, coco admin, bootstrap,admin template, bootstrap admin,">
    <meta name="author" content="Huban Creative">

    <!-- Base Css Files -->
    <link href="assets/libs/jqueryui/ui-lightness/jquery-ui-1.10.4.custom.min.css" rel="stylesheet" />
    <link href="assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/libs/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="assets/libs/fontello/css/fontello.css" rel="stylesheet" />
    <link href="assets/libs/animate-css/animate.min.css" rel="stylesheet" />
    <link href="assets/libs/nifty-modal/css/component.css" rel="stylesheet" />
    <link href="assets/libs/magnific-popup/magnific-popup.css" rel="stylesheet" />
    <link href="assets/libs/ios7-switch/ios7-switch.css" rel="stylesheet" />
    <link href="assets/libs/pace/pace.css" rel="stylesheet" />
    <link href="assets/libs/sortable/sortable-theme-bootstrap.css" rel="stylesheet" />
    <link href="assets/libs/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" />
    <link href="assets/libs/jquery-icheck/skins/all.css" rel="stylesheet" />
    <!-- Code Highlighter for Demo -->
    <link href="assets/libs/prettify/github.css" rel="stylesheet" />

    <!-- Extra CSS Libraries Start -->
    <link href="assets/libs/rickshaw/rickshaw.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/morrischart/morris.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/jquery-jvectormap/css/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/jquery-clock/clock.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/bootstrap-calendar/css/bic_calendar.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/sortable/sortable-theme-bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/jquery-weather/simpleweather.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/bootstrap-xeditable/css/bootstrap-editable.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
    <!-- Extra CSS Libraries End -->
    <link href="assets/css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <link rel="shortcut icon" href="assets/img/favicon.ico">
    <link rel="apple-touch-icon" href="assets/img/apple-touch-icon.png" />
    <link rel="apple-touch-icon" sizes="57x57" href="assets/img/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="assets/img/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="assets/img/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="assets/img/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="assets/img/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="assets/img/apple-touch-icon-152x152.png" />
</head>

<style>

    .card {
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
        border-radius: 5px; /* 5px rounded corners */
        width: 13%;
    }

    .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    }

    .test {
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
        border-radius: 5px; /* 5px rounded corners */
        width: 15%;
    }

    .test:hover {
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    }

    .container {
        padding: 2px 16px;
    }

    .label {
        color: white;
        padding: 8px;
    }

    .success {background-color: #4CAF50;} /* Green */
    .info {background-color: #2196F3;} /* Blue */
    .warning {background-color: #ff9800;} /* Orange */
    .danger {background-color: #f44336;} /* Red */
    .other {background-color: #e7e7e7; color: black;} /* Gray */




    .alert {
        padding: 20px;
        background-color: #f44336;
        color: white;
        opacity: 1;
        transition: opacity 0.6s;
        margin-bottom: 15px;
    }

    .alert.success {background-color: #4CAF50;}
    .alert.info {background-color: #2196F3;}
    .alert.warning {background-color: #ff9800;}

</style>

<body class="fixed-left">

<?php include('inc/topbar.php'); ?>

<!-- Start right content -->
<div class="content-page">
    <!-- ============================================================== -->
            <!-- Start Content here -->
            <!-- ============================================================== -->
            <div class="profile-banner" style="background-image: url(images/avatar/profil_background_1.jpg);">
                <div class="col-sm-3 avatar-container">
                    <img src="assets/img/users/avatar/<?php if(isset($_SESSION['avatar'])){ echo $_SESSION['avatar']; }else{ echo 'img_avatar.png'; } ?>" class="img-circle profile-avatar" alt="User avatar">
                </div>
                <!-- <div class="col-sm-12 profile-actions text-right">
                    <button type="button" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Friends</button>
                    <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-envelope"></i> Send Message</button>
                    <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-ellipsis-v"></i></button>
                </div> -->
            </div>
    <div class="content">

        <div class="row">
                    <div class="col-sm-3">
                        <!-- Begin user profile -->
                        <div class="text-center user-profile-2">
                            <h4><?php echo $_SESSION['firstname'].' <b>'. $_SESSION['lastname'].'</b>'; ?></h4>
                            
                            <h5><?= $_SESSION['job'] ?></h5>
                            <ul class="list-group">
                              <li class="list-group-item">
                                <span class="badge"><?= $_SESSION['money'] ?> <font color="lightgreen">$</font></span>
                                Liquide
                              </li>
                              <li class="list-group-item">
                                <span class="badge"><?= $_SESSION['bank'] ?> <font color="lightgreen">$</font></span>
                                Banque
                              </li>
                              <li class="list-group-item">
                                <span class="badge"><?= $_SESSION['blackmoney'] ?> <font color="lightgreen">$</font></span>
                                Argent sale
                              </li>
                            </ul>
                                
                                <!-- User button -->
                            <div class="user-button">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <button type="button" class="btn btn-primary btn-sm btn-block"><i class="fa fa-envelope"></i> Send Message</button>
                                    </div>
                                    <?php if($_SESSION['logged']){ ?>
                                    <div class="col-lg-6">
                                        <form method="POST" action="editprofil.php">
                                            <button type="submit" class="btn btn-default btn-sm btn-block"><i class="fa fa-user"></i> Edit profil</button>
                                        </form>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div><!-- End div .user-button -->
                        </div><!-- End div .box-info -->
                        <!-- Begin user profile -->
                    </div><!-- End div .col-sm-4 -->
                    
                    <div class="col-sm-9">
                        <div class="widget widget-tabbed">
                            <!-- Nav tab -->
                            <ul class="nav nav-tabs nav-justified">
                              <li class="active"><a href="#my-timeline" data-toggle="tab"><i class="fa fa-pencil"></i> Main</a></li>
                              <li><a href="#about" data-toggle="tab"><i class="fa fa-user"></i> About</a></li>
                              <li><a href="#user-activities" data-toggle="tab"><i class="fa fa-laptop"></i> Activities</a></li>
                              <li><a href="#mymessage" data-toggle="tab"><i class="fa fa-envelope"></i> Message</a></li>
                            </ul>
                            <!-- End nav tab -->

                            <!-- Tab panes -->
                            <div class="tab-content">
                                
                                
                                <!-- Tab timeline -->
                                <div class="tab-pane animated active fadeInRight" id="my-timeline">
                                    <div class="user-profile-content">
                                        
                                        <!-- Begin timeline -->
                                        <div class="the-timeline">
                                            <form role="form" class="post-to-timeline">
                                                <textarea class="form-control" style="height: 70px;" placeholder="Whats on your mind..."></textarea>
                                                <div class="row">
                                                <div class="col-sm-6">
                                                    <a class="btn btn-sm btn-default"><i class="fa fa-camera"></i></a>
                                                    <a class="btn btn-sm btn-default"><i class="fa fa-video-camera"></i></a>
                                                    <a class="btn btn-sm btn-default"><i class="fa fa-map-marker"></i></a>
                                                </div>
                                                <div class="col-sm-6 text-right"><button type="submit" class="btn btn-primary">Post</button></div>
                                                </div>
                                            </form>
                                            <br><br>
                                            <ul>
                                                <li>
                                                    <div class="the-date">
                                                        <span>01</span>
                                                        <small>Feb</small>
                                                    </div>
                                                    <h4>Lorem ipsum dolor!</h4>
                                                    <p>
                                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. 
                                                    </p>
                                                </li>
                                                <li>
                                                    <div class="the-date">
                                                        <span>31</span>
                                                        <small>Jan</small>
                                                    </div>
                                                    <h4>Yohoo! you can put video here</h4>
                                                    <div class="videoWrapper">
                                                    <iframe src="//player.vimeo.com/video/85847275?title=0&amp;byline=0&amp;portrait=0"></iframe>
                                                    </div>
                                                    <p>
                                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. 
                                                    </p>
                                                </li>
                                                <li>
                                                    <div class="the-date">
                                                        <span>25</span>
                                                        <small>Jan</small>
                                                    </div>
                                                    <h4>You also can put Soundcloud iframe here</h4>
                                                    <iframe src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/132890481&amp;color=ff9900&amp;auto_play=false&amp;hide_related=false&amp;show_artwork=true"></iframe>
                                                    <p>
                                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. 
                                                    </p>
                                                </li>
                                                <li class="the-year"><p>2013</p></li>
                                                <li>
                                                    <div class="the-date">
                                                        <span>20</span>
                                                        <small>Dec</small>
                                                    </div>
                                                    <p>
                                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. 
                                                    </p>
                                                </li>
                                                <li>
                                                    <div class="the-date">
                                                        <span>27</span>
                                                        <small>Nov</small>
                                                    </div>
                                                    <p>
                                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. 
                                                    </p>
                                                </li>
                                            </ul>
                                        </div><!-- End div .the-timeline -->
                                        <!-- End timeline -->
                                    </div><!-- End div .user-profile-content -->
                                </div><!-- End div .tab-pane -->
                                <!-- End Tab timeline -->
                                
                                <!-- Tab about -->
                                <div class="tab-pane animated fadeInRight" id="about">
                                    <div class="user-profile-content">
                                        <h5><strong>ABOUT</strong> ME</h5>
                                        <p>
                                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. 
                                        </p>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h5><strong>CONTACT</strong> ME</h5>
                                                    <address>
                                                        <strong>Phone</strong><br>
                                                        <abbr title="Phone">+62 857 123 4567</abbr>
                                                    </address>
                                                    <address>
                                                        <strong>Email</strong><br>
                                                        <a href="mailto:#">first.last@example.com</a>
                                                    </address>
                                                    <address>
                                                        <strong>Website</strong><br>
                                                        <a href="http://r209.com">http://r209.com</a>
                                                    </address>
                                            </div>
                                            <div class="col-sm-6">
                                                <h5><strong>MY</strong> SKILLS</h5>
                                                <p>UI Design</p>
                                                <p>Clean and Modern Web Design</p>
                                                <p>PHP and MySQL Programming</p>
                                                <p>Vector Design</p>
                                            </div>
                                        </div><!-- End div .row -->
                                    </div><!-- End div .user-profile-content -->
                                </div><!-- End div .tab-pane -->
                                <!-- End Tab about -->
                                
                                
                                <!-- Tab user activities -->
                                <div class="tab-pane animated fadeInRight" id="user-activities">
                                    <div class="scroll-user-widget">
                                        <ul class="media-list">
                                            <li class="media">
                                                <a href="#fakelink">
                                                <p><strong>John Doe</strong> Uploaded a photo <strong>&#34;DSC000254.jpg&#34;</strong>
                                                <br /><i>2 minutes ago</i></p>
                                                </a>
                                            </li>
                                            <li class="media">
                                                <a href="#fakelink">
                                                <p><strong>John Doe</strong> Created an photo album  <strong>&#34;Indonesia Tourism&#34;</strong>
                                                <br /><i>8 minutes ago</i></p>
                                                </a>
                                            </li>
                                            <li class="media">
                                                <a href="#fakelink">
                                                <p><strong>Annisa</strong> Posted an article  <strong>&#34;Yogyakarta never ending Asia&#34;</strong>
                                                <br /><i>an hour ago</i></p>
                                                </a>
                                            </li>
                                            <li class="media">
                                                <a href="#fakelink">
                                                <p><strong>Ari Rusmanto</strong> Added 3 products
                                                <br /><i>3 hours ago</i></p>
                                                </a>
                                            </li>
                                            <li class="media">
                                                <a href="#fakelink">
                                                <p><strong>Hana Sartika</strong> Send you a message  <strong>&#34;Lorem ipsum dolor...&#34;</strong>
                                                <br /><i>12 hours ago</i></p>
                                                </a>
                                            </li>
                                            <li class="media">
                                                <a href="#fakelink">
                                                <p><strong>Johnny Depp</strong> Updated his avatar
                                                <br /><i>Yesterday</i></p>
                                                </a>
                                            </li>
                                            <li class="media">
                                                <a href="#fakelink">
                                                <p><strong>John Doe</strong> Uploaded a photo <strong>&#34;DSC000254.jpg&#34;</strong>
                                                <br /><i>2 minutes ago</i></p>
                                                </a>
                                            </li>
                                            <li class="media">
                                                <a href="#fakelink">
                                                <p><strong>John Doe</strong> Created an photo album  <strong>&#34;Indonesia Tourism&#34;</strong>
                                                <br /><i>8 minutes ago</i></p>
                                                </a>
                                            </li>
                                            <li class="media">
                                                <a href="#fakelink">
                                                <p><strong>Annisa</strong> Posted an article  <strong>&#34;Yogyakarta never ending Asia&#34;</strong>
                                                <br /><i>an hour ago</i></p>
                                                </a>
                                            </li>
                                            <li class="media">
                                                <a href="#fakelink">
                                                <p><strong>Ari Rusmanto</strong> Added 3 products
                                                <br /><i>3 hours ago</i></p>
                                                </a>
                                            </li>
                                            <li class="media">
                                                <a href="#fakelink">
                                                <p><strong>Hana Sartika</strong> Send you a message  <strong>&#34;Lorem ipsum dolor...&#34;</strong>
                                                <br /><i>12 hours ago</i></p>
                                                </a>
                                            </li>
                                            <li class="media">
                                                <a href="#fakelink">
                                                <p><strong>Johnny Depp</strong> Updated his avatar
                                                <br /><i>Yesterday</i></p>
                                                </a>
                                            </li>
                                        </ul>
                                    </div><!-- End div .scroll-user-widget -->
                                </div><!-- End div .tab-pane -->
                                <!-- End Tab user activities -->
                                
                                <!-- Tab user messages -->
                                <div class="tab-pane animated fadeInRight" id="mymessage">
                                    <div class="scroll-user-widget">
                                        <ul class="media-list">
                                          <li class="media">
                                            <a class="pull-left" href="#fakelink">
                                              <img class="media-object" src="assets/img/avatar/img_avatar2.png" alt="Avatar">
                                            </a>
                                            <div class="media-body">
                                              <h4 class="media-heading"><a href="#fakelink">John Doe</a> <small>Just now</small></h4>
                                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                                            </div>
                                          </li>
                                          <li class="media">
                                            <a class="pull-left" href="#fakelink">
                                              <img class="media-object" src="assets/img/avatar/1.gif" alt="Avatar">
                                            </a>
                                            <div class="media-body">
                                              <h4 class="media-heading"><a href="#fakelink">Annisa</a> <small>Yesterday at 04:00 AM</small></h4>
                                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam rhoncus</p>
                                            </div>
                                          </li>
                                          <li class="media">
                                            <a class="pull-left" href="#fakelink">
                                              <img class="media-object" src="assets/img/avatar/5.jpg" alt="Avatar">
                                            </a>
                                            <div class="media-body">
                                              <h4 class="media-heading"><a href="#fakelink">Rusmanovski</a> <small>January 17, 2014 05:35 PM</small></h4>
                                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                                            </div>
                                          </li>
                                          <li class="media">
                                            <a class="pull-left" href="#fakelink">
                                              <img class="media-object" src="assets/img/avatar/4.jpg" alt="Avatar">
                                            </a>
                                            <div class="media-body">
                                              <h4 class="media-heading"><a href="#fakelink">Ari Rusmanto</a> <small>January 17, 2014 05:35 PM</small></h4>
                                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                                            </div>
                                          </li>
                                          <li class="media">
                                            <a class="pull-left" href="#fakelink">
                                              <img class="media-object" src="assets/img/avatar/img_avatar.png" alt="Avatar">
                                            </a>
                                            <div class="media-body">
                                              <h4 class="media-heading"><a href="#fakelink">Jenny Doe</a> <small>January 17, 2014 05:35 PM</small></h4>
                                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                                            </div>
                                          </li>
                                          <li class="media">
                                            <a class="pull-left" href="#fakelink">
                                              <img class="media-object" src="assets/img/avatar/img_avatar2.png" alt="Avatar">
                                            </a>
                                            <div class="media-body">
                                              <h4 class="media-heading"><a href="#fakelink">John Doe</a> <small>Just now</small></h4>
                                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                                            </div>
                                          </li>
                                          <li class="media">
                                            <a class="pull-left" href="#fakelink">
                                              <img class="media-object" src="assets/img/avatar/1.gif" alt="Avatar">
                                            </a>
                                            <div class="media-body">
                                              <h4 class="media-heading"><a href="#fakelink">Annisa</a> <small>Yesterday at 04:00 AM</small></h4>
                                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam rhoncus</p>
                                            </div>
                                          </li>
                                          <li class="media">
                                            <a class="pull-left" href="#fakelink">
                                              <img class="media-object" src="assets/img/avatar/5.jpg" alt="Avatar">
                                            </a>
                                            <div class="media-body">
                                              <h4 class="media-heading"><a href="#fakelink">Rusmanovski</a> <small>January 17, 2014 05:35 PM</small></h4>
                                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                                            </div>
                                          </li>
                                          <li class="media">
                                            <a class="pull-left" href="#fakelink">
                                              <img class="media-object" src="assets/img/avatar/4.jpg" alt="Avatar">
                                            </a>
                                            <div class="media-body">
                                              <h4 class="media-heading"><a href="#fakelink">Ari Rusmanto</a> <small>January 17, 2014 05:35 PM</small></h4>
                                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                                            </div>
                                          </li>
                                          <li class="media">
                                            <a class="pull-left" href="#fakelink">
                                              <img class="media-object" src="assets/img/avatar/img_avatar.png" alt="Avatar">
                                            </a>
                                            <div class="media-body">
                                              <h4 class="media-heading"><a href="#fakelink">Jenny Doe</a> <small>January 17, 2014 05:35 PM</small></h4>
                                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                                            </div>
                                          </li>
                                        </ul>
                                    </div><!-- End div .scroll-user-widget -->
                                </div><!-- End div .tab-pane -->
                                <!-- End Tab user messages -->
                            </div><!-- End div .tab-content -->
                        </div><!-- End div .box-info -->
                    </div>
                </div>

        <!-- <div class="row">
            <div class="container-fluid">
                <center>
                    <div class="test">
                        <img src="images/avatar/<?php if(isset($_SESSION['avatar'])){ echo $_SESSION['avatar']; }else{ echo 'img_avatar.png'; } ?>" alt="Avatar" style="width:100%">
                        <div class="container-fluid">
                            <h4><b><?php echo $_SESSION['firstname'].' '. $_SESSION['lastname']; ?></b></h4>
                            <?php echo
                                "<p>Job :<b><i class='arrow right'></i>&nbsp;&nbsp;".$_SESSION['job']."</b></p>",
                                "<p>Grade :<b><i class='arrow right'></i>&nbsp;&nbsp;".$_SESSION['job_grade']."</b></p>",
                                "<p>Argent :<b><i class='arrow right'></i>&nbsp;&nbsp;".$_SESSION['money']."<font color='green'>$</font></b></p>",
                                "<p>Banque :<b><i class='arrow right'></i>&nbsp;&nbsp;".$_SESSION['bank']."<font color='green'>$</font></b></p>",
                                "<p>Sexe :<b><i class='arrow right'></i>&nbsp;&nbsp;"; if($_SESSION['sex'] == 'h'){ echo 'Homme'; }elseif($_SESSION['sex'] == 'f'){ echo 'Femme'; }else{ echo 'Inconnu'; } echo "</b></p>",
                                "<p>Tél :<b><i class='arrow right'></i>&nbsp;&nbsp;".$_SESSION['phone']."</b></p>",
                                "<p>Naissance :<b><i class='arrow right'></i>&nbsp;&nbsp;".$_SESSION['dob']."</b></p>",
                                "<p>Taille :<b><i class='arrow right'></i>&nbsp;&nbsp;".$_SESSION['height']."cm</b></p>",
                                "<p>License d'arme :&nbsp;&nbsp;<b>"; if($_SESSION['weapon'] == '1'){ echo '<span class="label success">Valide</span>'; }else{ echo '<span class="label danger">Invalide</span>'; } echo"</b></p>",
                                "<p>Code de la route :&nbsp;&nbsp;<b>"; if($_SESSION['dmv'] == '1'){ echo '<span class="label success">Valide</span>'; }else{ echo '<span class="label danger">Invalide</span>'; } echo"</b></p>",
                                "<p>Permis de conduire :&nbsp;&nbsp;<b>"; if($_SESSION['drive'] == '1'){ echo '<span class="label success">Valide</span>'; }else{ echo '<span class="label danger">Invalide</span>'; } echo"</b></p>",
                                "<p>Permis poid lourd :&nbsp;&nbsp;<b>"; if($_SESSION['drive_truck'] == '1'){ echo '<span class="label success">Valide</span>'; }else{ echo '<span class="label danger">Invalide</span>'; } echo"</b></p>"; ?>
                        </div>
                    </div>
                </center>
            </div>
        </div> -->

        <?php include('inc/footer.php'); ?>

    </div>
    <!-- ============================================================== -->
    <!-- End content here -->
    <!-- ============================================================== -->

</div>
<!-- End right content -->

</div>
<div id="contextMenu" class="dropdown clearfix">
    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="display:block;position:static;margin-bottom:5px;">
        <li><a tabindex="-1" href="javascript:;" data-priority="high"><i class="fa fa-circle-o text-red-1"></i> High Priority</a></li>
        <li><a tabindex="-1" href="javascript:;" data-priority="medium"><i class="fa fa-circle-o text-orange-3"></i> Medium Priority</a></li>
        <li><a tabindex="-1" href="javascript:;" data-priority="low"><i class="fa fa-circle-o text-yellow-1"></i> Low Priority</a></li>
        <li><a tabindex="-1" href="javascript:;" data-priority="none"><i class="fa fa-circle-o text-lightblue-1"></i> None</a></li>
    </ul>
</div>
<!-- End of page -->
<!-- the overlay modal element -->
<div class="md-overlay"></div>
<!-- End of eoverlay modal -->
<script>
    var resizefunc = [];
</script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="assets/libs/jquery/jquery-1.11.1.min.js"></script>
<script src="assets/libs/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/libs/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
<script src="assets/libs/jquery-ui-touch/jquery.ui.touch-punch.min.js"></script>
<script src="assets/libs/jquery-detectmobile/detect.js"></script>
<script src="assets/libs/jquery-animate-numbers/jquery.animateNumbers.js"></script>
<script src="assets/libs/ios7-switch/ios7.switch.js"></script>
<script src="assets/libs/fastclick/fastclick.js"></script>
<script src="assets/libs/jquery-blockui/jquery.blockUI.js"></script>
<script src="assets/libs/bootstrap-bootbox/bootbox.min.js"></script>
<script src="assets/libs/jquery-slimscroll/jquery.slimscroll.js"></script>
<script src="assets/libs/jquery-sparkline/jquery-sparkline.js"></script>
<script src="assets/libs/nifty-modal/js/classie.js"></script>
<script src="assets/libs/nifty-modal/js/modalEffects.js"></script>
<script src="assets/libs/sortable/sortable.min.js"></script>
<script src="assets/libs/bootstrap-fileinput/bootstrap.file-input.js"></script>
<script src="assets/libs/bootstrap-select/bootstrap-select.min.js"></script>
<script src="assets/libs/bootstrap-select2/select2.min.js"></script>
<script src="assets/libs/magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="assets/libs/pace/pace.min.js"></script>
<script src="assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="assets/libs/jquery-icheck/icheck.min.js"></script>

<!-- Demo Specific JS Libraries -->
<script src="assets/libs/prettify/prettify.js"></script>

<script src="assets/js/init.js"></script>
<!-- Page Specific JS Libraries -->
<script src="assets/libs/d3/d3.v3.js"></script>
<script src="assets/libs/rickshaw/rickshaw.min.js"></script>
<script src="assets/libs/raphael/raphael-min.js"></script>
<script src="assets/libs/morrischart/morris.min.js"></script>
<script src="assets/libs/jquery-knob/jquery.knob.js"></script>
<script src="assets/libs/jquery-jvectormap/js/jquery-jvectormap-1.2.2.min.js"></script>
<script src="assets/libs/jquery-jvectormap/js/jquery-jvectormap-us-aea-en.js"></script>
<script src="assets/libs/jquery-clock/clock.js"></script>
<script src="assets/libs/jquery-easypiechart/jquery.easypiechart.min.js"></script>
<script src="assets/libs/jquery-weather/jquery.simpleWeather-2.6.min.js"></script>
<script src="assets/libs/bootstrap-xeditable/js/bootstrap-editable.min.js"></script>
<script src="assets/libs/bootstrap-calendar/js/bic_calendar.min.js"></script>
<script src="assets/js/apps/calculator.js"></script>
<script src="assets/js/apps/todo.js"></script>
<script src="assets/js/apps/notes.js"></script>
<script src="assets/js/pages/index.js"></script>
</body>
</html>