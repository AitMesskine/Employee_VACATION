<?php
    session_start();   


    if($_SESSION['login_user'] == null) {
        
        header("location: index.php");
    }
   
    include("config.php");

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // username and password sent from form 
        
      if(isset($_POST["nom"]) && isset($_POST["cin"]) && isset($_POST["fonction"]) && isset($_POST["service"])){
        $nom = mysqli_real_escape_string($db,$_POST['nom']);
        $cin = mysqli_real_escape_string($db,$_POST['cin']); 
        $fonction = mysqli_real_escape_string($db,$_POST['fonction']);
        $service = mysqli_real_escape_string($db,$_POST['service']);

       $sql = "INSERT INTO `employee`(`nom_complete`, `cin`, `fonction`, `service`) VALUES ('" . $nom . "', '" .$cin . "', '$fonction', '$service')";

       if ($db->query($sql) === TRUE) {
          $_SESSION['msg']  = true; 
          header("Location: list_emp.php");
      } else {
        echo "Error: " . $sql . "<br>" . $db->error;
      }
      


        }
    }  
$db->close();

?>