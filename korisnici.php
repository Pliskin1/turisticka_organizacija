<?php
include ('database.php');
session_start();
if(!isset($_SESSION['korisnickoIme'])) {
   header ("Location: index.php");

}
if($_SESSION['idtk'] !=2 ){
   header ("Location: pocetna.php");
}
 ?>
 <!DOCTYPE html>
 <html>
   <head>

     <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
     <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
     <script src="js/index.js"></script>
     <!-- PAST project -->


     <!-- end of past project -->
     <meta charset="utf-8">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


      <link rel="stylesheet" type="text/css" href="css/pocetna.css">
      <link rel="stylesheet" type="text/css" href="css/bootstrap.css"  id="bootstrap-css">
     <link rel="icon" href="img/upd_registration_icon_small.png">
     <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
     <link rel="stylesheet" href="css/datatables.css">

    <link rel="stylesheet" href="css/dataTables.bootstrap4.css">





   <title>Početna</title>





   </head>
   <style>
   body{
    overflow-x: hidden;
   display: inline-block;
   }

  .container{
    margin-left: 100px !important;
    display: inline-block;
  }
  #lblIme{
      color:red;
  }
  #lblPrezime{
      color:red;
  }
  #lblUserName{
      color:red;
  }
  #lblLozinka1{
      color:red;
  }
  #lblLozinka2{
      color:red;
  }
  #lblUloga{
      color:red;
  }

   </style>
   <body>

    <?php include("header.php") ?>

    <br>
    <br>
    <br>
      <h1 align="center" style="font-family:verdana">KORISNICI</h1>
    <div class="container" >

      <div class="row">

         <div class="col-sm-10" style="align:right">
         </div>
        <div class="col-sm-2" style="align:right">
          <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Dodaj Korisnika <img src="img/plus.png?" width="40px;"height="40px"/>  </button>
        </div>
      </div>
<br>
<br>


       <div class="row">




<?php $sql = "SELECT korisnik.idk,korisnik.ime, korisnik.prezime,korisnik.korisnickoIme,korisnik.idtk, korisnik.aktivan
              FROM korisnik ORDER BY korisnik.idk";
      $result = $conn->query($sql);
 ?>

  <div class ="col-md-12 col-md-offset-2" style="width:100%">
    <table id="tabela" class="table table-bordered table-hover" >
      <thead> <tr>
        <th style="text-align:center">Ime</th>
        <th class="not_mapped_style" style="text-align:center">Prezime</th>
        <th class="not_mapped_style" style="text-align:center">Korisnicko ime</th>
        <th class="not_mapped_style" style="text-align:center">Uloga</th>
        <th class="not_mapped_style" style="text-align:center">Status</th>
        <th class="not_mapped_style" style="text-align:center">Izmijeni</th>
        <th class="not_mapped_style" style="text-align:center">Aktiviraj/Deaktiviraj</th>
        <th class="not_mapped_style" style="text-align:center">Izbriši</th>


      </tr>
    </thead>
    <tbody>
   <?php
      $status ="";
      $uloga = "";
      while($row = $result-> fetch_assoc()){

        if($row['aktivan']==1){
          $status = "aktivan";
        }else{
          $status = "deaktiviran";
        }

        if($row['idtk']==1){
          $uloga = "Informator";
        }else if($row['idtk']==2){
          $uloga = "Administrator";
        }else{
          $uloga = "Turistički inspektor";
        }?>

        <tr> <td align='center'> <?php  echo $row['ime'] ?> </td>
             <td align='center'>  <?php echo $row['prezime'] ?> </td>
             <td align='center'> <?php  echo $row['korisnickoIme'] ?> </td>
             <td align='center'> <?php  echo $uloga ?> </td>
             <td align='center'> <?php  echo $status ?></td>
             <td align='center'> <button name='edit' type='button'  data-toggle='modal'  data-target='#izmijeniKorisnika' class='btn btn-info btn-xs edit_data' id="<?php echo $row['idk'];?>">Izmjeni</button> </td>
             <td align='center'> <button name='edit' type='button'  data-toggle='modal'  data-target='#aktivirajKorisnika' class='btn btn-primary btn-xs edit_data' id="<?php echo $row['idk'];?>"> <?php if($row['aktivan'] == 1){ ?>Deaktiviraj<?php }else{?> Aktiviraj <?php } ?></button> </td>
             <td align='center'> <button name='edit' type='button'  data-toggle='modal'  data-target='#izbrisiKorisnika' class='btn btn-danger btn-xs edit_data' id="<?php echo $row['idk'];?>"?>Izbriši</button> </td>
  <?php  }    ?>


    </tbody>

    </table>


  </div>
</div>
</div>

<?php
include("footer.php");

 ?>
 <div id='for_poruka'>

 <div id='popup_poruka' class="col-sm-6 col-sm-offset-3 col-xs-12 col-sm-offset-0" >
   <div class="col-sm-12 col-xs-12 header-popup1" style='padding: 7px;text-align:center; background-color:#1fa67b'> <!-- #00b8ff -->
     <!--<h1 style="color:WHITE">OBAVJEŠTENJE</h1> <!--<img src="img/iks.png" class="img-responsive iks" onclick="close_popup_apliciraj()">-->
   </div>
   <div class="panel-body">
     <div class="row">
       <div class="col-sm-12 paddingforma" style="margin:0 auto;float:none;text-align:center;font-size:18px;color:#4f5055;font-weight:600;margin-bottom:10px;">
         <div id="notificationImage" class="col-sm-4 col-sm-offset-4" style="padding-top: 20px;">
           <img id="slika" src="img/succ.png" style="margin: 0 auto; width: 170px; height: 180px" />
         </div>
         <div class="col-sm-12" style="padding-top: 30px">

           <span id ="message"style="text-align: center; font-weight: 300; font-size: 20px; color: #2e2e2e"><!--Nijeste unijeli korisničko ime i lozinku. <br> Molimo pokušajte ponovo <br>-->
         </div>
         <br>
         <div class="col-sm-5" style="margin: 0 auto; float: none">
           <button id="conformationButton" class="btn btn-success" onclick="close_pop()"><i class="fa fa-check" style="color: white; font-size: 25px;"></i>U REDU</button>
         </div>
       </div>
     </div>
   </div>
 </div>
 </div>

 </div>


 <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <form action="unesi_korisnika.php" method="post" onsubmit="return validateForm()">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Dodaj novog korisnika</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">

        <div class="row">
          <div class="col-sm-5">


          <label> Ime  </label>  <br>  <lable id="lblIme"></lable>

        </div>
        <div class="col-sm-7" >


        <input class="form-control" type="text" name="ime" id="ime">
        </div>

        </div>
        <br>
        <div class="row">
          <div class="col-sm-5">


          <label> Prezime  </label><br><lable id="lblPrezime"></lable>
        </div>
        <div class="col-sm-7" >


        <input  class="form-control" type="text" name="prezime" id="prezime">
        </div>
        </div>

        <br>
        <div class="row">
          <div class="col-sm-5" >


          <label> Korisničko ime  </label><br><lable id="lblUserName"></lable>
        </div>
        <div class="col-sm-7" >


        <input class="form-control" type="text" class="form-control" name="korisnickoIme" id="korisnickoIme" >
        </div>
        </div>
        <br>

        <div class="row">
          <div class="col-sm-5">


          <label> Nova lozinka  </label><br><lable id="lblLozinka1"></lable>
        </div>
        <div class="col-sm-7" >


        <input class="form-control" type="password" class="form-control" name="lozinka" id="lozinka" placeholder="Mora imati najmanje 6 karaktera">
        </div>
        </div>
        <br>
        <div class="row">
          <div class="col-sm-5">


          <label> Nova lozinka  </label><br><lable id="lblLozinka2"></lable>
        </div>
        <div class="col-sm-7" >


        <input class="form-control" type="password" class="form-control" name="lozinka2" id="lozinka2" placeholder="Mora imati najmanje 6 karaktera">
        </div>
        </div>


        <br>


        <div class="row">
          <div class="col-sm-5">


          <label> Uloga  </label><br><lable id="lblUloga"></lable>
        </div>
        <div class="col-sm-7" >



           <select class="form-control" name="uloga" id="uloga">
             <option disabled selected>Izaberite ulogu</option>


               <option value="1">Informator</option>
               <option value="2">Administrator</option>
               <option value="3">Turistički inspektor</option>

           </select>
        </div>
        </div>



       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-danger" data-dismiss="modal">Odustani</button>
         <button type="submit" class="btn btn-success"  value="Unesi">Unesi</button>
       </div>
     </form>
     </div>
   </div>
 </div>
 <!-- Kraj modala -->


 <!-- Modal -->
 <div class="modal fade edit_data" id="izmijeniKorisnika" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <form action="izmijeni_korisnika.php" method="post" onsubmit="return validateFormEdit()">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Izmijeni korisničke podatke</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">

        <div class="row">
          <div class="col-sm-6">


          <label> Ime  </label>  <br>  <lable id="lblImeK"></lable>

        </div>
        <div class="col-sm-6" >


        <input class="form-control" type="text" name="imeK" id="imeK">
        </div>

        </div>
        <br>
        <div class="row">
          <div class="col-sm-6">


          <label> Prezime  </label> <br><lable id="lblPrezimeK"></lable>
        </div>
        <div class="col-sm-6" >


        <input  class="form-control" type="text" name="prezimeK" id="prezimeK">
        </div>
        </div>

        <br>
        <div class="row">
          <div class="col-sm-6" >


          <label> Korisničko ime  </label> <br><lable id="lblUserNameK"></lable>
        </div>
        <div class="col-sm-6" >


        <input class="form-control" type="text" class="form-control"  name="korisnickoImeK" id="korisnickoImeK" >
        </div>
        </div>
        <br>

        <div class="row">
          <div class="col-sm-6">


          <label> Stara Lozinka  </label> <br><lable id="lblLozinkaK"></lable>
        </div>
        <div class="col-sm-6" >


        <input class="form-control" type="password" class="form-control" name="lozinkaK" id="lozinkaK" >
        </div>
        </div>
        <br>

        <div class="row">
          <div class="col-sm-6">


          <label> Nova Lozinka  </label> <br><lable id="lblLozinka1K"></lable>
        </div>
        <div class="col-sm-6" >


        <input class="form-control" type="password" class="form-control" name="lozinkaK1" id="lozinkaK1" >
        </div>
        </div>
        <br>
        <div class="row">
          <div class="col-sm-6">


          <label> Nova Lozinka  </label> <br><lable id="lblLozinka2K"></lable>
        </div>
        <div class="col-sm-6" >


        <input class="form-control" type="password" class="form-control" name="lozinkaK2" id="lozinkaK2" >
        </div>
        </div>
        <br>


        <div class="row">
          <div class="col-sm-6">


          <label> Uloga  </label> <br><lable id="lblUlogaK"></lable>
        </div>
        <div class="col-sm-6" >



           <select class="form-control" name="ulogaK" id="ulogaK">
             <option disabled selected>Izaberite ulogu</option>


               <option value="1">Informator</option>
               <option value="2">Administrator</option>
               <option value="3">Turistički inspektor</option>
           </select>
        </div>
        </div>
       </div>
       <div class="modal-footer">
          <input type="hidden" name="korisnik_id" id="korisnik_id">
         <button type="button" class="btn btn-danger" data-dismiss="modal">Odustani</button>
         <button type="submit" class="btn btn-success"  value="Unesi">Izmijeni</button>
       </div>
     </form>
     </div>
   </div>
 </div>


 <!-- Modal -->
 <div class="modal fade edit_data" id="izbrisiKorisnika" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <form action="izbrisi_korisnika.php" method="post">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Izbriši korisnika</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
        <div class="row">
          <div class="col-sm-6">


          <label> Da li ste sigurni da želite da izbrišete ovog korisnika ?  </label>  <br>  <lable id="lblIme"></lable>

        </div>
        <div class="col-sm-6" >


        <input class="form-control" type="text" class="form-control" disabled name="korisnickoImeB" id="korisnickoImeB" >
        </div>
        </div>

       </div>
       <div class="modal-footer">
          <input type="hidden" name="Bkorisnik_id" id="Bkorisnik_id">
         <button type="button" class="btn btn-danger" data-dismiss="modal">Odustani</button>
         <button type="submit" class="btn btn-success"  >Izbriši</button>
       </div>
     </form>
     </div>
   </div>
 </div>

 <!-- Modal -->
 <div class="modal fade edit_data" id="aktivirajKorisnika" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <form action="aktiviraj_korisnika.php" method="post">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Aktivacija/Deaktivacija korisnika</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
        <div class="row">
          <div class="col-sm-6">


          <label> Da li ste sigurni da želite da promijenite status ovoga korisika?  </label>  <br>  <lable id="lblIme"></lable>

        </div>
        <div class="col-sm-6" >


        <input class="form-control" type="text" class="form-control" disabled name="korisnickoImeA" id="korisnickoImeA" >
        </div>
        </div>

       </div>
       <div class="modal-footer">
          <input type="hidden" name="Akorisnik_id" id="Akorisnik_id">
         <button type="button" class="btn btn-danger" data-dismiss="modal">Odustani</button>
         <button type="submit" class="btn btn-success"  >Promijeni</button>
       </div>
     </form>
     </div>
   </div>
 </div>



 <?php
 if(isset($_GET['insert'])){
  if($_GET['insert']=="success"){ ?>
    <script>
   $('#popup_poruka').slideDown();
   $('#for_poruka').slideDown();
   $('#popup_poruka').show();
   $('#for_poruka').show();
   $('body').css('overflow-y', 'hidden');
   $('#message').html("Uspješno ste unijeli korisnika!");
 </script>
 <?php }} ?>

 <?php
 if(isset($_GET['error'])){
  if($_GET['error']=="oldPass"){ ?>
    <script>
   $('#popup_poruka').slideDown();
   $('#for_poruka').slideDown();
   $('#popup_poruka').show();
   $('#for_poruka').show();
   $("#slika").attr("src","img/iks_red.png");
   $('body').css('overflow-y', 'hidden');
   $('#message').html("Postojeća lozinka nije tačna. Molimo pokušajte ponovo");
 </script>
 <?php }}
 if(isset($_GET['error'])){
 if($_GET['error']=="user"){ ?>
   <script>
  $('#popup_poruka').slideDown();
  $('#for_poruka').slideDown();
  $('#popup_poruka').show();
  $('#for_poruka').show();
  $("#slika").attr("src","img/iks_red.png");
  $('body').css('overflow-y', 'hidden');
  $('#message').html("Unijeto korisničko ime se već nalazi u sistemu. Molimo pokušajte ponovo");
</script>
<?php }} ?>

 <?php
 if(isset($_GET['update'])){
  if($_GET['update']=="success"){ ?>
    <script>
   $('#popup_poruka').slideDown();
   $('#for_poruka').slideDown();
   $('#popup_poruka').show();
   $('#for_poruka').show();
   $('body').css('overflow-y', 'hidden');
   $('#message').html("Uspješno ste izmijenili korisnika !");
 </script>
 <?php }} ?>

 <?php
 if(isset($_GET['error'])){
  if($_GET['error']=="noPass"){ ?>
    <script>
   $('#popup_poruka').slideDown();
   $('#for_poruka').slideDown();
   $('#popup_poruka').show();
   $('#for_poruka').show();
   $("#slika").attr("src","img/iks_red.png");
   $('body').css('overflow-y', 'hidden');
   $('#message').html("Nijeste unijeli neku od lozinki. Molimo pokušajte ponovo");
 </script>
 <?php }} ?>

 <?php
 if(isset($_GET['error'])){
  if($_GET['error']=="newPass"){ ?>
    <script>
   $('#popup_poruka').slideDown();
   $('#for_poruka').slideDown();
   $('#popup_poruka').show();
   $('#for_poruka').show();
   $("#slika").attr("src","img/iks_red.png");
   $('body').css('overflow-y', 'hidden');
   $('#message').html("Nova lozinka se ne poklapa. Molimo pokušajte ponovo");
 </script>
 <?php }} ?>

 <?php
 if(isset($_GET['deaktiv'])){
  if($_GET['deaktiv']=="success"){ ?>
    <script>
   $('#popup_poruka').slideDown();
   $('#for_poruka').slideDown();
   $('#popup_poruka').show();
   $('#for_poruka').show();
   $('body').css('overflow-y', 'hidden');
   $('#message').html("Uspješno ste deaktivirali korisnika!");
 </script>
 <?php }} ?>
 <?php
 if(isset($_GET['aktiv'])){
  if($_GET['aktiv']=="success"){ ?>
    <script>
   $('#popup_poruka').slideDown();
   $('#for_poruka').slideDown();
   $('#popup_poruka').show();
   $('#for_poruka').show();
   $('body').css('overflow-y', 'hidden');
   $('#message').html("Uspješno ste aktivirali korisnika!");
 </script>
 <?php }} ?>
 <?php
 if(isset($_GET['delete'])){
  if($_GET['delete']=="success"){ ?>
    <script>
   $('#popup_poruka').slideDown();
   $('#for_poruka').slideDown();
   $('#popup_poruka').show();
   $('#for_poruka').show();
   $('body').css('overflow-y', 'hidden');
   $('#message').html("Uspješno ste izbrisali korisnika!");
 </script>
 <?php }} ?>


 <script>
 function close_pop(){
   $('#for_poruka').slideUp();
       $('body').css('overflow-y', 'auto');
 }


 </script>



 <script
   src="https://code.jquery.com/jquery-3.3.1.min.js"
   integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
   crossorigin="anonymous"></script>
<script type="text/javascript" src="js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  var table =  $("#tabela").DataTable();
  $(document).on('click','.edit_data',function(){
    var korisnik_id = $(this).attr("id");
    $.ajax({
      url:"fetchUser.php",
      method:"POST",
      data:{korisnik_id:korisnik_id},
      dataType:"json",
      success:function(data){
        $("#imeK").val(data.ime);
        $("#prezimeK").val(data.prezime);
        $("#korisnickoImeK").val(data.korisnickoIme);
        $("#korisnik_id").val(data.idk);
        $("#ulogaK").val(data.idtk);
        $("#aktivirajKorisnika").modal('show');
      }
    });





});


$(document).on('click','.edit_data',function(){
  var korisnik_id = $(this).attr("id");
  $.ajax({
    url:"fetchUser.php",
    method:"POST",
    data:{korisnik_id:korisnik_id},
    dataType:"json",
    success:function(data){
      $("#korisnickoImeB").val(data.korisnickoIme);
      $("#Bkorisnik_id").val(data.idk);
      $("#izbrisiKorisnika").modal('show');

    }
  });
});

$(document).on('click','.edit_data',function(){
  var korisnik_id = $(this).attr("id");
  $.ajax({
    url:"fetchUser.php",
    method:"POST",
    data:{korisnik_id:korisnik_id},
    dataType:"json",
    success:function(data){
      $("#korisnickoImeA").val(data.korisnickoIme);
      $("#Akorisnik_id").val(data.idk);
      $("#izmijeniKorisnika").modal('show');

    }
  });
});

});



function close_pop2(){
  $('#brisanje').slideUp();
      $('body').css('overflow-y', 'auto');
}

function prijavi(idg){
 var temp = idg;
 window.location.href="idGosta.php?idg="+temp;
}

function validateForm(){
  var ime = $("#ime").val();
  var prezime = $("#prezime").val();
  var korisnicko = $("#korisnickoIme").val();
  var novalozinka1 = $("#lozinka").val();
  var novalozinka2 = $("#lozinka2").val();
  var uloga = $("#uloga").val();
  if(ime == ""){
    $("#lblIme").html("*Unesite ime");
    return false;
  }
  if(ime !=""){
    $("#lblIme").html("");
  }
  if(prezime == ""){
    $("#lblPrezime").html("*Unesite prezime");
    return false;
  }
  if(prezime !=""){
    $("#lblPrezime").html("");
  }
  if(korisnicko ==""){
    $("#lblUserName").html("*Unesite korisnicko ime");
    return false;
  }
  if(korisnicko !=""){
    $("#lblUserName").html("");
  }
  if(novalozinka1 ==""){
    $("#lblLozinka1").html("*Unesite lozinku");
    return false;
  }
  if(novalozinka1.length < 6){
    $("#lblLozinka1").html("*Lozinka mora imati najmanje 6 karaktera");
    return false;
  }
  if(novalozinka1 !="" && novalozinka1.length >= 6){
    $("#lblLozinka1").html("");

  }
  if(novalozinka2 ==""){
    $("#lblLozinka2").html("*Unesite lozinku");
    return false;
  }
  if(novalozinka2.length < 6){
    $("#lblLozinka2").html("*Lozinka mora imati najmanje 6 karaktera");
    return false;
  }
  if(novalozinka1 !="" && novalozinka1.length >= 6){
    $("#lblLozinka2").html("");

  }
  if(novalozinka1  != novalozinka2){
    $("#lblLozinka2").html("*Lozinke se moraj poklapati");
    return false;
  }
  if(novalozinka1  == novalozinka2){
    $("#lblLozinka2").html("");
  }
  if(uloga  < 1 ){
    $("#lblUloga").html("*Izaberite ulogu");
    return false
  }
  if(uloga >= 1){
    $("#lblUloga").html("");
  }

}


function validateFormEdit(){
  var imeK = $("#imeK").val();
  var prezimeK = $("#prezimeK").val();
  var korisnickoK = $("#korisnickoImeK").val();
  var staralozinkaK = $("#lozinkaK").val();
  var novalozinka1K = $("#lozinkaK1").val();
  var novalozinka2K = $("#lozinkaK2").val();
  var ulogaK = $("#uloga").val();
  if(imeK == ""){
    $("#lblImeK").html("*Unesite ime");
    return false;
  }
  if(imeK !=""){
    $("#lblImeK").html("");
  }
  if(prezimeK == ""){
    $("#lblPrezimeK").html("*Unesite prezime");
    return false;
  }
  if(prezimeK !=""){
    $("#lblPrezimeK").html("");
  }
  if(korisnickoK ==""){
    $("#lblUserNameK").html("*Unesite korisnicko ime");
    return false;
  }
  if(korisnickoK !=""){
    $("#lblUserNameK").html("");
  }
  if(staralozinkaK ==""){
      $("#lblLozinkaK").html("*Unesite staru lozinku");
      return false;
  }
  if(staralozinkaK !=""){
      $("#lblLozinkaK").html("");
  }
  if(novalozinka1K ==""){
    $("#lblLozinka1K").html("*Unesite lozinku");
    return false;
  }
  if(novalozinka1K.length < 6){
    $("#lblLozinka1K").html("*Lozinka mora imati najmanje 6 karaktera");
    return false;
  }
  if(novalozinka1K !="" && novalozinka1.length >= 6){
    $("#lblLozinka1K").html("");

  }
  if(novalozinka2K == ""){
    $("#lblLozinka2K").html("*Unesite lozinku");
    return false;
  }
  if(novalozinka2K.length < 6){
    $("#lblLozinka2K").html("*Lozinka mora imati najmanje 6 karaktera");
    return false;
  }
  if(novalozinka2K !="" && novalozinka2K.length >= 6){
    $("#lblLozinka2").html("");

  }
  if(novalozinka1K  != novalozinka2K){
    $("#lblLozinka2").html("*Lozinke se morajU poklapati");
    return false;
  }
  if(novalozinka1K  == novalozinka2K){
    $("#lblLozinka2K").html("");
  }
  if(ulogaK  < 1 ){
    $("#lblUlogaK").html("*Izaberite ulogu");
    return false
  }
  if(ulogaK >= 1){
    $("#lblUlogaK").html("");
  }




}
</script>





   </body>
 </html>
