<?php
   session_start();

   $_SESSION = array();

   session_destroy();

   //echo 'Déconnexion réussi !';
   header('Refresh: 0; URL = login.php');
?>