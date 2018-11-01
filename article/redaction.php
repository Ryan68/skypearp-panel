<?php

//echo "<script>document.write('<script src=\"http://' + (location.host || 'http://localhost:82').split(':')[0] + ':35729/livereload.js?snipver=1\"></' + 'script>')</script>";


$bdd = new PDO("mysql:host=localhost;dbname=articles;charset=utf8", "root", "");
$mode_edition = 0;
if(isset($_GET['edit']) AND !empty($_GET['edit'])) {
   $mode_edition = 1;
   $edit_id = htmlspecialchars($_GET['edit']);
   $edit_article = $bdd->prepare('SELECT * FROM articles WHERE id = ?');
   $edit_article->execute(array($edit_id));
   if($edit_article->rowCount() == 1) {
      $edit_article = $edit_article->fetch();
   } else {
      die('Erreur : l\'article n\'existe pas...');
   }
}
if(isset($_POST['article_titre'], $_POST['article_contenu'])) {
   if(!empty($_POST['article_titre']) AND !empty($_POST['article_contenu'])) {
      
      $article_titre = htmlspecialchars($_POST['article_titre']);
      $article_contenu = htmlspecialchars($_POST['article_contenu']);
      if($mode_edition == 0) {
         // var_dump($_FILES);
         // var_dump(exif_imagetype($_FILES['miniature']['tmp_name']));
         $ins = $bdd->prepare('INSERT INTO articles (titre, contenu, date_time_publication, date_time_edition) VALUES (?, ?, NOW(), NOW())');
         $ins->execute(array($article_titre, $article_contenu));
         $lastid = $bdd->lastInsertId();
         
         if(isset($_FILES['miniature']) AND !empty($_FILES['miniature']['name'])) {
            if(exif_imagetype($_FILES['miniature']['tmp_name']) == 2) {
               $chemin = 'miniatures/'.$lastid.'.jpg';
               move_uploaded_file($_FILES['miniature']['tmp_name'], $chemin);
            } else {
               $message = 'Votre image doit être au format jpg';
            }
         }
         $message = 'Votre article a bien été posté';
      } else {
         $update = $bdd->prepare('UPDATE articles SET titre = ?, contenu = ?, date_time_edition = NOW() WHERE id = ?');
         $update->execute(array($article_titre, $article_contenu, $edit_id));
         header('Location: article.php?id='.$edit_id);
         $message = 'Votre article a bien été mis à jour !';
      }
   } else {
      $message = 'Veuillez remplir tous les champs';
   }
}
?>
<!DOCTYPE html>
<html>
<head>
   <title>Rédaction / Edition</title>
   <meta charset="utf-8">
</head>
<body>
   <form method="POST" enctype="multipart/form-data">
      <input type="text" name="article_titre" placeholder="Titre"<?php if($mode_edition == 1) { ?> value="<?= 
      $edit_article['titre'] ?>"<?php } ?> /><br />
      <textarea name="article_contenu" placeholder="Contenu de l'article"><?php if($mode_edition == 1) { ?><?= 
      $edit_article['contenu'] ?><?php } ?></textarea><br />
      <?php if($mode_edition == 0) { ?>
      <input type="file" name="miniature" /><br />
      <?php } ?>
      <input type="submit" <?php if($mode_edition == 1) { ?> value="Modifier article"<?php }else{ ?> value="Envoyez article"<?php } ?> />
   </form>
   <br />
   <?php if(isset($message)) { echo $message; } ?>
</body>
</html>