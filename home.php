<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<title> Hackerspace Signout</title>
</head>
<body>
<?php
if($_SESSION["valid"] == 1){
}
else{
	header('Location: index.php');
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
	session_destroy();
	header('Location: index.php');
}
?>
<center><h1>What would you like to do?</h1><br>
<a href= "additem.php"><button>Add an item</button></a><br>
<br><a href= "addstudent.php"><button>Add a Student</button></a><br>
<br><a href= "removeitem.php"><button>Remove an item</button></a><br>
<br><a href= "removestudent.php"><button>Remove a Student</button></a><br>
<br><a href= "signout.php"><button>Sign an item out</button></a><br>
<br><a href= "signin.php"><button>Sign an item in</button></a><br>
<br><a href= "checkitems.php"><button>Inventory</button></a><br>
<form method="post">
<br>
<input type="submit" value="Logout">
</form>
</center>



</body>
</html>
