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
		$this->load->view('Pemilik/Layout/head');
		$this->load->view('Pemilik/vHasilRekomendasi', $data);
		$this->load->view('Pemilik/Layout/footer');
	}
}

/* End of file cRekomendasi.php */
