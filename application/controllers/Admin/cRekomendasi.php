<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cRekomendasi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mRekomendasi');
		$this->load->model('mJenisMobil');
	}
	public function index()
	{
		$data = array(
			'mobil' => $this->mJenisMobil->select()
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/vRekomendasi', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function get_merk()
	{
		$jenis = $this->input->get('jenis');
		$merk = $this->db->query("SELECT * FROM `spk_smart_penilaian` WHERE jenis='" . $jenis . "'")->result();

		// Kirim dalam format HTML <option>
		echo "<option value=''>---Pilih Merk Mobil---</option>";
		foreach ($merk as $value) {
			echo "<option value='{$value->nama_jenis}'>{$value->nama_jenis}</option>";
		}
	}
	public function filter()
	{
		$jenis = $this->input->post('jenis');
		$transmisi = $this->input->post('transmisi');
		$nama = $this->input->post('nama');
		$kondisi = $this->input->post('kondisi');
		$tahun = $this->input->post('tahun');
		$kapasitas = $this->input->post('kapasitas');
		$harga = $this->input->post('harga');




		if (!empty($tahun)) {
			if ($tahun == '1') {
				$tahun_b = 2021;
				$tahun_a = 2025;
			} else if ($tahun == '2') {
				$tahun_b = 2017;
				$tahun_a = 2021;
			} else if ($tahun == '3') {
				$tahun_b = 2014;
				$tahun_a = 2016;
			} else if ($tahun == '4') {
				$tahun_b = 2000;
				$tahun_a = 2014;
			}
		} else {
			$tahun_a = '';
			$tahun_b = '';
		}

		if (!empty($kapasitas)) {
			if ($kapasitas == '1') {
				$kapasitas_b = 8;
				$kapasitas_a = 10;
			} else if ($kapasitas == '2') {
				$kapasitas_b = 6;
				$kapasitas_a = 7;
			} else if ($kapasitas == '3') {
				$kapasitas_b = 2;
				$kapasitas_a = 5;
			}
		} else {
			$kapasitas_a = '';
			$kapasitas_b = '';
		}

		if (!empty($harga)) {
			if ($harga == '1') {
				$harga_b = 0;
				$harga_a = 300000000;
			} else if ($harga == '2') {
				$harga_b = 300000000;
				$harga_a = 400000000;
			} else if ($harga == '3') {
				$harga_b = 400000000;
				$harga_a = 500000000;
			} else if ($harga == '4') {
				$harga_b = 500000000;
				$harga_a = 600000000;
			} else if ($harga == '5') {
				$harga_b = 600000000;
				$harga_a = 1000000000;
			}
		} else {
			$harga_a = '';
			$harga_b = '';
		}


		$query = $this->mRekomendasi->filter($jenis, $transmisi, $nama, $kondisi, $kapasitas_a, $kapasitas_b, $tahun_a, $tahun_b, $harga_a, $harga_b);

		$data = array(
			'mobil' => $query
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/vRekomendasi', $data);
		$this->load->view('Admin/Layout/footer');
	}
}

/* End of file cRekomendasi.php */
