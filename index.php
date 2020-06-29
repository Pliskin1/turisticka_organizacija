
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"  id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="js/index.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="icon" href="img/upd_registration_icon_small.png">
<title> Prijavljivanje na sistem - dobrodošli </title>
</head>
<body>
<section id="login">
    <div class="container">
    	<div class="row">
    	    <div class="col-xs-12">
        	    <div class="form-wrap">
                <h1>Prijavljivanje na sistem turističke organizacije</h1>
                <div align="center">
                <img src="img/UPD-registration.jpg" align="middle" width="150px" height="120px" />
              </div>
                <h2>Dobrodošli !</h2>
                    <form  id="myForm"action="login.php" method="POST" class="ajax" >
                            <div class="form-group">
                            <label for="user"  class="sr-only">Korisničko ime</label>
                            <input type="text" name="user"  class="form-control" placeholder="Korisničko ime">
                            </div>
                            <div class="form-group">
                            <label for="user" class="sr-only">Password</label>
                            <input type="password" name="lozinka"  class="form-control showpassword" placeholder="Lozinka">
                            </div>
                        <!--<div class="checkbox">
                            <span class="character-checkbox" onclick="showPassword()"></span>
                            <span class="label">Pokaži lozinku</span>
                        </div>-->

                        <!--<input id="submit" name="submit" type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Log in">-->
                        <button id = "submit" type="submit" name="submit" class="btn btn-custom btn-lg btn-block">Prijavi se</button><br/><br/>
                    </form>
                    <!--<a href="javascript:;" class="forget" data-toggle="modal" data-target=".forget-modal">Forgot your password?</a>-->
                    <hr>
        	    </div>
    		</div> <!-- /.col-xs-12 -->
    	</div> <!-- /.row -->
    </div> <!-- /.container -->
</section>

<div class="modal fade forget-modal" tabindex="-1" role="dialog" aria-labelledby="myForgetModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">×</span>
					<span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title">Recovery password</h4>
			</div>

		</div> <!-- /.modal-content -->
	</div> <!-- /.modal-dialog -->
</div> <!-- /.modal -->

<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <p>Diplomski rad © - 2018</p>

            </div>
        </div>
    </div>
</footer>




<div id='for_poruka'>

<div id='popup_poruka' class="col-sm-6 col-sm-offset-3 col-xs-12 col-sm-offset-0">
  <div class="col-sm-12 col-xs-12 header-popup1" style='padding: 7px;text-align:center; background-color:#1fa67b'> <!-- #00b8ff -->
    <!--<h1 style="color:WHITE">OBAVJEŠTENJE</h1> <!--<img src="img/iks.png" class="img-responsive iks" onclick="close_popup_apliciraj()">-->
  </div>
  <div class="panel-body">
    <div class="row">
      <div class="col-sm-12 paddingforma" style="margin:0 auto;float:none;text-align:center;font-size:18px;color:#4f5055;font-weight:600;margin-bottom:10px;">
        <div id="notificationImage" class="col-sm-4 col-sm-offset-4" style="padding-top: 20px;">
          <img src="img/iks_red.png" style="margin: 0 auto;" />
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

<?php
if(isset($_GET['error'])){
 if($_GET['error']=="UPempty"){ ?>
   <script>
  $('#popup_poruka').slideDown();
  $('#for_poruka').slideDown();
  $('#popup_poruka').show();
  $('#for_poruka').show();

  $('body').css('overflow-y', 'hidden');
  $('#message').html("Nijeste unijeli korisničko ime i lozinku. <br> Molimo pokušajte ponovo.");
  </script>
<?php }else if($_GET['error']=="Uempty"){?>
  <script>
  $('#popup_poruka').slideDown();
  $('#for_poruka').slideDown();
  $('#popup_poruka').show();
  $('#for_poruka').show();
  $('body').css('overflow-y', 'hidden');
  $('#message').html("Nijeste unijeli korisničko ime. <br>  Molimo pokušajte ponovo.");
  </script>
<?php } else if( $_GET['error']=="Pempty"){?>
  <script>
  $('#popup_poruka').slideDown();
  $('#for_poruka').slideDown();
  $('#popup_poruka').show();
  $('#for_poruka').show();
  $('body').css('overflow-y', 'hidden');
  $('#message').html("Nijeste unijeli lozinku. <br>  Molimo pokušajte ponovo.");

  </script>
<?php }else{ ?>
  <script>
  $('#popup_poruka').slideDown();
  $('#for_poruka').slideDown();
  $('#popup_poruka').show();
  $('#for_poruka').show();
  $('body').css('overflow-y', 'hidden');
  $('#message').html("Ne postoji korisnik sa unesenim podacima. <br>  Molimo pokušajte ponovo.");
  </script>

<?php  }}?>
<script>
function close_pop(){
  $('#for_poruka').slideUp();
      $('body').css('overflow-y', 'auto');
}
</script>

<script>
$(function(){
    $(".showpassword").each(function(index,input) {
        var $input = $(input);
        $('<label class="showpasswordlabel"/>').append(
            $("<input type='checkbox' class='showpasswordcheckbox' />").click(function() {
                var change = $(this).is(":checked") ? "text" : "password";
                var rep = $("<input type='" + change + "' />")
                    .attr("id", $input.attr("id"))
                    .attr("name", $input.attr("name"))
                    .attr('class', $input.attr('class'))
                    .val($input.val())
                    .insertBefore($input);
                $input.remove();
                $input = rep;
             })
        ).append($("<b/>").text("Prikaži šifru")).insertAfter($input);
    });
});
</script>









</body>
</html>
