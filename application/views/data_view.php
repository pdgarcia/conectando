<?php
$this->load->helper('typography');
$this->load->helper('html');
if(isset($entries)){
  foreach($entries as $e){
    $thumbname = str_replace('.','_thumbS.',$e->n_image);
    $image_properties = array(
      'src' => 'nimages/'.$thumbname,
      'alt' => $e->n_imagetxt,
      'class' => 'n_image',
      'title' => $e->n_imagetxt,
    );
?>
    <li><a href=<?php echo base_url("noticia/".$e->n_id)?>>
      <div id="marco01"><?php if($e->n_image != ""){echo "<div class=smlimage>".img($image_properties)."</div>";} ?></div>
      <div id="texto">
      <h5><span class="titnot"><?php echo $e->n_title;?></span><br/>
      <img src="images/arrow.gif" width="5" height="5" alt="Arrow">
      <?php echo character_limiter($e->n_body,80); ?>
      </h5><div class="clear"></div></div>
    </a></li>
<?php
  }
}