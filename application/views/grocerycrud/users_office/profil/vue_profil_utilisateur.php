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
                                    <span>Modifier votre mot de passe</span>
                                </h4>
                            </div>
                        </div>
                        <!-- Heading -->
                    </div>
                    <div class="box-body">
                        <div class="card-body">
                            <h4 class="mb-2 mb-sm-0 pt-1">
                                <span>Mon compte </span>
                            </h4>
                            <br>
                            <?php echo form_open(base_url('users/update_profil')); ?>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <label for="email" class="control-label">
                                        <span class="text-danger">*</span>Votre Adresse mail</label>
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" id="email"
                                               value="<?= $this->session->email; ?>"/>
                                    </div>
                                </div>
                                </div>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <label for="phone" class="control-label">
                                        <span class="text-danger">*</span>Votre numero de portable</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="phone" id="phone"
                                               value="<?= $this->session->phone; ?>"/>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Enregistrer">
                            <?= form_close(); ?>
                            <a href="<?= base_url() . "users/changerPassword"; ?>" class="btn btn-outline-primary">
                                Modifier le mot de passe
                            </a>
                        </div>
                        <!-- stockage de l'ID -->
                        <?php $id = $this->uri->segment(5); ?>
                        <span style="color:red;"><b><?= $this->session->Agent; ?></b></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<br><br><br><br>
<br><br><br><br>
<br><br><br><br>
