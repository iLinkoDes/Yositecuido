$('#add_users').submit(function(event){
	event.preventDefault();
 	console.log($(this));
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
	    $('#submit').val('Enviar');
	  });
});