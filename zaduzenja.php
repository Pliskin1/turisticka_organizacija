<?php
include ('database.php');
session_start();
if(!isset($_SESSION['korisnickoIme'])) {
   header ("Location: index.php");

 }
 if($_SESSION['idtk'] ==2 ){
    header ("Location: korisnici.php");
 }
 ?>
 <!DOCTYPE html>
 <html>
   <head>




    <!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>-->
     <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

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





   <title>Zaduženja</title>





   </head>
   <style>

   body{
    overflow-x: hidden;
  display: inline-block;
   }

  .container{

    display: inline-block;
  }
  #foot{
    margin-left: 100px !important;
  }
  /* za uklanjanje strjelica kod JMBG polja  */
  input::-webkit-outer-spin-button,
  input::-webkit-inner-spin-button {
    /* display: none; <- Crashes Chrome on hover */
    -webkit-appearance: none;
    margin: 0; /* <-- Apparently some margin are still there even though it's hidden */

  }
   #lblIme{
     color: red;
   }

   #lblPrezime{
     color: red;
   }

   #lblPrezime{
     color: red;
   }

   #lblJmbg{
      color: red;
   }

   #lblAdresa{
      color: red;
   }

   #lblGrad{
       color: red;
   }
   #lblDatum{
     color: red;
   }
   #lblRazduzenje{
     color:red;
   }

   </style>
   <body>

    <?php include("header.php") ?>

    <br>
    <br>
    <br>
      <h1 align="center" style="font-family:verdana">ZADUŽENJA STANODAVACA</h1>
    <div class="container" >
       <!--<div class="row">

          <div class="col-11" style="align:right">
          </div>
         <div class="col-1" style="align:right">
           <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Dodaj Stanodavca <img src="img/plus.png?" width="40px;"height="40px"/>  </button>
         </div>
       </div>-->


<br>
<br>
<div class="row">

<?php $sql = "SELECT grad.naziv,stanodavac.zaduzenje, stanodavac.ids , stanodavac.ime, stanodavac.prezime,stanodavac.jmbg, stanodavac.datumRodjenja, stanodavac.adresa
              FROM stanodavac, grad WHERE stanodavac.aktivan = 1 AND stanodavac.grad=grad.gid AND zaduzenje != 0 ";
      $result = $conn->query($sql);
 ?>

  <div class ="col-md-12 col-md-offset-2" style="width:100%; margin-left:115px" >
    <table id="tabela" class="table table-bordered table-hover">
      <thead> <tr>
        <th style="text-align:center">Ime</th>
        <th class="not_mapped_style" style="text-align:center">Prezime</th>
        <th class="not_mapped_style" style="text-align:center">Datum rođenja</th>
        <th class="not_mapped_style" style="text-align:center">JMBG</th>
        <th class="not_mapped_style" style="text-align:center">Adresa</th>
        <th class="not_mapped_style" style="text-align:center">Grad</th>
        <th class="not_mapped_style" style="text-align:center">Zaduženje</th>
      <?php if($_SESSION['idtk'] == 1){ ?>  <th class="not_mapped_style" style="text-align:center">Razduži</th> <?php } ?>


      </tr>
    </thead>
    <tbody>
   <?php
      $finJmbg =0;

      while($row = $result-> fetch_assoc()){

        if($row['jmbg']!=0){
          $finJmbg = $row['jmbg'];
        }else{
          $finJmbg = "N/A";
        } ?>
        <tr>
            <td align='center'> <?php echo $row['ime'] ?> </td>
            <td align='center'> <?php echo $row['prezime']?>  </td>
            <td align='center'> <?php echo $row['datumRodjenja'] ?></td>
            <td align='center'> <?php echo $row['jmbg']?></td>
            <td align='center'> <?php echo $row['adresa']?></td>
            <td align='center'> <?php echo $row['naziv']?></td>
            <td align='center'> <?php echo $row['zaduzenje']?> &euro; </td>
        <?php if($_SESSION['idtk'] == 1){ ?>     <td align='center'>
  <button type='button' name='edit' value='Razduži' data-toggle='modal' data-target='#exampleModal' class='btn btn-info btn-xs edit_data' id="<?php echo $row['ids']; ?>">Razduži</button> </td> <?php } ?>
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

           <span id ="message"style="text-align: center; font-weight: 300; font-size: 20px; color: #2e2e2e">
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
     <div class="col-sm-4" style="float: none; margin: 0 auto;left: 100px;">
       <div class="panel panel-default" style="background: #e8ebec;padding: 0px 20px 10px 20px; border-radius: 15px">
         <div class="panel-body">
           <!--<div class="row"><button onclick="close_pop2()" type="button" class="close" data-dismiss="modal" aria-hidden="true" style="margin-right: 10px;margin-top: -10px;">×</button>-->
           </div>
              <div class="row">
               <div class="col-sm-12" style="margin:0 auto;float:none;text-align:center;font-size:18px;color:#595a5a;font-weight:600;margin-bottom:30px">


             <span id ="message"> </span>
               </div>
             </div>
             <form method="post" action="delete_landlord.php">
               <input type="hidden" name="id1" id="id1"/>
               <input type="hidden" name="aktivan" id="aktivan"/>
               <div class="row">
                 <div class="col-sm-12">
                   <label>Da li ste sigurni da želite da izbrišete ovog stanodavca ?
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


   <!-- Modal -->
   <div class="modal fade edit_data" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <form action="razduzi.php" method="post" onsubmit="return validateFormEdit()">
         <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">Razduži stanodavca</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body">

          <div class="row">
            <div class="col-sm-6">


            <label> Ime  </label>  <br>  <lable id="lblIme"></lable>

          </div>
          <div class="col-sm-6" >


          <input class="form-control" disabled  type="text" id="ime"name="ime" onkeyup="this.value=this.value.replace(/[^A-Ž ][^a-ž ]/g,'');">
          </div>

          </div>
          <br>
          <div class="row">
            <div class="col-sm-6">


            <label> Prezime  </label><br><lable id="lblPrezime"></lable>
          </div>
          <div class="col-sm-6" >


          <input  class="form-control" type="text" disabled id="prezime" name="prezime" onkeyup="this.value=this.value.replace(/[^A-Ž ][^a-ž ]/g,'');">
          </div>
          </div>

          <br>
          <div class="row">
            <div class="col-sm-6">


            <label> Datum rođenja  </label><br><lable id="lblDatum"></lable>
          </div>
          <div class="col-sm-6" >


          <input class="form-control" type="date" disabled id="datum" class="form-control"name="datum" >
          </div>
          </div>

          <br>
          <div class="row">
            <div class="col-sm-6">


            <label> JMBG  </label><br><lable id="lblJmbg"></lable>
          </div>
          <div  class="col-sm-6" >


          <input class="form-control" type="number" disabled id="jmbg" name="jmbg">
          </div>
          </div>

          <br>
          <div class="row">
            <div class="col-sm-6">


            <label> Adresa  </label><br><lable id="lblAdresa"></lable>
          </div>
          <div class="col-sm-6" >


          <input class="form-control" type="text" disabled id="adresa" name="adresa">
          </div>
          </div>


          <br>
          <div class="row">
            <div class="col-sm-6">


            <label> Grad  </label><br><lable id="lblGrad"></lable>
          </div>
          <div class="col-sm-6" >



          <input name="grad" id="grad" disabled class="form-control" >


          </div>
          </div>
          <br>
          <div class="row">
            <div class="col-sm-6">


            <label> Ukupno zaduženje  </label><br><lable id="lblZaduzenje"></lable>
          </div>
          <div class="col-sm-6" >


          <input class="form-control" type="text" id="zaduzenje" disabled name="zaduzenje">
          </div>
          </div>
          <br>
          <div class="row">
            <div class="col-sm-6">


            <label> Iznos za razduživanje  </label><br><lable id="lblRazduzenje"></lable>
          </div>
          <div class="col-sm-6" >


          <input class="form-control" type="number" id="razduzenje"  name="razduzenje" step=".01">
          </div>
          </div>


         </div>
         <div class="modal-footer">
           <input type="hidden" name="stanodavac_id" id="stanodavac_id">
           <button type="button" class="btn btn-danger" data-dismiss="modal">Odustani</button>
           <input type="submit" class="btn btn-success" name="Unesi"id="unesi" value="Razduži"></button>
         </div>
       </form>
       </div>
     </div>
   </div>

   <!-- end of modal -->









 </div>


 <?php
 if(isset($_GET['delete'])){
  if($_GET['delete']=="success"){ ?>
    <script>
   $('#popup_poruka').slideDown();
   $('#for_poruka').slideDown();
   $('#popup_poruka').show();
   $('#for_poruka').show(30 €);
   $('body').css('overflow-y', 'hidden');
   $('#message').html("Uspješno ste izbrisali stanodavca !");
 </script>
 <?php }} ?>


 <?php if(isset($_GET['insert'])){
 if($_GET['insert']=="success"){ ?>
  <script>
  $('#popup_poruka').slideDown();
  $('#for_poruka').slideDown();
  $('#popup_poruka').show();
  $('#for_poruka').show();
  $('body').css('overflow-y', 'hidden');
  $('#message').html("Uspješno ste unijeli stanodavca !");
  </script>
<?php }} ?>

<?php if(isset($_GET['error'])){
if($_GET['error']=="jmbg"){ ?>
 <script>
 $('#popup_poruka').slideDown();
 $('#for_poruka').slideDown();
 $('#popup_poruka').show();
 $('#for_poruka').show();
 $('body').css('overflow-y', 'hidden');
 $("#slika").attr("src","img/iks_red.png");
 $('#message').html("JMBG koji ste unijeli se već nalazi u sistemu. Molimo pokušajte ponovo");
 </script>
<?php }} ?>

<?php if(isset($_GET['error'])){
if($_GET['error']=="update"){ ?>
 <script>
 $('#popup_poruka').slideDown();
 $('#for_poruka').slideDown();
 $('#popup_poruka').show();
 $('#for_poruka').show();
 $('body').css('overflow-y', 'hidden');
 $("#slika").attr("src","img/iks_red.png");
 $('#message').html("Nijeste unijeli pravilnu vrijednost prilikom razduženja. Molimo pokušajte ponovo");
 </script>
<?php }} ?>

<?php if(isset($_GET['error'])){
if($_GET['error']=="update"){ ?>
 <script>
 $('#popup_poruka').slideDown();
 $('#for_poruka').slideDown();
 $('#popup_poruka').show();
 $('#for_poruka').show();
 $('body').css('overflow-y', 'hidden');
 $("#slika").attr("src","img/iks_red.png");
 $('#message').html("Nijeste unijeli pravilnu vrijednost prilikom razduženja. Molimo pokušajte ponovo");
 </script>
<?php }} ?>

<?php if(isset($_GET['edit'])){
if($_GET['edit']=="success"){ ?>
 <script>
 $('#popup_poruka').slideDown();
 $('#for_poruka').slideDown();
 $('#popup_poruka').show();
 $('#for_poruka').show();
 $('body').css('overflow-y', 'hidden');
 $('#message').html("Uspješno ste razdužili stanodavca !");
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





function izbrisi(idg){

    var temp = idg;
    window.location.href="delete_guest.php?idg="+temp;
    return true;
  }else{
    return false;
  }


}
function close_pop2(){
  $('#brisanje').slideUp();
      $('body').css('overflow-y', 'auto');
}

/*function izbrisi(ids){
 $('#brisanje').slideDown();

 if($("#izbrisi").data('clicked')){
   var temp = ids;
 window.location.href="delete_landlord.php?ids="+temp;
 return true;
 }else{
return false;
 }
}*/
</script>


<script>
  $(document).ready(function(){
  var table =  $("#tabela").DataTable();
    $(document).on('click','.edit_data',function(){
      var stanodavac_id = $(this).attr("id");
      $.ajax({
        url:"fetch.php",
        method:"POST",
        data:{stanodavac_id:stanodavac_id},
        dataType:"json",
        success:function(data){
          $("#ime").val(data.ime);
          $("#prezime").val(data.prezime);
          $("#datum").val(data.datumRodjenja);
          $("#jmbg").val(data.jmbg);
          $("#adresa").val(data.adresa);
          $("#grad").val(data.naziv);
          $("#zaduzenje").val(data.zaduzenje+" €");
          $("#stanodavac_id").val(data.ids);
          //$("#unesi").val("Update");
          $("#exampleModal").modal('show');



        }
      });


});
});

function validateFormEdit() {
  var zaduzenje = $("#razduzenje").val();

  if(zaduzenje == ""){
    $("#lblRazduzenje").html("*Unesite iznos razduženja");
    return false;
  }

}


</script>






   </body>
 </html>
