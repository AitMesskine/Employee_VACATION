<?php
    session_start();   


    if($_SESSION['login_user'] == null) {
        
        header("location: index.php");
    }
   
    include("config.php");

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // username and password sent from form 
        
      if(isset($_POST["nom_complete"]) && isset($_POST["cin"]) && isset($_POST["fonction"]) && isset($_POST["service"])){

        $id_emp = mysqli_real_escape_string($db,$_POST['id_emp']);
        $nom = mysqli_real_escape_string($db,$_POST['nom_complete']);
        $cin = mysqli_real_escape_string($db,$_POST['cin']); 
        $fonction = mysqli_real_escape_string($db,$_POST['fonction']);
        $service= mysqli_real_escape_string($db,$_POST['service']);

        $sql = "UPDATE `employee` SET `nom_complete`='$nom',`cin`='$cin',`fonction`='$fonction' ,`service`='$service' WHERE id_emp =$id_emp";

       if ($db->query($sql) === TRUE) {
        $_SESSION['msgamod']  = true; 
          header("Location: list_emp.php");
      } else {
        echo "Error: " . $sql . "<br>" . $db->error;
      }
      


        }
    }  
$db->close();

?>