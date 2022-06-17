<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\Writer\Csv;

class Tipesoal extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in()) {
			redirect('auth');
		} else if (!$this->ion_auth->is_admin()) {
			show_error('Hanya Administrator yang diberi hak untuk mengakses halaman ini, <a href="' . base_url('dashboard') . '">Kembali ke menu awal</a>', 403, 'Akses Terlarang');
		}
		$this->load->library(['datatables', 'form_validation']); // Load Library Ignited-Datatables
		$this->load->model('Master_model', 'master');
		$this->form_validation->set_error_delimiters('', '');
	}

	public function output_json($data, $encode = true)
	{
		if ($encode) $data = json_encode($data);
		$this->output->set_content_type('application/json')->set_output($data);
	}

	public function index()
	{
		$data = [
			'user' => $this->ion_auth->user()->row(),
			'judul'	=> 'Tipe Soal',
			'subjudul' => 'Data Tipe Soal'
		];
		$this->_header($data);
		$this->load->view('master/tipesoal/data');
		$this->_footer();
	}

	public function data()
	{
		$this->output_json($this->master->getDataTipesoal(), false);
	}

	public function add()
	{
		$data = [
			'user' 		=> $this->ion_auth->user()->row(),
			'judul'		=> 'Tambah Tipe Soal',
			'subjudul'	=> 'Tambah Data Tipe Soal',
			'banyak'	=> $this->input->post('banyak', true)
		];
		$this->_header($data);
		$this->load->view('master/tipesoal/add');
		$this->_footer();
	}

	public function edit()
	{
		$chk = $this->input->post('checked', true);
		if (!$chk) {
			redirect('tipesoal');
		} else {
			$tipesoal = $this->master->getTipesoalById($chk);
			$data = [
				'user' 		=> $this->ion_auth->user()->row(),
				'judul'		=> 'Edit Tipe Soal',
				'subjudul'	=> 'Edit Data Tipe Soal',
				'tipesoal'	=> $tipesoal
			];
			$this->_header($data);
			$this->load->view('master/tipesoal/edit');
			$this->_footer();
		}
	}

	public function save()
	{
		$rows = count($this->input->post('nama_tipesoal', true));
		$mode = $this->input->post('mode', true);
		for ($i = 1; $i <= $rows; $i++) {
			$nama_tipesoal = 'nama_tipesoal[' . $i . ']';
			$this->form_validation->set_rules($nama_tipesoal, 'Tipe Soal', 'required');
			$this->form_validation->set_message('required', '{field} Wajib diisi');

			if ($this->form_validation->run() === FALSE) {
				$error[] = [
					$nama_tipesoal => form_error($nama_tipesoal)
				];
				$status = FALSE;
			} else {
				if ($mode == 'add') {
					$insert[] = [
						'nama_tipesoal' => $this->input->post($nama_tipesoal, true)
					];
				} else if ($mode == 'edit') {
					$update[] = array(
						'id_tipesoal'	=> $this->input->post('id_tipesoal[' . $i . ']', true),
						'nama_tipesoal' 	=> $this->input->post($nama_tipesoal, true)
					);
				}
				$status = TRUE;
			}
		}
		if ($status) {
			if ($mode == 'add') {
				$this->master->create('tipesoal', $insert, true);
				$data['insert']	= $insert;
			} else if ($mode == 'edit') {
				$this->master->update('tipesoal', $update, 'id_tipesoal', null, true);
				$data['update'] = $update;
			}
		} else {
			if (isset($error)) {
				$data['errors'] = $error;
			}
		}
		$data['status'] = $status;
		$this->output_json($data);
	}

	public function delete()
	{
		$chk = $this->input->post('checked', true);
		if (!$chk) {
			$this->output_json(['status' => false]);
		} else {
			if ($this->master->delete('tipesoal', $chk, 'id_tipesoal')) {
				$this->output_json(['status' => true, 'total' => count($chk)]);
			}
		}
	}

	public function import($import_data = null)
	{
		$data = [
			'user' => $this->ion_auth->user()->row(),
			'judul'	=> 'Tipe Soal',
			'subjudul' => 'Import Tipe Soal'
		];
		if ($import_data != null) $data['import'] = $import_data;

		$this->load->view('_templates/dashboard/_header', $data);
		$this->load->view('master/tipesoal/import');
		$this->load->view('_templates/dashboard/_footer');
	}

	public function preview()
	{
		$config['upload_path']		= './uploads/import/';
		$config['allowed_types']	= 'xls|xlsx|csv';
		$config['max_size']			= 2048;
		$config['encrypt_name']		= true;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('upload_file')) {
			$error = $this->upload->display_errors();
			echo $error;
			die;
		} else {
			$file = $this->upload->data('full_path');
			$ext = $this->upload->data('file_ext');

			switch ($ext) {
				case '.xlsx':
					$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
					break;
				case '.xls':
					$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
					break;
				case '.csv':
					$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
					break;
				default:
					echo "unknown file ext";
					die;
			}

			$spreadsheet = $reader->load($file);
			$sheetData = $spreadsheet->getActiveSheet()->toArray();
			$matkul = [];
			for ($i = 1; $i < count($sheetData); $i++) {
				if ($sheetData[$i][0] != null) {
					$matkul[] = $sheetData[$i][0];
				}
			}

			unlink($file);

			$this->import($matkul);
		}
	}
	public function do_import()
	{
		$data = json_decode($this->input->post('tipesoal', true));
		$jurusan = [];
		foreach ($data as $j) {
			$jurusan[] = ['nama_tipesoal' => $j];
		}

		$save = $this->master->create('tipesoal', $jurusan, true);
		if ($save) {
			redirect('tipesoal');
		} else {
			redirect('tipesoal/import');
		}
	}

	public function _header($data = null)
	{
		$this->load->view('_templates/dashboard/_header', $data);
	}

	public function _footer()
	{
		$this->load->view('_templates/dashboard/_footer.php');
	}
}


/* End of file Tipesoal.php */
/* Location: ./application/controllers/Tipesoal.php */