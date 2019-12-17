<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mysql_service extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function create($table, $data){
		$data['query'] = $this->db->insert($table, $data);
		$data['last_id'] = $this->db->insert_id();
		return $data;
	}

	function read($table, $cond, $ordField, $ordType, $limit, $start){
		if($cond!=null){
			$this->db->where($cond);
		}
		if($ordField!=null){
			$this->db->order_by($ordField, $ordType);
		}
		if($limit!=null){
			$this->db->limit($limit, $start);
		}
		$query = $this->db->get($table);
		return $query;
	}

	function update($cond, $table, $data){
		$this->db->where($cond);
		$query = $this->db->update($table, $data);
		return $query;
	}

	function delete($cond, $table){
		$this->db->where($cond);
		$query = $this->db->delete($table);
		return $query;
	}

	function getLatest($table){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->limit(1);
		$this->db->order_by('id','desc');
		$query = $this->db->get();
		return $query;
	}
}