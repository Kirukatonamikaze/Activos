$(document).ready(function(){
	$("#log").click(function(event){
		event.preventDefault();
		usu = $("#inputEmail").val();
		pass = $("#inputPassword").val();

		if (usu=="") {
			$("#inputEmail").css("border-color","red");
		}
		if (pass=="") {
			$("#inputPassword").css("border-color","red");
		}
		else if(usu=="" && pass!=""){
			$("#inputEmail").css("border-color","red");
		}
		else{
			$.ajax({
			url: "login.php",
			type: "POST",
			dataType: "html",
			data:{usuario:usu,pass:pass},
			beforeSend: function () {
					$("#log").html("Validando...");
					$("#log").prop("disabled", true);
			},
		}).done(function(respuesta){
			if (respuesta == 1) {
				setTimeout(function(){
					location.href = "Activos";
				},1000)

			}
			else{
				setTimeout(function(){
					$("#log").html("Entrar");
					$("#log").prop("disabled", false);
					$("#resp").html(respuesta);
					$("#resp").slideDown("slow");
					setTimeout(function(){
						$("#resp").slideUp("slow");
					},4000)
				},2000)


			}

		})
		}
	})


	$("#inputEmail").focus(function(){
		$("#inputEmail").css("border-color","rgb(104, 145, 162)");
	})

	$("#inputPassword").focus(function(){
		$("#inputPassword").css("border-color","rgb(104, 145, 162)");
	})


});
