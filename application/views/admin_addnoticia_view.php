<?php
  echo '<ul class="menu1">';
  foreach($this->config->item('amenu') as $item)
      echo('<li>'. anchor($item['Link'],'<b>'.$item['Name'].'</b>').'</li>');
  echo '</ul>';
  echo validation_errors();
  if(isset($mensaje) && !empty($mensaje)){echo '<h3>'.$mensaje.'</h3>';}
  echo '<div id=formcontainer>';
  echo form_open_multipart('admin/add_noticia');
  echo form_label('Titulo: ','n_title');
  echo form_input(array(
    'name'        => 'n_title',
    'id'          => 'n_title',
    'value'       => set_value('n_title'),
    'maxlength'   => '255',
    'size'        => '50',
  )).br();
  echo form_label('Fecha de publicación: ','n_pdate');
  echo form_input(array(
    'name'        => 'n_pdate',
    'id'          => 'n_pdate',
    'value'       => set_value('n_pdate',date('d/m/Y')),
    'maxlength'   => '10',
    'size'        => '10',
  )).br();
  echo form_label('Activo: ','n_active');
  echo form_checkbox(array(
    'name'        => 'n_active',
    'id'          => 'n_active',
    'value'       => 'active',
    'checked'     => set_checkbox('n_active', 'active',TRUE),
  )).br();
  //echo form_label('Texto:','n_body').br();
  echo form_textarea(array(
    'name'        => 'n_body',
    'id'          => 'n_body',
    'value'       => set_value('n_body'),
    'rows'        => '20',
    'cols'        => '60',
  )).br();
  echo form_fieldset('Imagen').'<table>';
  echo '<tr><td>'.form_label('Imagen: ','userfile').'</td>';
  echo '<td>'.form_upload('userfile').'</td></tr>';
  echo '<tr><td>'.form_label('Descripción: ','n_imagetxt').'</td>';
  echo '<td>'.form_input(array(
    'name'        => 'n_imagetxt',
    'id'          => 'n_imagetxt',
    'value'       => set_value('n_imagetxt'),
    'maxlength'   => '255',
    'size'        => '50',
  )).'</td></tr>';
  echo '</table>'.form_fieldset_close();
  echo form_fieldset('Fuente de la Noticia').'<table>';
  echo '<tr><td>'.form_label('Link a la Fuente: ','n_link').'</td>';
  echo '<td>'.form_input(array(
    'name'        => 'n_link',
    'id'          => 'n_link',
    'value'       => set_value('n_link'),
    'maxlength'   => '255',
    'size'        => '50',
  )).'</td></tr>';
  echo '<tr><td>'.form_label('Descripción: ','n_linktxt').'</td>';
  echo '<td>'.form_input(array(
    'name'        => 'n_linktxt',
    'id'          => 'n_linktxt',
    'value'       => set_value('n_linktxt'),
    'maxlength'   => '255',
    'size'        => '50',
  )).'</td></tr>';
  echo '</table>'.form_fieldset_close();
  echo form_submit(array(
    'name'        => 'add',
    'value'       => 'Agregar Noticia',
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