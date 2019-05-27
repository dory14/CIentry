<?php

class Login extends CI_Controller
{
	function __construct(){
		parent::__construct();
		access();
		$this->load->model('user/User_model');
	}

	function index(){
		$this->load->view('login');
	}
	function cek_log(){
		$username=$this->security->sanitize_filename($this->input->post('username'));
		$password=$this->security->sanitize_filename($this->input->post('password'));
		$ceknum=$this->User_model->cek($username,md5($password))->num_rows();
		$rows=$this->User_model->cek($username,md5($password))->row_array();
		if($ceknum>0){
			$this->session->set_userdata('id',$rows['id_user']);
			$this->session->set_userdata('username',$username);
			$this->session->set_userdata('status',$rows['username']);
			$this->session->set_userdata('level',$rows['akses']);
			redirect('entry/dasboard');
		}else{
			$this->session->set_flashdata('error','Maaf Anda Gagal Login');
			redirect('Login');
		}

	}


}