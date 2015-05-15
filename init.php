
<?php
$dbname="db123";$servername="sn123";$username="un123";$password="pw123";
$sysusername="sysu123"; $syspassword="sysp123"; $sysname="klmno";
$con=mysqli_connect($servername, $username, $password);
$sql1= "CREATE DATABASE $dbname";
if($con->query($sql1) === TRUE){
echo "DATABASE CREATED\n";
}
else{
	echo "database creation failed: please double check you input correct information in script";
}

$con2=mysqli_connect($servername, $username, $password, $dbname);
$sql2= "CREATE TABLE employees(name VARCHAR(100) PRIMARY KEY, username VARCHAR(100), password VARCHAR(100));";
$sql3= "CREATE TABLE items(name VARCHAR(100) PRIMARY KEY, checkedout INT DEFAULT 0);";
$sql4= "CREATE TABLE students(name VARCHAR(100), netid VARCHAR(10) PRIMARY KEY, email VARCHAR(100));";
$sql5= "CREATE TABLE signouts(netid VARCHAR(10), name VARCHAR(100), date DATE, FOREIGN KEY(netid) REFERENCES students(netid), FOREIGN KEY(name) REFERENCES items(name));";
$sql6= "INSERT INTO employees(name, username, password) VALUES ('$sysname', '$sysusername', '$syspassword');";
if($con2->query($sql2)=== TRUE){
	echo "TABLE employees CREATED\n";
}else{
	echo "TABLE employees failed, please report this incident\n";
}
if($con2->query($sql3)=== TRUE){
	echo "TABLE items CREATED\n";
}else{
	echo "TABLE items failed, please report this incident\n";
}
if($con2->query($sql4)=== TRUE){
	echo "TABLE students CREATED\n";
}else{
	echo "TABLE students failed, please report this incident\n";
}
if($con2->query($sql5)=== TRUE){
	echo "TABLE signouts CREATED\n";
}else{
	echo "TABLE signouts failed, please report this incident\n";
}
if($con2->query($sql6)=== TRUE){
	echo "User Created\n";
}else{
	echo "User creation failed\n";
}
?>

