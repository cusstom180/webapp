$(document).ready(function(){
	
	
	$("#submt").prop("disabled", true);
	
	
	//buttton fill out js
	$("#fnamewrong").hide();
	$("#lnamewrong").hide();
	$("#userwrong").hide();
	$("#passwrong").hide();
	$("#emailwrong").hide();
	
	
	$("#fname").blur(function() {
		var textfname =  $.trim( $('#fname').val() );
		/* if (textBox == ""){
			$("#fnamewrong").show();
		} */
		alert(textfname);
	});
	
	$("#button").click(function(){
	 var textBox =  $.trim( $('#test3').val() );
	 var textBox2 =  $.trim( $('#test2').val() );
		if (textBox == ""){
			$("#fillout1").show();
		}
		
		if (textBox2 == ""){
			$("#fillout2").show();
		}
		
	});
	
	
	//email validation
	$("#fillout3").hide();
	$("#button").click(function(){
		var email = $.trim( $('#email').val() );
		var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
		if (!testEmail.test(email)) {
			$("#fillout3").show();
		} else {
			$("input[type='submit']").prop("disabled", false);
		}
	});
	
	
});

/*
	$('input[type=text]').each(function(){
			if (this.value === "") {
				//alert(this.value);
				$(this).after("<p id='fillout' >Fill out field</p>");
			
			} else {
				$("#fillout").empty();
			}
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
} */