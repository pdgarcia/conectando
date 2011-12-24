		<div id="barrita"> 
		</div>
		<div id="contenido">
			<div id="col1">
			</div>
			<div id="col2">
								<div><p>
					        Si desea ponerse en contacto con nosotros únicamente tiene que rellenar este formulario y con la mayor brevedad posible contestaremos a su petición.</p> <br />
					         	</div>
							<h5>Formulario de contacto</h5>
							<form action="contacto.php" method="post">
				          		<table width="97%">
				            <tr>
				              <td width="145" align="left" valign="top" class="body" id="company"><strong>Compa&ntilde;&iacute;a:</strong></td>
				              <td width="280" align="left" valign="top"><input name="company" type="text" id="company" size="30" /></td>
				            </tr>
				            <tr>
				              <td align="left" valign="top" class="body" id="name"><strong>Nombre:</strong></td>
				              <td align="left" valign="top"><input name="name" type="text" id="name" size="30" /></td>
				            </tr>
				            <tr>
				              <td align="left" valign="top" class="body" id="address"><strong>Direcci&oacute;n: </strong></td>
				              <td align="left" valign="top"><input name="address" type="text" id="address" size="30" /></td>
				            </tr>
				            <tr>
				              <td align="left" valign="top" class="body" id="telefono"><strong>Tel&eacute;fono: </strong></td>
				              <td align="left" valign="top"><input name="telefono" type="text" id="telefono" size="30" /></td>
				            </tr>
				            <tr>
				              <td align="left" valign="top" class="body" id="email"><strong> Email: </strong></td>
				              <td align="left" valign="top"><input name="email" type="text" id="email" size="30" /></td>
				            </tr>
				            <tr>
				              <td align="left" valign="top" class="body" id="mensaje"><strong>Mensaje: </strong></td>
				              <td align="left" valign="top"><textarea name="mensaje" cols="25" rows="6" id="mensaje"></textarea></td>
				            </tr>
				            <tr>
				              <td></td>
				              <td><input type="submit" name="submit" class="button" value="Enviar" /></td>
				            </tr>
				          </table>
				        </form>

				        <?php
				$company = $_POST['company'];
				$name = $_POST['name'];
				$address = $_POST['address'];
				$telefono = $_POST['telefono'];
				$email = $_POST['email'];
				$comentario = $_POST['mensaje'];

				If($name !='')
				{

				$header = 'From: ' . $email . " \r\n";
				$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
				$header .= "Mime-Version: 1.0 \r\n";
				$header .= "Content-Type: text/plain";

				$mensaje = "Este mensaje fue enviado por " . $name . ", de la empresa " . $company . " \r\n";
				$mensaje .= "Su e-mail es: " . $email . " \r\n";
				$mensaje .= "Mensaje: " . $comentario . " \r\n";
				$mensaje .= "Enviado el " . date('d/m/Y', time());

				$para = 'info@idealizarte.com';
				$asunto = 'Contacto desde webmaster Conectando Local';

				mail($para, $asunto, utf8_decode($mensaje), $header);

				echo '<div id=\'enviado\'>Mensaje enviado</div>';
				}
				?>
				<p>Todos los datos facilitados a través del formulario o correo 
					electrónico, serán tratados con estricta confidencialidad de 
					acuerdo a Ley Orgánica 15/1999, de 13 de diciembre, de Protección 
					de Datos. Si usted desea rectificar o cancelar sus datos de nuestro 
					fichero, puede notificarlo enviando una solicitud a través de nuestro
					 correo electrónico info@formajobs.com</p>
			</div>
		</div>
    </div><!-- fin container -->
