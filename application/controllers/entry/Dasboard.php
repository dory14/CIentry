<?php

class Dasboard extends CI_Controller{
	
	function __construct(){

		parent::__construct();
		$this->load->helper('url');
		$config['tag_open'] = '<ul class="breadcrumb">';
		$config['tag_close'] = '</ul>';
		$config['li_open'] = '<li>';
		$config['li_close'] = '</li>';
		$config['divider'] = '<span class="divider"> » </span>';
		$this->breadcrumb->initialize($config);
		naccess();
	}
	public function index()
	{
		$data=array(
			"title"=>'Dashboard',
			"menu"=>getmenu(),
			"aktif"=>"dashboard",
			"content"=>"dasboard/dasboard.php",
		);
		$this->breadcrumb->append_crumb('Dashboard', site_url('welcome'));
		$this->load->view('templatedash',$data);
	}
	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('status');
		$this->session->unset_userdata('level');
		$this->session->set_flashdata('sukses', 'Terimakasih Telah Menggunakan Aplikasi Kami');
		redirect('login');
	}
	
}