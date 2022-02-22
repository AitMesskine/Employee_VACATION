<?php
    session_start();   


    if($_SESSION['login_user'] == null) {
        
        header("location: index.php");
    }
   
    include("config.php");

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // username and password sent from form 
        
      if(isset($_POST["debut"]) && isset($_POST["fin"]) && isset($_POST["periode"]) && isset($_POST["annee"])){
        $debut = mysqli_real_escape_string($db,$_POST['debut']);
        $fin = mysqli_real_escape_string($db,$_POST['fin']); 
        $periode = mysqli_real_escape_string($db,$_POST['periode']);
        $annee= mysqli_real_escape_string($db,$_POST['annee']);
        $idemp= mysqli_real_escape_string($db,$_POST['id_emp']);

        $sql = "INSERT INTO `conge`(`debut_vacance`, `fin_vacance`, `periode_vacance`,`id_emp`, `annee`)  VALUES ('" . $debut . "', '" .$fin . "', $periode, $idemp,$annee)";

       if ($db->query($sql) === TRUE) {
        $_SESSION['msgajout']  = true; 
          header("Location: attes_vacance.php");
      } else {
        echo "Error: " . $sql . "<br>" . $db->error;
      }
      


        }
    }  
$db->close();

?>