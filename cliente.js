$(function(){
	actualizaClientes();
	$('#serviceResult').hide();
	let edit = false;

	$('#search').keyup(function(){
		let search = $('#search').val();
		$.ajax({
			url: 'ajaxBuscaCliente.php',
			type: 'POST',
			data: {search: search},
			success: function(response){
				//let servicio = JSON.parse(response);
				//let template;
				$('#clientesTabla').html(response);
			}
		})
	})

	$('#servicio-form').submit(function(e){
		const postData = {
				nombre: $('#nombre').val(),
                direccion: $('#direccion').val(),
                ref: $('#ref').val(),
                longitud: $('#longitud').val(),
                latitud: $('#latitud').val(),
                id: $('#id').val(),
		};
		let url = edit === false ? 'addCliente.php' : 'editaCliente.php';
		$.post(url, postData, function(response){
			actualizaClientes();
			console.log(response);
			$('#servicio-form').trigger('reset');
			$('#serviceResult').show();
			$('#envia').html('Agregar cliente');
            edit = false;
			setTimeout(
				function() 
				{
					$('#serviceResult').hide();
				}, 3000);
		});
		e.preventDefault();
	});

	function actualizaClientes(){
		$.ajax({
			url: 'ajaxListaClientes.php',
			type: 'GET',
			success: function(response){
				$('#clientesTabla').html(response);
			}
		})
	}

	$(document).on('click', '.cliente-item', function(){
		let element = $(this)[0].parentElement.parentElement;
		let id = $(element).attr('cliente-id');

		$.post('clientSingle.php', {id}, function(response){
            console.log(response);
			const client = JSON.parse(response);
            $('#nombre').val(client.nombre);
            $('#direccion').val(client.direccion);
            $('#ref').val(client.referencia);
            $('#latitud').val(client.latitud);
            $('#longitud').val(client.longitud);
			$('#id').val(client.id);
            $('#envia').html('Editar cliente');
            edit = true;
		})
	});

});


