<?php
class User extends MY_Controller{
	public function index() {
		$this->load->model("articlesmodel");
		$this->load->library("pagination");
		$config = array();
		$config['base_url'] = base_url('user/index');
		$config['per_page'] = 5;
		$config['total_rows'] = $this->articlesmodel->count_all_rows();
		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] = "</ul>";
		$config['next_tag_open'] = "<li>";
		$config['next_tag_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tag_close'] = "</li>";
		$config['num_tag_open'] = "<li>";
		$config['num_tag_close'] = "</li>";
		$config['cur_tag_open'] = "<li class='active'><a>";
		$config['cur_tag_close'] = "</a></li>";
		$this->pagination->initialize($config);
		$data['articles'] = $this->articlesmodel->allArticlesList($config['per_page'],$this->uri->segment(3));
		$this->load->view('public/articles_list',$data);
	}
	public function search() {
		$query = $this->input->post('search_query');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('search_query','Query','required');
		if(!$this->form_validation->run()){
			$this->index();
		}
		else{
			return redirect("user/search_results/$query");
		}
		
	}
	public function search_results($query) {
		$this->load->model("articlesmodel");
		$this->load->library("pagination");
		$config = array();
		$config['base_url'] = base_url("user/search_results/$query");
		$config['per_page'] = 5;
		$config['total_rows'] = $this->articlesmodel->count_search_rows($query);
		$config['uri_segment'] = 4;
		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] = "</ul>";
		$config['next_tag_open'] = "<li>";
		$config['next_tag_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tag_close'] = "</li>";
		$config['num_tag_open'] = "<li>";
		$config['num_tag_close'] = "</li>";
		$config['cur_tag_open'] = "<li class='active'><a>";
		$config['cur_tag_close'] = "</a></li>";
		$this->pagination->initialize($config);
		$data['articles'] = $this->articlesmodel->searchArticles($query,$config['per_page'],$this->uri->segment(4));
		$this->load->view('public/search_result',$data);	
	}
	public function articles($id){
		$this->load->model("articlesmodel");
		$data['article'] = $this->articlesmodel->findArticle($id);
		$this->load->view('public/article_detail',$data);	
	}			
}
?>