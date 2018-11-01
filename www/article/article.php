<?php

echo "<script>document.write('<script src=\"http://' + (location.host || 'http://localhost:82').split(':')[0] + ':35729/livereload.js?snipver=1\"></' + 'script>')</script>";

include('../inc/functions.php');

if(isset($_GET['id']) AND !empty($_GET['id'])) {
   $get_id = htmlspecialchars($_GET['id']);
   $article = bddarticles()->prepare('SELECT * FROM articles WHERE id = ?');
   $article->execute(array($get_id));
   if($article->rowCount() == 1) {
      $article = $article->fetch();
      $id = $article['id'];
      $_SESSION['articleid'] = $id;
      $titre = $article['titre'];
      $_SESSION['articletitre'] = $titre;
      $contenu = $article['contenu'];
      $_SESSION['articlecontenu'] = $contenu;
   } else {
      die('Cet article n\'existe pas !');
   }
} else {
   die('Erreur');
}
?>
<!DOCTYPE html>
<html>
<head>
   <title>Accueil</title>
   <meta charset="utf-8">
</head>
<body>
   <img src="miniatures/<?= $id ?>.jpg" width="400" />
   <h1><?= $titre ?></h1>
   <p><?= $contenu ?></p>
</body>
</html>