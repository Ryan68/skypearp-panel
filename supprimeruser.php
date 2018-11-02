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
if(isset($_POST['id']) AND !empty($_POST['id'])) {
    $get_id = htmlspecialchars($_POST['id']);
    $haveavatar = bdd()->prepare('SELECT * FROM users WHERE id = ?');
    $haveavatar->execute(array($get_id));
    $result = $haveavatar->fetch();
    if(!empty($result['avatar'])){
        $imgpath = "assets/img/users/avatar/".$result['avatar'];
        if(fileExists($imgpath)){
            unlink($imgpath);
        }
    }  
    $deluser = bdd()->prepare('DELETE FROM users WHERE id = ?');
    $deluser->execute(array($get_id));
    $delmsg = 'Utilisateur+supprim%C3%A9+avec+succ%C3%A8s+%21';
    header('Location: users.php?msg='.$delmsg);
} else {
    die('Utilisateur introuvable');
}
?>