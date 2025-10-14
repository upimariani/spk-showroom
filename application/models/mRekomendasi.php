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

	public function filter_all($jenis, $transmisi, $nama, $kondisi, $kapasitas_a, $kapasitas_b, $tahun_a, $tahun_b, $harga_a, $harga_b)
	{
		//filer all
		return $this->db->query("SELECT * FROM `spk_smart_penilaian` JOIN hasil_smart ON spk_smart_penilaian.id_penilaian=hasil_smart.id_penilaian WHERE jenis='" . $jenis . "' AND transmisi='" . $transmisi . "' AND nama_jenis='" . $nama . "' AND kondisi='" . $kondisi . "' AND kapasitas >= " . $kapasitas_b . " AND kapasitas <= " . $kapasitas_a . " AND tahun >= " . $tahun_b . " AND tahun <= " . $tahun_a . " AND harga >= " . $harga_b . " AND harga <= " . $harga_a . " ORDER BY hasil DESC")->result();
	}
	public function filer_nama($jenis, $transmisi, $kondisi, $kapasitas_a, $kapasitas_b, $tahun_a, $tahun_b, $harga_a, $harga_b)
	{
		return $this->db->query("SELECT * FROM `spk_smart_penilaian` JOIN hasil_smart ON spk_smart_penilaian.id_penilaian=hasil_smart.id_penilaian WHERE jenis='" . $jenis . "' AND transmisi='" . $transmisi . "' AND kondisi='" . $kondisi . "' AND kapasitas >= " . $kapasitas_b . " AND kapasitas <= " . $kapasitas_a . " AND tahun >= " . $tahun_b . " AND tahun <= " . $tahun_a . " AND harga >= " . $harga_b . " AND harga <= " . $harga_a . " ORDER BY hasil DESC")->result();
	}
	public function filter_kondisi($jenis, $transmisi, $nama, $kapasitas_a, $kapasitas_b, $tahun_a, $tahun_b, $harga_a, $harga_b)
	{
		return $this->db->query("SELECT * FROM `spk_smart_penilaian` JOIN hasil_smart ON spk_smart_penilaian.id_penilaian=hasil_smart.id_penilaian WHERE jenis='" . $jenis . "' AND transmisi='" . $transmisi . "' AND nama_jenis='" . $nama . "' AND kapasitas >= " . $kapasitas_b . " AND kapasitas <= " . $kapasitas_a . " AND tahun >= " . $tahun_b . " AND tahun <= " . $tahun_a . " AND harga >= " . $harga_b . " AND harga <= " . $harga_a . " ORDER BY hasil DESC")->result();
	}
	public function filter_kapasitas($jenis, $transmisi, $nama, $kondisi,  $tahun_a, $tahun_b, $harga_a, $harga_b)
	{
		return $this->db->query("SELECT * FROM `spk_smart_penilaian` JOIN hasil_smart ON spk_smart_penilaian.id_penilaian=hasil_smart.id_penilaian WHERE jenis='" . $jenis . "' AND transmisi='" . $transmisi . "' AND kondisi='" . $kondisi . "' AND nama_jenis='" . $nama . "' AND tahun >= " . $tahun_b . " AND tahun <= " . $tahun_a . " AND harga >= " . $harga_b . " AND harga <= " . $harga_a . " ORDER BY hasil DESC")->result();
	}
	public function filter_tahun($jenis, $transmisi, $nama, $kondisi, $kapasitas_a, $kapasitas_b,  $tahun_b, $harga_a, $harga_b)
	{
		return $this->db->query("SELECT * FROM `spk_smart_penilaian` JOIN hasil_smart ON spk_smart_penilaian.id_penilaian=hasil_smart.id_penilaian WHERE jenis='" . $jenis . "' AND transmisi='" . $transmisi . "' AND kondisi='" . $kondisi . "' AND kapasitas >= " . $kapasitas_b . " AND kapasitas <= " . $kapasitas_a . " AND tahun >= " . $tahun_b . " AND nama_jenis='" . $nama . "' AND harga >= " . $harga_b . " AND harga <= " . $harga_a . " ORDER BY hasil DESC")->result();
	}
	public function filter_harga($jenis, $transmisi, $nama, $kondisi, $kapasitas_a, $kapasitas_b, $tahun_a, $tahun_b)
	{
		return $this->db->query("SELECT * FROM `spk_smart_penilaian` JOIN hasil_smart ON spk_smart_penilaian.id_penilaian=hasil_smart.id_penilaian WHERE jenis='" . $jenis . "' AND transmisi='" . $transmisi . "' AND kondisi='" . $kondisi . "' AND kapasitas >= " . $kapasitas_b . " AND kapasitas <= " . $kapasitas_a . " AND tahun >= " . $tahun_b . " AND tahun <= " . $tahun_a . " AND nama_jenis='" . $nama . "' ORDER BY hasil DESC")->result();
	}
}

/* End of file mRekomendasi.php */
