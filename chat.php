<?php
    function bdd(){
        try
        {
            // On se connecte à MySQL
            $bdd = new PDO('mysql:host=localhost;dbname=essentialmode;charset=UTF8', 'root', '');
        }
        catch(Exception $e)
        {
            // En cas d'erreur, on affiche un message et on arrête tout
            die('Erreur : '.$e->getMessage());
        }
        // Si tout va bien, on peut continuer
        return $bdd;
    }
    $allmsg = bdd()->query('SELECT * FROM chat ORDER by id DESC');
    while($msg = $allmsg->fetch()){ ?>

    <?php
        $sident = $msg['sender_identifier'];
        $getavatar = bdd()->prepare('SELECT * FROM users WHERE identifier = ?');
        $getavatar->execute(array($sident));
        $result = $getavatar->fetch();
        if(empty($result['firstname'])){
            $avatar = 'img_avatar.png';
        }else{
            if(empty($result['avatar'])){
                $avatar = 'img_avatar.png';
            }else{
                $avatar = $result['avatar'];
            }                                           
        }
        $ID = $result['id'];
    ?>
    <li class="media">
        <a class="pull-left" href="assets/img/avatar/<?= $avatar ?>">
            <img class="media-object" src="assets/img/avatar/<?= $avatar ?>" alt="Avatar">
        </a>
        <div class="media-body">
            <h4 class="media-heading"><a href="profil.php?id=<?= $ID ?>"><?= $msg['username'] ?></a> <small><?= $msg['send_date'] ?></small></h4>
            <p><?= $msg['message'] ?></p>
        </div>
    </li>
<?php } ?>