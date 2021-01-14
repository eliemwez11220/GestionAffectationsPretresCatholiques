
<footer class="page-footer font-small unique-color-dark darken-2 mt-5 ">
    <!-- Social icons -->
    <div class="footer-copyright py-3">
        <div class="float-left text-left ml-3">
            <small>Emission speciale Sans Tabou en <br>Republique Democratique du Congo.</small>
        </div>
        <div class="text-right  mr-3">
            <small>Powered by <a href="https://www.congoagile.net" target="_blank"> Congo Agile High-Tech Teams</a>.
                Informatique Vision Totale
            </small>
            <p style="letter-spacing: 1px;text-align: right;margin-top: -5px;font-size: 10px;margin-bottom: -1px">
                © 2020 -
                <script>document.write(new Date().getFullYear());</script>
                , Agile Application et son logo sont des marques déposées de <br>Congo Agile High-Tech, Inc.
            </p>
        </div>
    </div>
    <!--/.Copyright-->
    <!-- Social icons -->
</footer>

<div class="modal fade right" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-right modal-notify modal-info text-light modal-full-height" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="heading lead font-weight-bold text-uppercase">Ecrivez-nous</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
            $tb = mb_split("/", current_url());
            $redirect = "";
            for ($i = 2; $i < count($tb); $i++) {
                $redirect = $redirect . $tb[$i] . "/";
            }
            ?>
            <form class="" action="<?= base_url() . 'admin/aide_super_admin'; ?>" method="post">

                <div class="modal-body">
                    <div class="md-form">
                        <i class="fas fa-user prefix grey-text"></i>
                        <input type="text" id="form34" name="name" class="form-control validate text-capitalize"
                               value=" <?= $this->session->fullname ?>">
                        <label data-error="nom invalide" data-success="correct" for="form34">Votre nom complet</label>
                    </div>

                    <div class="md-form mb-5">
                        <i class="fas fa-envelope prefix grey-text"></i>
                        <input type="email" id="form29" name="email" class="form-control validate"
                               value=" <?= $this->session->email ?>">
                        <label data-error="Votre addresse email est incorrecte" data-success="correct" for="form29">Votre
                            adresse email</label>
                    </div>
                    <!---->
                    <div class="md-form mb-5">
                        <i class="fas fa-tag prefix grey-text"></i>
                        <input type="text" id="form32" name="subject" class="form-control validate">
                        <label data-error="" data-success="correct" for="form32">Sujet</label>
                    </div>
                    <!---->
                    <div class="md-form">
                        <i class="fa fa-pencil prefix grey-text"></i>
                        <textarea type="text" id="form8" name="issue" class="md-textarea form-control"
                                  rows="4"></textarea>
                        <label data-error="" data-success="correct" for="form8">Decrivez votre problème</label>
                    </div>

                </div>
                <div class="modal-footer d-flex">
                    <input type="submit" class="btn btn-danger btn-block" value="Envoyer">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Full Height Modal Right Success Demo-->
<div class="modal fade right" id="fluidModalRightSuccessDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <p class="heading lead">Guide administrateur</p>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>

            <!--Body-->
            <div class="modal-body">
                <div class="card-body">
                    <p class="text-justify">
                        <strong class="font-weight-bold">TokDoc Monganga</strong> est une Application Web
                        conçue pour la gestion de différentes opérations
                        et activités liées au fonctionnement d'un cabinet medical en Republique Democratique du Congo.
                        Nous la mettons à la dispositions des utilisateurs ayant été crées par l'administrateur du site
                        afin qu'ils mettent
                        en ligne les activités de l'entreprise.
                        Pour les mesures d'utilisabilité, nous avons jugé bon de rendre cette application fonctionnelle
                        sur les formats des
                        ecrans des ordinateurs ou bien sur les tablettes ou encore sur vos smartphones.
                        Chaque utilisateur aura devant son écran un affichage personnalisé selon son rôle, cela
                        s'inscrit de nouveau dans les mesures
                        prises pour la sécurité de nos informations.
                        <br><br>
                        Pour commencer, vous devriez à votre première connexion à l'application modifier ou mettre à
                        jour vos informations personnelles
                        et surtout votre mot de passe car l'administrateur vous a octroyé un mot de passe par défaut qui
                        n'est pas sûr et sécurisé.
                        Pour ce faire, vous devez cliquer sur l'option <strong>Mon compte</strong> puis en bas de votre
                        photo de profile vous cliquez sur votre nom,
                        un formulaire devrait s'afficher, et là vous pouvez faire toutes les modifications possibles sur
                        votre compte,
                        enfin vous cliquez sur le bouton <strong>Modifier</strong>. Et voilà le tour sera bien joué.
                        <br><br>
                        Pour les activités de publications, nous tenons à vous informer qu'à chaque fois que vous
                        effectuer une publication,
                        cette dernière ne va pas directement être publiée, elle sera classée dans le brouillon en
                        attendant que le coordonnateur la valide
                        et la publie.
                        Seul le Gestionnaire des activités peut créer, modifier ou supprimer les publications;
                        L'administrateur du site seul est habile d'ajouter de nouveaux utilisateurs et changer leur
                        statut.
                    </p>
                </div>
                <hr>
                <ul class="list-group z-depth-0">
                    <li class="list-group-item justify-content-between">
                        Cras justo odio
                        <span class="badge badge-primary badge-pill">14</span>
                    </li>
                    <li class="list-group-item justify-content-between">
                        Dapibus ac facilisis in
                        <span class="badge badge-primary badge-pill">2</span>
                    </li>
                    <li class="list-group-item justify-content-between">
                        Morbi leo risus
                        <span class="badge badge-primary badge-pill">1</span>
                    </li>
                </ul>
            </div>

            <!--Footer-->
            <div class="modal-footer justify-content-center">
                Avez-vous un probleme de manipulation ?
                <a class="btn btn-outline-success waves-effect" data-dismiss="modal"
                   href="mailto:eliemwez.rubuz@gmail.com">Signaler-le</a>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!-- Full Height Modal Right Success Demo-->
<!-- GroceryCRUD load js fils -->
<?php
if (isset($output)) {
    foreach ($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach;
}else{ ?>
    <!-- JQuery -->
    <script type="text/javascript" src="<?= base_url('resources/') ?>back/js/jquery-3.4.1.min.js"></script>
<?php } ?>

<!-- SCRIPTS -->

<!-- Bootstrap tooltips -->
<script type="text/javascript" src="<?= base_url('resources/') ?>back/js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="<?= base_url('resources/') ?>back/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="<?= base_url('resources/') ?>back/js/mdb.min.js"></script>

<script type="text/javascript" src="<?= base_url(); ?>resources/plugins/js/main.js"></script>
<script type="text/javascript" src="<?= base_url('resources/') ?>plugins/js/alert.js"></script>
<script type="text/javascript" src="<?= base_url('resources/') ?>plugins/js/alert-index.js"></script>
<script type="text/javascript" src="<?= base_url('resources/') ?>plugins/js/select2.min.js"></script>
<!-- Initializations -->
<script type="text/javascript">
    // Animations initialization
    new WOW().init();

    //for mobile navigation in the sidebar
    $(document).ready(function () {
        // SideNav Button Initialization
        $(".button-collapse").sideNav();
        // SideNav Scrollbar Initialization
        var sideNavScrollbar = document.querySelector('.custom-scrollbar');
        var ps = new PerfectScrollbar(sideNavScrollbar);
    });
    $(document).ready(function () {
        // Show sideNav
        $('.button-collapse').sideNav('show');
        // Hide sideNav
        $('.button-collapse').sideNav('hide');
    });
</script>


<!--Google Maps-->
<script src="https://maps.google.com/maps/api/js"></script>
<script>
    // Regular map
    function regular_map() {
        var var_location = new google.maps.LatLng(40.725118, -73.997699);

        var var_mapoptions = {
            center: var_location,
            zoom: 14
        };

        var var_map = new google.maps.Map(document.getElementById("map-container"),
            var_mapoptions);

        var var_marker = new google.maps.Marker({
            position: var_location,
            map: var_map,
            title: "New York"
        });
    }

    new Chart(document.getElementById("horizontalBar"), {
        "type": "horizontalBar",
        "data": {
            "labels": ["Red", "Orange", "Yellow", "Green", "Blue", "Purple", "Grey"],
            "datasets": [{
                "label": "My First Dataset",
                "data": [22, 33, 55, 12, 86, 23, 14],
                "fill": false,
                "backgroundColor": ["rgba(255, 99, 132, 0.2)", "rgba(255, 159, 64, 0.2)",
                    "rgba(255, 205, 86, 0.2)", "rgba(75, 192, 192, 0.2)",
                    "rgba(54, 162, 235, 0.2)",
                    "rgba(153, 102, 255, 0.2)", "rgba(201, 203, 207, 0.2)"
                ],
                "borderColor": ["rgb(255, 99, 132)", "rgb(255, 159, 64)", "rgb(255, 205, 86)",
                    "rgb(75, 192, 192)", "rgb(54, 162, 235)", "rgb(153, 102, 255)",
                    "rgb(201, 203, 207)"
                ],
                "borderWidth": 1
            }]
        },
        "options": {
            "scales": {
                "xAxes": [{
                    "ticks": {
                        "beginAtZero": true
                    }
                }]
            }
        }
    });
    // Material Design example
    $(document).ready(function () {
        $('#dtMaterialDesignExample').DataTable();
        $('#dtMaterialDesignExample_wrapper').find('label').each(function () {
            $(this).parent().append($(this).children());
        });
        $('#dtMaterialDesignExample_wrapper .dataTables_filter').find('input').each(function () {
            const $this = $(this);
            $this.attr("placeholder", "Recherche ...");
            $this.className("form-control-lg");
            $this.removeClass('form-control-sm');
        });
        $('#dtMaterialDesignExample_wrapper .dataTables_length').addClass('d-flex flex-row');
        $('#dtMaterialDesignExample_wrapper .dataTables_filter').addClass('md-form');
        $('#dtMaterialDesignExample_wrapper select').removeClass(
            'custom-select custom-select-sm form-control form-control-sm');
        $('#dtMaterialDesignExample_wrapper select').addClass('mdb-select');
        $('#dtMaterialDesignExample_wrapper .mdb-select').materialSelect();
        $('#dtMaterialDesignExample_wrapper .dataTables_filter').find('label').remove();
    });
    $('#demoDate').datepicker({
        format: "dd/mm/yyyy",
        autoclose: true,
        todayHighlight: true
    });

    $('#demoSelect').select2();

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', {'placeholder': 'dd/mm/yyyy'})
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', {'placeholder': 'mm/dd/yyyy'})
    //Money Euro
    $('[data-mask]').inputmask()

</script>
</body>
</html>
