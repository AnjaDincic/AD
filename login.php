<?php
include 'konekcija.php';

$poruka = '';
if(isset($_POST["login"])){

    include("domen/userKlasa.php");
    $user = new User($db);

    if($user->login()){
      header("Location: index.php");
    }else{
      $poruka = 'Neuspesno logovanje';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>AD</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

    <link rel="shortcut icon" type="image/png" href="img/icon.png" sizes="32x32" />


  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate-css/animate.min.css" rel="stylesheet">

  <link href="css/style.css" rel="stylesheet">

  <script type="text/javascript" src="jquery-1.10.2.js"></script>
<script type="text/javascript">
$(document).ready(function () {
$("#username").keyup(function(){
var vrednost = $("#username").val();
$.get("suggest.php", { unos: vrednost },
   function(data){
    $("#livesearch").show();
    $("#livesearch").html (data);
   });
});
});
function place(ele){
  $("#username").val(ele.innerHTML);
  $("#livesearch").hide();
}
</script>

<style type="text/css"> 
#livesearch{ 
  margin:5px;
  width:220px;
  border: 1px solid;
  display: none;
  }
#username{
  border: solid #A5ACB2;
  margin:5px;
  } 
</style>


</head>

<body onload="document.getElementById('username').focus()">
  <div id="preloader"></div>

  <?php include 'header.php'; ?>

  <section id="about">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">Login forma </h3>
          <div class="section-title-divider"></div>
        </div>
      </div>
    </div>
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="">

            <p><?php
                echo($poruka);
            ?></p>
            <div class="form-group">
              <label for="username" class="cols-sm-2 control-label" >Username</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="username" id="username"  placeholder="Username"/>
                  <div id="livesearch"></div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="password" class="cols-sm-2 control-label">Password</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-key fa" aria-hidden="true"></i></span>
                  <input type="password" class="form-control" name="password" id="password"  placeholder="Password"/>
                </div>
              </div>
            </div>
            <div class="form-group ">
              <button type="submit" name="login" id="button" class="btn btn-primary btn-lg btn-block">Login</button>
            </div>

          </form>

        </div>
      </div>
    </div>
  </section>


  <?php include 'footer.php'; ?>
  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/morphext/morphext.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/stickyjs/sticky.js"></script>
  <script src="lib/easing/easing.js"></script>

  <script src="js/custom.js"></script>


</body>
</html>
