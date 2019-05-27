<?php

class User_model extends CI_Model{

public function cek($username,$password){
	$this->db->where('username',$username);
	$this->db->where('password',$password);
	return $this->db->get('user');
}
	public function user(){
		return $this->db->get('user');
	}
	public function add($data){
		$this->db->insert('user',$data);
		return $this->db->get('user');
	}
	public function delete($id){
		$this->db->where('id_user',$id);
		return $this->db->delete('user');
	}
	public function cek_id($id){
		$this->db->where('id_user',$id);
		return $this->db->get('user');
	}
	public function update($data,$person){
		$this->db->where("id_user",$data);
		return $this->db->update("user",$person);
	}
}