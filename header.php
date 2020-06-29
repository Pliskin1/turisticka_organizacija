<?php
include ('database.php');


 ?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<!------ Include the above in your HEAD tag ---------->
<style media="screen">
.navbar-brand{
  color: white !important;
}
#username.nav-item{
  Text-Decoration: none !important;
  font-style: normal !important;
}
</style>
  <div id="wrapper" class="animate">
    <nav class="navbar header-top fixed-top navbar-expand-lg  navbar-dark bg-dark">
      <!--<span class="navbar-toggler-icon leftmenutrigger"></span>-->
      <img src="img/image.png" alt=""> &nbsp;&nbsp;&nbsp;&nbsp;
      <a class="navbar-brand" href="pocetna">ITO</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav animate side-nav">
          <?php if($_SESSION['idtk'] == 1){ ?>
          <li class="nav-item">

            <a class="nav-link" href="pocetna">Gosti
              <span class="sr-only">(current)</span>
            </a>
          </li>
        <?php } ?>
        <?php if($_SESSION['idtk'] == 1){ ?>
          <li class="nav-item">
            <a class="nav-link" href="stanodavci">Stanodavci</a>
          </li>
        <?php } ?>
        <?php if($_SESSION['idtk'] == 1){ ?>
          <li class="nav-item">
            <a class="nav-link" href="iznajmljivanja">Iznajmljivanja</a>
          </li>
        <?php } ?>
        <?php if($_SESSION['idtk'] == 1 || $_SESSION['idtk'] == 3 ){ ?>
          <li class="nav-item">
            <a class="nav-link" href="zaduzenja">Zaduženja</a>
          </li>
        <?php } ?>
        <?php if($_SESSION['idtk'] == 2){ ?>
          <li class="nav-item">
            <a class="nav-link" href="logs">Logovi  </a>
          </li>
          <?php } if($_SESSION['idtk'] == 2){ ?>
          <li class="nav-item">
            <a class="nav-link" href="korisnici">Korisnici</a>
          </li>
        <?php } ?>
        <?php if($_SESSION['idtk'] == 2){ ?>
        <li class="nav-item">
          <a class="nav-link" href="gradovi">Gradovi</a>
        </li>
      <?php } ?>
      <?php if($_SESSION['idtk'] == 2){ ?>
      <li class="nav-item">
        <a class="nav-link" href="drzave">Države</a>
      </li>
    <?php } ?>
        </ul>
        <ul class="navbar-nav ml-md-auto d-md-flex">
          <!--<li class="nav-item">
            <a class="nav-link" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Top Menu Items</a>
          </li> -->
          <li  class="nav-item">
          <span id="username" class="navbar-brand" >  Prijavljeni ste kao: <?php echo $_SESSION['korisnickoIme'] ?> </span> <a href="profil"><img src="img/avatar.png" width="50px"/></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Odjavi me</a>
          </li>
        </ul>
      </div>
    </nav>
