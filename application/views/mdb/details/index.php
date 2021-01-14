<!--Main layout-->
<main role="main" class="pt-5 mt-5">
    <div class="mt-5">

        <!--Section: Post-->
        <section class="wow fadeIn">
            <div class="container-fluid">
                <!--Card: Jumbotron-->

                <div class="row">
                    <div class="col-sm-9">

                        <?php if (isset($articles)) { ?>
                            <div class="card mb-4 wow fadeIn">

                                <div class="card-body">
                                    <h3 class="font-weight-bold">
                                        <span class="text-primary float-left"> <?= $articles['category_name']; ?></span>
                                        <span class="float-right">
                                                 Publication du <?php echo utf8_encode(strftime("%a, %d-%b-%Y %r",
                                                strtotime($articles['post_date_created']))); ?>.
                                          </span>
                                    </h3>
                                </div>

                            </div> <!--Card provinciale-->
                            <div class="card wow fadeIn">
                                <div class="row">
                                    <!--Grid column-->
                                    <div class="col-sm-6">
                                        <!--Featured image-->
                                        <div class="rounded z-depth-1-half">
                                            <div class="overlay h-50">
                                                <a href="<?= base_url('assets/uploads/images/') . $articles['post_image']; ?>">
                                                    <img src="<?= base_url('assets/uploads/images/') . $articles['post_image']; ?>"
                                                         class="card-img-top" alt=""
                                                         style="width: 100%!important;">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Grid column-->
                                    <hr>
                                    <div class="col-sm-6">
                                        <h4 class=" text-center font-weight-bold text-center text-primary mt-2 pt-2">
                                            <?= $articles['post_title']; ?>
                                        </h4>
                                        <hr>
                                        <div class="text-right mr-2 pr-2">
                                            <h5 class="font-weight-bold">
                                                Author :
                                                <a href=""><?= $articles['user_name_posted']; ?></a>
                                            </h5>
                                            <h5 class="font-weight-bold">
                                                Source : <a href=""><?= $articles['post_source_info']; ?></a>
                                            </h5>
                                            <h5 class="font-weight-bold">
                                                Lien source : <a
                                                        href="https://<?= $articles['post_lien_source_info']; ?>"><?= $articles['post_lien_source_info']; ?></a>
                                            </h5>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <hr>
                                        <div class="container">
                                            <!-- echo substr($chaine, 0, 30) . "..."; -->
                                            <h5 class="text-justify">
                                                <?= $articles['post_content']; ?>
                                            </h5>
                                        </div>
                                    </div>
                                    <!--Grid column-->
                                </div>
                            </div>
                            <!-- shared -->
                            <div class="card-footer unique-color">
                                <div class="container">

                                    <!-- Grid row-->
                                    <div class="row py-3 d-flex align-items-center">

                                        <!-- Grid column -->
                                        <div class="col-md-6 col-lg-6 text-center text-md-left mb-4 mb-md-0">
                                            <h6 class="mb-0 white-text font-weight-bold">Give your contribution
                                                and
                                                share on
                                                social networks!</h6>
                                        </div>
                                        <!-- Grid column -->

                                        <!-- Grid column -->
                                        <div class="col-md-6 col-lg-6 text-center text-md-right">

                                            <!-- Facebook -->
                                            <a class="fb-ic">
                                                <i class="fa fa-facebook-f white-text mr-4 fa-2x"> </i>
                                            </a>
                                            <!-- Twitter -->
                                            <a class="tw-ic">
                                                <i class="fa fa-twitter white-text mr-4 fa-2x"> </i>
                                            </a>
                                            <!--Linkedin -->
                                            <a class="li-ic">
                                                <i class="fa fa-linkedin white-text mr-4 fa-2x"> </i>
                                            </a><!--Linkedin -->
                                            <a class="wt-ic">
                                                <i class="fa fa-whatsapp white-text mr-4 fa-2x"> </i>
                                            </a><a class="wt-ic">
                                                <i class="fa fa-print white-text mr-4 fa-2x"> </i>
                                            </a>
                                            <a class="wt-ic">
                                                <i class="fa fa-envelope white-text mr-4 fa-2x"> </i>
                                            </a>
                                        </div>
                                        <!-- Grid column -->
                                    </div>
                                    <!-- Grid row-->
                                </div>
                            </div>
                            <!--/.Card-->
                            <?php
                        } else { ?>
                            <!--Title-->
                            <h5 class="text-center alert alert-danger">
                                Publication non trouvee
                            </h5>
                        <?php } ?>
                    </div>
                    <!--Grid row-->

                    <!--Grid column-->
                    <div class="col-sm-3">

                        <!--Card: Jumbotron-->
                        <div class="card mb-4 wow fadeIn">

                            <div class="card-header unique-color white-text">
                                <h5 class="font-weight-bold">Autres publications similaires</h5>
                            </div>

                            <!--Card content-->
                            <div class="card-body">

                                <ul class="list-unstyled list-group list-group-flush">
                                    <!-- First post -->
                                    <?php if (isset($postsSimilaires)) { ?>
                                        <?php foreach ($postsSimilaires as $ligne): ?>
                                            <!-- First post -->

                                            <li class="waves-effect list-group-item list-group-item-action">

                                                <div style="display: inline!important;">
                                                    <a href="<?= base_url('pages/details?title=' . rawurlencode(url_title($ligne->post_title)) . '&&postid=' . $ligne->post_id); ?>">

                                                    <span class="float-left mr-1">
                                                        <img src="<?= base_url('assets/uploads/images/') . $ligne->post_image; ?>"
                                                             alt="CRISC Post Image" class="card-img-100"
                                                             style="border-radius: 100px!important;"></span>
                                                        <div class="mt-2 pt-2 ml-1 pl-1">
                                                        <span class="h6 text-justify font-weight-bold">
                                                             <?= word_limiter($ligne->post_title, 5); ?>
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
                        </div><!-- card last update -->
                    </div>
                    <!--Grid column-->
                </div>
                <!--Grid row-->

            </div>
        </section>
        <!--Section: Post-->
    </div>
</main>
<!--Main layout-->
