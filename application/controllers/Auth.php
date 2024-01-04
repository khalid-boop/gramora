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
		if (!empty($_POST	['username'])) {
			$this->db->select('username');
			$this->db->from('user');
			$this->db->where('username' , $username);
			$cek_username = $this->db->get();
			if ($cek_username->num_rows() > 0) {
				$this->session->set_flashdata('info_register', '<div class="alert alert-danger">Udah ada bang</div>');
				redirect(base_url('auth/register'));
			} else {
				if ($pass == $confirm_pass) {
					$save['nama'] = $nama;
					$save['username'] = $username;
					$save['password'] = md5($pass);
					$this->db->insert('user' , $save);
					$this->session->set_flashdata('info_register' , '<div class="alert alert-success">Udah Tuh Login Ono!</div>');
					redirect(base_url('auth/login'));
				} else {
					$this->session->set_flashdata('info_register' , '<div class="alert alert-success">Pass wornya mas!</div>');
					redirect(base_url('auth/register'));
				}
			}
		} else {
			$this->session->set_flashdata('info_register' , '<div class="alert alert-danger">Hayo ngapain!</div>');
					redirect(base_url('auth/register'));
		}
	}

	public function ceklogin()
	{
		$user = $this->input->post('username');
		$password = $this->input->post('password');
		if (!empty($_POST['username'])) {
			$cek_akun = $this->db->select('*')
				->from('user')
				->where('username', $user)
				->where('password', md5($password))
				->get();
			if ($cek_akun->num_rows() > 0) {
				//Jika Akun Ditemukan
				foreach( $cek_akun->result() as $akun){}
				$this->session->set_userdata('id' , $akun->id);
				$this->session->set_userdata('nama' , $akun->nama);
				$this->session->set_userdata('username' , $akun->username);
				$this->session->set_flashdata('info_login', '<div class="alert alert-success">Welcome '.$akun->nama.'</div>');
				redirect(base_url('dashboard/index'));
			}else {
				//Jika Akun Ndak Ada
				$this->session->set_flashdata('info_login', '<div class="alert alert-danger">Akun Mu Ndak Ada Mas</div>');
					redirect(base_url('auth/login'));
			}
		}
	}

	public function logout()
	{
		session_destroy();
		$this->session->set_flashdata('info_login' , '<div class="alert alert-danger">Anda Log out</div>');
		redirect(base_url('auth/login'));

	}
}
