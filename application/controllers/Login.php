<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct()
	{
		parent::__construct();		
		$this->load->model('M_login');
	}

	function index(){
		$this->load->view('login');
	}
 
	function masuk(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password)
			);
		$lihat = $this->M_login->status("user",$where);
		if($lihat->num_rows() > 0){
			foreach ($lihat->result() as $xx) {
                    $sess_data['username'] = $xx->username;
                    $sess_data['role'] = $xx->role;
					$sess_data['nama'] = $xx->nama;
					$sess_data['status'] = "is_login"; 
                    $this->session->set_userdata('login', $sess_data);
                }
			if($sess_data['role'] == "karyawan")
			{
			redirect(base_url("karyawan/dashboard"));
			}
			else{
				redirect(base_url("admin/dashboard"));
			}
 
		}else{
			echo "<script type='text/javascript'>alert('Unregistered Username or Password');window.location = './';</script>";
		}
	}
 
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('Login'));
	}
}
