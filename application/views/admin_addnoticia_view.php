<?php
  echo $amenu;
  echo '<div id=formcontainer>';
  echo form_open_multipart('admin/add_noticia');
  echo form_label('Titulo:','n_title');
	echo form_input(array(
    'name'        => 'n_title',
    'id'          => 'n_title',
    'value'       => set_value('n_title'),
    'maxlength'   => '255',
    'size'        => '50',
  )).br();
	echo form_label('Fecha de publicación:','n_pdate');
	echo form_input(array(
    'name'        => 'n_pdate',
    'id'          => 'n_pdate',
    'value'       => set_value('n_pdate',date('d/m/Y')),
    'maxlength'   => '255',
    'size'        => '50',
  )).br();
	echo form_label('Activo:','n_active');
  echo form_checkbox(array(
    'name'        => 'n_active',
    'id'          => 'n_active',
    'value'       => 'active',
    'checked'     => set_checkbox('n_active', 'active',TRUE),
  )).br();
  echo form_label('Texto:','n_body').br();
	echo form_textarea(array(
    'name'        => 'n_body',
    'id'          => 'n_body',
    'value'       => set_value('n_body'),
    'rows'        => '20',
    'cols'        => '60',
  )).br();
	echo form_fieldset('Imagen');
	echo form_label('Imagen:','userfile');
	echo form_upload('userfile').br();
	echo form_label('Descripción imagen:','n_imagetxt');
	echo form_input(array(
    'name'        => 'n_imagetxt',
    'id'          => 'n_imagetxt',
    'value'       => set_value('n_imagetxt'),
    'maxlength'   => '255',
    'size'        => '50',
  )).br();
  echo form_fieldset_close();
  echo form_fieldset('Fuente de la Noticia');
	echo form_label('Link a la fuente:','n_link');
	echo form_input(array(
    'name'        => 'n_link',
    'id'          => 'n_link',
    'value'       => set_value('n_link'),
    'maxlength'   => '255',
    'size'        => '50',
  )).br();
	echo form_label('Descripción Fuente:','n_linktxt');
	echo form_input(array(
    'name'        => 'n_linktxt',
    'id'          => 'n_linktxt',
    'value'       => set_value('n_linktxt'),
    'maxlength'   => '255',
    'size'        => '50',
  )).br();
  echo form_fieldset_close();
  echo form_submit('add','Agregar Noticia');
  echo form_reset('reset','Borrar');
  echo form_close();
  echo validation_errors();
  if(isset($mensaje) && !empty($mensaje)){echo '<h3>'.$mensaje.'</h3>';}
  echo '</div>';
  echo link_tag('css/jquery-ui-1.8.16.custom.css');
?>
  <script type="text/javascript" src="<?php echo  base_url('ckeditor/ckeditor.js') ?>"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>
  <script type="text/javascript">
    $(function() {
      CKEDITOR.replace( 'n_body',
      {
        language: 'es',
        toolbar : 'Basic',
        uiColor : '#003399'
      });
      $.datepicker.regional['es'] = {
    		closeText: 'Cerrar',
    		prevText: '&#x3c;Ant',
    		nextText: 'Sig&#x3e;',
    		currentText: 'Hoy',
    		monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
    		'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
    		monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
    		'Jul','Ago','Sep','Oct','Nov','Dic'],
    		dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
    		dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
    		dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
    		weekHeader: 'Sm',
    		dateFormat: 'dd/mm/yy',
    		firstDay: 1,
    		isRTL: false,
    		showMonthAfterYear: false,
    		yearSuffix: ''};
    	$.datepicker.setDefaults($.datepicker.regional['es']);
    	$.datepicker.setDefaults({showButtonPanel: true});
    	
      $('#n_pdate').datepicker();
    });
  </script>




  