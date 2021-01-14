
<div class="page login-page mt-5 pt-5">
    <div class="container-fluid mt-5">
        <div class="form-holder has-shadow">
            <div class="row">
                <!-- Logo & Information Panel-->
                <div class="col-lg-6 unique-color white-text">
                    <div class="d-flex align-items-center">
                        <div class="content">
                            <div class="logo text-center align-middle">
                                <a href="<?= base_url() ?>" class="img-fluid text-center">
                                    <img src="<?= base_url('resources/'); ?>front/img/avatar.png" width="100%"
                                         style="border-radius: 100px" class="card-img-100">
                                </a>
                            </div>
                            <hr>
                            <p class="text-center">
                                En cas de besoin, veuillez contacter un administrateur pour plus de details.
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
                                <form class="" action="<?= base_url() . 'secure/changePasswordSession' ?>" method="post">
                                    <!-- Email -->
                                    <h2 class="text-center font-weight-bold">PASSWORD DEFAULT CHANGE</h2>
                                    <hr>
                                    <p class="s-text">
                                        Votre session a expiree car vous vous etes cconnecte avec un mot de passe par defaut.
                                        Veuillez changer ce mot de passe pour continuer.

                                    </p>

                                    <?php
                                    if (isset($page_error)) { ?>

                                        <h6 class="text-danger alert alert-light text-center small">
                                            <i class="fa fa-window-close fa-lg"></i> <?= $page_error; ?>
                                        </h6>

                                    <?php } ?>
                                    <div class="form-group">
                                        <div class="md-form">
                                            <input type="password" name="nvo_mot_pass" class="form-control"
                                                   placeholder="Saisissez votre nouveau mot de passe" autofocus
                                                   value="<?= set_value('nvo_mot_pass'); ?>">
                                            <span class="text-danger"> <?= form_error('nvo_mot_pass'); ?></span>
                                        </div><div class="md-form">
                                            <input type="password" name="conf_mot_pass" class="form-control"
                                                   placeholder="Confirmer votre nouveau mot de passe pour eviter la mauvaise saisie"
                                                   value="<?= set_value('conf_mot_pass'); ?>">
                                            <span class="text-danger"> <?= form_error('conf_mot_pass'); ?></span>
                                        </div>
                                        <div class="md-form">
                                            <input type="hidden" name="anc_mot_pass" class="form-control"
                                                   placeholder="Ancien mot de passe" readonly
                                                   value="<?= set_value('anc_mot_pass'), $this->session->password; ?>">
                                            <span class="text-danger"> <?= form_error('anc_mot_pass'); ?></span>
                                        </div>
                                    </div>
                                    <!-- Password -->
                                    <input type="hidden" name="username" value=" <?= $_SESSION['username']; ?>"
                                           required readonly>
                                    <input type="hidden" name="usermail" value=" <?= $_SESSION['usermail']; ?>"
                                           required readonly>
                                    <input type="hidden" name="username_id" value=" <?= $_SESSION['users_id']; ?>"
                                           readonly>
                                    <div class="text-center">
                                        <input class="btn btn-primary btn-block" type="submit"
                                               value="Changer mot de passe"/>
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
