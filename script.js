$(document).ready(function(){
	
	$("input[type='submit']").prop("disabled", true);
	
	
	$("input[type='button']").click(function (){
		
		checking();
			/*var inputValue = $(this).val();
			//var inputValue = document.getElementById("test").value;
			$.trim(inputValue);
			if (inputValue > )
			alert(inputValue);
			*/


	});
	
	
});

function checking() {
    var empty = 0;
    $('input[type=text]').each(function(){
		 //$("#fillout").remove();
		
       if (this.value === "") {
           empty++;
		  $("#fillout").remove();
           //$("#error").show('slow');
		   $(this).after("<p id='fillout' >Fill out field</p>");
       } 
    });
   alert(empty + ' empty input(s)');
}