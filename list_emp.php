<?php
    session_start();   


    if($_SESSION['login_user'] == null) {
        
        header("location: index.php");
    }
  
    include("config.php");
  
     
    $id_emp = "";
    $nom_complete = "";
    $cin = "";
    $fonction="";
    $service="";

    if (isset($_GET['id_emp'])) {
      $sql = "SELECT * FROM `employee` WHERE id_emp =" . $_GET['id_emp'];
      $result = $db->query($sql);

        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            $id_emp = $row["id_emp"]; 
            $nom_complete = $row["nom_complete"]; 
            $cin =$row["cin"];
            $fonction=$row["fonction"];
            $service=$row["service"];
          }
        }

    }

    ?>



<!DOCTYPE html>
<html>
<head>
      <html lang="Fr">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Commmunité Ait Meloul//Congé Employé</title>
      <link rel="stylesheet" href="6.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body>
     <div class="container">
     <div class="text-center" class="btn btn-info">
     <img src="logo1.png" id="image"  alt="logo" width="100px">
     </div><br>
     <div>
     <b class="span"><?php  echo  "Bonjour :  ".$_SESSION['login_user'];?></b>&nbsp;&nbsp;
     </div>
  <div class="card">
      <div class="card-header">
            <i class="bi bi-people"></i>
       Les  liste des employés 

       <div class="d-grid gap-2 d-md-flex justify-content-md-end">
  <button class="btn btn-sm btn-danger me-md-2 " type="button" >
<a href="logout.php" class="aa" >Quitter </a>
</button></div>

        </div>
        <div class="card-body">     

        <?php
   if(isset($_SESSION['msg'])) {    
    unset($_SESSION['msg']);
   echo '<div class="alert alert-success" role="alert">
   employée bien ajouté
   </div>';

}

if(isset($_SESSION['msgdropemp'])) {    
  unset($_SESSION['msgdropemp']);
 echo '<div class="alert alert-success" role="alert">
 employée bien supprimé
 </div>';

}

?>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
  <i class="bi bi-people">Ajouter Employé</i>
</button>     


<?php

$sql = "SELECT * FROM `employee` ;";
// Check connection
if ($db->connect_error) {
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
      <th scope="col">#Id</th>
      <th scope="col">Nom compléte</th>
      <th scope="col">CIN</th>
      <th scope="col">Fonction</th>
      <th scope="col">Service</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>';
  while($row = $result->fetch_assoc()) {
    
    echo '<tr> 
    <th scope="row">'. $row['id_emp'] . '</th>
    <td>'. $row['nom_complete'] . '</td>
    <td>'. $row['cin'] . '</td>
    <td>'. $row['fonction'] . '</td>
    <td>'. $row['service'] . '</td>
    <td><div class="btn-group" role="group" aria-label="Basic example">
    <a href="attes_vacance.php?id_emp='. $row['id_emp'] . '"  class="btn btn-info">Congé</a>
    <a href="dropemp.php?id_emp='. $row['id_emp'] . '" class="btn btn-info">Supprimer</a>
    <a href="list_emp.php?id_emp='. $row['id_emp'] . '"  class="btn btn-info">Modifier</a>
    </div>
    </td>
</tr>';
  }
  echo '
  </tbody>

  </table>';
  }
 
$db->close();

?>


    

</div>      </div>
  </div>
</div>
               
                                      <footer class="footer">


                                         <!--paginations-->
                <div id="div" class="contenair">
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
                                                <p>&copy;  Ait MESSKINE</p>
                                      </footer>

                                     
                                    

       

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modifier Employé</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="modifier_emp.php"  method="POST">
        <input type="text" hidden name="id_emp" id="id_emp" value="<?php echo $id_emp;?>">

        <label for="nom">Nom Compléte</label>
        <input type="text" class="form-control" name="nom_complete"  value="<?php echo $nom_complete;?>" placeholder="Nouveau Nom">

        <label for="CIN">CIN</label>
        <input type="text" class="form-control" name="cin"  value="<?php echo $cin;?>" placeholder="nouveau CIN">

        <label for="Fonction">Fonction</label>
        <input type="text" class="form-control" name="fonction"  value="<?php echo $fonction;?>" placeholder="Nouveau Fonction">
        <div>
        <label for="Service">Service<label>
        <input type="text" class="form-control" name="service"  value="<?php echo $service;?>" placeholder="Nouveau Service">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Enregistrer</button> 
      </div>
</form>
    </div>
  </div>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter Employé</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="addtoemp" method="POST">
      <div class="modal-body">
        <label for="nom">Nom Compléte</label>
        <input name="nom" type="text" class="form-control" id="nom" placeholder="Nouveau Nom">

        <label for="CIN">CIN</label>
        <input name="cin" type="text" class="form-control" id="CIN" placeholder="nouveau CIN">

        <label for="Fonction">Fonction</label>
        <input name="fonction" type="text" class="form-control" id="Fonction" placeholder="Nouveau Fonction">
        <div>
        <label for="Service">Service<label>
        <input name="service" type="text" class="form-control" id="Service" placeholder="Nouveau Service">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <button type="submit" name="ajouter" class="btn btn-primary">Ajouter</button>
  </form>
      </div>
    </div>
  </div>
</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script>
      if(document.getElementById('id_emp').value != ""){
        myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
        myModal.show()
      }
      </script>
</body>
</html>
