$(function(){

	$('#bd-desde').on('change', function(){

		var desde = $('#bd-desde').val();

		var hasta = $('#bd-hasta').val();

		var url = 'busca_ingreso_fecha.php';

		$.ajax({

			type:'POST',

			url:url,

			data:'desde='+desde+'&hasta='+hasta,

			success: function(datos){

				$('#agrega-registros').html(datos);

			}

		});

		return false;

	});

	

	$('#bd-hasta').on('change', function(){

		var desde = $('#bd-desde').val();

		var hasta = $('#bd-hasta').val();

		var url = 'busca_ingreso_fecha.php';

		$.ajax({

			type:'POST',

			url:url,

			data:'desde='+desde+'&hasta='+hasta,

			success: function(datos){

				$('#agrega-registros').html(datos);

			}

		});

		return false;

	});

	

	$('#nuevo-producto').on('click',function(){

		$('#formulario')[0].reset();

		$('#pro').val('Registro');

		$('#edi').hide();

		$('#reg').show();

		$('#registra-producto').modal({

			show:true,

			backdrop:'static'

		});

	});


});


function eliminarProducto(id){

	var url = 'elimina_producto.php';

	var pregunta = confirm('¿Esta seguro de eliminar este Producto?');

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



function editarProducto(id){

	$('#formulario')[0].reset();

	var url = 'edita_producto.php';

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

			$('#nombre').val(datos[0]);

			$('#tipo').val(datos[1]);

			$('#precio-uni').val(datos[2]);

			$('#precio-dis').val(datos[3]);

			$('#registra-producto').modal({

				show:true,

				backdrop:'static'

			});

			return false;

		}

	});

	return false;

}



function reportePDF(){

	var desde = $('#bd-desde').val();

	var hasta = $('#bd-hasta').val();

	window.open('reportesingresosq.php?desde='+desde+'&hasta='+hasta);

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