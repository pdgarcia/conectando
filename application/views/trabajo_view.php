<div id="barrita"></div>
<div id="contenido">
  <div id="col1">
  </div>
  <div id="col2">
    <div>
      <p>
        Si desea trabajar con nosotros únicamente tiene que rellenar este formulario y con la mayor brevedad posible contestaremos a su petición.
      </p><br />
    </div>
    <h5>Formulario de contacto</h5>
    <?php echo form_open('contacto/send',array('id' => 'contacto')); ?>
      <table width="97%">
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