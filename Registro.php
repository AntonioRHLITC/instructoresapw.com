<?php 
include("modulos/registro.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--normalize.css-->
    <link rel="stylesheet" href="./Estilos/normalize.css? " type="text/css">
    <!--preload-->
    <link rel="preload" href="./Estilos/Registro_Styles.css? " type="text/css">
    <!--Hoja de estilos principal-->
    <link rel="stylesheet" href="./Estilos/Registro_Styles.css? " type="text/css">
    
    <script type="text/javascript" src="./JavaScript/Registro_script.js"></script>
    <!--JQUERY-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <!--SWEETALERT2-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    
    <title>Registrarse</title>

    
  </head>
  <body>
  
  <div id="svg_wrap"></div>
  <div class="layout-title">
    <h1>Regístrate</h1>
    <a href="./login.php"><button class="button-home" id="home">&larr; Volver</button></a>
  </div>
  <main>
    <form action="" class="formulario" id="formulario" onsubmit="return submitUserForm();">
      <!--Inicio Sección: Información personal-->
      <section>
        <p class="title">Información personal</p>

        <!--Input: Nombre-->
        <div class="formulario__grupo layout-inputs" id="grupo__nombre">
          <label for="nombre" class="formulario__Label">Nombre(s)*:</label>
          <div class="formulario__grupo-input">
            <input type="text" class="formulario__input" placeholder="Tu nombre" name="nombre" id="nombre">
            <i class="formulario__validacion-estado fas fa-times-circle"></i>
          </div>
          <p class="formulario__input-error">El nombre(s) solo puede contener letras y espacios, minimo 3 maximo 50 caracteres.</p>
        </div>
        <!--Fin de Input: Nombre-->

        <!--Input: Primer Apellido-->
        <div class="formulario__grupo layout-inputs" id="grupo__pApellido">
          <label for="pApellido" class="formulario__Label label">Primer apellido*:</label>
          <div class="formulario__grupo-input">
            <input type="text" class="formulario__input" placeholder="Tu primer apellido" name="pApellido" id="pApellido">
            <i class="formulario__validacion-estado fas fa-times-circle"></i>
          </div>
          <p class="formulario__input-error">El Primer Apellido solo puede contener letras y espacios, minimo 3 maximo 50 caracteres.</p>
        </div>
        <!--Fin de Input: Primer Apellido-->

        <!--Input: Segundo Apellido-->
        <div class="formulario__grupo layout-inputs" id="grupo__sApellido">
          <label for="sApellido" class="formulario__Label label">Segundo apellido:</label>
          <div class="formulario__grupo-input">
            <input type="text" class="formulario__input" placeholder="Tu segundo apellido" name="sApellido" id="sApellido">
            <i class="formulario__validacion-estado fas fa-times-circle"></i>
          </div>
          <p class="formulario__input-error">El Segundo Apellido solo puede contener letras y espacios, minimo 3 maximo 50 caracteres (no es obligatorio).</p>
        </div>
        <!--Fin de Input: Segundo Apellido-->

        <!--Input: Teléfono-->
        <div class="formulario__grupo layout-inputs" id="grupo__telefono">
          <label for="telefono" class="formulario__Label">Teléfono*:</label>
          <div class="formulario__grupo-input">
            <input type="tel" class="formulario__input" placeholder="4491234567" name="telefono" id="telefono">
            <i class="formulario__validacion-estado fas fa-times-circle"></i>
          </div>
          <p class="formulario__input-error">El teléfono solo puede contener números y deben ser minimo 10 digitos</p>
        </div>
        <!--Input: Teléfono-->

      </section>
      <!--Fin de Sección: Información personal-->

      <!--Inicio Sección: Información laboral-->
      <section>
        <p>Información laboral</p>

        <!--Input: Nomina-->
        <div class="formulario__grupo layout-inputs" id="grupo__nomina">
          <label for="nomina" class="formulario__Label">Número de nomina*:</label>
          <div class="formulario__grupo-input">
            <input type="text" class="formulario__input" placeholder="Tu número de nomina" name="nomina" id="nomina">
            <i class="formulario__validacion-estado fas fa-times-circle"></i>
          </div>
          <p class="formulario__input-error">El número de nomina solo puede contener números de (0-9) y tiene que ser Exactamente 6 caracteres</p>
        </div>
        <!--Fin de Input: Nomina-->

        <!--Select: Planta-->
        <div class="formulario__grupo layout-inputs" id="grupo__planta">
          <label for="selectPlanta" class="formulario__Label">Planta*:</label>
          <div class="formulario_grupo-input">
            <select name="selectPlanta" id="selectPlanta" class="formulario__input select">
                <option selected="selected" disabled>Elige una Planta</option>
                <?php foreach($listaPlantas as $planta){ ?>
                    <option value="<?php echo $planta['ID_Planta']?>"><?php echo $planta['Nombre_Planta']?></option>
                <?php } ?>
            </select>
          </div>
          <p class="formulario__input-error">El usuario tiene que ser de 4 a 16 dígitos y solo puede contener numeros, letras y guion bajo.</p>
        </div>
        <!--Fin de Select: Planta-->

        <!--Select: Proceso-->
        <div class="formulario__grupo layout-inputs" id="grupo__proceso">
          <label for="selectProceso" class="formulario__Label">Proceso*:</label>
          <div class="formulario_grupo-input" id="selProceso"></div>
          <p class="formulario__input-error">El usuario tiene que ser de 4 a 16 dígitos y solo puede contener numeros, letras y guion bajo.</p>
        </div>
        <!--Fin de Select: Proceso-->

        <!--Select: Función-->
        <div class="formulario__grupo layout-inputs" id="grupo__funcion">
          <label for="selectFuncion" class="formulario__Label">Función:</label>
          <div class="formulario_grupo-input">
            <select name="selectFuncion" id="selectFuncion" class="select">
                <option selected="selected" disabled>Elige una Función</option>
                <?php foreach($listaFunciones as $funcion){ ?>
                    <option value="<?php echo $funcion['ID_Funcion']?>"><?php echo $funcion['Nombre_Funcion']?></option>
                <?php } ?>
            </select>
          </div>
          <p class="formulario__input-error">El usuario tiene que ser de 4 a 16 dígitos y solo puede contener numeros, letras y guion bajo.</p>
        </div>
        <!--Fin de Select: Función-->
      </section>
      <!--Fin de Sección: Información laboral-->

      <!--Inicio Sección: Información de Usuario-->
      <section>
        <p>Información de Usuario</p>

        <!--Input: Correo Electrónico-->
        <div class="formulario__grupo layout-inputs" id="grupo__correo">
          <label for="correo" class="formulario__Label">Correo Electrónico*:</label>
          <div class="formulario__grupo-input">
            <input type="email" class="formulario__input" placeholder="Ejemplo:correo@correo.com.mx" name="correo" id="correo">
            <i class="formulario__validacion-estado fas fa-times-circle"></i>
          </div>
          <p class="formulario__input-error">El correo solo puede contener letras, numeros, puntos, guiones y guion bajo.</p>
        </div>
        <!--Fin de Input: Correo Electrónico-->

        <!--Input: Contraseña-->
        <div class="formulario__grupo layout-inputs" id="grupo__password">
          <label for="password" class="formulario__Label">Contraseña*:</label>
          <div class="formulario__grupo-input">
            <input type="password" class="formulario__input" name="password" id="password">
            <i class="formulario__validacion-estado fas fa-times-circle"></i>
          </div>
          <p class="formulario__input-error">La contraseña tiene que ser de 6 a 25 caracteres.</p>
        </div>
        <!--Fin de Input: Contraseña-->

        <!--Input: Contraseña2-->
        <div class="formulario__grupo layout-inputs" id="grupo__password2">
          <label for="password2" class="formulario__Label">Repetir contraseña*:</label>
          <div class="formulario__grupo-input">
            <input type="password" class="formulario__input" name="password2" id="password2">
            <i class="formulario__validacion-estado fas fa-times-circle"></i>
          </div>
          <p class="formulario__input-error">Ambas contraseñas deben ser iguales</p>
        </div>
        <!--Fin de Input: Contraseña2-->


      </section>
      <!--Fin de Sección: Información de Usuario-->

      <section>
        <!--Terminos y condiciones-->
        <div class="formulario__grupo condiciones" id="grupo__terminos">
          <h3>Terminos y Condiciones</h3>
            <p>Al hacer clic en "Registrarte", aceptas nuestras Condiciones, la Política de datos y la Política de cookies. </p>
          <div class="captcha">
            <div class="g-recaptcha" data-sitekey="6LeWcKUgAAAAANfyhKMzpCuvyt-9Nv-JVlERsynB" data-callback="verifyCaptcha"></div>
            <div class="error-dis" id="g-recaptcha-error"></div>
          </div>
        </div>
        <!--Fin de :Terminos y condiciones-->
      </section>
      
      <div class="formulario__mensaje" id="formulario__mensaje">
        <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente.</p>
      </div>
      
      <div class="button" id="prev">&larr; Anterior</div>
      <div class="button" id="next">Siguiente &rarr;</div>

      <!--botón Enviar-->
			<div class="formulario__grupo formulario__grupo-btn-enviar button" id="submit">
				<input type="submit" class="submit" value="Enviar" name="submit">
			</div>
			<!--Fin de botón Enviar-->
    </form>
  </main>
  <script>
   /* Swal.fire({
				position: 'center',
				icon: 'success',
				customClass: 'swal-wide',
				title: 'Correcto',
				text: 'Te haz registrado correctamente, inicia sesión por primera vez',
				footer: '(La pagína se recargara automaticamente)',
				showConfirmButton: false,
				timer: 8000
			})*/
  </script>

  <script type="text/javascript">
      $(document).ready(function(){
          $('#selectPlanta').val();
          recargarLista();

          $('#selectPlanta').change(function(){
              recargarLista();
          });
      });
      function recargarLista(){
          var planta =$('#selectPlanta').val()
          $.ajax({
              
              type:"POST",
              url:"modulos/llenarSelect_2.php",
              data:{planta:planta},
              success:function(r){
                  $('#selProceso').html(r);
              }
          });
      }
  </script>
  
  <script>
    var recaptcha_response = '';
    function submitUserForm() {
        if(recaptcha_response.length == 0) {
            document.getElementById('g-recaptcha-error').innerHTML = '<span class="captcha-error">ERROR: Captcha invalido o falta llenarlo.</span>';
            return false;
        }
        return true;
    }
    
    function verifyCaptcha(token) {
        recaptcha_response = token;
        document.getElementById('g-recaptcha-error').innerHTML = '';
    }
  </script>

  <script type="text/javascript" src="JavaScript/formulario.js"></script>
  <script type="text/javascript" src="JavaScript/Formulario_Input.js"></script>
  <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
  </body>
</html>
