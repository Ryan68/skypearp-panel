<?php
include('inc/functions.php');
require_once 'autoload.php';
$secret = '6LezXU0UAAAAAMtX859-rngB5tkBHUWm0LuTfDay';

if(isset($_POST['connexion'])){
	if(isset($_POST['g-recaptcha-response'])){
        $recaptcha = new \ReCaptcha\ReCaptcha($secret);
        $resp = $recaptcha->verify($_POST['g-recaptcha-response']);
        if ($resp->isSuccess()) {
        	$firstname = htmlspecialchars($_POST['firstname']);
        	$lastname = htmlspecialchars($_POST['lastname']);
        	$password = htmlspecialchars($_POST['password']);
            Connexion($firstname, $lastname, $password);
			if(isset($_SESSION['logged'])){
				if($_SESSION['logged']){
					alert('Connexion réussi avec succès !', 'success');
					header('Refresh:2; index.php');
				}else{
					alert('Error !', 'error');
				}
			}
        } else {
            //$errors = $resp->getErrorCodes();
            alert('Captcha invalide', 'error');
        }
    }else{
    	alert('Captcha non rempli', 'error');
    }
}


?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;" charset="UTF-8">
        <title>SkypeaRP Panel | Connexion</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="description" content="">
        <meta name="keywords" content="coco bootstrap template, coco admin, bootstrap,admin template, bootstrap admin,">
        <meta name="author" content="Huban Creative">

        <!-- Base Css Files -->
        <link href="assets/libs/jqueryui/ui-lightness/jquery-ui-1.10.4.custom.min.css" rel="stylesheet" />
        <link href="assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
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
		<script src="https://www.google.com/recaptcha/api.js" async defer></script>
    </head>
    <body class="fixed-left login-page">
	<!-- Begin page -->
	<div class="container">
		<div class="full-content-center">
			<?php if(isset($_SESSION['msg']) AND isset($_SESSION['msgtype'])){
	          $msg = htmlspecialchars($_SESSION['msg']);
	          $action->alert($msg, $_SESSION['msgtype']);
	          } ?>
			<!-- <p class="text-center"><a href="#"><img src="assets/img/login-logo.png" alt="Logo"></a></p> -->
			<div class="login-wrap animated flipInX">
				<div class="login-block">
					<!-- <img src="images/users/user.png" class="img-circle not-logged-avatar" style="width:100%"> -->
					<img src="images/users/user.png" style="width:100%">
					<!-- <p><center><h2><font color='white'>Panel Civil</font></h2></center></p> -->
					<center><form role="form" action="" method="POST">
						<div class="w3-row w3-section">
                        	<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
                            <div class="w3-rest">
                            	<input type="text" class="w3-input w3-border w3-round-large w3-light-grey" style="width:100%" name="firstname" placeholder="Prénom" required autofocus/>
                            </div>
                        </div>
                        <div class="w3-row w3-section">
                        	<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
                            <div class="w3-rest">
                            	<input type="text" class="w3-input w3-border w3-round-large w3-light-grey" style="width:100%" name="lastname" placeholder="Nom" required/>
                            </div>
                        </div>
                        <div class="w3-row w3-section">
                        	<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-key"></i></div>
                            <div class="w3-rest">
                            	<input type="password" class="w3-input w3-border w3-round-large w3-light-grey" style="width:100%" name="password" placeholder="Mot de passe" required/>
                            </div>
                        </div>
						<!-- <div class="form-group login-input">
						<i class="fa fa-user overlay"></i>
						<input type="text" class="form-control text-input" name="firstname" placeholder="Prénom" required autofocus>
						</div>
						<div class="form-group login-input">
						<i class="fa fa-user overlay"></i>
						<input type="text" class="form-control text-input" name="lastname" placeholder="Nom" required>
						</div>
						<div class="form-group login-input">
						<i class="fa fa-key overlay"></i>
						<input id="psw" type="password" class="form-control text-input" name="password" placeholder="Mot de passe" required>
						</div> -->
						<div class="g-recaptcha" data-sitekey="6LezXU0UAAAAADImLsERtn26IXe2e115FO2xE_iY"></div>
						<div class="row">
							<div class="col-sm-12" >
								<button type="submit" name="connexion" class="btn btn-skypea btn-block">Connexion</button>
							</div>
							<!-- <div class="col-sm-6" >
								<a href="register" class="btn btn-default btn-block">Inscription</a>
							</div> -->
						</div>
					</form></center>
				</div>
			</div>

		</div>
	</div>
	<!-- the overlay modal element -->
	<div class="md-overlay"></div>
	<!-- End of eoverlay modal -->
	<script>
		var resizefunc = [];
	</script>
	</body>
</html>