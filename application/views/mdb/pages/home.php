<!--Main layout-->
<main role="main" class="pt-5 mt-5">
    <div class="mt-5 container-fluid">
        <section class="wow fadeIn">
            <div class="row">

                <!--Grid column-->
                <div class="col-md-4">
                    <!--Card : Dynamic content wrapper-->

                    <!--Card: Jumbotron-->
                    <div class="card mb-3 wow fadeIn">

                        <div class="card-header unique-color white-text">
                            <h5 class="font-weight-bold">Dernieres publications</h5>
                        </div>

                        <!--Card content-->
                        <div class="card-body">

                            <ul class="list-unstyled list-group list-group-flush">
                                <?php if (isset($postsWeeks)) { ?>
                                    <?php foreach ($postsWeeks as $ligne): ?>
                                        <!-- First post -->
                                        <li class="waves-effect list-group-item list-group-item-action">
                                            <div class="media">
                                                <div class="row">
                                                    <div class="col-sm-6 col-lg-4">
                                                        <div class="media-heading text-center">
                                                            <a href="<?= base_url('pages/details?title=' . rawurlencode(url_title($ligne->post_title)) . '&&postid=' . $ligne->post_id); ?>">
                                                                <img class="card-img-100"
                                                                     src="<?= base_url('assets/uploads/images/') . $ligne->post_image; ?>"
                                                                     alt="CRISC Post Image"
                                                                     style="border-radius: 100px">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-lg-7">
                                                        <div class="media-body">
                                                            <a href="<?= base_url('pages/details?title=' . rawurlencode(url_title($ligne->post_title)) . '&&postid=' . $ligne->post_id); ?>"
                                                               class="text-left">
                                                                <h5 class="mt-0 mb-1 font-weight-bold">
                                                                    <?= $ligne->post_title; ?>
                                                                </h5>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
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

                    <!--/.Card-->
                    <!-- abonnement a la newsletter -->
                    <div class="card text-center wow fadeIn">

                        <div class="card-header bg-info white-text">
                            Voulez-vous etre informer de nouvelles actualites ?
                        </div>

                        <!--Card content-->
                        <div class="card-body">

                            <!-- Default form login -->
                            <form>

                                <!-- Default input email -->
                                <input type="email" id="defaultFormLoginEmailEx" class="form-control"
                                       placeholder="Votre adresse e-mail">

                                <br>

                                <input type="text" id="defaultFormNameEx" class="form-control"
                                       placeholder="Votre nom complet">
                                <div class="text-center mt-4">
                                    <button class="btn btn-info btn-md" type="submit">S'abonner a la newsletter
                                    </button>
                                </div>
                            </form>
                            <!-- Default form login -->

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <?php if (isset($postsSponsorises)) { ?>
                        <?php foreach ($postsSponsorises as $ligne): ?>

                            <div class="card mb-2">
                                <div class="card-body">
                                    <div class="row">
                                        <!--Grid column-->
                                        <div class="col-sm-4">
                                            <!--Featured image-->
                                            <div class="overlay">

                                                <div class="h-50 card-height-200">
                                                    <a href="<?= base_url('pages/details?title=' . rawurlencode(url_title($ligne->post_title)) . '&&postid=' . $ligne->post_id); ?>">
                                                        <img src="<?= base_url('assets/uploads/images/') . $ligne->post_image; ?>"
                                                             class="card-img-top img-fluid" alt="Image article"
                                                             style="width: 100%!important; height: 150px!important; border-radius: 100px">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        <!--Grid column-->
                                        <div class="col-sm-8">
                                            <h4 class="font-weight-bold text-center mt-1 pt-1">
                                                <a href="<?= base_url('pages/details?title=' . rawurlencode(url_title($ligne->post_title)) . '&&postid=' . $ligne->post_id); ?>">
                                                    <?= $ligne->post_title; ?>
                                                </a>
                                            </h4>
                                            <p class="font-weight-bold h6 text-uppercase grey-text">
                                        <span class="font-weight-bold text-uppercase float-left">
                                            <?= $ligne->category_name; ?>
                                        </span>
                                                <span class="font-weight-bold text-uppercase float-right small">
                                          depuis <?php echo utf8_encode(strftime("%A, %d-%b-%Y %r",
                                                        strtotime($ligne->post_date_created))); ?>
                                        </span>
                                            </p>
                                        </div>
                                        <!--Grid column-->
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;
                    } else { ?>
                        <!--Title-->
                        <h5 class="text-center alert alert-danger">
                            Aujourd'hui <?php echo utf8_encode(strftime("%A, %d-%b-%Y",
                                strtotime(date("d-m-Y")))); ?> il n'y a aucune publication recente.
                        </h5>
                    <?php } ?>
                </div>


                <div class="col-md-4">
                    <div id="carouselExampleSlidesOnly" class="carousel slide carousel-fade"
                         data-ride="carousel">
                        <div class="carousel-inner">

                            <?php if (isset($actualites)) { ?>
                                <div class="carousel-item active" style="height:700px!important;">
                                    <!-- first element -->
                                    <div class="card border-light">
                                        <div class="card-header bg-primary white-text">
                                            <h1 class="font-weight-bold text-center">
                                                Pubs Recentes
                                            </h1>
                                        </div>

                                        <!--Card image-->
                                        <div class="overlay">
                                            <div class="h-50">
                                                <a href="">
                                                    <img src="<?= base_url('assets/uploads/images/apport_team.png'); ?>"
                                                         class="card-img-top" alt=""
                                                         style="width: 100%!important; height: 400px!important;">
                                                </a>
                                            </div>
                                        </div>

                                        <div class="card-footer bg-info white-text">
                                            <div class="text-center">
                                                <h1 class="font-weight-bold">
                                                    <?php echo utf8_encode(strftime("%A, %d-%B-%Y",
                                                        strtotime(date("d-m-Y")))); ?>
                                                </h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php foreach ($actualites as $ligne): ?>
                                    <div class="carousel-item" style="height: 700px!important;">
                                        <div class="card border border-light">
                                            <div class="overlay">

                                                <div class="h-50">
                                                    <a href="<?= base_url('pages/details?title=' . rawurlencode(url_title($ligne->post_title)) . '&&postid=' . $ligne->post_id); ?>">
                                                        <img src="<?= base_url('assets/uploads/images/') . $ligne->post_image; ?>"
                                                             class="card-img-top" alt="Image article"
                                                             style="width: 100%!important; height: 500px!important; ">
                                                    </a>
                                                </div>
                                            </div>


                                            <!--Card image-->
                                            <!--Card content-->
                                            <div class="card-body bg-primary white-text">

                                                <h3 class="font-weight-bold text-center">
                                                    <a href="<?= base_url('pages/details?title=' . rawurlencode(url_title($ligne->post_title)) . '&&postid=' . $ligne->post_id); ?>"
                                                       class="white-text" style="font-size: 20px!important;">
                                                        <?= word_limiter($ligne->post_title, 10); ?>
                                                    </a>
                                                </h3>
                                                <h5 class="font-weight-bold text-center">
                                                    <a href="<?= base_url('pages/details?title=' . rawurlencode(url_title($ligne->post_title)) . '&&postid=' . $ligne->post_id); ?>"
                                                       class="white-text" style="font-size: 20px!important;">
                                                        <?= word_limiter($ligne->post_content, 10); ?>
                                                    </a>
                                                </h5>


                                            </div>
                                            <div class="card-footer bg-info white-text">

                                        <span class="font-weight-bold text-uppercase float-left">
                                            <?= $ligne->category_name; ?>
                                        </span>
                                                <span class="font-weight-bold text-uppercase float-right small">
                                           depuis <?php echo utf8_encode(strftime("%A, %d-%b-%Y %r",
                                                        strtotime($ligne->post_date_created))); ?>
                                        </span>
                                            </div>

                                        </div>
                                        <!--/.Card-->
                                    </div>
                                <?php endforeach;
                            } else { ?>

                                <div class="carousel-item">
                                    <div class="card">

                                        <!--Card content-->
                                        <div class="card-body">
                                            <!--Card image-->
                                            <div class="overlay">
                                                <div class="h-50">
                                                    <a href="#">
                                                        <img src="<?= base_url('assets/uploads/images/false.png'); ?>"
                                                             class="card-img-top" alt=""
                                                             style="width: 100%!important; height: 400px!important;">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer alert alert-danger">
                                            <div class=" card-height-100">
                                                <!--Title-->
                                                <h5 class="font-weight-bold text-center">
                                                    Oops ! <br>
                                                    Aujourd'hui <?php echo utf8_encode(strftime("%A, %d-%b-%Y",
                                                        strtotime(date("d-m-Y")))); ?>
                                                    n'a aucune publication recente.
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>
                        </div>
                    </div>
                </div>
                <!--fin Grid column-->


            </div>
        </section>
    </div>
</main>
<!--Main layout-->

