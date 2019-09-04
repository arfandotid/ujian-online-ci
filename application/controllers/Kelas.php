<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->ion_auth->logged_in()){
			redirect('auth');
		}else if (!$this->ion_auth->is_admin()){
			show_error('Hanya Administrator yang diberi hak untuk mengakses halaman ini, <a href="'.base_url('dashboard').'">Kembali ke menu awal</a>', 403, 'Akses Terlarang');
		}
		$this->load->library(['datatables', 'form_validation']);// Load Library Ignited-Datatables
		$this->load->model('Master_model', 'master');
		$this->form_validation->set_error_delimiters('','');
	}

	public function output_json($data, $encode = true)
	{
        if($encode) $data = json_encode($data);
        $this->output->set_content_type('application/json')->set_output($data);
    }

    public function index()
	{
		$data = [
			'user' => $this->ion_auth->user()->row(),
			'judul'	=> 'Kelas',
			'subjudul'=> 'Data Kelas'
		];
		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('master/kelas/data');
		$this->load->view('_templates/dashboard/_footer.php');
	}

	public function data()
	{
		$this->output_json($this->master->getDataKelas(), false);
	}

	public function add()
	{
		$data = [
			'user' 		=> $this->ion_auth->user()->row(),
			'judul'		=> 'Tambah Kelas',
			'subjudul'	=> 'Tambah Data Kelas',
			'banyak'	=> $this->input->post('banyak', true),
			'jurusan'	=> $this->master->getAllJurusan()
		];
		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('master/kelas/add');
		$this->load->view('_templates/dashboard/_footer.php');
	}

	public function edit()
	{
		$chk = $this->input->post('checked', true);
		if(!$chk){
			redirect('admin/kelas');
		}else{
			$kelas = $this->master->getKelasById($chk);
			$data = [
				'user' 		=> $this->ion_auth->user()->row(),
				'judul'		=> 'Edit Kelas',
				'subjudul'	=> 'Edit Data Kelas',
				'jurusan'	=> $this->master->getAllJurusan(),
				'kelas'		=> $kelas
			];
			$this->load->view('_templates/dashboard/_header.php', $data);
			$this->load->view('master/kelas/edit');
			$this->load->view('_templates/dashboard/_footer.php');
		}
	}

	public function save()
	{
		$rows = count($this->input->post('nama_kelas', true));
		$mode = $this->input->post('mode', true);
		for ($i=1; $i <= $rows; $i++) { 
			$nama_kelas 	= 'nama_kelas['.$i.']';
			$jurusan_id 	= 'jurusan_id['.$i.']';
			$this->form_validation->set_rules($nama_kelas, 'Kelas', 'required');
			$this->form_validation->set_rules($jurusan_id, 'Jurusan', 'required');
			$this->form_validation->set_message('required', '{field} Wajib diisi');
			
			if($this->form_validation->run() === FALSE){
				$error[] = [
					$nama_kelas 	=> form_error($nama_kelas),
					$jurusan_id 	=> form_error($jurusan_id),
				];
				$status = FALSE;
			}else{
				if($mode == 'add'){
					$insert[] = [
						'nama_kelas' 	=> $this->input->post($nama_kelas, true),
						'jurusan_id' 	=> $this->input->post($jurusan_id, true)
					];
				}else if($mode == 'edit'){
					$update[] = array(
						'id_kelas'		=> $this->input->post('id_kelas['.$i.']', true),
						'nama_kelas' 	=> $this->input->post($nama_kelas, true),
						'jurusan_id' 	=> $this->input->post($jurusan_id, true)
					);
				}
				$status = TRUE;
			}
		}
		if($status){
			if($mode == 'add'){
				$this->master->create('kelas', $insert, true);
				$data['insert']	= $insert;
			}else if($mode == 'edit'){
				$this->master->update('kelas', $update, 'id_kelas', null, true);
				$data['update'] = $update;
			}
		}else{
			if(isset($error)){
				$data['errors'] = $error;
			}
		}
		$data['status'] = $status;
		$this->output_json($data);
	}

	public function delete()
	{
		$chk = $this->input->post('checked', true);
		if(!$chk){
			$this->output_json(['status'=>false]);
		}else{
			if($this->master->delete('kelas', $chk, 'id_kelas')){
				$this->output_json(['status'=>true, 'total'=>count($chk)]);
			}
		}
	}

	public function kelas_by_jurusan($id){
		$data = $this->master->getKelasByJurusan($id);
		$this->output_json($data);
	}
}