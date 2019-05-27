<?php

class HarianData extends CI_controller{
	public function __construct(){
	parent::__construct();
		$this->load->helper('url');
		$config['tag_open'] = '<ul class="breadcrumb">';
		$config['tag_close'] = '</ul>';
		$config['li_open'] = '<li>';
		$config['li_close'] = '</li>';
		$config['divider'] = '<span class="divider"> » </span>';
		$this->breadcrumb->initialize($config);
		$this->load->model(['entry/HarianData_model','entry/MasterData_model']);
		naccess();
		
	}

	public function index(){
	
		$data=array(
			"title"=>'Data Entry',
			"menu"=>getmenu(),
			"entry"=>$this->HarianData_model->view()->result(),
			"aktif"=>"HarianData",
			"content"=>"hariandata/index.php",
		);
	$this->breadcrumb->append_crumb('Harian Data', site_url('entry/hariandata'));
		$this->load->view('template',$data);

	}

	public function add()
	{
		$data=array(
			"title"=>'Tamabah Data',
			"menu"=>getmenu(),
			"action"=>'entry/hariandata/add',
			"option"=>$this->MasterData_model->view()->result(),
			"aktif"=>"HarianData",
			"content"=>"hariandata/_form.php",
		);
		$this->validation();
		if($this->form_validation->run()){
			
			$entry['kd_rek']=$this->input->post('kd_rek');
			$entry['tgl_stor']=date('Y-m-d',strtotime($this->input->post('tgl')));
			$entry['jml_bayar']=$this->input->post('jml');
			
			$this->HarianData_model->add($entry);
			redirect("entry/hariandata");


			
		}else{
			$data['entry']['id_transaksi']='';
			$data['entry']['tgl_stor']='';
			$data['entry']['jml_bayar']='';
		}
		$this->breadcrumb->append_crumb('Harian Data', site_url('entry/hariandata'));
		$this->breadcrumb->append_crumb('Tambah Data ', site_url('entry/HarianData'));
		$this->load->view('template',$data);
	}
	public function delete($id){
		$this->HarianData_model->delete($id);
		redirect('entry/hariandata','refresh');
	}

	public function update($id){
		$this->validation();
		$data=array(
			"title"=>'Edit Data',
			"menu"=>getmenu(),
			"action"=>'entry/hariandata/update/'.$id,
			"option"=>$this->MasterData_model->view()->result(),
			"entry"=>$this->HarianData_model->cek_id($id)->row_array(),
			"aktif"=>"HarianData",
			"content"=>"hariandata/_form.php",
		);
		if($this->form_validation->run()){
				$id=$entry['id_transaksi']=$this->input->post('id_transaksi');
				$entry['kd_rek']=$this->input->post('kd_rek');
				$entry['tgl_stor']=$this->input->post('tgl');
				$entry['jml_bayar']=$this->input->post('jml');
				$this->HarianData_model->update($id,$entry);
				redirect('entry/hariandata');

		}else{
					$data['entry']=$this->HarianData_model->cek_id($id)->row_array();
					$data['nm_rek']='';
					$data['target']='';
					
		}
		$this->breadcrumb->append_crumb('Harian Data', site_url('entry/hariandata'));
		$this->breadcrumb->append_crumb('Update Data ', site_url('entry/HarianData'));
		$this->load->view('template',$data);

	}

	public function validation()
	{
		$this->form_validation->set_rules('kd_rek','Kd_rek','required');
		$this->form_validation->set_rules('tgl','nm_rek','required');
		$this->form_validation->set_rules('jml','target','required|numeric');
	}
}