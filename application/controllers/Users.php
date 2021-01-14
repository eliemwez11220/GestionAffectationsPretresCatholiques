<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Users extends CI_Controller
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
    }

    /**
     *@ Check is Users is logged
     */
    private function is_logged()
    {
        if (!$this->session->authentified_agent) {
            // code...
            return redirect(base_url() . 'secure/index');
        }
    }
    //mettre a jour la date de derniere connexion
    private function last_connexion()
    {
        if ($this->session->authentified_agent) {
            // code...
            $date_connect=date('Y-m-d H:s:i');
            $data = array(
                'asset_last_login' => $date_connect,
                'session_ouverte' => 'oui',
            );
            // update
            $id = $this->session->id;
            $this->App_model->update_data($data, 'tb_ca_assets', array('asset_id' => $id));
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
        $data['title'] = "Page de demarrage menu utilisateur";
        //show all users
        $data['managers'] = $this->App_model->get('tb_ca_assets', 'asset_fullname')->result();
        $this->load->view('architect/includes/header', $data);
        $this->load->view('architect/index', $data);
        $this->load->view('architect/includes/footer', $data);
    }

    ########################################   *   ########################################
    #
    #								 # AGENT FUNCTIONS
    #
    ########################################   *   ########################################




    ########################################   *   ########################################
    #
    #					     	# GENERIC FUNCTIONS
    #
    ########################################   *   ########################################

    /**
     *@ Add data
     */
    public function Add_form()
    {
        #=================forms information======================
        $type = $this->uri->segment(3) ?? $this->session->type;
        $data['title'] = "Gestion de $type";
        $data['view'] = "Users/$type/index";
        $this->load->view('Users/main', $data);
    }

    /**
     *@ Update data
     */
    public function updateForm()
    {

        #=======================forms update data====================
        $id = $this->uri->segment(4);
        $type = $this->uri->segment(3) ?? $this->session->type;
        //infos sessions utilisateurs for edit
        $data['agents'] = $this->Generic_model->get_info_by_table_by_id($id, 'tb_doc_assets', 'id_asset');
        $data['managers'] = $this->Generic_model->get('tb_doc_assets', 'asset_name')->result();

        $data['title'] = "Update de $type";
        $data['view'] = "Users/$type/index";
        $this->load->view('Users/main', $data);
    }


    #====================================edition du profil utilisateur===============================charger vue profil
    public function vue_profil()
    {
        $data['title'] = "Gestion du profil utilisateur";
        //$data['visiteurs'] = $this->Generic_model->get('vue_details_visitors', 'date_signup')->result();
        $data['view'] = 'Users/profil/vue_profil_utilisateur';
        $this->load->view('Users/main', $data);
    }
    public function changerPassword()
    {
        $data['title'] = "Gestion du profil utilisateur";
        //$data['visiteurs'] = $this->Generic_model->get('vue_details_visitors', 'date_signup')->result();
        $data['view'] = 'Users/profil/vue_utilisateur';
        $this->load->view('Users/main', $data);
    }
    //Traitement de la mise à jour des informations du profil
    //fonction de modification du mot de passe proprement-dite
    function profil()
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
                    redirect('Users/dashboard');

                } else {
                    $this->get_msg("Impossible de mettre à jour votre mot de passe utilisateur !");
                    $data['view'] = 'Users/vue_profil_utilisateur';
                    $this->load->view('Users/main', $data);
                }
            } else {
                $error_anc_mot_pass = TRUE;
                $this->session->set_flashdata(compact('error_anc_mot_pass'));
                $this->get_msg("Impossible de mettre à jour les données car votre 
                mot de passe en cours est incorrect");
                $data['view'] = 'Users/vue_profil_utilisateur';
                $this->load->view('Users/main', $data);
            }
            //redirect('agent/vue_profil');
        } else {
            $this->get_msg("Mise à jour du mot de passe non effectuée en raison d'une erreur survenue 
            lors de la validation de données !");
            $data['view'] = 'Users/vue_profil_utilisateur';
            $this->load->view('Users/main', $data);
        }
    }
    public function update_profil()
    {
        $data['title'] = "Gestion du profil utilisateur";
        //$asset_username = $this->session->username;
        //$asset_email = $this->session->username;
        $asset_email = $this->input->post('email');
        $asset_phone = $this->input->post('phone');


        $this->form_validation->set_rules('email', 'email', 'min_length[6]|max_length[75]|required',
            array(
                'min_length' => 'Le champ %s doit contenir au moins huit caractères',
                'max_length' => 'Le champ %s doit contenir au plus douze caractères',
                'required' => 'Le champ %s est obligatoire',

            ));$this->form_validation->set_rules('phone', 'phone', 'min_length[10]|max_length[25]|required',
            array(
                'min_length' => 'Le champ %s doit contenir au moins huit caractères',
                'max_length' => 'Le champ %s doit contenir au plus douze caractères',
                'required' => 'Le champ %s est obligatoire',

            ));


        if ($this->form_validation->run()) {

                $data_ut = compact('asset_email','asset_phone');

                if ($this->Generic_model->set_update('tb_doc_assets', $data_ut,
                    array('asset_username' => $this->session->username))) {

                    //redirection with message notification success
                    $this->get_msg(' Mise à jour de votre adresse mail et numero telephone effectuée avec succès', 'success');
                    redirect('Users/vue_profil');

                } else {
                    $this->get_msg("Impossible de mettre à jour votre  adresse mail et numero telephone!");
                    $data['view'] = 'Users/profil/vue_profil_utilisateur';
                    $this->load->view('Users/main', $data);
                }
            //redirect('agent/vue_profil');
        } else {
            $this->get_msg("Erreur survenue  lors de la validation de données !");
            $data['view'] = 'Users/profil/vue_profil_utilisateur';
            $this->load->view('Users/main', $data);
        }
    }
    public function logout()
    {
        $data = array(
            'session_ouverte' => 'non',
        );
        // update
        $id = $this->session->id;
        $this->App_model->update_data($data, 'tb_ca_assets',  array('asset_id' => $id));

        $this->session->sess_destroy();
        return redirect(base_url() . 'secure');
    }
}
