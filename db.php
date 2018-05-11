<?php
	$username="sk2437";
  $password="headroom5";
  $dsn="mysql:host=sql2.njit.edu; dbname=sk2437";
try {
    $db = new PDO($dsn, $username, $password);
}
catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('../errors/database_error.php');
    exit();
}

function getodo()
{
    global $db;
    $query     = 'SELECT * FROM todos
              ORDER BY id';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;
}

function add_todo($owneremail, $ownerid, $createddate, $duedate, $message, $isdone)
{
    global $db;
    $query     = "INSERT INTO todos (owneremail, ownerid, createddate, duedate, message, isdone) VALUES (:owneremail, :ownerid, :createddate, :duedate, :message, :isdone )";
    $statement = $db->prepare($query);
    $statement->bindValue(':owneremail', $owneremail);
    $statement->bindValue(':ownerid', $ownerid);
    $statement->bindValue(':createddate', $createddate);
    $statement->bindValue(':duedate', $duedate);
    $statement->bindValue(':message', $message);
    $statement->bindValue(':isdone', $isdone);
    $statement->execute();
    $category = $statement->fetch();
    $statement->closeCursor();
    return $category_name;
    
}
function delete_todo($ownerid)
{
    global $db;
    $query     = "DELETE FROM todos WHERE ownerid = :ownerid";
    $statement = $db->prepare($query);
    $statement->bindValue(':ownerid', $ownerid);
    $statement->execute();
    
    $statement->closeCursor();
    
}
?>