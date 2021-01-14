<!--Main layout-->
<main role="main" class="pt-5 mt-5">
    <div class="mt-5">
        <!--Section: Post-->
        <section class="wow fadeIn">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-2">
                        <!-- Preferences rubrique -->
                        <div class="d-none d-md-block">
                            <div class="card">
                                <!--Card content-->
                                <div class="card-body">
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
                                            Apropos
                                        </a>
                                        <a class="list-group-item list-group-item-action waves-effect <?php echo (uri_string() == 'contacts') ? "active rounded border border-light" : ""; ?>"
                                           href="<?= base_url('contacts'); ?>">
                                            Contact
                                        </a>
                                        <a class="list-group-item list-group-item-action waves-effect <?php echo (uri_string() == 'Abonnement') ? "active rounded border border-light" : ""; ?>"
                                           href="<?= base_url('Abonnement'); ?>">
                                            Abonnement
                                        </a>
                                        <a class="list-group-item list-group-item-action waves-effect <?php echo (uri_string() == 'Abonnement') ? "active rounded border border-light" : ""; ?>"
                                           href="<?= base_url('Abonnement'); ?>">
                                            Temoingages
                                        </a>
                                        <a class="list-group-item list-group-item-action waves-effect <?php echo (uri_string() == 'Abonnement') ? "active rounded border border-light" : ""; ?>"
                                           href="<?= base_url('Abonnement'); ?>">
                                        Assistance</a>
                                        <a class="list-group-item list-group-item-action waves-effect <?php echo (uri_string() == 'Abonnement') ? "active rounded border border-light" : ""; ?>"
                                           href="<?= base_url('Abonnement'); ?>">
                                        FAQ</a>

                                    </div>
                                </div>
                                <!-- Sidebar -->
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <!-- details articles -->
                        <?php if (isset($postsDetails)) { ?>
                            <?php foreach ($postsDetails as $ligne): ?>

                                <!--Card provinciale-->
                                <div class="card mb-3 wow fadeIn">
                                    <div class="overlay  h-50">

                                        <a href="<?= base_url('pages/details?title=' . rawurlencode(url_title($ligne->post_title)) . '&&postid=' . $ligne->post_id); ?>">
                                            <img src="<?= base_url('assets/uploads/images/') . $ligne->post_image; ?>"
                                                 class="card-img-top" alt="CRISC Image Post"
                                                 style="width: 100%!important; height: 400px!important;">
                                        </a>

                                    </div>
                                    <!--Card content-->
                                    <div class="card-body text-justify">
                                        <a href="<?= base_url('pages/details?title=' . rawurlencode(url_title($ligne->post_title)) . '&&postid=' . $ligne->post_id); ?>">
                                            <h3 class="text-center font-weight-bold">
                                                <?= $ligne->post_title; ?>
                                            </h3>
                                        </a>
                                        <p class="text-justify">
                                            <?= word_limiter($ligne->post_content, 50); ?>
                                            &nbsp;
                                            <a class="btn btn-link text-primary font-weight-bold"
                                               href="<?= base_url('pages/details?title=' . rawurlencode(url_title($ligne->post_title)) . '&&postid=' . $ligne->post_id); ?>">
                                                Lire la suite...
                                            </a>
                                        </p>
                                    </div>
                                    <div class="card-footer unique-color white-text">
                                        <div class="container">
                                        <span class="font-weight-bold h3 float-left">
                                  <?= $ligne->category_name; ?>
                                </span><span class="font-weight-bold h5 float-right">
                                    depuis <?php echo utf8_encode(strftime("%a, %d-%b-%Y %r",
                                                    strtotime($ligne->post_date_created))); ?>. <br>
                                </span>
                                        </div>
                                    </div>
                                </div>
                                <!--Grid row-->

                            <?php endforeach;
                        } else { ?>
                            <!--Title-->
                            <h5 class="text-center alert alert-danger">
                                Aujourd'hui <?php echo utf8_encode(strftime("%A, %d-%b-%Y",
                                    strtotime(date("d-m-Y")))); ?> il n'y a aucune publication recente.
                            </h5>
                        <?php } ?>

                    </div>
                    <!--/.Card-->

                    <!--Grid column-->
                    <div class="col-sm-4">

                        <!--Card: search-->
                        <div class="card mb-3">
                            <!-- Content -->
                            <div class="card-header unique-color white-text text-center">
                                <h6 class="mb-4">
                                    <strong>Trouver des informations qui vous interesse</strong>
                                </h6>
                                <form role="search" action="<?= base_url('pages/search'); ?>" method="post">
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="defaultFormLoginEmailEx"
                                                       name="critere" value="<?= set_value('critere'); ?>"
                                                       placeholder="Saisissez un critere de recherche">
                                                <div class="input-group-prepend">
                                                    <button type="submit" class="input-group-text">
                                                        <i class="fa fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div id="carouselExampleSlidesOnly" class="carousel slide carousel-fade"
                                 data-ride="carousel">
                                <div class="carousel-inner">

                                    <?php if (isset($actualites)) { ?>
                                        <div class="carousel-item active">
                                            <div class="overlay">
                                                <div class="h-50">
                                                    <a href="<?= base_url(); ?>">
                                                        <img src="<?= base_url('assets/uploads/images/false.png'); ?>"
                                                             class="card-img-top" alt=""
                                                             style="width: 100%!important; height: 350px!important;">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        <?php foreach ($actualites as $ligne): ?>
                                            <div class="carousel-item">
                                                <div class="rounded z-depth-1-half">
                                                    <div class="overlay">
                                                        <a href="<?= base_url('pages/details?title=' . rawurlencode(url_title($ligne->post_title)) . '&&postid=' . $ligne->post_id); ?>">
                                                            <img src="<?= base_url('assets/uploads/images/') . $ligne->post_image; ?>"
                                                                 class="card-img-top h-50" alt="CRISC Post Image"
                                                                 style="width: 100%!important; height: 350px!important;">
                                                        </a>
                                                    </div>
                                                </div>

                                                <!--Card content-->
                                                <div class="card-body">
                                                    <h3 class="font-weight-bold text-center">
                                                        <a href="<?= base_url('pages/details?title=' . rawurlencode(url_title($ligne->post_title)) . '&&postid=' . $ligne->post_id); ?>"
                                                           style="font-size: 20px!important;">
                                                            <?= word_limiter($ligne->post_title, 10); ?>
                                                        </a>
                                                    </h3>
                                                </div>
                                            </div>
                                            <!--/.Card-->

                                        <?php endforeach;
                                    } else { ?>
                                        <div class="carousel-item">
                                            <div class="card">
                                                <div class="card-body alert alert-danger">
                                                    <div class="card-height-100">
                                                        <!--Title-->
                                                        <h3 class="font-weight-bold text-center">
                                                            Oops ! <br>
                                                            Aujourd'hui <?php echo utf8_encode(strftime("%A, %d-%b-%Y",
                                                                strtotime(date("d-m-Y")))); ?>
                                                            n'a aucune publication recente.
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                        <div class="card mt-3 wow fadeIn">

                            <div class="card-header unique-color white-text">
                                <h5 class="font-weight-bold">Autres publications</h5>
                            </div>

                            <!--Card content-->
                            <div class="card-body">

                                <ul class="list-unstyled list-group list-group-flush">
                                    <?php if (isset($activitesRecentes)) { ?>
                                        <?php foreach ($activitesRecentes as $ligne): ?>
                                            <!-- First post -->
                                            <li class="waves-effect list-group-item list-group-item-action">

                                                <div style="display: inline!important;">
                                                    <a href="<?= base_url('pages/details?title=' . rawurlencode(url_title($ligne->post_title)) . '&&postid=' . $ligne->post_id); ?>">

                                                    <span class="float-left mr-1">
                                                        <img src="<?= base_url('assets/uploads/images/') . $ligne->post_image; ?>"
                                                             alt="CRISC Post Image" class="card-img-100"
                                                             style="border-radius: 100px!important;"></span>
                                                        <div class="mt-2 pt-2 ml-1 pl-1">
                                                        <span class="h5 text-justify font-weight-bold">
                                                             <?= word_limiter($ligne->post_title, 5); ?>
                                                        </span>
                                                            <span class="text-center font-weight-bold text-danger">
                                                             [<?= $ligne->category_name; ?>]
                                                        </span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </li>
                                        <?php endforeach;
                                    } else { ?>
                                        <!--Title-->
                                        <h5 class="text-center alert alert-danger">
                                            il n'y a aucune publication.
                                        </h5>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>
<!--Main layout-->
