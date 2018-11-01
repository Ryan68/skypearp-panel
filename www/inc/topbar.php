<!-- Modal Start -->
    <!-- Modal Task Progress -->
    <div class="md-modal md-3d-flip-vertical" id="task-progress">
        <div class="md-content">
            <h3>Avancer du <strong>Projet</strong></h3>
            <div>
                <p>Développement du site</p>
                <div class="progress progress-xs for-modal">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 95%">
                        <span class="sr-only">95&#37; Complete</span>
                    </div>
                </div>
                <p>Développement du serveur</p>
                <div class="progress progress-xs for-modal">
                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 65%">
                        <span class="sr-only">65&#37; Complete</span>
                    </div>
                </div>
                <p>Déploiement de la V1.2 Site</p>
                <div class="progress progress-xs for-modal">
                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 95%">
                        <span class="sr-only">95&#37; Complete</span>
                    </div>
                </div>
                <p>Déploiement de la V1.2 Serveur</p>
                <div class="progress progress-xs for-modal">
                    <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                        <span class="sr-only">100&#37; Complete</span>
                    </div>
                </div>
                <p class="text-center">
                    <button class="btn btn-danger btn-sm md-close">Close</button>
                </p>
            </div>
        </div>
    </div>
    <!-- Modal Task Progress End -->

    <!-- Modal Logout -->
    <div class="md-modal md-just-me" id="logout-modal">
        <div class="md-content">
            <h3><strong>Confirmation</strong> de déconnexion</h3>
            <div>
                <p class="text-center">Êtes vous certain de vouloir vous déconnecter ?</p>
                <p class="text-center">
                    <button class="btn btn-danger md-close">Non !</button>
                    <a href="logout.php" class="btn btn-success md-close">Oui, absolument !</a>
                </p>
            </div>
        </div>
    </div>
    <!-- Modal Logout End -->

<!-- Modal End -->

<!-- Begin page -->
<div id="wrapper">

    <!-- Top Bar Start -->
    <div class="topbar">
        <div class="topbar-left">
            <div class="logo">
                <h1><a href="index.php"><img src="assets/img/logo.png" alt="Logo"></a></h1>
            </div>
            <button class="button-menu-mobile open-left">
                <i class="fa fa-bars"></i>
            </button>
        </div>
        <!-- Button mobile view to collapse sidebar menu -->
        <div class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="navbar-collapse2">
                    <ul class="nav navbar-nav navbar-right top-navbar">
                        <li class="dropdown iconify hide-phone"><a href="#" onclick="javascript:toggle_fullscreen()"><i class="icon-resize-full-2"></i></a></li>
                        <li class="dropdown topbar-profile">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="rounded-image topbar-profile-image"><img src="assets/img/users/avatar/<?php if(isset($_SESSION['avatar'])){ echo $_SESSION['avatar']; }else{ echo 'img_avatar.png'; } ?>"></span> <?php echo $_SESSION['firstname']; ?>  <strong><?php echo $_SESSION['lastname']; ?></strong> <i class="fa fa-caret-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="profil.php">Mon Profil</a></li>
                                <li><a href="editprofil.php">Editer Profil</a></li>
                                <li class="divider"></li>
                                <li><a href="faq.php"><i class="icon-help-2"></i> FAQ</a></li>
                                <!-- <li><a href="lockscreen.html"><i class="icon-lock-1"></i> Lock me</a></li> -->
                                <li><a class="md-trigger" data-modal="logout-modal"><i class="icon-logout-1"></i> Se déconnecter</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </div>
    </div>
    <!-- Top Bar End -->
    <!-- Left Sidebar Start -->
    <div class="left side-menu">
        <div class="sidebar-inner slimscrollleft">
            <!-- Search form -->
            <form role="search" class="navbar-form">
                <div class="form-group">
                    <input type="text" placeholder="Search" class="form-control">
                    <button type="submit" class="btn search-button"><i class="fa fa-search"></i></button>
                </div>
            </form>
            <div class="clearfix"></div>
            <!--- Profile -->
            <div class="profile-info">
                <div class="col-xs-4">
                    <a href="profil.php" class="rounded-image profile-image"><img src="assets/img/users/avatar/<?php if(isset($_SESSION['avatar'])){ echo $_SESSION['avatar']; }else{ echo 'img_avatar.png'; } ?>"></a>
                </div>
                <div class="col-xs-8">
                    <div class="profile-text" style="text-align: center;">
                        <b><?php echo $_SESSION['firstname'].' '.$_SESSION['lastname']; ?></b>
                    </div>
                    <b><?php setlocale(LC_TIME, 'fr_FR.utf8','fra'); echo strftime('<div style="text-align: center;"><font color="#E45734">%A %d %B %Y</font></div>'); ?></b>
                    <!-- <div class="profile-buttons">
                        <a href="javascript:;"><i class="fa fa-envelope-o pulse"></i></a>
                        <a href="#connect" class="open-right"><i class="fa fa-comments"></i></a>
                        <a href="javascript:;" title="Sign Out"><i class="fa fa-power-off text-red-1"></i></a>
                    </div> -->
                </div>
            </div>
            <!--- Divider -->
            <div class="clearfix"></div>
            <hr class="divider" />
            <div class="clearfix"></div>
            <!--- Divider -->
            <div id="sidebar-menu">
                <ul>
                    <li class='has_sub'>
                        <a href='javascript:void(0);'>
                            <i class='icon-home'></i><span>Dashboard</span> <span class="pull-right"><i class="fa fa-angle-down"></i></span>
                        </a>
                        <ul>
                            <li><a href='index.php' <?php if($_SERVER['PHP_SELF'] == '/index.php'){ echo "class='active'"; } ?> ><span>Accueil</span></a></li>
                            <li ><a href="profil.php" <?php if($_SERVER['PHP_SELF'] == '/profil.php'){ echo "class='active'"; } ?> >Profil</a></li>
                            <li ><a href="faq.php" <?php if($_SERVER['PHP_SELF'] == '/faq.php'){ echo "class='active'"; } ?> >FAQ</a></li>
                        </ul>
                    </li>
                    <li class='has_sub'>
                        <a href='javascript:void(0);'>
                            <i class='icon-wrench'></i><span>Job</span> <span class="pull-right"><i class="fa fa-angle-down"></i></span>
                        </a>
                        <ul>
                            <!-- <li><a href='cops.php' <?php if($_SERVER['PHP_SELF'] == '/cops.php'){ echo "class='active'"; } ?> ><span>Police</span></a></li> -->
                            <li class='has_sub'>
                                <a href='javascript:void(0);'>
                                    <span>Police</span> <span class="pull-right"><i class="fa fa-angle-down"></i></span>
                                </a>
                                <ul>
                                    <li class='has_sub'>
                                        <a href='javascript:void(0);'>
                                            <span>Gestion entreprise</span> <span class="pull-right"><i class="fa fa-angle-down"></i></span>
                                        </a>
                                        <ul>
                                            <li><a href='/recrutementcops.php' <?php if($_SERVER['PHP_SELF'] == '/recrutementcops.php'){ echo "class='active'"; } ?>><span>Recrutement</span></a></li>
                                        </ul>
                                        <li><a href='/cops.php' <?php if($_SERVER['PHP_SELF'] == '/cops.php'){ echo "class='active'"; } ?> ><span>Rechercher individu</span></a></li>
                                    </li>
                                </ul>
                            </li>
                            <li><a href='ems.php' <?php if($_SERVER['PHP_SELF'] == '/ems.php'){ echo "class='active'"; } ?> ><span>Ambulance</span></a></li>
                            <li><a href='meca.php' <?php if($_SERVER['PHP_SELF'] == '/meca.php'){ echo "class='active'"; } ?> ><span>Mecano</span></a></li>
                            <li><a href='taxi.php' <?php if($_SERVER['PHP_SELF'] == '/taxi.php'){ echo "class='active'"; } ?> ><span>Taxi</span></a></li>
                        </ul>
                    </li>
                    <li class='has_sub'>
                        <a href='javascript:void(0);'>
                            <i class='icon-bag'></i><span>Boutique</span> <span class="pull-right"><i class="fa fa-angle-down"></i></span>
                        </a>
                        <ul>
                            <li><a href='shop.php' <?php if($_SERVER['PHP_SELF'] == '/shop.php'){ echo "class='active'"; } ?> ><span>Boutique</span></a></li>
                            <li ><a href="validation.php" <?php if($_SERVER['PHP_SELF'] == '/validation.php'){ echo "class='active'"; } ?> >Activation</a></li>
                        </ul>
                    </li>
                    <?php $perm = $_SESSION['permission_level']; ?>
                    <?php if($perm != 0){ ?>
                    <li class='has_sub'>
                        <a href='javascript:void(0);'>
                            <i class='icon-user'></i><span>Admin</span> <span class="pull-right"><i class="fa fa-angle-down"></i></span>
                        </a>
                        <ul>
                            <li ><a href="ajoutarticle.php" <?php if($_SERVER['PHP_SELF'] == '/ajoutarticle.php'){ echo "class='active'"; } ?> >Ajouter un Article</a></li>
                            <li ><a href="editarticle.php" <?php if($_SERVER['PHP_SELF'] == '/editarticle.php'){ echo "class='active'"; } ?> >Editer un Article</a></li>
                            <li ><a href="users.php" <?php if($_SERVER['PHP_SELF'] == '/users.php'){ echo "class='active'"; } ?> >Gestion utilisateurs</a></li>
                        </ul>
                    </li>
                    <?php } ?>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
            <div class="portlets">
                <!--<div id="chat_groups" class="widget transparent nomargin">
                    <h2>Chat Groups</h2>
                    <div class="widget-content">
                        <ul class="list-unstyled">
                            <li><a href="javascript:;"><i class="fa fa-circle-o text-red-1"></i> Colleagues</a></li>
                            <li><a href="javascript:;"><i class="fa fa-circle-o text-blue-1"></i> Family</a></li>
                            <li><a href="javascript:;"><i class="fa fa-circle-o text-green-1"></i> Friends</a></li>
                        </ul>
                    </div>
                </div>-->

                <div id="recent_tickets" class="widget transparent nomargin">
                    <h2>Message Important</h2>
                    <div class="widget-content">
                        <ul class="list-unstyled">
                            <li>
                                <a href="javascript:;">Utilisation des codes<span>Pour que votre solde bancaire s'actualise après l'activation d'un code veuillez vous déconnecter (bouton rouge dans le coin supérieur droit) et vous reconnecter.</span></a>
                            </li>
                            <!-- <li>
                                <a href="javascript:;">Server down, need help!<span>My server is not responding for the last...</span></a>
                            </li> -->
                        </ul>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div><br><br><br>
        </div>
        <div class="left-footer">
            <!-- <div class="progress progress-xs">
                <div class="progress-bar bg-green-1" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                    <span class="progress-precentage">80%</span>
                </div>

                <a data-toggle="tooltip" title="See task progress" class="btn btn-default md-trigger" data-modal="task-progress"><i class="fa fa-inbox"></i></a>
            </div> -->
            <a class="btn btn-default" href="https://www.google.com/" target="_blank"><i class="fa fa-google"></i></a>
            <a class="btn btn-default" href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a>
            <a class="btn btn-default" href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a>
        </div>
    </div>
    <!-- Left Sidebar End -->