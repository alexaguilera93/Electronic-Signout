<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<head><title>Check Inventory</title></head>
<body>
<?php if($_SESSION["valid"] != 1){header("Location: index.php");}?>
<center><h1>Signed out Items</h1>
<table border="1"><tr><td><b><center>Item</center></b></td><td><b><center>With</center></b></td><td><b><center>NetID</center></b></td><td><b><center>Email</center></b></td><td><b><center>Sign Out Date</center></b></td></tr>
</center>
<?php
$dbname="db123";$servername = "sn123"; $username = "un123"; $password = "pw123";
$con = mysqli_connect($servername, $username, $password, $dbname);
                if(!$con){
                        die("MYSQL Connection Failed:" . $con->connect_error);
                }
$sql = "SELECT name, netid, date FROM signouts ORDER BY name;";
	$results = $con->query($sql);
	while($row = mysqli_fetch_array($results)){
		$netid = $row["netid"];
		$isql = "SELECT name, email FROM students WHERE netid = '$netid';";
		$results2 = $con->query($isql);
		$sinfo = mysqli_fetch_array($results2);
		$sname = $sinfo["name"];
		$item = $row["name"];
		$email = $sinfo["email"];
		$date = $row["date"];
		echo "<tr><td>" . $item . "</td><td>" . $sname . "</td><td>" . $netid . "</td><td>" . $email . "</td><td>" . $date . "</td></tr>"; 
	}
	
?>
</table>
<center><h1>Items still in stock (allegedly) </h1>
<table border = "1"><tr><td><b><center> Item Name </center></b></td></tr>
<?php
$dbname="db123";$servername = "sn123"; $username = "un123"; $password = "pw123";
$con = mysqli_connect($servername, $username, $password, $dbname);
                if(!$con){
                        die("MYSQL Connection Failed:" . $con->connect_error);
                }
		$sql5 = "SELECT name FROM items WHERE checkedout = 0 ORDER BY name;";
		$results = $con->query($sql5);
		while($row = mysqli_fetch_array($results)){
			$name = $row["name"];
			echo "<tr><td><center>" . $name . "</center></td></tr>";
		}
?>
</table>
<br><br>
<a href="home.php"><button>Go Home</button></a>
</body>
</html>
