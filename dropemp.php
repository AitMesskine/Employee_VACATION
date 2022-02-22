<?php

  
session_start();   


if($_SESSION['login_user'] == null) {
    
    header("location: index.php");
}

include("config.php");


$sql = 'DELETE FROM employee WHERE id_emp ='.$_GET['id_emp'];
if ($db->query($sql) === TRUE) {
    $_SESSION['msgdropemp']  = true; 
    header("Location: list_emp.php");
} else {
  echo "Error deleting record: " . $db->error;
}


$db->close();