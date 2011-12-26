<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contacto extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['Titulo']='Pagina Contacto';
		$data['main_content_view']='contacto_view';
		$this->load->view('includes/template',$data);
	}
	public function conectate()
	{
		$data['Titulo']='Pagina Conectates';
		$data['main_content_view']='conectate_view';
		$this->load->view('includes/template',$data);
	}
	public function send()
	{
	  $this->load->library('form_validation');
	  $this->load->model('user_model');
	  
	  //field, error message, validation rule
	  $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
	  $this->form_validation->set_rules('compania','Compania','trim');
	  $this->form_validation->set_rules('nombre','Nombre','trim|required');
	  $this->form_validation->set_rules('direccion','Dirección','trim');
	  $this->form_validation->set_rules('email','Dirección de Correo','trim|required|valid_email');
	  $this->form_validation->set_rules('telefono','Telefono','trim');
	  $this->form_validation->set_rules('mensaje','Mensaje','trim|required');

	  if($this->form_validation->run() == FALSE)
	  {
	    $data['Titulo']='Pagina Contacto';
  		$data['main_content_view']='contacto_view';
  		$this->load->view('includes/template',$data);
	  }else{

	    $body  = "Este mensaje fue enviado por " . $this->input->post('nombre') . " de la empresa " . $this->input->post('compania') . " \r\n";
      $body .= "Enviado el " . date('d/m/Y', time()) . " \r\n";
      $body .= "Su e-mail es: " . $this->input->post('email') . " \r\n";
      $body .= "Su Telefono es: " . $this->input->post('telefono') . " \r\n";
      $body .= "Su Dirección es: " . $this->input->post('direccion') . " \r\n";
      $body .= "Mensaje: " . $this->input->post('mensaje') . " \r\n";
      
      $config['protocol']='mail';
      //$config['charset'] = 'iso-8859-1';
      $config['charset'] = 'utf-8';
      $config['newline'] = '\r\n';
      $this->load->library('email');
      $this->email->initialize($config);
      $this->email->from('webmaster@conectandolocal.net','Web Master Conectando');
      $this->email->to($this->user_model->get_email());
      $this->email->subject('Contacto desde webmaster');
      $this->email->message($body);
      if ($this->email->send())
      {
        $data['Titulo']='Pagina Contacto';
    		$data['mensaje']='Mensaje enviado';
    		$data['main_content_view']='contacto_view';
    		
    		$this->load->view('includes/template',$data);
      }
      else
      {
        show_error($this->email->print_debugger());
      }
	  }
	}
}
