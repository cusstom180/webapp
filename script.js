$(document).ready(function(){
	
	
	$("#submt").prop("disabled", true);
	
	//declare varibles
	var first;
	var last;
	var user;
	var pass;
	var email;
	var test;
	
	//buttton fill out js
	$("#fnamewrong").hide();
	$("#lnamewrong").hide();
	$("#userwrong").hide();
	$("#passwrong").hide();
	$("#emailwrong").hide();
	
	//validation for first name field
	$("#fname").change(function() {
		var textfname =  $.trim( $('#fname').val() );
		 if (textfname.length < 3){
			$("#fnamewrong").show();
			 first = false;
			 
		} else {
			$("#fnamewrong").hide();
			first = true;
			//test.push(textfname);
		}
	});
	
	//validation for last name field
	$("#lname").change(function() {
		var textlname =  $.trim( $('#lname').val() );
		 if (textlname.length < 3){
			$("#lnamewrong").show(); 
		} else {
			$("#lnamewrong").hide();
			last = true;
			//test.push(textlname);
		}
	});
	
	//validation for user name field
	$("#user").change(function() {
		var textuser =  $.trim( $('#user').val() );
		 if (textuser.length < 3){
			$("#userwrong").show();
		} else {
			$("#userwrong").hide();
			user = true;
			//test.push(textuser);
		}
	});
	
	//validation for password field
	$("#pass").change(function() {
		var textpass=  $.trim( $('#pass').val() );
		 if (textpass.length < 3){
			$("#passwrong").show();
		} else {
			$("#passwrong").hide();
			pass = true;
			//test.push(textpass);
		}
	});
	
	//email validation
	$("#email").change(function(){
		var textemail = $.trim( $('#email').val() );
		var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
		if (!testEmail.test(textemail)) {
			$("#emailwrong").show();
		} else {
			$("#emailwrong").hide();
			email = true;
		}
	});
	
	$("#form").change(function() {
		//alert("the change worked");
		if (((first === user) && (pass ===last)) && email) {
				$("#submt").prop("disabled", false);
				alert("in change if stmt");
		} else {
			$("#submt").prop("disabled", true);
			alert("help");
		}
		
	});
	
	
});

/*

$("#button").click(function(){
	 var textBox =  $.trim( $('#test3').val() );
	 var textBox2 =  $.trim( $('#test2').val() );
		if (textBox === ""){
			$("#fillout1").show();
		}
		
		if (textBox2 == ""){
			$("#fillout2").show();
		}
		
	});


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