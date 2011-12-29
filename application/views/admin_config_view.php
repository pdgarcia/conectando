<?php
  echo '<ul class="menu1">';
  foreach($this->config->item('amenu') as $item)
      echo('<li>'. anchor($item['Link'],'<b>'.$item['Name'].'</b>').'</li>');
  echo '</ul>';
  echo '<div id=formcontainer>';
  echo form_open('admin/chemail');
  echo form_fieldset('Dirección de Notificación');
  echo form_input(array(
    'name'        => 'u_email',
    'id'          => 'u_email',
    'value'       => set_value('u_email',$orgu_email),
    'maxlength'   => '255',
    'size'        => '50',
  ));
  echo form_error('u_email') . nbs(3);
  echo form_submit(array(
    'name'        => 'cambiar',
    'value'       => 'Cambiar',
    'class'       => 'button',
  ));
  echo form_fieldset_close();
  echo form_close();
  echo form_open('admin/chpass');
  echo form_fieldset('Password');
  echo '<table><tr><td>';
  echo form_label('Password Actual: ','password').'</td><td>';
  echo form_password(array(
    'name'        => 'password',
    'id'          => 'password',
    'maxlength'   => '32',
    'size'        => '50',
  ));
  echo form_error('password').'</td></tr><tr><td>';
  echo form_label('Nueva Password: ','npassword').'</td><td>';
  echo form_password(array(
    'name'        => 'npassword',
    'id'          => 'npassword',
    'maxlength'   => '32',
    'size'        => '50',
  ));
  echo form_error('npassword').'</td></tr><tr><td>';
  echo form_label('Repetir Nueva Password: ','rnpassword').'</td><td>';
  echo form_password(array(
    'name'        => 'rnpassword',
    'id'          => 'rnpassword',
    'maxlength'   => '32',
    'size'        => '50',
  ));
  echo form_error('rnpassword').'</td></tr><tr><td>';
  echo form_submit(array(
    'name'        => 'cambiar',
    'value'       => 'Cambiar',
    'class'       => 'button',
  )).'</td></tr><tr><td></td></tr></table>';
  echo form_fieldset_close();
  echo form_close();
  if(isset($mensaje) && !empty($mensaje)){echo '<h3>'.$mensaje.'</h3>';}
  echo '</div>';