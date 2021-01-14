<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header mb-4 wow fadeIn">
                <!--Card content-->
                <div class="row d-sm-flex justify-content-between">
                    <div class="col-sm-6">
                        <h5 class="pt-1 font-weight-bold">
                            <span>Gestion des administrateurs</span>
                        </h5>
                    </div>
                    <div class="col-sm-6">
                        <div class="float-right">
                            <form role="search" action="" method="post">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="defaultFormLoginEmailEx"
                                                   name="search_field" value="<?= set_value('search_field'); ?>"
                                                   placeholder="Recherche...">
                                            <div class="input-group-prepend">
                                                <button type="submit" class="input-group-text my-0 btn-primary">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- formulaire des actions supplementaires-->
            <!-- Main content -->
            <?php
            //verifier si l'utilisateur a choisi la mise aa jour de donnees
            if (isset($agents)) { ?>
                <div class="box-body">
                    <span style="color:red;"><b><?= $this->session->Admin; ?></b></span>
                    <span style="color:red;"><b><?= $this->session->administrateur; ?></b></span>
                    <form class="" action="<?= base_url() . 'admin/update_agent/administrateur/' . $agents['id_asset']; ?>"
                          method="post">
                        <div class="row clearfix mx-2">
                            <div class="col-md-4">
                                <label for="asset_name" class="control-label"><span class="text-danger">*</span>Nom
                                    complet</label>
                                <div class="form-group">
                                    <input type="text" class="form-control text-capitalize" name="asset_name"
                                           value="<?= $agents['asset_name'] ? $agents['asset_name'] : set_value('asset_name'); ?>"/>
                                    <span class="text-danger"><?php echo form_error('asset_name'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="asset_username" class="control-label"><span class="text-danger">*</span>Nom
                                    utilisateur</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="asset_username"
                                           value="<?= $agents['asset_username'] ? $agents['asset_username'] : set_value('asset_username'); ?>"/>
                                    <span class="text-danger"><?php echo form_error('asset_username'); ?></span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="asset_email" class="control-label"><span class="text-danger">*</span>Adresse
                                    Email</label>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="asset_email"
                                           value="<?= $agents['asset_email'] ? $agents['asset_email'] : set_value('asset_email'); ?>"/>
                                    <span class="text-danger"><?php echo form_error('asset_email'); ?></span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="asset_groupe" class="control-label"><span class="text-danger">*</span>Groupe
                                        attache</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="asset_groupe"
                                               value="<?= $agents['asset_groupe'] ? $agents['asset_groupe'] : set_value('asset_groupe'); ?>"/>
                                        <span class="text-danger"><?php echo form_error('asset_groupe'); ?></span>
                                    </div>
                                    <span class="text-danger"><?php echo form_error('asset_groupe'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="asset_fonction" class="control-label"><span
                                                class="text-danger">*</span>Fonction agent</label>

                                    <select class="browser-default custom-select select2 <?= form_error('asset_fonction') ? 'is-invalid' : 'is-valid'; ?>"
                                             name="asset_fonction" id="asset_fonction">
                                        <option disabled selected>Choisisse une fonction</option>
                                        <?php
                                        if (($agents['asset_fonction'] == "")) { ?>
                                            <option value="Enseignant">Enseignant</option>
                                            <option value="Prefet">Prefet</option>
                                            <option value="Directeur">Directeur</option>
                                            <option value="Moniteur">Moniteur</option>
                                            <option value="Gestionnaire">Gestionnaire</option>
                                        <?php } else { ?>
                                            <option selected><?= $agents['asset_fonction']; ?></option>
                                            <option value="Enseignant">Enseignant</option>
                                            <option value="Prefet">Prefet</option>
                                            <option value="Directeur">Directeur</option>
                                            <option value="Moniteur">Moniteur</option>
                                            <option value="Gestionnaire">Gestionnaire</option>
                                        <?php } ?>
                                    </select>
                                    <span class="text-danger"><?php echo form_error('asset_fonction'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="asset_type" class="control-label"><span class="text-danger">*</span>Type
                                        compte
                                    </label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="asset_type"
                                               value="<?= $agents['asset_type'] ? $agents['asset_type'] : set_value('asset_type'); ?>"/>
                                        <span class="text-danger"><?php echo form_error('asset_type'); ?></span>
                                    </div>
                                    <span class="text-danger"><?php echo form_error('asset_type'); ?></span>
                                </div>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-success" value="Appliquer les modifications">
                        <a href="<?= base_url() . "admin/administrateur/"; ?>" class="btn btn-outline-danger pull-right">
                            <i class="fa fa-close"></i> Annuler
                        </a>
                    </form>
                </div>
            <?php } else { ?>

                <!--
                 ==========================Formulaire de creation d'un nouvel utilisateur==========================
                 -->
                <div class="box-body">
                    <span style="color:red;"><b><?= $this->session->Admin; ?></b></span>
                    <form class="" action="<?= base_url() . 'admin/createAccount' ?>" method="post">
                        <div class="row clearfix mx-2">
                            <div class="col-md-4">
                                <label for="asset_fullname" class="control-label"><span class="text-danger">*</span>Nom
                                    complet
                                    <span data-toggle="tooltip" data-placement="top"
                                          title="Nom, Post-nom et Prénom">
                                          <i class="fa fa-info-circle" aria-hidden="true"></i>
                                    </span>
                                </label>
                                <div class="form-group">
                                    <input type="text" class="form-control text-capitalize" name="asset_fullname"
                                           id="asset_fullname"
                                           value="<?= set_value('asset_fullname') ?>"/>
                                    <span class="text-danger"><?php echo form_error('asset_fullname'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="asset_login" class="control-label"><span class="text-danger">*</span>Nom
                                    utilisateur
                                    <span data-toggle="tooltip" data-placement="top"
                                          title="Nom de connexion (login)">
                                          <i class="fa fa-info-circle" aria-hidden="true"></i>
                                    </span>
                                </label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="asset_login" id="asset_login"
                                           value="<?= set_value('asset_login') ?>"/>
                                    <span class="text-danger"><?php echo form_error('asset_login'); ?></span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="asset_email" class="control-label"><span class="text-danger">*</span>Adresse
                                    Email</label>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="asset_email" id="asset_email"
                                           value="<?= set_value('asset_email') ?>"/>
                                    <span class="text-danger"><?php echo form_error('asset_email'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="asset_fonction" class="control-label"><span class="text-danger">*</span>
                                       Fonction
                                    </label>
                                    <select class="browser-default custom-select select2" name="asset_fonction"
                                            id="asset_fonction">
                                        <option value="Admin">Admin</option>
                                    </select>
                                    <span class="text-danger"><?php echo form_error('asset_fonction'); ?></span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="asset_type" class="control-label"><span class="text-danger">*</span>Type
                                        compte
                                    </label>
                                    <select class="browser-default custom-select" name="asset_type" id="asset_type">
                                        <option value="administrateur">Administrateur</option>
                                    </select>
                                    <span class="text-danger"><?php echo form_error('asset_type'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="asset_password" class="control-label"><span class="text-danger">*</span>Mot
                                    de passe <span data-toggle="tooltip" data-placement="top"
                                                   title="Mot de passe par defaut">
                                          <i class="fa fa-info-circle" aria-hidden="true"></i>
                                    </span></label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="asset_password" value="123456"
                                           id="asset_password"
                                           readonly/>
                                    <span class="text-danger"><?php echo form_error('asset_password'); ?></span>
                                </div>
                            </div>
                            <div class="text-center align-middle mt-4">
                                <input type="submit" class="btn btn-primary" value="Enregistrer">
                                <input type="reset" class="btn btn-danger" value="Annuler">
                            </div>
                        </div>
                    </form>
                </div>
            <?php } ?>
            <div class="card-footer">
                <div class="table-responsive-sm">
                    <!-- Table  -->
                    <table id="dtMaterialDesignExample" class="table table-hover table-striped table-sm">

                        <!-- Table head -->
                        <thead class="blue-grey lighten-3">
                        <tr class="text-uppercase th-sm">
                            <th>#</th>
                            <th class="font-weight-bold">Nom complet</th>
                            <th class="font-weight-bold">Username</th>
                            <th class="font-weight-bold">Fonction</th>
                            <th class="font-weight-bold">Email</th>
                            <th class="font-weight-bold">Derniere login</th>
                            <th class="font-weight-bold">Session</th>
                            <th class="font-weight-bold">Opérations</th>
                        </tr>
                        </thead>
                        <!-- Table head -->

                        <!-- Table body -->
                        <tbody>
                        <?php $line = 1;
                        foreach ($managers as $value) {
                            if ($value->asset_type == 'administrateur') {
                                ?>
                                <tr>
                                    <td><?= $line++; ?></td>
                                    <td class="text-capitalize"><?= $value->asset_fullname; ?></td>
                                    <td class="text-capitalize"><?= $value->asset_login; ?></td>
                                    <td class="text-capitalize"><?= $value->asset_fonction; ?></td>
                                    <td class="">
                                        <a href="mailto:<?= $value->asset_email; ?>"
                                           class="text-lowercase text-danger"><?= $value->asset_email; ?></a></td>
                                    <td><?= $value->asset_last_login; ?></td>
                                    <td class="text-capitalize"><?= ($value->session_ouverte =='oui')? 'Online' : 'Offline'; ?></td>
                                <td>
                                    <a href="<?= base_url() . "admin/reset_agent_password?id_asset=" . $value->asset_id; ?>"
                                       onclick="return confirm('Voulez-vous vraiment réinitialiser le mot de passe de <?= $value->asset_fullname ?>?') ">
                                        <span class="table-edit" data-toggle="tooltip" data-placement="bottom"
                                              title="Cliquer pour reinitialiser le mot de passe">
                                            <button type="button" class="btn-danger btn-rounded btn-sm my-0">
                                                <i class="fa fa-trash"></i></button></span>
                                    </a>
                                    <?php
                                    if ($value->asset_statut == 'online') { ?>
                                        <a href="<?= base_url() . "admin/bloquer_agent?id_asset=" . $value->asset_id ?>"
                                           onclick="return confirm('Voulez-vous vraiment bloquer le compte de <?= $value->asset_fullname ?>?')">
                                        <span class="table-edit" data-toggle="tooltip" data-placement="bottom"
                                              title="Cliquer pour désactiver ce compte utilisateur">
                                            <button type="button" class="btn-warning btn-rounded btn-sm my-0">
                                                <i class="fa fa-lock"></i></button></span>
                                        </a>
                                    <?php } else { ?>
                                        <a href="<?= base_url() . "admin/debloquer_agent?id_asset=" . $value->asset_id ?>"
                                           onclick="return confirm('Voulez-vous vraiment debloquer le compte de <?= $value->asset_fullname ?> ?') ">
                                        <span class="table-edit" data-toggle="tooltip" data-placement="bottom"
                                              title="Cliquer pour activer ce compte utilisateur">
                                            <button type="button" class="btn-primary btn-rounded btn-sm my-0"><i
                                                        class="fa fa-unlock"></i></button></span>
                                        </a>
                                    <?php } ?>
                                    <a href="<?= base_url() . "admin/updateForm/administrateur/" . $value->asset_id ?>">
                                        <span class="table-edit" data-toggle="tooltip" data-placement="bottom"
                                              title="Cliquer pour modifier ce compte utilisateur">
                                            <button type="button" class="btn-success btn-rounded btn-sm my-0"><i
                                                        class="fa fa-edit"></i></button></span>
                                    </a>
                                </td>
                            </tr>
                            <?php
                        }
                        } ?>

                        </tbody>
                        <!-- Table body -->
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
