<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<title> Remove a Student </title>
</head>
<body>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
        $student = $_POST["netid"];
        if($item == "none"){
                echo "Please select an Item";
        }
        else{	
		$dbname="db123";$servername = "sn123"; $username = "un123"; $password = "pw123";
$con = mysqli_connect($servername, $username, $password, $dbname);
if(!$con){
die("MYSQL Connection Failed:" . $con->connect_error);
}
		$sql1 = "DELETE FROM students WHERE netid = '$student';";
		//echo $sql1;
		if($con->query($sql1) === TRUE){
			echo "Successfully Deleted";
		}
		else{
			echo "Error:" . $con->error;
		}
        }
}

?>
<center><h1>Select a student to remove</h1><br>
<form method="post">
<?php
if($_SESSION["valid"] != 1){
header("Location: index.php");
}
$dbname="db123";$servername = "sn123"; $username = "un123"; $password = "pw123";
$con = mysqli_connect($servername, $username, $password, $dbname);
if(!$con){
die("MYSQL Connection Failed:" . $con->connect_error);
}
$sql = "SELECT name, netid, email FROM students ORDER BY name";
$results = $con->query($sql);
echo "<select name='netid'><option value='none'>Please Select Student</option>";
while($row = mysqli_fetch_array($results)){
echo "<option value='". $row["netid"] . "'>" . $row["name"] . " - " . $row["netid"] . "</option>";
}
echo "</select>";
?>
<br>
<br>
<input type="submit" value="Delete student">
<br>
<br>
</form>
<a href="home.php"><button>Go Home</button></a>
</center>
</body>
</html>
