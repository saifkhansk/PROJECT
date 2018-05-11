<?php
	$username="sk2437";
  $password="headroom5";
  $hostname="mysql:host=sql2.njit.edu; dbname=sk2437";

try{
	$con=new PDO($hostname, $username, $password);
	if (isset($_POST['signup']))
	{
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$phone=$_POST['phone'];
		$gender=$_POST['gender'];
		$birthday=$_POST['birthday'];

		$insert=$con->prepare("INSERT INTO accounts(email, fname, lname, password, phone, birthday, gender)
    VALUES(:email,:fname,:lname,:password,:phone,:birthday,:gender)");

		$insert->bindParam(':fname' ,$fname);
		$insert->bindParam(':lname' ,$lname);
		$insert->bindParam(':email' ,$email);
		$insert->bindParam(':password' ,$password);
		$insert->bindParam(':phone',$phone);
		$insert->bindParam(':birthday',$birthday);
		$insert->bindParam(':gender' ,$gender);

		$insert->execute();


		header("location:login.php");    

	}

} catch (PDOException $error) {
	echo '<h3>DB Error </h3>';
	echo $error->getMessage();
	exit();
}

?>

<html>
<head>
  <meta charset="utf-8">
  <title>Sign Up Form</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<form method="POST"> <class="sign-up"> 
    <h1 class="sign-up-title">Sign Up</h1>
    
    <label for="fname"><b>Enter First Name</b></label>
    <input type="text" class="sign-up-input" placeholder="First Name" name="fname" required>
    
    <label for="lname"><b>Enter Last Name</b></label>
    <input type="text" class="sign-up-input" placeholder="Last Name" name="lname" required>
    
    <label for="email"><b>Enter Email</b></label>
    <input type="email" class="sign-up-input" placeholder="Email" name="email" required>
    
    <label for="password"><b>Enter Password</b></label>
    <input type="password" class="sign-up-input" placeholder="Password" name="password" required>
    
    <label for="phone"><b>Enter Phone</b></label>
    <input type="phone" class="sign-up-input" placeholder="Phone Number" name="phone">
    
    <label for="gender"><b>Enter Gender</b></label>
    <input type="gender" class="sign-up-input" placeholder="Male/Female" name="gender">
    
    <label for="birthday"><b>Enter Birthday</b></label>
    <input type="birthday" class="sign-up-input" placeholder="MM/DD/YYYY" name="birthday">
    
  
   
    <button type="submit" name="signup" value="Sign me up!" class="sign-up-button"> Sign Up!</button>

</form>
    

</body>
</html>

