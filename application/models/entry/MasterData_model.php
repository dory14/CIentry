<?php

class MasterData_model extends CI_Model{
	private $table='masterdata', $kd_rek='kd_rek';

	public function view(){
		return $this->db->get($this->table);
	}

	public function add($data){
		$this->db->insert($this->table,$data);
	}

	public function cek_id($data){
		$this->db->where($this->kd_rek,$data);
		return $this->db->get($this->table);
	}
	public function update($data,$person){
		$this->db->where($this->kd_rek,$data);
		return $this->db->update($this->table,$person);
	}

	public function delete($data){
		$cariid="select kd_rek from transaksi where kd_rek=$data";
		$delete1=$this->db->query($cariid)->row_array();
		
		if(!$delete1['kd_rek']){
			$this->db->query("delete from masterdata where kd_rek='$data'");
		}
			$this->db->query("delete a.*,b.* from masterdata a join transaksi b ON a.kd_rek=b.kd_rek where a.kd_rek=$data ");
	}
}