<?php 
function access()
{
    $ci=& get_instance();
    if($ci->session->userdata('username')){
        redirect('entry/Dasboard');
    }
}

function naccess()
{
    $ci=& get_instance();
    if(!$ci->session->userdata('username')){
        redirect('login');
    }
}

function menuaktif($aktif,$menu){	
	if($aktif==$menu){
		return "active";
	}else{
		return "";
	}
}
function getmenu(){ 
    $CI =& get_instance();
    if($CI->session->userdata('level')==1){
        return "menu.php";
    }else{
        return "menuadmin.php";
    }
}
function levelsuper(){ 
    $CI =& get_instance();
    if($CI->session->userdata('level')!=1){
        $CI->session->set_flashdata('error', "Anda Tidak Memiliki Akses Pada Halaman Tersebut");
        redirect('entry/Dasboard');
    }
}

function getnama($id)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from user where id_user='$id'")->row_array();
    return $q['username'];
}
function getjudata($a)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from transaksi where kd_rek='$a'")->num_rows();
    return $q;
    
}
