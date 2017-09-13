<?php

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


	function NewUser()
{
    $fullname = $_POST['user'];
    $password =  $_POST['pass'];
    $email = $_POST['email'];
    $age = $_POST['age'];
   
    $query = "INSERT INTO log (username,password,email,age) VALUES ('$fullname', '$password', '$email','$age')";



	

	$data = mysql_query ($query)or die("damn");
	if($data)
	{
	echo "YOUR REGISTRATION IS COMPLETED...";
	}



}


function SignUp()
{
if(!empty($_POST['user']))   //checking the 'user' name which is from Sign-Up.html, is it empty or have some text
{
    $query = mysql_query("SELECT * FROM log WHERE username = '$_POST[user]' AND password = '$_POST[pass]'") or die(mysql_error());

    if(!$row = mysql_fetch_array($query) or die(mysql_error()))
    {
        newuser();
    }
    else
    {
        echo "SORRY...YOU ARE ALREADY REGISTERED USER...";
        
    }
}
}
if(isset($_POST['submit']))
{
    SignUp();
}

$data = mysql_query ("SELECT * FROM log WHERE username = '$_POST[user]' ")or die("damn");
	$count=mysql_num_rows($data);

	if($count==1)
	{
	include("proj.html");
	}

?>





