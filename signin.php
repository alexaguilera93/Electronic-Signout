<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<head><title>Sign In</title></head>
<body>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$name = $_POST["signin"];
	if($name == "none"){echo "please pick item to sign in";}
	else{
$dbname="db123";$servername = "sn123"; $username = "un123"; $password = "pw123";
		$con = mysqli_connect($servername, $username, $password, $dbname);
		if(!$con){
			die("MYSQL Connection Failed:" . $con->connect_error);
		}
	
		$sql1="DELETE FROM signouts WHERE name = '$name';";
		$sql2="UPDATE items SET checkedout = 0 WHERE name = '$name';";		
		if($con->query($sql1) === TRUE){echo "1 good";}else{echo "1 bad";}
		if($con->query($sql2) === TRUE){echo "2 good";}else{echo "2 bad";}

	}
}

?>
<?php if($_SESSION["valid"] != 1){header("Location: index.php");}?>
<center><h1> Please select what you want to Sign In</h1>
<br><form method="post">
<?php
$dbname="db123";$servername = "sn123"; $username = "un123"; $password = "pw123";
$con = mysqli_connect($servername, $username, $password, $dbname);
if(!$con){
die("MYSQL Connection Failed:" . $con->connect_error);
}
$sql = "SELECT name, netid, date FROM signouts ORDER BY name;";
$results = $con->query($sql);
echo "<select name='signin'><option value='none'>Please Select Item</option>";
while($row=mysqli_fetch_array($results)){
echo "<option value='" . $row["name"] . "'>" . $row["name"] . " Out With " . $row["netid"] . "</option>";
}
echo"</select>";
?>
<br><br>
<input type="submit" value="Sign in">
</form>
<br><br>
<a href="home.php"><button>Go Home</button></a>
</center>
</body>
</html>
