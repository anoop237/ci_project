<?php
class LoginModel extends CI_Model{
	public function loginValid($user,$pwd){
		$q=$this->db->where("user",$user)->where("password",$pwd)->get("users");
		if($q->num_rows()) {
			return $q->row()->id;
		}
		else {
			return false;
		}
	}
}
?>