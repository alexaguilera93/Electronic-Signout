<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<title> Remove an Item </title>
</head>
<body>
<center><h1>Select an item to remove</h1><br>
<form method="post">
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
        $item = $_POST["item"];
        if($item == "none"){
                echo "Please select an Item";
        }
        else{	
		$dbname="db123";$servername = "sn123"; $username = "un123"; $password = "pw123";
$con = mysqli_connect($servername, $username, $password, $dbname);
if(!$con){
die("MYSQL Connection Failed:" . $con->connect_error);
}
		$sql1 = "DELETE FROM items WHERE name = '$item';";
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

<?php
if($_SESSION["valid"] != 1){
header("Location: index.php");
}
$dbname="db123";$servername = "sn123"; $username = "un123"; $password = "pw123";
$con = mysqli_connect($servername, $username, $password, $dbname);
if(!$con){
die("MYSQL Connection Failed:" . $con->connect_error);
}
$sql = "SELECT name FROM items ORDER BY name";
$results = $con->query($sql);
echo "<select name='item'><option value='none'>Please Select Item</option>";
while($row = mysqli_fetch_array($results)){
echo "<option value='". $row["name"] . "'>" . $row["name"] . "</option>";
}
echo "</select>";
?>
<br>
<br>
<input type="submit" value="Delete Item">
<br>
<br>
</form>
<a href="home.php"><button>Go Home</button></a>
</center>
</body>
</html>
