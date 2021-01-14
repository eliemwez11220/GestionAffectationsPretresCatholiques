<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();
    }

    public function details()
    {

        #recuperer l'identifiant de l'article est son title
        $postid = $this->input->get('postid');
        $title = $this->input->get('title');

        #Decoder le titre par la suppression de caracteres speciaux
        $title_post = $this->str_to_noaccent($title);

        #Identifiant de la meme categorie
        $categories = $this->App_model->get_unique(array('vue_categories_articles'),
            array('post_id' => $postid))->category_sid;

        #Articles similaires ou de la meme categorie
        $data['postsSimilaires'] = $this->App_model->get_response('vue_categories_articles',
            array('post_statut' => "public", 'category_sid' => $categories), 'vue_categories_articles.post_date_created', 'DESC', '5');

        //$this->dd($data['postsSimilaires']);
        // $this->dd($categories);

        #recuperer les infos de l'article selectionne
        $data['articles'] = $this->App_model->get_onces($postid, 'vue_categories_articles', 'post_id');
        #Fil d'actualites
        $data['fil'] = $this->App_model->get_response('vue_categories_articles',
            array('post_statut' => "public"), 'vue_categories_articles.post_date_created', 'DESC', '15');

        #Fil d'actualites
        $data['magazines'] = $this->App_model->get_response('vue_categories_articles',
            array('post_statut' => "public", 'nature_name' => "magazine"), 'vue_categories_articles.post_date_created', 'DESC', '5');

        #definir le titre de la page
        $data['title'] = ucfirst($title_post);

        #set data in view
        $this->load->view('mdb/includes/header', $data);
        $this->load->view('mdb/details/index', $data);
        $this->load->view('mdb/includes/footer', $data);
    }

    /**
     * gestion du URL de la description de l'article
     */
    function str_to_noaccent($str)
    {
        $url = $str;
        $url = preg_replace('#-#', ' ', $url);
        $url = preg_replace('#Ç#', 'C', $url);
        $url = preg_replace('#ç#', 'c', $url);
        $url = preg_replace('#è|é|ê|ë#', 'e', $url);
        $url = preg_replace('#È|É|Ê|Ë#', 'E', $url);
        $url = preg_replace('#à|á|â|ã|ä|å#', 'a', $url);
        $url = preg_replace('#@|À|Á|Â|Ã|Ä|Å#', 'A', $url);
        $url = preg_replace('#ì|í|î|ï#', 'i', $url);
        $url = preg_replace('#Ì|Í|Î|Ï#', 'I', $url);
        $url = preg_replace('#ð|ò|ó|ô|õ|ö#', 'o', $url);
        $url = preg_replace('#Ò|Ó|Ô|Õ|Ö#', 'O', $url);
        $url = preg_replace('#ù|ú|û|ü#', 'u', $url);
        $url = preg_replace('#Ù|Ú|Û|Ü#', 'U', $url);
        $url = preg_replace('#ý|ÿ#', 'y', $url);
        $url = preg_replace('#Ý#', 'Y', $url);
        return ($url);
    }

    public function search()
    {
        #recuperer l'identifiant de l'article est son title
        $query = $this->input->get('query');
        $critere = $this->input->post('critere');

        if(!empty($query)){
            #get data from database
            $data['title'] = "Resultats de recherche correspondant au critere - $query";
            //critere de recherche indiqué
            //$data['resultats'] = $this->App_model->search_data('vue_categories_articles', 'nature_name', $query);
            $data['resultats'] = $this->App_model->filter_data('vue_categories_articles', 'nature_name', $query,
                array('post_statut' => "public"), 'vue_categories_articles.post_date_created', 'DESC');
        }else{
            $data['title'] = "Resultats de recherche correspondant au critere -  $critere";

            $data['resultats'] = $this->App_model->filter_data('vue_categories_articles', 'post_title', $critere,
                array('post_statut' => "public"), 'vue_categories_articles.post_date_created', 'DESC', 20);
        }
        $data['critere'] = ($query !="")?$query : $critere;

        //$this->dd($data['resultats']);

        #set data in view
        $this->load->view('mdb/includes/header', $data);
        $this->load->view('mdb/details/resultatsRequetes', $data);
        $this->load->view('mdb/includes/footer', $data);
    }

    public function actualites()
    {
        $type = $this->input->get('type');
        $region = trim($this->input->get('region'));

        if ($type != "") {
            $data['title'] = "Resultats de recherche correspondant au critere -  $type";

            $data['resultats'] = $this->App_model->filter_data('vue_categories_articles', 'category_name', $type,
                array('post_statut' => "public", 'category_name' => $type), 'vue_categories_articles.post_date_created', 'DESC', 20);

        } elseif ($region != "") {
            $data['title'] = "Resultats de recherche correspondant au critere -  $region";
            //critere de recherche indiqué

            $data['resultats'] = $this->App_model->filter_data('vue_categories_articles', 'post_region', $region,
                array('post_statut' => "public", 'post_region' => $region), 'vue_categories_articles.post_date_created', 'DESC', 20);
        }
        $data['critere'] = ($type !="")?$type : $region;
        //$this->dd($data['resultats']);
        //data view
        $this->load->view('mdb/includes/header', $data);
        $this->load->view('mdb/details/resultatsRequetes', $data);
        $this->load->view('mdb/includes/footer', $data);
    }

    function inscrire_internaute()
    {
        if ($this->form_validation->run()) {
            $email = $this->input->post('email');
            $denomination = $this->input->post('denomination');
            $mot_de_passe = sha1($this->_encrypt . $this->input->post('mot_de_passe'));
            $role_utilisateur = 'internaute';
            $pseudo = 'admin';
            $date_creation = date('Y-m-d');

            $data_ut = compact('nom_complet', 'email', 'pseudo', 'mot_de_passe', 'role_utilisateur', 'date_creation');
            if ($this->generic_model->set_insert('utilisateurs', $data_ut)) {
                $this->save_sess($email, $this->_encrypt . $this->input->post('mot_de_passe'));
            } else {
                $this->get_msg('Impossible de créer le compte administrateur, veuillez vérifier les données saisies');
                $this->index();
            }
        } else {
            $this->get_msg();
            $this->index();
        }
    }

    function ajouter_newsletter()
    {
        $email = $this->input->post('email');
        if (is_email($email)) {
            //verification de l'existance de l'adresse email
            $data['mail'] = $this->generic_model->get_result('newsletter', []);
            foreach ($data['mail'] as $mail) {
                if ($email != $mail->email)//si email inexistant
                {
                    //save this email address
                    $data_cate = compact('email');
                    if ($this->generic_model->set_insert('newsletter', $data_cate)) {
                        $this->get_msg('Votre adresse e-mail a été enregistré avec succès.
                        Vous allez commencer à recevoir des notifications à chaque publication. Abonnement effectué. Merci !',
                            'success');
                        $this->index();
                    } else {
                        $this->get_msg('Echec de newsletter registration, une erreur s\' est produit lors de l\'abonnement 
                        à la newsletter hebdomadaire', 'error');
                        $this->index();
                    }
                } else {
                    $this->get_msg('Adresse email existe dejà', 'error');
                    $this->index();
                }
            }
        } else {
            $this->get_msg('Adresse email invalide', 'error');
            $this->index();
        }
        //redirect('gouverneur');
    }

    function commenter_article()
    {
        $post_id = $this->input->post('post_id');
        $email = $this->input->post('email');
        $commentaire = $this->input->post('commentaire');
        $slug = $this->App_model->get_unique('actualites', ['id' => $post_id])->slug;
        $title = $this->App_model->get_unique('actualites', ['id' => $post_id])->title;
        $nom_complet = $this->App_model->get_unique('utilisateurs', ['email' => $email])->nom_complet;
        //insertion de donnees
        $data_cate = compact('email', 'nom_complet', 'post_id', 'commentaire');
        if ($this->App_model->set_insert('comments', $data_cate)) {
            $this->get_msg("Votre commentaire sur $title a été posté avec succès, 
            il va apparaitre d'un moment à l'autre après sa vérification de conformité", "success");
            $this->view_publication($slug);
        } else {
            $this->get_msg("Votre commentaire sur $title n'a pas été posté. Petit problème !");
            $this->view_publication($slug);
        }
        //redirect('gouverneur/view_publication/' . $slug);
    }

}