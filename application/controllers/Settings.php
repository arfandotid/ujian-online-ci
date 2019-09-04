<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->ion_auth->logged_in()){
			redirect('auth');
		}else if(!$this->ion_auth->is_admin()){
            show_error('Hanya Admin yang boleh mengakses halaman ini', 403, 'Akses dilarang');
		}
		$this->load->model('Settings_model', 'settings');
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
			'judul'	=> 'Settings',
			'subjudul'=> 'Hapus data',
		];

        $this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('settings');
		$this->load->view('_templates/dashboard/_footer.php');
	}
	
	public function truncate()
	{
		$tables = ['h_ujian', 'm_ujian', 'tb_soal', 'kelas_dosen', 'dosen', 'mahasiswa', 'kelas', 'jurusan_matkul', 'matkul', 'jurusan'];
		$this->settings->truncate($tables);

		$this->output_json(['status'=>true]);
	}
}