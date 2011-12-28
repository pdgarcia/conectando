<div class="clear"></div>
<div id="barrita_azul"></div>
<?php
	$facebookcode ='<div style="float:left; width:85px;padding-right:10px; margin:4px 4px 4px 4px;height:30px;"><iframe src="//www.facebook.com/plugins/like.php?href&amp;send=false&amp;layout=button_count&amp;width=85px&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21px" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:120px; height:21px;" allowTransparency="true"></iframe></div>';
	$twitercode ='<div style="float:left; width:85px;padding-right:10px; margin:4px 4px 4px 4px;height:30px;"><a href="https://twitter.com/share" class="twitter-share-button" data-url="'.current_url().'" data-text="'.$Titulo.'" data-lang="es">Twittear</a><script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></div>';
	$googlepluscode = '<div style="float:left; width:85px;padding-right:10px; margin:4px 4px 4px 4px;height:30px;"><g:plusone size="medium"></g:plusone></div>
	<script type="text/javascript">
	window.___gcfg = {lang: "es"};
	(function() {
	  var po = document.createElement("script"); po.type = "text/javascript"; po.async = true;
	  po.src = "https://apis.google.com/js/plusone.js";
	  var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(po, s);
	})();
	</script>';

	$this->load->helper('typography');
	$image_properties = array(
		'src' => 'nimages/'.$noticia->n_image,
		'alt' => $noticia->n_imagetxt,
		'class' => 'n_image',
		//'width' => '300',
		//'height' => '300',
		'title' => $noticia->n_imagetxt,
	);
	$datetime = date("d/m/Y", strtotime($noticia->n_pdate));
	echo "<div class='noticia'>";
	echo heading($noticia->n_title,3);
	echo "<span class='highlight'>Publicado el: ".$datetime."</span>".br();
	echo '<div id=sociallinks  style="float:left; height: 30px; width: 100%;">'. $facebookcode.$twitercode.$googlepluscode.'</div>';
	echo '<div class=clear></div>';
	if($noticia->n_link != ""){echo "Fuente: ".anchor($noticia->n_link, $noticia->n_linktxt, "title='$noticia->n_linktxt'").br();}
	if($noticia->n_image != ""){echo '<div class=bigimage><span></span>'.img($image_properties) .'<p>'.$noticia->n_imagetxt.'</p></div>';}
	echo '<div class=textbody>'. auto_typography($noticia->n_body)."</div><br/></div>".br(2);
	echo '<div class=clear></div>';
  