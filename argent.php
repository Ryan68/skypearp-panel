<?php
require('inc/functions.php');
if(isset($_POST['ID']) AND isset($_POST['montant']) AND isset($_POST['type']) AND !empty($_POST['ID'] AND $_POST['montant'] AND $_POST['type'])){
        $id = intval($_POST['ID']);
        $montant = intval($_POST['montant']);
        $type = htmlspecialchars($_POST['type']);

        if($type == 'cash'){
            $setmoney = bdd()->prepare('UPDATE `users` SET `money` = ? WHERE `id` = ?');
            $setmoney->execute(array($montant, $id));
            unset($_POST['ID']);
            unset($_POST['montant']);
            unset($_POST['type']);
            header('Location: '.$_SERVER['HTTP_REFERER']);
        }elseif($type == 'bank'){
            $setmoney = bdd()->prepare('UPDATE `users` SET `bank` = ? WHERE `id` = ?');
            $setmoney->execute(array($montant, $id));
            unset($_POST['ID']);
            unset($_POST['montant']);
            unset($_POST['type']);
            header('Location: '.$_SERVER['HTTP_REFERER']);
        }elseif($type == 'black'){
            $getidentifier = bdd()->prepare('SELECT * FROM `users` WHERE id = ?');
            $getidentifier->execute(array($id));
            $result = $getidentifier->fetch();
            if(!empty($result)){ 
                $identifier = $result['identifier'];
                $setmoney = bdd()->prepare('UPDATE `user_accounts` SET `money` = ? WHERE `identifier` = ?');
                $setmoney->execute(array($montant, $identifier));
                unset($_POST['ID']);
                unset($_POST['montant']);
                unset($_POST['type']);
                header('Location: '.$_SERVER['HTTP_REFERER']);
            }else{ 
                die('Utilisateur introuvable !'); 
            }
        }

        
}else{
    die('Erreur !');
}