<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_model extends CI_Model {

    public function not_admin()
    {
        $this->db->select('a.id');
        $this->db->from('users a');
        $this->db->join('users_groups b', 'a.id=b.user_id');
        $this->db->where_not_in('b.group_id', ['1']);
        return $this->db->get()->result();
    }

    public function truncate($table)
    {
        $this->load->helper('file');
        $this->db->query('SET FOREIGN_KEY_CHECKS = 0');
        
        foreach ($table as $tb) {
            $this->db->truncate($tb);
        }

        $this->db->query('SET FOREIGN_KEY_CHECKS = 1');
        delete_files('./uploads/bank_soal/');
        
        $users = $this->not_admin();
        foreach ($users as $user) {
            $this->db->delete('users', array('id' => $user->id));
        }

        return;
    }
}