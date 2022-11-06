const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expresiones = {
	//usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
	nombre: /^[a-zA-ZÀ-ÿ\s]{3,50}$/, // Letras y espacios, pueden llevar acentos.
	pApellido: /^[a-zA-ZÀ-ÿ]{3,50}$/, // Letras y espacios, pueden llevar acentos.
	sApellido: /^[a-zA-ZÀ-ÿ]{3,50}$/, // Letras y espacios, pueden llevar acentos.
	password: /^.{6,25}$/, // 4 a 12 digitos.
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	telefono: /^\d{10,14}$/, // 7 a 14 numeros.
	nomina: /^\d{6}$/ // 7 a 14 numeros.
}

const campos ={
	nombre: false,
	pApellido: false,
	sApellido: false,
	password: false,
	correo: false,
	telefono: false,
	nomina: false
}

const validarFormulario = (e) =>{
	switch(e.target.name){
		case "nombre":
			validarCampo(expresiones.nombre, e.target, 'nombre');
		break;
		case "pApellido":
			validarCampo(expresiones.pApellido, e.target, 'pApellido');
		break;
		case "sApellido":
			validarCampo(expresiones.sApellido, e.target, 'sApellido');
		break;
		case "password":
			validarCampo(expresiones.password, e.target, 'password');
			validarPassword2();
		break;
		case "password2":
			validarPassword2();
		break;
		case "correo":
			validarCampo(expresiones.correo, e.target, 'correo');
		break;
		case "telefono":
			validarCampo(expresiones.telefono, e.target, 'telefono');
		break;
		case "nomina":
			validarCampo(expresiones.nomina, e.target, 'nomina');
		break;
	}
}

const validarCampo = (expresion, input, campo) =>{
	if(expresion.test(input.value)){
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos[campo] = true;
	}else{
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos[campo] = false;
	}
}

const validarPassword2 = () =>{
	const inputPassword1 = document.getElementById('password');
	const inputPassword2 = document.getElementById('password2');

	if(inputPassword1.value !== inputPassword2.value){
		document.getElementById(`grupo__password2`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__password2`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__password2 i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__password2 i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__password2 .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos['password'] = false;
	}else{
		document.getElementById(`grupo__password2`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__password2`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__password2 i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__password2 i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__password2 .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos['password'] = true;
	}
}

inputs.forEach((input) => {
	input.addEventListener('keyup', validarFormulario);
	input.addEventListener('blur', validarFormulario);
});

formulario.addEventListener('submit', (e) =>{
	e.preventDefault();
	
	let sPlanta = document.getElementById("selectPlanta");
	let sProceso = document.getElementById('selectProceso');
	let sFuncion = document.getElementById('selectFuncion');

	if(sPlanta.value == 'Elige una Planta'){
		document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
	}else if(sProceso.value == 'Elige un proceso'){
		document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
	}else if(sFuncion.value == 'Elige una Función'){
		document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
	}else if(submitUserForm()== false){
		document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
	}else if(campos.nombre && campos.pApellido && campos.sApellido && campos.password && campos.correo && campos.telefono && campos.nomina){
		
		$.ajax({
		//la url en la que esté tu php
		url  :"modulos/Registro_Usuarios-ext.php",
		//(aquí GET o POST)
		method :  "POST",
		data : {
			"nombre": $("#nombre").val(),
			"pApellido": $("#pApellido").val(),
			"sApellido": $("#sApellido").val(),
			"password": $("#password").val(),
			"correo": $("#correo").val(),
			"telefono": $("#telefono").val(),
			"nomina": $("#nomina").val(),
			"planta": $("#selectPlanta").val(),
			"proceso": $("#selectProceso").val(),
			"funcion": $("#selectFuncion").val()
			}
		}).done(function(response){
			//Aquí te devuelve el OK o KO dependiendo de lo que hagas en PHP
			//En php recibes en este caso concreto $_POST['nombreUsuario'] y $_POST['pass']
			formulario.reset();
			document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) =>{
				icono.classList.remove('formulario__grupo-correcto');
			});
			Swal.fire({
				position: 'center',
				icon: 'success',
				customClass: 'swal-wide',
				title: 'Correcto',
				text: 'Te haz registrado correctamente, inicia sesión por primera vez',
				footer: '(La pagína se recargara automaticamente)',
				showConfirmButton: false,
				timer: 4000
			})
			setTimeout('document.location.replace("login.php")',4000);
			//alert('Usuario registrado correctamente, Inicia sesión por primera vez.');
			//window.location.replace("login.php");
		});
	}else{
		document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
	}

});






/*		document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo');
setTimeout(() =>{
	document.getElementById('formulario__mensaje-exito').classList.remove('formulario__mensaje-exito-activo');
},5000);*/