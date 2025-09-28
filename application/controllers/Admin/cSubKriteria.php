<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cSubKriteria extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mSubKriteria');
	}

	public function lihat($id, $kriteria)
	{
		$data = array(
			'id_kriteria' => $id,
			'kriteria' => $kriteria,
			'sub_kriteria' => $this->mSubKriteria->select($id)
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/vSubKriteria', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function create($id_kriteria, $kriteria)
	{
		$data = array(
			'id_kriteria' => $id_kriteria,
			'nama_sub' => $this->input->post('nama'),
			'bobot_sub' => $this->input->post('bobot')
		);
		$this->mSubKriteria->insert($data);
		$this->session->set_flashdata('success', 'Data Sub Kriteria berhasil disimpan!');
		redirect('Admin/cSubKriteria/lihat/' . $id_kriteria . '/' . $kriteria);
	}
	public function update($id_kriteria, $kriteria, $id_sub_kriteria)
	{
		$data = array(
			'id_kriteria' => $id_kriteria,
			'nama_sub' => $this->input->post('nama'),
			'bobot_sub' => $this->input->post('bobot')
		);
		$this->mSubKriteria->update($id_sub_kriteria, $data);
		$this->session->set_flashdata('success', 'Data Sub Kriteria berhasil diperbaharui!');
		redirect('Admin/cSubKriteria/lihat/' . $id_kriteria . '/' . $kriteria);
	}
	public function delete($id_kriteria, $kriteria, $id_sub_kriteria)
	{
		$this->mSubKriteria->delete($id_sub_kriteria);
		$this->session->set_flashdata('success', 'Data Sub Kriteria berhasil dihapus!');
		redirect('Admin/cSubKriteria/lihat/' . $id_kriteria . '/' . $kriteria);
	}
}

/* End of file cSubKriteria.php */
