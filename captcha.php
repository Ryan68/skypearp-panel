<?php
require_once 'autoload.php';
$secret = '6LezXU0UAAAAAMtX859-rngB5tkBHUWm0LuTfDay';
if(isset($_POST['submitpost'])){
    if(isset($_POST['g-recaptcha-response'])){
        $recaptcha = new \ReCaptcha\ReCaptcha($secret);
        $resp = $recaptcha->verify($_POST['g-recaptcha-response']);
        if ($resp->isSuccess()) {
            var_dump('Captcha valide');
        } else {
            $errors = $resp->getErrorCodes();
            var_dump('Captcha invalide');
            var_dump($errors);
        }
    }else{
        var_dump('Captcha non rempli');
    }
}

    
?>
<html>
  <head>
    <title>reCAPTCHA demo: Simple page</title>
     <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  </head>
  <body>
    <form action="?" method="POST">
      <div class="g-recaptcha" data-sitekey="6LezXU0UAAAAADImLsERtn26IXe2e115FO2xE_iY"></div>
      <br/>
      <input type="submit" value="Valider" name="submitpost">
    </form>
  </body>
</html>