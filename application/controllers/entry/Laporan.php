<?php

class Laporan extends CI_Controller{
	public function __construct(){

	parent::__construct();
		$this->load->helper('url');
		$config['tag_open'] = '<ul class="breadcrumb">';
		$config['tag_close'] = '</ul>';
		$config['li_open'] = '<li>';
		$config['li_close'] = '</li>';
		$config['divider'] = '<span class="divider"> » </span>';
		$this->breadcrumb->initialize($config);
		$this->load->model('entry/HarianData_model');
		naccess();
	}

	public function index(){
		$entry=$this->input->post('tanggal');
		$data=array(
			"title"=>'Laporan',
			"menu"=>getmenu(),
			"laporan1"=>$this->HarianData_model->view2($entry)->result(),
			"aktif"=>"laporan",
			"content"=>"laporan/laporan.php",
		);
	$this->breadcrumb->append_crumb('Laporan', site_url('laporan'));
		$this->load->view('template',$data);
		

	}

	public function cetak(){
		$entry=$this->input->post('tanggal');
		$laporan1 = $this->HarianData_model->view2($entry)->result();
		$h="<table class='table table-bordered'>
	<tr>
		<th rowspan='2'>NO</th>
		<th rowspan='2'>KODE REKENING</th>
		<th rowspan='2'>NAMA REKENING</th>
		<th rowspan='2'>TARGET (Rp)</th>
		<th colspan='3'>RELASI</th>
		<th rowspan='2'>%</th>
	</tr>
	<tr>
	<th>s/d Bulan Lalu</th>
	<th>Bulan Ini</th>
	<th>s/d Bulan Ini</th>
</tr>";
 $bulan_lalu = 0;
 $bulan_nini = 0;
 $sampai_bulan_ini = 0;
 $no=1;

 foreach ($laporan1 as $row) :

/**cara jumlah array 2
$t_target +=$row->target;
<?=$t_target;?>**/
//sum target
$h_target[]=$row->target;
$target=array_sum($h_target);
//sum bulan_lalu
$h_bulan1[]=$row->bulan_lalu;
$bulan_lalu=array_sum($h_bulan1);
//sum bulan_ini
$h_bulan2[]=$row->bulan_ini;
$bulan_ini=array_sum($h_bulan2);
//sum sampai_bulan_lalu
$h_bulan3[]=$row->sampai_bulan_ini;
$sampai_bulan_ini=array_sum($h_bulan3);


$h.="<tr>

	<td>".$no."</td>
	<td>".$row->kd_rek."</td>
	<td>".$row->nm_rek."</td>
	<td>".number_format($row->target, 0, ',', '.')."</td>
	<td>".number_format($row->bulan_lalu, 0, ',', '.')."</td>
	<td>".number_format($row->bulan_ini, 0, ',', '.')."</td>
	<td>".number_format($row->sampai_bulan_ini, 0, ',', '.')."</td>
	<td>".round((($row->sampai_bulan_ini/$row->target)*100),2)."</td>";
 $no++;
endforeach;
$h.="<tr>
	<th colspan='3'>TOTAL</td>
	<td>".number_format($target, 0, ',', '.')."</td>
	<td>".number_format($bulan_lalu, 0, ',', '.')."</td>
	<td>".number_format($bulan_ini, 0, ',', '.')."</td>
	<td>".number_format($sampai_bulan_ini, 0, ',', '.')."</td>
	<td>".round((($sampai_bulan_ini/$target)*100),2)."</td>
</tr>
</tr>
</table>";
		$f=json_encode($h);
		echo $f;

	}

	public function validation()
	{
		$this->form_validation->set_rules('tanggal','Tanggal;','required');
	}

		

	public function print()
	{
		$entry=$this->input->post('tanggal');
		$data=array(
			"title"=>'Laporan',
			"menu"=>getmenu(),
			"laporan1"=>$this->HarianData_model->view2($entry)->result(),
			"date"=>$entry,
		);
		$this->load->view('laporan/excl_laporan',$data);

	}
	public function cetak1(){
		$entry=$this->input->post('tanggal');
		$data=array(
			"title"=>'Cetak Laporan',
			"menu"=>getmenu(),
			"laporan1"=>$this->HarianData_model->view2($entry)->result(),
			"aktif"=>"Cetak",
			"content"=>"laporan/cetak.php",
		);
	$this->breadcrumb->append_crumb('Cetak', site_url('cetak'));
		$this->load->view('template',$data);
		

	}
}