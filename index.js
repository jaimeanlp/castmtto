$(function(){
	actualizaServicio();
	$('#serviceResult').hide();
	let edit = false;

	$('#search').keyup(function(){
		let search = $('#search').val();
		$.ajax({
			url: 'ajaxBuscaServicio.php',
			type: 'POST',
			data: {search: search},
			success: function(response){
				//let servicio = JSON.parse(response);
				//let template;
				$('#serviciosTabla').html(response);
			}
		})
	})

	$('#servicio-form').submit(function(e){
		const postData = {
				orden: $('#orden').val(),
				proveedor: $('#proveedor').val(),
				falla: $('#falla').val(),
				tipo: $('#tipo').val(),
				cliente: $('#cliente').val(),
		};
		let url = edit === false ? 'addServicio.php' : 'editaServicio.php';
		$.post(url, postData, function(response){
			actualizaServicio();
			console.log(response);
			$('#servicio-form').trigger('reset');
			$('#serviceResult').show();
			setTimeout(
				function() 
				{
					$('#serviceResult').hide();
				}, 3000);

		});
		e.preventDefault();
	});

	jQuery(document).ready(function($){
		$(document).ready(function() {
			$('.mi-selector').select2();
		});
	});

	function actualizaServicio(){
		$.ajax({
			url: 'ajaxListaServicios.php',
			type: 'GET',
			success: function(response){
				$('#serviciosTabla').html(response);
			}
		})
	}

	$(document).on('click', '.service-item', function(){
		let element = $(this)[0].parentElement.parentElement;
		let id = $(element).attr('service-id');
		
		$.post('serviceSingle.php', {id}, function(response){
			console.log(response);
			const service = JSON.parse(response);
			$('#orden').prop('disabled', true);
			$('#orden').val(service.num_orden);
			$('#proveedor').val(service.proveedor);
			$('#tipo').val(service.tipo);
			$('#falla').val(service.falla);
			$('#cliente').val(service.cliente);
			$('#envia').html('Editar servicio');
			edit = true;
		})
	});

});


