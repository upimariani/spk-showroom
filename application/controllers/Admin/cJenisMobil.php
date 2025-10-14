<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cJenisMobil extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mJenisMobil');
	}

	public function index()
	{
		$data = array(
			'jenis_mobil' => $this->mJenisMobil->select()
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/vJenisMobil', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function penilaian($kondisi, $kapasitas, $tahun, $harga, $status, $id)
	{
		if ($kondisi == 'Sangat Baik') {
			$b_kondisi = 5;
		} else if ($kondisi == 'Baik') {
			$b_kondisi = 4;
		} else if ($kondisi == 'Cukup') {
			$b_kondisi = 3;
		} else if ($kondisi == 'Kurang') {
			$b_kondisi = 2;
		} else if ($kondisi == 'Buruk') {
			$b_kondisi = 1;
		}

		if ($kapasitas >= 8) {
			$b_kapasitas = 5;
		} else if ($kapasitas >= 6 && $kapasitas < 8) {
			$b_kapasitas = 4;
		} else if ($kapasitas < 6) {
			$b_kapasitas = 3;
		}

		if ($tahun >= 2020) {
			$b_tahun = 4;
		} else if ($tahun > 2017 && $tahun <= 2021) {
			$b_tahun = 3;
		} else if ($tahun > 2014 && $tahun <= 2017) {
			$b_tahun = 2;
		} else if ($tahun <= 2014) {
			$b_tahun = 1;
		}

		if ($harga <= 300000000) {
			$b_harga = 5;
		} else if ($harga > 300000000 && $harga <= 400000000) {
			$b_harga = 4;
		} else if ($harga > 400000000 && $harga <= 500000000) {
			$b_harga = 3;
		} else if ($harga > 500000000 && $harga <= 600000000) {
			$b_harga = 2;
		} else if ($harga > 600000000) {
			$b_harga = 1;
		}


		$data = array(
			'id_penilaian' => $id,
			'b_kondisi' => $b_kondisi,
			'b_kapasitas' => $b_kapasitas,
			'b_tahun' => $b_tahun,
			'b_harga' => $b_harga,
		);
		if ($status == '1') {
			$this->db->insert('hasil_smart', $data);
		} else {
			$this->db->where('id_penilaian', $id);
			$this->db->update('hasil_smart', $data);
		}
	}
	public function perhitungan_smart()
	{
		$v1 = array();
		$v2 = array();
		$v3 = array();
		$v4 = array();
		$variabel = $this->db->query("SELECT * FROM `hasil_smart`")->result();
		foreach ($variabel as $key => $value) {
			$v1[] = $value->b_kondisi;
			$v2[] = $value->b_kapasitas;
			$v3[] = $value->b_tahun;
			$v4[] = $value->b_harga;
		}

		//mencari nilai min dan max
		$min_v1 = min($v1);
		$max_v1 = max($v1);
		$p_v1 = $max_v1 - $min_v1;

		$min_v2 = min($v2);
		$max_v2 = max($v2);
		$p_v2 = $max_v2 - $min_v2;

		$min_v3 = min($v3);
		$max_v3 = max($v3);
		$p_v3 = $max_v3 - $min_v3;

		$min_v4 = min($v4);
		$max_v4 = max($v4);
		$p_v4 = $max_v4 - $min_v4;

		//mencari nilai u
		foreach ($variabel as $key => $a) {
			if ($p_v1 != 0) {
				$u1 = ($a->b_kondisi - $min_v1) / $p_v1;
			} else {
				$u1 = 0;
			}

			if ($p_v2 != 0) {
				$u2 = ($a->b_kapasitas - $min_v2) / $p_v2;
			} else {
				$u2 = 0;
			}

			if ($p_v3 != 0) {
				$u3 = ($a->b_tahun - $min_v3) / $p_v3;
			} else {
				$u3 = 0;
			}

			if ($p_v4 != 0) {
				$u4 = ($a->b_harga - $min_v4) / $p_v4;
			} else {
				$u4 = 0;
			}

			//mengkalikan dengan bobot ternormalisasi dan dijumlahkan
			$bt_total = (0.75 * $u1) + (0.2 * $u2) + (0.75 * $u3) + (0.75 * $u4);
			$data = array(
				'hasil' => $bt_total
			);
			$this->db->where('id_penilaian', $a->id_penilaian);
			$this->db->update('hasil_smart', $data);
		}
	}
	public function create()
	{
		$config['upload_path']          = './asset/gambar';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 500000;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('gambar')) {
			$data = array(
				'jenis_mobil' => $this->mJenisMobil->select()
			);
			$this->load->view('Admin/Layout/head');
			$this->load->view('Admin/vJenisMobil', $data);
			$this->load->view('Admin/Layout/footer');
		} else {
			$upload_data = $this->upload->data();
			$data = array(
				'nama_jenis' => $this->input->post('nama'),
				'kondisi' => $this->input->post('kondisi'),
				'kapasitas' => $this->input->post('kapasitas'),
				'tahun' => $this->input->post('tahun'),
				'harga' => $this->input->post('harga'),
				'gambar' => $upload_data['file_name'],
				'jenis' => $this->input->post('jenis'),
				'transmisi' => $this->input->post('transmisi')
			);
			$this->mJenisMobil->insert($data);

			//menyimpan data di tabel hasil smart
			$id = $this->db->query("SELECT MAX(id_penilaian) as penilaian FROM `spk_smart_penilaian`")->row();
			$this->penilaian($data['kondisi'], $data['kapasitas'], $data['tahun'], $data['harga'], 1, $id->penilaian);

			$this->perhitungan_smart();
			$this->session->set_flashdata('success', 'Data Jenis Mobil berhasil disimpan!');
			redirect('Admin/cJenisMobil');
		}
	}
	public function update($id)
	{

		$config['upload_path']          = './asset/gambar';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 500000;

		$this->load->library('upload', $config);


		if (!$this->upload->do_upload('gambar')) {

			$data = array(
				'jenis_mobil' => $this->mJenisMobil->select()
			);
			$this->load->view('Admin/Layout/head');
			$this->load->view('Admin/vJenisMobil', $data);
			$this->load->view('Admin/Layout/footer');
		} else {

			$upload_data = $this->upload->data();
			$data = array(
				'nama_jenis' => $this->input->post('nama'),
				'kondisi' => $this->input->post('kondisi'),
				'kapasitas' => $this->input->post('kapasitas'),
				'tahun' => $this->input->post('tahun'),
				'harga' => $this->input->post('harga'),
				'gambar' => $upload_data['file_name'],
				'jenis' => $this->input->post('jenis'),
				'transmisi' => $this->input->post('transmisi')
			);
			$this->mJenisMobil->update($id, $data);

			//memperbaharui data di tabel hasil smart
			$this->penilaian($data['kondisi'], $data['kapasitas'], $data['tahun'], $data['harga'], 2, $id);

			$this->perhitungan_smart();
			$this->session->set_flashdata('success', 'Data Jenis Mobil berhasil diperbaharui!');
			redirect('Admin/cJenisMobil');
		} //tanpa ganti gambar
		$upload_data = $this->upload->data();
		$data = array(
			'nama_jenis' => $this->input->post('nama'),
			'kondisi' => $this->input->post('kondisi'),
			'kapasitas' => $this->input->post('kapasitas'),
			'tahun' => $this->input->post('tahun'),
			'harga' => $this->input->post('harga'),
			'jenis' => $this->input->post('jenis'),
			'transmisi' => $this->input->post('transmisi')
		);
		$this->mJenisMobil->update($id, $data);

		//memperbaharui data di tabel hasil smart
		$this->penilaian($data['kondisi'], $data['kapasitas'], $data['tahun'], $data['harga'], 2, $id);

		$this->perhitungan_smart();
		$this->session->set_flashdata('success', 'Data Jenis Mobil berhasil diperbaharui!');
		redirect('Admin/cJenisMobil');
	}
	public function delete($id)
	{
		$this->mJenisMobil->delete($id);
		$this->session->set_flashdata('success', 'Data Jenis Mobil berhasil dihapus!');
		redirect('Admin/cJenisMobil');
	}
}

/* End of file cJenisMobl.php */
