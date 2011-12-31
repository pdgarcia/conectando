<?php
  $this->load->helper('html');
  header('Content-type: text/html; charset=UTF-8');
  echo doctype();
  echo '<?xml version="1.0" encoding="UTF-8"?>';
  echo '<html xmlns="http://www.w3.org/1999/xhtml">';
  echo '<head>';
  echo meta(array(
    array('name' => 'description', 'content' => $this->config->item('site_name')),
    array('name' => 'keywords', 'content' => ''),
    array('name' => 'robots', 'content' => 'no-cache'),
    array('name' => 'charset', 'content' => 'UTF-8'),
    array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv'),
 // array('name' => 'google-site-verification', 'content' => 'IuyD_X-L9fHYrNQRt_ZQaDPWEeVXja3IRkDPOzQnito')
  ));
  echo '<title>'.trim($this->config->item('site_name').' | '.$Titulo).'</title>';
  echo link_tag('css/conectando.css');
  echo link_tag('favicon.ico', 'shortcut icon', 'image/ico');
  echo link_tag('favicon.ico', 'icon', 'image/ico');
  echo link_tag('noticias/feed', 'alternate', 'application/rss+xml', 'Conectando RSS Feed');
?>
</head>
<body>
  <div id="layout">
    <div id="header"><!-- inicio header -->
      <div id="conectando"><?php echo( anchor(index_page(),'<img src="'.site_url('images/logo_03.gif').'" width="170" height="98" alt="Logo">'));?></div>
    </div><!-- fin header -->
    <div id="menu"> <!-- inicio menu -->
      <ul class="menu1">
      <?php
      foreach($this->config->item('menu') as $item){
        if(strcmp(uri_string(), $item['Link'])==0) echo('<li class="current">');
        else echo('<li>');
        echo(anchor($item['Link'],'<b>'.$item['Name'].'</b>').'</li>');
      }?>
      </ul>
    </div> <!-- fin menu -->
  <div id="container"><!-- inicio container -->