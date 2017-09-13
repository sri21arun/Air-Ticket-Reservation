<?php
session_start();


$from=$_POST["from"];
$to=$_POST["to"];
$depart=$_POST["depart"];

$seats=$_POST["seats"];
$dep_time=$_POST["dep_time"];

$_SESSION["fromtemp"]=$from;
$_SESSION["totemp"]=$to;
$_SESSION["seats"]=$seats;
$_SESSION["dep_time"]=$dep_time;
$_SESSION["depart"]=$depart;

$sf = $from.$to;
$dbname = $_SESSION["databasename"];
$con = mysqli_connect("localhost","root","","wp");
if(!$con)
			{
				die("Error connecting:".mysqli_connect_error($con));
			}
			
			
			
	$sql = "Select * from sf where dep_city='$from' and arr_city='$to' and dep_time='$dep_time' and flight_details='Scheduled'";
	echo $sql;
$result=mysqli_query($con,$sql);
			if(mysqli_num_rows($result)){
				//$_SESSION["tablename"]=sf;
				?>
				<script type="text/javascript">location.href="confirm.php";</script>
				<?php
			}
			else
			{
				$_SESSION["tablename"]=$sf;
				?>
				<script type="text/javascript">
				alert("No flights available");location.href="proj.html";</script>
				<?php
			}
			mysqli_close($con);

?>
			