$("#form").submit(function(event){
	event.preventDefault();

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
	    $('#submit').val('Iniciar Sesion');
	  });
});

