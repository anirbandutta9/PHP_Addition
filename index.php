<?php
$num1 = $num2 = $error1 = $error2 = "" ;
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}	
$error = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (empty($_POST["num1"])) {
	$error1 = "num1 is empty";
	$error = true;
}
else {
	$num1 = test_input($_POST["num1"]);
	if (! preg_match('/^-?\d*\.?\d+$/',$_POST['num1'])) {
		$error1 = "must be a NUMBER" ;
		$error = true;
	} 
}
if (empty($_POST["num2"])) {
	$error2 = "num2 is empty";
	$error = true;
}
else {
	$num2 = test_input($_POST["num2"]) ;
	if (! preg_match('/^-?\d*\.?\d+$/',$_POST['num2'])) {
		$error2 = "must be a NUMBER" ;
		$error = true;
	}
}

$Add = $num1 + $num2 ; 
if ($error === false) {
echo $num1 . " + " . $num2 . " = " . " " . $Add ;  
} 
}
?>




<!DOCTYPE HTML>
<html>
<head>
<title> Addition </title>
</head>
<body>
<h2> Add two numbers </h2>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> ">  
Num 1 : <input type="text" name="num1" value="<?php echo $num1; ?>" >  *  <?php echo $error1; ?> <br><br>
Num 2 : <input type="text" name="num2" value="<?php echo $num2; ?>" >  *  <?php echo $error2; ?> <br><br>
<input id='submit-button' type="submit" name="submit" value="Add" >
</form>
</body>
</html>