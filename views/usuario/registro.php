<div class="container">
	<?php if (isset($_SESSION['register']) && $_SESSION['register'] == 'complete'): ?>
		<br><center><strong class="alert alert-success">Registro completado correctamente, sera redirigido en 5 segundos a la página de inicio de sesión</strong></center><br>
		<script type="text/javascript">
			setTimeout(function () {    
			    window.location.href = '<?php echo PATH ?>usuario/login'; 
			},5000)
		</script>
	<?php elseif (isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>
		<br><center><strong class="alert alert-danger">Registro fallido, introduce bien los datos</strong></center><br>
	<?php endif; ?>
	<?php Utils::deleteSession('register'); ?>
	<section class="section-padding">
		<h2 class="text-center">NUEVO USUARIO</h2><br>
			<div class="row justify-content-md-center">
				<?php if(!isset($_SESSION['identity'])): ?>
					<div class="col-12 col-md-6">
						<form method="POST" action="<?php echo PATH ?>usuario/register" accept-charset="utf-8">
							<div class="form-group">
								<label><strong>Nombre</strong></label>
								<input class="form-control input-sm" type="text" name="name" placeholder="Nombre" pattern="{2,48}" minlength="3" required><br>
								<label><strong>Apellido</strong></label>
								<input class="form-control input-sm" type="text" name="lastname" placeholder="Apellido" pattern="{2,48}" minlength="3" required>
								<br>
								<label><strong>Dirección</strong></label>
								<input class="form-control input-sm" type="text" name="address" placeholder="Dirección" pattern="{2,70}" minlength="3" required>
								<br>
								<label><strong>Email</strong></label>
								<input class="form-control input-sm" type="email" name="email" placeholder="correo@correo.com" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" required>
								<br>
								<label><strong>Teléfono</strong></label>
								<input class="form-control input-sm" type="text" name="phone" placeholder="3165847895" pattern="[0-9]{6,15}" maxlength="10" onkeypress="return isNumberKey(event)" required>
								<br>
								<label><strong>Tipo de documento</strong></label>
								<select class="form-select" aria-label="Default select example" name="typeDocument">
								  <option value="CC">Cédula</option>
								  <option value="PP">Pasaporte</option>
								  <option value="CE">Cédula extranjeria</option>
								</select>
								<br>
								<label><strong>Documento</strong></label>
								<input class="form-control input-sm" type="text" name="document" placeholder="Número de documento" maxlength="13" required>
								<br><label><strong>Contraseña</strong></label>
								<input class="form-control input-sm" type="password" name="password"  minlength="8" alt="strongPass" pattern="[A-Za-z0-9*#!¡¿?&%$][A-Za-z0-9*#!¡¿?&%$]*[0-9][A-Za-z0-9*#!¡¿?&%$]*" title="La contraseña debe contener al menos un dígito" placeholder="Contraseña" required>
							</div>
							<div class="botn d-grid gap-2">
								<input class="btnlogin btn btn-danger btnlogin" type="submit" value="Crear usuario">
							</div>
						</form>
					</div>
				<?php else: header("Location:".PATH.'usuario/reserva');?>
				<h3><?=$_SESSION['identity']->usuario?></h3>
				<?php endif; ?><br>
			</div>
	</section>
</div><br><br>
<script type="text/javascript">
	function isNumberKey(evt){
	    var charCode = (evt.which) ? evt.which : evt.keyCode
	    if (charCode > 31 && (charCode < 48 || charCode > 57))
	        return false;
	    return true;
	}
</script>