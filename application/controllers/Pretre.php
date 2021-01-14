<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Pretre extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();

        #Charge all models
        $this->load->model('Secure_model');
        $this->load->model('App_model');

        #GroceryCRUD Librairie loading
        $this->load->library('grocery_CRUD');

        $this->is_logged();
    }

    private function is_logged()
    {
        if ($this->session->logged == false && $this->session->job != 'pretre') {
            // code...
            return redirect(base_url() . 'secure');
        }
    }

    #===================================deconnexon - fermeture de session===========================================
    public function logout()
    {

        $this->session->sess_destroy();
        return redirect(base_url() . 'secure');
    }

    public function index()
    {

        //chargement du tableau de bord
        $this->dashboard();
    }

    public function dashboard()
    {
        //$this->dd($this->session->avatar);
        //set page title
        $data['title'] = "Tableau de bord users";
        $data['view'] = 'grocerycrud/pretre_office/dashboard/index';
        $this->load->view('grocerycrud/pretre_office/pretre_main', $data);
    }

    public function profil()
    {
        $data['affectations'] = $this->App_model->get_response('vue_affecation_pretres',
            array('pretre_concerne' => $this->session->id), 'vue_affecation_pretres.code_affectation', 'DESC', '100');

        $data['mouvements'] = $this->App_model->get_response('vue_mouvements_affectations',
            array('pretre_concerne' => $this->session->id), 'vue_mouvements_affectations.code_affectation', 'DESC', '100');

        //set page title
        $data['title'] = "Mes coordonnees personnelles";
        $data['view'] = 'grocerycrud/pretre_office/profil/profil_pretre';
        $this->load->view('grocerycrud/pretre_office/pretre_main', $data);
    }

    public function Affectations()
    {
        $data['affectations'] = $this->App_model->get_response('vue_affecation_pretres',
            array('pretre_concerne' => $this->session->id), 'vue_affecation_pretres.code_affectation', 'DESC', '100');

        $data['mouvements'] = $this->App_model->get_response('vue_mouvements_affectations',
            array('pretre_concerne' => $this->session->id), 'vue_mouvements_affectations.code_affectation', 'DESC', '100');

        //set page title
        $data['title'] = "Mes Affectations";
        $data['view'] = 'grocerycrud/pretre_office/Affectations';
        $this->load->view('grocerycrud/pretre_office/pretre_main', $data);
    }

    public function lettres()
    {
        $data['lettres'] = $this->App_model->get_response('vue_lettres_pretres',
            array('pretre_sid' => $this->session->id), 'vue_lettres_pretres.nom_prenom_pretre', 'DESC', '100');
        //$this->dd($data['lettres']);
        //set page title
        $data['title'] = "Mes coordonnees personnelles";
        $data['view'] = 'grocerycrud/pretre_office/lettres';
        $this->load->view('grocerycrud/pretre_office/pretre_main', $data);
    }

    /**
     *@ Home function
     */
    public function _menu_sortie($output = null)
    {
        //load view main
        $this->load->view('grocerycrud/pretre_office/pretre_main.php', (array)$output);
    }

    //Show megamain page with css and js files
    public function megamain_management()
    {
        //affichage des operations des agents
        $this->_menu_sortie((object)array('output' => '', 'js_files' => array(), 'css_files' => array()));
    }

    public function paroissesReadonly()
    {
        //create object from grocerycrud librairie
        $crud = new grocery_CRUD();
        //set table name
        $crud->set_table('tb_aff_paroisses');
        $crud->set_subject('Paroisse');

        $crud->unset_clone();
        $crud->unset_edit();
        $crud->unset_add();
        $crud->unset_export();
        $crud->unset_delete();
        $output = $crud->render();
        //redirect to megamain page
        $this->_menu_sortie($output);
    }
}