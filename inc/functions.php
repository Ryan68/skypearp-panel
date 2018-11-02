<?php
/**
 * Created by PhpStorm.
 * User: Ryan68
 * Date: 25/10/2018
 * Time: 15:30
 */

session_start();

function cnx(){
    $dbHost = "localhost";        //Location Of Database usually its localhost
    $dbUser = "root";            //Database User Name
    $dbPass = '';            //Database Password
    $dbDatabase = "essentialmode";    //Database Name

    $mysqli = new mysqli($dbHost, $dbUser, $dbPass, $dbDatabase);
    $mysqli->set_charset('utf8');
    if ($mysqli->connect_error)
    {
        printf("Une erreur s'est produite: %s\n", $mysqli->connect_error);
        exit();
    }
    return $mysqli;
}

function EncryptPass($string) // Encryption du mot de passe en SHA256 + ajout du SEL dans le pass
{

    $salt = "123mAKaeDSQPKzefZF5A84CSQ8ZEDfsq86";

    $result = hash('sha256', $salt . $string);

    return $result;

}

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

function bddarticles(){
    try
    {
        // On se connecte à MySQL
        $bdd = new PDO('mysql:host=localhost;dbname=espace_commentaires;charset=UTF8', 'root', '');
    }
    catch(Exception $e)
    {
        // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
    }
    // Si tout va bien, on peut continuer
    return $bdd;
}

function search($firstname, $lastname)
        {
            $data = bdd()->prepare("SELECT * FROM users WHERE lastname = ? AND firstname = ?");
            $data->execute(array($lastname, $firstname));
            $userinfo = $data->fetch();
            if (empty($userinfo['firstname'])) die('Utilisateur introuvable, veuillez vérifier sont nom ou sont prénom !');
            $_SESSION['searchidentifier'] = $userinfo['identifier'];
            $_SESSION['searchlastname'] = $userinfo['lastname'];
            $_SESSION['searchfirstname'] = $userinfo['firstname'];
            $_SESSION['searchjob'] = $userinfo['job'];
            $_SESSION['searchdob'] = $userinfo['dateofbirth'];
            $_SESSION['searchsex'] = $userinfo['sex'];
            $_SESSION['searchheight'] = $userinfo['height'];
            $identifier = $userinfo['identifier'];
            if(!empty($userinfo['avatar'])){
                $_SESSION['searchavatar'] = $userinfo['avatar'];
            }

            $data2 = bdd()->prepare("SELECT * FROM user_licenses WHERE `type` = ? AND `owner` = ?");
            $data2->execute(array("dmv", $identifier));
            $userinfo2 = $data2->fetch();
            if (empty($userinfo2['owner'])) $_SESSION['searchdmv'] = NULL;
            $_SESSION['searchdmv'] = $userinfo2['type'];

            $data3 = bdd()->prepare("SELECT * FROM user_licenses WHERE `type` = ? AND `owner` = ?");
            $data3->execute(array("drive", $identifier));
            $userinfo3 = $data3->fetch();
            if (empty($userinfo3['owner'])) $_SESSION['searchdrive'] = NULL;
            $_SESSION['searchdrive'] = $userinfo3['type'];

            $data4 = bdd()->prepare("SELECT * FROM user_licenses WHERE `type` = ? AND `owner` = ?");
            $data4->execute(array("drive_truck", $identifier));
            $userinfo4 = $data4->fetch();
            if (empty($userinfo4['owner'])) $_SESSION['searchdrive_truck'] = NULL;
            $_SESSION['searchdrive_truck'] = $userinfo4['type'];

            $data5 = bdd()->prepare("SELECT * FROM user_licenses WHERE `type` = ? AND `owner` = ?");
            $data5->execute(array("weapon", $identifier));
            $userinfo5 = $data5->fetch();
            if (empty($userinfo5['owner'])) $_SESSION['searchweapon'] = NULL;
            $_SESSION['searchweapon'] = $userinfo5['type'];

            if (empty($userinfo['searchlastname'])){
                $_SESSION['status'] = "error";
            }else{
                $_SESSION['status'] = "success";
            }           
        }

function recrutement($firstname, $lastname, $job_grade){   
    if(userExist($firstname, $lastname)){
        $changejob = bdd()->prepare('UPDATE users SET job = ? WHERE firstname = ? AND lastname = ?');
        $changejob->execute(array($_SESSION['job'], $firstname, $lastname));
        $changegrade = bdd()->prepare('UPDATE users SET job_grade = ? WHERE firstname = ? AND lastname = ?');
        $changegrade->execute(array($job_grade, $firstname, $lastname));
        $_SESSION['status'] = 'success';
    }else{
        $_SESSION['status'] = 'error';
        $_SESSION['msgerror'] = 'Erreur, utilisateur introuvable !';
    }
}

function userExist($firstname, $lastname){
    $user = bdd()->prepare('SELECT * FROM users WHERE firstname = ? AND lastname = ?');
    $user->execute(array($firstname, $lastname));
    $userExist = $user->fetch();
    if(!empty($userExist['identifier'])){
        return true;
    }else{
        return false;
    }
    
}

function fileExists($path){
    return (@fopen($path,"r")==true);
}

function activation($license) {

    $reqlicense = bdd()->prepare("SELECT * FROM creditkey WHERE `key` = ?");
    $reqlicense->execute(array($license));
    $licensexist = $reqlicense->fetch();
    if(!empty($licensexist['amount'])){
        $montantactuel = $_SESSION['bank'];
        $montantajouter = $licensexist['amount'];
        $total = $montantactuel + $montantajouter;
        $withdraw = bdd()->prepare("UPDATE users SET `bank` = ? WHERE `identifier` = ?");
        $withdraw->execute(array($total, $_SESSION['identifier']));
        $_SESSION['montantlicense'] = $licensexist['amount'];
        $_SESSION['ancienmontant'] = $montantactuel;
        $_SESSION['nouveaumontant'] = $total;
        $_SESSION['bank'] = $total;
        $_SESSION['status'] = 'success';
    }else{
        $_SESSION['status'] = 'error';
    }
}

function newPass($newpass) {

    $requser = bdd()->prepare("UPDATE users SET password = ? WHERE id = ?");
    $requser->execute(array($newpass, $_SESSION['id']));
    $_SESSION['msgsuccess'] = "<b>Votre mot de passe à été mis à jours !</b>";
}

function avatar(){
    if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])){
        $_SESSION['msg'] = '';
        $_SESSION['msgsuccess'] = "";
        $tailleMax = 2097152;
        $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
        if($_FILES['avatar']['size'] <= $tailleMax){
            $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
            if(in_array($extensionUpload, $extensionsValides)){
                $chemin = "assets/img/avatar/".$_SESSION['id'].".".$extensionUpload;
                $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
                if($resultat){
                    $updateavatar = bdd()->prepare('UPDATE users SET avatar = :avatar WHERE id = :id');
                    $updateavatar->execute(array(
                        'avatar' => $_SESSION['id'].".".$extensionUpload,
                        'id' => $_SESSION['id']
                    ));
                    $_SESSION['avatar'] = $_SESSION['id'].".".$extensionUpload;
                    if(isset($_POST['newpass']) AND !empty($_POST['newpass'])){
                        $_SESSION['msgsuccess'] = "<b>Votre photo de profil et votre mot de passe ont été mis à jours</b>";
                    }else{
                        $_SESSION['msgsuccess'] = "<b>Votre photo de profil à été mis à jours</b>";
                    }
                }else{
                    $_SESSION['msg'] = "<b>Erreur durant l'importation de votre photo de profil</b>";
                    return false;
                }
            }else{
                $_SESSION['msg'] = "<b>Votre photo de profil doit être au format jpg, jpeg, gif ou png</b>";
                return false;
            }
        }else{
            $_SESSION['msg'] = "<b>Votre photo de profil ne doit pas dépasser 2Mo</b>";
            return false;
        }
    }
}

function Connexion($firstname, $lastname, $password){

    if(isset($_POST['connexion'])) {
        $requser = bdd()->prepare("SELECT * FROM users WHERE firstname = ? AND lastname = ? AND password = ?");
        $requser->execute(array($firstname, $lastname, $password));
        $userexist = $requser->rowCount();
        if($userexist == 1) {
            $userinfo = $requser->fetch();
            $_SESSION['id'] = $userinfo['id'];
            $_SESSION['identifier'] =  $userinfo['identifier'];
            $identifier = $_SESSION['identifier'];
            $_SESSION['firstname'] = $userinfo['firstname'];
            $_SESSION['lastname'] = $userinfo['lastname'];
            //$_SESSION['identifier'] = $userinfo['identifier'];
            $_SESSION['job'] = $userinfo['job'];
            $_SESSION['job_grade'] = $userinfo['job_grade'];
            $_SESSION['money'] = $userinfo['money'];
            $_SESSION['bank'] = $userinfo['bank'];
            $_SESSION['sex'] = $userinfo['sex'];
            $_SESSION['phone'] = $userinfo['phone_number'];
            $_SESSION['dob'] = $userinfo['dateofbirth'];
            $_SESSION['height'] = $userinfo['height'];
            $_SESSION['permission_level'] = $userinfo['permission_level'];
            if(!empty($userinfo['avatar'])){ $_SESSION['avatar'] = $userinfo['avatar']; }
            $_SESSION['weapon'] = GetLicenseWeapon($identifier);
            $_SESSION['dmv'] = GetLicenseDmv($identifier);
            $_SESSION['drive'] = GetLicenseDrive($identifier);
            $_SESSION['drive_truck'] = GetLicenseDriveTruck($identifier);
            $_SESSION['blackmoney'] = GetBlackMoney($identifier);
            $reqlastestconn = bdd()->prepare("UPDATE users SET lastest_panel_connection = Now() WHERE identifier = ?");
            $reqlastestconn->execute(array($identifier));
            $userinfolastestconn = $reqlastestconn->fetch();
            $_SESSION['lastest_panel_connection'] = $userinfolastestconn;
            $_SESSION['logged'] = true;

            // $blackmoney = bdd()->prepare('SELECT * FROM user_accounts WHERE identifier = ?');
            // $blackmoney->execute(array($identifier));
            // $blackmoneyexist = $blackmoney->rowCount();
            // if($blackmoneyexist == 1) {
            //     $blackmoneyinfo = $blackmoney->fetch();
            //     $_SESSION['blackmoney'] = $blackmoneyinfo['money']; 
            // }
        } else {
            $_SESSION['logged'] = false;
        }
    }
}

function GetID($firstname, $lastname){
    $getid = bdd()->prepare('SELECT * FROM users WHERE firstname = ? AND lastname = ?');
    $getid->execute(array($firstname, $lastname));
    $getidexist = $getid->rowCount();
    if($getidexist == 1) {
        $idresult = $getid->fetch();
        //$_SESSION['blackmoney'] = $blackmoneyinfo['money'];
        return $idresult['id'];
    }
}

function GetBlackMoney($identifier){
    $blackmoney = bdd()->prepare('SELECT * FROM user_accounts WHERE identifier = ?');
    $blackmoney->execute(array($identifier));
    $blackmoneyexist = $blackmoney->rowCount();
    if($blackmoneyexist == 1) {
        $blackmoneyinfo = $blackmoney->fetch();
        //$_SESSION['blackmoney'] = $blackmoneyinfo['money'];
        return $blackmoneyinfo['money'];
    }
}

function GetLicense($identifier){
        $requser2 = bdd()->prepare("SELECT * FROM user_licenses WHERE `type` = ? AND `owner` = ?");
        $requser2->execute(array("dmv", $identifier));
        $userexist2 = $requser2->rowCount();
        if($userexist2 == 1) {
            $userinfo2 = $requser2->fetch();
            $_SESSION['admindmv'] = true;
        }

        $requser3 = bdd()->prepare("SELECT * FROM user_licenses WHERE `type` = ? AND `owner` = ?");
        $requser3->execute(array("drive", $identifier));
        $userexist3 = $requser3->rowCount();
        if($userexist3 == 1) {
            $userinfo3 = $requser3->fetch();
            $_SESSION['admindrive'] = true;
        }

        $requser4 = bdd()->prepare("SELECT * FROM user_licenses WHERE `type` = ? AND `owner` = ?");
        $requser4->execute(array("drive_truck", $identifier));
        $userexist4 = $requser4->rowCount();
        if($userexist4 == 1) {
            $userinfo4 = $requser4->fetch();
            $_SESSION['admindrive_truck'] = true;
        }

        $requser5 = bdd()->prepare("SELECT * FROM user_licenses WHERE `type` = ? AND `owner` = ?");
        $requser5->execute(array("weapon", $identifier));
        $userexist5 = $requser5->rowCount();
        if($userexist5 == 1) {
            $userinfo5 = $requser5->fetch();
            $_SESSION['adminweapon'] = true;
        }
}

function GetLicenseWeapon($identifier){
    $mysqli = cnx();
    $result = mysqli_query($mysqli, "SELECT * FROM user_licenses WHERE owner = '" . $identifier ."'" . "AND type = 'weapon' LIMIT 1");
    while($row = mysqli_fetch_array($result))
    {
        if(!empty($row)){
            return true;
        }else{
            return false;
        }
    }
}
function GetLicenseDmv($identifier){
    $mysqli = cnx();
    $result = mysqli_query($mysqli, "SELECT * FROM user_licenses WHERE owner = '" . $identifier ."'" . "AND type = 'dmv' LIMIT 1");
    while($row = mysqli_fetch_array($result))
    {
        if(!empty($row)){
            return true;
        }else{
            return false;
        }
    }
}
function GetLicenseDrive($identifier){
    $mysqli = cnx();
    $result = mysqli_query($mysqli, "SELECT * FROM user_licenses WHERE owner = '" . $identifier ."'" . "AND type = 'drive' LIMIT 1");
    while($row = mysqli_fetch_array($result))
    {
        if(!empty($row)){
            return true;
        }else{
            return false;
        }
    }
}
function GetLicenseDriveTruck($identifier){
    $mysqli = cnx();
    $result = mysqli_query($mysqli, "SELECT * FROM user_licenses WHERE owner = '" . $identifier ."'" . "AND type = 'drive_truck' LIMIT 1");
    while($row = mysqli_fetch_array($result))
    {
        if(!empty($row)){
            return true;
        }else{
            return false;
        }
    }

}

function CountUsers(){
    $count = bdd()->query('SELECT * FROM users');
    $result = $count->rowCount();
    return $result;  
}

function CountVehs(){
    $count = bdd()->query('SELECT * FROM owned_vehicles');
    $result = $count->rowCount();
    return $result;  
}

function CountProperties(){
    $count = bdd()->query('SELECT * FROM owned_properties');
    $result = $count->rowCount();
    return $result;  
}

function CountLicenses(){
    $count = bdd()->query('SELECT * FROM user_licenses');
    $result = $count->rowCount();
    return $result;  
}

function Rechercher($firstname, $lastname){
    //On clear les données dans l'éventualité ou une requête avais déjà été faite !
    unset($_SESSION['suspectidentifier']);
    unset($_SESSION['suspectlastname']);
    unset($_SESSION['suspectfirstname']);
    unset($_SESSION['suspectjob']);
    unset($_SESSION['suspectjob_grade']);
    unset($_SESSION['suspectmoney']);
    unset($_SESSION['suspectbank']);
    unset($_SESSION['suspectphone']);
    unset($_SESSION['suspectdob']);
    unset($_SESSION['suspectsex']);
    unset($_SESSION['suspectheight']);
    unset($_SESSION['suspectdmv']);
    unset($_SESSION['suspectdrive']);
    unset($_SESSION['suspectdrive_truck']);
    unset($_SESSION['suspectweapon']);
    unset($_SESSION['searchsuccess']);
    unset($_SESSION['searcherror']);

    //On commence l'execution de la recherche
    $requser = bdd()->prepare("SELECT * FROM users WHERE firstname = ? AND lastname = ?");
    $requser->execute(array($firstname, $lastname));
    $userexist = $requser->rowCount();
    if($userexist == 1) {
        $userinfo = $requser->fetch();
        $_SESSION['suspectidentifier'] = $userinfo['identifier'];
        $_SESSION['suspectlastname'] = $userinfo['lastname'];
        $_SESSION['suspectfirstname'] = $userinfo['firstname'];
        $_SESSION['suspectjob'] = $userinfo['job'];
        $_SESSION['suspectjob_grade'] = $userinfo['job_grade'];
        $_SESSION['suspectmoney'] = $userinfo['money'];
        $_SESSION['suspectbank'] = $userinfo['bank'];
        $_SESSION['suspectphone'] = $userinfo['phone_number'];
        $_SESSION['suspectdob'] = $userinfo['dateofbirth'];
        $_SESSION['suspectsex'] = $userinfo['sex'];
        $_SESSION['suspectheight'] = $userinfo['height'];
        $identifier = $userinfo['identifier'];

        $requser2 = bdd()->prepare("SELECT * FROM user_licenses WHERE `type` = ? AND `owner` = ?");
        $requser2->execute(array("dmv", $identifier));
        $userexist2 = $requser2->rowCount();
        if($userexist2 == 1) {
            $userinfo2 = $requser2->fetch();
            $_SESSION['suspectdmv'] = $userinfo2['type'];
        }else{ $_SESSION['dmv'] = ''; }

        $requser3 = bdd()->prepare("SELECT * FROM user_licenses WHERE `type` = ? AND `owner` = ?");
        $requser3->execute(array("drive", $identifier));
        $userexist3 = $requser3->rowCount();
        if($userexist3 == 1) {
            $userinfo3 = $requser3->fetch();
            $_SESSION['suspectdrive'] = $userinfo3['type'];
        }else{ $_SESSION['suspectdrive'] = ''; }

        $requser4 = bdd()->prepare("SELECT * FROM user_licenses WHERE `type` = ? AND `owner` = ?");
        $requser4->execute(array("drive_truck", $identifier));
        $userexist4 = $requser4->rowCount();
        if($userexist4 == 1) {
            $userinfo4 = $requser4->fetch();
            $_SESSION['suspectdrive_truck'] = $userinfo4['type'];
        }else{ $_SESSION['suspectdrive_truck'] = ''; }

        $requser5 = bdd()->prepare("SELECT * FROM user_licenses WHERE `type` = ? AND `owner` = ?");
        $requser5->execute(array("weapon", $identifier));
        $userexist5 = $requser5->rowCount();
        if($userexist5 == 1) {
            $userinfo5 = $requser5->fetch();
            $_SESSION['suspectweapon'] = $userinfo5['type'];
        }else{ $_SESSION['suspectweapon'] = ''; }

        $_SESSION['searchsuccess'] = true;
    }else{
        $_SESSION['searcherror'] = true;
    }
}

echo "<script>document.write('<script src=\"http://' + (location.host || 'http://localhost:82').split(':')[0] + ':35729/livereload.js?snipver=1\"></' + 'script>')</script>";

?>