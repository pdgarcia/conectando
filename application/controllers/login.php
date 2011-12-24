<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
	}
  public function index()
	{
		$data['Titulo']='Login Page';
		$data['main_content_view']='login_view';
		$this->load->view('includes/template',$data);
	}
	
	function logout() {
		$this->session->sess_destroy();
		redirect(base_url('admin'));
	}
	
	public function processlogin()
	{
		$this->load->model('user_model');
		$data['Titulo']='Login Page';
		$data['main_content_view']='login_view';
		
		//field, error message, validation rule
		$this->form_validation->set_rules('username','Usuario','trim|required');
		$this->form_validation->set_rules('password','Password','trim|required|md5');

		if ($this->form_validation->run() == FALSE){
			$this->load->view('includes/template',$data);
		}
		elseif($this->user_model->checkuser($this->input->post('username'),$this->input->post('password'))==TRUE){
			$cookiedata = array(
			   'username'  => $this->input->post('username'),
			   'logged_in' => TRUE
			);
			$this->session->set_userdata($cookiedata);
			redirect(base_url('admin'));
		}else{
			$data['mensaje']='Usuario o Password erroneo';
			$this->load->view('includes/template',$data);
		}
	}
}