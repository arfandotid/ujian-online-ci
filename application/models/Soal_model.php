<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Soal_model extends CI_Model {
    
    public function getDataSoal($id, $dosen, $is_kraepelin=false)
    {
        $table = $is_kraepelin ? 'tb_soal_kraepelin' : 'tb_soal';
        $this->datatables->select('a.id_soal, a.soal, FROM_UNIXTIME(a.created_on) as created_on, FROM_UNIXTIME(a.updated_on) as updated_on, b.nama_matkul, c.nama_dosen');
        $this->datatables->from($table.' a');
        $this->datatables->join('matkul b', 'b.id_matkul=a.matkul_id');
        $this->datatables->join('dosen c', 'c.id_dosen=a.dosen_id');
        if ($id!==null && $dosen===null) {
            $this->datatables->where('a.matkul_id', $id);            
        }else if($id!==null && $dosen!==null){
            $this->datatables->where('a.dosen_id', $dosen);
        }else if ($is_kraepelin){
            $this->datatables->where('b.nama_matkul like ', '%kraepelin%');
        }
        return $this->datatables->generate();
    }

    public function getSoalById($id)
    {
        return $this->db->get_where('tb_soal', ['id_soal' => $id])->row();
    }

    public function getMatkulDosen($nip, $is_kraepelin=false)
    {
        $this->db->select('d.matkul_id, m.nama_matkul, d.id_dosen, d.nama_dosen');
        $this->db->join('matkul m', 'd.matkul_id=m.id_matkul');
        $this->db->from('dosen d')->where('d.nip', $nip);
        if ($is_kraepelin){
            $this->db->where('m.nama_matkul like ', '%kraepelin%');
        }
        return $this->db->get()->row();
    }

    public function getAllDosen()
    {
        $this->db->select('*');
        $this->db->from('dosen a');
        $this->db->join('matkul b', 'a.matkul_id=b.id_matkul');
        return $this->db->get()->result();
    }

    public function getDosenWhereMatkul($matkul)
    {
     $this->db->select('matkul_id, nama_matkul, id_dosen, nama_dosen');
    $this->db->join('matkul', 'matkul_id=id_matkul');
    $this->db->from('dosen')->where('nama_matkul like ', '%'.$matkul.'%');
    return $this->db->get()->row();   
    }

    public function getKraepelin()
    {
        return $this->db->get('tb_soal_kraepelin')->result();
    }
}