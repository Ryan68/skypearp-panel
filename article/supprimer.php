<?php
$bdd = new PDO("mysql:host=localhost;dbname=essentialmode;charset=utf8", "root", "");
if(isset($_GET['id']) AND !empty($_GET['id'])) {
   $suppr_id = htmlspecialchars($_GET['id']);
   $check = $bdd->prepare("SELECT * FROM articles WHERE id = ?");
   $check->execute(array($suppr_id));
   $articlesexist = $check->rowCount();
   if($articlesexist == 1){
		$suppr = $bdd->prepare('DELETE FROM articles WHERE id = ?');
		$suppr->execute(array($suppr_id));
		$chemin = '../assets/img/miniatures/'.$_GET['id'].'.jpg';
        unlink($chemin);
		$msg = "L'article à été supprimé avec succès !";
   		$message = urlencode($msg);
   		header('Location: '.$_SERVER['HTTP_REFERER'].'?msg='.$message.'&type=success');
		//header('Location: ../editarticle.php');
   }else{
   		$msg = "L'article est introuvable !";
   		$message = urlencode($msg);
   		header('Location: '.$_SERVER['HTTP_REFERER'].'?msg='.$message.'&type=error');
   		//die('Article introuvable');
   }  
}
?>