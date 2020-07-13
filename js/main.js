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
	  		$('#error').val('Validando...');
	  	}
	  })
	  .done(function(resp) {
	    console.log(resp);
	   	if (!resp.error) {
	   		location.href="login.html";
	   	}else{
	   		$('.error').animate({top:'0px'});
	   	}
	  })
	  .fail(function(resp) {
	    console.log(resp.responseText);
	  })
	  .always(function() {
	    console.log("complete");
	  });
});

$('.close').click(function(event){
	event.preventDefault();
	$('.error').animate({top:'-74px;'});
});