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
	public function pelanggan()
	{
		$this->db->select('*');
		$this->db->from('pelanggan');
		return $this->db->get()->result();
	}
}

/* End of file mRekomendasi.php */
