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


</style>
</head>
<body>
  <!-- Izmenjen komentar drugi put! -->
  <div id="preloader"></div>

  <?php include 'header.php'; ?>

  <section id="about">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">Najnovije</h3>
          <div class="section-title-divider"></div>
        </div>
      </div>
    </div>
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <select name="selKategorija" id="selKategorija" class="form-control" onchange="popuniTabelu()">
            <option value="0">Sve kategorije</option>
            <?php
            $kategorije = $db->get('kategorija');
            $zahtev = curl_init("http://localhost/ad/api/kategorije");
      			curl_setopt($zahtev, CURLOPT_RETURNTRANSFER, 1);
      			$odgovor = curl_exec($zahtev);
      			$kategorije = json_decode($odgovor);
      			curl_close($zahtev);

            foreach($kategorije as $kat){
             ?>
             <option value="<?php echo $kat->kategorijaID ;?>"><?php echo $kat->nazivKategorije ;?></option>

           <?php } ?>
          </select>
          <br>
          <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Pretraži po autoru" style="margin-left: 0px;">
         <br>
         <br>
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
      			var kategorija = $("#selKategorija").val();
      			$.ajax({
      				url: "ajaxPretraga.php",
      				data: "id="+kategorija,
      				success: function(result){
      				var text = '<table class="table table-hover text-center"><thead><tr><th> </th><th width="300px">Naslov</th><th>Tekst</th><th width="150px">Datum</th><th>Autor</th></tr></thead><tbody>';
      				$.each($.parseJSON(result), function(i, val) {
						
      					text += '<tr>';
                text += '<td><img src="img/'+val.slika+'" width="250px" height="200px"/></td>';
      					text += '<td>'+val.naslov+'</td>';
      					text += '<td>'+val.tekst+'</td>';
                text += '<td>' + val.datum+'</td>';
      					text += '<td>'+val.ImePrezimeAutor+'</td>';
						
						
      					text += '</tr>';

      					});

      					text+='</tbody></table>';
      					$('#tabela').html(text);
      			}});
      		}

          function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("tabela");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[4];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
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
