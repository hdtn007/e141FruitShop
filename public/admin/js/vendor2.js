/* form signup
*/

// show password
function show_password(show){
	if ($('#show_pass_signup').prop("checked")) {
		$("#input_password_signup").prop("type", "text");
		$("#input_re_password").prop("type", "text");
	}
	else{
		$("#input_password_signup").prop("type", "password");
		$("#input_re_password").prop("type", "password");	
	}
}

function show_password_login(show){
    if ($('#check_show_password').prop("checked")) {
        $("#input_password_login").prop("type", "text");
    }
    else{
        $("#input_password_login").prop("type", "password");   
    }
}

// check fomat email or phone
function CheckInput_PhoneOrEmail(input) {
    var regExpEmail = /^[A-Za-z][\w$.]+@[\w]+\.\w+$/;
    var regExpPhone = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/;

    var username = input.value;



    if (regExpEmail.test(username) || regExpPhone.test(username) ) {
        $("#err_mess_form").html("");
        return true;
    }
    else{
        
        $("#err_mess_form").html("Email hoặc số điện thoại chưa đúng !");
        return false;
    }
    
}

// check password

function check_null_value(input) {

    if ((input.value == null) || (input.value == ""))
    {
        $("#err_mess_form").html("Không được bỏ trống mật khẩu!");  
        return false;
    }
    else {
        $("#err_mess_form").html("");
        return true;
    }
}

// check re password

function check_re_password(input) {
	var pass = $('#input_password_signup').val();
    if ((input.value == null) || (input.value == ""))
    {
    	$("#err_mess_form").html("Không được bỏ trống!");  
    	return false;
    }
    else if (input.value == pass) {
    	return true;
    }
    else {
    	
    	$("#err_mess_form").html("Mật khẩu không trùng, vui lòng nhập lại đúng!");
        return false;
    }
}


function validateForm_signup_user() {
    var input_username = document.forms["signup_form"]["input_email_or_phone"];
    var input_pass = document.forms["signup_form"]["input_password_signup"];
    var input_repass = document.forms["signup_form"]["input_re_password"];
    var input_fistname = document.forms["signup_form"]["input_fistname"];
    var input_lastname = document.forms["signup_form"]["input_lastname"];
    if((check_null_value(input_fistname)==false) & (check_null_value(input_lastname)==false)){
       $("#err_mess_form").html("Họ hoặc tên không được để trống!");
       return false;
    }
    else if(CheckInput_PhoneOrEmail(input_username)==false){
       $("#err_mess_form").html("Email hoặc số điện thoại không đúng!");
       return false;
    }
    else if(check_null_value(input_pass)==false){
       $("#err_mess_form").html("Mật khẩu không được trống!");
       return false;
    }
    else if(check_re_password(input_repass)==false){
   	$("#err_mess_form").html("Mật khẩu không trùng, vui lòng nhập lại đúng!");
       return false;
    }
    else
    {
        $("#err_mess_form").html("");
        return true;
    }
    return true;
    
}