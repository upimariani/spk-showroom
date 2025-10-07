<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cPerbandingan extends CI_Controller
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
	public function view_perhitungan()
	{
		$data = array(
			'penilaian' => $this->db->query("SELECT * FROM `spk_smart_penilaian`")->result(),
			'bobot' => $this->db->query("SELECT * FROM `hasil_smart` JOIN spk_smart_penilaian ON hasil_smart.id_penilaian=spk_smart_penilaian.id_penilaian")->result()
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/vViewPerhitungan', $data);
		$this->load->view('Admin/Layout/footer');
	}
}

/* End of file cPerbandingan.php */
