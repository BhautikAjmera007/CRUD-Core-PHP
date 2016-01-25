$(document).ready(function () {

   //Only Number
   $("#mnum").on("keypress keyup blur",function (event) {
     $(this).val($(this).val().replace(/[^0-9\.]/g,''));
        if ((event.which < 48 || event.which > 57)) {
            event.preventDefault();
        }
    });

   //Only Alpabet
   $('#fname,#lname,#aboutme').keydown(function (e){
		var key = e.keyCode;
		if (!((key == 8) || (key == 32) || (key == 9) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90)))
		{
			e.preventDefault();
		}
	});

  // $('#uname').keydown(function (e){
  //   var key = e.keyCode;
  //   if (!((key == 8) || (key == 9) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90)))
  //     e.preventDefault();
  //   }
  // });

});

// Form All Field Validation Start

function validateFirstName()
{
  var firstName = document.forms["myForm"]["fname"].value;
  if (firstName == null || firstName == "") {
        document.getElementById("firstNameError").style.visibility = "visible";
        document.getElementById("firstNameError").innerHTML = "Pleas Enter First Name ...";
        // setTimeout(function() {$('#firstNameError').fadeOut('fast');}, 1000);
  }else if(firstName != ""){
        document.getElementById("firstNameError").style.visibility = "hidden";
  }
}

function validateLastName()
{
  var lastName = document.forms["myForm"]["lname"].value;
  if (lastName == null || lastName == "") {
        document.getElementById("lastNameError").style.visibility = "visible";
        document.getElementById("lastNameError").innerHTML = "Please Enter Last Name ...";
  }else if(lastName != ""){
        document.getElementById("lastNameError").style.visibility = "hidden";
  }
}

function validateMobileNumber()
{
  var mobileNumber = document.forms["myForm"]["mnum"].value;
  if (mobileNumber == null || mobileNumber == "") {
        document.getElementById("mobileNumberError").style.visibility = "visible";
        document.getElementById("mobileNumberError").innerHTML = "Please Enter Mobile Number ...";
   }else if(mobileNumber != ""){
        document.getElementById("mobileNumberError").style.visibility = "hidden";
   }
}

function validateEmail()
{ 
  var email = document.forms["myForm"]["email"].value;
  if (email == null || email == "") {
        document.getElementById("emailError").style.visibility = "visible";
        document.getElementById("emailError").innerHTML = "Please Enter Email ...";
  }
  else if(email != ""){
    var regx = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var val=regx.test(email);
   
    if(val == false){
    document.getElementById("emailError").style.visibility = "visible";
    document.getElementById("emailError").innerHTML = "PleaseEnter Valied Email Address...";
    document.getElementById("email").value = "";
    }else{
        document.getElementById("emailError").style.visibility = "hidden";
    }
  }
}

function validatePassword()
{
  var password = document.forms["myForm"]["psw"].value;
  if (password == null || password == "") {
        document.getElementById("passwordError").style.visibility = "visible";
        document.getElementById("passwordError").innerHTML = "Please Enter Password ...";
  }else if(password != ""){
        document.getElementById("passwordError").style.visibility = "hidden";
  }
}

function validateConfirmPassword()
{
  var confirmPassword = document.forms["myForm"]["cpsw"].value;
  if (confirmPassword == null || confirmPassword == "") {
        document.getElementById("confirmPasswordError").style.visibility = "visible";
        document.getElementById("confirmPasswordError").innerHTML = "Please Enter Confirm Password ...";
  }else if(confirmPassword != ""){
        document.getElementById("confirmPasswordError").style.visibility = "hidden";
  }
}

function validateCompany()
{
  var company = document.forms["myForm"]["company"].value;
  if (company == null || company == "") {
        document.getElementById("companyError").style.visibility = "visible";
        document.getElementById("companyError").innerHTML = "Please Enter Company Name ...";
  }else if(company != ""){
        document.getElementById("companyError").style.visibility = "hidden";
  }
}

function validateAboutMe()
{
  var aboutMe = document.forms["myForm"]["aboutme"].value;
  if (aboutMe == null || aboutMe == "") {
        document.getElementById("aboutMeError").style.visibility = "visible";
        document.getElementById("aboutMeError").innerHTML = "Please Enter AboutMe ...";
  }else if(aboutMe != ""){
        document.getElementById("aboutMeError").style.visibility = "hidden";
  }
}

function validateAddress()
{
  var address = document.forms["myForm"]["address"].value; 
  if (address == null || address == "") {
        document.getElementById("addressError").style.visibility = "visible";
        document.getElementById("addressError").innerHTML = "Please Enter Address ...";
  }else if(address != ""){
        document.getElementById("addressError").style.visibility = "hidden";
  }
}

function checkUrl(){
var urlToValidate = document.forms["myForm"]["wurl"].value;

if(urlToValidate != ""){
  var myRegExp =/^(?:(?:https?|ftp):\/\/)(?:\S+(?::\S*)?@)?(?:(?!10(?:\.\d{1,3}){3})(?!127(?:\.\d{1,3}){3})(?!169\.254(?:\.\d{1,3}){2})(?!192\.168(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]+-?)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]+-?)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})))(?::\d{2,5})?(?:\/[^\s]*)?$/i;

  if (!myRegExp.test(urlToValidate)){
    document.getElementById("urlError").style.visibility = "visible";
    document.getElementById("urlError").innerHTML = "URL is not Valied ...";
  }else{
         document.getElementById("urlError").style.visibility = "hidden";
  }
 }
}

function checkUserName(){
    var textBox1 = document.getElementById("uname");
    var textBox = document.getElementById("uname").value;
    var textLength = textBox1.value.length;  
    var re = /(?=^.{8,32}$)(?=(?:.*?\d){1})(?=.*[a-z])(?=(?:.*?[!@#$%*()_+^&}{:;?.]){1})(?!.*\s)[0-9a-zA-Z!@#$%*()_+^&]*$/;

    if(textLength <= 7){
      document.getElementById("userNameError").style.visibility = "visible";
      document.getElementById("userNameError").innerHTML = "User Name Must be atlist 8 characetr, try again ...";
    }else if (!re.test(textBox)){
      document.getElementById("userNameError").style.visibility = "visible";
      document.getElementById("userNameError").innerHTML = "Pattern not match must use one special character(!,@,#,$,-,_) ....";
    }else{
      document.getElementById("userNameError").style.visibility = "hidden";       
    }
}

// After change event of state, validateForm() fucntion will be called that will
// check if any of the control (execept URL and User Name) will remain blank than 
//it will disable the save button else it will enable save button. 
function validateForm()
{
  var firstname = document.forms["myForm"]["fname"].value;
  var lastname = document.forms["myForm"]["lname"].value;
  var mobileNumber = document.forms["myForm"]["mnum"].value;
  var email = document.forms["myForm"]["email"].value;
  var password = document.forms["myForm"]["psw"].value;
  var confirmPassword = document.forms["myForm"]["cpsw"].value;
  var company = document.forms["myForm"]["company"].value;
  var aboutMe = document.forms["myForm"]["aboutme"].value;
  var address = document.forms["myForm"]["address"].value;

  if(firstname == "" || lastname == "" || mobileNumber == "" || email == "" || password == "" || confirmPassword == "" || company == "" || aboutme == "" || address == ""){
  //Disable Save Button
  document.getElementById("save").disabled = true;
  }else{
  //Enable Save Button
  document.getElementById("save").disabled = false;
  }
}

// Working of this function is when user select India Country than another
// dropdown will be display that contain india state and when user select
// another country (except india) than one textbox will be displayed.
function changeState()
{
  var getCountryValue = document.forms["myForm"]["country"].value;
  if(getCountryValue == "1"){
    document.getElementById("state").style.visibility = "visible";
    document.getElementById("stateTextbox1").style.visibility = "hidden";
  }else if(getCountryValue != "1"){
    document.getElementById("state").style.visibility = "hidden";
    document.getElementById("stateTextbox1").style.visibility = "visible";
  }
}


//This function is used to reset all control value
function clearAll(){
  document.getElementById("myForm").reset();
}