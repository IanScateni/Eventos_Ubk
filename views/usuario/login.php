<div class="container">
	<?php if (isset($_SESSION['error_login']) && $_SESSION['error_login'] == 'Autenticación fallida!!' ): ?>
		<br><center><strong class="alert alert-danger"><?= $_SESSION['error_login'] ?></strong></center><br>
	<?php unset($_SESSION['error_login']); endif ?>
	<section class="section-padding" style="height: 87.9vh;"> 
		<h2 class="text-center">INICIAR SESIÓN</h2><br>
		<div class="row justify-content-md-center">
			<?php if(!isset($_SESSION['identity'])): ?>
			<div class="col-12 col-md-6">
				<form method="POST" action="<?php echo PATH ?>usuario/logging" accept-charset="utf-8">
					<div class="form-group">
						<label><strong>Email</strong></label>
						<input class="form-control input-sm" type="email" name="user" placeholder="correo@correo.com" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" required>
						<br><label><strong>Contraseña</strong></label>
						<input class="form-control input-sm" type="password" name="password" placeholder="Contraseña" required>
					</div>
					<div class="botn d-grid gap-2">
						<input class="btnlogin btn btn-danger btnlogin" type="submit" value="Iniciar Sesión">
					</div>
				</form>
			<?php else: header("Location:".PATH.'usuario/panel');?>
				<h3><?=$_SESSION['identity']->usuario?></h3>
			<?php endif; ?><br>
			<a href="registro" style="color: red;">¿No tienes cuenta?, regístrate</a>
			</div>
		</div>
	</section>
</div>