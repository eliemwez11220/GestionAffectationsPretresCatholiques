<div class="row">
    <div class="col-md-12">
        <!-- Heading -->
        <div class="container-fluid">

            <div class="row clearfix">
                <div class="col-sm-6 mb-3">
                    <h5 class="grey-text"> Identiite</h5>
                    <hr>
                    <div style="display: inline!important;">

                        <span class="float-left mr-3">
                         <img src="<?= base_url() . 'assets/uploads/images/' . $this->session->avatar; ?>"
                              alt="Avatar Pretre"
                              class="card-img-100" style="border-radius: 100px!important;">
                    </span>
                        <div class="mt-3 pt-3 ml-2 pl-2">
                            <span class="h3 text-capitalize font-weight-bold"><?= $this->session->fullname; ?></span>
                            <h5 class="">Matricule : <?= $this->session->matricule; ?></h5>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <h5 class="grey-text"> Contact</h5>
                    <hr>
                    <div class="mt-3 pt-3 ml-2 pl-2">
                        <h5><?= $this->session->email; ?></h5>
                        <h5><?= $this->session->phone; ?></h5>
                    </div>
                </div>

                <div class="float-right">
                        <a class="btn btn-danger font-weight-bold" href="" onclick="print_report();"
                           id="box-impression" type="button">Imprimer </a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h3 class="grey-text font-weight-bold"> Mes Affectations </h3>

                    <div class="table-responsive-sm">
                        <!-- Table  -->
                        <table id="dtMaterialDesignExample" class="table table-hover table-striped table-sm">

                            <!-- Table head -->
                            <thead class="unique-color-dark white-text">
                            <tr class="text-uppercase th-sm">
                                <th>#</th>
                                <th class="font-weight-bold">Code</th>
                                <th class="font-weight-bold">Paroisse</th>
                                <th class="font-weight-bold">Localisation</th>
                                <th class="font-weight-bold">Archeveque</th>
                                <th class="font-weight-bold">Date Affectation</th>
                            </tr>
                            </thead>
                            <!-- Table head -->

                            <!-- Table body -->
                            <tbody>
                            <?php $line = 1;
                            foreach ($affectations as $value) { ?>
                                <tr>
                                    <td><?= $line++; ?></td>
                                    <td class="text-capitalize"><?= $value->code_affectation; ?></td>
                                    <td class="text-capitalize"><?= $value->paroisse_nom; ?></td>
                                    <td class="text-capitalize"><?= $value->paroisse_adresse; ?></td>
                                    <td class="text-capitalize"><?= $value->nom_archeveque; ?></td>
                                    <td class="text-capitalize"><?= $value->date_affectation; ?></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                            <!-- Table body -->
                        </table>
                    </div>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <h3 class="grey-text font-weight-bold"> Mes Mouvements </h3>
                    <div class="table-responsive-sm">
                        <!-- Table  -->
                        <table id="dtMaterialDesignExample" class="table table-hover table-striped table-sm">

                            <!-- Table head -->
                            <thead class="unique-color-dark white-text">
                            <tr class="text-uppercase th-sm">
                                <th>#</th>
                                <th class="font-weight-bold">Nom Mouvement</th>
                                <th class="font-weight-bold">Localisation</th>

                                <th class="font-weight-bold">Code</th>
                                <th class="font-weight-bold">Date Affectation</th>
                                <th class="font-weight-bold">Description</th>
                            </tr>
                            </thead>
                            <!-- Table head -->

                            <!-- Table body -->
                            <tbody>
                            <?php $line = 1;
                            foreach ($mouvements as $value) { ?>
                                <tr>
                                    <td><?= $line++; ?></td>

                                    <td class="text-capitalize"><?= $value->mvt_nom; ?></td>
                                    <td class="text-capitalize"><?= $value->mvt_adresse; ?></td>
                                    <td class="text-capitalize"><?= $value->code_affectation; ?></td>
                                    <td class="text-capitalize"><?= $value->date_affectation; ?></td>
                                    <td class="text-capitalize"><?= $value->mvt_resume; ?></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                            <!-- Table body -->
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>