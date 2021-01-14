<main class="pt-5 mt-5">
    <div class="container-fluid">
        <!-- notifications -->
        <?php
        if ((isset($_SESSION['success'])) OR (isset($_SESSION['error']))) { ?>
            <div class="container mt-4 pt-4">
                <span class="text-dark">
                    <?php include_once "application/views/alertes/alert-index.php"; ?>
                </span>
            </div>
        <?php } ?>
        <!-- end -->

        <div class="main-card mb-3 mt-1 pt-1">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title font-weight-bold">
                                <span>Changement du mot de passe</span>
                            </h5>
                        </div>
                            <div class="box-body">
                                <span style="color:red;"><b><?= $this->session->Admin; ?></b></span>
                                <span style="color:red;"><b><?= $this->session->Agent; ?></b></span>
                                <form class=""
                                      action="<?= base_url() . 'admin/updateProfil/pofil/' . $agents['id_asset']; ?>"
                                      method="post">
                                    <div class="row clearfix mx-2">
                                        <div class="col-md-6">
                                            <label for="asset_name" class="control-label"><span
                                                        class="text-danger">*</span>Nom
                                                complet</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control text-capitalize"
                                                       name="asset_name" readonly
                                                       value="<?= $agents['asset_name'] ? $agents['asset_name'] : set_value('asset_name'); ?>"/>
                                                <span class="text-danger"><?php echo form_error('asset_name'); ?></span>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="asset_email" class="control-label"><span
                                                        class="text-danger">*</span>Adresse
                                                Email</label>
                                            <div class="form-group">
                                                <input type="email" class="form-control" name="asset_email"
                                                       readonly value="<?= $agents['asset_email'] ? $agents['asset_email'] : set_value('asset_email'); ?>"/>
                                                <span class="text-danger"><?php echo form_error('asset_email'); ?></span>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="new_password" class="control-label">
                                                <span class="text-danger">*</span>Nouveau Mot de passe</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="new_password" id="new_password"
                                                    <?= form_error('new_password') ? 'is-invalid' : 'is-valid'; ?> minlength="6"
                                                       maxlength="50"
                                                       value="<?= set_value('new_password'); ?>"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="confirm_password" class="control-label"><span class="text-danger">*</span>Confirmer
                                                le mot de passe</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="confirm_password"
                                                       id="confirm_password"
                                                    <?= form_error('confirm_password') ? 'is-invalid' : 'is-valid'; ?> minlength="6"
                                                       maxlength="50"
                                                       value="<?= set_value('confirm_password'); ?>"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center align-middle mb-3 pb-3">
                                        <input type="submit" class="btn btn-primary btn-lg"
                                               value="Sauvegarder le nouveau mot de passe">
                                        <?php
                                        $link = $this->uri->segment(1)
                                        ?>
                                        <a href="javascript:history.back();" class="btn btn-outline-success">
                                            Revenir a la page precedente
                                        </a>
                                    </div>
                                </form>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
