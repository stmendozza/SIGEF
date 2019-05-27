$(function(){

	$('#nuevo-usuario').on('click',function(){

		$('#formulario')[0].reset();

		$('#pro').val('Registro');

		$('#edi').hide();

		$('#reg').show();

		$('#registra-usuario').modal({

			show:true,

			backdrop:'static'

		});

	});

});



function agregaRegistroUsuario(){

	var url = 'agrega_usuario.php';

	$.ajax({

		type:'POST',

		url:url,

		data:$('#formulario').serialize(),

		success: function(registro){

			if ($('#pro').val() == 'Registro'){

				$('#formulario')[0].reset();

				$('#mensaje').addClass('bien').html('Registro completado con exito').show(200).delay(2500).hide(200);

				$('#agrega-registros').html(registro);

				window.location="usuarios.php";

				return false;

			}else{

				$('#mensaje').addClass('bien').html('Edicion completada con exito').show(200).delay(2500).hide(200);

				$('#agrega-registros').html(registro);

				window.location="usuarios.php";

				return false;

			}

		}

	});

	return false;

}



function eliminarUsuario(id){

	var url = 'elimina_usuario.php';

	var pregunta = confirm('¿Esta seguro de eliminar este usuario?');

	if(pregunta==true){

		$.ajax({

			type:'POST',

			url:url,

			data:'id='+id,

			success: function(registro){

				$('#agrega-registros').html(registro);

				return false;

			}

		});

		return false;

	}else{

		return false;

	}

}



function editarUsuario(id){

	$('#formulario')[0].reset();

	var url = 'edita_usuario.php';

	$.ajax({

		type:'POST',

		url:url,

		data:'id='+id,

		success: function(valores){

			var datos = eval(valores);

			$('#reg').hide();

			$('#edi').show();

			$('#pro').val('Edicion');

			$('#id-prod').val(id);

			$('#usuario').val(datos[0]);

			$('#nom_usu').val(datos[1]);

			$('#telefono_usu').val(datos[2]);
			
			$('#direccion_usu').val(datos[3]);
			
			$('#email').val(datos[4]);
			
			$('#registra-usuario').modal({

				show:true,

				backdrop:'static'

			});

			return false;

		}

	});

	return false;

}
$(document).ready(function(){

	

	var show = 1;

	

	$('.show').on('click', function(){

		

		if(show == 1){

			$('.content-menu').addClass("content-menu2");

			show = 0;

		}else{

			$('.content-menu').removeClass("content-menu2");

			show = 1;

		}

		

		

	})

	

})