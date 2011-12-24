		<div id="animacion"><object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="750" height="218" id="banner" align="middle">
		<param name="allowScriptAccess" value="sameDomain">
		<param name="movie" value="images/banner.swf">
		<param name="quality" value="high">
		<param name="bgcolor" value="#FFFFFF">
		<embed src="images/banner.swf" quality="high" bgcolor="#FFFFFF" width="750" height="218" name="banner" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer">
		</object>
		 
		</div>
		<div id="barrita"> 
		</div>
	<div id="contenido"><!--inicio contenido-->
		<div id="columna1">
			<div id="foto">
				<img src="images/foto01.gif" width="186" height="63" alt="Foto01">
				</div>
			<p><span class="titulo">LOREM IPSUM</span><br/>
			<img src="images/arrow.gif" width="5" height="5" alt="Arrow">
			<span class="blanco">Lorem ipsum dolor sit amet consectetuer 
			adipiscing elit Lorem ipsum dolor sit amet 
			consec tetuer adipiscing elit
			adipiscing elit Lorem ipsum dolor sit amet</span></p>
			
			</div>
		<div id="columna2">
			<div id="foto">
				<img src="images/foto02.gif" width="186" height="63" alt="Foto02">
				</div>
			<p><span class="titulo">LOREM IPSUM</span><br/>
			<img src="images/arrow.gif" width="5" height="5" alt="Arrow">
			<span class="blanco">Lorem ipsum dolor sit amet consectetuer 
			adipiscing elit Lorem ipsum dolor sit amet 
			consec tetuer adipiscing elit
			adipiscing elit Lorem ipsum dolor sit amet</span></p>
			</div>
		<ul id="columna3">
<?php
$this->load->helper('typography');
if(isset($entries)){
  foreach($entries as $e){
    $thumbname = str_replace('.','_thumbS.',$e->n_image);
    $image_properties = array(
      'src' => 'nimages/'.$thumbname,
      'alt' => $e->n_imagetxt,
      'class' => 'n_image',
      //'width' => '62',
      //'height' => '62',
      'title' => $e->n_imagetxt,
    );
?>
    <li><a href=<?php echo base_url("noticia/".$e->n_id)?>>
			<div id="marco01">
			<?php if($e->n_image != ""){echo "<div class=smlimage>".img($image_properties)."</div>";} ?>
			</div>
			<div id="texto">
			<h5><span class="titnot"><?php echo $e->n_title?></span><br/>
			<img src="images/arrow.gif" width="5" height="5" alt="Arrow">
			<?php echo character_limiter($e->n_body,80); ?>
			</h5>
			<div class="clear"></div>
			</div>
			</a></li>
<?php
     }
    }			
?>
		</ul>
	</div><!--fin contenido-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript" charset="utf-8"></script>
  <script src="js/jquery.spy.js" type="text/javascript" charset="utf-8"></script>
  <script type="text/javascript">
  $(function () {
      $('ul#columna3').simpleSpy(2,5000,'<?php echo base_url('noticias/data') ?>').bind('mouseenter', function () {
          $(this).trigger('stop');
      }).bind('mouseleave', function () {
          $(this).trigger('start');
      });
  });
  </script>