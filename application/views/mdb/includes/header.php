<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- languages management -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- title website -->
    <title><?= $title != '' ? $title : "Welcome in our official website"; ?></title>

    <!-- SEO for website references by research robot -->
    <link rel="canonical" href="https://www.congoagile.com"/>
    <meta name="robots" content="max-snippet:-1, max-image-preview:large, max-video-preview:-1"/>

    <meta name="author" content="Le nom de l'auteur du site">
    <meta name="keywords" content="Tous les mots cles pour la recherche sur google separes par la virgule">
    <meta property="description"
          content="Plus d'informations sur le site ou l'application detaillant le fonctionnment "/>

    <meta property="og:url" href="https://www.congoagile.com/services"/>
    <meta property="og:site_name"
          content="Titre du site internet et de principales fonctionnalites couvertes"/>
    <meta property="og:title"
          content="Titre de l'application ou site internet pour faire apparaitre dans les resultats de recherche"/>

    <meta property="og:description"
          content="Plus d'informations sur le site ou l'application detaillant le fonctionnment "/>
    <meta property="og:image" content="<?= base_url('resources/'); ?>logo/crisc_logo.jpg">
    <meta property="og:locale" content="fr_FR"/>
    <meta property="og:type" content="website"/>

    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="www.congoagile.com">
    <meta name="twitter:creator" content="@eliemwez">
    <meta name="twitter:title" content="République démocratique du Congo, ville de Lubumbasshi, province du Haut-Katanga |
    Vous servir est notre devoir."/>
    <meta name="twitter:description"
          content="République démocratique du Congo, ville de Lubumbasshi, province du Haut-Katanga"/>

    <!-- Icone Image -->
    <link href="<?= base_url('resources/'); ?>logo/crisc_logo.jpg" rel="icon">
    <!-- Material design
       <!-- Bootstrap core CSS for mobile adaptation-->
    <link href="<?= base_url('resources/') ?>plugins/css/main.css" rel="stylesheet">
    <!--Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href=" <?= base_url('resources/'); ?>front/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href=" <?= base_url('resources/'); ?>front/css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href=" <?= base_url('resources/'); ?>front/css/style.min.css" rel="stylesheet">
    <link href=" <?= base_url('resources/'); ?>front/font/fa/fa.css" rel="stylesheet">

    <style type="text/css">


        @media (min-width: 800px) and (max-width: 850px) {
            .navbar:not(.top-nav-collapse) {
                background-color: #1C2331 !important;
                color: #050505 !important;
            }
        }

        @media (min-device-height: 200px) and (max-device-height: 250px) {
            .navbar:not(.top-nav-collapse) {
                background-color: #1C2331 !important;
                color: #050505 !important;
            }
        }

        /* Carousel*/
        .carousel,
        .carousel-item,
        .carousel-item.active {
            height: 100%;
        }

        .carousel-inner {
            height: 100%;
        }

        .map-container iframe {
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            position: absolute;
        }

        /* Only for snippet */
        .double-nav .breadcrumb-dn {
            color: #fff;
        }

        .button-collapse i {
            color: #fff
        }
    </style>
    <script type="text/javascript">
        function reduirezoom() {
            document.body.style.zoom = 0.9;
        }
    </script>
</head>

<body class="app sidebar-mini rtl" onload="reduirezoom();" onchange="reduirezoom();" onclick="reduirezoom();">
<header class="fixed-top mb-0 pb-0 white">
    <div class="container-fluid mb-1 pb-1 mt-1 pt-1" style="height: 42px!important;">
        <div class="row">
            <div class="col-sm-7">

                <div class="row">
                    <div class="col-sm-2">
                        <h6 class="text-center font-weight-bold text-uppercase">
                            <strong>Pubs Actu : </strong> <span class="fa fa-circle text-success"></span>
                        </h6>
                    </div>
                    <div class="col-sm-8">
                        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel"
                             data-interval="7200">
                            <div class="carousel-inner">

                                <?php if (isset($fil)) { ?>
                                    <!-- First slide -->
                                    <div class="carousel-item active">
                                        <!--First column-->
                                    </div>

                                    <?php foreach ($fil as $filligne): ?>
                                        <div class="carousel-item">
                                            <h5 class="text-center font-weight-bold text-uppercase small">
                                                <a class="text-dark"
                                                   href="<?= base_url('pages/details?title=' . rawurlencode(url_title($filligne->post_title)) . '&&postid=' . $filligne->post_id); ?>">
                                                    <?= $filligne->post_title; ?>
                                                </a>
                                            </h5>
                                        </div>
                                    <?php endforeach;
                                } else { ?>
                                    <div class="">
                                        <!--Title-->
                                        <h5 class="text-center text-warning font-weight-bold">
                                            Aucune publication recente.
                                        </h5>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- Logo carousel -->
                    </div>
                </div>
            </div>
            <div class="col-sm-5 mt-0 pt-0 mb-0 pb-0">

                <div class="pull-right">
                    <div class="d-none d-md-block">
                        <a class="mt-1 pt-1 btn btn-link font-weight-bold text-dark <?php echo (uri_string() == 'contacts') ? "active rounded border border-light" : ""; ?>"
                           href="<?= base_url('contacts'); ?>"><i
                                    class="fa fa-envelope"></i> Contact</a>
                        <a class="mt-1 pt-1 btn btn-link font-weight-bold text-dark <?php echo (uri_string() == 'secure') ? "active rounded border border-light" : ""; ?>"
                           href="<?= base_url('secure'); ?>"><i class="fa fa-sign-in"></i> Se connecter</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light mb-0 pb-0 mt-0 pt-0 app-header">
        <!-- Home return -->
        <div class="float-left pull-left">
            <a class="navbar-brand pull-left" href="<?php echo base_url(); ?>">
                <img src="<?= base_url('resources/'); ?>logo/aff002.png"
                     alt="Logo" class="site-logo" style="height: 60px!important; width: 90px!important;">
            </a>
        </div>

        <a class="navbar-toggler app-sidebar__toggle" type="button" data-toggle="sidebar" href=""
           aria-label="Hide Sidebar" data-target="#navbarSupportedContent">
            <!-- Collapse -->
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            </button>
        </a>

        <!-- Links -->
        <div class="collapse navbar-collapse font-weight-bold text-uppercase small" id="navbarSupportedContent">
            <!-- Left -->
            <ul class="navbar-nav mr-auto">
            </ul>
            <ul class="navbar-nav">
                <!-- Actualités de la province -->


                    <li class="nav-item <?php echo (uri_string() == '') ? "font-weight-bold" : ""; ?>">
                        <a class="nav-link text-dark <?php echo (uri_string() == '') ? "active rounded border border-primary" : ""; ?>"
                           href="<?= base_url(); ?>home">Accueil</a>
                    </li>
                    <li class="nav-item <?php echo (uri_string() == 'activites') ? "font-weight-bold" : ""; ?>">
                        <a class="nav-link text-dark <?php echo (uri_string() == 'activites') ? "active rounded border border-primary" : ""; ?>"
                           href="<?= base_url(); ?>activites">Activites</a>
                    </li>

                <li class="nav-item <?php echo (uri_string() == 'apropos') ? "active " : ""; ?>">
                    <a href="<?= base_url('apropos'); ?>"
                       class="nav-link">
                        <i class="fa fa-info-circle mr-2"></i> A la decouverte
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="https://www.stopcoronavirusrdc.info/"
                       class="nav-link rounded border border-danger text-dark" target="_blank">
                        <i class="fa fa-warning mr-2"></i>#Coronavirus
                    </a>
                </li>
                <li class="nav-item d-lg-none d-md-block <?php echo (uri_string() == 'contacts') ? "active" : ""; ?>">
                    <a class="nav-link font-weight-bold text-dark <?php echo (uri_string() == 'contacts') ? "active rounded border border-light" : ""; ?>"
                       href="<?= base_url('contacts'); ?>"><i class="fa fa-envelope"></i> Contact</a>
                </li>

                <li class="nav-item d-lg-none d-md-block <?php echo (uri_string() == 'secure') ? "active" : ""; ?>">
                    <a class="nav-link font-weight-bold text-dark <?php echo (uri_string() == 'secure') ? "active rounded border border-light" : ""; ?>"
                       href="<?= base_url('secure'); ?>"> <i class="fa fa-sign-in"></i> Se connecter </a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Navbar -->
    <!--Main Navigation-->
    <!-- Sidebar -->

    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="position-fixed app-sidebar white d-lg-none d-md-block text-capitalize fixed-top" id="sidebar">

        <div class="list-group list-group-flush text-uppercase mt-2 pt-2">
            <h5 class="mt-2 pt-2 ml-2 font-weight-bold text-primary">Acivites</h5>
            <!-- Mes proches rubrique -->
            <a href="<?php echo base_url('actualites'); ?>"
               class="list-group-item list-group-item-action waves-effect
                               <?php echo (uri_string() == 'activites') ? "active" : ""; ?>">
                <strong>Toutes</strong></a>

            <!-- Mes proches rubrique -->
            <a href="<?php echo base_url('pages/activites?region=paroisses'); ?>"
               class="list-group-item list-group-item-action waves-effect
                               <?php echo (uri_string() == 'pages/activites?region=paroisses') ? "active" : ""; ?>">
                <strong>Paroisses</strong></a> <!-- Mes proches rubrique -->

            <a href="<?php echo base_url('pages/activites?type=societes'); ?>"
               class="list-group-item list-group-item-action waves-effect
                               <?php echo (uri_string() == 'pages/activites?type=societes') ? "active" : ""; ?>">
                <strong>Societes</strong></a>     <!-- Mes proches rubrique -->

            <!-- Mes proches rubrique -->
            <a href="<?php echo base_url('pages/activites?type=religion'); ?>"
               class="list-group-item list-group-item-action waves-effect
                               <?php echo (uri_string() == 'pages/activites?type=religion') ? "active" : ""; ?>">
                <strong>Religion</strong>
            </a><!-- Mes proches rubrique -->
            <a href="<?php echo base_url('pages/activites?type=pretre'); ?>"
               class="list-group-item list-group-item-action waves-effect
                               <?php echo (uri_string() == 'pages/activites?type=pretre') ? "active" : ""; ?>">
                <strong>Pretres</strong>
            </a>
            <a href="<?php echo base_url('pages/activites?type=chanceliers'); ?>"
               class="list-group-item list-group-item-action waves-effect
                               <?php echo (uri_string() == 'pages/activites?type=chanceliers') ? "active" : ""; ?>">
                <strong>Chanceliers</strong>
            </a>
            <a href="<?php echo base_url('pages/activites?type=archeveques'); ?>"
               class="list-group-item list-group-item-action waves-effect
                               <?php echo (uri_string() == 'pages/activites?type=archeveques') ? "active" : ""; ?>">
                <strong>Archeveques</strong>
            </a>

        </div>

        <div class="list-group list-group-flush text-uppercase ">
            <h5 class="mt-2 pt-2 ml-2 font-weight-bold text-primary">
                <strong>Menu</strong></h5> <!-- Sidebar -->

            <a class="list-group-item list-group-item-action waves-effect <?php echo (uri_string() == 'apropos') ? "active rounded border border-light" : ""; ?>"
               href="<?= base_url('apropos'); ?>">
                Qui sommes-nous ?
            </a>
            <a class="list-group-item list-group-item-action waves-effect <?php echo (uri_string() == 'contacts') ? "active rounded border border-light" : ""; ?>"
               href="<?= base_url('contacts'); ?>">
                Contact
            </a>
            <a class="list-group-item list-group-item-action waves-effect <?php echo (uri_string() == 'secure') ? "active rounded border border-light" : ""; ?>"
               href="<?= base_url('secure'); ?>">
                Se connecter</a>
        </div>
    </aside>
</header>
