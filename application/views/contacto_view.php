<div id="barrita"></div>
<div id="contenido">
  <div id="col1">
    <a href="http://maps.google.com/maps?q=Calle+del+Inspector+Juan+Antonio+Bueno,+2,+Alcorc%C3%B3n,+Spain&hl=en&ie=UTF8&ll=40.345121,-3.806752&spn=0.007793,0.016512&sll=40.304976,-3.732677&sspn=0.249516,0.528374&oq=Inspector+Juan+Antonio+Bueno,+2+&t=m&hnear=Calle+del+Inspector+Juan+Antonio+Bueno,+2,+28924+Alcorc%C3%B3n,+Madrid,+Comunidad+de+Madrid,+Spain&z=17" target="_blank">
      <img src="<?php echo base_url('images/local.jpg'); ?>" width="300" height="118" alt="Local"><img src="<?php echo base_url('images/mapa.png'); ?>" width="296" height="216" alt="Mapa"></a>
      <br /><br /><br /><br /><br /><br />
    <h6>Información de contacto:</h6>
    <p>
      <span class="blanco"> Inspector Juan Antonio Bueno, 2<br />
      28924 Alcorcón - Madrid<br />
      ESPAÑA<br /></span>
    </p><br /><br />
    <p>
      <span class="blanco"><span><img src="<?php echo base_url('images/ico-phone.png'); ?>" alt="Phone" width="20" height="16" hspace="2"> Teléfono:</span> 91 665 23 54<br />
      <span><img src="<?php echo base_url('images/ico-fax.png'); ?>" alt="Fax" width="20" height="16" hspace="2"> Fax:</span> 91 684 01 79<br />
      <span><img src="<?php echo base_url('images/ico-website.png'); ?>" alt="WWW Link" width="20" height="16" hspace="2"> Web:</span> <a href="http://www.formaeduca.com">wwwconectandolocal.net</a><br />
      <span><img src="<?php echo base_url('images/ico-email.png'); ?>" alt="Email" width="20" height="16" hspace="2"> Email:</span> <a href="mailto:info@conectandolocal.net">info@conectandolocal.net</a><br /></span>
    </p>
  </div>
  <div id="col2">
    <div>
      <p>
        Si desea ponerse en contacto con nosotros únicamente tiene que rellenar este formulario y con la mayor brevedad posible contestaremos a su petición.
      </p><br />
    </div>
    <h5>Formulario de contacto</h5>
    <?php echo form_open('contacto/sendc',array('id' => 'contacto')); ?>
      <table width="97%">
        <tr>
          <td width="145" align="left" valign="top" class="body" id="company">
            <strong>Compañía:</strong>
          </td>
          <td width="280" align="left" valign="top">
            <input name="compania" type="text" id="compania" size="30" value="<?php echo set_value('compania'); ?>" />
          </td>
        </tr>
        <tr>
          <td align="left" valign="top" class="body" id="name">
            <strong>Nombre:</strong>
          </td>
          <td align="left" valign="top">
            <input name="nombre" type="text" id="nombre" size="30" value="<?php echo set_value('nombre'); ?>" />
          </td>
        </tr>
        <tr>
          <td align="left" valign="top" class="body" id="address">
            <strong>Dirección:</strong>
          </td>
          <td align="left" valign="top">
            <input name="direccion" type="text" id="direccion" size="30" value="<?php echo set_value('direccion'); ?>" />
          </td>
        </tr>
        <tr>
          <td align="left" valign="top" class="body" id="telefono">
            <strong>Teléfono:</strong>
          </td>
          <td align="left" valign="top">
            <input name="telefono" type="text" id="telefono" size="30" value="<?php echo set_value('telefono'); ?>" />
          </td>
        </tr>
        <tr>
          <td align="left" valign="top" class="body" id="email">
            <strong>Email:</strong>
          </td>
          <td align="left" valign="top">
            <input name="email" type="text" id="email" size="30" value="<?php echo set_value('email'); ?>" />
          </td>
        </tr>
        <tr>
          <td align="left" valign="top" class="body" id="mensaje">
            <strong>Mensaje:</strong>
          </td>
          <td align="left" valign="top">
            <textarea name="mensaje" cols="25" rows="6" id="mensaje"><?php echo set_value('mensaje'); ?></textarea>
          </td>
        </tr>
        <tr>
          <td></td>
          <td>
            <input type="submit" name="submit" class="button" value="Enviar">
          </td>
        </tr>
      </table>
    <?php echo form_close(); ?>
    <div id="mensaje_inf"><?php if(isset($mensaje)){echo $mensaje;} ?></div>
    <p>
      Todos los datos facilitados a través del formulario o correo electrónico, serán tratados con estricta confidencialidad de acuerdo a Ley Orgánica 15/1999, de 13 de diciembre, de Protección de Datos. Si usted desea rectificar o cancelar sus datos de nuestro fichero, puede notificarlo enviando una solicitud a través de nuestro correo electrónico info@formajobs.com
    </p><br /><br /><br /><br /><br /><br /><br />
  </div>
</div>