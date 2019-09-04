<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matkul extends CI_Controller {

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
			'judul'	=> 'Mata Kuliah',
			'subjudul'=> 'Data Mata Kuliah'
		];
		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('master/matkul/data');
		$this->load->view('_templates/dashboard/_footer.php');
	}

	public function data()
	{
		$this->output_json($this->master->getDataMatkul(), false);
	}

	public function add()
	{
		$data = [
			'user' 		=> $this->ion_auth->user()->row(),
			'judul'		=> 'Tambah Mata Kuliah',
			'subjudul'	=> 'Tambah Data Mata Kuliah',
			'banyak'	=> $this->input->post('banyak', true)
		];
		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('master/matkul/add');
		$this->load->view('_templates/dashboard/_footer.php');
	}

	public function edit()
	{
        $chk = $this->input->post('checked', true);
		if(!$chk){
            redirect('matkul');
		}else{
            $matkul = $this->master->getMatkulById($chk);
			$data = [
                'user' 		=> $this->ion_auth->user()->row(),
				'judul'		=> 'Edit Mata Kuliah',
				'subjudul'	=> 'Edit Data Mata Kuliah',
				'matkul'	=> $matkul
			];
			$this->load->view('_templates/dashboard/_header.php', $data);
			$this->load->view('master/matkul/edit');
			$this->load->view('_templates/dashboard/_footer.php');
		}
	}

	public function save()
	{
		$rows = count($this->input->post('nama_matkul', true));
		$mode = $this->input->post('mode', true);
		for ($i=1; $i <= $rows; $i++) { 
            $nama_matkul = 'nama_matkul['.$i.']';
			$this->form_validation->set_rules($nama_matkul, 'Mata Kuliah', 'required');
			$this->form_validation->set_message('required', '{field} Wajib diisi');
			
			if($this->form_validation->run() === FALSE){
                $error[] = [
                    $nama_matkul => form_error($nama_matkul)
				];
				$status = FALSE;
			}else{
                if($mode == 'add'){
                    $insert[] = [
                        'nama_matkul' => $this->input->post($nama_matkul, true)
					];
				}else if($mode == 'edit'){
                    $update[] = array(
                        'id_matkul'	=> $this->input->post('id_matkul['.$i.']', true),
						'nama_matkul' 	=> $this->input->post($nama_matkul, true)
					);
				}
				$status = TRUE;
			}
		}
		if($status){
            if($mode == 'add'){
                $this->master->create('matkul', $insert, true);
				$data['insert']	= $insert;
			}else if($mode == 'edit'){
				$this->master->update('matkul', $update, 'id_matkul', null, true);
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
            if($this->master->delete('matkul', $chk, 'id_matkul')){
                $this->output_json(['status'=>true, 'total'=>count($chk)]);
            }
        }
	}
}