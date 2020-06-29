<?php
include ('database.php');
session_start();
if(!isset($_SESSION['korisnickoIme'])) {
   header ("Location: index.php");

}

if($_SESSION['idtk'] == 2 ){
   header ("Location: korisnici.php");
}
if($_SESSION['idtk'] == 3 ){
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





   <title>Iznajmljivanja</title>





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
      <h1 align="center" style="font-family:verdana">IZNAJMLJIVAǊA</h1>
    <div class="container" >
       <div class="row">




<?php $sql = "SELECT idiz, g.ime as gost, g.prezime as gostP, g.brojPutneIsprave, gr.naziv, s.ime as stanodavac, s.prezime as stanodavacP,s.jmbg, s.adresa, k.idk,k.korisnickoIme,i.idiz,i.datumPrijave, i.datumOdjave, i.UkupnaCijena, i.idk, i.ids, i.idg, i.ukupnaCijena
              from iznajmljivanje i, korisnik k , stanodavac s, grad gr , gost g
              where i.idk = k.idk and
              s.ids=i.ids and
              s.grad = gr.gid and
              i.idg = g.idg and aktivno = 1
              ORDER BY idiz DESC";
      $result = $conn->query($sql);
 ?>

  <div clas ="col-md-8 col-md-offset-2" style="width:100%">
    <table  class="table table-bordered table-hover" >
      <thead> <tr>
        <th style="text-align:center">Datum prijave</th>
        <th class="not_mapped_style" style="text-align:center">Datum odjave</th>
        <th class="not_mapped_style" style="text-align:center">Ukupna cijena</th>
        <th class="not_mapped_style" style="text-align:center">Informator</th>
        <th class="not_mapped_style" style="text-align:center" >Stanodavac</th>
        <th class="not_mapped_style" style="text-align:center">Grad</th>
        <th class="not_mapped_style" style="text-align:center">Gost</th>
        <th class="not_mapped_style" style="text-align:center">Račun</th>

        <th class="not_mapped_style" style="text-align:center">Izbriši</th>

      </tr>
    </thead>
    <tbody>
   <?php
      $finJmbg =0;
      while($row = $result-> fetch_assoc()){ ?>


        <tr> <td align='center'> <?php echo $row['datumPrijave'] ?> </td>
        <td align='center'> <?php echo $row['datumOdjave'] ?>  </td>
        <td align='center'> <?php echo $row['ukupnaCijena'] ?>  &euro;  </td>
        <td align='center'> <?php echo $row['korisnickoIme'] ?></td>
        <td align='center'> <?php echo $row['stanodavac']." ".$row['stanodavacP'] ?><br>(<?php echo $row['jmbg'] ?>)</td>
        <td align='center'> <?php echo $row['naziv']?> <br>(<?echo  $row['adresa']?>)</td>
        <td align='center'> <?php echo $row['gost']." ".$row['gostP']. " (". $row['brojPutneIsprave'] ?>)</td>
        <td align='center'> <button type='button' class='btn btn-success' onclick='racun("<?php echo $row['idiz']?>")' >Preuzmi</button> </td>
        <td align='center'> <button name='edit' type='button' data-toggle='modal'  data-target='#izbrisiIznajmljivanje' class='btn btn-danger btn-xs edit_data' id="<?php echo $row['idiz'];?>" >Izbriši</button> </td>
  <?php  }    ?>


    </tbody>

    </table>


  </div>
</div>
</div>

<?php
include("footer.php");

 ?>


 <!-- Modal -->
 <div class="modal fade edit_data" id="izbrisiIznajmljivanje" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <form action="izbrisi_iznajmljivanje.php" method="post">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Izbriši iznajmljivanje</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">

        <div class="row">
          <div class="col-sm-12">


          <label> Da li ste sigurni da želite da izbrišete ovo iznajmljivanje ?  </label>  <br>  <lable id="lblIme"></lable>

        </div>


        </div>




       </div>
       <div class="modal-footer">
         <input type="hidden" name="idiz" id="idiz">
         <button type="button" class="btn btn-danger" data-dismiss="modal">Odustani</button>
         <input type="submit" class="btn btn-success" name="Unesi"id="unesi" value="Izbriši"></button>
       </div>
     </form>
     </div>
   </div>
 </div>

 <!-- end of modal -->




 <div id='for_poruka'>

 <div id='popup_poruka' class="col-sm-6 col-sm-offset-3 col-xs-12 col-sm-offset-0" >
   <div class="col-sm-12 col-xs-12 header-popup1" style='padding: 7px;text-align:center; background-color:#1fa67b'> <!-- #00b8ff -->
     <!--<h1 style="color:WHITE">OBAVJEŠTENJE</h1> <!--<img src="img/iks.png" class="img-responsive iks" onclick="close_popup_apliciraj()">-->
   </div>
   <div class="panel-body">
     <div class="row">
       <div class="col-sm-12 paddingforma" style="margin:0 auto;float:none;text-align:center;font-size:18px;color:#4f5055;font-weight:600;margin-bottom:10px;">
         <div id="notificationImage" class="col-sm-4 col-sm-offset-4" style="padding-top: 20px;">
           <img src="img/succ.png" style="margin: 0 auto; width: 170px; height: 180px" />
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
                   <label>Da li ste sigurni da želite da izbrišete ovo iznajmljivanje ?
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
 if(isset($_GET['delete'])){
  if($_GET['delete']=="success"){ ?>
    <script>
   $('#popup_poruka').slideDown();
   $('#for_poruka').slideDown();
   $('#popup_poruka').show();
   $('#for_poruka').show();
   $('body').css('overflow-y', 'hidden');
   $('#message').html("Uspješno ste izbrisali iznajmljivanje!");
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
   $('#message').html("Uspješno ste registrovali gosta!");
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
  $(".table").DataTable();


  $(document).on('click','.edit_data',function(){
    var idiz = $(this).attr("id");
    $.ajax({
      url:"fetchRegistration.php",
      method:"POST",
      data:{idiz:idiz},
      dataType:"json",
      success:function(data){

        $("#idiz").val(data.idiz);
        $("#unesi").val("Izbriši");
        $("#izbrisiIznajmljivanje").modal('show');



      }
    });
  });

});





function close_pop2(){
  $('#brisanje').slideUp();
      $('body').css('overflow-y', 'auto');
}

function racun(idiz) {
var temp = idiz;
window.location.href="idGosta2.php?idiz="+temp;
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
</script>





   </body>
 </html>
