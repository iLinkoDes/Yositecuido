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

	  	}
	  })
	  .done(function(resp) {
	    console.log(resp);
	  })
	  .fail(function(resp) {
	    console.log(resp.responseText);
	  })
	  .always(function() {
	    console.log("complete");
	  });
});