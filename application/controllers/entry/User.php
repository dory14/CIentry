<?php

class User extends CI_Controller{
	
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
		$this->load->model('user/User_model');
	}
	public function index()
	{
		$data=array(
			"title"=>'Pengguna/user',
			"menu"=>getmenu(),
			"aktif"=>"User",
			"content"=>"user/index.php",
			"users"=>$this->User_model->user()->result(),
		);
		$this->breadcrumb->append_crumb('User Data', site_url('user'));
		$this->load->view('template',$data);
	}
	public function add()
	{
		$data=array(
			"title"=>'Tambah Pengguna',
			"menu"=>getmenu(),
			"content"=>"user/add.php",
			"aktif"=>"ubah",
			"action"=>"entry/user/add",
		);
		$this->validation();
		if($this->form_validation->run()){
			$user['username']=$this->input->post('username');
			$user['password']=md5($this->input->post('password'));
			$user['status']=$this->input->post('status');
			$user['akses']=$this->input->post('akses');
		
		$this->User_model->add($user);
		redirect('entry/user');	
		}else{
			$data['user']['id_user']='';
			$data['user']['username']='';
			$data['user']['password']='';
			$data['user']['status']='';
			$data['user']['akses']='';

		}
		$this->breadcrumb->append_crumb('User Data', site_url('entry/user'));
		$this->breadcrumb->append_crumb('Tambah Pengguna', site_url('entry/user'));
		$this->load->view('template',$data);
	}
	public function hapus($id)
	{
		$this->User_model->delete($id);
		redirect('entry/user','refresh');
	}
	public function update($id)
	{
		$data=array(
			"title"=>'Edit Pengguna',
			"menu"=>getmenu(),
			"action"=>'entry/User/update/'.$id,
			"entry"=>$this->User_model->cek_id($id)->row_array(),
			"aktif"=>"MasterData",
			"content"=>"user/add.php",
		);

		$this->validation();
		if($this->form_validation->run()){
				$id=$user['id_user']=$this->input->post('id_user');
				$user['username']=$this->input->post('username');
				$user['password']=md5($this->input->post('password'));
				$user['status']=$this->input->post('status');
				$user['akses']=$this->input->post('akses');
				$this->User_model->update($id,$user);
				redirect('entry/user/');

		}else{
					$data['user']=$this->User_model->cek_id($id)->row_array();
					
					
		}
		$this->breadcrumb->append_crumb('User Data', site_url('entry/user'));
		$this->breadcrumb->append_crumb('Update User ', site_url('entry/user'));
		$this->load->view('template',$data);
	}

	public function Ubah_Password($id)
	{
		$data=array(
			"title"=>'Ubah_Password',
			"menu"=>getmenu(),
			"action"=>'entry/User/Ubah_Password/'.$id,
			"entry"=>$this->User_model->cek_id($id)->row_array(),
			"content"=>"user/Ubah_Password.php",
			"aktif"=>"",
		);

		$this->validation1();
		if($this->form_validation->run()){
				$id=$this->input->post('id_user');
				$username=$this->input->post('username');
				$passwordLama=$this->input->post('password_lama');
				$passwordBaru=$this->input->post('password_baru');
				$konfirmasi=$this->input->post('konfirmasi_password');
				$cek=$this->User_model->cek_id($id)->row_array();
				if(md5($passwordLama)!=$cek['password']){
					$this->session->set_flashdata('error','password Lama anda salah');
					redirect('entry/user/Ubah_Password/'.$id);
				}else if($passwordBaru!=$konfirmasi){
						$this->session->set_flashdata('error','Konfirmasi password tidak sama');
						redirect('entry/user/Ubah_Password/'.$id);
				}else if(md5($passwordBaru)==$cek['password']){
						$this->session->set_flashdata('error','password telah di gunakan sebelumnya');
						redirect('entry/user/Ubah_Password/'.$id);
				}else{
						$id=$id;
						$data1['username']=$username;
						$data1['password']=md5($passwordBaru);
				
				$this->User_model->update($id,$data1);
				$this->session->set_flashdata('sukses','Password berhasil di update');
				redirect('entry/Dasboard/');
			}

		}else{
					$data['user']=$this->User_model->cek_id($id)->row_array();
					
					
		}
		$this->breadcrumb->append_crumb('Ubah_Password', site_url('entry/user/Ubah_Password'));
		$this->load->view('template',$data);
	}

	public function validation()
	{
		$this->form_validation->set_rules('username','username','required');
		$this->form_validation->set_rules('password','password','required');
		$this->form_validation->set_rules('status','status','required');
		$this->form_validation->set_rules('akses','akses','required|numeric');
	}
	public function validation1()
	{
		$this->form_validation->set_rules('username','username','required');
		$this->form_validation->set_rules('password_lama','password','required');
	}
}