<main role="main" class="mt-5 pt-5">
    <div class="login-page mt-3">
        <div class="container-fluid">
            <div class="form-holder has-shadow">
                <div class="row">
                <!-- Logo & Information Panel-->
                <div class="col-lg-6 unique-color white-text">
                    <div class="d-flex align-items-center">
                        <div class="content mt-3 pt-3">
                            <div class="logo text-center align-middle">
                                <a href="<?= base_url() ?>" class="img-fluid text-center">
                                    <img src="<?= base_url('resources/'); ?>front/img/avatar.png" width="100%"
                                         style="border-radius: 100px" class="card-img-100">
                                </a>
                            </div>
                            <hr>
                            <p class="text-center">
                              Pour revenir
                              a la page precedente, cliquer sur
                              <a href="<?php echo base_url() . 'secure/'; ?>"
                                 class="text-danger btn-link"><span class="fa fa-chevron-left"></span> accueil</a>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Form Panel    -->
                <div class="col-lg-6 bg-white">
                    <div class="d-flex align-items-center">
                        <div class="container-fluid">
                            <!-- new login form -->

                                <!--Card content-->
                                <div class="card-body">
                                    <span style="color:red;"><b><?= $this->session->Agent; ?></b></span>
                                    <form class="" action="<?= base_url() . 'secure/resetPasswordForm' ?>" method="post">
                                        <!-- Email -->
                                        <h1 class="text-center font-weight-bold">PASSWORD RESET</h1>
                                        <hr>
                                        <p>
                                            Veuillez indiquer votre adresse e-mail deja enregistree sur cette application pour reinitialiser votre mot de passe.
                                            En cas de besoin, veuillez contacter un administrateur pour plus de details.
                                        </p>
                                        <?php
                                        if (isset($page_error)) { ?>

                                                <h6 class="text-danger alert alert-light text-center small">
                                                    <i class="fa fa-window-close fa-lg"></i> <?= $page_error; ?>
                                                </h6>

                                        <?php } ?>
                                        <div class="form-group">
                                            <div class="md-form">
                                                <input type="text" name="email" class="form-control"
                                                       placeholder="Saisissez votre adresse e-mail" autofocus
                                                       value="<?= set_value('email'); ?>">
                                                <span class="text-danger"> <?= form_error('email'); ?></span>
                                            </div>
                                        </div>
                                        <!-- Password -->

                                        <div class="text-center">
                                            <input class="btn btn-primary btn-block" type="submit"
                                                   value="Reinitialiser"/>
                                        </div>
                                    </form>
                                    <?= form_close() ?>
                                    <!-- Form -->
                                </div>

                        </div>
                        <!-- new form close -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</main>


<!-- /.login-box -->
<div class="modal fade modal-abonnement" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
     aria-hidden="true" id="modal-abonnement">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header text-uppercase bg-info text-light text-center">
                <h4 class="modal-title" id="exampleModalCenterTitle">
                    Configuration de l'administrateur
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <form action="<?= site_url('secure/adminAccount'); ?>" method="post">
                            <div class="font-weight-bold">
                                <div class="form-group">
                                    <label class="control-label" id="nom_complet">Nom complet admin: </label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-users"></i></div>
                                        </div>
                                        <input type="text" name="nom_complet" id="nom_complet"
                                               value="<?= set_value('nom_complet'); ?>"
                                               placeholder="Ex: EMAR RUCHI MOHAMED"
                                               class="form-control text-capitalize<?= (form_error('nom_complet')) ? 'is-invalid' : '' ?>"
                                               autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Pseudonyme admin : </label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-user"></i></div>
                                        </div>
                                        <input type="text" name="username" id="username"
                                               value="<?= set_value('usename'); ?>"
                                               placeholder="Nom de connexion"
                                               class="form-control <?= (form_error('username')) ? 'is-invalid' : '' ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Adresse email admin : </label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i>@</i></div>
                                        </div>
                                        <input type="email" name="email" id="email" value="<?= set_value('email'); ?>"
                                               placeholder="Adresse e-mail admin"
                                               class="form-control <?= (form_error('email')) ? 'is-invalid' : '' ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Mot de passe :</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-key"></i></div>
                                        </div>
                                        <input type="password" name="password" id="password"
                                               placeholder="Créer votre mot de passe"
                                               class="form-control <?= (form_error('mot_de_passe')) ? 'is-invalid' : '' ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Confirmation mot de passe :</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-key"></i></div>
                                        </div>
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                               placeholder="Confirmer votre mot de passe créé"
                                               class="form-control <?= (form_error('password_confirmation')) ? 'is-invalid' : '' ?>">
                                    </div>
                                </div>
                                <button type="submit" name="submit" class="btn btn-info">
                                    Créer compte administrateur
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- SCRIPTS -->