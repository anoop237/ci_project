<?php

class Ajax_Controller extends CI_Controller{
	public function _construct(){
		parent:_construct();
		$this->load->helper('url');
	}
	public function index(){
		$this->load->view('test/ajaxtest');
	}
	public function getList(){
		$data['list'] = array("Banana","Papaya","Apple","Pinapple","Orange","Mango");
		$this->load->view('test/getlist',$data);
	}
}

?>