<?php
    session_start();   


    if($_SESSION['login_user'] == null) {
        
        header("location: index.php");
    }
   
    include("config.php");

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // username and password sent from form 
        
        $myemail = mysqli_real_escape_string($db,$_POST['email']);
        $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
        
        $sql = "SELECT id FROM utilisateur WHERE Email = '$myemail' and password = '$mypassword'";



        $sql = "INSERT INTO `conge`(`debut_Vacance`, `fin_Vacance`, `Periode_vacance`, `id_emp`, `Annee`) VALUES ('2021-08-10', '2021-08-20', 20, 1, 2019)";

        if ($db->query($sql) === TRUE) {
        echo "New record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . $db->error;
        }
    }


$db->close();
?>