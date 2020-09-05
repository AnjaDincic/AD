<?php include 'konekcija.php';

if($_SESSION['user'] == ''){
  header("Location:login.php");
  exit;
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
  <link href="css/datatables.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
</head>

<body>
  <div id="preloader"></div>

  <?php include 'header.php'; ?>

  <section id="about">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">Pregled članaka</h3>
          <div class="section-title-divider"></div>
        </div>
      </div>
    </div>
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">

          <table id="tabela" class="table table-hover">
            <thead>
              <tr>
                <th>Naslov članka</th>
				<th>Datum</th>
                <th>Kategorija</th>
                <th>Autor</th>
                <th>Redakcija</th>
              </tr>
            </thead>
            <tbody>
              <?php $clanak = $db->rawQuery("select c.naslov as naslov,c.datum as datum, a.ImePrezimeAutor as autor,k.nazivKategorije as kategorija, r.adresa as redakcija from clanak c join kategorija k on c.kategorijaID=k.kategorijaID join autor a on c.autor=a.autorID join redakcija r on a.redakcijaID=r.redakcijaID");

                  foreach($clanak as $c){
               ?>
               <tr>                
                 <td><?php echo $c['naslov']; ?> </td>
				 <td><?php echo $c['datum']; ?> </td>
				 <td><?php echo $c['kategorija']; ?> </td>
				 <td ><?php echo $c['autor']; ?> </td>
				 <td><?php echo $c['redakcija']; ?> </td>
               </tr>

             <?php  } ?>
            </tbody>
          </table>
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
  <script src="js/datatables.js"></script>
  <script src="js/custom.js"></script>
 <script>
  $(document).ready(function(){
    $('#tabela').DataTable();
    });
  </script>
</body>
</html>
