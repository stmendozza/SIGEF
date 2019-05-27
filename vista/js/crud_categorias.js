$(function(){

	$('#nueva-categoria').on('click',function(){

		$('#formulario')[0].reset();

		$('#pro').val('Registro');

		$('#edi').hide();

		$('#reg').show();

		$('#registra-categoria').modal({

			show:true,

			backdrop:'static'

		});

	});

	

});



function agregaRegistroCategoria(){

	var url = 'agrega_categoria.php';

	$.ajax({

		type:'POST',

		url:url,

		data:$('#formulario').serialize(),

		success: function(registro){

			if ($('#pro').val() == 'Registro'){

			$('#formulario')[0].reset();

			$('#mensaje').addClass('bien').html('Registro completado con exito').show(200).delay(2500).hide(200);

			$('#agrega-registros-categ').html(registro);

			window.location.href = "../controlador/categorias.php";

			return false;

			}else{

			$('#mensaje').addClass('bien').html('Edicion completada con exito').show(200).delay(2500).hide(200);

			$('#agrega-registros-categ').html(registro);

			window.location.href = "../controlador/categorias.php";

			return false;

			}

		}

	});

	return false;

}
 


function eliminarCategoria(id){

	var url = 'elimina_categoria.php';

	var pregunta = confirm('¿Esta seguro de eliminar este categoria?');

	if(pregunta==true){

		$.ajax({

		type:'POST',

		url:url,

		data:'id='+id,

		success: function(registro){

			$('#agrega-registros-categ').html(registro);
			
			window.location.href = "../controlador/categorias.php";

			return false;

		}

	});

	return false;

	}else{

		return false;

	}

}



function editarCategoria(id){

	$('#formulario')[0].reset();

	var url = 'edita_categoria.php';

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

				$('#nom_categ').val(datos[0]);

				$('#registra-categoria').modal({

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

	window.open('reportescategoriasq.php?desde='+desde+'&hasta='+hasta);

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
