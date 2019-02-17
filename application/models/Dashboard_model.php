<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

    public function total($table)
    {
        $query = $this->db->get($table)->num_rows();
        return $query;
    }

    public function get_where($table, $pk, $id, $join = null, $order = null)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($pk, $id);

        if($join !== null){
            foreach($join as $table => $field){
                $this->db->join($table, $field);
            }
        }
        
        if($order !== null){
            foreach($order as $field => $sort){
                $this->db->order_by($field, $sort);
            }
        }

        $query = $this->db->get();
        return $query;
    }
}