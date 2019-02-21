<!DOCTYPE html>
<html>
<head>
	<title>Temperature Converter</title>
	<!-- add boostrap css link -->
	<!-- add a style.css link -->
	<!-- add link to jquery -->
	<!-- add link to bootstrap js -->
</head>
<body>
	
<?php 
// function to calculate converted temperature
function convertTemp($temp,$unit1,$unit2){
	switch ($unit1) {
		case 'celsius':

			if ($unit1 == "celsius" and $unit2 == "farenheit"){
				$F = $_POST['originaltemp'] * 9/5 + 32;
				return $F;
			} // end if

			if ($unit1 == "celsius" and $unit2 == "kelvin"){
				$K = $_POST['originaltemp'] + 273.15;
				return $K;
			} // end if

		case 'farenheit':
			if ($unit1 == "farenheit" and $unit2 == "celsius"){
				$C = ($_POST['originaltemp'] - 32 ) * 5/9;
				return $C;
			} // end if

			if ($unit1 == "farenheit" and $unit2 == "kelvin"){
				$K = ($_POST['originaltemp'] + 459.67) * 5/9;
				return $K;
			} // end if	

		case 'kelvin':
			if ($unit1 == "kelvin" and $unit2 == "celsius"){
				$C = $_POST['originaltemp'] - 273.15;
				return $C;
			} // end if

			if ($unit1 == "kelvin" and $unit2 == "farenheit"){
				$F = $_POST['originaltemp'] * 9/5 - 459.67;
				return $F;
			} // end if

		default:
			if ($unit1 == $unit2){
				return $temp;
			}
	} // end switch

} // end function

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
	<h1>Temperature Converter</h1>
	<h4>CTEC 127 - PHP with SQL 1</h4>
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<div class="section">
			<label for="temp">Temperature</label>
			<input type="text" value="<?php if (isset($_POST['originaltemp'])) echo $_POST['originaltemp'];?>" name="originaltemp" size="7" maxlength="7" id="temp">

			<select name="originalunit">
				<option value="--Select--"<?php if($originalUnit == "--Select--") echo ' selected="selected"';?>>--Select--</option>
				<option value="celsius"<?php if($originalUnit == "celsius") echo ' selected="selected"';?>>Celsius</option>
				<option value="farenheit"<?php if($originalUnit == "farenheit") echo ' selected="selected"';?>>Farenheit</option>
				<option value="kelvin"<?php if($originalUnit == "kelvin") echo ' selected="selected"';?>>Kelvin</option>
			</select>
		</div>
		<div class="section">
			<label for="convertedtemp">Converted Temperature</label>
			<input type="text" value="<?php if (isset($_POST['originaltemp'])) echo round($convertedTemp, 1);?>" 
			name="convertedtemp" size="7" maxlength="7" id="convertedtemp">

			<select name="conversionunit">
				<option value="--Select--"<?php if($conversionUnit == "--Select--") echo ' selected="selected"';?>>--Select--</option>
				<option value="celsius"<?php if($conversionUnit == "celsius") echo ' selected="selected"';?>>Celsius</option>
				<option value="farenheit"<?php if($conversionUnit == "farenheit") echo ' selected="selected"';?>>Farenheit</option>
				<option value="kelvin"<?php if($conversionUnit == "kelvin") echo ' selected="selected"';?>>Kelvin</option>
			</select>
		</div>
		<input type="submit" value="Convert"/>   
	</form>
</div><!-- end wrapper div-->
</body>
</html>