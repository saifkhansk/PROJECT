<?php
session_start();
	$username="sk2437";
  $password="headroom5";
  $hostname="mysql:host=sql2.njit.edu; dbname=sk2437";

try 
{
      $con = new PDO($hostname, $username,$password);  
      $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
      $email = $_SESSION["username"];
     
      $_SESSION['current_page'] = $_SERVER['REQUEST_URI'];
      
      echo '<h2>Welcome '.$_SESSION["username"].'</h2>';  
      
     $getdata = "SELECT * FROM todos where isdone = 0 ";
     $data = $con->query($getdata);
     
     echo "<strong>"; 
     echo "<div style ='font:20px;color:black'>Incompleted To-Do List";
      echo "<br>";
    
     echo '<table width="50%" border="1" cellpadding="5" cellspacing="1" >
       <tr>
         <th>Owner Email </th>
         <th>Owner Id </th>
         <th>Created Date </th>
         <th>Due Date </th>
         <th>Message </th>
         <th>Is done </th>
         <th>Completed?</th>
         <th>Edit</th>
         <th>Delete</th>
       </tr>';
    foreach ($data as $row)
    {
      echo '<tr>
              <td>'.$row["owneremail"].'</td>
              <td>'.$row["ownerid"].'</td>
              <td>'.$row["createddate"].'</td>
              <td>'.$row["duedate"].'</td>
              <td>'.$row["message"].'</td>
              <td>'.$row["isdone"].'</td>
              <td> <input type="submit" name="done" value="Completed"> </td>
              <td> <input type="submit" name="edit" value="Edit"> </td>
              <td> <input type="submit" name="delete" value="Delete"> </td>
            </tr>';
            
            
    }
       echo '</table>';
 
 
 echo "<br>";
 echo "<div style ='font:20px;color:black'>Completed To-Do List";
  echo "<br>";
    $getdata = "SELECT * FROM todos where isdone = 1 ";
     $data = $con->query($getdata);
     echo '<table width="60%" border="1" cellpadding="5" cellspacing="1" >
       <tr>
         <th>Owner Email </th>
         <th>Owner Id </th>
         <th>Created Date </th>
         <th>Due Date </th>
         <th>Message </th>
         <th>Is done </th>
       </tr>';
    foreach ($data as $row)
    {
      echo '<tr>
              <td>'.$row["owneremail"].'</td>
              <td>'.$row["ownerid"].'</td>
              <td>'.$row["createddate"].'</td>
              <td>'.$row["duedate"].'</td>
              <td>'.$row["message"].'</td>
              <td>'.$row["isdone"].'</td>
            </tr>';
    }
       echo '</table>';
       echo "<br>";

 
 if (isset($_POST['add']))
       {
       
       header("location:add.php"); 
       }
 }
 catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 }
    
?>

<html>
<head>
<title>Login</title>
</head>
<body>
<form method="POST">
												
				<button type="submit" name="add" value="Click to Add">
</form>
 
<p><a href="logout.php">Logout</a></p>
 
</body>
</html>
