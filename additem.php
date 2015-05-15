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
if($_POST["name"] == ""){
	echo "Please input name";
}
else{
$dbname="db123";$servername = "sn123"; $username = "un123"; $password = "pw123";
        $con = mysqli_connect($servername, $username, $password, $dbname);
        if(!$con){
        die("MYSQL Connection Failed:" . $con->connect_error);
        }
	$name = $_POST["name"];
        $sql = "INSERT INTO items(name) VALUES('$name');";
        if($con->query($sql) === TRUE){
	echo $name . " Added successfully!";
	}
	else{
	echo "error" . $con->error;
	}
	
}
}
?>
<center><h1> Add Item </h1>
<form method="post">
<input type="text" name="name"><br>
<input type="submit" value="Add Item">
</form>
<br>
<a href="home.php"><button>Go Home</button></a>
</center>
</body>
</html>
