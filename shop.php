<?php
include('inc/functions.php');

if(!$_SESSION['logged']){
    header("Location: login.php");
    exit;
}

// if($_SESSION['job'] != 'ambulance'){
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

    <style>
    	.card {
		    /* Add shadows to create the "card" effect */
		    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
		    transition: 0.3s;
		    border-radius: 5px; /* 5px rounded corners */
		    width: 20%;
		    display: inline-block;
		}

		/* On mouse-over, add a deeper shadow */
		.card:hover {
		    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
		}

		/* Add some padding inside the card container */
		.container2 {
		    padding: 2px 16px;
		}

		/* Add rounded corners to the top left and the top right corner of the image */
		img {
		    border-radius: 5px 5px 0 0;
		}

		table {
		    border-collapse: collapse;
		    border-spacing: 0;
		    width: 100%;
		    border: 1px solid #ddd;
		}

		th, td {
		    text-align: center;
		    padding: 16px;
		}

		th:first-child, td:first-child {
		    text-align: left;
		}

		tr:nth-child(even) {
		    background-color: #f2f2f2
		}

		.fa-check {
		    color: green;
		}

		.fa-remove {
		    color: red;
		}

		.card2 {
		  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
		  max-width: 300px;
		  margin: auto;
		  text-align: center;
		  font-family: arial;
		  display: inline-block;
		}

		.price {
		  color: grey;
		  font-size: 22px;
		}

		.card2 button {
		  border: none;
		  outline: 0;
		  padding: 12px;
		  color: white;
		  background-color: #000;
		  text-align: center;
		  cursor: pointer;
		  width: 100%;
		  font-size: 18px;
		}

		.card2 button:hover {
		  opacity: 0.7;
		}
	</style>

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
                                        <h2><strong>Boutique</a></strong></h2>
                                    </div>
                                    <div class="widget-content padding">
					            		<center>
						            		<!-- <div class="card">
											  <img src="assets/img/bronze.png" alt="Avatar" style="width:100%">
											  <div class="container2">
											    <h4><b>Offre N°1</b></h4> 
											    <p>Architect & Engineer</p> 
											  </div>
											</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											<div class="card">
											  <img src="assets/img/silver.png" alt="Avatar" style="width:100%">
											  <div class="container2">
											    <h4><b>Offre N°2</b></h4> 
											    <p>Architect & Engineer</p> 
											  </div>
											</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											<div class="card">
											  <img src="assets/img/gold.png" alt="Avatar" style="width:100%">
											  <div class="container2">
											    <h4><b>Offre N°3</b></h4> 
											    <p>Architect & Engineer</p> 
											  </div>
											</div>
											<br /> -->
											<form action="https://selly.gg/p/e68023fe" target="_blank" method="" style="display: inline-block;">
												<div class="card2">
												  <img src="assets/img/bronze.png" alt="Denim Jeans" style="width:80%">
												  <h1>Bronze package</h1>
												  <p class="price">$9.99</p>
												  <p>Some text about the jeans. Super slim and comfy lorem ipsum lorem jeansum. Lorem jeamsun denim lorem jeansum.</p>
												  <p><button>Acheter</button></p>
												</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											</form>
											<form action="https://selly.gg/p/c5339a2c" target="_blank" method="" style="display: inline-block;">
												<div class="card2">
												  <img src="assets/img/silver.png" alt="Denim Jeans" style="width:80%">
												  <h1>Silver package</h1>
												  <p class="price">$19.99</p>
												  <p>Some text about the jeans. Super slim and comfy lorem ipsum lorem jeansum. Lorem jeamsun denim lorem jeansum.</p>
												  <p><button>Acheter</button></p>
												</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											</form>
											<form action="https://selly.gg/p/dfa9bb53" target="_blank" method="" style="display: inline-block;">
												<div class="card2">
												  <img src="assets/img/gold.png" alt="Denim Jeans" style="width:80%">
												  <h1>Gold package</h1>
												  <p class="price">$29.99</p>
												  <p>Some text about the jeans. Super slim and comfy lorem ipsum lorem jeansum. Lorem jeamsun denim lorem jeansum.</p>
												  <p><button>Acheter</button></p>
												</div>
											</form>
										</center>
					            		<!-- COMPARAISON START HERE -->
							            <!-- <h2>Comparison Table</h2>

										<table>
										  <tr>
										    <th style="width:30%">Features</th>
										    <th>Basic</th>
										    <th>Pro</th>
										    <th>Supreme</th>
										  </tr>
										  <tr>
										    <td>Sample text</td>
										    <td><i class="fa fa-remove"></i></td>
										    <td><i class="fa fa-check"></i></td>
										    <td><i class="fa fa-remove"></i></td>
										  </tr>
										  <tr>
										    <td>Sample text</td>
										    <td><i class="fa fa-remove"></i></td>
										    <td><i class="fa fa-check"></i></td>
										    <td><i class="fa fa-check"></i></td>
										  </tr>
										  <tr>
										    <td>Sample text</td>
										    <td><i class="fa fa-check"></i></td>
										    <td><i class="fa fa-remove"></i></td>
										    <td><i class="fa fa-check"></i></td>
										  </tr>
										  <tr>
										    <td>Sample text</td>
										    <td><i class="fa fa-remove"></i></td>
										    <td><i class="fa fa-check"></i></td>
										    <td><i class="fa fa-remove"></i></td>
										  </tr>
										  <tr>
										    <td>Sample text</td>
										    <td><i class="fa fa-remove"></i></td>
										    <td><i class="fa fa-check"></i></td>
										    <td><i class="fa fa-check"></i></td>
										  </tr>
										</table> -->
										<!-- COMPARAISON END HERE -->
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