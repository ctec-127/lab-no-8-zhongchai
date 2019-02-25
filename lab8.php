<?php 
$pageTitle = 'Temperature Converter';

require 'inc/header.inc.php'; 
require 'inc/functions.inc.php'; ?>

<?php 

#CHECK TO SEE IF FORM WAS SUBMITTED
if($_SERVER['REQUEST_METHOD'] == "POST"){
	$originalTemperature = $_POST['originaltemp'];
	$originalUnit= $_POST['originalunit'];
	$conversionUnit = $_POST['conversionunit'];
	$convertedTemp = convertTemp($originalTemperature,$originalUnit,$conversionUnit);
} // end if

if (isset($_POST['originalunit'])){
	$originalUnit = $_POST['originalunit'];
} else {
	// looks like the form wasn't being posted
	$originalUnit = "";
} // end if

if (isset($_POST['conversionunit'])){
	$conversionUnit = $_POST['conversionunit'];
} else {
  	// looks like the form wasn't being posted
	$conversionUnit = "";
} // end if
?>

<div id="wrapper">
	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<h1 class="display-4">Temperature Converter</h1>
			<p class="lead">CTEC 127 - PHP with SQL 1</p>
		</div>
	</div>
	<div class="border p-4 mx-auto w-75">
		<div class="mx-auto w-75">
			<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<div class="row pl-4">
					<h4><label for="temp">Temperature</label></h4>
				</div>
				<div class="row mb-4">
					<div class="col-sm-12 col-md-6 col-lg-4">
						<input type="text" class="form-control" value="<?php if (isset($_POST['originaltemp'])) echo $_POST['originaltemp'];?>" name="originaltemp" size="7" maxlength="7" id="temp" placeholder="Enter temp">
					</div>
					<div class="col-sm-12 col-md-6 col-lg-8">
						<select name="originalunit" class="custom-select mb-3">
							<option value="--Select--"<?php if($originalUnit == "--Select--") echo ' selected="selected"';?>>--Select--</option>
							<option value="celsius"<?php if($originalUnit == "celsius") echo ' selected="selected"';?>>Celsius</option>
							<option value="farenheit"<?php if($originalUnit == "farenheit") echo ' selected="selected"';?>>Farenheit</option>
							<option value="kelvin"<?php if($originalUnit == "kelvin") echo ' selected="selected"';?>>Kelvin</option>
						</select>
					</div>
				</div>
				<div class="row pl-4">
					<h4><label for="convertedtemp">Converted Temperature</label></h4>
				</div>
				<div class="row mb-2">
					<div class="col-sm-12 col-md-6 col-lg-4">
						<input type="text" class="form-control" value="<?php if (isset($_POST['originaltemp'])) echo round($convertedTemp, 1);?>" 
						name="convertedtemp" size="7" maxlength="7" id="convertedtemp">
					</div>
					<div class="col-sm-12 col-md-6 col-lg-8">
						<select name="conversionunit" class="custom-select mb-3">
							<option value="--Select--"<?php if($conversionUnit == "--Select--") echo ' selected="selected"';?>>--Select--</option>
							<option value="celsius"<?php if($conversionUnit == "celsius") echo ' selected="selected"';?>>Celsius</option>
							<option value="farenheit"<?php if($conversionUnit == "farenheit") echo ' selected="selected"';?>>Farenheit</option>
							<option value="kelvin"<?php if($conversionUnit == "kelvin") echo ' selected="selected"';?>>Kelvin</option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-12 mx-auto text-center">
						<button class="btn-lg btn-secondary px-4" type="submit">Convert!</button>  
					</div> 
				</div>
			</form>
		</div>
	</div>
	<div class="row mx-auto w-75">
		<div class="py-4 col-sm-12 col-md-6">
			<div class="card">
				<h5 class="card-header">Conversion Formulas</h5>
				<div class="card-body">
					<h5 class="card-title">Celsius to Fahrenheit</h5>
					<p class="card-text">(C * 9/5) + 32</p>
					<h5 class="card-title">Celsius to Kelvin</h5>
					<p class="card-text">C + 273.15</p>
					<h5 class="card-title">Fahrenheit to Celsius</h5>
					<p class="card-text">(F - 32) * 5/9</p>
					<h5 class="card-title">Fahrenheit to Kelvin</h5>
					<p class="card-text">(F - 32) * 5/9 + 273.15</p>
					<h5 class="card-title">Kelvin to Celsius</h5>
					<p class="card-text">K - 273.15</p>
					<h5 class="card-title">Kelvin to Fahrenheit</h5>
					<p class="card-text">(K - 273.15) * 9/5 + 32</p>
				</div>
			</div>
		</div>
		<div class="py-4 col-sm-12 col-md-6">
			<div class="card">
				<h5 class="card-header">Temperature Fun Facts!</h5>
				<div class="card-body">
					<h5 class="card-title">What is Kelvin?</h5>
					<p class="card-text mb-4">The Kelvin temperature unit was named after William Kelvin, aka Lord Kelvin, after he wrote in a paper that a scale was needed for measuring temperatures
						that started at absolute zero. Therefore, the conversion from Celsius to Kelvin is simple; just add 273.15 degrees to Celsius to get the equivalent reading in Kelvin. 
						Kelvin is used in calculations involving thermodynamics and other sciences. </p>
					<h5 class="card-title">Who uses Fahrenheit?</h5>
					<p class="card-text">The United States, its territories, the Bahamas, Cayman Islands, and Liberia are the only remaning countries in the world that use Fahrenheit for everyday use. 
						It was previously used by all English-speaking countries until the 1970s. </p>
				</div>
			</div>
		</div>
	</div>

<?php require 'inc/footer.inc.php'; ?>