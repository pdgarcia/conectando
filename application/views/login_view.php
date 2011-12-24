<?php
	echo form_open('login/processlogin');
	echo form_fieldset('Login Information');
	echo form_label('Username:','username');
	$data = array(
              'name'        => 'username',
              'id'          => 'username',
              'value'       => set_value('username'),
              'maxlength'   => '100',
              'size'        => '50',
            );
	echo form_input($data);
	echo form_error('username', '<label class="error">', '</label>'). br();
	echo form_label('Password:','password');
	$data = array(
              'name'        => 'password',
              'id'          => 'password',
              'maxlength'   => '32',
              'size'        => '50',
            );
	echo form_password($data);
	echo form_error('password', '<label class="error">', '</label>'). br();
	echo form_submit('login','Login');
	echo form_reset('reset','Borrar');
	echo form_fieldset_close();
	echo form_close();
	if(isset($mensaje)){echo "<p class=error>".$mensaje."</p>";}