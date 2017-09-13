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
 table, td, th {
    border: 1px solid black;
}

th {
    background-color: black;
    color: white;
	}
</style>
</head>
<body>
<br><br><br>
<table border="2" width="650" height="120" align="center">
<tr>
<th> Flight Number </th>
<th> Departure time </th>
<th> Arrival time </th>
<th> Duration </th>
<th> Cost </th>
</tr>
<?php
$dbname = $_SESSION["databasename"];
$from=$_SESSION["fromtemp"];
$to=$_SESSION["totemp"];
$seats=$_SESSION["seats"];
$dep_time=$_SESSION["dep_time"];
$depart=$_SESSION["depart"];

$con = mysqli_connect("localhost","root","","wp");
if(!$con)
			{
				die("Error connecting:".mysqli_connect_error($con));
			}
//$sf=$_SESSION["tablename"];
$sqlselect = "Select * from sf where dep_city='$from' and arr_city='$to' and dep_time='$dep_time'"; //add dep_time too

						$result=mysqli_query($con,$sqlselect);

						if($result)
						{
							while($record=mysqli_fetch_array($result))
							{
								echo "<tr>";
								echo "<td align='center'><a href='submit.php'>".$record["flight_no"]."</a></td>";
								echo "<td>".$record["dep_time"]."</td>";
								echo "<td>".$record["arr_time"]."</td>";
								echo "<td>".$record["duration"]."</td>";
								echo "<td>".$record["cost"]."</td>";
								echo "</tr>";
							}
						}
						
						else
						{
							echo "No such table exists";
						}
						mysqli_close($con);
						?>
</table>
</body>
</html>