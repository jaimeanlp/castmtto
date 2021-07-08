$(function(){
	agregaForm();
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
	$(document).on('click', '#envia', function(){
		const postData = {
				orden: $('#orden').val(),
				proveedor: $('#proveedor').val(),
				falla: $('#falla').val(),
				tipo: $('#tipo').val(),
				cliente: $('#cliente').val(),
				id: $('#idServicio').val(),
		};
		let url = edit === false ? 'addServicio.php' : 'editaServicio.php';
		$.post(url, postData, function(response){
			console.log(response);
			const service = JSON.parse(response);
			if (service.valida) {
				actualizaServicio();
				$('#servicio-form').trigger('reset');
				muestraResult(service.mensaje);
			}else{
				$('#serviceResult').removeClass('alert-success').addClass('alert-danger');
				muestraResult(service.mensaje);
			}
		});
	});

	$(document).on('click', '#asigna', function(){
		const postData = {
			id_tecnico: $('#tecnico').val(),
			id_servicio: $('#idServicio').val(),
		};
		$.post('asigna.php', postData, function(response){
			//console.log(response);
			agregaForm();
			actualizaServicio();
		});
	});

	$(document).on('change', '#select-filtro', function(){
		
	});


	$(document).on('click', '#cancela', function(){
		agregaForm();
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

	function agregaForm(){
		$.ajax({
			url: 'agregaForm.php',
			type: 'GET',
			success: function(response){
				$('.col-md-4').html(response);
			}
		})
	}

	function muestraResult(mensaje){
		$('#serviceResult').html(mensaje);
		$('#serviceResult').show();
			setTimeout(
				function() 
				{
					$('#serviceResult').fadeOut(1000);
				}, 3000);
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
			$('#idServicio').val(service.id);
			$('#envia').html('Editar servicio');
			edit = true;
		})
	});

	$(document).on('click', '.asigna-item', function(){
		let element = $(this)[0].parentElement.parentElement;
		let id_servicio = $(element).attr('service-id');
		$.post('serviceSingle.php', {id_servicio}, function(response){
			$('.card-body').html(response);
		})
	});

});


