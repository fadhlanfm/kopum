<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Mysql_service', 'Mysql');
		$this->load->library('session');
	}

	public function isAdmin(){
		if ($this->session->userdata('user_id')!=null) {
			redirect(site_url('admin/showDashboard'), 'refresh');
		}
	}

	public function isNotAdmin(){
		if($this->session->has_userdata('user_id')==FALSE){
			echo "<script>alert('You are not logged in');</script>";
			redirect(site_url('admin'), 'refresh');
		}
	}

	public function isNotSuperAdmin(){
		if($this->session->userdata('user_id')!=null && $this->session->userdata('isSuperAdmin')==0){
			echo "<script>alert('Sorry, you have to be Super Admin to access this page');</script>";
			redirect(site_url('admin'), 'refresh');
		}
	}
}
?>