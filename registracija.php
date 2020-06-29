<?php
include ('database.php');
session_start();
if(!isset($_SESSION['korisnickoIme'])) {
   header ("Location: index.php");

}
$idk = $_SESSION['id'];


if($_SESSION['idtk'] ==2 ){
   header ("Location: korisnici.php");
}
if($_SESSION['idtk'] ==3 ){
   header ("Location: zaduzenja.php");
}


 ?>
 <!DOCTYPE html>
 <html>
   <head>

     <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
     <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
     <script src="js/index.js"></script>
     <!-- PAST project -->
     <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
     <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

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





   <title>Registracija gosta</title>





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

   </style>
   <body>

    <?php include("header.php") ?>

    <br>
    <br>
    <br>
      <h1 align="center" style="font-family:verdana">REGISTRACIJA GOSTA</h1>
    <div class="container" >
       <div class="row">




<?php $sql = "SELECT drzava.naziv, gost.pol, gost.idg ,gost.vrstaPutneIsprave, gost.ime, gost.prezime, gost.datumRodjenja, gost.drzavljanstvo, gost.brojPutneIsprave,gost.datumVazenjaPutneIsprave
              FROM gost , drzava
              WHERE aktivan = 1 AND gost.drzavljanstvo= drzava.idd  AND  gost.idg=".$_SESSION['sky'] ;
      $result = $conn->query($sql);
 ?>

  <div clas ="col-md-8 col-md-offset-2" style="width:100%">
    <table  class="table table-bordered" >
      <thead> <tr>
        <th style="text-align:center">Ime</th>
        <th class="not_mapped_style" style="text-align:center">Prezime</th>
        <th class="not_mapped_style" style="text-align:center">Pol</th>
        <th class="not_mapped_style" style="text-align:center">Datum rođenja</th>
        <th class="not_mapped_style" style="text-align:center">Državljanstvo</th>
        <th class="not_mapped_style" style="text-align:center">Vrsta putne isprave</th>
        <th class="not_mapped_style" style="text-align:center">Broj putne isprave</th>
        <th class="not_mapped_style" style="text-align:center">Datum važenja putne isprave</th>


      </tr>
    </thead>
    <tbody>
   <?php
      $finJmbg =0;


      $row = $result-> fetch_assoc();

        if($row['vrstaPutneIsprave'] == 1 ){
          $isprava = "Lična karta";
        }else{
          $isprava = "Pasoš";
        }
        if($row['pol']==1){
          $pol = "Muški";
        }else if($row['pol']==2){
          $pol = "Ženski";
        }

         ?>
        <tr> <td align='center'> <?php echo $row['ime'] ?> </td>
        <td align='center'>  <?php echo $row['prezime']?>  </td>
        <td align='center'>  <?php echo $pol?>  </td>
        <td align='center'> <?php echo $row['datumRodjenja']?> </td>
        <td align='center'> <?php echo $row['naziv'] ?></td>
        <td align='center'> <?php echo $isprava ?></td>
        <td align='center'><?php echo $row['brojPutneIsprave'] ?></td>
        <td align ='center'><?php echo $row['datumVazenjaPutneIsprave']  ?> </td>
        <?php $_SESSION['vrstaIsprave'] = $row['vrstaPutneIsprave']; ?>






    </tbody>

    </table>


    <table  class="table table-bordered table-hover" >
      <thead> <tr>
        <th style="text-align:center">Datum prijave</th>
        <th class="not_mapped_style" style="text-align:center">Datum odjave</th>

        <th class="not_mapped_style" style="text-align:center">Oslobođen plaćanja</th>
        <th class="not_mapped_style" style="text-align:center">Stanodavac</th>
        <th class="not_mapped_style" style="text-align:center">Prijavi</th>

      </tr>
    </thead>
    <tbody>

      <?php

      $sql2 = "SELECT stanodavac.ids,stanodavac.ime, stanodavac.prezime,stanodavac.adresa, stanodavac.jmbg
       from stanodavac where aktivan = 1 order by ime ASC ";
      $result2 = $conn->query($sql2);

       $currentYear = date('Y:d');
            $birthYear = date('Y:d', strtotime($row['datumRodjenja']));
            $fin = $currentYear - $birthYear;

            //echo $fin;

            $_SESSION['godine'] = $fin;

       ?>

<form action='finalRegistracija.php' method="POST"  >
        <tr>
           <td align='center'><input type="date" class='form-control' name='prijava'>  </td>
             <td align='center'><input type="date" class='form-control' name="odjava">  </td>
      <!--       <td align='center'><input type="text" class='form-control'name="taksa" id = "text1"value=" &euro;" disabled>  </td> -->
             <td align='center'> <input type="checkbox" name="oslobodjenPlacanja" class="form-control"   id="checkbox1" > </td>
             <td align='center'><select name="stanodavac" class='form-control'><option disabled selected>
             Izaberite stanodavca</option> <?php   while($row2 = $result2-> fetch_assoc()){  ?> <option value="<?php  echo $row2['ids'] ?>"><?php  echo $row2['ime']." ".$row2['prezime']."(".$row2['jmbg'].") ".$row2['adresa'] ?></option>
            <?php } ?> </select> </td>
             <td align='center'> <button type='input' class='btn btn-success' >Prijavi</button> </td>
        </tr>
</form>




</tbody>

</table>

<h1><?php // echo  $idk ." ".  $currentYear. " ".date('Y', strtotime($row['datumRodjenja']))?></h1>
<h2><?php // echo $_SESSION['cijena'] ?></h2>


  </div>
</div>
</div>

<?php
include("footer.php");

 ?>
 <div id='for_poruka'>

 <div id='popup_poruka' class="col-sm-6 col-sm-offset-3 col-xs-12 col-sm-offset-0" >
   <div id="bojaZaglavlja" class="col-sm-12 col-xs-12 header-popup1" style='padding: 7px;text-align:center; background-color:#1fa67b'> <!-- #00b8ff -->
     <!--<h1 style="color:WHITE">OBAVJEŠTENJE</h1> <!--<img src="img/iks.png" class="img-responsive iks" onclick="close_popup_apliciraj()">-->
   </div>
   <div class="panel-body">
     <div class="row">
       <div class="col-sm-12 paddingforma" style="margin:0 auto;float:none;text-align:center;font-size:18px;color:#4f5055;font-weight:600;margin-bottom:10px;">
         <div id="notificationImage" class="col-sm-4 col-sm-offset-4" style="padding-top: 20px;">
           <img id ="slika" src="img/succ.png" style="margin: 0 auto; width: 170px; height: 180px" />
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


 <?php
 if(isset($_GET['insert'])){
  if($_GET['insert']=="success"){ ?>
    <script>
   $('#popup_poruka').slideDown();
   $('#for_poruka').slideDown();
   $('#popup_poruka').show();
   $('#for_poruka').show();
   $('body').css('overflow-y', 'hidden');
   $('#message').html("Uspješno ste prijavili gosta!");
 </script>
 <?php }} ?>

 <?php
 if(isset($_GET['error'])){
  if($_GET['error']=="stanodavac"){ ?>
    <script>
   $('#popup_poruka').slideDown();
   $('#for_poruka').slideDown();
   $('#popup_poruka').show();
   $('#for_poruka').show();
   $("#slika").attr("src","img/iks_red.png");
   $('body').css('overflow-y', 'hidden');
   $('#message').html("Nijeste izabrali stanodavca.Molimo pokušajte ponovo !");
 </script>
 <?php }} ?>
 <?php
 if(isset($_GET['error'])){
  if($_GET['error']=="licnaKarta"){ ?>
    <script>
   $('#popup_poruka').slideDown();
   $('#for_poruka').slideDown();
   $('#popup_poruka').show();
   $('#for_poruka').show();
   $("#slika").attr("src","img/iks_red.png");
   $('body').css('overflow-y', 'hidden');
   $('#message').html("Gosti koji se prijavljuju sa ličnom kartom ne mogu biti prijavljeni na više od 30 dana. Molimo pokušajte ponovo");
 </script>
 <?php }} ?>
 <?php
 if(isset($_GET['error'])){
  if($_GET['error']=="pasos"){ ?>
    <script>
   $('#popup_poruka').slideDown();
   $('#for_poruka').slideDown();
   $('#popup_poruka').show();
   $('#for_poruka').show();
   $("#slika").attr("src","img/iks_red.png");
   $('body').css('overflow-y', 'hidden');
   $('#message').html("Gosti koji se prijavljuju sa pasošem ne mogu biti prijavljeni na više od 90 dana. Molimo pokušajte ponovo");
 </script>
 <?php }} ?>

 <?php
 if(isset($_GET['error'])){
  if($_GET['error']=="date"){ ?>
    <script>
   $('#popup_poruka').slideDown();
   $('#for_poruka').slideDown();
   $('#popup_poruka').show();
   $('#for_poruka').show();
   $("#slika").attr("src","img/iks_red.png");
   $("#bojaZaglavlja").attr("background-color","#fe0000");
   $('body').css('overflow-y', 'hidden');
   $('#message').html("Datum prijave mora manji od datuma odjave.Molimo pokušajte ponovo !");
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
//  $(".table").DataTable();

});

$("#checkbox1").click(function () {
    if ($(this).prop("checked")) {
        $("#text1").val("0 €");

    }
    else {
        $("#text1").val("<?php //echo$price ?> €");

    }
});


/*$('#checkbox1').is(':checked'){
    $("#text1").val("0 €");
}else{
    $("#text1").val("<?php// echo $price ?> €");
}*/



/*function izbrisi(idg){
  if(confirm("Da li ste sigurni da želite da izbrišete ovog gosta ?") == true) {
    var temp = idg;
    window.location.href="delete_guest.php?idg="+temp;
    return true;
  }else{
    return false;
  }


}*/
function close_pop2(){
  $('#brisanje').slideUp();
      $('body').css('overflow-y', 'auto');
}

function registruj(idiz){
 var temp = idiz;
 window.location.href="finalRegistracija.php?idg="+idiz;
}

function izbrisi(idg){
 $('#brisanje').slideDown();
 var idg = idg;
 if($("#izbrisi").data('clicked')){
 window.location.href="delete_guest.php?idg="+temp;
 return true;
 }else{
return false;
 }
}



/*window.onload = function obracun(){
    var checkbox = document.getElementById('oslobodjenPlacanja');
  if (checkbox.checked == true){
    document.getElementById('taksa').value() = 0;
}
}*/



/*window.onload = function () {
    var input = document.querySelector('input[type=checkbox]');

    function obracun() {
        var a = input.checked ? "checked" : "not checked";
        document.getElementById('taksa').innerHTML =  a;
    }
    input.onchange = check;
    obracun();
}*/
</script>





   </body>
 </html>
