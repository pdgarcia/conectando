<div class="clear"></div>
<div id="barrita_azul"><?= anchor(base_url("noticias/feed"),'<img src='.base_url("images/news-header-rss-icon.png").' width="18" height="18" alt="News Header Rss Icon">')?></div>
<?php
  echo $pagination_links;
	echo "<div id=noticiaslist><ul>";
  if(isset($entries)){
    foreach($entries as $e){
      $thumbname = str_replace('.','_thumbM.',$e->n_image);
      $image_properties = array(
        'src' => 'nimages/'.$thumbname,
        'alt' => $e->n_imagetxt,
        'class' => 'n_image',
        //'width' => '150',
        //'height' => '150',
        'title' => $e->n_imagetxt,
      );
  	  $datetime = date("- d/m/Y -", strtotime($e->n_pdate));
  	  echo "<a href=". base_url("noticia/".$e->n_id) . "><li class=noticia>";
  	  if($e->n_image != ""){echo "<div class=medimage>".img($image_properties)."</div>";}
  	  echo "<span class=titulo>".$e->n_title."</span><br><span class=highlight>".$datetime."</span>".br();
  	  echo "<div class=resumen>".character_limiter($e->n_body,300)."</div>";
      echo "<div class=clear></div></li></a>";
    }
  }
  echo "</ul></div>";