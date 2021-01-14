
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
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
                                    <a href="#" target="_blank">Ajouter</a>
                                    <span>un utilisateur</span>
                                </h4>

                            </div>

                        </div>
                        <!-- Heading -->
                    </div>
                    <div class="box-body">
                        <span style="color:red;"><b><?= $this->session->Admin; ?></b></span>

                        <span style="color:red;"><b><?= $this->session->Agent; ?></b></span>
                        <form class="" action="<?= base_url(). 'admin/add_utilisateur' ?>" method="post">
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <label for="nom_complet" class="control-label"><span class="text-danger">*</span>Nom complet</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control text-capitalize" name="nom_complet" value="<?= set_value('nom_complet') ?>"/>
                                        <span class="text-danger"><?php echo form_error('nom_complet');?></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="username" class="control-label"><span class="text-danger">*</span>Pseudo utilisateur</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="username" value="<?= set_value('username') ?>"/>
                                        <span class="text-danger"><?php echo form_error('username');?></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="password" class="control-label"><span class="text-danger">*</span>Mot de passe</label>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" value="<?= set_value('password') ?>" />
                                        <span class="text-danger"><?php echo form_error('password');?></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="role_utilisateur" class="control-label"><span class="text-danger">*</span>Role ou privilège</label>
                                        <select class="browser-default custom-select" name="role_utilisateur">
                                            <option disabled>Choisissez un role (privilège)</option>
                                            <option value="agent">Utilisateur</option>
                                            <option value="administrator">Administrateur</option>
                                            <span class="text-danger"><?php echo form_error('role_utilisateur');?></span>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary btn-rounded my-0 btn-sm" value="Créer compte">
                            <a href="<?= base_url() . "admin/dashboard"; ?>" class="btn btn-info pull-right btn-sm">
                                <i class="fa fa-close"></i> Annuler & afficher la liste
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
