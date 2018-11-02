<?php
require_once('inc/functions.php');

if(!$_SESSION['logged']){
    header("Location: login.php");
    exit;
}

$perm = $_SESSION['permission_level'];
if($perm <= 0){
    header("Location: 404.php");
    exit;
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset="UTF-8">
        <title>SkypeaRP Panel | Gestion utilisateurs</title>   
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
    <body class="fixed-left">

        <?php include('inc/topbar.php'); ?>

		<!-- Start right content -->
        <div class="content-page">
			<!-- ============================================================== -->
			<!-- Start Content here -->
			<!-- ============================================================== -->
            <div class="content">
				<div class="row">
                    <!-- CONTENT START HERE-->

                    <!-- USERS START HERE-->
                    <?php if(isset($_GET['msg']) AND !empty($_GET['msg'])){ echo '<center><h3><strong><font color="#27ae60">'.urldecode($_GET['msg']).'</font></strong></h3></center>' ; } ?>
                    <?php $users = bdd()->query('SELECT * FROM users ORDER BY permission_level DESC'); while($a = $users->fetch()) { ?>
                        <?php $ID = $a['id']; ?>
                        <center>
                            <div class="container-fluid">
                                <div class="widget">
                                    <div class="widget-header">
                                        <h2><strong><a href="profil.php?id=<?= $ID ?>"><?= $a['firstname'], ' ', $a['lastname'] ?></a></strong></h2>
                                    </div>
                                    <div class="widget-content padding">
                                        <form class="form-vertical" role="form">
                                            <!-- AVATAR START HERE-->
                                            <?php
                                            if(!empty($a['avatar'])){
                                                $imgpath = "assets/img/users/avatar/".$a['avatar'];
                                                if(fileExists($imgpath))
                                                    { echo '<a href="'.$imgpath.'" target="_blank"><img src="'.$imgpath.'" width="150" /></a><br /><br />';
                                                }else{
                                                    if($a['sex'] == 'h'){
                                                        echo '<img src="assets/img/users/avatar/img_avatar.png" width="150" />';
                                                    }elseif($a['sex'] == 'f'){
                                                        echo '<img src="assets/img/users/avatar/img_avatar2.png" width="150" />';
                                                    }
                                                }
                                            }else{
                                                if($a['sex'] == 'h'){
                                                    echo '<img src="assets/img/users/avatar/img_avatar.png" width="150" />';
                                                }elseif($a['sex'] == 'f'){
                                                    echo '<img src="assets/img/users/avatar/img_avatar2.png" width="150" />';
                                                }
                                            }
                                            $black = GetBlackMoney($a['identifier']);
                                            $mort = '<img src="assets/img/dead.png" width="2%">';
                                            ?>
                                            <!-- AVATAR END HERE-->
                                            <div class="form-group">
                                                <p>Job : <strong><?php if($a['job'] == 'unemployed'){ echo 'Sans emploi'; }else{ echo $a['job']; } ?></strong></p>
                                                <p>Job grade : <strong><?= $a['job_grade'] ?></strong></p>
                                                <p><img src="assets/img/argent/cash.png"> Liquide : <strong><?= number_format($a['money']) ?> <font color="lightgreen">$</font></strong></p>
                                                <p><img src="assets/img/argent/bank.png"> Banque : <strong><?= number_format($a['bank']) ?> <font color="lightgreen">$</font></strong></p>
                                                <p><img src="assets/img/argent/black_money.png"> Argent sale : <strong><?= number_format($black) ?> <font color="lightgreen">$</font></strong></p>
                                                <p>Sexe : <strong><?php if($a['sex'] == 'h'){ echo 'Homme'; }elseif($a['sex'] == 'f'){ echo 'Femme'; }else{ echo 'Inconnu'; } ?></strong></p>
                                                <p>Téléphone : <strong><?= $a['phone_number'] ?></strong></p>
                                                <p>Date de naissance : <strong><?= $a['dateofbirth'] ?></strong></p>
                                                <p>Taille : <strong><?= $a['height'] ?>cm</strong></p>
                                                <p>Groupe : <strong><?php if($a['group'] != 'user'){ echo '<font color="red">'.$a['group'].'</font>'; }else{ echo 'Joueur'; } ?></strong></p>
                                                <p>Niveau de permission : <strong><?= $a['permission_level'] ?></strong></p>
                                                <p>Santé : <strong><?php if($a['isDead'] == 0){ echo '<font color="#2ecc71">VIVANT</font>'; }else{ echo $mort.'<font color="red">MORT</font>'.$mort; } ?></strong></p>
                                                <?php GetLicense($a['identifier']); ?>
                                                <p>Code de la route : <strong><?php if(isset($_SESSION['admindmv']) AND !empty($_SESSION['admindmv'])){ echo '<font color="#2ecc71">Valide</font><br />'; }else{ echo '<font color="#c0392b">Invalide</font><br />'; } ?></strong></p>
                                                <p>Permis de conduire : <strong><?php if(isset($_SESSION['adminddrive']) AND !empty($_SESSION['adminddrive'])){ echo '<font color="#2ecc71">Valide</font><br />'; }else{ echo '<font color="#c0392b">Invalide</font><br />'; } ?></strong></p>
                                                <p>Permis poid lourd : <strong><?php if(isset($_SESSION['admindrive_truck']) AND !empty($_SESSION['admindrive_truck'])){ echo '<font color="#2ecc71">Valide</font><br />'; }else{ echo '<font color="#c0392b">Invalide</font><br />'; } ?></strong></p>
                                                <p>Permis de port d'arme : <strong><?php if(isset($_SESSION['adminweapon']) AND !empty($_SESSION['adminweapon'])){ echo '<font color="#2ecc71">Valide</font><br />'; }else{ echo '<font color="#c0392b">Invalide</font><br />'; } ?></strong></p>
                                                <?php if($a['lastest_panel_connection'] != NULL){ ?>
                                                <p>Dernière connexion au panel : <strong><?= $a['lastest_panel_connection'] ?></strong></p>
                                                <?php }else{ ?>
                                                    <p>Dernière connexion au panel : <strong>Jamais</strong></p>
                                                <?php } ?>
                                                <a href="supprimeruser.php?id=<?= $a['id'] ?>"><b>Supprimer l'utilisateur</b></a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </center>
                    <?php } ?>
                    <!-- USERS END HERE-->

                    <!-- CONTENT END HERE-->
				</div>

			<?php include('inc/footer.php'); ?>

            </div>
			<!-- ============================================================== -->
			<!-- End content here -->
			<!-- ============================================================== -->

        </div>
		<!-- End right content -->

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