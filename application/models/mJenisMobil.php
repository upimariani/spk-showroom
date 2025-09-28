<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mJenisMobil extends CI_Model
{
	public function select()
	{
		$this->db->select('*');
		$this->db->from('spk_smart_penilaian');
		return $this->db->get()->result();
	}
	public function insert($data)
	{
		$this->db->insert('spk_smart_penilaian', $data);
	}
	public function update($id, $data)
	{
		$this->db->where('id_penilaian', $id);
		$this->db->update('spk_smart_penilaian', $data);
	}
	public function delete($id)
	{
		$this->db->where('id_penilaian', $id);
		$this->db->delete('spk_smart_penilaian');

		$this->db->where('id_penilaian', $id);
		$this->db->delete('hasil_smart');
	}
}

/* End of file mJenisMobil.php */
