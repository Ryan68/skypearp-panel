<?php
include('inc/functions.php');

if(!$_SESSION['logged']){
    header("Location: login.php");
    exit;
}

$perm = $_SESSION['permission_level'];
if($perm == 0){
    header("Location: 404.php");
    exit;
}

if(isset($_GET['id']) AND !empty($_GET['id'])) {
   $get_id = htmlspecialchars($_GET['id']);
   $deluser = bdd()->prepare('DELETE FROM users WHERE id = ?');
   $deluser->execute(array($get_id));
   $delmsg = 'Utilisateur+supprim%C3%A9+avec+succ%C3%A8s+%21';
   header('Location: users.php?msg='.$delmsg);
} else {
   die('Utilisateur introuvable');
}
?>