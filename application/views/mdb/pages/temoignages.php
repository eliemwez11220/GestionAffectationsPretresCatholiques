<!-- page intro -->
<div class="card unique-color-dark">
    <div class="card-header unique-color-dark text-center white-text pt-5 mt-5">

        <div class="mt-lg-3 pt-lg-3 pt-sm-3 mt-sm-3 d-lg-none d-md-block">
            <ul class="app-breadcrumb breadcrumb text-capitalize unique-color-dark">
                <li class="breadcrumb-item font-weight-bold"><a href="<?= base_url(); ?>">Accueil</a></li>
                <?php
                if ($this->uri->segment(3) != '') {
                    ?>
                    <li class="breadcrumb-item font-weight-bold">
                        <a href="<?= base_url() . $this->uri->segment(1) . '/' . $this->uri->segment(2); ?>"><?= $this->uri->segment(2) ?> </a>
                    </li>
                    <li class="breadcrumb-item disabled" disabled><?= $this->uri->segment(3) ?></li>
                <?php } else { ?>
                    <li class="breadcrumb-item disabled" disabled><?= $this->uri->segment(2) ?></li>
                <?php } ?>
            </ul>

        </div>
        <span class="h5 text-uppercase font-weight-bold">
           Appreciation de l'emission. Les temoignages de differents lecteurs !
        </span>

    </div>
</div>
<!--Main layout-->
<main role="main" class="pt-3 mt-3">
    <!-- Content -->
    <div class="container">
        <!-- Mask & flexbox options-->

        <form action="<?= site_url('secure/adminAccount'); ?>" method="post">

            <div class="font-weight-bold">
                <h5 class="font-weight-bold text-center">Formulaire d'appreciation de l'emission</h5>
                <p class="text-justify">
                    Remplissez le formulaire ci-dessous pour pouvoir benefier de nos conseils experts avec de sujets
                    pertinents de la vie
                    quotidienne avec des informations basiques pour vous permettre de rejoindre la plus grande
                    communaute de personnes
                    qui cherchent a obtenir des conseils medicaux aupres des experts en sante et divers.
                    <small> Votre temoignage compte beaucoup pour permettre a la communaute de nous suivre.
                    </small>
                </p>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label" id="nom"><span class="text-danger">*</span>Votre nom complet.
                                <br>
                                <small>Votre nom nous servira de presenter votre avis a d'autres personnes.</small>
                            </label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-user"></i></div>
                                </div>
                                <input type="text" name="nom" id="nom"
                                       value="<?= set_value('nom'); ?>"
                                       placeholder="Nom complet"
                                       class="form-control text-capitalize<?= (form_error('nom')) ? 'is-invalid' : '' ?>"
                                       autofocus>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">
                                <span class="text-danger">*</span> Votre adresse email. <br>
                                <small>Nous pouvons vous connecter pour votre appreciation en cas de besoin</small>
                            </label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i>@</i></div>
                                </div>
                                <input type="email" name="email" id="email" value="<?= set_value('email'); ?>"
                                       placeholder="Adresse e-mail"
                                       class="form-control <?= (form_error('email')) ? 'is-invalid' : '' ?>">
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="control-label" id="contenu">
                                Donnez-nous votre appreciation. <br>
                                <small>Votre avis compte poyur l'amelioration de la qualite de notre emission.</small>
                            </label>
                            <textarea name="contenu" id="contenu" cols="30" rows="5" class="form-control"
                                      placeholder="Votre temoignage ou avis compte"></textarea>
                        </div>
                    </div>
                    <!-- second column -->

                </div>
                <div class="text-center">

                    <button type="submit" name="submit" class="btn btn-primary">
                        Poster votre temoignage
                    </button>
                </div>

            </div>
        </form>

    </div>
<div class="unique-color-dark white-text">
    <hr class="mb-5">
    <div class="text-center align-middle">
        <h5 class="h5 text-uppercase font-weight-bold">Les personnes qui aiment notre emission nous
            apprecient et temoignent</h5>
        <br>
        <!--Carousel Wrapper-->
        <div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">


            <div class="carousel-inner" role="listbox">
                <!-- first comment -->
                <div class="carousel-item active text-center">

                    <!-- Main heading -->
                    <h3 class="h3 mb-3 text-center text-uppercase">Nom de la personne</h3>
                    <p class="text-center">Le Lorem Ipsum est simplement du faux texte employé dans la
                        composition et
                        la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de
                        l'imprimerie
                        depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de
                        texte pour

                    </p>
                    <br>
                    <!--  -->
                    <a href="<?= base_url('resources/'); ?>front/img/avatar.png" class="text-center">
                        <img class="card-img-100 text-center"
                             src="<?= base_url('resources/'); ?>front/img/avatar.png"
                             alt="First slide" style="border-radius: 100px;">
                    </a>


                </div>
                <!-- second comment -->
                <div class="carousel-item">
                    <!--  -->
                    <!-- Main heading -->
                    <h3 class="h3 mb-3 text-center text-uppercase">Nom client2</h3>
                    <p class="text-center">Le Lorem Ipsum est simplement du faux texte employé dans la
                        composition et
                        la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de
                        l'imprimerie
                        depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de
                        texte pour
                    </p>
                    <a href="<?= base_url('resources/'); ?>front/img/portfolio.jpg" class="text-center">
                        <img class="card-img-100 text-center"
                             src="<?= base_url('resources/'); ?>front/img/portfolio.jpg"
                             alt="First slide" style="border-radius: 100px;">
                    </a>
                </div><!-- third comment -->
                <div class="carousel-item">

                    <!-- Main heading -->
                    <h3 class="h3 mb-3 text-center text-uppercase">Nom client3</h3>
                    <p class="text-center">Le Lorem Ipsum est simplement du faux texte employé dans la
                        composition et
                        la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de
                        l'imprimerie
                        depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de
                        texte pour

                    </p>
                    <br>
                    <!--  -->
                    <a href="<?= base_url('resources/'); ?>front/img/avatar.png" class="text-center">
                        <img class="card-img-100 text-center"
                             src="<?= base_url('resources/'); ?>front/img/avatar.png"
                             alt="First slide" style="border-radius: 100px;">
                    </a>


                </div>
                <!-- second comment -->
                <div class="carousel-item">
                    <!--  -->
                    <!-- Main heading -->
                    <h3 class="h3 mb-3 text-center text-uppercase">Nom client4</h3>
                    <p class="text-center">Le Lorem Ipsum est simplement du faux texte employé dans la
                        composition et
                        la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de
                        l'imprimerie
                        depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de
                        texte pour
                    </p>
                    <a href="<?= base_url('resources/'); ?>front/img/portfolio.jpg" class="text-center">
                        <img class="card-img-100 text-center"
                             src="<?= base_url('resources/'); ?>front/img/portfolio.jpg"
                             alt="First slide" style="border-radius: 100px;">
                    </a>
                </div>
            </div>
            <!--Controls-->
            <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            <!--/.Controls-->
        </div>
    </div>
</div>
    <!-- Mask & flexbox options-->
</main>
<!-- Full Page Intro -->
