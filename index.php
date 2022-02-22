<html class="white-bg-login" lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Communité Ait meloul /Autorisation Du vacance</title>
    <link rel="SHORTCUT ICON" href="https://demo.itest.thinkbuzz.net/uploads/images/site.png">
    <!-- bootstrap 3.0.2 -->
    <link href="https://demo.itest.thinkbuzz.net/assets/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css">
    <!-- font Awesome -->
    <link href="https://demo.itest.thinkbuzz.net/assets/fonts/font-awesome.css" rel="stylesheet" type="text/css">
    <!-- Style -->
    <link href="https://demo.itest.thinkbuzz.net/assets/inilabs/style.css" rel="stylesheet" type="text/css">
    <!-- iNilabs css -->
    <link href="https://demo.itest.thinkbuzz.net/assets/inilabs/inilabs.css" rel="stylesheet" type="text/css">
    <link href="https://demo.itest.thinkbuzz.net/assets/inilabs/responsive.css" rel="stylesheet" type="text/css">
</head>

<body class="white-bg-login">
    <?php
    include("config.php");
    session_start();   

    $count = null;

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // username and password sent from form 
        
        $myemail = mysqli_real_escape_string($db,$_POST['email']);
        $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
        
        $sql = "SELECT id FROM utilisateur WHERE Email = '$myemail' and password = '$mypassword'";
        $result = mysqli_query($db,$sql);
        
        $count = mysqli_num_rows($result);
        
        // If result matched $myemail and $mypassword, table row must be 1 row
          
        if($count == 1) {

           //session_register("myusername");
           $_SESSION['login_user'] = $myemail;
           //list_emp
           header("location: list_emp.php");
        }
     }
    ?>

       <center><img src="logo1.png" width="100px" alt="logo"> </center>

    <div class="marg" style="margin-top:30px;">     
     <center><h4>Autorisation Du vacance</h4></center>
    </div>


<br>
    
   <?php
   if($count === 0) {    
   
   echo '<div class="alert alert-danger" role="alert">
   Your Email or Password is invalid
   </div>';

}
?>


<div class="form-box" style="margin-top: 0 !important;" id="login-box">
    <div class="header" style="margin-top: 0 !important;" >   </div>
    <form method="POST"action="index.php">

        <!-- style="margin-top:40px;" -->

        <div class="body white-bg">
                    <div class="form-group">
                <input class="form-control" placeholder="Votre Email" name="email" type="email" autofocus="" value="">
            </div>
            <div class="form-group">
                <input class="form-control" placeholder="Mot de passe" name="password" type="password">
            </div>


            <div class="checkbox">
                <label>
                    <input type="checkbox" value="sevenir" name="sevenir" id="sevenir">
                    <span> &nbsp; Se sevenir  de moi</span>
                </label>
                <span class="pull-right">
                    <label>
                        <a href="https://demo.itest.thinkbuzz.net/reset/index"> Accien mot de passe</a>
                    </label>
                </span>
            </div>

                        
            <input type="submit" class="btn btn-lg btn-success btn-block" value="Accéder" id="acceder">
        </div>
    </form>
</div>

    
        <div class="col-md-4 col-md-offset-4 marg" style="margin-top:30px;">
    	<nav class="navbar navbar-default">
    	  <div class="container-fluid">
    	    <div class="navbar-header">
    	      <a class="navbar-brand" href="#">
    	       &nbsp; &nbsp; &nbsp;  <p>&copy;Ait Messkine</p>
    	      </a>
    	    </div>
    	  </div>
    	</nav>
    	</div>
    	<div class="col-md-6 col-md-offset-3 marg">
    	 
    	</div>

    
        <script type="text/javascript" src="https://demo.itest.thinkbuzz.net/assets/bootstrap/bootstrap.min.js"></script>

    

</body>
</html>