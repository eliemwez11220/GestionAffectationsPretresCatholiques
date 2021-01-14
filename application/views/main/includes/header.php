<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Admin - Management Application</title>
    <!-- icon -->
    <link rel="icon" href="<?= base_url(); ?>resources/logo/digital_connect.png">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link href=" <?= base_url('resources/'); ?>front/font/fa/fa.css" rel="stylesheet">

    <!-- Bootstrap core CSS for mobile adaptation-->
    <link href="<?= base_url('resources/') ?>plugins/css/main.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('resources/') ?>back/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="<?= base_url('resources/') ?>back/css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="<?= base_url('resources/') ?>back/css/style.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="<?= base_url('resources/') ?>back/css/addons/datatables.min.css" rel="stylesheet">
    <!-- DataTables Select CSS -->
    <link href="<?= base_url('resources/') ?>back/css/addons/datatables-select.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link rel="stylesheet" type="text/css"
          href="<?= base_url('resources/') ?>back/css/plugins/bootstrap4.1.3/daterangepicker.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>

        .map-container {
            overflow: hidden;
            padding-bottom: 56.25%;
            position: relative;
            height: 0;
        }

        .map-container iframe {
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            position: absolute;
        }
    </style>

    <?php
    //grocery CRUD librairie
    if (isset($output)) {
        foreach ($css_files as $file): ?>
            <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>"/>
        <?php endforeach;
    } ?>

</head>

<body class="app sidebar-mini rtl">

<!--Main Navigation-->
<header>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-md fixed-top app-header navbar-light white">

        <div class="container-fluid">
            <div class="ml-0 pl-0 float-left pull-left">
                <a class="navbar-brand font-weight-bold h5" href="<?php echo base_url('admin/dashboard'); ?>">
                    Management App
                </a>
            </div>
            <!-- Collapse -->

            <a class="navbar-toggler app-sidebar__toggle" type="button" data-toggle="sidebar" href=""
               aria-label="Hide Sidebar" data-target="#navbarSupportedContent">
                <!-- Collapse -->
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                </button>
            </a>

            <!-- Links -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <!-- Left -->
                <ul class="navbar-nav mr-auto">

                    <li class="nav-item d-lg-none">
                        <a href="<?php echo base_url('admin/agent') ?>"
                           class="nav-link waves-effect <?php echo (uri_string() == 'admin/agent') ? "active" : ""; ?>">
                            Utilisateurs</a>
                    </li>

                </ul>

                <!-- Right -->
                <ul class="navbar-nav">

                    <li class="btn-group nav-item">
                        <a class="nav-link font-weight-bold" href=""
                           data-toggle="modal" data-target="#fluidModalRightSuccessDemo">
                            <i class="nav-link-icon fa fa-cog"></i>
                            Guide
                        </a>
                    </li>
                    <li class="btn-group nav-item">
                        <a class="nav-link font-weight-bold" href=""
                           data-toggle="modal"
                           data-target="#modalContactForm">
                            <i class="nav-link-icon fa fa-question-circle"></i>
                            Support
                        </a>
                    </li>
                    <li data-toggle="tooltip" data-placement="bottom" class="nav-item dropdown btn-group">
                        <a class="nav-link waves-effect app-nav__item dropdown-toggle" href="#"
                           data-toggle="dropdown">
                            <i class="fa fa-user"></i>
                            <span class="text-capitalize font-weight-bold">
                                    <?= $this->session->fullname ?></span>
                        </a>
                        <ul class="dropdown-menu settings-menu dropdown-menu-right">
                            <li>
                                <a href="<?php echo base_url() . 'admin/dashboard'; ?>"
                                   class="waves-effect text-center mt-3 pt-3">
                                    <img src="<?= base_url() ?>resources/front/img/avatar.png" alt="Logo App"
                                         class="img-fluid w-50 h-50">
                                </a>
                                <br>
                                <span class="text-capitalize font-weight-bold text-dark">
                                            Fullname: <?= $this->session->fullname ?></span> <br>
                                <span class="small font-weight-bold">
                                             Niveau d'acces : <?= $this->session->type ?></span>
                            </li>
                            <li class="dropdown-header">
                                <h6 tabindex="-1" >Edition profil</h6>
                                <a tabindex="0" class="dropdown-item"
                                   href="<?= base_url(); ?>">Modifier compte</a>
                                <br>
                                <a tabindex="0" class="dropdown-item"
                                   href="<?= base_url(); ?>">Changer mot de passe</a>
                                <div tabindex="-1" class="dropdown-divider"></div>
                            </li>
                            <li class="dropdown-header">
                                <h6 tabindex="-1">Fermeture session</h6>
                                <a tabindex="0" class="dropdown-item"
                                   href="<?= base_url('appmain/logout'); ?>">
                                    Deconnexion
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <!-- Navbar -->
    <!-- Sidebar -->

    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="fixed-top position-fixed app-sidebar white mt-1 pt-1" id="sidebar">
        <a href="<?php echo base_url() . 'admin/dashboard'; ?>" class="waves-effect text-center">
            <img src="<?= base_url() ?>resources/front/img/avatar.png" alt="Logo App"
                 class="img-fluid w-50 h-50">
            <br>
            <span class="text-capitalize font-weight-bold text-dark">
        <?= $this->session->fullname ?></span> <br>
            <span class="text-capitalize grey-text font-weight-bold small ">
         <?= $this->session->type ?></span>
        </a>

        <div class="list-group list-group-flush">
            <h5 class="grey-text mt-2 pt-2 ml-2  font-weight-bold ">Menu</h5>
            <!-- Preferences rubrique -->
            <a href="<?php echo base_url('appMain/dashboard'); ?>"
               class="list-group-item list-group-item-action waves-effect small font-weight-bold
           <?php echo (uri_string() == 'appMain/dashboard') ? "active" : ""; ?>">
                <i class="fa fa-dashboard"></i> <strong> Vue d'ensemble</strong></a>
            <div class="dropdown">
                <a class="list-group-item list-group-item-action dropdown-toggle small font-weight-bold
            <?php
                $seg1 = $this->uri->segment(1);
                $seg2 = $this->uri->segment(2);
                if ($seg2 == 'utilisateurs' |  $seg2 == 'administrateurs' | $seg2 == 'groupes') {
                    echo (uri_string() == 'appMain/' . $seg2) ? "active white-text" : "";
                }
                ?>"
                   id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">
                    <i class="fa fa-users"></i> <strong>Comptes & Groupes</strong></a>
                <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item small  font-weight-bold <?php echo (uri_string() == 'admin/usersAccount') ? "active" : ""; ?>"
                       href="<?php echo base_url('admin/usersAccount'); ?>">Utilisateurs</a>

                    <a class="dropdown-item small  font-weight-bold <?php echo (uri_string() == 'appMain/administrateurs') ? "active" : ""; ?>"
                       href="<?php echo base_url('appMain/administrateurs'); ?>">Administrateurs</a>

                    <a class="dropdown-item small font-weight-bold  <?php echo (uri_string() == 'appMain/groupes') ? "active" : ""; ?>"
                       href="<?php echo base_url('appMain/groupes'); ?>">Groupes</a>
                </div>
            </div>
            <!-- Mes proches rubrique -->
            <a href="<?php echo base_url('appMain/emissions'); ?>"
               class="list-group-item list-group-item-action waves-effect small font-weight-bold
           <?php echo (uri_string() == 'appMain/emissions') ? "active" : ""; ?>">
                <i class="fa fa-globe"></i> <strong>Mes emissions</strong></a>
            <!-- Mes proches rubrique -->
            <a href="<?php echo base_url('appMain/contacts'); ?>"
               class="list-group-item list-group-item-action waves-effect small font-weight-bold
           <?php echo (uri_string() == 'appMain/contacts') ? "active" : ""; ?>">
                <i class="fa fa-envelope"></i> <strong>Contact</strong></a>
            <!-- Mes proches rubrique -->
            <a href="<?php echo base_url('appMain/assistances'); ?>"
               class="list-group-item list-group-item-action waves-effect small font-weight-bold
           <?php echo (uri_string() == 'appMain/assistances') ? "active" : ""; ?>">
                <i class="fa fa-envelope-open"></i> <strong>Assistances</strong></a>
            <div class="dropdown">
                <a class="list-group-item list-group-item-action dropdown-toggle small font-weight-bold
            <?php
                $seg1 = $this->uri->segment(1);
                $seg2 = $this->uri->segment(2);
                if ($seg2 == 'services' |  $seg2 == 'categories' | $seg2 == 'demoSponsoring') {
                    echo (uri_string() == 'appMain/' . $seg2) ? "active white-text" : "";
                }
                ?>"
                   id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">
                    <i class="fa fa-info-circle"></i> <strong>Infos societe</strong></a>
                <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item small  font-weight-bold <?php echo (uri_string() == 'appMain/services') ? "active" : ""; ?>"
                       href="<?php echo base_url('appMain/services'); ?>">Services</a>

                    <a class="dropdown-item small  font-weight-bold <?php echo (uri_string() == 'appMain/categories') ? "active" : ""; ?>"
                       href="<?php echo base_url('appMain/categories'); ?>">Categories</a>

                    <a class="dropdown-item small font-weight-bold  <?php echo (uri_string() == 'appMain/galeries') ? "active" : ""; ?>"
                       href="<?php echo base_url('appMain/galeries'); ?>">Galeries</a>
                    <a class="dropdown-item small font-weight-bold  <?php echo (uri_string() == 'appMain/simple_photo_gallery') ? "active" : ""; ?>"
                       href="<?php echo base_url('appMain/simple_photo_gallery'); ?>">Albums</a>
                </div>
            </div>

            <!-- Dropdown medical-->
            <div class="dropdown">
                <a class="list-group-item list-group-item-action dropdown-toggle small font-weight-bold
            <?php
                $seg1 = $this->uri->segment(1);
                $seg2 = $this->uri->segment(2);
                if ($seg2 == 'temoignages' | $seg2 == 'newsletters' | $seg2 == 'commentaires' ) {
                    echo (uri_string() == 'appMain/' . $seg2) ? "active white-text" : "";
                }
                ?>"
                   id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">
                    <i class="fa fa-gear"></i> <strong>Parametres</strong></a>
                <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item small  font-weight-bold <?php echo (uri_string() == 'appMain/temoignages') ? "active" : ""; ?>"
                       href="<?php echo base_url('appMain/temoignages'); ?>">Temoignages</a>

                    <a class="dropdown-item small font-weight-bold  <?php echo (uri_string() == 'appMain/abonnements') ? "active" : ""; ?>"
                       href="<?php echo base_url('appMain/abonnements'); ?>">Newsletters</a>

                    <a class="dropdown-item small font-weight-bold  <?php echo (uri_string() == 'appMain/commentaires') ? "active" : ""; ?>"
                       href="<?php echo base_url('appMain/commentaires'); ?>">Commentaires</a>
                </div>
            </div>
            <!-- Dropdown medical-->
            <div class="dropdown">
                <a class="list-group-item list-group-item-action dropdown-toggle small font-weight-bold
            <?php
                $seg1 = $this->uri->segment(1);
                $seg2 = $this->uri->segment(2);
                if ($seg2 == 'praticien' | $seg2 == 'patient' | $seg2 == 'cabinet') {
                    echo (uri_string() == 'appMain/' . $seg2) ? "active white-text" : "";
                }
                ?>"
                   id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">
                    <i class="fa fa-gears"></i> <strong>Preferences</strong></a>
                <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item font-weight-bold small <?php echo (uri_string() == 'admin/cabinet') ? "active" : ""; ?>"
                       href="<?php echo base_url('admin/cabinet'); ?>">
                        <i class="nav-link-icon fa fa-edit"></i> Mon compte</a>

                    <div class="d-lg-none">
                        <a class="dropdown-item font-weight-bold small <?php echo (uri_string() == 'admin/patient') ? "active" : ""; ?>"
                           href="<?php echo base_url('admin/patient'); ?>">
                            <i class="nav-link-icon fa fa-globe"></i> Parametrage</a>

                        <a class="dropdown-item font-weight-bold small" href=""
                           data-toggle="modal" data-target="#fluidModalRightSuccessDemo">
                            <i class="nav-link-icon fa fa-cog"></i>
                            Guide users
                        </a>

                        <a class="dropdown-item font-weight-bold small" href=""
                           data-toggle="modal"
                           data-target="#modalContactForm">
                            <i class="nav-link-icon fa fa-question-circle"></i>
                            Support technique
                        </a>
                    </div>

                </div>
            </div>

            <!-- Fermeture de la session -->
            <a href="<?php echo base_url('appMain/logout'); ?>"
               class="list-group-item list-group-item-action waves-effect small font-weight-bold"
               onclick="return confirm('Voulez-vous vraiment fermer la session ? notez que toutes les opéations encours seront annulées') ">
                <i class="fa fa-lock"></i> <strong>Deconnexion</strong></a>
        </div>
    </aside>
    <!-- Sidebar -->
</header>