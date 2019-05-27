<?php

class HarianData_model extends CI_Model{
	private $table='transaksi', $id='id_transaksi', $table1='masterdata', $id_rek='kd_rek', $tgl='tgl_stor';

	public function view(){
		
		$this->db->join($this->table,$this->id_rek);
		$this->db->order_by('nm_rek','asc');
		return $this->db->get($this->table1);
	}

	public function view2($data){
		$data1=explode('-', $data);
		$bulan=$data1[0];
		$bulan1=$bulan-1;
		$this->db->select("kd_rek,nm_rek,target,
						(select coalesce(sum(a.jml_bayar))
							from transaksi a
							left join masterdata b 
							on b.kd_rek=a.kd_rek 
							where month(a.tgl_stor)>='01' and month(a.tgl_stor)<='$bulan1'
							and masterdata.kd_rek=b.kd_rek) as bulan_lalu,
						(select coalesce(sum(a.jml_bayar))
							from transaksi a 
							left join masterdata b  
							on b.kd_rek=a.kd_rek 
							where month(a.tgl_stor)='$bulan'
							and masterdata.kd_rek=b.kd_rek) as bulan_ini,
						(select coalesce(sum(a.jml_bayar))
							from transaksi a 
							left join masterdata b  
							on b.kd_rek=a.kd_rek 
							where month(a.tgl_stor)>='01' and month(a.tgl_stor)<='$bulan'
							and masterdata.kd_rek=b.kd_rek) as sampai_bulan_ini,
		");
		return $this->db->get($this->table1);
	}
	public function view3($data){
		$this->db->select('sum(transaksi.jml_bayar) as jumlah');
		$this->db->where("month($this->tgl)='$data'");
		$this->db->join($this->table,$this->id_rek);
		$this->db->group_by('kd_rek');
		return $this->db->get($this->table1);
	}

	public function add($data){
		$this->db->insert($this->table,$data);
	}

	public function cek_id($data){
		$this->db->where($this->id,$data);
		return $this->db->get($this->table);
	}
	public function update($data,$person){
		$this->db->where($this->id,$data);
		return $this->db->update($this->table,$person);
	}

	public function delete($data){
		$this->db->where($this->id,$data);
		$this->db->delete($this->table);
	}
	public function get_kota()
        {
            // kita joinkan tabel kota dengan provinsi
            $this->db->order_by('nama_kota', 'asc');
            $this->db->join('provinsi', 'kota.id_provinsi_fk = provinsi.id_provinsi');
            return $this->db->get('kota')->result();
        }
}
