<?php
session_start();
define('DB_HOST', 'localhost');

define('DB_NAME', 'wp');
define('DB_USER','root');
define('DB_PASSWORD','');

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL " );

$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " );


if (mysqli_connect_errno($con))

 	{
	  echo "Failed to connect to MySQL: " ;
	}

else
	{
		echo "Successfully connected to your database…";
	}	


	
    $fullname = $_POST['user'];
    $password =  $_POST['pass'];
	$_SESSION["username"]=$fullname;
	
    

	$dbname=$fullname.$password;
	$data = mysql_query ("SELECT * FROM log WHERE username = '$_POST[user]'  AND password = '$_POST[pass]'")or die("damn");
	$count=mysql_num_rows($data);

	if($count==1)
	{
		$_SESSION["databasename"]=$dbname;
		//echo $_SESSION["databasename"];
	include("proj.html");
	}

else {
	echo "wrong details";
}







?>





