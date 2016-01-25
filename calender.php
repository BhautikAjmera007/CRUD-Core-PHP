<?php include('header.php'); ?>
<?php include('menu.php'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>Calculator</h1>
  </section>

  <section class="content">
  	<form name="Calc">
	<div class="row">
		<div class="col-sm-5 col-sm-offset-2" >

			<!-- Calculation Textbox -->
			<div class="row" style="margin-bottom:20px;">
				<div class="col-sm-12">
				   <input type="text" class="form-control" id="Input"  NAME="Input" disabled>
				</div>
			</div>

			<!-- + - * / row start -->
			<div class="row" style="margin-bottom:20px;">
				<div class="col-sm-3">
					<input type="button" class="btn btn-default col-sm-12" value="+" name="add" id="add" OnClick="Calc.Input.value += ' + '">
				</div>
				<div class="col-sm-3">
					<input type="button" class="btn btn-default col-sm-12" value="-" name="sbu" id="sub" OnClick="Calc.Input.value += ' - '">
				</div>
				<div class="col-sm-3">
					<input type="button" class="btn btn-default col-sm-12" value="*" name="mul" id="mul" OnClick="Calc.Input.value += ' * '">
				</div>
				<div class="col-sm-3">
					<input type="button" class="btn btn-default col-sm-12" value="/" name="division" id="division" OnClick="Calc.Input.value += ' / '">
				</div>
			</div>
			<!-- + - * / row end -->

			<!--  % row start-->
			<div class="row" style="margin-bottom:20px;">
				<div class="col-sm-3">
					<input type="button" class="btn btn-default col-sm-12" value="%" name="mod" id="mod" OnClick="Calc.Input.value += ' % '">
				</div>
			</div>
			<!-- % row end -->

			<!-- 1 2 3 row start -->
			<div class="row" style="margin-bottom:20px;">
				<div class="col-sm-4">
					<input type="button" class="btn btn-default col-sm-12" value="1" name="one" id="one" OnClick="Calc.Input.value += '1'">
				</div>
				<div class="col-sm-4">
					<input type="button" class="btn btn-default col-sm-12" value="2" name="two" id="two" OnClick="Calc.Input.value += '2'">
				</div>
				<div class="col-sm-4">
					<input type="button" class="btn btn-default col-sm-12" value="3" name="three" id="three" OnClick="Calc.Input.value += '3'">
				</div>
			</div>
			<!-- 1 2 3 row end -->

			<!-- 4 5 6 row start -->
			<div class="row" style="margin-bottom:20px;">
				<div class="col-sm-4">
					<input type="button" class="btn btn-default col-sm-12" value="4" name="four" id="four" OnClick="Calc.Input.value += '4'">
				</div>
				<div class="col-sm-4">
					<input type="button" class="btn btn-default col-sm-12" value="5" name="five" id="five" OnClick="Calc.Input.value += '5'">
				</div>
				<div class="col-sm-4">
					<input type="button" class="btn btn-default col-sm-12" value="6" name="six" id="six" OnClick="Calc.Input.value += '6'">
				</div>
			</div>
			<!-- 4 5 6 row end -->

			<!-- 7 8 9 row start -->
			<div class="row" style="margin-bottom:20px;">
				<div class="col-sm-4">
					<input type="button" class="btn btn-default col-sm-12" value="7" name="seven" id="seven" OnClick="Calc.Input.value += '7'">
				</div>
				<div class="col-sm-4">
					<input type="button" class="btn btn-default col-sm-12" value="8" name="eight" id="eight" OnClick="Calc.Input.value += '8'">
				</div>
				<div class="col-sm-4">
					<input type="button" class="btn btn-default col-sm-12" value="9" name="nine" id="nine" OnClick="Calc.Input.value += '9'">
				</div>
			</div>
			<!-- 7 8 9 row end -->

			<!-- 0 = C row start -->
			<div class="row">
				<div class="col-sm-4">
					<input type="button" class="btn btn-default col-sm-12" value="0" name="zero" id="zero" OnClick="Calc.Input.value += '0'">
				</div>
				<div class="col-sm-4">
					<input type="button" class="btn btn-default col-sm-12" value="=" name="ans" id="ans" OnClick="Calc.Input.value = eval(Calc.Input.value)">
				</div>
				<div class="col-sm-4">
					<input type="button" class="btn btn-default col-sm-12" value="C" name="clear" id="clear"  OnClick="Calc.Input.value = ''">
				</div>
			</div>
			<!-- 0 = C row end -->

		</div>
	</div>  
	</form>
  </section>
</div>


<?php include('footer.php'); ?>
