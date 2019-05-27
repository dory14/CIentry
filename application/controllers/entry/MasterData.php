<?php


class MasterData extends  CI_Controller {

	public function __construct(){
			parent::__construct();
		$this->load->helper('url');
		$config['tag_open'] = '<ul class="breadcrumb">';
		$config['tag_close'] = '</ul>';
		$config['li_open'] = '<li>';
		$config['li_close'] = '</li>';
		$config['divider'] = '<span class="divider"> » </span>';
		$this->breadcrumb->initialize($config);
		$this->load->model('entry/MasterData_model');
		naccess();
		levelsuper();
	}

	public function index()
	{
		$data=array(
			"title"=>'Data Entry',
			"menu"=>getmenu(),
			"entry"=>$this->MasterData_model->view()->result(),
			"aktif"=>"MasterData",
			"content"=>"masterdata/index.php",
		);
		$this->breadcrumb->append_crumb('Master data', site_url('entry/masterdata'));
		$this->load->view('template',$data);

	}
	public function add()
	{
		$data=array(
			"title"=>'Tamabah Data',
			"menu"=>getmenu(),
			"action"=>'entry/masterdata/add',
			"option"=>$this->MasterData_model->view()->result(),
			"aktif"=>"MasterData",
			"content"=>"masterdata/_form.php",
		);
		$this->validation();
		if($this->form_validation->run()){
			$entry['kd_rek']=$this->input->post('kd_rek');
			$entry['nm_rek']=$this->input->post('nm_rek');
			$entry['target']=$this->input->post('target');
		
		$this->MasterData_model->add($entry);
		redirect('entry/masterdata');	
		}else{
			$data['entry']['kd_rek']='';
			$data['entry']['nm_rek']='';
			$data['entry']['target']='';
		}
		$this->breadcrumb->append_crumb('Master Data', site_url('entry/masterdata'));
		$this->breadcrumb->append_crumb('Tambah Data ', site_url('entry/masterdata'));
		$this->load->view('template',$data);
	}

	public function update($id){
		$data=array(
			"title"=>'Edit Data',
			"menu"=>getmenu(),
			"action"=>'entry/masterdata/update/'.$id,
			"option"=>$this->MasterData_model->view()->result(),
			"entry"=>$this->MasterData_model->cek_id($id)->row_array(),
			"aktif"=>"MasterData",
			"content"=>"masterdata/_form.php",
		);

		$this->validation();
		if($this->form_validation->run()){
				$id=$entry['kd_rek']=$this->input->post('kd_rek');
				$entry['nm_rek']=$this->input->post('nm_rek');
				$entry['target']=$this->input->post('target');
				$this->MasterData_model->update($id,$entry);
				redirect('entry/masterdata');

		}else{
					$data['entry']=$this->MasterData_model->cek_id($id)->row_array();
					$data['nm_rek']='';
					$data['target']='';
					
		}
		$this->breadcrumb->append_crumb('Master Data', site_url('entry/masterdata'));
		$this->breadcrumb->append_crumb('Update Data ', site_url('entry/masterdata'));
		$this->load->view('template',$data);
	}

	public function delete($id){
		$this->MasterData_model->delete($id);
		redirect('entry/masterdata','refresh');
	}

	public function validation()
	{
		$this->form_validation->set_rules('kd_rek','Kd_rek','required');
		$this->form_validation->set_rules('nm_rek','nm_rek','required');
		$this->form_validation->set_rules('target','target','required|numeric');
	}
}