<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App_model extends CI_Model
{
    /**
     * Recuperation de toutes les donnees d'une table avec des criteres non obligatoire
     * @param $table ->nom de la table
     * @param $champs ->les champs de la table a selectionner
     * @param $where ->Le champ de la condition
     * @param $critere ->La condition elle-meme
     * @param string $order_by ->champs de tri
     * @param string $order ->Trier par un ordre specifique Croissant (asc) ou decroissant (desc)
     * @param array $per_page ->nombre de debut de la Limite de selection des enregistrements
     * @param array $position ->nombre de fin de la Limite de selection des enregistrements
     * @return bool
     */
    public function getAllData($table, $champs, $where, $critere, string $order_by = '', $order = '', $per_page = [], $position = [])
    {

        $this->db->select($champs);
        $this->db->from($table);
        $this->db->where($where, $critere);
        $this->db->order_by($order_by, $order);
        $this->db->limit($per_page, $position);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }

    }

    /**
     * @param $tableFils
     * @param array $champsFilter
     * @param $filterValue
     * @param bool $limit
     * @param bool $offset
     * @param array $champsCritere
     * @param null $critereValue
     * @param null $champsFils
     * @param null $champsPere1
     * @param null $champsPere2
     * @param null $tablePere1
     * @param null $tablePere2
     * @return mixed
     */
    public function get_search($tableFils, $champsFilter = array(), $filterValue, $limit = FALSE, $offset = FALSE,
                               $champsCritere = array(), $critereValue = null,
                               $champsFils = null, $champsPere1 = null, $champsPere2 = null, $tablePere1 = null, $tablePere2 = null)
    {
        $statut = 'Online';
        //$this->db->select('*');
        //$this->db->from($tableFils);
        if ($limit) {
            $this->db->limit($limit, $offset);
        }
        if ($champsFilter === false) {

            $this->db->like($champsFilter, $filterValue);
            $this->db->order_by($tableFils . $champsFils, 'DESC');
            $this->db->join($tablePere1, $tablePere1 . $champsPere1 = $tableFils . $champsPere1);
            $this->db->join($tablePere2, $tablePere2 . $champsPere2 = $tableFils . $champsPere2);
            //$query = $this->db->get();
            $query = $this->db->get_where($tableFils, array('patient_status' => $statut));
            //return $query;
            return $query->result_array();
        }
        $query = $this->db->get_where($tableFils, $champsFilter);
        return $query->result_array();
    }

    /**
     * @param $table
     * @param array $where
     * @param string $order_by
     * @param string $order
     * @param array $per_page
     * @param array $position
     * @return mixed
     */
    public function get_response($table, $where = array(), string $order_by = '', $order = '', $per_page = array(), $position = array())
    {
        $this->db->order_by($order_by, $order);
        $this->db->limit($per_page, $position);
        $query = $this->db->get_where($table, $where);
        return $query->result();
    }

    /**
     * @param $table
     * @param $champsFilter
     * @param $filterValue
     * @return mixed
     */
    public function search_data($table, $champsFilter, $filterValue)
    {
        $this->db->select('*');
        $this->db->from($table);
        if ($champsFilter) {
            $this->db->like($champsFilter, $filterValue);
            $query = $this->db->get();
            return $query;
        } else {
            // code...
            $this->db->order_by($filterValue, 'desc');
            //$this->db->group_by($group);
            $query = $this->db->get();
            return $query;
        }
    }

    public function get($table, $critere, $group = null, $condition = false, $table_join = null, $key1 = null, $key2 = null,
                        $details = null, $champ = null, $where = null, $detail_content = null)
    {
        $this->db->select('*');
        $this->db->from($table);
        if ($condition) {
            // code...
            $this->db->join($table_join, "$table_join.$key1 = $table.$key2");

            if ($details == $detail_content) {
                // code...
                $this->db->where($table . $champ, $where);
                $this->db->order_by($critere, 'desc');
                $this->db->group_by($group);
                $query = $this->db->get();
                return $query;
            } elseif ($details != $detail_content) {
                // code...
                $this->db->where($table . $champ, $where);
                $this->db->order_by($critere, 'desc');
                $this->db->group_by($group);
                $query = $this->db->get();
                return $query;
            } else {
                // code...
                $this->db->order_by($critere, 'desc');
                $this->db->group_by($group);
                $query = $this->db->get();
                return $query;
            }
        } else {
            // code...
            $this->db->order_by($critere, 'desc');
            //$this->db->group_by($group);
            $query = $this->db->get();
            return $query;
        }
    }

    /**
     *@ General get join
     */
    public function get_join($table, $critere, $array = array(), $condition = null, $champ = null, $where = null)
    {
        $this->db->select('*');
        $this->db->from($table);
        // code...
        $condition = (int)$condition;

        foreach ($array as $v) {
            // code...
            $this->db->join($v[1], "$v[1].$v[2] = $table.$v[0]");
        }

        if ($condition) {
            // code...
            if ($condition == $where) {
                // code...
                $this->db->where($champ, $where);
            } elseif ($condition == $where) {
                $this->db->where($champ, $where);
            } else {
                $this->db->where($champ, $where);
            }
        }

        $this->db->order_by($critere, 'desc');
        $query = $this->db->get();
        return $query;
    }


    /**
     *@ Get one
     */
    public function get_info_by_table_by_id($id, $table, $name_id)
    {
        return $this->db->get_where($table, array($name_id => $id))->row_array();
    }

    /**
     *@ Get one
     */
    public function get_Last_info($table, $field, $critere)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by($field, $critere);
        $this->db->limit(1);
        $query = $this->db->get()->row_array();
        return $query;

    }

# ============================= fonctions de verification des doublons =====================================

    /**
     *@ Get one information
     */
    public function get_onces($id, $table, $champs)
    {
        return $this->db->get_where($table, array($champs => $id))->row_array();
    }

    /**
     *@ Get one information in view request
     */
    public function get_view_onces($id, $rubrique, $champs)
    {
        return $this->db->get_where($rubrique, array($champs => $id))->row_array();
    }

    /**
     *@ Get all information by row
     */
    public function get_result($table, $champ, $id)
    {
        return $this->db->get_where($table, array($champ => $id))->row_array();
    }

    /**
     * la fonction pour selectionner une seule ligne dans une table
     * @param $table
     * @param array $where condition de selection
     * @return un tableau d'une ligne
     */
    public function get_unique($table, $where = array())
    {
        return $query = $this->db->get_where($table, $where)->row();
    }

    /**
     * @param $name
     * @return bool
     * get infos
     */
    public function get_existant($table, $champ, $name)
    {

        $this->db->where($champ, $name);
        $query = $this->db->get($table)->result();
        if ($query) {
            return $query[0];
        } else {
            return false;
        }
    }

    /**
     * la fonction pour inserer un enregistrement dans une table
     * @param $table
     * @param $data les données à inserer
     * @return bool
     */
    public function insert_data($data, $table)
    {
        return $this->db->insert($table, $data);
    }

    /**
     * la fonction permettant de modifier un enregistrement dans une table
     * @param $table
     * @param $data les donnees à modifier
     * @param $where la condition de modification
     * @return bool
     */
    public function update_data($data, $table, $where)
    {
        return $this->db->update($table, $data, $where);
    }

    /**
     * la fonction pour compter le nombre d'enregistrements dans une table
     * @param $table
     * @param array $where
     * @return bool
     */
    public function count_data($table, $where = array())
    {
        return $this->db->where($where)->count_all_results($table);
    }

    /**
     * la fonction permettant d'importer un fichier lors d'une insertion dans une table
     * @param $table
     * @param $data
     * @return bool
     */
    function import_data($table, $data)
    {
        if ($this->db->insert_batch($table, $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**, $champCond=null, $critereCond=null
     * @param $table
     * @param $champCritere
     * @param $critere
     * @param array $where
     * @return bool
     */


    public function filter_data($table, $champCritere=null, $critere=null, $where = array(),
                                string $order_by = '', $order = '', $per_page = array(), $position = array())
    {
        $this->db->where($where);
        $this->db->like($champCritere, $critere);

        $this->db->order_by($order_by, $order);
        $this->db->limit($per_page, $position);
        $query = $this->db->get($table);

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
}
