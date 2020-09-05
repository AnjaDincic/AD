<?php include 'konekcija.php';


 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
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
<link href="https://bootswatch.com/4/flatly/bootstrap.min.css">
  <link href="css/style.css" rel="stylesheet">
</head>

<style>
    #more {display: none;}

</style>
</head>
<body>
  <div id="preloader"></div>

  <?php include 'header.php'; ?>

  <section id="about">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">KULTURA</h3>
          <div class="section-title-divider"></div>
        </div>
      </div>
    </div>
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
         
          
          <div id="tabela"> </div>
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
  <script>

          function popuniTabelu(){
            $('#tabela').html("");
            var kategorija = 4;
            $.ajax({
              url: "ajaxPretraga.php",
              data: "id="+kategorija,
              success: function(result){
              var text = '<table class="table table-hover text-center"><thead><tr><th> </th><th >Članak</th><th width="200px">Datum</th><th>Autor</th></tr></thead><tbody>';
              $.each($.parseJSON(result), function(i, val) {

                          
                text += '<tr>';
                text += '<td><img src="img/'+val.slika+'" width="250px" height="200px"/></td>';
                
                text += '<td><span id="dots">'+val.naslov+'</span><span id="more">'+val.tekst+'</span><br><button onclick="myfunction()" id= "myBtn">Procitaj</button></td>';
                text += '<td>' + val.datum+'</td>';
                text += '<td>'+val.ImePrezimeAutor+'</td>';
            
            
                text += '</tr>';

                });

                text+='</tbody></table>';
                $('#tabela').html(text);
            }});
          }

      </script>
      <script >
        function myfunction() {
            var btnText = document.getElementById("myBtn");
            var moreText = document.getElementById("more");
            var dots = document.getElementById("dots");

            if(dots.style.display === "none"){
              dots.style.display = "inline";
              btnText.innerHTML = "Procitaj";
              moreText.style.display = "none";
            } else {
              dots.style.display = "none";
              btnText.innerHTML ="Manje";
              moreText.style.display = "inline";
            }

        }

      </script>
      <script>
          $( document ).ready(function() {
            popuniTabelu();
          });
      </script>


</body>
</html>
