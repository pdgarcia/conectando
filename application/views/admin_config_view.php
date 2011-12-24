<?php
  echo $amenu;
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
	echo form_error('u_email').br();
	echo form_submit('cambiar','Cambiar');
	echo form_fieldset_close();
	echo form_close();
	echo form_open('admin/chpass');
  echo form_fieldset('Password');
  echo form_label('Password Actual','password');
	echo form_password(array(
    'name'        => 'password',
    'id'          => 'password',
    'maxlength'   => '255',
    'size'        => '50',
  ));
  echo form_error('password').br();
  echo form_label('Nueva Password','npassword');
  echo form_password(array(
    'name'        => 'npassword',
    'id'          => 'npassword',
    'maxlength'   => '255',
    'size'        => '50',
  ));
  echo form_error('npassword').br();
  echo form_label('repetir nueva Password','rnpassword');
  echo form_password(array(
    'name'        => 'rnpassword',
    'id'          => 'rnpassword',
    'maxlength'   => '255',
    'size'        => '50',
  ));
  echo form_error('rnpassword').br();
	echo form_submit('cambiar','Cambiar');
	echo form_fieldset_close();
	echo form_close();
	if(isset($mensaje) && !empty($mensaje)){echo '<h3>'.$mensaje.'</h3>';}
  echo '</div>';