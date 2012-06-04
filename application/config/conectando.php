<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  $config['site_name']='P&#225gina Oficial de Conectando Local';
  $config['menu'] = array (
      array ( "Name" => "INICIO","Link" => ""),
      array ( "Name" => "EMPRESA","Link" => "empresa"),
      array ( "Name" => "SERVICIOS","Link" => "servicios"),
      array ( "Name" => "NOTICIAS","Link" => "noticias"),
      array ( "Name" => "TRABAJA CON NOSOTROS","Link" => "contacto/trabaja"),
      array ( "Name" => "CONTACTO","Link" => "contacto")
      );
  $config['amenu'] = array (
      array ( "Name" => "Agregar Noticia","Link" => "admin/addnoticiaform"),
      array ( "Name" => "Noticias","Link" => "admin"),
      array ( "Name" => "Configuración","Link" => "admin/config"),
      array ( "Name" => "Cerrar sesión","Link" => "login/logout"),
      );
  $config['javascript_location'] = 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js';
  $config['javascript_ajax_img'] = 'images/ajax-loader.gif';
