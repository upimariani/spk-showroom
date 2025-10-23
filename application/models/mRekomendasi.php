<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mRekomendasi extends CI_Model
{
	public function select()
	{
		$this->db->select('*');
		$this->db->from('hasil_smart');
		$this->db->join('spk_smart_penilaian', 'spk_smart_penilaian.id_penilaian = hasil_smart.id_penilaian', 'left');
		$this->db->order_by('hasil', 'desc');

		return $this->db->get()->result();
	}
	public function filter($jenis = null, $transmisi = null, $nama = null, $kondisi = null, $kapasitas_a = null, $kapasitas_b = null, $tahun_a = null, $tahun_b = null, $harga_a = null, $harga_b = null)
	{
		$this->db->select('*');
		$this->db->from('spk_smart_penilaian');
		$this->db->join('hasil_smart', 'spk_smart_penilaian.id_penilaian = hasil_smart.id_penilaian', 'left');
		if (!empty($jenis)) {
			$this->db->where('jenis', $jenis);
		}
		if (!empty($transmisi)) {
			$this->db->where('transmisi', $transmisi);
		}
		if (!empty($nama)) {
			$this->db->where('nama_jenis', $nama);
		}
		if (!empty($kondisi)) {
			$this->db->where('kondisi', $kondisi);
		}
		if (!empty($kapasitas_b)) {
			$this->db->where('kapasitas >=', (int) $kapasitas_b);
		}
		if (!empty($kapasitas_a)) {
			$this->db->where('kapasitas <=', (int) $kapasitas_a);
		}
		if (!empty($tahun_b)) {
			$this->db->where('tahun >=', (int) $tahun_b);
		}
		if (!empty($tahun_a)) {
			$this->db->where('tahun <=', (int) $tahun_a);
		}
		if (!empty($harga_b)) {
			$this->db->where('harga >=', (int) $harga_b);
		}
		if (!empty($harga_a)) {
			$this->db->where('harga <=', (int) $harga_a);
		}
		$this->db->order_by('hasil', 'desc');
		return $this->db->get()->result();
	}
}

/* End of file mRekomendasi.php */
