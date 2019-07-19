$(document).ready(function(){
	$('.btn-sideBar-SubMenu').on('click', function(){
		var SubMenu=$(this).next('ul');
		var iconBtn=$(this).children('.zmdi-caret-down');
		if(SubMenu.hasClass('show-sideBar-SubMenu')){
			iconBtn.removeClass('zmdi-hc-rotate-180');
			SubMenu.removeClass('show-sideBar-SubMenu');
		}else{
			iconBtn.addClass('zmdi-hc-rotate-180');
			SubMenu.addClass('show-sideBar-SubMenu');
		}
	});
	
	$('.btn-menu-dashboard').on('click', function(){
		var body=$('.dashboard-contentPage');
		var sidebar=$('.dashboard-sideBar');
		if(sidebar.css('pointer-events')=='none'){
			body.removeClass('no-paddin-left');
			sidebar.removeClass('hide-sidebar').addClass('show-sidebar');
		}else{
			body.addClass('no-paddin-left');
			sidebar.addClass('hide-sidebar').removeClass('show-sidebar');
		}
	});

	$('.FormularioAJAX').submit(function(e){
		e.preventDefault();
		var form = $(this);
		var tipo = form.attr('data-form');
		var accion = form.attr('action');
		var metodo = form.attr('method');
		var respuesta = form.children('.RespuestaAJAX');
		var msjError = "<script>swal('Ocurrio un error inesperado','Por favor recargue la pagina','error');</script>"
		var formdata = new FormData(this);

		var textoAlerta;
		if (tipo == "save"){
			textoAlerta = "Los datos que enviaras quedaran guardados en el sistema"; 
		}else if(tipo == "delete"){
			textoAlerta = "Los datos seran eliminados complemetamente del sistema";
		}else if (tipo == "update"){
			textoAlerta = "Los datos del sistema seran actualizados";
		}else if (tipo == "update-log"){
			textoAlerta = "Los datos de la cuenta de usuario seran actualizados, si realizas los cambios la sesion se cerrara de manera automatica";
		}else if (tipo == "search"){
			textoAlerta = "¿Deseas realizar la siguiente busqueda en el sistema?";
		}else{
			textoAlerta = "¿Quieres realizar la operacion solicitada?";
		}

		swal({
			title: "¿Estas Seguro?",
			text: textoAlerta,
			type: "question",
			showCancelButton: true,
			confirmButtonColor: '#03A9F4',
			cancelButtonColor: '#F44336',
			confirmButtonText: '<i class="zmdi zmdi-run"></i>Si, Aceptar',
			cancelButtonText: '<i class="zmdi zmdi-close-circle"></i>No, Cancelar'
		}).then(function(){
			$.ajax({
				type: metodo,
				url: accion,
				data: formdata ? formdata : form.serialize(),
				cache: false,
				contentType: false,
				processData: false,
				xhr: function(){
					var xhr = new window.XMLHttpRequest();
					xhr.upload.addEventListener("progress", function(evt){
						if (evt.lengthComputable){
							var percentComplete = evt.loaded / evt.total;
							percentComplete = parseInt(percentComplete * 100);
							if (percentComplete < 100){
								respuesta.append('<p class="text-center">Procesando...('+percentComplete+'%)</p><div class="progress progress-striped active"><div class="progress-bar progress-bar-info" style="width: '+percentComplete+'%"></div></div>');
							}else{
								respuesta.html('<p class="text-center"></p>');
							}
						}
					}, false);
					return xhr;
				}, 
				success: function(data){
					respuesta.html(data);
				},
				error: function(){
					respuesta.html(msjError);
				}
			});
			return false;
		});
	});

	$('.btn-Notifications-area').on('click', function(){
		var NotificationsArea=$('.Notifications-area');
		if(NotificationsArea.css('opacity')=="0"){
			NotificationsArea.addClass('show-Notification-area');
		}else{
			NotificationsArea.removeClass('show-Notification-area');
		}
	});
	$('.btn-search').on('click', function(){
		swal({
		  title: '¿Que estas Buscando?',
		  confirmButtonText: '<i class="zmdi zmdi-search"></i>  Buscar',
		  confirmButtonColor: '#03A9F4',
		  showCancelButton: true,
		  cancelButtonColor: '#F44336',
		  cancelButtonText: '<i class="zmdi zmdi-close-circle"></i> Cancelar',
		  html: '<div class="form-group label-floating">'+
			  		'<label class="control-label" for="InputSearch">Escribe aqui</label>'+
			  		'<input class="form-control" id="InputSearch" type="text">'+
				'</div>'
		}).then(function () {
		  swal(
		    'Bien hecho',
		    ''+$('#InputSearch').val()+'',
		    'success'
		  )
		});
	});
	$('.btn-modal-help').on('click', function(){
		$('#Dialog-Help').modal('show');
	});
});
(function($){
    $(window).on("load",function(){
        $(".dashboard-sideBar-ct").mCustomScrollbar({
        	theme:"light-thin",
        	scrollbarPosition: "inside",
        	autoHideScrollbar: true,
        	scrollButtons: {enable: true}
        });
        $(".dashboard-contentPage, .Notifications-body").mCustomScrollbar({
        	theme:"dark-thin",
        	scrollbarPosition: "inside",
        	autoHideScrollbar: true,
        	scrollButtons: {enable: true}
        });
    });
})(jQuery);