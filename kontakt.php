<?php include 'konekcija.php';

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>AD</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
<link rel="icon" href="favicon.png" sizes="16x16 32x32" type="image/png">
  <link rel="shortcut icon" type="image/png" href="img/icon.png" sizes="32x32" />

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate-css/animate.min.css" rel="stylesheet">

  <link href="css/style.css" rel="stylesheet">
  <link href="https://bootswatch.com/4/flatly/bootstrap.min.css" rel="stylesheet">
  <link href="https://bootswatch.com/4/flatly/_bootswatch.scss" rel="stylesheet">
  <link href="https://bootswatch.com/4/flatly/_variables.scss" rel="stylesheet">
  <link href="https://bootswatch.com/4/flatly/bootstrap.css" rel="stylesheet">

  <script type="text/javascript"
src="https://maps.googleapis.com/maps/api/js?key= AIzaSyCJboFy57-vDzAGCQFYxykUk5teOGx6IZ0&sensor=false">
    </script>
    <script type="text/javascript">
      function initialize() {
        var podesavanjaMape = {
          center: new google.maps.LatLng(44.772742,20.475134),
          zoom: 18
        };
     var map = new google.maps.Map(document.getElementById("map-canvas"),
        podesavanjaMape);
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>

    <style type="text/css">
      html { height: 100% }
      body { height: 100%; margin: 0; padding: 0 }
      #map-canvas { height: 500px}
    </style>

 
</head>

<body>
  <div id="preloader"></div>

  <?php include 'header.php'; ?>

  <section id="about">
  
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">Lokacija</h3>
          <div class="section-title-divider"></div>
        </div>
      </div>
    </div>
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3>Adresa: Vojvode Stepe 32, 11000 Beograd</h3>
            <div id = "map-canvas"/>
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

