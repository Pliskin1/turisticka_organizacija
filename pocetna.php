<?php
include ('database.php');
session_start();
if(!isset($_SESSION['korisnickoIme'])) {
   header ("Location: index");

}


if($_SESSION['idtk'] == 2 ){
   header ("Location: korisnici");
}
if($_SESSION['idtk'] == 3 ){
   header ("Location: zaduzenja");
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





   <title>Gosti</title>





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
    margin-left: 0px !important;
    display: inline-block;
  }

#lblIme{
color:red;
}
#lblPrezime{
color:red;
}
#lblPol{
color:red;
}
#lblDatum{
color:red;
}
#lblDrzava{
color:red;
}
#lblVrstaIsprave{
  color:red;
}
#lblPutnaIsprava{
  color:red;
}
#lblDatumPutnaIsprava{
  color:red;
}

#lblImeI{
color:red;
}
#lblPrezimeI{
color:red;
}
#lblPolI{
color:red;
}
#lblDatumI{
color:red;
}
#lblDrzavaI{
color:red;
}
#lblVrstaIspraveI{
  color:red;
}
#lblPutnaIspravaI{
  color:red;
}
#lblDatumPutnaIspravaI{
  color:red;
}
footer{
  padding-left: 100px;
}
   </style>
   <body>

    <?php include("header.php") ?>

    <br>
    <br>
    <br>
      <h1 align="center" style="font-family:verdana">GOSTI</h1>
    <div class="container" style="
    margin-left: 105px !important;" >
      <div class="row">

         <div class="col-sm-10" style="align:right">
         </div>
        <div class="col-sm-2" style="align:right">
          <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Dodaj Gosta <img src="img/plus.png?" width="40px;"height="40px"/>  </button>
        </div>
      </div>


      <br>
      <br>


       <div class="row">




<?php $sql = "SELECT gost.idg, gost.pol, gost.vrstaPutneIsprave, gost.ime, gost.prezime, gost.datumRodjenja, drzava.naziv, gost.brojPutneIsprave,gost.datumVazenjaPutneIsprave
              FROM gost, drzava WHERE gost.drzavljanstvo = drzava.idd AND gost.aktivan = 1";
      $result = $conn->query($sql);
 ?>

  <div clas ="col-md-12 col-md-offset-2" style="width:100%">
    <table id="tabela"  class="table table-bordered table-hover" >
      <thead> <tr>
        <th style="text-align:center">Ime</th>
        <th class="not_mapped_style" style="text-align:center">Prezime</th>
                <th class="not_mapped_style" style="text-align:center">Pol</th>
        <th class="not_mapped_style" style="text-align:center">Datum rođenja</th>
        <th class="not_mapped_style" style="text-align:center">Držаvljanstvo</th>
        <th class="not_mapped_style" style="text-align:center">Vrsta putne isprave</th>
        <th class="not_mapped_style" style="text-align:center">Broj putne isprave</th>
        <th class="not_mapped_style" style="text-align:center">Datum važenja putne isprave</th>

        <th class="not_mapped_style" style="text-align:center">Prijavi</th>
        <th class="not_mapped_style" style="text-align:center">Izmjeni</th>
        <th class="not_mapped_style" style="text-align:center">Izbriši</th>

      </tr>
    </thead>
    <tbody>
   <?php

      while($row = $result-> fetch_assoc()){


        if($row['vrstaPutneIsprave'] == 1 ){
          $isprava = "Lična karta";
        }else{
          $isprava = "Pasoš";
        }
        if($row['pol']==1){
          $pol = "Muški";
        }else if($row['pol']==2){
          $pol = "Ženski";
        } ?>


        <tr>
         <td align='center'> <?php echo $row['ime'] ;?> </td>
         <td align='center'> <?php echo $row['prezime']; ?>  </td>
         <td align='center'> <?php echo $pol ?></td>
         <td align='center'> <?php echo $row['datumRodjenja']; ?> </td>
         <td align='center'> <?php echo $row['naziv']; ?></td>
         <td align='center'> <?php echo $isprava ?></td>
         <td align='center'> <?php echo $row['brojPutneIsprave']; ?></td>
         <td align='center'> <?php echo $row['datumVazenjaPutneIsprave'];?></td>
         <td align='center'> <button type='button' class='btn btn-success' onclick='prijavi(<?php echo $row['idg']; ?>)'>Prijavi</button> </td>
         <td align='center'> <button name='edit' type='button'  class='btn btn-info btn-xs edit_data' data-toggle='modal' data-target='#izmijeniGosta' id="<?php echo $row['idg']; ?>"  >Izmjeni</button> </td>
         <td align='center'> <button name='edit' type='button'  class='btn btn-danger btn-xs edit_data' data-toggle='modal' data-target='#izbrisiGosta'  id="<?php echo $row['idg']; ?>">Izbriši</button> </td>
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
       <form action="unesi_gosta.php" method="post" onsubmit="return validateForm()">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Dodaj novog gosta</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">

        <div class="row">
          <div class="col-sm-6">


          <label> Ime  </label>  <br>  <lable  id="lblIme"></lable>

        </div>
        <div class="col-sm-6" >


        <input class="form-control" type="text" name="ime"  id="ime">
        </div>

        </div>
        <br>
        <div class="row">
          <div class="col-sm-6">


          <label> Prezime  </label><br><lable id="lblPrezime"></lable>
        </div>
        <div class="col-sm-6" >


        <input  class="form-control" type="text" onkeyup="this.value=this.value.replace(/[^A-Ž ][^a-ž ]/g,'');" name="prezime" id="prezime">
        </div>
        </div>
        <br>
        <div class="row">
          <div class="col-sm-6">


          <label> Pol  </label><br><lable id="lblPol"></lable>
        </div>
        <div class="col-sm-6" >


        <select name="pol" id="pol" class="form-control">
          <option  disabled selected > Izaberite pol</option>
          <option value="1">Muški</option>
          <option value="2">Ženski</option>
        </select>
        </div>
        </div>

        <br>
        <div class="row">
          <div class="col-sm-6">


          <label> Datum rođenja  </label><br><lable id="lblDatum"></lable>
        </div>
        <div class="col-sm-6" >


        <input class="form-control" type="date" class="form-control"name="datum" id="datum" >
        </div>
        </div>

        <br>


        <br>
        <div class="row">
          <div class="col-sm-6">

            <?php $sql = "SELECT idd, naziv FROM drzava where aktivna =1";
                  $result = $conn -> query($sql);
             ?>
          <label> Državljanstvo  </label><br><lable id="lblDrzava"></lable>
        </div>
        <div class="col-sm-6" >


      <!--  <input class="form-control" type="text" name="grad" value="">
  -->
        <select name="drzava" id="drzava" class="form-control" data-live-search="true"><option disabled selected>
        Izaberite državu</option> <?php   while($row = $result-> fetch_assoc()){  ?> <option value="<?php  echo $row['idd'] ?>"><?php  echo $row['naziv']?></option>
       <?php } ?> </select>

        </div>
        </div>
        <br>
        <div class="row">
          <div class="col-sm-6">


          <label> Vrsta putne isprave  </label><br><lable id="lblVrstaIsprave"></lable>
        </div>
        <div  class="col-sm-6" >


        <select class="form-control" name="vrsta" id="vrsta">
          <option selected disabled>Izaberite vrstu isprave</option>
          <option value="1">Lična karta</option>
          <option value="2">Pasoš</option>
        </select>
        </div>
        </div>
        <br>






        <div class="row">
          <div class="col-sm-6">


          <label> Broj putne isprave  </label><br><lable id="lblPutnaIsprava"></lable>
        </div>
        <div  class="col-sm-6" >


        <input class="form-control" type="text" id="brIsprave" name="brIsprave">
        </div>
        </div>
        <br>
        <div class="row">
          <div class="col-sm-6">


          <label> Datum važenja putne isprave  </label><br><lable id="lblDatumPutnaIsprava"></lable>
        </div>
        <div  class="col-sm-6" >


        <input class="form-control" type="date" name="putnaIsprava" id="putnaIsprava">
        </div>
        </div>



       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-danger" data-dismiss="modal">Odustani</button>
         <button type="submit" class="btn btn-success" id="save">Unesi</button>
       </div>
     </form>
     </div>
   </div>
 </div>
 <!-- end of modal -->
<!-- Modal-->
 <div class="modal fade" id="izmijeniGosta" tabindex="-1" role="dialog" aria-labelledby="izmijeniModal" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <form action="izmijeni_gosta.php" method="post" onsubmit="return validateFormEdit()">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Izmjena podataka</h5>




         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>

         </button>
       </div>
       <div class="modal-body">

         <div class="row">
           <div class="col-sm-6">


           <label> Ime  </label><br><lable id="lblImeI"></lable>
         </div>
         <div  class="col-sm-6" >


         <input class="form-control" type="input" id="imeI" name="imeI">
         </div>
         </div>
         <br>
         <div class="row">
           <div class="col-sm-6">


           <label> Prezime  </label><br><lable id="lblPrezimeI"></lable>
         </div>
         <div  class="col-sm-6" >


         <input class="form-control" type="input" id="prezimeI" name="prezimeI">
         </div>
         </div>
         <br>
         <div class="row">
           <div class="col-sm-6">


           <label> Pol  </label><br><lable id="lblPolI"></lable>
         </div>
         <div class="col-sm-6" >


         <select name="polI" id="polI" class="form-control">
           <option  disabled selected > Izaberite pol</option>
           <option value="1">Muški</option>
           <option value="2">Ženski</option>
         </select>
         </div>
         </div>
         <br>


         <div class="row">
           <div class="col-sm-6">


           <label> Datum rođenja  </label><br><lable id="lblDatumI"></lable>
         </div>
         <div  class="col-sm-6" >


         <input class="form-control" type="date" id="datumI" name="datumI">
         </div>
         </div>
         <br>


         <br>
         <div class="row">
           <div class="col-sm-6">

             <?php $sql = "SELECT idd, naziv FROM drzava WHERE aktivna =1";
                   $result = $conn -> query($sql);
              ?>
           <label> Državljanstvo  </label><br><lable id="lblDrzavaI"></lable>
         </div>
         <div class="col-sm-6" >


       <!--  <input class="form-control" type="text" name="grad" value="">
   -->
         <select name="drzavaI" id="drzavaI" class="form-control" data-live-search="true"><option disabled selected>
         Izaberite državu</option> <?php   while($row = $result-> fetch_assoc()){  ?> <option value="<?php  echo $row['idd'] ?>"><?php  echo $row['naziv']?></option>
        <?php } ?> </select>

         </div>
         </div>
         <br>
         <div class="row">
           <div class="col-sm-6">


           <label> Vrsta putne isprave  </label><br><lable id="lblVrstaIspraveI"></lable>
         </div>
         <div  class="col-sm-6" >


         <select class="form-control" name="vrstaI" id="vrstaI">
           <option selected disabled>Izaberite vrstu isprave</option>
           <option value="1">Lična karta</option>
           <option value="2">Pasoš</option>
         </select>
         </div>
         </div>
         <br>






         <div class="row">
           <div class="col-sm-6">


           <label> Broj putne isprave  </label><br><lable id="lblPutnaIspravaI"></lable>
         </div>
         <div  class="col-sm-6" >


         <input class="form-control" type="text" name="brIspraveI" id="brIspraveI">
         </div>
         </div>
         <br>
         <div class="row">
           <div class="col-sm-6">


           <label> Datum važenja putne isprave  </label><br><lable id="lblDatumPutnaIspravaI"></lable>
         </div>
         <div  class="col-sm-6" >


         <input class="form-control" type="date" name="putnaIspravaI" id="putnaIspravaI">
         </div>
         </div>

       </div>
       <div class="modal-footer">
         <input type="hidden" name="gost_id" id="gost_id">
         <button type="button" class="btn btn-danger" data-dismiss="modal">Odustani</button>
         <button type="submit" class="btn btn-success" id="save">Unesi</button>
       </div>
     </form>
     </div>
   </div>
 </div>
<!-- end of modal -->


<!-- Modal-->
 <div class="modal fade" id="izbrisiGosta" tabindex="-1" role="dialog" aria-labelledby="izmijeniModal" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <form action="izbrisi_gosta.php" method="post">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Brisanje gosta</h5>




         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>

         </button>
       </div>
       <div class="modal-body">

         <div class="row">
           <div class="col-sm-12">


           Da li ste sigurni da želite da izbrišete ovoga gosta ?
         </div>

       </div>
       <br>
         <div class="row">

           <div class="col-sm-6">


           <label> Ime  </label><br><lable id="lblImeB"></lable>
         </div>
         <div  class="col-sm-6" >


         <input class="form-control" type="input" disabled id="imeB" name="imeB">
         </div>
         </div>
         <br>
         <div class="row">
           <div class="col-sm-6">


           <label> Prezime  </label><br><lable id="lblPrezimeB"></lable>
         </div>
         <div  class="col-sm-6" >


         <input class="form-control" type="input" disabled id="prezimeB" name="prezimeB">
         </div>
         </div>
         <br>
         <div class="row">
           <div class="col-sm-6">


           <label> Broj putne isprave  </label><br><lable id="lblPutnaIspravaB"></lable>
         </div>
         <div  class="col-sm-6" >


         <input class="form-control" type="text" disabled name="brIspraveB" id="brIspraveB">
         </div>
         </div>


       </div>
       <div class="modal-footer">
         <input type="hidden" name="Bgost_id" id="Bgost_id">
         <button type="button" class="btn btn-danger" data-dismiss="modal">Odustani</button>
         <button type="submit" class="btn btn-success" id="save">Izbriši</button>
       </div>
     </form>
     </div>
   </div>
 </div>
<!-- end of modal -->








 <?php
 if(isset($_GET['delete'])){
  if($_GET['delete']=="success"){ ?>
    <script>
   $('#popup_poruka').slideDown();
   $('#for_poruka').slideDown();
   $('#popup_poruka').show();
   $('#for_poruka').show();
   $('body').css('overflow-y', 'hidden');
   $('#message').html("Uspješno ste izbrisali gosta!");
 </script>
 <?php }} ?>

 <?php
 if(isset($_GET['insert'])){
  if($_GET['insert']=="success"){ ?>
    <script>
   $('#popup_poruka').slideDown();
   $('#for_poruka').slideDown();
   $('#popup_poruka').show();
   $('#for_poruka').show();
   $('body').css('overflow-y', 'hidden');
   $('#message').html("Uspješno ste unijeli gosta!");
 </script>
 <?php }} ?>
 <?php
 if(isset($_GET['edit'])){
  if($_GET['edit']=="success"){ ?>
    <script>
   $('#popup_poruka').slideDown();
   $('#for_poruka').slideDown();
   $('#popup_poruka').show();
   $('#for_poruka').show();
   $('body').css('overflow-y', 'hidden');
   $('#message').html("Uspješno ste izmijenili gosta!");
 </script>
 <?php }} ?>
 <?php
 if(isset($_GET['error'])){
  if($_GET['error']=="brIsprave"){ ?>
    <script>
   $('#popup_poruka').slideDown();
   $('#for_poruka').slideDown();
   $('#popup_poruka').show();
   $('#for_poruka').show();
   $("#slika").attr("src","img/iks_red.png");
   $('body').css('overflow-y', 'hidden');
   $('#message').html("Broj putne isprave se već nalazi u bazi. Molimo pokušajte ponovo.");
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
    var gost_id = $(this).attr("id");
    $.ajax({
      url:"fetchGuest.php",
      method:"POST",
      data:{gost_id:gost_id},
      dataType:"json",
      success:function(data){
        $("#imeI").val(data.ime);
        $("#prezimeI").val(data.prezime);
        $("#polI").val(data.pol);
        $("#datumI").val(data.datumRodjenja);
        $("#drzavaI").val(data.drzavljanstvo);
        $("#vrstaI").val(data.vrstaPutneIsprave);
        $("#brIspraveI").val(data.brojPutneIsprave);
        $("#putnaIspravaI").val(data.datumVazenjaPutneIsprave);

        $("#unesi").val("Izmijeni");
        $("#gost_id").val(data.idg);
        $("#izmijeniGosta").modal('show');



      }
    });
  });

  $(document).on('click','.edit_data',function(){
    var gost_id = $(this).attr("id");
    $.ajax({
      url:"fetchGuest.php",
      method:"POST",
      data:{gost_id:gost_id},
      dataType:"json",
      success:function(data){
        $("#imeB").val(data.ime);
        $("#prezimeB").val(data.prezime);
        $("#brIspraveB").val(data.brojPutneIsprave);

        $("#unesi").val("Izmijeni");
        $("#Bgost_id").val(data.idg);
        $("#izmijeniGosta").modal('show');



      }
    });
  });


});





function validateForm() {
  var ime = $("#ime").val();
  var prezime = $("#prezime").val();
  var pol = $("#pol").val();
  var datum = $("#datum").val();
  var drzava = $("#drzava").val();
  var vrsta = $("#vrsta").val();
  var brIsprave = $("#brIsprave").val();
  var putnaIsprava = $("#putnaIsprava").val();
  var CurrentDate = new Date();

  var varDate = new Date(datum);
  var today = new Date();
  var datumVazenja = new Date(putnaIsprava);

  today.setHours(0,0,0,0);

  if(ime == ""){
    $("#lblIme").html("*Unesite ime");
    return false;
  }if(ime != ""){
      $("#lblIme").html("");
  }if(prezime ==""){
      $("#lblPrezime").html("*Unesite prezime");
        return false;
  }if(prezime !=""){
      $("#lblPrezime").html("");
  }
  if(pol < 1){
    $("#lblPol").html("*Izaberite pol");
      return false;
  }
  if(pol > 0){
    $("#lblPol").html("");
  }
  if(datum == 0){
      $("#lblDatum").html("*Unesite Datum rođenja");
      return false;
  }
  if(varDate > today){
    $("#lblDatum").html("*Datum ne smije biti u budućnosti");
    return false;
  }
  if(datum != 0){
      $("#lblDatum").html("");
  }
  if(drzava < 1){
      $("#lblDrzava").html("*Izaberite državu");
      return false;
  }
  if(drzava > 1){
      $("#lblDrzava").html("");
  }
  if(vrsta < 1){
    $("#lblVrstaIsprave").html("*Izaberite vrstu putne isprave");
    return false;
  }
  if(vrsta > 0){
      $("#lblVrstaIsprave").html("");
  }
  if(brIsprave == ""){
    $("#lblPutnaIsprava").html("*Unesite broj putne isprave");
    return false;
  }
  if(brIsprave.length != 9 ){
    $("#lblPutnaIsprava").html("*Broj putne isprave mora imati 9 karaktera");
    return false;
  }
  if(brIsprave.length == 9 && brIsprave !=""){
    $("#lblPutnaIsprava").html("");
  }
  if(putnaIsprava == 0){
    $("#lblDatumPutnaIsprava").html("*Unesite datum važenja putne isprave");
  return false;
  }
  if(datumVazenja <= today){
    $("#lblDatumPutnaIsprava").html("*Datum važenja putne isprave mora biti jednak današnjem ili veći");
  return false;
  }
}

function validateFormEdit() {
  var imeI = $("#imeI").val();
  var prezimeI = $("#prezimeI").val();
  var polI = $("#polI").val();
  var datumI = $("#datumI").val();
  var drzavaI = $("#drzavaI").val();
  var vrstaI = $("#vrstaI").val();
  var brIspraveI = $("#brIspraveI").val();
  var putnaIspravaI = $("#putnaIspravaI").val();
  var CurrentDateI = new Date();

  var varDateI = new Date(datumI);
  var todayI = new Date();
  var datumVazenjaI = new Date(putnaIspravaI);

  todayI.setHours(0,0,0,0);

  if(imeI == ""){
    $("#lblImeI").html("*Unesite ime");
    return false;
  }if(imeI != ""){
      $("#lblImeI").html("");
  }if(prezimeI == ""){
      $("#lblPrezimeI").html("*Unesite prezime");
        return false;
  }if(prezimeI !=""){
      $("#lblPrezimeI").html("");
  }
  if(polI < 1){
    $("#lblPolI").html("*Izaberite pol");
      return false;
  }
  if(polI > 0){
    $("#lblPolI").html("");
  }
  if(datumI == 0){
      $("#lblDatumI").html("*Unesite Datum rođenja");
      return false;
  }
  if(varDateI > todayI){
    $("#lblDatumI").html("*Datum ne smije biti u budućnosti");
    return false;
  }
  if(datumI != 0){
      $("#lblDatumI").html("");
  }
  if(drzavaI < 1){
      $("#lblDrzavaI").html("*Izaberite državu");
      return false;
  }
  if(drzavaI > 1){
      $("#lblDrzavaI").html("");
  }
  if(vrstaI < 1){
    $("#lblVrstaIspraveI").html("*Izaberite vrstu putne isprave");
    return false;
  }
  if(vrstaI > 0){
      $("#lblVrstaIspraveI").html("");
  }
  if(brIspraveI == ""){
    $("#lblPutnaIspravaI").html("*Unesite broj putne isprave");
    return false;
  }
  if(brIspraveI.length != 9 ){
    $("#lblPutnaIspravaI").html("*Broj putne isprave mora imati 9 karaktera");
    return false;
  }
  if(brIspraveI.length == 9 && brIspraveI !=""){
    $("#lblPutnaIspravaI").html("");
  }
  if(putnaIspravaI == 0){
    $("#lblDatumPutnaIspravaI").html("*Unesite datum važenja putne isprave");
  return false;
  }
  if(datumVazenjaI <= todayI){
    $("#lblDatumPutnaIspravaI").html("*Datum važenja putne isprave mora biti jednak današnjem ili veći");
  return false;
}
}





</script>

<script>
function prijavi(idg){
 var temp = idg;
 window.location.href="idGosta.php?idg="+temp;
}

</script>



   </body>
 </html>
