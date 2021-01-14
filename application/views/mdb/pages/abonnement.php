
<!--Main layout-->
<main role="main" class="pt-5 mt-5">
    <!-- Content -->
    <div class="container pt-5">
        <!-- Mask & flexbox options-->

        <form action="<?= site_url('secure/adminAccount'); ?>" method="post">

            <div class="font-weight-bold">
                <h5 class="font-weight-bold text-center">Formulaire d'inscription.</h5>
                <p class="text-justify">
                    Remplissez le formulaire ci-dessous pour pouvoir benefier de nos conseils experts avec de sujets
                    pertinents de la vie professionnelle
                    quotidienne avec des informations basiques pour vous permettre de rejoindre la plus grande
                    communaute de personnes
                    qui cherchent a booster leurs activites par une publication de leurs produits et serrvices et divers.
                   Vous pourrez les modifier par la suite
                        un peu plus tard !

                </p>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label" id="nom"><span class="text-danger">*</span>Votre nom </label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-user"></i></div>
                                </div>
                                <input type="text" name="nom" id="nom"
                                       value="<?= set_value('nom'); ?>"
                                       placeholder="Nom de famille"
                                       class="form-control text-capitalize<?= (form_error('nom')) ? 'is-invalid' : '' ?>"
                                       autofocus>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label" id="prenom"><span class="text-danger">*</span>Votre prenom </label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-user"></i></div>
                                </div>
                                <input type="text" name="prenom" id="prenom"
                                       value="<?= set_value('prenom'); ?>"
                                       placeholder="Prenom de famille"
                                       class="form-control text-capitalize<?= (form_error('prenom')) ? 'is-invalid' : '' ?>"
                                       autofocus>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label"><span class="text-danger">*</span>Choisissez votre Pseudonyme (login) </label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-user-circle"></i></div>
                                </div>
                                <input type="text" name="username" id="username"
                                       value="<?= set_value('usename'); ?>"
                                       placeholder="Login de connexion"
                                       class="form-control <?= (form_error('username')) ? 'is-invalid' : '' ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label"><span class="text-danger">*</span> Votre adresse email </label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i>@</i></div>
                                </div>
                                <input type="email" name="email" id="email" value="<?= set_value('email'); ?>"
                                       placeholder="Adresse e-mail"
                                       class="form-control <?= (form_error('email')) ? 'is-invalid' : '' ?>">
                            </div>
                        </div>
                    </div><div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Votre numero de telephone (optionnelle)</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-phone"></i></div>
                                </div>
                                <input type="text" name="telephone" id="telephone" value="<?= set_value('telephone'); ?>"
                                       placeholder="Ex: +243 977 090 011"
                                       class="form-control <?= (form_error('telephone')) ? 'is-invalid' : '' ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Quelle est votre profession ? (optionnelle)</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-graduation-cap"></i></div>
                                </div>
                                <input type="text" name="profession" id="profession" value="<?= set_value('profession'); ?>"
                                       placeholder="Votre travail actuel"
                                       class="form-control <?= (form_error('profession')) ? 'is-invalid' : '' ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label" id="etat_civil"><span class="text-danger">*</span>Quelle est votre etat-civil ?</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-gear"></i></div>
                                </div>
                                <select name="etat_civil" id="etat_civil" class="custom-select">
                                    <option value="Marie">Marie (e)</option>
                                    <option value="Celibataire">Celibataire</option>
                                    <option value="Divorce">Divorce (e)</option>
                                    <option value="Veuf">Veuf (ve)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label" id="etat_civil"><span class="text-danger">*</span>Quelle est votre sexe ?</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-gear"></i></div>
                                </div>
                                <select name="sexe" id="sexe" class="custom-select">
                                    <option value="Homme">Homme</option>
                                    <option value="Femme">Femme</option>
                                    <option value="Autre">Autre</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label"><span class="text-danger">*</span>Creer un mot de passe zipper</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-key"></i></div>
                                </div>
                                <input type="password" name="password" id="password"
                                       placeholder="Créer votre mot de passe"
                                       class="form-control <?= (form_error('mot_de_passe')) ? 'is-invalid' : '' ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label"><span class="text-danger">*</span>Confirmer votre mot de passe pour eviter les erreurs de saisies</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-key"></i></div>
                                </div>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                       placeholder="Confirmer votre mot de passe créé"
                                       class="form-control <?= (form_error('password_confirmation')) ? 'is-invalid' : '' ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="control-label" id="biographie">Breve description sur vous ! (optionnelle)</label>
                            <textarea name="biographie" id="biographie" cols="30" rows="5" class="form-control"
                                      placeholder="Parlez-nous de vous"></textarea>
                        </div>
                    </div>
                    <!-- second column -->

                </div>
                <div class="text-center">
                    <hr>
                    <p class="h6">
                        En creant votre compte personnel pour l'utilisation de notre emission,
                        vous acceptez nos <a href="">termes et conditions d'utilisation</a> de donnees personnelles et
                        les
                        <a href="">regles de confidentialites</a> regies par la communaute pour le bon fonctionnement de notre
                        plateforme.
                        Veuillez cocher la case ci-dessous si vous etes d'accord.
                    </p>
                    <fieldset class="form-check">
                        <input type="checkbox" class="form-check-input" id="checkbox1">
                        <label for="checkbox1" class="form-check-label dark-grey-text">
                            Oui, j'ai lu et j'accepte !
                        </label>
                    </fieldset>
                    <button type="submit" name="submit" class="btn btn-primary">
                        Créer votre compte
                    </button>
                </div>

            </div>
        </form>

    </div>
    <!-- Mask & flexbox options-->
</main>
<!-- Full Page Intro -->
