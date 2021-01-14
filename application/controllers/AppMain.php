<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class AppMain extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();

        #Charge all models
        $this->load->model('Secure_model');
        $this->load->model('App_model');

        #GroceryCRUD Librairie loading
        $this->load->library('grocery_CRUD');
        #function primary
        $this->last_connexion();
        $this->is_logged();
    }

    private function is_logged()
    {
        if (!$this->session->logged) {
            // code...
            return redirect(base_url() . 'secure');
        }
    }

    //mettre a jour la date de derniere connexion
    private function last_connexion()
    {
        if ($this->session->logged) {
            // code...
            $date_connect = date('Y-m-d H:s:i');
            $data = array(
                'asset_last_login' => $date_connect,
                'session_ouverte' => 'oui',
            );
            // update
            $id = $this->session->id;
            $this->App_model->update_data($data, 'tb_ca_assets', array('asset_id' => $id));
        }
    }

    #===================================deconnexon - fermeture de session===========================================
    public function logout()
    {
        $data = array(
            'session_ouverte' => 'non',
        );
        // update
        $id = $this->session->id;
        $this->App_model->update_data($data, 'tb_ca_assets', array('asset_id' => $id));

        $this->session->sess_destroy();
        return redirect(base_url() . 'secure/');
    }

    public function index()
    {
        //chargement du tableau de bord
        $this->dashboard();
    }

    public function dashboard()
    {
        //set page title
        $data['title'] = "Tableau de bord users";
        $data['view'] = 'grocerycrud/users_office/dashboard/index';
        $this->load->view('grocerycrud/users_office/users_main', $data);
    }

    /**
     *@ Home function
     */
    public function _menu_sortie($output = null)
    {
        //load view main
        $this->load->view('grocerycrud/users_office/users_main.php', (array)$output);
    }

    //Show megamain page with css and js files
    public function megamain_management()
    {
        //affichage des operations des agents
        $this->_menu_sortie((object)array('output' => '', 'js_files' => array(), 'css_files' => array()));
    }
    #---------------function for parameter
    //table without foreign key constraint references - manage provinces
    public function pretres()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('tb_aff_pretres');
        $crud->set_subject('Pretre');
        $crud->set_field_upload('photo_pretre', 'assets/uploads/images');
        $crud->unset_clone();
        $crud->unset_delete();
        $output = $crud->render();
        $this->_menu_sortie($output);
    }

    public function pretresReadonly()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('tb_aff_pretres');
        $crud->set_subject('Pretre');
        $crud->set_field_upload('photo_pretre', 'assets/uploads/images');

        $crud->unset_clone();
        $crud->unset_edit();
        $crud->unset_add();
        $crud->unset_delete();
        $output = $crud->render();
        $this->_menu_sortie($output);
    }

    //Manage cabinet medical data
    public function paroisses()
    {
        //create object from grocerycrud librairie
        $crud = new grocery_CRUD();
        //set table name
        $crud->set_table('tb_aff_paroisses');
        $crud->set_subject('Paroisse');
        $crud->unset_clone();
        $crud->unset_delete();
        $output = $crud->render();
        //redirect to megamain page
        $this->_menu_sortie($output);
    }  //Manage cabinet medical data

    public function paroissesReadonly()
    {
        //create object from grocerycrud librairie
        $crud = new grocery_CRUD();
        //set table name
        $crud->set_table('tb_aff_paroisses');
        $crud->set_subject('Paroisse');
        $crud->unset_clone();
        $output = $crud->render();
        //redirect to megamain page
        $this->_menu_sortie($output);
    }

    //Manage cabinet medical data
    public function affectations()
    {
        //create object from grocerycrud librairie
        $crud = new grocery_CRUD();
        //set table name
        $crud->set_table('tb_aff_affectations');
        $crud->set_subject('Affectation');//rename table to display in page
        //set relation for foreign key id and display the name of field - first table
        $crud->set_relation('paroisse_concernee', 'tb_aff_paroisses', 'paroisse_nom');
        $crud->display_as('paroisse_id', 'Paroisse');

        //set relation for foreign key id and display the name of field - second table
        $crud->set_relation('pretre_concerne', 'tb_aff_pretres', 'nom_prenom_pretre');
        $crud->display_as('pretre_id', 'Pretre');

        $crud->set_field_upload('piece_jointe', 'assets/uploads/files');
        $crud->unset_clone();
        $crud->unset_delete();
        //show all data in array and display then on megamain page

        $output = $crud->render();
        //redirect to megamain page
        $this->_menu_sortie($output);
    }

    public function affectationsReadonly()
    {
        //create object from grocerycrud librairie
        $crud = new grocery_CRUD();
        //set table name
        $crud->set_table('tb_aff_affectations');
        $crud->set_subject('Affectation');//rename table to display in page
        //set relation for foreign key id and display the name of field - first table
        $crud->set_relation('paroisse_concernee', 'tb_aff_paroisses', 'paroisse_nom');
        $crud->display_as('paroisse_id', 'Paroisse');

        //set relation for foreign key id and display the name of field - second table
        $crud->set_relation('pretre_concerne', 'tb_aff_pretres', 'nom_prenom_pretre');
        $crud->display_as('pretre_id', 'Pretre');

        $crud->set_field_upload('piece_jointe', 'assets/uploads/files');

        $crud->unset_clone();
        $crud->unset_edit();
        $crud->unset_add();
        $crud->unset_delete();
        $output = $crud->render();
        //redirect to megamain page
        $this->_menu_sortie($output);
    }

    public function mouvements()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('tb_aff_mouvements');
        $crud->set_subject('Mouvement');//rename table to display in page
        //set relation for foreign key id and display the name of field - first table
        $crud->set_relation('affectation_code', 'tb_aff_affectations', 'code_affectation');
        $crud->display_as('affect_id', 'Affectation');

        $crud->unset_delete();
        $crud->unset_clone();
        $output = $crud->render();
        $this->_menu_sortie($output);
    }

    public function mouvementsReadonly()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('tb_aff_mouvements');
        $crud->set_subject('Mouvement');//rename table to display in page
        //set relation for foreign key id and display the name of field - first table
        $crud->set_relation('affectation_code', 'tb_aff_affectations', 'code_affectation');
        $crud->display_as('code_affectation', 'Affectation');

        $crud->unset_clone();
        $crud->unset_edit();
        $crud->unset_add();
        $crud->unset_delete();
        $output = $crud->render();
        $this->_menu_sortie($output);
    }

    public function lettresReadonly()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('tb_aff_lettres');
        $crud->set_subject('Lettre');
        $crud->set_relation('pretre_sid', 'tb_aff_pretres', 'nom_prenom_pretre');
        $crud->display_as('pretre_id', 'Pretre');
        $crud->unset_clone();
        $crud->unset_edit();
        $crud->unset_add();
        $crud->unset_delete();
        $output = $crud->render();
        $this->_menu_sortie($output);
    }


    /**
     * change password user and admin
     */
    public function changePassword()
    {
        $id = $this->session->id;
        $data['agents'] = $this->App_model->get_onces($id, 'tb_ca_assets', 'asset_date_created');

        $data['title'] = "Modification du mot de passe utilisateur";

        $data['view'] = 'grocerycrud/users_office/profil/change_password';
        $this->load->view('grocerycrud/users_office/users_main', $data);
    }

    /**
     * @param $type
     * user profil
     */
    public function monProfil()
    {
        $id = $this->session->id;
        $data['agents'] = $this->App_model->get_onces($id, 'tb_ca_assets', 'asset_date_created');

        $data['title'] = "Gestion du profil";
        $data['view'] = 'grocerycrud/users_office/profil/index';
        $this->load->view('grocerycrud/users_office/users_main', $data);
    }

    /**
     *@ Add form data
     */
    public function addForm($type = null, $page = null)
    {
        #=================forms information======================
        //$type = $this->session->type;
        $data['title'] = "create $type/$page";

        $data['view'] = 'grocerycrud/users_office/' . $type . '/' . $page;
        $this->load->view('grocerycrud/users_office/users_main', $data);
    }

    /**
     *@ Update data
     */
    public function updateForm($types = null, $page = null)
    {

        #=======================forms update data====================
        $id = $this->uri->segment(5);
        $type = $this->uri->segment(3) ?? $this->session->type;
        //infos sessions utilisateurs for edit

        $data['managers'] = $this->App_model->get('tb_ca_assets', 'asset_date_created')->result();

        $data['type_liste'] = "Liste de $type";
        $data['title'] = "update $type";

        if ($types != '') {
            $data['view'] = 'grocerycrud/users_office/' . $type . '/' . $page;
        } else {
            $data['view'] = 'grocerycrud/users_office/' . $type . '/index' . $page;
        }
        $this->load->view('grocerycrud/users_office/users_main', $data);
    }

    /**
     *@ Add an agent
     */
    public function lettres()
    {
        $data['title'] = "Gestion des communications";

        $data['pretres'] = $this->App_model->get('tb_aff_pretres', 'nom_prenom_pretre')->result();
        $data['affectations'] = $this->App_model->get('tb_aff_affectations', 'code_affectation')->result();
        $data['lettres'] = $this->App_model->get('tb_aff_lettres', 'lettre_objet')->result();

        $data['view'] = 'grocerycrud/users_office/lettres/index';
        $this->load->view('grocerycrud/users_office/users_main', $data);
    }

    //lancer avis
    public function sendMessage()
    {
        $data['title'] = "Creation compte utilisateur";

        $this->form_validation->set_rules('objet', 'objet', 'required', array(
            'required' => 'Le titre est obligatoire',
        ));

        $this->form_validation->set_rules('contenu', 'contenu', 'required', array(
            'required' => 'Le contenu est obligatoire',
        ));
        $this->form_validation->set_rules('expediteur', 'expediteur', 'required', array(
            'required' => 'Expediteur obligatoire',
        ));
        $this->form_validation->set_rules('destinataire', 'destinataire', 'required', array(
            'required' => 'Destinataire obligatoire',
        ));

        $id = $this->uri->segment(4);
        $type = $this->uri->segment(3);

        # verifie if datas are corrects and redirect
        if ($this->form_validation->run() && $this->input->post('contenu') != "" && $this->input->post('objet') != "") {

            $objet = trim(strtolower($this->input->post('objet')));
            $contenu = trim(strtolower($this->input->post('contenu')));
            $destinataire = trim(strtolower($this->input->post('destinataire')));
            $expediteur = trim(strtolower($this->input->post('expediteur')));
            $pretre_concerne = trim(strtolower($this->input->post('pretre_sid')));

            //Mise en tableau des informations du compte a créé
            $data = array(
                'lettre_objet' => $objet,
                'lettre_contenu' => $contenu,
                'expediteur' => $expediteur,
                'destinateur' => $destinataire,
                'pretre_sid' => $pretre_concerne,
            );
            //mise en session de donnees
            $this->session->set_userdata($data);

            $this->App_model->insert_data($data,'tb_aff_lettres');
            $this->setNotifie("Votre message contenant dans la lettre a ete lancé avec succès !", 'success');
            //envoi de la notification à l'utilisateur du compte créé
            $username = $this->session->fullname;

            $this->sendNotification($username, $objet, $contenu, $destinataire, $expediteur);

            return redirect(base_url() . 'appMain/lettres');

        } else {

            $this->setNotifie('Erreur de lancement du message en raison système');
            $this->session->set_flashdata('type', 'lettres');
            $this->addForm();
        }
    }
    #======================================================================================================
    #============================envoi des mails de creation des comptes==================================

    public function sendNotification($username, $subject, $content, $emaildestinataire, $emailexpediteur)
    {
        require_once APPPATH . 'PHPMailer/src/Exception.php';
        require_once APPPATH . 'PHPMailer/src/PHPMailer.php';
        require_once APPPATH . 'PHPMailer/src/SMTP.php';
        $from = "";
        $cc1 = "";
        $addresses = mb_split(";", $emailexpediteur);
        if (count($addresses) > 1) {
            $from = $addresses[0];
            $cc1 = $addresses[1];
        } else {
            $from = $emaildestinataire;
        }
        $mail = new PHPMailer(TRUE);
        try {
            $mail->setFrom('admin@congoagile.com', 'Affectation Application');
            $mail->addAddress($from, $emaildestinataire);
            if (count($addresses) > 1) {
                $mail->addCC($cc1);
            }
            $mail->addCC('contact@congoagile.com', 'Affectation Management Application');
            //$mail->addCC('info@congoagile.net', 'Webmaster IT Support');
            $mail->Subject = $subject;

            $mail->isHTML(true);

            $mail->CharSet = 'UTF-8';

            $mail->Body = '<html><strong>Voici la notification envoyee par notre l\'utilisateur ' . $username . ' dont son adresse mail 
                        est la suivante ' . $emailexpediteur . ' <br/></strong>
            au sujet de ' . $subject . '<br/>.
            <strong> Veuillez trouver ci-dessous les details ci-apres  <br/>
            ' . $content . '<br/></strong>
            <p> Veuillez suivre le lien ci-après pour vous connecter a .</p><a href="https://affectation.congoagile.com"> 
            Affectation Management Application.</a></html>';

            /* SMTP parameters. */

            $mail->isSMTP();

            /* SMTP server address. */
            $mail->Host = 'mail.congoagile.com';

            /* Use SMTP authentication. */
            $mail->SMTPAuth = TRUE;

            /* Set the encryption system. */
            $mail->SMTPSecure = 'tls';

            /* SMTP authentication username. */
            $mail->Username = 'admin@congoagile.com';

            /* SMTP authentication password. */
            $mail->Password = 'congoagile2020';

            /* Set the SMTP port. */
            $mail->Port = 587;
            //$mail->Port = 465;

            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            /* Finally send the mail. */
            //$mail->send();
            //return $redirect;
            if (!$mail->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                echo 'Message has been sent';
            }

        } catch (Exception $e) {
            //return $redirect;
            //echo $e->errorMessage();
        }
    }
}