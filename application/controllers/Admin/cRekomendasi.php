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
			'pelanggan' => $this->mRekomendasi->pelanggan()
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/vPelanggan', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function create()
	{
		$data = array(
			'mobil' => $this->mJenisMobil->select()
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/vTambahRekomendasi', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function add()
	{
		$mobil = $this->input->post('mobil');
		$dt = $this->db->query("SELECT * FROM `spk_smart_penilaian` WHERE id_penilaian='" . $mobil . "'")->row();

		$data = array(
			'id' => $dt->id_penilaian,
			'name' => $dt->nama_jenis,
			'price' => $dt->harga,
			'qty' => 1,
			'kondisi' => $dt->kondisi,
			'kapasitas' => $dt->kapasitas,
			'tahun' => $dt->tahun
		);
		$this->cart->insert($data);
		$this->session->set_flashdata('success', 'Data Mobil berhasil ditambahkan!');
		redirect('Admin/cRekomendasi/create');
	}
	public function delete($rowid)
	{
		$this->cart->remove($rowid);
		$this->session->set_flashdata('success', 'Data Mobil berhasil dihapus!');
		redirect('Admin/cRekomendasi/create');
	}
	public function hasil_rekomendasi($id_pelanggan)
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
