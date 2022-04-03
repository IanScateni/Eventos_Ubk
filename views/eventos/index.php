<div class="container">
	<section class="section-padding">
		<div class="col-lg-12 col-align-center text-center">
			<p>Bienvenido al panel de cotizaciones por favor selecciona la clase de evento antes de abrir tu cotizacion.<br>Eventos UBK se especializa en la organizacion de eventos sociales y empresariales.</p>
		</div>
	</section>
	<section class="events section-padding">
		<div class="row row-cols-1 row-cols-md-3 g-4">
		  <?php while ($event = $events->fetch_object()): 
		  	$eventName = str_replace(' ', '-', strtolower($event->name));
		  ?>
		  <div class="col">
		    <div class="card h-100">
		      <img src="<?=PATH?>public/img/<?= $event->cover ?>" class="card-img-top" alt="...">
		      <div class="card-body text-center">
		        <h5 class="card-title"><?= $event->name ?></h5>
		        <p class="card-text"><?= $event->shortdescription ?></p>
		        <a href="<?=PATH?>eventos/evento&id=<?= $event->id ?>&detail=<?= $eventName ?>">
		        	<div class="d-grid gap-2">
		        		<button type="button" class="btn btn-danger btn-sm">Ver más</button>
					</div>
				</a>
		      </div>
		    </div>
		  </div>
		  <?php endwhile; ?>
		</div>	
	</section>
</div>