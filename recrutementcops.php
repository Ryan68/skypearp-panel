<?php
include('inc/functions.php');

if(!$_SESSION['logged']){
    header("Location: login.php");
    exit;
}

if(isset($_POST['recrutement'])){
	search($_POST['rctfirstname'], $_POST['rctlastname']);
}

if(isset($_POST['newrct'])){
	newsearch();
}

$identifier = isset($_SESSION['searchidentifier']) ? $_SESSION['searchidentifier'] : NULL;
$firstname = isset($_SESSION['searchfirstname']) ? $_SESSION['searchfirstname'] : NULL;
$lastname = isset($_SESSION['searchlastname']) ? $_SESSION['searchlastname'] : NULL;
$status = isset($_SESSION['status']) ? $_SESSION['status'] : NULL;
$job = isset($_SESSION['searchjob']) ? $_SESSION['searchjob'] : NULL;
$dob = isset($_SESSION['searchdob']) ? $_SESSION['searchdob'] : NULL;
$sex = isset($_SESSION['searchsex']) ? $_SESSION['searchsex'] : NULL;
$height = isset($_SESSION['searchheight']) ? $_SESSION['searchheight'] : NULL;

$dmv = isset($_SESSION['searchdmv']) ? $_SESSION['searchdmv'] : NULL;
$drive = isset($_SESSION['searchdrive']) ? $_SESSION['searchdrive'] : NULL;
$drive_truck = isset($_SESSION['searchdrive_truck']) ? $_SESSION['searchdrive_truck'] : NULL;
$weapon = isset($_SESSION['searchweapon']) ? $_SESSION['searchweapon'] : NULL;

$uid = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : NULL;

// if($_SESSION['job'] != 'police'){
//     header("Location: ".$_SERVER['HTTP_REFERER']);
//     exit;
// }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset="UTF-8">
        <title>SkypeaRP Panel | Accueil</title>   
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
                    <!-- FAQ START HERE-->
		            	<div class="container-fluid">
				            <div class="widget">
				            	<div class="widget-header">
									<h2><strong>Police :</strong></h2>
								</div>
								<div class="widget-content padding">
									<?php if(!isset($_SESSION['status'])){ ?>
									<form method="POST">
                                    <p><center><h3><font color='black'>Individu à recruter :</font></h3></center></p>
                                        <div class="form-group login-input">
                                        <input type="text" class="form-control text-input" name="rctfirstname" placeholder="Prénom" style="text-align: center;">
                                        </div>
                                        <div class="form-group login-input">
                                        <input type="text" class="form-control text-input" name="rctlastname" placeholder="Nom" style="text-align: center;">
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                            <button type="submit" name="recrutement" class="btn btn-skypea btn-block">Rechercher</button>
                                            </div>
                                        </div>
                                    </form>
                                    <?php } ?>
                                    <?php if($job == 'unemployed'){ $job = 'Sans emploi'; } ?>
                                    <?php if(isset($_SESSION['status']) AND $_SESSION['status'] = 'success'){ ?>
                                    <div class="widget-content padding" style="text-align: center;">
										<p>Nom : <b><?= $lastname ?></b></p>
										<p>Prénom : <b><?= $firstname ?></b></p>
										<p>Sexe : <b><?php if($sex == 'h'){ echo 'Homme'; }elseif($sex == 'f'){ echo 'Femme'; }else{ echo 'Inconnu'; } ?></b></p>
										<p>Taille : <b><?= $height ?>cm</b></p>
										<p>Date de naissance : <b><?= $dob ?></b></p>
										<p>Job : <b><?= $job ?></b></p>
										<p>Code de la route : <b><?php if($dmv == 'dmv'){ echo '<font color="green">Valide</font>'; }else{ echo '<font color="red">Invalide</font>'; } ?></b></p>
										<p>Permis de conduire : <b><?php if($drive == 'drive'){ echo '<font color="green">Valide</font>'; }else{ echo '<font color="red">Invalide</font>'; } ?></b></p>
										<p>Permis poid lourd : <b><?php if($drive_truck == 'drive_truck'){ echo '<font color="green">Valide</font>'; }else{ echo '<font color="red">Invalide</font>'; } ?></b></p>
										<p>Permis de port d'arme : <b><?php if($weapon == 'weapon'){ echo '<font color="green">Valide</font>'; }else{ echo '<font color="red">Invalide</font>'; } ?></b></p>
										<form method="POST">
											<button type="submit" name="newrct" class="btn btn-skypea">Nouvelle recherche</button>
										</form>
									</div>
									<?php } ?>
								</div>
							</div>
						</div>
		            <!-- FAQ END HERE-->
                    <!-- CONTENT END HERE-->
				</div>

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