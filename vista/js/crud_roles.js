$(function(){ 


	$('#nuevo-rol').on('click',function(){

		$('#formulario')[0].reset();

		$('#pro').val('Registro');

		$('#edi').hide();

		$('#reg').show();

		$('#registra-rol').modal({

			show:true,

			backdrop:'static'

		});

	});

});



function agregaRegistroRol(){

	var url = 'agrega_rol.php';

	$.ajax({

		type:'POST',

		url:url,

		data:$('#formulario').serialize(),

		success: function(registro){

			if ($('#pro').val() == 'Registro'){

				$('#formulario')[0].reset();

				$('#mensaje').addClass('bien').html('Registro completado con exito').show(200).delay(2500).hide(200);

				$('#agrega-registros').html(registro);

				window.location="roles.php";

				return false;

			}else{

				$('#mensaje').addClass('bien').html('Edicion completada con exito').show(200).delay(2500).hide(200);

				$('#agrega-registros').html(registro);

				window.location="roles.php";

				return false;

			}

		}

	});

	return false;

}



function eliminarRol(id){

	var url = 'elimina_rol.php';

	var pregunta = confirm('¿Esta seguro de eliminar este rol?');

	if(pregunta==true){

		$.ajax({

			type:'POST',

			url:url,

			data:'id='+id,

			success: function(registro){

				$('#agrega-registros').html(registro);

				window.location="roles.php";

				return false;

			}

		});

		return false;

	}else{

		return false;

	}

}



function editarRol(id){

	$('#formulario')[0].reset();

	var url = 'edita_rol.php';

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

			$('#nom_rol').val(datos[0]);

			$('#responsabilidades').val(datos[1]);

			$('#registra-rol').modal({

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