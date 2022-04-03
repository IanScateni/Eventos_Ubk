<div class="container">
 	<section class="section-padding">
		<div class="col-lg-12 col-align-center text-center">
			<h1><?=$categoryEvent->name?></h1>
		</div>
	</section>	
	<section class="events section-padding">
		<div class="row row-cols-1 row-cols-md-3 g-4">
			<?php if($events->num_rows == 0): ?>
				<p>No hay eventos para mostrar</p>
			<?php else: ?>	
				<?php while ($event = $events->fetch_object()): 
			  	$eventName = str_replace(' ', '-', strtolower($event->title));
			  	?>
				<div class="col">
				    <div class="card">
				      <img src="<?=PATH?>public/img/<?= $event->cover ?>" class="card-img-top" alt="...">
				      <div class="card-body text-center">
				        <h5 class="card-title"><?= $event->title ?></h5>
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
			<?php endif; ?>	
		</div>
	</section>
 </div>