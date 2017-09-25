<?php
class Admin extends MY_Controller{
	public function __construct(){
		parent::__construct();
		if(! $this->session->userdata("user_id")){
			return redirect("login");
		}  
		$this->load->model("articlesmodel"); 
	}
	public function index(){
		return redirect('admin/dashboard');
	}
	public function dashboard(){
		$this->load->library("pagination");
		$config = array();
		$config['base_url'] = base_url('admin/dashboard');
		$config['per_page'] = 5;
		$config['total_rows'] = $this->articlesmodel->get_num_rows();
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
		$data['articles'] = $this->articlesmodel->articlesList($config['per_page'],$this->uri->segment(3));
		$this->load->view("admin/dashboard",$data);
	}
	public function add_article(){
		$this->load->view('admin/add_article');
	}
	public function store_article(){
		//form validation rules has been written in config/form_Validation.php file
		$config = array();
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpeg|png|jpg|JPG';
		$this->load->library("upload",$config);
		$this->load->library("form_validation");
		if($this->form_validation->run('add_article_rules') && $this->upload->do_upload('picture')) {
			$data = $this->upload->data();
			$img_path=base_url('uploads/'.$data['raw_name'].$data['file_ext']);
			$title = $this->input->post("title");
			$article = $this->input->post("article");
			$user = $this->input->post("user");
			$created_on = $this->input->post("created");
			$response = $this->articlesmodel->addArticle($title,$article,$user,$created_on,$img_path);
			if($response) {
				$this->session->set_flashdata("feedback","Article added successfully...");
				$this->session->set_flashdata("feedback-class","alert-success");
			}
			else {
				$this->session->set_flashdata("feedback","Article failed to add. Please try again...");
				$this->session->set_flashdata("feedback-class","alert-danger");
			}
			return redirect('admin/dashboard');	
		}
		else {
			$upload_error= $this->upload->display_errors();
			$this->load->view('admin/add_article',compact('upload_error'));
		}
	}
	public function edit_article($article_id){
		$id = $article_id;
		$data['response'] = $this->articlesmodel->getArticle($id);
		$this->load->view('admin/edit_article',$data);
	}
	public function update_article(){
		//form validation rules has been written in config/form_Validation.php file
		$this->load->library("form_validation");
			if($this->form_validation->run('add_article_rules')) {
				$article_id = $this->input->post("article_id");
				$title = $this->input->post("title");
				$article = $this->input->post("article");
				$user = $this->input->post("user");
				$response = $this->articlesmodel->updateArticle($article_id,$title,$article,$user);
				if($response)
				{
					$this->session->set_flashdata("feedback","Article updated successfully...");
					$this->session->set_flashdata("feedback-class","alert-success");	
				}
				else
				{
					$this->session->set_flashdata("feedback","Article failed to update. Please try again...");
					$this->session->set_flashdata("feedback-class","alert-danger");	
				}
				return redirect('admin/dashboard');
				
			}
			else {
				$article_id = $this->input->post("article_id");
				$this->load->model("articlesmodel");
				$data['response'] = $this->articlesmodel->getArticle($article_id);
				$this->load->view('admin/edit_article',$data);
			}
	}
	public function delete_article(){
		$article_id = $this->input->post("article_id");
		$response = $this->articlesmodel->deleteArticle($article_id);
		if($response)
		{
			$this->session->set_flashdata("feedback","Article deleted successfully...");
			$this->session->set_flashdata("feedback-class","alert-success");		
		}
		else{
			$this->session->set_flashdata("feedback","Failed to deleted...Please try later..");
			$this->session->set_flashdata("feedback-class","alert-danger");	
		}
		return redirect('admin/dashboard');
	}
	
}
?>