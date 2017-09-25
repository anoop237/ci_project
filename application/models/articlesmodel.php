<?php
class ArticlesModel extends CI_Model{
	public function allArticlesList($limit,$offset){
		$q=$this->db->limit($limit,$offset)->order_by('created_on','DESC')->get("articles");
		return $q->result_array();
	}
	public function count_all_rows(){
		$q=$this->db->get("articles");
		return $q->num_rows();
	}
	public function articlesList($limit,$offset){
		$this->load->library("session");
		$id = $this->session->userdata('user_id');
		$q=$this->db->where("user_id",$id)->limit($limit,$offset)->order_by('created_on','DESC')->get("articles");
		return $q->result();
	}
	public function get_num_rows(){
		$this->load->library("session");
		$id = $this->session->userdata('user_id');
		$q=$this->db->where("user_id",$id)->get("articles");
		return $q->num_rows();
	}
	public function searchArticles($query,$limit,$offset){
		$q=$this->db->from("articles")->like('title', $query, 'both')->limit($limit,$offset)->get();
		return $q->result_array();
	}
	public function count_search_rows($query){
		$q=$this->db->from("articles")->like('title', $query, 'both')->get();
		return $q->num_rows();
	}
	public function findArticle($id){
		$q = $this->db->where('id', $id)->get('articles');
		return $q->row();
	}
	public function addArticle($title,$article,$user,$created_on,$img_path){
		$data = array(
			        'title' => $title,
			        'body' => $article,
			        'user_id' => $user,
			        'created_on' => $created_on,
			        'image_path'=>$img_path
			);
		return $this->db->insert('articles', $data);
	}
	public function getArticle($id){
		$q = $this->db->where('id', $id)->get('articles');
		return $q->row();
	}
	public function updateArticle($article_id,$title,$article,$user){
		$data = array('title'=>$title,'body'=>$article,'user_id'=>$user);
		$q = $this->db->update('articles', $data, "id =$article_id");
		return $q;
	}
	public function deleteArticle($article_id){
		$q = $this->db->delete('articles', array("id"=>$article_id));
		return $q;
	}

}

?>