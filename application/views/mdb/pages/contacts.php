
<!--Main layout-->
<main role="main" class="pt-5 mt-5">
    <!-- Content -->
    <div class="container-fluid mt-5">
        <!-- Mask & flexbox options-->
        <div class="mask d-flex justify-content-center align-items-center">

            <!--Grid row-->
            <div class="row wow fadeIn">

                <!--Grid column-->
                <div class="col-md-6 mb-4 text-dark text-center text-md-left">

                    <h3 class="display-4 font-weight-bold">Contactez-nous</h3>

                    <hr class="hr-light">

                    <p>
                        <strong> Adresse : 533, Route Likasi Commune de Manika Ville de Kolwezi Lualaba/ R.D.Congo</strong>
                    </p>
                    <p>
                        <strong>Téléphone : +243 (0) 9000000000</strong>
                    </p>
                    <p>
                        <strong>Email : <a
                                    href="mailto:mwez.rubuz@congoagile.net">contact@crisclba.org</a></strong>
                    </p>

                    <p class="mb-4 d-none d-md-block">
                        <strong>
                            Envoyer votre message pour tout renseignement sur le fonctionnement de notre organisation
                            et <br>ses differents services. Instantanement, une reponse vous sera restituer.
                            <br>Soit vous pouvez nous trouver via la carte google maps de l'emplacement exacte de L'organisation.
                        </strong>
                    </p>

                </div>
                <!--Grid column-->

                <div class="col-md-6 col-xl-6 float-right pull-right">

                    <!--Card-->
                    <div class="card">

                        <!--Card content-->
                        <div class="card-body">

                            <!-- Form -->
                            <?php echo form_open('contacts/create') ?>
                            <!-- Heading -->
                            <h3 class="dark-grey-text text-center">
                                <strong>Ecrivez-nous</strong>
                            </h3>
                            <hr>

                            <div class="md-form">
                                <i class="fas fa-user prefix grey-text"></i>
                                <input type="text" id="fullname" class="form-control" name="fullname">
                                <label for="fullname">Votre nom complet</label>
                            </div>
                            <div class="md-form">
                                <i class="fas fa-phone prefix grey-text"></i>
                                <input type="text" id="telephone" class="form-control" name="telephone">
                                <label for="telephone">Numero telephone</label>
                            </div>
                            <div class="md-form">
                                <i class="fas fa-envelope prefix grey-text"></i>
                                <input type="email" id="email" class="form-control" name="email">
                                <label for="email">Votre adresse mail</label>
                            </div>
                            <div class="md-form">
                                <i class="fas fa-info-circle prefix grey-text"></i>
                                <input type="text" id="object" class="form-control" name="object">
                                <label for="object">Objet de votre message</label>
                            </div>

                            <div class="md-form">
                                <i class="fas fa-pencil-alt prefix grey-text"></i>
                                <textarea type="text" id="message" class="md-textarea" name="message"></textarea>
                                <label for="message">Votre message</label>
                            </div>

                            <div class="text-center">
                                <button class="btn btn-indigo">Envoyer le message</button>
                            </div>

                            </form>
                            <!-- Form -->

                        </div>

                    </div>
                    <!--/.Card-->

                </div>
                <!--Grid column-->

            </div><!--Grid row-->
            <!--Grid row-->

        </div>
        <!-- Content -->
        <div class="row wow fadeIn mt-3">

            <!--Grid column-->
            <div class="col-md-12 mb-4">

                <div class="card">

                    <!--Google map-->
                    <div id="map-container-google-2" class="z-depth-1-half map-container" style="width: 100%!important; height: 50%!important;">
                        <iframe src="https://maps.google.com/maps?q=chicago&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                frameborder="0"
                                style="border:0" allowfullscreen></iframe>
                    </div>

                    <!--Google Maps-->
                </div>
            </div>
            <!--Grid column-->
        </div>
    </div>
    <!-- Mask & flexbox options-->
</main>
<!-- Full Page Intro -->
