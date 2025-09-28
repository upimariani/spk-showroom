<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mKriteria extends CI_Model
{
	public function select()
	{
		$this->db->select('*');
		$this->db->from('spk_smart_kriteria');
		return $this->db->get()->result();
	}
	public function insert($data)
	{
		$this->db->insert('spk_smart_kriteria', $data);
	}
	public function update($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('spk_smart_kriteria', $data);
	}
	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('spk_smart_kriteria');
	}
}

/* End of file mKriteria.php */
