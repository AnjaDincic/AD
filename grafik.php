<?php include 'konekcija.php'; ?>

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

  <section id="about" >
     
      <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">BROJ ČLANAKA PO AUTORU:</h3>
          <div class="section-title-divider"></div>
          
          <div id="chart_div"  ></div>
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
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(grafik);

      function grafik() {
    		    var jsonData = $.ajax({
    		    url: "podaciGrafik.php",
    		    dataType:"json",
    		    async: false
    		  }).responseText;
    		  var data = new google.visualization.DataTable(jsonData);
    		  var options = {backgroundColor: { fill:'transparent' },
    		    titleTextStyle: {
    		  textAlign: 'center',
    		      color: 'black',
    		      fontSize: 36},
    		      'width':1200,
    		      'height':800,
    		      is3D:true,
    		  legend: {
    		      textStyle: {
    		    color: 'black'
    		      }
    		  },
    		  };

    		  var chart = new google.visualization.PieChart(document.getElementById('chart_div'));


    		  chart.draw(data,  options);

    		}
    </script>
</body>
</html>
