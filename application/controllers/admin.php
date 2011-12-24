<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	var $amenu;
	var $fileupconfig;
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		if(!$this->session->userdata('logged_in')){redirect(base_url('login'));}
		$this->load->library('form_validation');
		
		$this->amenu = '<div id="admin_menu">';
		$this->amenu.= anchor('admin/addnoticiaform','Agregar Noticia');
    $this->amenu.= anchor('admin','Noticias');
    $this->amenu.= anchor('admin/config','Configuración');
    $this->amenu.= anchor('login/logout','Cerrar sesión');
    $this->amenu.= '</div>';
    
    $this->fileupconfig['upload_path'] = './nimages/';
		$this->fileupconfig['allowed_types'] = 'gif|jpg|jpeg|png';
		$this->fileupconfig['max_size']	= '4096';
		$this->fileupconfig['max_width']  = '5000';
		$this->fileupconfig['max_height']  = '5000';
		$this->fileupconfig['encrypt_name']  = TRUE;
	}

	public function index()
	{
		$data['Titulo']='Noticias';
    $data['amenu']=$this->amenu;
    $data['main_content_view']='admin_noticias_view';
    $this->load->model('noticias_model');
		$config['per_page'] = '4';
		$data['entries']= $this->noticias_model->Get((int)$this->uri->segment(3),$config['per_page'],FALSE);
		$config['base_url'] = site_url('admin/index');
		$config['total_rows'] = $this->noticias_model->count;
		$config['full_tag_open'] = '<div id=pagination>';
    $config['full_tag_close'] = '</div>';
		$this->pagination->initialize($config);		
		$data['pagination_links']=$this->pagination->create_links();
		$this->load->view('includes/template',$data);
	}

	public function config(){
	  $this->load->model('user_model');
	  $data['Titulo']='Pagina de configuración';
    $data['amenu']=$this->amenu;
		$data['main_content_view']='admin_config_view';
		$data['orgu_email']=$this->user_model->get_email();
		$this->load->view('includes/template',$data);
	}

	public function chemail(){
	  $this->load->model('user_model');
	  $data['Titulo']='Pagina de configuración';
    $data['amenu']=$this->amenu;
		$data['main_content_view']='config_view';
		$data['orgu_email']=$this->user_model->get_email();
	  
	  $this->form_validation->set_rules('u_email','Correo','trim|required|valid_email');
	  
	  if ($this->form_validation->run() == FALSE){
		  $this->load->view('includes/template',$data);
		}else{
		  $this->user_model->chg_email($this->input->post('u_email'));
		  $data['orgu_email']=$this->user_model->get_email();
		  $data['mensaje']='Email cambiado';
		  $this->load->view('includes/template',$data);
		}
	}
	
	public function chpass(){
	  $this->load->model('user_model');
	  $data['Titulo']='Pagina de configuración';
    $data['amenu']=$this->amenu;
		$data['main_content_view']='config_view';
		$data['orgu_email']=$this->user_model->get_email();
		
		$this->form_validation->set_rules('password','Password Actual','trim|required|md5');
		$this->form_validation->set_rules('npassword','Nueva Password','trim|required|md5');
		$this->form_validation->set_rules('rnpassword','Repetir Password','trim|required|matches[npassword]|md5');
		
	  if ($this->form_validation->run() == FALSE){
		  $this->load->view('includes/template',$data);
		}else{
		  if($this->user_model->chg_pass($this->input->post('password'),$this->input->post('npassword'))){
		    $data['mensaje']='Password cambiada';
		  }else{
		    $data['mensaje']='Password erronea';
		  }
		  $this->load->view('includes/template',$data);
		}
	}
	
	public function addnoticiaform(){
	  $data['Titulo']='Agregar Noticia';
    $data['amenu']=$this->amenu;
		$data['main_content_view']='admin_addnoticia_view';
		$this->load->view('includes/template',$data);
	}
	
	public function _chgimages($filedata){
	  $config['image_library'] = 'gd2';
    $config['source_image']	=  $filedata['full_path'];
    $config['maintain_ratio'] = TRUE;
    $config['width']	= 300;
    $config['height']	= 300;
    $this->load->library('image_lib', $config);
    $this->image_lib->resize();
    $config['create_thumb'] = TRUE;
    $config['thumb_marker'] = '_thumbS';
    $config['width']	= 62;
    $config['height']	= 62;
    $this->image_lib->initialize($config);
    $this->image_lib->resize();
    $config['thumb_marker'] = '_thumbM';
    $config['width']	= 150;
    $config['height']	= 150;
    $this->image_lib->initialize($config);
    $this->image_lib->resize();
	}
	
	public function add_noticia(){
	  $flagarchivo=FALSE;
	  $data['Titulo']='Agregar Noticia';
    $data['amenu']=$this->amenu;
		$data['main_content_view']='admin_addnoticia_view';
	  $this->load->model('noticias_model');
	  $this->load->helper('array');

		$this->load->library('upload', $this->fileupconfig);

    $this->form_validation->set_rules('n_title','Titulo','trim|required');
		$this->form_validation->set_rules('n_pdate','Fecha de Publicación','trim|required');
		$this->form_validation->set_rules('n_body','Texto de la Noticia','trim|required');
		$this->form_validation->set_rules('n_active','Activo','trim');
		$this->form_validation->set_rules('n_body','Texto de la Noticia','trim|required');
    $this->form_validation->set_rules('n_imagetxt','Descripción de Imagen','trim');
    $this->form_validation->set_rules('n_link','Link Fuente','trim|prep_url');
    $this->form_validation->set_rules('n_linktxt','Descripción Link Fuente','trim');
    
    $validation = $this->form_validation->run();
    
    if ( !($_FILES['userfile']['error'] == 4) ){
      $flagarchivo=TRUE;
      if ( !$this->upload->do_upload() ){
        $data['mensaje']=$this->upload->display_errors();
        $this->load->view('includes/template',$data);
      }
    }
    if ( $validation ){
      $postdata=elements(array('n_active','n_title','n_body','n_image','n_imagetxt','n_link','n_linktxt','n_pdate'), $_POST);
      if($flagarchivo){
        $filedata = $this->upload->data();
			  $this->_chgimages($filedata);
        $postdata['n_image']=$filedata['file_name'];
      }
      
      list($day,$month,$year)=explode("/",$postdata['n_pdate']);
      $postdata['n_pdate'] = $year."-".$month."-".$day;
      if($postdata['n_active'] == 'active'){$postdata['n_active'] = 1;}else{$postdata['n_active'] = 0;}
      $this->noticias_model->Add($postdata);
      $data['mensaje']= 'Noticia agregada';
		}
		$this->load->view('includes/template',$data);
	}

	public function del_noticia($id){
	  $this->load->model('noticias_model');
	  $n=$this->noticias_model->Getid($id);
	  if(!empty($n)){
	    if(!empty($n->n_image)){
  	    $archivo=pathinfo($n->n_image);
  	    //log_message('debug',json_encode(glob('./nimages/'.$archivo['filename'].'*.'.$archivo['extension'])));
  	    array_map( "unlink", glob('./nimages/'.$archivo['filename'].'*.'.$archivo['extension']));
  	  }
  	  $this->noticias_model->Delid($id);
  	}
    redirect(base_url('admin'));
	}
	
	public function act_noticia($id){
	  $this->load->model('noticias_model');
	  $n=$this->noticias_model->Getid($id);
	  if(!empty($n)){
	    if($n->n_active){
	      $this->noticias_model->chg_act($id,0);
	    }else{
	      $this->noticias_model->chg_act($id,1);
	    } 
  	}
    redirect(base_url('admin'));
	}

	public function edt_noticiaform($id){
	  $this->load->model('noticias_model');
	  $n=$this->noticias_model->Getid($id);
	  if(!empty($n)){
	    $data['Titulo']='Editar Noticia';
      $data['amenu']=$this->amenu;
      $data['data']=$n;
  		$data['main_content_view']='admin_editnoticia_view';
  		$this->load->view('includes/template',$data);
  	}else{
  	  redirect(base_url('admin'));
  	}
	}

	public function edt_noticia(){
	  $this->load->model('noticias_model');
	  $this->load->helper('array');
	  $data['Titulo']='Editar Noticia';
    $data['amenu']=$this->amenu;
	  $flagarchivo=FALSE;
	  $n=$this->noticias_model->Getid($this->input->post('n_id'));
	  
	  if(!empty($n)){
      $data['data']=$n;
  		$data['main_content_view']='admin_editnoticia_view';

  		$this->load->library('upload', $this->fileupconfig);

      $this->form_validation->set_rules('n_title','Titulo','trim|required');
  		$this->form_validation->set_rules('n_pdate','Fecha de Publicación','trim|required');
  		$this->form_validation->set_rules('n_body','Texto de la Noticia','trim|required');
  		$this->form_validation->set_rules('n_active','Activo','trim');
  		$this->form_validation->set_rules('n_body','Texto de la Noticia','trim|required');
      $this->form_validation->set_rules('n_imagetxt','Descripción de Imagen','trim');
      $this->form_validation->set_rules('n_link','Link Fuente','trim|prep_url');
      $this->form_validation->set_rules('n_linktxt','Descripción Link Fuente','trim');

      $validation = $this->form_validation->run();

      if ( !($_FILES['userfile']['error'] == 4) ){
        $flagarchivo=TRUE;
        if ( !$this->upload->do_upload() ){
          $data['mensaje']=$this->upload->display_errors();
          $this->load->view('includes/template',$data);
        }
      }
      if ( $validation ){
        $postdata=elements(array('n_active','n_title','n_body','n_image','n_imagetxt','n_link','n_linktxt','n_pdate'), $_POST);
        if($flagarchivo){
          if(!empty($n->n_image)){
      	    $archivo=pathinfo($n->n_image);
      	    //log_message('debug',json_encode(glob('./nimages/'.$archivo['filename'].'*.'.$archivo['extension'])));
      	    array_map( "unlink", glob('./nimages/'.$archivo['filename'].'*.'.$archivo['extension']));
      	  }
          $filedata = $this->upload->data();
  			  $this->_chgimages($filedata);
          $postdata['n_image']=$filedata['file_name'];
        }else{
          $postdata['n_image']=$n->n_image;
        }

        list($day,$month,$year)=explode("/",$postdata['n_pdate']);
        $postdata['n_pdate'] = $year."-".$month."-".$day;
        if($postdata['n_active'] == 'active'){$postdata['n_active'] = 1;}else{$postdata['n_active'] = 0;}
        $this->noticias_model->Update($n->n_id,$postdata);
        $data['mensaje']= 'Noticia modificada';
  		}
  		
  		$this->load->view('includes/template',$data);
  	}
    redirect(base_url('admin'));
	}

}