<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<title> Sign out </title>
</head>
<body>
<?php if($_SESSION["valid"] != 1){ header("Location: index.php");}?>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
$student = $_POST["netid"];$item = $_POST["item"];
if($student == "none" or $item == "none"){
echo "Missing field Student or Item";
}else{
$dbname="db123";$servername = "sn123"; $username = "un123"; $password = "pw123";
$con = mysqli_connect($servername, $username, $password, $dbname);
if(!$con){
die("MYSQL Connection Failed:" . $con->connect_error);
}
$today = getdate();
$year = $today["year"];
$month = $today["mon"];
$day = $today["mday"];
$date = $year . "-" . $month . "-" . $day;
$sql1 = "UPDATE items SET checkedout = 1 WHERE name = '$item';";
$sql2 = "INSERT INTO signouts(netid, name, date) VALUES ('$student', '$item', '$date');";
if($con->query($sql1) === TRUE){echo "1 good";}else{echo "1 bad";}
if($con->query($sql2) === TRUE){echo "2 good";}else{echo "2 bad";}
}
}
?>
<center><h1>Select Student and Item</h1>
<form method="post">
<table border="1"><tr><td><center><b>Student</b></center></td><td><b><center>Item</b></center></td></tr></b><tr><td>
<?php
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
</td><td>
<?php
$dbname="db123";$servername = "sn123"; $username = "un123"; $password = "pw123";
$con = mysqli_connect($servername, $username, $password, $dbname);
if(!$con){
die("MYSQL Connection Failed:" . $con->connect_error);
}
$sql = "SELECT name FROM items WHERE checkedout = 0 ORDER BY name";
$results = $con->query($sql);
echo "<select name='item'><option value='none'>Please Select Item</option>";
while($row = mysqli_fetch_array($results)){
echo "<option value='". $row["name"] . "'>" . $row["name"] . "</option>";
}
echo "</select>";
?>
</td></tr></table>
<br>
<input type="submit" value="Sign Out">
<br><br>
</center>
</form>
<center><a href="home.php"><button>Go Home</button></a></center>
</body>
</html>
