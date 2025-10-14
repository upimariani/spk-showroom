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
	public function filter()
	{
		$jenis = $this->input->post('jenis');
		$transmisi = $this->input->post('transmisi');
		$nama = $this->input->post('nama');
		$kondisi = $this->input->post('kondisi');
		$tahun = $this->input->post('tahun');
		$kapasitas = $this->input->post('kapasitas');
		$harga = $this->input->post('harga');

		if ($nama == 'all' && $kondisi == 'all' && $tahun == 'all' && $kapasitas == 'all' && $harga == 'all') {
			$data = array(
				'mobil' => $this->mJenisMobil->select()
			);
			$this->load->view('Admin/Layout/head');
			$this->load->view('Admin/vRekomendasi', $data);
			$this->load->view('Admin/Layout/footer');
		} else {
			if ($tahun != 'all') {
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
			}

			if ($kapasitas != 'all') {
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
			}

			if ($harga != 'all') {
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
			}


			if ($nama == 'all') {
				$query = $this->mRekomendasi->filer_nama($jenis, $transmisi, $kondisi, $kapasitas_a, $kapasitas_b, $tahun_a, $tahun_b, $harga_a, $harga_b);
			} else if ($kondisi == 'all') {
				$query = $this->mRekomendasi->filter_kondisi($jenis, $transmisi, $nama,  $kapasitas_a, $kapasitas_b, $tahun_a, $tahun_b, $harga_a, $harga_b);
			} else if ($tahun == 'all') {
				$query = $this->mRekomendasi->filter_tahun($jenis, $transmisi, $nama, $kondisi, $kapasitas_a, $kapasitas_b,  $harga_a, $harga_b);
			} else if ($kapasitas == 'all') {
				$query = $this->mRekomendasi->filter_kapasitas($jenis, $transmisi, $nama, $kondisi,  $tahun_a, $tahun_b, $harga_a, $harga_b);
			} else if ($harga == 'all') {
				$query = $this->mRekomendasi->filter_harga($jenis, $transmisi, $nama, $kondisi, $kapasitas_a, $kapasitas_b, $tahun_a, $tahun_b);
			} else {
				$query = $this->mRekomendasi->filter_all($jenis, $transmisi, $nama, $kondisi, $kapasitas_a, $kapasitas_b, $tahun_a, $tahun_b, $harga_a, $harga_b);
			}

			$data = array(
				'mobil' => $query
			);
			$this->load->view('Admin/Layout/head');
			$this->load->view('Admin/vRekomendasi', $data);
			$this->load->view('Admin/Layout/footer');
		}
	}
}

/* End of file cRekomendasi.php */
