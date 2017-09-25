<?php
class ApiTest extends CI_Controller{
	public function index(){	
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_POST, 1);
		$url = "http://graph.facebook.com/youtube";
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result=curl_exec($curl);
		$info = curl_getinfo($curl);
		print_r($info);
	}
}
?>