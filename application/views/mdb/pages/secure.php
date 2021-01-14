<main role="main" class="mt-5 pt-5">
    <div class="login-page mt-3">
        <div class="container-fluid">
            <div class="form-holder has-shadow">
                <div class="row">
                    <!-- Logo & Information Panel-->
                    <div class="col-sm-6 unique-color white-text">
                        <div class="d-flex align-items-center">
                            <div class="content mt-3 pt-3">
                                <div class="logo text-center align-middle">
                                    <a href="<?= base_url() ?>" class="img-fluid text-center">
                                        <img src="<?= base_url('resources/'); ?>front/img/avatar.png"
                                             style="border-radius: 100px" class="card-img-100">
                                    </a>
                                </div>
                                <hr>
                                <p class="text-center h5">
                                    Veuillez indiquer vos identifiants de connexion pour acceder a votre espace
                                    d'administration de l'application de gestion des affectations des pretres.
                                    Seuls les utilisateus et les administrateurs prealablement creer ont access.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Form Panel    -->
                    <div class="col-sm-6 bg-white">
                        <div class="d-flex align-items-center">
                            <div class="container-fluid">
                                <!-- new login form -->

                                <?php if (!empty($admin_exist)) { ?>
                                    <!--Card content-->
                                    <div class="card-body">
                                        <!--  <?php //echo form_open(base_url('main/reset_password_form')); ?> -->
                                        <span style="color:red;"><b><?= $this->session->Agent; ?></b></span>
                                        <form class="" action="<?= base_url() . 'secure/login' ?>" method="post">
                                            <!-- Email -->
                                            <h1 class="text-center font-weight-bold">Authentification</h1>
                                            <?php
                                            if (isset($page_error)) { ?>
                                                <hr>
                                                <h6 class="text-danger alert alert-light text-center small">
                                                    <i class="fa fa-window-close fa-lg"></i> <?= $page_error; ?>
                                                </h6>

                                            <?php } ?>
                                            <div class="form-group">
                                                <div class="md-form">
                                                    <input type="text" id="username" name="username"
                                                           class="form-control"
                                                           placeholder="Email. Ex: moi@gmail.com" autofocus
                                                           value="<?= set_value('username'); ?>">
                                                    <span class="text-danger"> <?= form_error('username'); ?></span>
                                                </div>
                                            </div>
                                            <!-- Password -->
                                            <div class="form-group">
                                                <div class="md-form">
                                                    <input type="password" class="form-control" id="password"
                                                           name="password"
                                                           placeholder="Mot de passe. Ex: xxxxxxxxxx">
                                                    <span class="text-danger"> <?= form_error('password'); ?></span>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <input class="btn btn-primary btn-block" type="submit"
                                                       value="Se connecter"/>
                                                <hr>
                                                <small>Avez-vous perdu votre mot de passe ? reinitialiser-le tout simplement en cliquant sur
                                                    <a href="<?= base_url('secure/resetPassword'); ?>"
                                                       class="forgot-pass signup font-weight-bold">Mot
                                                        de
                                                        passe oublie.</a>
                                                  Cette application vous permet de mettre en valeur vos competences et votre savoir-faire.
                                                </small>
                                            </div>
                                        </form>
                                        <!-- Sign in button -->
                                        <?php
                                        echo "<b class='text text-red'>" . $this->session->error_login . "</b>";
                                        ?>
                                        <?= form_close() ?>
                                        <!-- Form -->
                                    </div>

                                <?php } else { ?>
                                    <h1 class="text-center font-weight-bold">Admin Login</h1>
                                    <div class="text-justify">
                                        <h5>Bienvenue dans l'application de gestion de gestion du site internet pour crisclba.com
                                            Veuillez configurer le compte administrateur pour démarrer l'application.
                                            <b>
                                            </b>.</h5>
                                    </div>
                                    <div class="text-center">
                                        <a href="<?php echo base_url(); ?>" class="btn btn-primary"
                                           data-toggle="modal" data-target=".modal-abonnement">Creer compte
                                            admin</a>
                                    </div>
                                <?php } ?>
                            </div>
                            <!-- new form close -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                                            <input type="email" name="email" id="email"
                                                   value="<?= set_value('email'); ?>"
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
                                            <input type="password" name="password_confirmation"
                                                   id="password_confirmation"
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
</main>
