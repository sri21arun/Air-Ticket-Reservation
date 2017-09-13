<?php
	session_start();
?>
<html>

	<head>
		<style type="text/css">

		body{
			text-align: center;
			font-family: verdana;
                        background-image: url("this.jpg");

		}

 fieldset{
  
  margin: 0 auto;
  text-align: center;
  float: center;
  width: 350px;
  height: 200px;
}
input{
font-size: 18px;}
p{
font-size: 15px;}

		</style>

	</head>
<body>

		<br><h1>FLIGHT DETAILS</h1>

<br>
<?php
$dbname = $_SESSION["databasename"];
$from=$_SESSION["fromtemp"];
$to=$_SESSION["totemp"];
$seats=$_SESSION["seats"];
$fullname=$_SESSION["username"];
$dep_time=$_SESSION["dep_time"];
$depart=$_SESSION["depart"];
//$t1=preg_split("/:/",$dep_time);
//$t2="\:";
//$t3=":00";
//$t4=$dep_time.$t3;


$con = mysqli_connect("localhost","root","","wp");
if(!$con)
			{
				die("Error connecting:".mysqli_connect_error($con));
			}


$sql1 = "select flight_no from sf where dep_city ='$from' and arr_city= '$to' and dep_time= '$dep_time'";
//echo $sql1;
$r1=mysqli_query($con,$sql1);
if(!$r1)
{
	echo mysqli_error($con);
}
$record = mysqli_fetch_array($r1);
$temp=$record['flight_no'];
$_SESSION['temp']=$temp;

//echo $temp;
//$_SESSION['r1']=$r1;

$sql2 = "select * from df where flight_no='$temp' and dep_date='$depart'";
//echo $sql2;
$r2=mysqli_query($con,$sql2);
if(mysqli_num_rows($r2)>0)
{
//	echo mysqli_error($con);
$sqlseats="select seats_booked from df where flight_no='$temp' and dep_date='$depart'";
//echo $sqlseats;
$res=mysqli_query($con,$sqlseats);
$record1 = mysqli_fetch_array($res);
echo mysqli_error($con);
$temp1=$record1['seats_booked'];
$_SESSION['temp1']=$temp1;
//echo $temp1;
}
else
{
	$temp1=0;
	$_SESSION['temp1']=$temp1;
	//echo $temp1;
}



if($temp1>200)
{
?>
	<script type="text/javascript">alert("The number of seats you wanted to book isnt available. Sorry try the next flight")
	location.href="domestic.html";</script>
<?php
}
else
{   echo "<fieldset>";
	echo "<b><p> Name   : "   .$fullname ;
	echo "<p> Flight no : " .$temp  ;
	echo "<p> Departing city : " .$from ;
	echo "<p> Arriving city : " .$to ;
	echo "<p> Departure Date : " .$depart ;
	$sql3 = "select cost from sf where flight_no='$temp'";
	$r3 = mysqli_query($con,$sql3);
	$record3 = mysqli_fetch_array($r3);
    $temp2=$record3['cost'];
	$sum = $seats*$temp2;
	$_SESSION['sum']=$sum;
	echo "<p>   Total cost :  Rs " .$sum." /-" ;
    echo "</fieldset>";
	}
	?>
	<br><br>
	<form method = "post" action = "last.php">
	<input type = "submit" value = "SUBMIT"/>
	</form>

</body>
</html>