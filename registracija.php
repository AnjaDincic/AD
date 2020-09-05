<?php
include 'konekcija.php';

$poruka = '';
if(isset($_POST["registracija"])){

    include("domen/userKlasa.php");
    $user = new User($db);

    if($user->registracija()){
      $poruka = 'Uspesno registrovan korisnik';
    }else{
      $poruka = 'Neuspesno registrovan korisnik';
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
</head>

<body>
  <div id="preloader"></div>

  <?php include 'header.php'; ?>

  <section id="about">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">Registracija korisnika </h3>
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
                <label for="ime" class="cols-sm-2 control-label">Ime i prezime</label>
                <div class="cols-sm-10">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" name="ime" id="ime"  placeholder="Ime i prezime"/>
                  </div>
                </div>
              </div>
            <div class="form-group">
              <label for="username" class="cols-sm-2 control-label">Username</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="username" id="username"  placeholder="Username"/>
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
              <button type="button" class="btn btn-lg btn-default" id="generisiLozinku">Generiši lozinku</button>
            </div>

            <div class="form-group ">
              <button type="submit" name="registracija" id="button" class="btn btn-primary btn-lg btn-block">Registruj se</button>
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
  <script type="text/javascript">
$(document).ready(function() {

	$('#generisiLozinku').click(function() {
		$.ajax({
		  url: 'generatorLozinke.php',
		  success: function(json) {
        alert(json);
		  		$('#password').val(json);
		  }
		});

	});

});
</script>

</body>
</html>
