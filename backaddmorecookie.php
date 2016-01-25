<?php include('header.php'); ?>
<?php include('menu.php'); ?>

<?php
	if(isset($_POST['getValue'])){
		$input=$_POST['field_name'];
	}
?>
<div class="content-wrapper" id="changeBackColor">
  <section class="content-header">
    <h1>Change Color / Add More / Cookie</h1>
  </section>

  <section class="content">
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
		        	<input type="text" name="field_name[]" value="" class="form-control" />
		        </div>
		        <button type="button" class="btn btn-default add_button">
				  <span class="glyphicon glyphicon-plus"></span>
				</button>
			</div>
	  		<!-- Add More End -->

	  		<!-- Submit Button -->
	  		<div class="row" style="margin-left:1px; margin-top:10px;">
	  			<input type="submit" class="btn btn-warning" value="Submit" name="getValue">
	  		</div>
	  		<!-- Submit Button -->
  		</form>
 
 		<!-- Display Inputed Values Start -->
 		<div class="row" style="margin-top:20px">
 			<div class="col-sm-4">
 				<div class="alert alert-success">
 					<?php if(isset($input)) print_r($input); ?>
 				</div>
 			</div>
 		</div>
 		<!-- Display Inputed Values End -->
  </section>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript">
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
	    var fieldHTML = '<div class="row"><div class="col-sm-3"><input type="text" class="form-control" name="field_name[]" value=""/><a href="javascript:void(0);" class="remove_button btn btn-primary glyphicon glyphicon-minus" title="Remove field"></a></div></div>'; 
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

	});
</script>
<?php include('footer.php'); ?>
