<?php
include('inc/functions.php');

if(!$_SESSION['logged']){
    header("Location: login.php");
    exit;
}


?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;" charset="UTF-8">
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
				<!-- Start info box -->
				<div class="row top-summary">
					<div class="col-lg-3 col-md-6">
						<div class="widget green-1 animated fadeInDown">
							<div class="widget-content padding">
								<div class="widget-icon">
									<i class="icon-globe-inv"></i>
								</div>
								<div class="text-box">
									<!-- <p class="maindata">TOTAL <b>VISITORS</b></p> -->
									<?php $user = CountUsers(); ?>
									<p class="maindata">TOTAL <b>JOUEURS</b></p>
									<h2><span class="animate-number" data-value="<?= $user ?>" data-duration="2000">0</span></h2>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="widget-footer">
								<div class="row">
									<div class="col-sm-12">
										<i class="fa fa-caret-up rel-change"></i> <b>39%</b> increase in traffic
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="col-lg-3 col-md-6">
						<div class="widget darkblue-2 animated fadeInDown">
							<div class="widget-content padding">
								<div class="widget-icon">
									<i class="icon-bag"></i>
								</div>
								<div class="text-box">
									<?php $veh = CountVehs(); ?>
									<p class="maindata">TOTAL VEHICULE <b>ACHETÉ</b></p>
									<h2><span class="animate-number" data-value="<?= $veh ?>" data-duration="2000">0</span></h2>

									<div class="clearfix"></div>
								</div>
							</div>
							<div class="widget-footer">
								<div class="row">
									<div class="col-sm-12">
										<i class="fa fa-caret-down rel-change"></i> <b>11%</b> decrease in sales
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="col-lg-3 col-md-6">
						<div class="widget pink-1 animated fadeInDown">
							<div class="widget-content padding">
								<div class="widget-icon">
									<i class="fa fa-dollar"></i>
								</div>
								<div class="text-box">
									<?php $properties = CountProperties(); ?>
									<p class="maindata">TOTAL PROPRIÉTÉS <b>ACHETÉ</b></p>
									<h2><span class="animate-number" data-value="<?= $properties ?>" data-duration="2000">0</span></h2>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="widget-footer">
								<div class="row">
									<div class="col-sm-12">
										<i class="fa fa-caret-down rel-change"></i> <b>7%</b> decrease in income
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="col-lg-3 col-md-6">
						<div class="widget lightblue-1 animated fadeInDown">
							<div class="widget-content padding">
								<div class="widget-icon">
									<i class="fa fa-users"></i>
								</div>
								<div class="text-box">
									<?php $licenses = CountLicenses(); ?>
									<p class="maindata">TOTAL PERMIS <b>OBTENU</b></p>
									<h2><span class="animate-number" data-value="<?= $licenses ?>" data-duration="2000">0</span></h2>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="widget-footer">
								<div class="row">
									<div class="col-sm-12">
										<i class="fa fa-caret-up rel-change"></i> <b>6%</b> increase in users
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

				</div>
				<!-- End of info box -->

				<div class="row">
                    <!-- CONTENT START HERE-->
                    <!-- ARTICLE START HERE-->
		            <?php $articles = bdd()->query('SELECT * FROM articles ORDER BY date_time_publication DESC'); while($a = $articles->fetch()) { ?>
		            	<div class="container-fluid">
				            <div class="widget">
								<div class="widget-header">
									<h2><strong><a href="article.php?id=<?= $a['id'] ?>"><?= $a['titre'] ?></a></strong></h2>
								</div>
								<div class="widget-content padding">
									<form class="form-vertical" role="form">
										<?php $imgpath = "assets/img/miniatures/".$a['id'].".jpg";  ?>
										<!-- <a href="<?= $imgpath ?>" target="_blank"><img src="<?= $imgpath ?>" width="150" /></a><br /><br /> -->
                                            <?php if(fileExists($imgpath)) { echo '<a href="'.$imgpath.'" target="_blank"><img src="'.$imgpath.'" width="150" /></a><br /><br />'; }else{ echo '<img src="assets/img/miniatures/miniature_defaut.jpg" width="150" /><br /><br />'; } ?>
										<div class="form-group">
											<?= $a['contenu'] ?>
										</div>
										<hr>
										<div class="form-group">
											Publié le <b><?php $date = strtotime($a['date_time_publication']); echo date('d/m/y', $date).' à '. date('H:m', $date); ?></b>
										</div>
									</form>
								</div>
							</div>
						</div>
		            <?php } ?>
		            <!-- ARTICLE END HERE-->
                    <!-- CONTENT END HERE-->
				</div>

			<?php include('inc/footer.php'); ?>

            </div>
			<!-- ============================================================== -->
			<!-- End content here -->
			<!-- ============================================================== -->

        </div>
		<!-- End right content -->
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