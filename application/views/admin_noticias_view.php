<?php
  echo '<ul class="menu1">';
  foreach($this->config->item('amenu') as $item)
      echo('<li>'. anchor($item['Link'],'<b>'.$item['Name'].'</b>').'</li>');
  echo '</ul>';
  echo $pagination_links;
  echo "<div id=noticiaslist><ul>";
  if(isset($entries)){
    foreach($entries as $e){
      $thumbname = str_replace('.','_thumbM.',$e->n_image);
      $image_properties = array(
        'src' => 'nimages/'.$thumbname,
        'alt' => $e->n_imagetxt,
        'class' => 'n_image',
        'title' => $e->n_imagetxt,
      );
      $datetime = date("- d/m/Y -", strtotime($e->n_pdate));
      if($e->n_active == 1){echo '<li class=noticia>';}else{echo '<li class="noticia nalt">';}
      echo anchor('admin/del_noticia/'.$e->n_id,'X',array('class' => 'deletelink','title' => 'Borrar'));
      echo anchor('admin/act_noticia/'.$e->n_id,'A',array('class' => 'activatelink','title' => 'Activar'));
      echo anchor('admin/edt_noticiaform/'.$e->n_id,'E',array('class' => 'editlink','title' => 'Editar')).br();
      echo "<a href=". base_url("noticia/".$e->n_id) . ">";
      if($e->n_image != ""){echo "<div class=medimage>".img($image_properties)."</div>";}
      echo "<span class=titulo>".$e->n_title."</span>".br();
      echo "<span class=highlight>".$datetime."</span><br><div class=resumen>".character_limiter($e->n_body,300)."</div>";
      echo "<div class=clear></div></a></li>";
    }
  }
  echo "</ul></div>";
  echo link_tag('css/jquery-ui-1.8.16.custom.css');