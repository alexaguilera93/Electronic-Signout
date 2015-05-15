<?php
session_start();
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="utf-8">
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$husername = $_POST["username"];
	$hpassword = $_POST["password"];
$dbname="db123";$servername = "sn123"; $username = "un123"; $password = "pw123";
        $con = mysqli_connect($servername, $username, $password, $dbname);
        if(!$con){
        die("MYSQL Connection Failed:" . $con->connect_error);
        }

	$sql = "SELECT username, password FROM employees WHERE username = '$husername';";
	//echo $sql;
	$results = $con->query($sql);
	$row = mysqli_fetch_array($results);
	if(mysqli_num_rows($results) == 0){
	echo "incorrect username";
	}
	else if($row['password'] == $hpassword){
		$_SESSION["employee"] = $row['username'];
		$_SESSION["valid"] = 1;
		header('Location: home.php');
		/* 
		echo $_SESSION["employee"];
		echo $_SESSION["valid"];
		*/
	}
	else{
		echo"incorrect password";
	}
}
?>
<center>
<h1> HACKERSPACE SIGN OUT </h1>
<?php
//echo $_SESSION['valid'];
?>
<form method="post">
<table>
<tr><td>Username:</td>
<td><input type="text" name="username"></td></tr>
<tr><td>
Password:</td><td>
<input type="password" name="password"></td></tr>
</table>
<input type="submit" value="Login">
</form>
</center>
</body>
</html>
