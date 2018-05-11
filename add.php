<?php
	$username="sk2437";
  $password="headroom5";
  $hostname="mysql:host=sql2.njit.edu; dbname=sk2437";
try {
    $connect = new PDO($hostname, $username, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (isset($_POST['add'])) {
        
        $message    = $_POST['message'];
        $createdate = $_POST['createddate'];
        $duedate    = $_POST['duedate'];
        $email      = $_SESSION["username"];
        $isdone     = $_POST['isdone'];
        
        
        echo "<div style ='font:20px;color:black'>Click Go Back after done adding <br>";
        echo "<div style ='font:20px;color:black'>Message : $message";
        echo "<br>";
        echo "<div style ='font:20px;color:black'>Owner Email : $email";
        echo "<br>";
        
        echo "<div style ='font:20px;color:black'>Create Date : $createdate ";
        echo "<br>";
        echo "<div style ='font:20px;color:black'>Due Date : $duedate ";
        echo "<br>";
        echo "<div style ='font:20px;color:black'>Is done : $isdone";
        echo "<br>";
        
        $insert = $connect->prepare("INSERT INTO todos (owneremail, createddate, duedate, message, isdone)
       VALUES (:email, :createdate, :duedate, :message, :isdone ");
        
        $insert->bindParam(':email', $email);
        $insert->bindParam(':createdate', $createdate);
        $insert->bindParam(':duedate', $duedate);
        $insert->bindParam(':message', $message);
        $insert->bindParam(':isdone', $isdone);
        $insert->bindParam(':birthday', $birthday);
        $insert->bindParam(':gender', $gender);
        
        $insert->execute();

        header("Location:add.php");
        
        
    } else if (isset($_POST['back'])) {
        
       header("Location: " . $_SESSION['current_page']);
    }
}
catch (PDOException $error) {
    $message = $error->getMessage();
}
?>

<html>
<head>
<title>Add task</title>
 <link rel="stylesheet" href="add.css">
</head>
<body>

<div class="main">
    <div class="sub-main">    
<form method="POST">
                                                                
        <label>Message : </label><input placeholder="Enter Message" name="message" type="text"><br />
        <label>Create Date</label><input placeholder="Created Date" name="createddate" type="date" ><br />
        <label>Due Date : </label><input placeholder="Due date" name="duedate" type="date"  ><br />
        <label>Is Done : </label><input placeholder="(0 = incomplete or 1 = complete)" name="isdone" type="text" ><br />
        <input type="submit" name="add" value="Add">
        <input type="submit" name="back" value="Go Back">
        
</form>
</div>
 
     </div> 
 
</body>
</html>