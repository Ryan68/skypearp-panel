<?php
include('inc/functions.php');

if(!$_SESSION['logged']){
    header("Location: login.php");
    exit;
}

if(isset($_GET['id']) AND !empty($_GET['id'])) {
   $get_id = htmlspecialchars($_GET['id']);
   $article = bdd()->prepare('SELECT * FROM articles WHERE id = ?');
   $article->execute(array($get_id));
   if($article->rowCount() == 1) {
      $article = $article->fetch();
      $id = $article['id'];
      $titre = $article['titre'];
      $articledate = $article['date_time_publication'];
      $contenu = $article['contenu'];
      if(isset($_POST['submit_commentaire'])) {
          if(isset($_POST['pseudo'],$_POST['commentaire']) AND !empty($_POST['pseudo']) AND !empty($_POST['commentaire'])) {
             $pseudo = htmlspecialchars($_POST['pseudo']);
             $commentaire = htmlspecialchars($_POST['commentaire']);
             if(strlen($pseudo) < 25) {
                $ins = bdd()->prepare('INSERT INTO commentaires (pseudo, commentaire, date_publication, id_article) VALUES (?,?, Now(),?)');
                $ins->execute(array($pseudo,$commentaire,$get_id));
                $c_msg = "Votre commentaire a bien été posté";
                $type = 'success';
             } else {
                $c_msg = "Le pseudo doit faire moins de 25 caractères";
                $type = 'error';
             }
          } else {
             $c_msg = "Tous les champs doivent être complétés";
             $type = 'error';
          }
       }
       $commentaires = bdd()->prepare('SELECT * FROM commentaires WHERE id_article = ? ORDER BY id DESC');
       $commentaires->execute(array($get_id));
   } else {
      die('Cet article n\'existe pas !');
   }
} else {
    header("Location: 404.php");
    exit;
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;" charset="UTF-8">
        <title>SkypeaRP Panel | <?= $titre ?></title>   
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
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
                    <!-- ARTICLE START HERE-->
		            <?php if(!empty($get_id )) { ?>
		            	<div class="container-fluid">
                    <?php if(isset($c_msg) AND isset($type) AND !empty($c_msg) AND !empty($type)) { alert($c_msg, $type); } ?>
				            <div class="widget">
								<div class="widget-header">
									<h2><strong><?= $titre ?></strong></h2>
								</div>
								<div class="widget-content padding">
									<form class="form-vertical" role="form">
										<!-- <img src="assets/img/miniatures/<?= $get_id ?>.jpg" width="150" /><br /><br /> -->
                                        <?php $imgpath = "assets/img/miniatures/".$get_id.".jpg";  ?>
                                            <?php if(fileExists($imgpath)) { echo '<a href="'.$imgpath.'" target="_blank"><img src="'.$imgpath.'" width="400" /></a><br /><br />'; }else{ echo '<img src="assets/img/miniatures/miniature_defaut.jpg" width="400" /><br /><br />'; } ?>
										<div class="form-group">
											<?= $contenu ?>
										</div>
										<div class="form-group">
											Publié le <b><?php $date = strtotime($articledate); echo date('d/m/y', $date).' à '. date('H:m', $date); ?></b>
									</form>
                                    <hr>
                                        <h2>Ajouter un commentaires:</h2>
                                        <form method="POST">
                                          <div class="w3-row w3-section">
                                            <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
                                              <div class="w3-rest">
                                                <input type="text" class="w3-input w3-border w3-round-large w3-light-grey" style="width:15%" name="pseudo" placeholder="" value="<?= $_SESSION['firstname'].' '.$_SESSION['lastname'] ?>" readonly/>
                                              </div>
                                          </div>
                                          <div class="w3-row w3-section">
                                            <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-pencil"></i></div>
                                              <div class="w3-rest">
                                                <input type="text" class="w3-input w3-border w3-round-large w3-light-grey" style="width:30%" name="commentaire" placeholder="Votre commentaire..."/>
                                              </div>
                                          </div>
                                           <p><input type="submit" class="btn btn-skypea" value="Poster mon commentaire" name="submit_commentaire" /></p>
                                        </form>
                                        <br />
                                        <?php while($c = $commentaires->fetch()) { ?>
                                            <hr>
                                           <p><b><?= $c['pseudo'] ?>:</b></p>
                                           <p><?= $c['commentaire'] ?></p>
                                           <p>Posté le : <b><?php $date = strtotime($c['date_publication']); echo date('d/m/y', $date).' à '. date('H:m', $date); ?></b></p>
                                        <?php } ?>
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