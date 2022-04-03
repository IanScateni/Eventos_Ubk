<?php 
require_once '../../config/db.php'; 
require_once '../../config/parameters.php'; 
require_once '../../models/eventos.php';
$oEventos = new Eventos();
$siteEvent = $oEventos->getSite($_POST['people'], $_POST['id']);
if ($siteEvent->num_rows > 0) { ?>
<div class="mb-3" id="siteEvent">
	<div class="row row-cols-1 serviceEvent">
		<?php foreach ($siteEvent as $key => $site) {?>
		<div class="col">
			<div class="card h-100">
			  <img src="<?=PATH?>public/img/<?= $site['cover']?>" class="card-img-top" alt="...">
			  <div class="card-body">
			    <h5 class="card-title" style="text-align: left;"><?= $site['title']?></h5>
			    <p class="card-text"><?= $site['description']?></p><hr>
			    <strong> Precio: </strong> $<?= number_format($site['value'], 0, '.','.'); ?></p>
			    <div class="d-grid gap-2">
					  <input class="btn-check" type="radio" name="eventSite" id="<?= $site['title']?>" value="<?= $site['title']?>">
					  <label class="btn btn-outline-danger btn-sm" for="<?= $site['title']?>">
					    Contratar
					  </label>
					</div>
			  </div>
			</div>
		</div>
		<?php } ?>
	</div>
</div>
<?php } else {?>
	<div class="alert alert-danger" role="alert" id="siteEvent">
	Actualmente no tenemos sitios disponibles para <?php echo $_POST['people']; ?> invitados.
	</div>
<?php } ?>
<script type="text/javascript">
$(document).ready(function(){
	$("input[name=eventSite]").click(function(){
		var siteSelect = $('input:radio[name=eventSite]:checked').val()
		$("#siteEventTitle").val(siteSelect);
	});
});
</script>