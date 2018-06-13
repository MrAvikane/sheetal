<!DOCTYPE html>
<html>
<head>
<title>RESULT</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
button 
{
    background-color: red; 
    border: none;
    color: white;
    padding: 15px 32px;
    text-decoration: none;
    display: inline-block;
    margin: 4px 2px;
    cursor: pointer;
	position: absolute;
    top: 45%;
    left: 44.8%;
}
table
{
	
    border-collapse: collapse;
    width: 50%;
	position: absolute;
    left: 25%;
    top: 25%;
}

th, td 
{
    text-align: center;
    padding: 8px;
	border: 1px solid black;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    
    color: white;
	height: 24px;
	text-align: center;
}
</style>

		
		 
		


</head>
<body class="w3-light-grey">

<header class="w3-container w3-red w3-center" >
  <h1 class="w3-margin w3-jumbo">RESULTS</h1>
  </header>

<table>
	<tr class="w3-red">
		<th>Email</th>
		<th>Maths</th>
		<th>Physics</th>
		<th>Chemistry</th>
	</tr>
	<?php
		session_start();
		include "connectdb.php";
		$ema=$_SESSION['email'];
		$sql="SELECT rg.username, r.maths, r.physics, r.chemistry from result r,register rg where (r.email=rg.email && r.email='$ema')";
		$result = $conn->query($sql);
		
		
		
		if($result->num_rows > 0)
		{
			while($row = $result-> fetch_assoc())
			{
				
				echo "<tr ><td>". $row["username"]."</td><td>".$row["maths"]."</td><td>".$row["physics"]."</td><td>".$row["chemistry"]."</td></tr>";
			}
			echo "</table>";
		}
		//else 
	//	{
	//		echo "zero result";
	//	}
		
		$conn-> close();
		?>
</table>

<div align="center">
<button class="w3-button w3-black w3-padding-large w3-large w3-margin-top" onclick="location.href='user.html'" > Main Page</button>
</div>


</body>
</html>
		
	