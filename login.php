<?php
$username = "sk2437";
$password = "headroom5";
$hostname = "mysql:host=sql2.njit.edu; dbname=sk2437";

try {
    $con = new PDO($hostname, $username, $password);
    if (isset($_POST['create'])) {
        if (empty($_POST["email"]) || empty($_POST["password"])) {
            echo "<div style ='font:17px Arial;color:red'>Please enter Email or Password!!";
        } else {
            $query     = "SELECT * FROM accounts WHERE email = :email AND password = :password";
            $statement = $connect->prepare($query);
            $statement->execute(array(
                'email' => $_POST["email"],
                'password' => $_POST["password"]                
                
            ));
            $count = $statement->rowCount();
            if ($count > 0) {
                $_SESSION["email"] = $_POST["email"];
    
                header("location:success.php");
            } else {
                echo "<div style ='font:17px Arial;color:red'>Wrong Email or password!!";
            }
        }
    } else if (isset($_POST["create"])) {
        header("location:project2.php");
    }
    
}
catch (PDOException $error) {
    $message = $error->getMessage();
}  

?>
<html>
<head>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

  <form class="sign-up" method="POST">
    <h1 class="sign-up-title">Login</h1>
    
    <label for="email"><b>Enter Email</b></label>
    <input type="email" class="sign-up-input" placeholder="Email" name="email" required>
    
    <label for="pass"><b>Enter Password</b></label>
    <input type="password" class="sign-up-input" placeholder="Password" name="pass" required>
    
     <form method="POST">
    <button type="login" name="login" value="Login!" class="sign-up-button"> Login </button>
</form>

 <form method="POST" >
    <button type="login" name="create" value="Login!" class="sign-up-button"> Register for account </button>
</form>

</body>
</html>
