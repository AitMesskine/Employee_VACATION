
<?php
    session_start();   


    if($_SESSION['login_user'] == null) {
        
        header("location: index.php");
    }
  
    ?>
<html class="white-bg-login" lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>comune Ait meloul /Autorisation Du vacance</title>
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
//session_start();
//$
//$_SESSION['email'] =$_POST['email'];


//if(isset($_POST['click'])){

//setcookie('email',$_SESSION['email'],time()+365*24*3600,null,null,false,true);
//setcookie('password',$_SESSION['password '],time()+365*24*3600,null,null,false,true);
//}
//header(('location:1.php'));

?>
 <div class="col-md-4 col-md-offset-4 marg" style="margin-top:30px;">
       <center><img src="logo1.png" width="100px" alt="logo">  </center>     <center><h4>Autorisation Du vacance</h4></center>
    </div>

    
<div class="form-box" id="login-box">
    <div class="header">votre vacance   </div>
    <form method="POST" action="index.php">

        <!-- style="margin-top:40px;" -->

        <div class="body white-bg">
                    <div class="form-group">
                <input class="form-control" placeholder="Votre Email" name="email" type="Email" autofocus="" value="">
            </div>
            <div class="form-group">
                <input class="form-control" placeholder="Mot de passe" name="password" type="password">
            </div>


            <div class="checkbox">
                <label>
                    <input type="checkbox" value="Se sevenir" name="checkbox" id="click">
                    <span for="click"> &nbsp; Se sevenir de moi</span>
                </label>
                <span class="pull-right">
                    <label>
                        <a href="https://demo.itest.thinkbuzz.net/reset/index"> Accien mot de passe</a>
                    </label>
                </span>
            </div>

                        
            <input type="submit" class="btn btn-lg btn-success btn-block" value="Accéder">
        </div>
    </form>
</div>

    
        <div class="col-md-4 col-md-offset-4 marg" style="margin-top:30px;">
    	<nav class="navbar navbar-default">
    	  <div class="container-fluid">
    	    <div class="navbar-header">
    	      <a class="navbar-brand" href="#">
    	       &nbsp; &nbsp; &nbsp;  <p>&copy;Comune Ait Meloul 2021</p>
    	      </a>
    	    </div>
    	  </div>
    	</nav>
    	</div>
    	<div class="col-md-6 col-md-offset-3 marg">
    	 
    	</div>

    
    <script async="" src="https://www.google-analytics.com/analytics.js"></script><script type="text/javascript" src="https://demo.itest.thinkbuzz.net/assets/inilabs/jquery.js"></script>
    <script type="text/javascript" src="https://demo.itest.thinkbuzz.net/assets/bootstrap/bootstrap.min.js"></script>

            <script type="text/javascript">
            $('#admin').click(function () {
                $("input[name=username]").val('admin');
                $("input[name=password]").val('123456');
            });
            $('#teacher').click(function () {
                $("input[name=username]").val('teacher1');
                $("input[name=password]").val('123456');
            });
            $('#student').click(function () {
                $("input[name=username]").val('student1');
                $("input[name=password]").val('123456');
            });
            $('#parent').click(function () {
                $("input[name=username]").val('parent1');
                $("input[name=password]").val('123456');
            });
            $('#accountant').click(function () {
                $("input[name=username]").val('accountant');
                $("input[name=password]").val('123456');
            });
            $('#librarian').click(function () {
                $("input[name=username]").val('librarian');
                $("input[name=password]").val('123456');
            });
            $('#recep').click(function () {
                $("input[name=username]").val('receptionist');
                $("input[name=password]").val('123456');
            });


          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-61634883-2', 'auto');
          ga('send', 'pageview');
        </script>
    

</body></html>