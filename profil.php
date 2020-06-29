<?php
include ('database.php');
session_start();
if(!isset($_SESSION['korisnickoIme'])) {
   header ("Location: index.php");

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





   <title>Profil</title>





   </head>
   <style>
   body{
    overflow-x: hidden;
   display: inline-block;
   }

   /* za uklanjanje strjelica kod JMBG polja  */
   input::-webkit-outer-spin-button,
   input::-webkit-inner-spin-button {
     /* display: none; <- Crashes Chrome on hover */
     -webkit-appearance: none;
     margin: 0; /* <-- Apparently some margin are still there even though it's hidden */

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
#lblKorisnickoIme{
 color:red;
}
#lblStaraLozinka{
 color:red;
}
#lblNovaLozinka{
 color:red;
}
#lblNovaLozinka1{
  color: red;
}
/*  Placeholder da bude italic*/
::-webkit-input-placeholder {
   font-style: italic;
}
:-moz-placeholder {
   font-style: italic;
}
::-moz-placeholder {
   font-style: italic;
}
:-ms-input-placeholder {
   font-style: italic;
}
/* */

   </style>
   <body>

    <?php include("header.php") ?>

    <br>
    <br>
    <br>
      <h1 align="center" style="font-family:verdana">PROFIL</h1>
    <div class="container" >



      <br>
      <br>


       <div class="row">



         <?php $sql = "SELECT idtk, idk , ime, prezime, korisnickoIme
          FROM korisnik
          WHERE idk = ".$_SESSION['id']."";
                        $result = $conn -> query($sql);
                        $row = $result -> fetch_assoc();

                        if($row['idtk'] == 1){
                          $uloga = "Informator";
                        }else if ($row['idtk'] == 2){
                          $uloga = "Administrator";
                        }else{
                          $uloga = "Turistički inspektor";
                        }

          ?>
  <div clas ="col-md-8 col-md-offset-2" style="width:100%">

    <div class="row">

      <div class="col-sm-12" align="middle">
          <img src="img/avatar.png" width="120px"/>
      </div>


    </div>
    <br>

    <div class="row" align="middle">
            <div class="col-sm-12"><button type="button"  data-toggle="modal" data-target="#promjenaPodataka" name="promjenaPodataka" class="btn btn-info">Izmijeni podatke <img src="img/update.png" width="30px"></button></div>

    </div>

          <br>
          <br>


    <div class="row" align="right">
            <div class="col-sm-6"><label>Ime</label></div>
            <div class="col-sm-6" align="left"> <label><?php echo $row['ime'] ?></label></div>
    </div>

    <div class="row" align="right">
            <div class="col-sm-6"><label>Prezime</label></div>
            <div class="col-sm-6" align="left"><label><?php echo $row['prezime'] ?></label></div>
    </div>


    <div class="row" align="right">
            <div class="col-sm-6"><label>Korisničko ime</label></div>
            <div class="col-sm-6" align="left"><label> <?php echo $row['korisnickoIme'] ?></label></div>
    </div>

    <div class="row" align="right">
            <div class="col-sm-6"><label>Uloga</label></div>
            <div class="col-sm-6" align="left"><?php echo $uloga?></div>
    </div>

    <div class="row" align="right">
            <div class="col-sm-12" ><label style="color:white">"Sed ut perspiciatis undeaaa saddsadsa,sadsadsadsa"</label></div>

    </div>


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
           <img id="slika"src="img/succ.png" style="margin: 0 auto; width: 170px; height: 180px" />
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


 <div style="display: none; background: rgba(0,0,0,0.78);position: fixed;top: 0;bottom: 0; left: 0;right: 0; z-index: 1000" id="brisanje">
   <div class="container" style="padding-top: 150px;">
     <div class="col-sm-4" style="float: none; margin: 0 auto;">
       <div class="panel panel-default" style="background: #e8ebec;padding: 0px 20px 10px 20px; border-radius: 15px">
         <div class="panel-body">
           <!--<div class="row"><button onclick="close_pop2()" type="button" class="close" data-dismiss="modal" aria-hidden="true" style="margin-right: 10px;margin-top: -10px;">×</button>-->
           </div>
              <div class="row">
               <div class="col-sm-12" style="margin:0 auto;float:none;text-align:center;font-size:18px;color:#595a5a;font-weight:600;margin-bottom:30px">


             <span id ="message"> </span>
               </div>
             </div>
             <form method="post" action="delete_guest.php">
               <input type="hidden" name="id1" id="id1"/>
               <input type="hidden" name="aktivan" id="aktivan"/>
               <div class="row">
                 <div class="col-sm-12">
                   <label>Da li ste sigurni da želite da izbrišete ovog gosta ?
                 </div>
               </div>

               <div class="row" style="margin-top:10px">
                 <div class="col-sm-6" >
                   <input type="submit" class="btn dugme-reg"  name="izbrisi" id="izbrisi" value="Potvrdi" style="width:100%;color:#fff;background: #07b7ad;">
                 </div>
                 <div class="col-sm-6">
                   <input type="button" class="btn dugme-reg"  name="odustani1" id="odustani1" value="Odustani" style="width:100%;color:#fff;background: #F44336;" onclick="close_pop2()">
                 </div>
               </div>
             </form>
         </div>
       </div>
     </div>

   </div>
 </div>



 <!-- Modal -->
 <div class="modal fade" id="promjenaPodataka" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <form method="post" action="izmijeni_profil.php" onsubmit="return validateForm()">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Izmjena korisničkih podataka</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <div class="row">
           <div class="col-sm-5">


           <label> Ime  </label><br><lable id="lblIme"></lable>
         </div>
         <div  class="col-sm-7" >


         <input class="form-control" type="text" id="ime" name="ime" value="<?php echo $row['ime'] ?>">
         </div>
         </div>

         <br>
         <div class="row">
           <div class="col-sm-5">


           <label> Prezime  </label><br><lable id="lblPrezime"></lable>
         </div>
         <div  class="col-sm-7" >


         <input class="form-control" type="text" id ="prezime" name="prezime" value="<?php echo $row['prezime'] ?>">
         </div>
         </div>
         <br>
         <div class="row">
           <div class="col-sm-5">


           <label> Korisničko ime  </label><br><lable id="lblKorisnickoIme"></lable>
         </div>
         <div  class="col-sm-7" >


         <input class="form-control" type="text" id ="korisnickoIme" name="korisnickoIme" value="<?php echo $row['korisnickoIme'] ?>">
         </div>
         </div>
         <br>
         <div class="row">
           <div class="col-sm-5">


           <label> Stara lozinka  </label><br><lable id="lblStaraLozinka"></lable>
         </div>
         <div  class="col-sm-7" >


         <input class="form-control" type="password"  id="staraLozinka" name="staraLozinka" >
         </div>
         </div>
         <br>
         <div class="row">
           <div class="col-sm-5">


           <label> Nova lozinka  </label><br><lable id="lblNovaLozinka"></lable>
         </div>
         <div  class="col-sm-7" >


         <input class="form-control" type="password" id="novaLozinka" name="novaLozinka" value="" placeholder="Mora imati najmanje 6 karaktera">
         </div>
         </div>
         <br>
         <div class="row">
           <div class="col-sm-5">


           <label> Nova lozinka  </label><br><lable id="lblNovaLozinka1"></lable>
         </div>
         <div  class="col-sm-7" >


         <input class="form-control" type="password" id="novaLozinka1" name="novaLozinka1" value="" placeholder="Mora imati najmanje 6 karaktera">
         </div>
         </div>




       </div>
       <div class="modal-footer">
       </form>
         <button type="button" class="btn btn-danger" data-dismiss="modal">Odustani</button>
         <input type="submit" class="btn btn-success"  value="Promijeni" ></button>
       </div>

     </div>
   </div>
 </div>


 <?php
 if(isset($_GET['update'])){
  if($_GET['update']=="success"){ ?>
    <script>
   $('#popup_poruka').slideDown();
   $('#for_poruka').slideDown();
   $('#popup_poruka').show();
   $('#for_poruka').show();
   $('body').css('overflow-y', 'hidden');
   $('#message').html("Uspješno ste izmijenili podatke!");
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
   $('body').css('overflow-y', 'hidden');
   $("#slika").attr("src","img/iks_red.png");
   $('#message').html("Lozinka koju ste unijeli kao postojeću se ne poklapa u bazi. Pokušajte ponovo");
 </script>
 <?php }else{?>
   <script>
  $('#popup_poruka').slideDown();
  $('#for_poruka').slideDown();
  $('#popup_poruka').show();
  $('#for_poruka').show();
  $('body').css('overflow-y', 'hidden');
  $("#slika").attr("src","img/iks_red.png");
  $('#message').html("Korisničko ime je već u upotrebi. Molimo izaberite pokušajte ponovo");
</script>

<?php  } }?>


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
<script>



function close_pop2(){
  $('#brisanje').slideUp();
      $('body').css('overflow-y', 'auto');
}




</script>

<script>
function validateForm(){

var ime = $("#ime").val();
var prezime = $("#prezime").val();
var korisnickoIme = $("#korisnickoIme").val();
var staraLozinka = $("#staraLozinka").val();
var novaLozinka = $("#novaLozinka").val();
var novaLozinka1 = $("#novaLozinka1").val();
if(ime == ""){
    $("#lblIme").html("*Unesite ime");
    return false;
}
  if(ime != ""){
  $("#lblIme").html("");
}
if(prezime == ""){
    $("#lblPrezime").html("*Unesite prezime");
    return false;
}
if(prezime != ""){
  $("#lblPrezime").html("");
}
if(korisnickoIme ==""){
  $("#lblKorisnickoIme").html("*Unesite korisnicko ime");
  return false;

}
if(korisnickoIme !=""){
  $("#lblKorisnickoIme").html("");
}
if(staraLozinka ==""){
  $("#lblStaraLozinka").html("*Unesite lozinku");
  return false;
}
if(staraLozinka !=""){
  $("#lblStaraLozinka").html("");
}
if(novaLozinka ==""){
  $("#lblNovaLozinka").html("*Unesite lozinku");
  return false;
}
if(novaLozinka.length < 6){
  $("#lblNovaLozinka").html("*Lozinka mora imati najmanje 6 karaktera");
  return false;
}
if(novaLozinka !="" && novaLozinka.length >=6 ){
  $("#lblNovaLozinka").html("");

}

if(novaLozinka1 ==""){
  $("#lblNovaLozinka1").html("*Unesite lozinku");
  return false;
}
if(novaLozinka1.length < 6){
  $("#lblNovaLozinka1").html("*Lozinka mora imati najmanje 6 karaktera");
  return false;
}


if(novaLozinka1 !="" && novaLozinka1.length >=6 ){
  $("#lblNovaLozinka1").html("");

}

if(novaLozinka != novaLozinka1){
  $("#lblNovaLozinka1").html("*Lozinke se ne poklapaju");
  return false;
}
if(novaLozinka != novaLozinka1){
  $("#lblNovaLozinka1").html("");

}

}
</script>



   </body>
 </html>
