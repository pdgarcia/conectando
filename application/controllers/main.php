<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
	  $this->load->model('noticias_model');
	  $data['entries']= $this->noticias_model->Get(0,10);
		$data['Titulo']='Inicio';
		$data['main_content_view']='inicio_view';
		
		$this->load->library('javascript');
    $this->jquery->plugin('js/jquery.spy.js',TRUE);
    $js='$("ul#columna3").simpleSpy(2,5000,"' . base_url('noticias/data') . '")
          .bind("mouseenter", function () {
              $(this).trigger("stop");
          }).bind("mouseleave", function () {
              $(this).trigger("start");
          });';
    $this->javascript->output($js);
    $this->javascript->compile();
		$this->load->view('includes/template',$data);
	}

	public function empresa()
	{
		$data['Titulo']='empresa';
		$data['main_content_view']='empresa_view';
		$this->load->view('includes/template',$data);
	}
	public function servicios()
	{
		$data['Titulo']='servicios';
		$data['main_content_view']='servicios_view';
		$this->load->view('includes/template',$data);
	}
}