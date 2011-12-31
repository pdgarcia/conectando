<?php
  $this->load->helper('xml');
  header("Content-Type: application/rss+xml; charset=UTF-8");
  $rssfeed = '<?xml version="1.0" encoding="UTF-8"?>';
  $rssfeed .= '<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:atom="http://www.w3.org/2005/Atom">';
  $rssfeed .= '<channel>';
  $rssfeed .= '<title>Noticias de la Conectando</title>';
  $rssfeed .= '<link>'.base_url('noticias').'</link>';
  $rssfeed .= '<description>Conectando Local es una empresa que aúna una gran experiencia y una visión global para ofrecerle las soluciones profesionales que su empresa necesita. intranets corporativas, tecnologías móviles, comercio electrónico, tecnología.</description>';
  $rssfeed .= '<language>en-us</language>';
  $rssfeed .= '<image><url>'.base_url('images/logo_03.gif').'</url><title>Noticias de la Conectando</title><link>'.base_url('noticias').'</link></image>';
  $rssfeed .= '<copyright>Copyright (C) 2012 conectandolocal.net</copyright>';
  foreach($entries as $e){
    $datetime = date("r", strtotime($e->n_pdate));
    $rssfeed .= '<item>';
    $rssfeed .= '<title>' . $e->n_title . '</title>';
    $rssfeed .= '<description>' .xml_convert(character_limiter($e->n_body,200)). '</description>';
    $rssfeed .= '<link>' . base_url('noticia/'.$e->n_id) . '</link>';
    $rssfeed .= '<pubDate>' .$datetime . '</pubDate>';
    $rssfeed .= '<dc:creator>' . 'WebMaster@conectandolocal.com' . '</dc:creator>';
    $rssfeed .= '<guid isPermaLink="false">' . base_url('noticia/'.$e->n_id) . '</guid>';
    $rssfeed .= '</item>';
  }
  $rssfeed .= '</channel>';
  $rssfeed .= '</rss>';
  echo $rssfeed;