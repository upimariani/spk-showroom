<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cRekomendasi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mRekomendasi');
	}


	public function index()
	{
		$data = array(
			'hasil_rekomendasi' => $this->mRekomendasi->select()
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/vHasilRekomendasi', $data);
		$this->load->view('Admin/Layout/footer');
	}
}

/* End of file cRekomendasi.php */
