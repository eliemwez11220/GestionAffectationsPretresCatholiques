<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header mb-4 wow fadeIn unique-color text-light">
                <!--Card content-->
                <div class="row d-sm-flex justify-content-between">
                    <div class="col-md-6">
                        <h4 class="pt-1 font-weight-bold">
                            <span>Gestion des communications</span>
                        </h4>
                    </div>
                    <div class="col-md-6">

                    </div>
                </div>
            </div>
            <!-- formulaire des actions supplementaires-->


            <div class="box-body">
                <span style="color:red;"><b><?= $this->session->Admin; ?></b></span>
                <form class="" action="<?= base_url() . 'appMain/sendMessage'; ?>"
                      method="post">
                    <div class="row clearfix mx-2">
                        <div class="col-md-6">
                            <label for="objet" class="control-label"><span class="text-danger">*</span>Objet
                                du message</label>
                            <div class="form-group">
                                <input type="text" class="form-control text-capitalize" name="objet"
                                       value="<?= set_value('objet'); ?>"/>
                                <span class="text-danger"><?php echo form_error('objet'); ?></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="expediteur" class="control-label"><span class="text-danger">*</span>
                                Expediteur</label>
                            <div class="form-group">
                                <input type="text" class="form-control text-capitalize" name="expediteur"
                                       value="<?= ($this->session->fullname !="")?$this->session->fullname:set_value('expediteur'); ?>"/>
                                <span class="text-danger"><?php echo form_error('expediteur'); ?></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="destinataire" class="control-label"><span class="text-danger">*</span>
                                Adresse mail du Destinataire</label>
                            <div class="form-group">
                                <input type="email" class="form-control text-lowercase" name="destinataire"
                                       value="<?= set_value('destinataire'); ?>"/>
                                <span class="text-danger"><?php echo form_error('destinataire'); ?></span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="type_actualite" class="control-label"><span class="text-danger">*</span>
                                    Pretre concerne au message</label>
                                <select class="custom-select" style="width:100%!important"
                                        name="pretre_sid" id="pretre_sid">
                                    <option disabled selected>Choisissez un pretre</option>
                                    <?php foreach ($pretres as $option) : ?>
                                        <option id="<?= $option->pretre_id; ?>"
                                                value="<?= $option->pretre_id; ?>" <?= set_select('pretre_sid', $option->pretre_id); ?>>
                                            <?= $option->nom_prenom_pretre; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <span class="text-danger"><?php echo form_error('pretre_sid'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix mx-2">
                        <div class="col-md-12">
                            <label for="contenu" class="control-label"><span class="text-danger">*</span>Message</label>
                            <div class="form-group">
                                    <textarea class="form-control" name="contenu" cols="30" rows="5"
                                              value="<?= set_value('contenu'); ?>"/></textarea>
                                <span class="text-danger"><?php echo form_error('contenu'); ?></span>
                            </div>
                        </div>

                    </div>
                    <div class="text-center">
                        <input type="submit" class="btn btn-success" value="Envoyer message">
                        <a href="javascript:history.back()" class="btn btn-outline-danger">
                            <i class="fa fa-close"></i> Annuler
                        </a>
                    </div>
                </form>

            </div>
        </div>


        <!-- fin formulaire -->
        <div class="card mt-1">
            <div class="card-body">
                <div class="table-responsive-sm">
                    <!-- Table  -->
                    <table id="dtMaterialDesignExample" class="table table-hover table-striped table-sm">

                        <!-- Table head -->
                        <thead class="unique-color text-light">
                        <tr class="text-uppercase th-sm">
                            <th>#</th>
                            <th class="font-weight-bold">Titre message</th>
                            <th class="font-weight-bold">Contenu message</th>
                            <th class="font-weight-bold">Expediteur</th>
                            <th class="font-weight-bold">Destinateur</th>
                            <th class="font-weight-bold">Date et heure creation</th>
                        </tr>
                        </thead>
                        <!-- Table head -->

                        <!-- Table body -->
                        <tbody>
                        <?php $line = 1;
                        foreach ($lettres as $value) { ?>
                            <tr>
                                <td><?= $line++; ?></td>
                                <td class="text-capitalize"><?= $value->lettre_objet; ?></td>
                                <td class="text-capitalize"><?= $value->lettre_contenu; ?></td>
                                <td class="text-capitalize"><?= $value->expediteur; ?></td>
                                <td class="text-capitalize"><?= $value->destinateur; ?></td>
                                <td class="text-capitalize"><?= $value->lettre_datecreation; ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                        <!-- Table body -->
                    </table>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
