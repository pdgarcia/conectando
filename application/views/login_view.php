<?php
  echo form_open('login/processlogin');
  echo form_fieldset('Login Information');
  echo form_label('Username: ','username');
  echo form_input(array(
    'name'        => 'username',
    'id'          => 'username',
    'value'       => set_value('username'),
    'maxlength'   => '100',
    'size'        => '50',
  ));
  echo form_error('username', '<label class="error">', '</label>'). br();
  echo form_label('Password: ','password');
  echo form_password(array(
    'name'        => 'password',
    'id'          => 'password',
    'maxlength'   => '32',
    'size'        => '50',
  ));
  echo form_error('password', '<label class="error">', '</label>'). br(2);
  echo form_submit(array(
    'name'        => 'login',
    'value'       => 'Login',
    'class'       => 'button',
  ));
  echo form_reset(array(
    'name'        => 'reset',
    'value'       => 'Borrar',
    'class'       => 'button',
  ));
  echo form_fieldset_close();
  echo form_close();
  if(isset($mensaje)){echo "<p class=error>".$mensaje."</p>";}