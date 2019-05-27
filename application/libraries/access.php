<?php if (!defined("BASEPATH")) exit('no direct access alowed!');

class Access
{
	public $user;

	function __construct()
	{
	$this->CI =&get_instance();
	$auth=$this->CI->config->item('auth');

	$this->CI->load->helper('cookie');
	$this->CI->load->model('users_model');
	$this->CI->load->library('session');
	
	$this->users_model=& $this->CI->users_model;
	}

	function login($username, $password)
	{
	$result= $this->users_model->get_login_info($username);

	if($result)
	{
		$password=md5($password);
		if($password===$result->password)
		{
			//star session
			$this->CI->session->set_userdata('user_id',$result->user_id);
			return true;
		}
		}else{
		return false;
		}

	}
	function is_login()
	{
	return(($this->CI->session->userdata('user_id'))?true:false);
	}
	function logout()
	{
	$this->CI->session->unset_userdata('user_id');
	}
	}