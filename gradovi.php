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





   <title>Gradovi</title>





   </head>
   <style>

   /* za uklanjanje strjelica kod JMBG polja  */
   input::-webkit-outer-spin-button,
   input::-webkit-inner-spin-button {
     /* display: none; <- Crashes Chrome on hover */
     -webkit-appearance: none;
     margin: 0; /* <-- Apparently some margin are still there even though it's hidden */

   }



   body{
    overflow-x: hidden;
   display: inline-block;
   }

  .container{
    margin-left: 100px !important;
    display: inline-block;
  }
#lblNaziv{
  color:red;
}
 #lblMTaksa{
   color:red;
 }
  #lblPTaksa{
    color:red;
  }
  #lblNazivP{
    color:red;
  }
   #lblMTaksaP{
     color:red;
   }
    #lblPTaksaP{
      color:red;
    }

   </style>
   <body>

    <?php include("header.php") ?>

    <br>
    <br>
    <br>
      <h1 align="center" style="font-family:verdana">GRADOVI</h1>
    <div class="container" >

      <div class="row">

         <div class="col-sm-10" style="align:right">
         </div>
        <div class="col-sm-2" style="align:right">
          <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Dodaj Grad <img src="img/plus.png?" width="40px;"height="40px"/>  </button>
        </div>
      </div>
<br>
<br>


       <div class="row">




<?php $sql = "SELECT gid, naziv, boravisnaTaksaMaloljetni, boravisnaTaksaPunoljetni FROM grad where aktivan = 1 ";
      $result = $conn->query($sql);
 ?>

  <div class ="col-md-12 col-md-offset-2" style="width:100%">
    <table id="tabela"  class="table table-bordered table-hover" >
      <thead> <tr>
        <th style="text-align:center">Naziv</th>
        <th class="not_mapped_style" style="text-align:center;width: 27%!important">Boravišna taksa za maloljetna lica</th>
        <th class="not_mapped_style" style="text-align:center;width: 27%!important">Boravišna taksa za punoljetna lica</th>
        <th class="not_mapped_style" style="text-align:center">Izmijeni</th>
        <th class="not_mapped_style" style="text-align:center">Izbriši</th>


      </tr>
    </thead>
    <tbody>
   <?php

      while($row = $result-> fetch_assoc()){?>
        <tr>
          <td align='center'> <?php  echo $row['naziv'] ?> </td>
          <td align='center'> <?php  echo $row['boravisnaTaksaMaloljetni']?> &euro;  </td>
          <td align='center'> <?php  echo $row['boravisnaTaksaPunoljetni']?> &euro; </td>
          <td align='center'> <button name='edit' type='button'  data-toggle='modal'  data-target='#izmijeniGrad' class='btn btn-info btn-xs edit_data' id="<?php echo $row['gid']; ?>" >Izmjeni</button> </td>
          <td align='center'> <button name='edit' type='button' data-toggle='modal'  data-target='#izbrisiGrad' class='btn btn-danger btn-xs edit_data' id="<?php echo $row['gid']?>" >Izbriši</button> </td>
  <?  }    ?>


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
                   <label>Da li ste sigurni da želite da izbrišete ovog informatora ?
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
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <form action="unesi_grad.php" method="post" onsubmit="return validateForm()">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Dodaj novi grad</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">

        <div class="row">
          <div class="col-sm-6">


          <label> Naziv  </label>  <br>  <lable id="lblNaziv"></lable>

        </div>
        <div class="col-sm-6" >


        <input class="form-control" type="text" name="naziv" id="naziv" onkeyup="this.value=this.value.replace(/[^A-Ž ][^a-ž ]/g,'');">
        </div>

        </div>
        <br>
        <div class="row">
          <div class="col-sm-6">


          <label> Boravišna taksa za maloljetna lica  </label><lable id="lblMTaksa"></lable>
        </div>
        <div class="col-sm-6" >


        <input  class="form-control" type="number" name="boravisnaTaksaMaloljetni" id="boravisnaTaksaMaloljetni" step=".01">
        </div>
        </div>

        <br>
        <div class="row">
          <div class="col-sm-6">


          <label> Boravišna taksa za punoljetna lica  </label><lable id="lblPTaksa"></lable>
        </div>
        <div class="col-sm-6" >


        <input class="form-control" type="number" name="boravisnaTaksaPunoljetni" id="boravisnaTaksaPunoljetni" step=".01">
        </div>
        </div>
        <br>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-danger" data-dismiss="modal">Odustani</button>
         <button type="submit" class="btn btn-success" id="save">Unesi</button>
       </div>
     </form>
     </div>
   </div>
 </div>
 <!-- End of modal -->


 <!-- Modal -->
 <div class="modal fade edit_data" id="izmijeniGrad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <form action="izmijeni_grad.php" method="post" onsubmit="return validateFormEdit()">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Izmijeni grad</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">

        <div class="row">
          <div class="col-sm-6">


          <label> Naziv  </label>  <br>  <lable id="lblNazivP"></lable>

        </div>
        <div class="col-sm-6" >


        <input class="form-control" type="text" name="nazivP" id="nazivP" onkeyup="this.value=this.value.replace(/[^A-Ž ][^a-ž ]/g,'');">
        </div>

        </div>
        <br>
        <div class="row">
          <div class="col-sm-6">


          <label> Boravišna taksa za maloljetna lica  </label><lable id="lblMTaksaP"></lable>
        </div>
        <div class="col-sm-6" >


        <input  class="form-control" type="number" name="boravisnaTaksaMaloljetniP" id="boravisnaTaksaMaloljetniP" step=".01">
        </div>
        </div>

        <br>
        <div class="row">
          <div class="col-sm-6">


          <label> Boravišna taksa za punoljetna lica  </label><lable id="lblPTaksaP"></lable>
        </div>
        <div class="col-sm-6" >


        <input class="form-control" type="number" name="boravisnaTaksaPunoljetniP" id="boravisnaTaksaPunoljetniP" step=".01">
        </div>
        </div>
        <br>
       </div>
       <div class="modal-footer">
         <input type="hidden" name="grad_id" id="grad_id">
         <button type="button" class="btn btn-danger" data-dismiss="modal">Odustani</button>
         <button type="submit" class="btn btn-success" id="save">Izmijeni</button>
       </div>
     </form>
     </div>
   </div>
 </div>
 <!-- End of modal -->


 <!-- Modal -->
 <div class="modal fade edit_data" id="izbrisiGrad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <form action="izbrisi_grad.php" method="post">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Izbriši grad</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">

        <div class="row">
          <div class="col-sm-6">


          <label> Da li ste sigurni da želite da izbrišete ovaj grad ?  </label>  <br>  <lable id="lblNaziv"></lable>

        </div>
        <div class="col-sm-6" >


        <input class="form-control" disabled type="text" name="nazivGB" id="nazivGB" >
        </div>

        </div>


       </div>
       <div class="modal-footer">
         <input type="hidden" name="Bgrad_id" id="Bgrad_id">
         <button type="button" class="btn btn-danger" data-dismiss="modal">Odustani</button>
         <button type="submit" class="btn btn-success" id="save">Izbriši</button>
       </div>
     </form>
     </div>
   </div>
 </div>
 <!-- End of modal -->



 <?php
 if(isset($_GET['error'])){
  if($_GET['error']=="city"){ ?>
    <script>
   $('#popup_poruka').slideDown();
   $('#for_poruka').slideDown();
   $('#popup_poruka').show();
   $('#for_poruka').show();
   $("#slika").attr("src","img/iks_red.png");
   $('body').css('overflow-y', 'hidden');
   $('#message').html("Grad sa ovim imenom se već nalazi u bazi. Molimo pokušajte ponovo.");
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
   $('#message').html("Uspješno ste izmijenili grad !");
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
   $('#message').html("Uspješno ste dodali grad !");
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
   $('#message').html("Uspješno ste izbrisali grad !");
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
    var grad_id = $(this).attr("id");
    $.ajax({
      url:"fetchCity.php",
      method:"POST",
      data:{grad_id:grad_id},
      dataType:"json",
      success:function(data){
        $("#nazivP").val(data.naziv);
        $("#boravisnaTaksaMaloljetniP").val(data.boravisnaTaksaMaloljetni);
        $("#grad_id").val(data.gid);
        $("#boravisnaTaksaPunoljetniP").val(data.boravisnaTaksaPunoljetni);
        $("#unesi").val("Izmijeni");
       $("#izmijeniGrad").modal('show');



      }
    });
  });

  $(document).on('click','.edit_data',function(){
    var grad_id = $(this).attr("id");
    $.ajax({
      url:"fetchCity.php",
      method:"POST",
      data:{grad_id:grad_id},
      dataType:"json",
      success:function(data){
        $("#nazivGB").val(data.naziv);
        $("#Bgrad_id").val(data.gid);
        $("#unesi").val("Izbriši");
       $("#izbrisiGrad").modal('show');



      }
    });
  });


});




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




</script>

<script>
function validateForm(){
 var naziv = $("#naziv").val();
 var maloT = $("#boravisnaTaksaMaloljetni").val();
 var punoT = $("#boravisnaTaksaPunoljetni").val();


 if(naziv == ""){
     $("#lblNaziv").html("*Unesite naziv");
     return false;
 }if(naziv != ""){
   $("#lblNaziv").html("");
 }if(maloT ==""){
    $("#lblMTaksa").html("*Unesite taksu za maloljetne");
    return false;
 }if(maloT !=""){
    $("#lblMTaksa").html("");
 }if(punoT ==""){
    $("#lblPTaksa").html("*Unesite taksu za punoljetne");
    return false;
 }if(punoT !=""){
    $("#lblPTaksa").html("");

 }


}

function validateFormEdit(){
 var nazivP = $("#nazivP").val();
 var maloTP = $("#boravisnaTaksaMaloljetniP").val();
 var punoTP = $("#boravisnaTaksaPunoljetniP").val();


 if(nazivP == ""){
     $("#lblNazivP").html("*Unesite naziv");
     return false;
 }if(nazivP != ""){
   $("#lblNazivP").html("");
 }if(maloTP ==""){
    $("#lblMTaksaP").html("*Unesite taksu za maloljetne");
    return false;
 }if(maloTP !=""){
    $("#lblMTaksaP").html("");
 }if(punoTP ==""){
    $("#lblPTaksaP").html("*Unesite taksu za punoljetne");
    return false;
 }if(punoTP !=""){
    $("#lblPTaksaP").html("");

 }


}

</script>




   </body>
 </html>
