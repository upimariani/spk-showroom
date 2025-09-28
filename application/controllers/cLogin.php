<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cLogin extends CI_Controller
{

	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('vLogin');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$query = $this->db->query("SELECT * FROM `spk_admin` WHERE username='" . $username . "' AND password='" . $password . "'")->row();
			if ($query) {
				if ($query->role == '1') {
					redirect('Admin/cDashboard');
				} else {
					redirect('Pemilik/cDashboard');
				}
			} else {
				$this->session->set_flashdata('error', 'Username dan Password Anda Salah!');
				redirect('cLogin');
			}
		}
	}
	public function logout()
	{
		$this->session->set_flashdata('success', 'Anda Berhasil Logout!');
		redirect('cLogin');
	}
}

/* End of file cLogin.php */
