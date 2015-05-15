<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
</head>
<body>
<?php
if($_SESSION["valid"] != 1){
header("Location: index.php");
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
if($_POST["name"] == "" or $_POST["netid"] == "" or $_POST["email"] == ""){
	echo "Please input name";
}
else{
$dbname="db123";$servername = "sn123"; $username = "un123"; $password = "pw123";
        $con = mysqli_connect($servername, $username, $password, $dbname);
        if(!$con){
        die("MYSQL Connection Failed:" . $con->connect_error);
        }
	$name = $_POST["name"];$netid=$_POST["netid"];$email=$_POST["email"];
        $sql = "INSERT INTO students(name, netid, email) VALUES('$name', '$netid', '$email');";
        if($con->query($sql) === TRUE){
	echo $name . " Added successfully!";
	}
	else{
	echo "error" . $con->error;
	}
	
}
}
?>
<center><h1> Add Student </h1>
<form method="post">
<table>
<tr><td>Student Name:</td><td>
<input type="text" name="name"></td></tr>
<tr><td>Student ID:</td><td>
<input type="text" name="netid"></td></tr>
<tr><td>Student Email:</td><td>
<input type="text" name="email"></td></tr></table>
<input type="submit" value="Add Student">
</form>
<br>
<a href="home.php"><button>Go Home</button></a>
</center>
</body>
</html>
