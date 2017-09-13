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
<br>
<a href="proj.html">BACK</a><br><br>
<table border="2" align="center">
<tr>
<th> Flight Number </th>
<th> Departure city </th>
<th> Arrival city </th>
<th> Departure time </th>
<th> Arrival time </th>
<th> Duration </th>
<th> Number of seats </th>
<th> Flight details </th>
</tr>
<?php

$con = mysqli_connect("localhost","root","","wp");
if(!$con)
			{
				die("Error connecting:".mysqli_connect_error($con));
			}
			$sq21="select * from sf";
			$res21=mysqli_query($con,$sq21);

						if($res21)
						{
							while($rec=mysqli_fetch_array($res21))
							{
								echo "<tr>";
								echo "<td><b>".$rec["flight_no"]."</td>";
								echo "<td><b>".$rec["dep_city"]."</td>";
								echo "<td><b>".$rec["arr_city"]."</td>";
								echo "<td><b>".$rec["dep_time"]."</td>";
								echo "<td><b>".$rec["arr_time"]."</td>";
								echo "<td><b>".$rec["duration"]."</td>";
								echo "<td><b>".$rec["no_seats"]."</td>";
								echo "<td><b>".$rec["flight_details"]."</td>";
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