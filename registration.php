<?php
	if(isset($_POST['back'])){
		header('Location: display_userdata.php');
	}
?>

<?php include('header.php'); ?>
<?php include('menu.php'); include('config.php'); ?>

<?php
  if(!isset($_SESSION['uname'])){
    header('Location: index.php');
  }
?>

<?php
	if(isset($_POST['save'])){

		$firstName=$_POST['fname'];
		$lastName=$_POST['lname'];
		$gender=$_POST['gender'];
		$mnumber=$_POST['mnum'];
		$email=$_POST['email'];
		$password=$_POST['psw'];
		$confirmPassword=$_POST['cpsw'];
		$company=$_POST['company'];
		$aboutme=$_POST['aboutme'];
		$address=$_POST['address'];
		$state=$_POST['state'];
		$country=$_POST['country'];

		if($password != $confirmPassword){
			$msg="Password is not matched with Confirm Password, try again ...";
		}else if($country == "0"){
			$msg="Please Select Country ...";
		}else if($state == "0"){
			$msg="Please Select State ...";
		}
		else{
			$query_insert="insert into registration (first_name,last_name,gender,mobile_number,email,password,company,aboutme,address,state,country) values ('$firstName','$lastName','$gender','$mnumber','$email','$password','$company','$aboutme','$address','$state','$country')";
			mysql_query($query_insert);	
			$msg_success="Record Inserted Successfully ...";
		}
	}

	// Edit Record id comes here from the display_userdata page
	$id=$_REQUEST['id'];
	$query_fetch_data="Select first_name,last_name,gender,mobile_number,email,password,company,aboutme,address,state,country from registration where id='".$id."'";
	$res=mysql_query($query_fetch_data) or mysql_error();
	$row=mysql_fetch_array($res);

	if(isset($_POST['update'])){
		$firstName=$_POST['fname'];
		$lastName=$_POST['lname'];
		$gender=$_POST['gender'];
		$mnumber=$_POST['mnum'];
		$email=$_POST['email'];
		$password=$_POST['psw'];
		$confirmPassword=$_POST['cpsw'];
		$company=$_POST['company'];
		$aboutme=$_POST['aboutme'];
		$address=$_POST['address'];
		$state=$_POST['state'];
		$country=$_POST['country'];

		if($password != $confirmPassword){
			$msg="Password is not matched with Confirm Password, try again ...";
		}else if($country == "0"){
			$msg="Please Select Country ...";
		}else if($state == "0"){
			$msg="Please Select State ...";
		}
		else{
			$query_update="update registration set first_name='$firstName',last_name='$lastName',gender='$gender',mobile_number='$mnumber',email='$email',password='$password',company='$company',aboutme='$aboutme',address='$address',state='$state',country='$country' where id='".$id."'";
			mysql_query($query_update);
			$msg_success="Record Updated Successfully ...";
		}	
	}	
?>

<div class="content-wrapper" id="changeBackColor">
  <section class="content-header">
    <h1>Registration</h1>
  </section>

  <section class="content">

  <?php if(isset($msg)) {?>
  	<div class="alert alert-danger" role="alert" id="msg_error">
  		<?php echo $msg; ?>
  	</div>
  <?php } ?>

  <?php if(isset($msg_success)) {?>
  	<div class="alert alert-success" role="alert" id="msg_error">
  		<?php echo $msg_success; ?>
  	</div>
  <?php } ?>

  	<form method="post">
  		<div class="pull-right">
	    	<button class="btn btn-primary" name="back">
			  <span class="glyphicon glyphicon-chevron-left"></span>
			</button>
	    </div>
  	</form>

    <form name="myForm" id="myForm" class="form-horizontal" method="post">

		  <div class="form-group">
		    <label for="fname" class="col-sm-2 control-label">First Name</label>
		    <div class="col-sm-4">
		      <input type="text" class="form-control a" name="fname" id="fname" maxlength="15" value="<?php echo $row['first_name'];?>" onblur ="return validateFirstName()" autofocus>
		    </div>

		    <div class="col-sm-5">
			   <div id="firstNameError" class="alert alert-danger" role="alert"></div>
			</div>		    
		  </div>

		  <div class="form-group">
		    <label for="lname" class="col-sm-2 control-label">Last Name</label>
		    <div class="col-sm-4">
		      <input type="text" class="form-control a" name="lname" id="lname" maxlength="15" value="<?php echo $row['last_name'];?>" onblur="validateLastName()">
		    </div>

		    <div class="col-sm-5">
			   <div id="lastNameError" class="alert alert-danger" role="alert"></div>
			</div>
		  </div>

		  <div class="form-group">
		    <label for="gender" class="col-sm-2 control-label">Gender</label>
		    <div class="col-sm-10">
				  <div class="radio">
					  <label>
					    <input type="radio" name="gender" value="0" <?php if($row['gender'] == "0"){ echo "checked"; }?> checked>Male
					  </label>
					  <label>
					    <input type="radio" name="gender" value="1" <?php if($row['gender'] == "1"){ echo "checked"; }?>>Female
					  </label>
				</div>
		    </div>
		  </div>

	
		  <div class="form-group">
		    <label for="mnum" class="col-sm-2 control-label">Mobile Number</label>
		    <div class="col-sm-4">
		      <input type="text" class="form-control" name="mnum" id="mnum" value="<?php echo $row['mobile_number'];?>" onblur="validateMobileNumber()" maxlength="10">
		    </div>

		    <div class="col-sm-5">
			   <div id="mobileNumberError" class="alert alert-danger" role="alert"></div>
			</div>
		  </div>

		  <div class="form-group">
		    <label for="email" class="col-sm-2 control-label">email</label>
		    <div class="col-sm-4">
		      <input type="email" class="form-control" name="email" id="email" maxlength="25" onblur="validateEmail()" value="<?php echo $row['email'];?>">
		    </div>

		    <div class="col-sm-5">
			   <div id="emailError" class="alert alert-danger" role="alert"></div>
			</div>
		  </div>


		  <div class="form-group">
		    <label for="psw" class="col-sm-2 control-label">Password</label>
		    <div class="col-sm-4">
		      <input type="password" class="form-control" name="psw" maxlength="8" onblur="validatePassword()" value="<?php echo $row['password'];?>">
		    </div>

		    <div class="col-sm-5">
			   <div id="passwordError" class="alert alert-danger" role="alert"></div>
			</div>
		  </div>

		  <div class="form-group">
		    <label for="cpsw" class="col-sm-2 control-label">Confirm Password</label>
		    <div class="col-sm-4">
		      <input type="password" class="form-control" name="cpsw" maxlength="8" onblur="validateConfirmPassword()" value="<?php echo $row['password'];?>">
		    </div>

		    <div class="col-sm-5">
			   <div id="confirmPasswordError" class="alert alert-danger" role="alert"></div>
			</div>
		  </div>

		  <div class="form-group">
		    <label for="cmp" class="col-sm-2 control-label">Company</label>
		    <div class="col-sm-4">
		      <input type="text" class="form-control" name="company" maxlength="50" onblur="validateCompany()" value="<?php echo $row['company'];?>"> 
		    </div>

		    <div class="col-sm-5">
			   <div id="companyError" class="alert alert-danger" role="alert"></div>
			</div>
		  </div>

		  <div class="form-group">
		    <label for="aboutme" class="col-sm-2 control-label">About Me</label>
		    <div class="col-sm-4">
		      <textarea name="aboutme" id="aboutme" class="form-control" rows="5" cols="5" maxlength="1000" onblur="validateAboutMe()"><?php echo $row['aboutme'];?></textarea>
		    </div>

		    <div class="col-sm-5">
			   <div id="aboutMeError" class="alert alert-danger" role="alert"></div>
			</div>
		  </div>

		  <div class="form-group">
		    <label for="address" class="col-sm-2 control-label">Address</label>
		    <div class="col-sm-4">
		      <textarea name="address" class="form-control" rows="5" cols="5" maxlength="1000" onblur="validateAddress()"><?php echo $row['address'];?></textarea>
		    </div>

		    <div class="col-sm-5">
			   <div id="addressError" class="alert alert-danger" role="alert"></div>
			</div>
		  </div>

		  <div class="form-group">
		    <label for="country" class="col-sm-2 control-label">Country</label>
		    <div class="col-sm-4">
		      <select class="form-control" name="country" onchange="changeState()">
		      	  <option value="0">-- Select Country --</option>
				  <option value="1" <?php if($row['country'] == "1"){ echo "selected"; } ?>>India</option>
				  <option value="2" <?php if($row['country'] == "2"){ echo "selected"; } ?>>Australia</option>
				  <option value="3" <?php if($row['country'] == "3"){ echo "selected"; } ?>>Japan</option>
				</select>
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="state" class="col-sm-2 control-label">State</label>
		    <div class="col-sm-4" id="textboxState">
		      <select class="form-control" name="state" id="state" onblur="validateForm()">
		      	  <option value="0">-- Select State --</option>
				  <option value="1" <?php if($row['state'] == "1"){ echo "selected"; } ?>>Gujrat</option>
				  <option value="2" <?php if($row['state'] == "2"){ echo "selected"; } ?>>Rajasthan</option>
				  <option value="3" <?php if($row['state'] == "3"){ echo "selected"; } ?>>Goa</option>
				</select>
		    </div>
		  </div>

		  <div class="col-sm-4 col-sm-offset-2">
		  	<input type="text" class="form-control" name="state" id="stateTextbox1" onblur="validateForm()" value="<?php if($row['state'] == '1') { echo 'Gujrat'; } else if($row['state'] == '2') { echo 'Rajasthan'; } else if($row['state'] == '3') { echo 'Goa'; }?>">
		  </div>

		  <!--  Website URL and User Name Start-->
		  <label class="control-label col-sm-offset-2">Note : Required Validation is not apply on Website URL and User Name, Save button will be enable and disable on state change event.</label>
		  <div class="form-group">
		    <label for="websiteUrl" class="col-sm-2 control-label">Website URL</label>
		    <div class="col-sm-4">
		      <input type="text" class="form-control" name="wurl" id="wurl" onblur="checkUrl()">
		    </div>

		    <div class="col-sm-5">
			   <div id="urlError" class="alert alert-danger" role="alert"></div>
			</div>		    
		  </div>

		  <div class="form-group">
		    <label for="userName" class="col-sm-2 control-label">User Name</label>
		    <div class="col-sm-4">
		      <input type="text" class="form-control" name="uname" id="uname" onblur="checkUserName()">
		    </div>

		    <div class="col-sm-5">
			   <div id="userNameError" class="alert alert-danger" role="alert"></div>
			</div>		    
		  </div>
		  <!--  Website URL and User Name End-->

		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <input type="submit" class="btn btn-success" id="save" value="Save" name="<?php if(isset($id)) { echo "update"; }else if(!isset($id)) { echo "save"; }?>">
		      <input type="submit" class="btn btn-info" id="reset" name="reset" value="Reset" onclick="clearAll()">
		    </div>
		  </div>
	</form>

	<!-- Add More Section -->
	<p>.................................................................</p>

	<div class="row">
  			<label for="clrName" class="col-sm-2">Enter Color Name / Code</label>
  			<div class="col-sm-2">
  				<input type="text" class="form-control" name="clr" id="clr" autofocus/>
  			</div>
  		</div>

  		<form method="post" action="">
	  		<!-- Add More Start -->
	  		<div class="row" style="margin-top:40px;">
	  			<label for="subName" class="control-label col-sm-3">Enter Subject Name</label>
	  		</div>

	  		<div class="row field_wrapper" style="margin-top:1px;">
		        <div class="col-sm-3">
		        	<input type="text" name="field_name" value="" class="form-control" />
		        </div>
		        <button type="button" class="btn btn-default add_button">
				  <span class="glyphicon glyphicon-plus"></span>
				</button>
			</div>
	  		<!-- Add More End -->

	  		<!-- Submit Button -->
	  		<div class="row" style="margin-left:1px; margin-top:10px;">
	  			<input type="button" class="btn btn-warning" value="Submit" name="getValue" id="getValue">
	  			<input type="button" class="btn btn-warning" value="Click Me!" id="clickme">
				<input type="button" class="btn btn-warning" value="Reset Count Value to '0'" id="resetCountValue">
	  		</div>
	  		<!-- Submit Button -->
  		</form>
 
 		<!-- Number of times count start -->
 		<div class="row" style="margin-top:10px;">
	 		<div class="col-sm-1">
				<div id="countResults" class="alert alert-warning">0</div>
			</div>		
		</div>
 		<!-- Number of times count end -->

 		<!-- Display Inputed Value Start -->
 		<div class="row" style="margin-left:1px; margin-top:10px;">
			<div id="results" class="alert alert-success"></div>
		</div>
 		<!-- Display Inputed Value End -->

  </section>
</div>

<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="js/jquery.cookie.js"></script>
<script src="js/validation.js"></script>

<script type="text/javascript">
	$(document).ready(function()
	{
		setTimeout(function() { $("#msg_error").hide(); }, 2000);
		document.getElementById("save").disabled = true;
		document.getElementById("state").style.visibility = "hidden";

		// Hide the error message on form load event 
		document.getElementById("firstNameError").style.visibility = "hidden";
		document.getElementById("lastNameError").style.visibility = "hidden";
		document.getElementById("firstNameError").style.visibility = "hidden";
		document.getElementById("mobileNumberError").style.visibility = "hidden";
		document.getElementById("emailError").style.visibility = "hidden";
		document.getElementById("passwordError").style.visibility = "hidden";
		document.getElementById("confirmPasswordError").style.visibility = "hidden";
		document.getElementById("companyError").style.visibility = "hidden";
		document.getElementById("aboutMeError").style.visibility = "hidden";
		document.getElementById("addressError").style.visibility = "hidden";
		document.getElementById("userNameError").style.visibility = "hidden";
		document.getElementById("urlError").style.visibility = "hidden";

    	document.getElementById("stateTextbox1").style.visibility = "hidden";

    	 $('div#countResults').text($.cookie('cval'));
	});
</script>

<!-- Add More and Color Change jQuery Start -->
<script>
	$('document').ready(function(){

		// Change Background Color Start
		$('#clr').blur(function(){
			var value=$(this).val();
			$('#changeBackColor').css({"background-color":value});
		});
		// Change Background Color End

		// Add More Start
		var maxField = 10;
	    var addButton = $('.add_button'); 
	    var wrapper = $('.field_wrapper'); 
	    var fieldHTML = '<div class="row"><div class="col-sm-3"><input type="text" class="form-control" name="field_name" value=""/><a href="javascript:void(0);" class="remove_button btn btn-primary glyphicon glyphicon-minus" title="Remove field"></a></div></div>'; 
	    var x = 1;

	    $(addButton).click(function(){ 
	        if(x < maxField){ 
	            x++; 
	            $(wrapper).append(fieldHTML); 
	        }
	    });

	    $(wrapper).on('click', '.remove_button', function(e){ 
	        e.preventDefault();
	        $(this).parent('div').remove(); 
	        x--; 
	    });
		// Add More End

		// Get Value after click on submit button and displayed it in div element start
		$('#getValue').click(function(){
		    var x = $("form").serializeArray();
	        $.each(x, function(i, field){
	            $("#results").append("{" + field.name + ":" + field.value + "}");
	    	});
		});
		// Get Value after click on submit button and displayed it in div element end

		// Count total number of click start
		$("#clickme").click(function(){
			$('#countResults').html(function(i, val) { return ans=val*1+1 });
			$.cookie('cval', ans);
		})
		// Count total number of click end

		// Reset Count Value to 0 start
		$('#resetCountValue').click(function(){
			$('#countResults').html(function(i, val) { return ans=0 });
			$.removeCookie('cval');
		});
		// Reset Count Value to 0 end
	});
</script>
<!-- Add More and Color Change jQuery End -->

<?php include('footer.php'); ?>