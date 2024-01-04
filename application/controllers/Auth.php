<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function login()
	{
		$this->load->view("auth/login");
	}

	public function register()
	{
		$this->load->view("auth/register");
	}

	public function proses_register()
	{
		$nama = $this->input->post("nama");
		$username = $this->input->post("username");
		$pass = $this->input->post("password");
		$confirm_pass = $this->input->post("confirm-password");
		if (!empty($_POST['username'])) {
			$this->db->select('username');
			$this->db->from('user');
			$cek_username = $this->db->get();
			if ($cek_username->num_rows() > 0) {
				//ada yg sama
				$this->session->set_flashdata('info_register', '<div class="alert alert-danger">Ada Yg Sama Bang Maaf ganti dulu!</div>');
				redirect(base_url('auth/register'));
			} else {
				//sek pass dulu
				//baru save
				if ($pass == $confirm_pass) {
					$save['nama'] = $nama;
					$save['username'] = $username;
					$save['password'] = md5($pass);
					$cek = $this->db->insert('user', $save);
					if ($cek) {
						$this->session->set_flashdata('info_register', '<div class="alert alert-success">DAH, login ono!</div>');
						redirect(base_url('auth/login'));
					} else {
						$this->session->set_flashdata('info_register', '<div class="alert alert-danger">Hmmm Coba lo ulang lagi</div>');
						redirect(base_url('auth/register'));
					}
				} else {
					$this->session->set_flashdata('info_register', '<div class="alert alert-danger">Password mu mas</div>');
                    redirect(base_url('auth/register'));
				}
			}
		}
	}
}
