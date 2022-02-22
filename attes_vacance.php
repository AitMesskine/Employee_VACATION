<?php
    session_start();   


    if($_SESSION['login_user'] == null) {
        
        header("location: index.php");
    }
   
    include("config.php");

    $id_emp = "";
    $nom_complete = "";
    $cin = "";

    if (isset($_GET['id_emp'])) {
      $sql = "SELECT `id_emp`, `nom_complete`, `cin` FROM `employee` WHERE id_emp =" . $_GET['id_emp'];
      $result = $db->query($sql);

        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            $id_emp = $row["id_emp"]; 
            $nom_complete = $row["nom_complete"]; 
            $cin =$row["cin"];
          }
        }

    }
  
    $total_conge = "";

    if (isset($_GET['id_emp'])) {
      
      $sql = "SELECT SUM(`periode_vacance`) AS total_conge FROM `conge` WHERE id_emp=".$_GET['id_emp']." AND annee=".date("Y");
      $result = $db->query($sql);

        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            $total_conge = $row["total_conge"]; 
          }
        }

    }




    
    ?>
   
    


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Commmunité ait meloul /Autorisation du travail</title>
<link rel="stylesheet" href="1.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<body>
<?php



?>

    <div class="container">
        <table><tr>
            <img src="logo1.png" class="rounded mx-auto d-block" alt="logo" width="150px">
<td id=""></td>
</tr>

<div class="d-grid gap-2 d-md-flex justify-content-md-end">
  <button class="btn btn-danger me-md-2 " type="button" >
<a href="logout.php" class="aa" >Quitter </a>
</button></div>
</table>
    </div>
    <div class="container">
<div class="titre">
    <h3><i class="bi bi-files"></i>  Attestation du vacance </h3>
</div>
 <main class="main">

  <div class="container" >

<fieldset class="cadre">
<form method="POST" action="ajout_vacan.php">
<div class="mb-3">
    <label for="formGroupExampleInput" class="form-label"> #Id Employé : </label>
    <input type="number" class="form-control" name="id_emp" hidden id="ID" placeholder="Votre ID" value="<?php  echo $id_emp; ?>">
    <b><?php  echo $id_emp; ?></b>
    <div class="mb-3">
    <label for="formGroupExampleInput2" class="form-label">Nom et Prénom : </label>
    
    <b><?php  echo $nom_complete; ?></b>

    <div class="mb-3">
    <label for="formGroupExampleInput" class="form-label">CIN :</label>
    <b><?php  echo $cin; ?></b><br>
    <span>Totale congé :</span>
 <b> <?php  echo $total_conge; ?></b>

  </div>
  


  <div class="container">
    <label for="debut">Début de vacance</label>
    <input type="date" name="debut" class="form-control" id="debut" placeholder="11/08/2021">
    
    <label for="fin">Fin de vacance</label>
    <input type="date" name="fin" class="form-control" id="fin" placeholder="11/08/2021">
      
    <label for="periode">Période de vacance</label>
    <input type="number" name="periode" class="form-control" id="periode" placeholder="0">

    <label for="année">Année</label>
    <input type="number" name="annee" class="form-control" id="annee" placeholder="2021">
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
      <button class="btn btn-primary btn-sm me-md-2" type="submit" name="ajouter">Ajouter</button>
      </div>
      </form>
  
                            <!--tableau-->
</fieldset>

<?php

if(isset($_SESSION['msgajout'])) {    
  unset($_SESSION['msgajout']);
 echo '<div class="alert alert-success" role="alert">
 le congé est bien enregeistré
 </div>';

}



  $sql = "SELECT id , employee.nom_complete,debut_vacance,fin_vacance,periode_vacance,annee FROM conge,employee WHERE employee.id_emp = conge.id_emp";

if($db->connect_error) {
  die("Connection failed: " . $db->connect_error);
}

$db->set_charset("utf8");
$result = $db->query($sql);
//$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
  // output data of each row
  echo '<table class="table">
  <thead>
    <tr>
  <th scope="col"><div id="Id">#Id</th>
      <th scope="col">Nom compléte</th>
      <th scope="col">Début Vacance</th>
      <th scope="col">Fin du vacance</th>
      <th scope="col">Période du vacance</th>
      <th scope="col">Année</th>
    </tr>
  </thead>
  <tbody>';
  while( $row = $result->fetch_assoc()) {
    
    echo '<tr>
    <th scope="row">' . $row["id"] . '</th>
    <td>' . $row['nom_complete'] . '</td>
    <td>' . $row["debut_vacance"] . '</td>
    <td>' . $row["fin_vacance"] . '</td>
    <td>' . $row["periode_vacance"] . '</td>
    <td>' . $row["annee"] . '</td>
  </tr>';
  }
  echo '
  </tbody>

  </table>';
  }
$db->close();

?>

                                            <!--paginations-->
  <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
      <li class="page-item disabled">
        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Précedent</a>
      </li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item">
        <a class="page-link" href="#">Suivant</a>
      </li>
    </ul>
  </nav>
</div>
</div>
</section>
</div>
                                  <!--les butons-->
                                  <div class="d-grid gap-2 col-6 mx-auto">
                                    <form action="list_emp.php" method="POST">
                                    <button class="btn btn-danger " type="submit"> <p><a href="list_emp.php">&laquo;Retour</a></p></button>
                                    </form>  
                                  </div>
 </main>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<footer>

<p class="p"> &copy;AIT MESSKINE</p>


</footer>

</body>
</html>