<header class="heder" id="header">
  <div class="container">

    <div id="logo" class="pull-left">
      <h1><a href="index.php">AD</a></h1>
    </div>

    <nav id="nav-menu-container">
      <ul class="nav-menu">
        <li><a href="index.php" class="text-center">Najnovije<?php echo " "?></a></li>
		<?php 
    $rola = 0;
    if($_SESSION['user']['rola'] === $rola){ ?>
		<li><a href="vesti.php">Vesti</a></li> 
    <li><a href="svet.php">Svet</a></li> 
    <li><a href="sport.php">Sport</a></li> 
    <li><a href="kultura.php">Kultura</a></li> 
    <li><a href="zabava.php">Zabava</a></li> 
    <li><a href="zena.php">Moda</a></li> 
    <li><a href="it.php">IT</a></li> 
    <li><a href="ljubimci.php">Ljubimci</a></li> 
    <li><a href="recepti.php">Recepti</a></li> 
		<!--<li><a href="kontakt.php">Kontakt</a></li> -->
    <!-- Komentar -->
       <?php } ?>
	   <?php if($_SESSION['user'] != ''){ ?>       
        <?php if($_SESSION['user']['rola'] == 1){ ?>
        <li><a href="izmenaBrisanje.php" class="text-center">Izmena i brisanje <br> clanka</a></li>
        <li><a href="dodajClanak.php" class="text-center">Dodaj clanak</a></li>
		    <li><a href="pregled.php" class="text-center">Pregled</a></li>
        <li><a href="grafik.php" class="text-center">Grafik</a></li>

		 <?php } ?>	  
      <li><a href="logout.php" class="text-center">Logout</a></li>
	  <li><span class="fa fa-user-circle-o"><?php echo " ".$_SESSION['user']['imePrezime']; ?></li>
    <?php }else{ ?>
      <li><a href="registracija.php" class="text-center"><span class="fa fa-user-plus"></span><?php echo " "?>Registracija</a></li>
      <li><a href="login.php" class="text-center"><span class="fa fa-user-o"></span><?php echo " "?>Login</a></li>
    <?php } ?>
      </ul>
    </nav>
  </div>
</header>