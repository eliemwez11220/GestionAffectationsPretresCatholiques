<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();
        // verifie of login
        $this->is_logged();
        // charge all models
        $this->load->model('Secure_model');
        $this->load->model('App_model');
        //derniere connexion prise en compte
        $this->last_connexion();

        #GroceryCRUD Librairie loading
        $this->load->library('grocery_CRUD');
    }
    /**
     *@ Check is admin is logged
     */
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
            $date_connect=date('Y-m-d H:s:i');
            $data = array(
                'asset_last_login' => $date_connect,
                'session_ouverte' => 'oui',
            );
            // update
            $id = $this->session->id;
            $this->App_model->update_data($data, 'tb_ca_assets',  array('asset_id' => $id));
        }
    }

    public function index(){
        //chargement du tableau de bord
        $this->dashboard();
    }
    ########################################   *   ########################################
    #
    #						    # DASHBORAD FUNCTIONS
    #
    ########################################   *   ########################################

    public function dashboard()
    {
        //set page title
        $data['title'] = "Page de demarrage menu administrateur";
        //show all users
        $data['managers'] = $this->App_model->get('tb_ca_assets', 'asset_date_created')->result();
        $data['view'] = 'grocerycrud/admin_office/dashboard/index';
        $this->load->view('grocerycrud/admin_office/admin_main', $data);
    }

    ########################################   *   ########################################
    #
    #								 # AGENT FUNCTIONS
    #
    ########################################   *   ########################################

    /**
     *@ List of agents and admin
     */
    public function adminsAccount()
    {
        $data['title'] = "Simple Admin";
        //show all users
        $data['managers'] = $this->App_model->get('tb_ca_assets', 'asset_date_created')->result();
        $data['view'] = 'grocerycrud/admin_office/comptes/allAdmins';
        $this->load->view('grocerycrud/admin_office/admin_main', $data);
    }
    /**
     *@ List of agents and admin
     */
    public function usersAccount()
    {
        $data['title'] = "Gestion comptes utilisateurs";
        //show all users
        $data['managers'] = $this->App_model->get('tb_ca_assets', 'asset_date_created')->result();
        $data['view'] = 'grocerycrud/admin_office/comptes/allUsers';
        $this->load->view('grocerycrud/admin_office/admin_main', $data);
    }

    /**
     *@ Add an agent
     */
    public function createAccount()
    {
        //recupere infos users existants

        $data['managers'] = $this->App_model->get('tb_ca_assets', 'asset_date_created')->result();

        $data['title'] = "Creation compte utilisateur";

        //validate user fullname
        $this->form_validation->set_rules('asset_fullname', 'asset_fullname', 'required', array(
            'required' => 'Le nom complet est obligatoire',
        ));
        $this->form_validation->set_rules('asset_login', 'asset_login', 'required', array(
            'required' => 'Le login est obligatoire',
        ));

        $this->form_validation->set_rules('asset_email', 'asset_email', 'required', array(
            'required' => 'L\'email est obligatoire',
        ));

        $this->form_validation->set_rules('asset_password', 'asset_password', 'required', array(
            'required' => 'Le mot de passe est obligatoire',
        ));
        $this->form_validation->set_rules('asset_type', 'asset_type', 'required', array(
            'required' => 'Le role est obligatoire',
        ));
        $this->form_validation->set_rules('asset_fonction', 'asset_fonction', 'required', array(
            'required' => 'La fonction est obligatoire',
        ));
        //recuperer le type de compte a creer
        $type_compte=$this->uri->segment(2);
        # verifie if datas are corrects and redirect
        if ($this->form_validation->run() && $this->input->post('asset_type') != "" && $this->input->post('asset_email') != "") {

            $asset_fullname = trim(strtolower($this->input->post('asset_fullname')));
            $asset_login = trim(strtolower($this->input->post('asset_login')));
            $asset_email = trim(strtolower($this->input->post('asset_email')));
            $user_password_default = $this->input->post('asset_password');

            //Recuperer tous les utilisateurs par leurs username pour eviter le doublon
            $user_existant = $this->App_model->get_existant('tb_ca_assets','asset_fullname',$asset_fullname);

            //Infos utilisateurs existant
            $username_db = '';
            $usermail_db = '';
            if (!empty($user_existant)) {
                //Compte utilisateur existant
                $userdata = array(
                    'asset_fullname' => $user_existant->asset_fullname,
                    'asset_login' => $user_existant->asset_login,
                    'asset_email' => $user_existant->asset_email,
                    'asset_password' => $user_existant->asset_password
                );
                $username_db = $user_existant->asset_fullname;
                $usermail_db = $user_existant->asset_email;
            }

            //|| ($user_existant->asset_email == $user_mail)
            if (($username_db == $asset_fullname) || ($usermail_db == $asset_email)) {
                $this->setNotifie("L'utilisateur $asset_fullname ayant l'adresse e-mail $asset_email existe déjà. 
                Veuillez reessayer un autre");
                // redirection

                return redirect(base_url() . 'admin/'.$type_compte);
            } else {
                //ajout des elements à l'algorithme de cryptage.
                $options = array(
                    'cost' => 12,
                );
                //Mise en tableau des informations du compte a créé
                $data = array(
                    'asset_fullname' => $asset_fullname,
                    'asset_login' => $asset_login,
                    'asset_password' => password_hash($this->input->post('asset_password'), PASSWORD_BCRYPT, $options),
                    'asset_email' => $asset_email,
                    'asset_type' => $this->input->post('asset_type'),
                    'asset_role' => 'simple',
                    'asset_fonction' => $this->input->post('asset_fonction'),
                );
                // insert datas in database
                $this->App_model->insert_data($data, 'tb_ca_assets');
                $this->setNotifie("Le compte utilisateur de $asset_fullname a été créé avec succès", 'success');
                //envoi de la notification à l'utilisateur du compte créé

                //$this->sendIdentifiantConnexion($user_mail, $user_name, $user_password_default,
                    //"Vos identifiants de connexion à l'application Agile Sante");
                // redirection
                if ($type_compte == "adminsAccount"){
                    return redirect(base_url() . 'admin/adminsAccount');
                }
                else{
                    return redirect(base_url() . 'admin/usersAccount');
                }
            }

        } else {
            $this->setNotifie('Erreur de création du compte utilisateur en raison système');

            //determiner la page a afficher
            $page_view = ($type_compte == "adminAccount" ? "allAdmins" : "allUsers");

            $this->session->set_flashdata('type', 'comptes');
            $this->session->set_flashdata('page', $page_view);
            $this->addForm();
        }
    }

    /**
     * Edit Agent Form
     */
    public function updateAccount()
    {
        //set title name
        $data['title'] = "Update user account";
        //validation data with form_vaalidation librairie
        $this->form_validation->set_rules('asset_name', 'asset_name', 'required', array(
            'required' => 'Le nom complet est obligatoire',
        ));
        $this->form_validation->set_rules('asset_username', 'asset_username', 'required', array(
            'required' => 'Le nom utilisateur est obligatoire',
        ));

        $this->form_validation->set_rules('asset_email', 'asset_email', 'required', array(
            'required' => 'L\'email est obligatoire',
        ));
        $this->form_validation->set_rules('asset_role', 'asset_role', 'required', array(
            'required' => 'Le role est obligatoire',
        ));
        //recuperer le type de compte a creer
        $type_compte=$this->uri->segment(2);
        # verifie if datas are corrects and redirect
        if ($this->form_validation->run() && $this->input->post('asset_type') != "" && $this->input->post('asset_email') != "") {

            //get data from form
            $user_name = trim(strtolower($this->input->post('asset_name')));
            $user_username = trim(strtolower($this->input->post('asset_username')));
            $user_mail = trim(strtolower($this->input->post('asset_email')));
            $user_password_default = '123456';
            $options = array(
                'cost' => 12,
            );
            //Mise en tableau des informations du compte a créé
            //put all data in array and saved
            $data = array(
                'asset_name' => $user_name,
                'asset_username' => $user_username,
                'asset_email' => $user_mail,
                'asset_password' => password_hash($user_password_default, PASSWORD_BCRYPT, $options),
                'asset_type' => $this->input->post('asset_type'),
                'asset_role' => $this->input->post('asset_role'),
            );
            // update data
            $id = $this->uri->segment(4);
            if ($this->App_model->update_data($data, 'tb_doc_assets',  array('id_asset' => $id))) {
                $this->setNotifie("Modification du compte utilisateur de $user_name effectuée avec succès", "success");
                // redirection
                $this->sendIdentifiantConnexion($user_mail, $user_username, $user_password_default,
                    "Update de vos identifiants d'access à l'application Tokdoc Monganga");
                return redirect(base_url() . 'admin/compteUsers');
            } else {
                $this->setNotifie("Erreur de modification du compte utilisateur");
                //determiner la page a afficher
                $page_view = ($type_compte == "adminAccount" ? "allAdmins" : "allUsers");

                $this->session->set_flashdata('type', 'comptes');
                $this->session->set_flashdata('page', $page_view);
                $this->updateForm();
            }

        } else {
            //this->get_msg("Erreur de modification du compte utilisateur");
            //determiner la page a afficher
            $page_view = ($type_compte == "adminAccount" ? "allAdmins" : "allUsers");

            $this->session->set_flashdata('type', 'comptes');
            $this->session->set_flashdata('page', $page_view);
            $this->updateForm();
        }
    }
    public function resetPassword()
    {
        //id user
        $id_user = $this->input->get('id_asset');
        //algo cryptage
        $options = array(
            'cost' => 12,
        );
        $asset_password = password_hash("123456", PASSWORD_BCRYPT, $options);
        $data_user = compact('asset_password');
        if ($this->App_model->update_data($data_user, 'tb_doc_assets', array('id_asset' => $id_user))) {

            //redirect  with message notifie
            $this->setNotifie("Réinitialisation effectuée du mot de passe utilisateur", "success");
            return redirect(base_url() . 'admin/compteUsers');

        } else {
            return redirect(base_url() . 'admin/compteUsers');
        }
    }

    # bloquer agent - desactivation d'un compte utilisateur
    public function bloquerAgent()
    {
        //id user
        $id_user = $this->input->get('id_asset');
        $asset_status = 'offline';
        $data_user = compact('asset_status');
        if ($this->App_model->update_data( $data_user,'tb_doc_assets', array('id_asset' => $id_user))) {

            //redirect  with message notifie
            $this->setNotifie("Agent bloqué - compte utilisateur désactivé avec succès", "success");
            return redirect(base_url() . 'admin/compteUsers');

        } else {
          return redirect(base_url() . 'admin/compteUsers');
        }
    }

    # débloquer agent - activation d'un compte utilisateur
    public function debloquerAgent()
    {
        //id user
        $id_user = $this->input->get('id_asset');
        $asset_status = 'online';
        $data_user = compact('asset_status');
        if ($this->App_model->update_data( $data_user,'tb_doc_assets', array('id_asset' => $id_user))) {

            //redirect  with message notifie
            $this->get_msg("Agent débloqué - compte utilisateur activé avec succès", "success");
            return redirect(base_url() . 'admin/compteUsers');

        } else {
            return redirect(base_url() . 'admin/compteUsers');
        }
    }

    ########################################   *   ########################################
    #
    #					     	# GENERIC FUNCTIONS
    #
    ########################################   *   ########################################

    /**
     *@ Add data
     */
    public function addForm()
    {
        #=================forms information======================
        $type_view = ($this->uri->segment(3)!="" ? $this->uri->segment(3) : $this->session->type);
        $page = ($this->uri->segment(4)!="" ? $this->uri->segment(4) : $this->session->page);

        $data['managers'] = $this->App_model->get('tb_ca_assets', 'asset_date_created')->result();
        $data['groupes'] = $this->App_model->get('tb_ca_groups', 'group_name')->result();

        //set title
        $data['title'] = "$type_view | $page";

        $data['view'] = 'grocerycrud/admin_office/'.$type_view.'/'.$page;
        $this->load->view('grocerycrud/admin_office/admin_main', $data);
    }

    /**
     *@ Update data
     */
    public function updateForm()
    {

        #=======================forms update data====================
        $id = $this->uri->segment(4);
        //infos sessions utilisateurs for edit
        $data['agents'] = $this->App_model->get_info_by_table_by_id($id, 'tb_ca_assets', 'asset_id');
        $data['managers'] = $this->App_model->get('tb_ca_assets', 'asset_date_created')->result();
        $data['groupes'] = $this->App_model->get('tb_ca_groups', 'group_name')->result();

            #=================Links infos======================
        $type_view = ($this->uri->segment(3)!="" ? $this->uri->segment(3) : $this->session->type);
        $page = ($this->uri->segment(4) !="" ? $this->uri->segment(4) : $this->session->page);

        //set title
        $data['title'] = "$type_view | $page";

        $data['view'] = 'grocerycrud/admin_office/'.$type_view.'/'.$page;
        $this->load->view('grocerycrud/admin_office/admin_main', $data);
    }

    #====================================edition du profil utilisateur===============================charger vue profil

    /**
     * @param $type
     */
    public function changePassword()
    {
        $id = $this->session->id;
        $data['agents'] = $this->App_model->get_onces($id, 'tb_doc_assets', 'id_asset');

        $data['title'] = "Modification du mot de passe utilisateur";
        $this->load->view('includes/header', $data);
        $this->load->view('app/profil/change_password', $data);
        $this->load->view('includes/footer', $data);
    }
    /**
     * @param $type
     * user profil
     */
    public function monProfil()
    {
        $id = $this->session->id;
        $data['agents'] = $this->App_model->get_onces($id, 'tb_doc_assets', 'id_asset');

        $data['title'] = "Gestion du profil admin";
        $this->load->view('includes/header', $data);
        $this->load->view('app/profil/index', $data);
        $this->load->view('includes/footer', $data);
    }
    //Traitement de la mise à jour des informations du profil
    //fonction de modification du mot de passe proprement-dite
    function updateProfil()
    {
        $data['title'] = "Gestion du profil utilisateur";
        //$asset_username = $this->session->username;
        //$asset_email = $this->session->username;
        $new_password = $this->input->post('new_password');
        $confirm_password = $this->input->post('confirm_password');

        $options = array(
            'cost' => 12,);
        $anc_mot_pass = password_hash($this->input->post('anc_mot_pass'), PASSWORD_BCRYPT, $options);
        $validate = array();

        $this->form_validation->set_rules('new_password', 'new_password', 'min_length[6]|max_length[12]',
            array(
                'min_length' => 'Le champ %s doit contenir au moins huit caractères',
                'max_length' => 'Le champ %s doit contenir au plus douze caractères'
            ));

        $this->form_validation->set_rules('confirm_password', 'confirm_password', 'matches[new_password]',
            array(
                'matches' => 'Le champ %s doit correspondre avec le champ Nouveau Mot de passe'
            ));

        $anc_mot_pass_db = $this->Generic_model->get_unique('tb_doc_assets',
            array('asset_username' => $this->session->username))->asset_password;

        $this->form_validation->set_data(array_merge($validate, compact('new_password', 'confirm_password')));

        if ($this->form_validation->run()) {

            if ($anc_mot_pass != $anc_mot_pass_db) {
                //$asset_password=$nvo_mot_pass;
                $asset_password = empty($new_password) ? $anc_mot_pass : password_hash($new_password, PASSWORD_BCRYPT, $options);

                $data_ut = compact('asset_password');

                if ($this->Generic_model->set_update('tb_doc_assets', $data_ut,
                    array('asset_username' => $this->session->username))) {

                    //redirection with message notification success
                    $this->get_msg(' Mise à jour de votre mot de passe utilisateur effectuée avec succès', 'success');
                    redirect('admin/dashboard');

                } else {
                    $this->get_msg("Impossible de mettre à jour votre mot de passe utilisateur !");
                    $data['view'] = 'admin/vue_profil_utilisateur';
                    $this->load->view('admin/main', $data);
                }
            } else {
                $error_anc_mot_pass = TRUE;
                $this->session->set_flashdata(compact('error_anc_mot_pass'));
                $this->get_msg("Impossible de mettre à jour les données car votre 
                mot de passe en cours est incorrect");
                $data['view'] = 'admin/vue_profil_utilisateur';
                $this->load->view('admin/main', $data);
            }
            //redirect('agent/vue_profil');
        } else {
            $this->get_msg("Mise à jour du mot de passe non effectuée en raison d'une erreur survenue 
            lors de la validation de données !");
            $data['view'] = 'admin/vue_profil_utilisateur';
            $this->load->view('admin/main', $data);
        }
    }
    public function articles()
    {
        //set page title
        $data['title'] = "Creation d'un article";
        #categories
        $data['categories'] = $this->App_model->get('tb_ca_categories',  'category_name')->result();

        $data['natures'] = $this->App_model->get('tb_ca_natures_posts', 'nature_name')->result();

        $data['view'] = 'grocerycrud/creerArticle';
        $this->load->view('grocerycrud/megamain', $data);
    }
    public function creerArticle()
    {

        $photo_image_db ='false.png';

        $data['categories'] = $this->App_model->get('tb_ca_categories',  'category_name')->result();
        $data['natures'] = $this->App_model->get('tb_ca_natures_posts', 'nature_name')->result();

        //Validation de formulaire
        $this->form_validation->set_rules('title','Title','required');
        $this->form_validation->set_rules('body','Body','required');
        // $this->form_validation->set_rules('userfile','Image','required');

        if($this->form_validation->run()===FALSE){
            $this->setNotifie("Veuillez completer les infos recquises");
            // rediret admin
            return redirect(base_url() . 'appMain/creerArticle');
        }else{

            $config['upload_path'] ='./assets/uploads/images';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|webp';
            //$config['max_size'] = '4848';
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('post_image')){
                $post_image = $photo_image_db;
            }
            else{
                $image_data = $this->upload->data('orig_name');
                $post_image = ($photo_image_db == $image_data) ? $photo_image_db : $image_data;
            }

            $post_title=trim($this->input->post('title'));
            $post_content=trim($this->input->post('body'));
            $post_date_created=trim(date("Y-m-d H:i:s"));
            $category_sid=trim($this->input->post('category'));
            $nature_post_sid=trim($this->input->post('nature'));
            $post_statut=trim("public");
            $post_region=trim($this->input->post('region'));

            $array_data= compact('post_title', 'post_content','post_date_created',
                'category_sid', 'nature_post_sid', 'post_statut', 'post_region','post_image');

            //$this->dd($array_data);

            //insertion de données dans la base puis teste de valdation
            if ($this->App_model->insert_data($array_data, 'tb_ca_posts')) {
                $this->setNotifie("Votre article a ete sauvegarder et publier avec success", 'success');
                // rediret admin
                return redirect(base_url() . 'appMain/posts');
            }else{
                $this->setNotifie("Votre article n'ete pas ete sauvegarder ni publier");
                // rediret admin
                return redirect(base_url() . 'appMain/creerArticle');
            }

        }
    }
    public function creer()
    {
        $data['categories'] = $this->App_model->get('tb_ca_categories',  'category_name')->result();
        $data['natures'] = $this->App_model->get('tb_ca_natures_posts', 'nature_name')->result();

        //Validation de formulaire
        $this->form_validation->set_rules('title','Title','required');
        $this->form_validation->set_rules('body','Body','required');
        // $this->form_validation->set_rules('userfile','Image','required');

        if($this->form_validation->run()===FALSE){
            //set page title
            $data['title'] = "Erreur de creation d'un article";
            $data['view'] = 'grocerycrud/creerArticle';
            $this->load->view('grocerycrud/megamain', $data);
        }else{
            //Upload Image
            $config['upload_path'] = './assets/uploads/images';
            $config['allowed_types']='gif|jpg|png|jpeg|webp';
            $config['max_size']='4848';
            $config['max_width']='3500';
            $config['max_heigth']='3500';

            $this->load->library('upload', $config);

            if(!$this->upload->do_upload()){
                $errors = array('error'=>$this->upload->display_errors());
                //$post_image = 'noimage.jpg';
                $this->setNotifie("Erreur du chargement de l'image $errors");
            }else{
                $data = array('upload_data' => $this->upload->data());
                $post_image = $_FILES['post_image']['name'];
            }
            //$post_image
            $post_title=trim($this->input->post('title'));
            $post_content=trim($this->input->post('body'));
            $post_date_created=trim(date("Y-m-d H:i:s"));
            $category_sid=trim($this->input->post('category'));
            $nature_post_sid=trim($this->input->post('nature'));
            $post_statut=trim("public");
            $post_region=trim($this->input->post('region'));

            $array_data= compact('post_title', 'post_content','post_date_created',
                'category_sid', 'nature_post_sid', 'post_statut', 'post_region','post_image');

            //insertion de données dans la base puis teste de valdation
            if ($this->App_model->insert_data($array_data, 'tb_ca_posts')) {
                $this->setNotifie("Votre article a ete sauvegarder et publier avec success", 'success');
                // rediret admin
                return redirect(base_url() . 'appMain/posts');
            }else{
                $this->setNotifie("Votre article a n'ete pas ete sauvegarder et publier avec success");
                // rediret admin
                return redirect(base_url() . 'appMain/creerArticle');
            }

        }
    }
    //Function generic for output data
    #----------- 1. Mes emissions Sections ----------------------------------------------------------------
    /**
     *@ Home function
     */
    public function _menu_sortie($output = null)
    {
        //load view main
        $this->load->view('grocerycrud/admin_office/admin_main.php', (array)$output);
    }

    //Show megamain page with css and js files
    public function megamain_management()
    {
        //affichage des operations des agents
        $this->_menu_sortie((object)array('output' => '', 'js_files' => array(), 'css_files' => array()));
    }



    #---------------function for parameter
    //table without foreign key constraint references - manage provinces
    public function province()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('tb_doc_provinces');
        $crud->set_subject('province');
        //set required on field
        //$crud->required_fields('praticien_fullname');
        //upload files and put then in server directory for storage
        //$crud->set_field_upload('praticien_file_url','assets/uploads/files');
        $crud->unset_clone();
        $output = $crud->render();

        $this->_menu_sortie($output);
    }

    //Manage cabinet medical data
    public function ville()
    {
        //create object from grocerycrud librairie
        $crud = new grocery_CRUD();
        //set table name
        $crud->set_table('tb_doc_villes');
        $crud->set_subject('ville');//rename table to display in page
        //set relation for foreign key id and display the name of field - first table
        $crud->set_relation('province_id', 'tb_doc_provinces', 'province_name');
        $crud->display_as('province_id', 'Province');

        #interdir la suppression
        //$crud->unset_delete();
        $crud->unset_clone();
        //$crud->unset_edit_fields('access_code');
        //show all data in array and display then on megamain page
        $output = $crud->render();
        //redirect to megamain page
        $this->_menu_sortie($output);
    }

    //contact from form contact
    public function contacts()
    {
        //create object from grocerycrud librairie
        $crud = new grocery_CRUD();
        //set table name
        $crud->set_table('tb_ca_contacts');
        $crud->set_subject('contact');
        $crud->unset_clone();
        $crud->unset_edit();
        $crud->unset_add();
        $output = $crud->render();
        //redirect to megamain page
        $this->_menu_sortie($output);
    }

    //contact from form abonnements
    public function abonnements()
    {
        //create object from grocerycrud librairie
        $crud = new grocery_CRUD();
        //set table name
        $crud->set_table('tb_ca_newsletters');
        $crud->set_subject('abonnement');
        $crud->unset_clone();
        $crud->unset_edit();
        $crud->unset_add();
        $output = $crud->render();
        //redirect to megamain page
        $this->_menu_sortie($output);
    } //contact from form abonnements

    public function temoignages()
    {
        //create object from grocerycrud librairie
        $crud = new grocery_CRUD();
        //set table name
        $crud->set_table('tb_ca_avis_clients');
        $crud->set_subject('Temoignage');
        $crud->unset_clone();
        $output = $crud->render();
        //redirect to megamain page
        $this->_menu_sortie($output);
    }

    //table without foreign key constraint references - manage provinces
    public function assistances()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('tb_ca_helps');
        $crud->set_subject('assistance');
        //set required on field
        //$crud->required_fields('praticien_fullname');
        //upload files and put then in server directory for storage
        //$crud->set_field_upload('praticien_file_url','assets/uploads/files');
        $crud->unset_clone();
        $crud->unset_add();
        //$crud->unset_delete();
        $output = $crud->render();

        $this->_menu_sortie($output);
    }

    //Manage cabinet medical data
    public function posts()
    {
        //create object from grocerycrud librairie
        $crud = new grocery_CRUD();
        //set table name
        $crud->set_table('tb_ca_posts');
        $crud->set_subject('Post');//rename table to display in page
        //set relation for foreign key id and display the name of field - first table
        $crud->set_relation('category_sid', 'tb_ca_categories', 'category_name');
        $crud->display_as('category_id', 'Categorie');

        //upload files and put then in server directory for storage
        $crud->set_field_upload('post_image', 'assets/uploads/images');
        $crud->set_field_upload('post_file', 'assets/uploads/files');
        $crud->set_field_upload('post_video', 'assets/uploads/videos');

        #interdir la suppression
        //$crud->unset_add();
        $crud->unset_clone();
        //$crud->unset_edit();
        //show all data in array and display then on megamain page
        $output = $crud->render();
        //redirect to megamain page
        $this->_menu_sortie($output);
    }
    #----------------function for blog news--------------------
    //Manage cabinet medical data
    public function commentaires()
    {
        //create object from grocerycrud librairie
        $crud = new grocery_CRUD();
        //set table name
        $crud->set_table('tb_ca_comments');
        $crud->set_subject('Commentaire');//rename table to display in page
        //set relation for foreign key id and display the name of field - first table
        $crud->set_relation('post_sid', 'tb_ca_posts', 'post_title');
        $crud->display_as('post_id', 'Post');

        #interdir la suppression
        //$crud->unset_delete();
        $crud->unset_add();
        $crud->unset_clone();
        //$crud->unset_edit_fields('access_code');
        //show all data in array and display then on megamain page
        $output = $crud->render();
        //redirect to megamain page
        $this->_menu_sortie($output);
    }

    public function categories()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('tb_ca_categories');
        $crud->set_subject('categorie');
        //set required on field
        $crud->set_field_upload('category_image', 'assets/uploads/images');
        $crud->unset_clone();
        $output = $crud->render();
        $this->_menu_sortie($output);
    }

    public function naturesPosts()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('tb_ca_natures_posts');
        $crud->set_subject('nature element');
        //set required on field
        $crud->unset_clone();
        $output = $crud->render();
        $this->_menu_sortie($output);
    }

    //all services
    public function services()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('tb_ca_services');
        $crud->set_subject('service');
        //set required on field
        $crud->set_field_upload('service_image', 'assets/uploads/images');
        $crud->unset_clone();
        $output = $crud->render();
        $this->_menu_sortie($output);
    } //all groupes


    #===============Image CRUD==================================
    #---------------Galerie des images--------------------------
    function galeries()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('tb_ca_galeries');
        $crud->set_subject('galerie');
        //set required on field
        $crud->set_field_upload('galerie_image', 'assets/uploads/images');
        $crud->unset_clone();
        $output = $crud->render();
        $this->_menu_sortie($output);

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
    #======================================================================================================
    #============================envoi des mails de creation des comptes==================================

    public function sendIdentifiantConnexion($email, $username, $password, $subject)
    {
        require_once APPPATH.'PHPMailer/src/Exception.php';
        require_once APPPATH.'PHPMailer/src/PHPMailer.php';
        require_once APPPATH.'PHPMailer/src/SMTP.php';
        $from = "";
        $cc1 = "";
        $addresses = mb_split(";", $email);
        if (count($addresses) > 1) {
            $from = $addresses[0];
            $cc1 = $addresses[1];
        } else {
            $from = $email;
        }
        $mail = new PHPMailer(TRUE);
        try {
            $mail->setFrom('mwez.rubuz@congoagile.net', 'TokDoc Application');
            $mail->addAddress($from, '');
            if (count($addresses) > 1) {
                $mail->addCC($cc1);
            }
            $mail->addCC('info@congoagile.net', 'Webmaster IT Support');
            $mail->Subject = $subject;

            $mail->isHTML(true);

            $mail->CharSet = 'UTF-8';

            $mail->Body = '<html><strong>Cher ' . $from . '<br/></strong> un compte d\'access a Agile Sante application 
                a été crée avec succès par un administrateur systeme.
            <strong> veuillez trouver ci-dessous les identifiants de connexion. <br/>Username:  ' . $username . '<br/>Mot de passe: ' . $password . '<br/></strong>
            <p> Veuillez suivre le lien ci-après pour vous connecter.</p><a href="https://tokdoc.congoagile.net"> 
            Agile Sante Application.</a></html>';

            /* SMTP parameters. */

            $mail->isSMTP();

            //$mail->SMTPDebug = 2;

            /* SMTP server address. */
            $mail->Host = 'mail.congoagile.net';

            /* Use SMTP authentication. */
            $mail->SMTPAuth = TRUE;

            /* Set the encryption system. */
            $mail->SMTPSecure = 'tls';

            /* SMTP authentication username. */
            $mail->Username = 'mwez.rubuz@congoagile.net';

            /* SMTP authentication password. */
            $mail->Password = '*ELIEMWEZ@EMAR.RUCHI11220';

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
