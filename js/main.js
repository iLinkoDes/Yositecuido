$( document ).ready(function() {
    console.log( "ready!" );

});


$("#form").submit(function(event){
	event.preventDefault();
	console.log("click");

	jQuery.ajax({
	  url: 'php/login.php',
	  type: 'POST',
	  dataType: 'json',
	  data: $(this).serialize(),
	  beforeSend: function(){
	  		$('#submit').val('Validando...');
	  	}
	  })
	  .done(function(resp) {
	    console.log(resp);
	   	if (!resp.error) {
	   		location.href="php/redirect.php";
	   	}else{
	   		$('.error').animate({top:'0px'});

	   	}
	  })
	  .fail(function(resp) {
	    console.log(resp.responseText);
	  })
	  .always(function() {
	    console.log("complete");
	    $('#submit').val('Iniciar Sesion');
	  });
});

$('#add_users').submit(function(event){
	event.preventDefault();
	console.log("click");

	jQuery.ajax({
	  url: '../php/test.php',
	  type: 'POST',
	  dataType: 'json',
	  data: $(this).serialize(),
	  beforeSend: function(){
	  		$('#submit').val('Validando...');
	  	}
	  })
	  .done(function(resp) {
	    console.log(resp);
	   	if (!resp.error) {
	   		location.href="AdminDashboard.php";
	   	}else{
	   		

	   	}
	  })
	  .fail(function(resp) {
	    console.log(resp.responseText);
	  })
	  .always(function() {
	    console.log("complete");
	    $('#submit').val('Enviar');
	  });
});
