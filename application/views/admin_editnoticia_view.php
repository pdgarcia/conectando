<?php
  echo '<ul class="menu1">';
  foreach($this->config->item('amenu') as $item)
      echo('<li>'. anchor($item['Link'],'<b>'.$item['Name'].'</b>').'</li>');
  echo '</ul>';
  echo validation_errors();
  if(isset($mensaje) && !empty($mensaje)){echo '<h3>'.$mensaje.'</h3>';}

  echo '<div id=formcontainer>';
  echo form_open_multipart('admin/edt_noticia','',array('n_id' => $data->n_id));
  echo form_label('Titulo: ','n_title');
  echo form_input(array(
    'name'        => 'n_title',
    'id'          => 'n_title',
    'value'       => set_value('n_title',$data->n_title),
    'maxlength'   => '255',
    'size'        => '50',
  )).br();
  echo form_label('Fecha de publicación: ','n_pdate');
  echo form_input(array(
    'name'        => 'n_pdate',
    'id'          => 'n_pdate',
    'value'       => set_value('n_pdate',date("d/m/Y", strtotime($data->n_pdate))),
    'maxlength'   => '10',
    'size'        => '10',
  )).br();
  echo form_label('Activo: ','n_active');
  echo form_checkbox(array(
    'name'        => 'n_active',
    'id'          => 'n_active',
    'value'       => 'active',
    'checked'     => set_checkbox('n_active', 'active',($data->n_active == 1)),
  )).br();
  //echo form_label('Texto:','n_body').br();
  echo form_textarea(array(
    'name'        => 'n_body',
    'id'          => 'n_body',
    'value'       => set_value('n_body',$data->n_body),
    'rows'        => '20',
    'cols'        => '60',
  )).br();
  echo form_fieldset('Imagen');
  $thumbname = str_replace('.','_thumbS.',$data->n_image);
  $image_properties = array(
    'src' => 'nimages/'.$thumbname,
    'alt' => $data->n_imagetxt,
    'class' => 'n_imageedt',
    'title' => $data->n_imagetxt,
  );
  if($data->n_image != ""){echo "<div class=smlimage>".img($image_properties)."</div>";} 
  echo form_label('Imagen: ','userfile');
  echo form_upload('userfile').br();
  echo form_label('Descripción imagen: ','n_imagetxt');
  echo form_input(array(
    'name'        => 'n_imagetxt',
    'id'          => 'n_imagetxt',
    'value'       => set_value('n_imagetxt',$data->n_imagetxt),
    'maxlength'   => '255',
    'size'        => '50',
  )).br();
  echo form_fieldset_close();
  echo form_fieldset('Fuente de la Noticia');
  echo form_label('Link a la fuente: ','n_link');
  echo form_input(array(
    'name'        => 'n_link',
    'id'          => 'n_link',
    'value'       => set_value('n_link',$data->n_link),
    'maxlength'   => '255',
    'size'        => '50',
  )).br();
  echo form_label('Descripción Fuente: ','n_linktxt');
  echo form_input(array(
    'name'        => 'n_linktxt',
    'id'          => 'n_linktxt',
    'value'       => set_value('n_linktxt',$data->n_linktxt),
    'maxlength'   => '255',
    'size'        => '50',
  )).br();
  echo form_fieldset_close();
  echo form_submit(array(
    'name'        => 'add',
    'value'       => 'Modificar Noticia',
    'class'       => 'button',
  ));
  echo form_reset(array(
    'name'        => 'reset',
    'value'       => 'Borrar',
    'class'       => 'button',
  ));
  echo form_close();
  echo '</div>';
  echo link_tag('css/jquery-ui-1.8.16.custom.css');
