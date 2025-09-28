<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cKriteria extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mKriteria');
	}

	public function index()
	{
		$data = array(
			'kriteria' => $this->mKriteria->select()
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/vKriteria', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function create()
	{
		$data = array(
			'nama' => $this->input->post('nama'),
			'type' => $this->input->post('type'),
			'bobot' => $this->input->post('bobot')
		);
		$this->mKriteria->insert($data);
		$this->session->set_flashdata('success', 'Data Kriteria berhasil disimpan!');
		redirect('Admin/cKriteria');
	}
	public function update($id)
	{
		$data = array(
			'nama' => $this->input->post('nama'),
			'type' => $this->input->post('type'),
			'bobot' => $this->input->post('bobot')
		);
		$this->mKriteria->update($id, $data);
		$this->session->set_flashdata('success', 'Data Kriteria berhasil diperbaharui!');
		redirect('Admin/cKriteria');
	}
	public function delete($id)
	{
		$this->mKriteria->delete($id);
		$this->session->set_flashdata('success', 'Data Kriteria berhasil dihapus!');
		redirect('Admin/cKriteria');
	}
}

/* End of file cKriteria.php */
