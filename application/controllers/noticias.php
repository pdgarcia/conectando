<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Noticias extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('noticias_model');
	}

	public function index()
	{
		$data['Titulo']='Noticias';
    $data['main_content_view']='noticias_view';
    
		$config['per_page'] = '4';
		$data['entries']= $this->noticias_model->Get((int)$this->uri->segment(2),$config['per_page']);
		$config['base_url'] = site_url('noticias');
		$config['uri_segment'] = 2;
		$config['total_rows'] = $this->noticias_model->count;
		$config['full_tag_open'] = '<div id=pagination>';
    $config['full_tag_close'] = '</div>';
		$this->pagination->initialize($config);		
		$data['pagination_links'] = $this->pagination->create_links();
		$this->load->view('includes/template',$data);
	}
	
	public function noticia_by_id($not){
	  //$this->output->cache(20);
	  if(!(int)$not) { redirect('noticias');}
	  $this->load->model('noticias_model');
	  
	  $noticia=$this->noticias_model->Getid($not);
	  if(empty($noticia)) { redirect('noticias');}
		$data['Titulo']='Documentos' . $noticia->n_title;
		$data['noticia']= $noticia;
    $data['main_content_view']='noticia_view';
		$this->load->view('includes/template',$data);
	}
	
	public function feed(){
	  //$this->output->cache(10);
	  $data['entries']= $this->noticias_model->Get(0,10);
	  $this->load->view('rss_view',$data);
	}
	
	public function data(){
	  //$this->output->cache(10);
	  $data['entries']= $this->noticias_model->Get(0,10);
	  $this->load->view('data_view',$data);
	}
}
