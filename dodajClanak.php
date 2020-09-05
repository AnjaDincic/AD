<?php 
include "konekcija.php";
if($_SESSION['user'] == ''){
  header("Location:login.php");
  exit;
}

$poruka = '';
if(isset($_POST["unesi"])){

    include("domen/clanakKlasa.php");
    $clanak = new Clanak($db);

    if($clanak->unesiClanak()){
    header("Location: index.php");
     // $poruka = 'Uspesno dodato na stanje';
    }else{
      $poruka = 'Greska pri dodavanju';
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
          <h3 class="section-title">Dodavanje članka </h3>
          <div class="section-title-divider"></div>
        </div>
      </div>
    </div>
    
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="">
      
            <<div class="form-group">
              <label for="naslov" class="cols-sm-2 control-label">Naslov</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-newspaper-o fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="naslov" id="naslov"  placeholder="Naslov" value="<?php echo $zaIzmenu['naslov'] ?>"/>
                </div>
              </div>
            </div>
      <div class="form-group">
              <label for="tekst" class="cols-sm-2 control-label">Tekst</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-align-left fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="tekst" id="tekst"  placeholder="Tekst" value="<?php echo $zaIzmenu['tekst'] ?>"/>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="datum" class="cols-sm-2 control-label">Datum</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-calendar fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="datum" id="datum"  placeholder="Datum" value="<?php echo $zaIzmenu['datum'] ?>"/>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="kategorijaID" class="cols-sm-2 control-label">KategorijaID</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-tags fa" aria-hidden="true"></i></span>
                  
                  <input type="text" class="form-control" name="kategorijaID" id="kategorijaID"  placeholder="KategorijaID" value="<?php echo $zaIzmenu['kategorijaID'] ?>"/>
                </div>
              </div>
              <div class="form-group">
              <label for="autor" class="cols-sm-2 control-label">AutorID</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa-user-circle fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="autor" id="autor"  placeholder="AutorID" value="<?php echo $zaIzmenu['autor'] ?>"/>
                </div>
              </div>
              <div class="form-group">
              <label for="slika" class="cols-sm-2 control-label">Slika</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-picture-o fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="slika" id="slika"  placeholder="Slika" value="<?php echo $zaIzmenu['slika'] ?>"/>
                </div>
              </div>
            </div>
            <div class="form-group ">
              <button type="submit" name="unesi" id="button" class="btn btn-primary btn-lg btn-block">Dodaj članak</button>
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