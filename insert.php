<?php
$username = $_POST['username'];
$password = $_POST['password'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phoneCode = $_POST['phoneCode'];
$phone = $_POST['phone'];

if(!empty($username) || !empty($password) || !empty($gender) || !empty($email) || !empty($phoneCode) || !empty($phone))
{
		include "connectdb.php";
			$SELECT = "SELECT email From register Where email = ? Limit 1";
			$INSERT	= "INSERT Into register (username, password, gender, email, phoneCode, phone) values(?, ?, ?, ?, ?, ?)";

			$stmt = $conn->prepare($SELECT);
			$stmt->bind_param("s", $email);
			$stmt->execute();
			$stmt->bind_result($email);
			$stmt->store_result();
			$rnum = $stmt->num_rows;
			
			if($rnum==0)
			{
				$stmt->close();
				
				$stmt = $conn->prepare($INSERT);
				$stmt->bind_param("ssssii", $username, $password, $gender, $email, $phoneCode, $phone);
				$stmt->execute();
				$query="INSERT INTO `result` (`email`, `maths`, `physics`, `chemistry`) VALUES ('$email', 'Not Attended', 'Not Attended', 'Not Attended')";
				$result=mysqli_query($conn,$query);
				header("Location: login.html");
				
			}
			else
			{
				//echo "Someone already register using this email";
			echo '<script language="javascript">';
			echo 'alert("Someone already register using this email")';
			echo '</script>';
			
			}
			
			$stmt->close();
			$conn->close();
				
			
		
}
else
{
	echo "All field are required";
}
?>