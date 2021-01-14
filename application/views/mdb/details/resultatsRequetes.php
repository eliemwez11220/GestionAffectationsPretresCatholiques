<!--Main layout-->
<main role="main" class="mt-5 pt-5">
    <div class="container-fluid mt-5">
        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6 col-lg-8">
                        <div class="float-left">
                            <h3 class="font-weight-bold">
                                <?= $title; ?>
                            </h3>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">

                            <form role="search" action="<?= base_url('pages/search'); ?>" method="post">

                                <div class="float-right">
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
                            </form>

                    </div>
                </div>
            </div>
        </div>
        <?php if (!empty($resultats)) { ?>
            <div class="row">
                <?php foreach ($resultats as $ligne): ?>
                    <div class="col-md-6">
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
                    </div>
                <?php endforeach; ?>
            </div>
        <?php } else { ?>
            <div class="text-center alert alert-warning">
                <!--Title-->
                <h5>
                    Aucune publication trouvee correspondant au critere - <?= $critere; ?>
                    <br>
                    <br>

                    Vous pouvez revenir à <a class="font-weight-bold text-danger" href="javascript:history.back()">la
                        page précédente</a> ou aller à
                    <a class="font-weight-bold text-danger" href="<?= base_url(); ?>">la page d'accueil</a>.
                </h5>
            </div>
        <?php } ?>

    </div>

</main>    <!-- Full Page Intro -->