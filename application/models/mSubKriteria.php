<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mSubKriteria extends CI_Model
{
	public function select($id)
	{
		$this->db->select('*');
		$this->db->from('sub_kriteria');
		$this->db->join('spk_smart_kriteria', 'spk_smart_kriteria.id = sub_kriteria.id_kriteria', 'left');
		$this->db->where('spk_smart_kriteria.id', $id);
		return $this->db->get()->result();
	}
	public function insert($data)
	{
		$this->db->insert('sub_kriteria', $data);
	}
	public function update($id, $data)
	{
		$this->db->where('id_sub_kriteria', $id);
		$this->db->update('sub_kriteria', $data);
	}
	public function delete($id)
	{
		$this->db->where('id_sub_kriteria', $id);
		$this->db->delete('sub_kriteria');
	}
}

/* End of file mSubKriteria.php */
