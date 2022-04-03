<?php 
if (!isset($_SESSION['identity'])) {
    header("Location:".PATH.'usuario/login');
}?>
<div class="container">
	<center><h3>Perfil de <?php print_r($_SESSION['identity']->firstname) ?></h3></center><hr>
	<a class="btn btn-danger btn-sm" href="javascript:history.back()">Volver Atrás</a>
	<div class="container-profile">
		<img class="imgProfile" src="<?=PATH?>public/img/profile user.png" alt="profile">
		<h4><?php print_r($_SESSION['identity']->firstname . " " .$_SESSION['identity']->lastname); ?></h4><hr>
		<div class="infoUser">
			<p><strong>Documento:</strong> <?php print_r($_SESSION['identity']->document); ?></p>
			<p><strong>Dirección:</strong> <?php print_r($_SESSION['identity']->address); ?></p>
			<p><strong>Email:</strong> <?php print_r($_SESSION['identity']->email); ?></p>
			<p><strong>Teléfono:</strong> <?php print_r($_SESSION['identity']->phone); ?></p>
			<p><strong>Fecha de registro:</strong> <?php print_r($_SESSION['identity']->register); ?></p>
			<p><a href=""></a></p>
		</div>
		<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#passwordChange">
	  	Cambiar contraseña
		</button>
	</div>
</div><br><br>
<!-- Modal -->
<div class="modal fade" id="passwordChange" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cambiar contraseña</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" id="changePassword">
        	<input type="text" hidden="" name="id" value="<?php print_r($_SESSION['identity']->id); ?>">
        	<div class="row g-3 align-items-center">
				  	<div class="mb-3">
					  	<label for="formGroupExampleInput" class="form-label">Nueva contraseña</label>
					  	<input class="form-control input-sm" type="password" name="password" id="password" minlength="8" alt="strongPass" pattern="[A-Za-z0-9*#!¡¿?&%$][A-Za-z0-9*#!¡¿?&%$]*[0-9][A-Za-z0-9*#!¡¿?&%$]*" title="La contraseña debe contener al menos un dígito" placeholder="Nueva contraseña" required>
					  </div>
					  <div class="mb-3">
					  	<label for="formGroupExampleInput" class="form-label">Confirma contraseña</label>
					  	<input class="form-control input-sm" type="password" name="password2" id="password2" minlength="8" alt="strongPass" pattern="[A-Za-z0-9*#!¡¿?&%$][A-Za-z0-9*#!¡¿?&%$]*[0-9][A-Za-z0-9*#!¡¿?&%$]*" title="La contraseña debe contener al menos un dígito" placeholder="Nueva contraseña" required>
						</div>
					</div>
        </form>
			  <center><span id="error"></span></center>
			  <div id="pswd_info">
				   <h6>La contraseña debería cumplir con los siguientes requerimientos:</h6>
				   <ul>
				      <li id="letter"  class="invalid">Al menos debería tener <strong>una letra</strong></li>
				      <li id="capital"  class="invalid">Al menos debería tener <strong>una letra en mayúsculas</strong></li>
				      <li id="number"  class="invalid">Al menos debería tener <strong>un número</strong></li>
				      <li id="length"  class="invalid">Debería tener <strong>8 carácteres</strong> como mínimo</li>
				   </ul>
				</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-danger" id="newPassword">Guardar</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="successfullChangePassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body text-center">
        <h4>Contraseña actualizada exitosamente</h4>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('input[type=password]').keyup(function(){
			var password = $('#password').val();
			if (password.length < 8){
				$('#length').removeClass('valid').addClass('invalid');
			} else {
				$('#length').removeClass('invalid').addClass('valid');
			}
			if (password.match(/[A-z*#!¡¿?&%$]/)) {
          $('#letter').removeClass('invalid').addClass('valid');
        } else {
					$('#letter').removeClass('valid').addClass('invalid');
      }
      if ( password.match(/[A-Z*#!¡¿?&%$]/) ) {
            $('#capital').removeClass('invalid').addClass('valid');
        } else {
            $('#capital').removeClass('valid').addClass('invalid');
      }
      if ( password.match(/\d/) ) {
            $('#number').removeClass('invalid').addClass('valid');
        } else {
            $('#number').removeClass('valid').addClass('invalid');
      }
		}).focus(function() {
   		$('#pswd_info').show();
		}).blur(function() {
		 	$('#pswd_info').hide();
		});
		$('#password2').keyup(function(){
			var passwordv = $('#password').val();
			var password2 = $('#password2').val();
			if (passwordv == password2) {
				$('#error').text("Las contraseñas coinciden!").css("color", "green");
			} else {
				$('#error').text("Las contraseñas no coinciden!").css("color", "red");
			}
			if ( password2 == "") {
				$('#error').text("La confirmación no puede estar vacío!").css("color", "red");
			}
		});
		$('#newPassword').click(function(){
			var pass = $('#password').val();
			var pass2 = $('#password2').val();
			if (pass == "" && pass2 == ""){
				$('#error').text("La contraseña y la confirmación no pueden estar vacios").css("color", "red");
			} else if (pass == ""){
				$('#error').text("La contraseña no puede estar vacía!").css("color", "red");
			} else if (pass2 == ""){
				$('#error').text("La confirmación no puede estar vacío!").css("color", "red");
			} else if (pass != pass2) {
				$('#error').text("Las contraseñas no coinciden!!").css("color", "red");
			} else if ((pass.match(/[A-z]/) && pass.match(/[A-Z]/)) && (pass.match(/\d/) && pass.length > 8)){
				data=$('#changePassword').serialize();
				$.ajax({
					type:"POST",
          data:data,
          url:"/helpers/changePassword.php",
          success:function(r){
          	if (r==1) {
          		$('#changePassword')[0].reset();
          		$('#passwordChange').modal('hide');
          		$("#successfullChangePassword").modal("show");
          		passwordChange
          		setTimeout(function(){ $('#successfullChangePassword').modal('hide');},4000);
          	} else {
          		alertify.error("Error, no se actualizo la contraseña");
          	}
          }
				});
			}
		});
	});
</script>