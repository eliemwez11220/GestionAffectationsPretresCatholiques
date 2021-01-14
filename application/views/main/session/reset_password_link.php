<main role="main" class="mt-5 pt-5">
    <div class="login-page mt-3">
        <div class="container-fluid">
            <div class="form-holder has-shadow">

    <div class="content main-container" style="margin-top: 70px;">
        <?php
        if ((isset($_SESSION['success'])) OR (isset($_SESSION['error']))) { ?>
            <div class="container" style="margin-top: 10px;margin-bottom: 10px;">
                <div class="row">
                    <h6 class="text-dark">
                        <?php include_once "application/views/alertes/alert-index.php"; ?>
                    </h6>
                </div>
            </div>
        <?php } ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <!-- Heading -->
                                <div class="card mb-4 wow fadeIn">
                                    <!--Card content-->
                                    <div class="card-body d-sm-flex justify-content-between">
                                        <h4 class="mb-2 mb-sm-0 pt-1">
                                            <span>Réinitialiser votre mot de passe</span>
                                        </h4>
                                    </div>
                                </div>
                                <!-- Heading -->
                            </div>
                            <div class="box-body">
                                <?php echo form_open(base_url('main/password_reset_via_email')); ?>
                                <div class="row clearfix">
                                    <div class="col-md-4">
                                        <label for="" class="control-label"><span class="text-danger">*</span>Votre adresse email</label>
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" <?= form_error('email') ? 'is-invalid' : 'is-valid'; ?>/>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="control-label"><span class="text-danger">*</span>Nouveau Mot de passe</label>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="nvo_mot_pass" <?= form_error('nvo_mot_pass') ? 'is-invalid' : 'is-valid'; ?>  minlength="6" maxlength="50"
                                                   value="<?= set_value('nvo_mot_pass'); ?>"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="control-label"><span class="text-danger">*</span>Confirmer le mot de passe</label>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="conf_mot_pass" <?= form_error('conf_mot_pass') ? 'is-invalid' : 'is-valid'; ?> minlength="6" maxlength="50"  value="<?= set_value('conf_mot_pass'); ?>"/>
                                        </div>
                                    </div>

                                </div>

                                <input type="submit" class="btn btn-outline-danger" value="Reinitialiser">
                                <?= form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
    </div>     </div>
    </div>
    </div>
    </main>