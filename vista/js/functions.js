$(document).ready(function(){

	$('#btn_register').click(function(e){
		e.preventDefault();
		$('#popup_register').addClass('showFormRegister');

	});

	$('#close_form').click(function(e){
		$('#popup_register').removeClass('showFormRegister');
		$('#alert').html('');
		$('#alert').hide();
		$('#form_register_user')[0].reset();
	});



	$("#btn_create_user").click(function (e) {
		e.preventDefault();

		if($('#nombre').val() == '' || $('#correo').val()=='' || $('#user').val()=='' || $('#password').val()=='')
		{
			$('#alert').html('<p class="error">Completa tus datos de usuario.</p>');
			$('#alert').show(1000);
			return false;
		}
	    
	    $('#loader').show();
	    $.ajax({
				url: directoryUrl+"/ajax.php",
		        type: "post",
		        data: $('#form_register_user').serialize(),
		        success: function (response) {
		        	//console.log(response);
		        	$('#loader').hide();
		        	if(response == 'userExist')
		        	{
		        		$('#alert').html('<p class="error">El correo o el usuario ya existe, ingresa otro.</p>');
						$('#alert').show(1000);
		        	}
		        	if(response == 'ErrorDatos')
		        	{
		        		$('#alert').html('<p class="error">Error al crear el usuario.</p>');
						$('#alert').show(1000);
		        	}
		        	if(response == 'save')
		        	{
		        		$('#popup_register').html('<div id="alert_user_create"><a id="close_form" href="./">X</a><h2>Usuario Creado</h2><p class="save">Usuario creado con éxito, por favor sigue las instrucciones que te  han enviado al correo electrónico.</p></div>');
		        	}
		        },
		        error: function(response) {
		        	$('#loader').hide();
		           console.log("Error",response);
		        }


		});
	    
	});
});