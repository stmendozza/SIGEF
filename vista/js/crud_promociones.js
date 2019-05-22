$(document).ready(pagination(1));

$(function(){

	$('#bd-desde').on('change', function(){

		var desde = $('#bd-desde').val();

		var hasta = $('#bd-hasta').val();

		var url = 'busca_promocion_fecha.php';

		$.ajax({

		type:'POST',

		url:url,

		data:'desde='+desde+'&hasta='+hasta,

		success: function(datos){

			$('#agrega-registros-promo').html(datos);

		}

	});

	return false;

	}); 

	

	$('#bd-hasta').on('change', function(){

		var desde = $('#bd-desde').val();

		var hasta = $('#bd-hasta').val();

		var url = 'busca_promocion_fecha.php';

		$.ajax({

		type:'POST',

		url:url,

		data:'desde='+desde+'&hasta='+hasta,

		success: function(datos){

			$('#agrega-registros-promo').html(datos);

		}

	});

	return false;

	});

	

	$('#nueva-promo').on('click',function(){

		$('#formulario')[0].reset();

		$('#pro').val('Registro');

		$('#edi').hide();

		$('#reg').show();

		$('#registra-promo').modal({

			show:true,

			backdrop:'static'

		});

	});

	

	$('#bs-prod').on('keyup',function(){

		var dato = $('#bs-prod').val();

		var url = 'busca_promocion.php';

		$.ajax({

		type:'POST',

		url:url,

		data:'dato='+dato,

		success: function(datos){

			$('#agrega-registros-promo').html(datos);

		}

	});

	return false;

	});

	

});



function agregaRegistroPromocion(){

	var url = 'agrega_promocion.php';

	$.ajax({

		type:'POST',

		url:url,

		data:$('#formulario').serialize(),

		success: function(registro){

			if ($('#pro').val() == 'Registro'){

			$('#formulario')[0].reset();

			$('#mensaje').addClass('bien').html('Registro completado con exito').show(200).delay(2500).hide(200);

			$('#agrega-registros-promo').html(registro);

			return false;

			}else{

			$('#mensaje').addClass('bien').html('Edicion completada con exito').show(200).delay(2500).hide(200);

			$('#agrega-registros-promo').html(registro);

			return false;

			}

		}

	});

	return false;

}
 


function eliminarPromocion(id){

	var url = 'elimina_promocion.php';

	var pregunta = confirm('¿Esta seguro de eliminar este promocione?');

	if(pregunta==true){

		$.ajax({

		type:'POST',

		url:url,

		data:'id='+id,

		success: function(registro){

			$('#agrega-registros-promo').html(registro);

			return false;

		}

	});

	return false;

	}else{

		return false;

	}

}



function editarPromocion(id){

	$('#formulario')[0].reset();

	var url = 'edita_promocion.php';

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

				$('#descripcion_promo').val(datos[0]);

				$('#registra-promo').modal({

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

	window.open('reportespromocionesq.php?desde='+desde+'&hasta='+hasta);

}



function pagination(partida){

	var url = 'paginar_promociones.php';

	$.ajax({

		type:'POST', 

		url:url,

		data:'partida='+partida,

		success:function(data){

			var array = eval(data);

			$('#agrega-registros-promo').html(array[0]);

			$('#pagination-promo').html(array[1]);

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

$('.image-file-button').each(function() {

      $(this).off('click').on('click', function() {

           $(this).siblings('.image-file').trigger('click');

      });

});

$('.image-file').each(function() {

      $(this).change(function () {

           $(this).siblings('.image-file-chosen').val(this.files[0].name);

      });

});