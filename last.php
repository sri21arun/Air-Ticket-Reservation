<html>
<head>
<style type="text/css">
body{
background-image: url("this.jpg");
}
</style>
</head>
<body >
<center>
<br>
<form action = "last.php" method="post" align="right">
<input type = "submit" name="submit" value="logout" style="width: 70px;height:35px;"/>
</form>
</center>
</body>
</html>
<?php

session_start();

$dbname = $_SESSION["databasename"];
$fullname=$_SESSION["username"];
$dep_time=$_SESSION["dep_time"];
$depart=$_SESSION["depart"];
$sum=$_SESSION["sum"];
//$r1=$_SESSION["r1"];
$from=$_SESSION["fromtemp"];
$to=$_SESSION["totemp"];
$temp=$_SESSION["temp"];
$temp1=$_SESSION["temp1"];
$seats=$_SESSION["seats"];
$flag1=1;
$flag2=1;
$flag3=1;
//echo $temp1;
$con = mysqli_connect("localhost","root","","wp");
if(!$con)
			{
				die("Error connecting:".mysqli_connect_error($con));
			}

if(isset($_POST["submit"]))
{
	session_unset();
	session_destroy();
	?>
		<html><head><script type="text/javascript">location.href="alogin.html";alert("Logged out successfully");</script></head></html>
		<?php
}
else
{
	$sql4 = "insert into sub(name,flight_no,dep_city,dep_date,total_cost) values('$fullname','$temp','$from','$depart',$sum)";
	$r4=mysqli_query($con,$sql4);
	
	if($r4)
	{
		$flag1=0;
	}
	else
	{
		$flag1=1;
	}
	
	$sql5 = "select * from df where flight_no = '$temp' and dep_date = '$depart'";
	//echo $sql5;
	$r5 = mysqli_query($con,$sql5);
	
	if(mysqli_num_rows($r5))
	{
		$x=$temp1+$seats;
		$sql6 = "update df set seats_booked=$x where flight_no='$temp' and dep_date='$depart'";
		//echo $sql6;
		$r6 = mysqli_query($con,$sql6);
		//echo $r6;
		if($r6)
		{
			$flag2=0;
		}
		else{
			$flag2=1;
		}
	}
	else{
		$sql7 = "insert into df(flight_no,dep_date,seats_booked) values('$temp','$depart',$seats)";
		//echo $sql7;
		$r7 = mysqli_query($con,$sql7);
		if($r7)
		{$flag3=0;}
	   else{
		   $flag3=1;
	   }
	}
	if($flag1==0 && ($flag2==0 || $flag3==0))
	{
		echo "<br><br><h1><center>You have Successfully booked your tickets<br>";
		echo "BON VOYAGE";
	}
	else{
		echo "Your Booking was Unsuccessful";
	}	
}