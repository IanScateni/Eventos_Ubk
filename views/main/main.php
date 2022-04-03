<div class="slideHome">
	<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
		<div class="carousel-indicators">
			<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
			<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
			<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
		</div>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<div class="overlay-image" style="background-image: url(<?=PATH?>public/img/1.jpg);"></div>
				<div class="container">
					<h2>Bodas y matrimonios</h2>
					<p>Se puede decir que todas soñamos con este gran día. ¿A quién le darás la responsabilidad de celebrarlo?...</p>
					<a href="<?=PATH?>eventos/evento&id=1&detail=bodas-y-matrimonios">
	        			<button type="button" class="btn btn-secondary btn-sm">Cotizar</button>
					</a>
				</div>
			</div>
			<div class="carousel-item">
				<div class="overlay-image" style="background-image: url(<?=PATH?>public/img/2.jpg);"></div>
				<div class="container">
					<h2>Fiesta de Cumpleaños</h2>
					<p>Celebra tu cumpleaños de una forma original y divertida A tu medida, como tu prefieras...</p>
					<a href="<?=PATH?>eventos/evento&id=5&detail=cumpleaños">
	        			<button type="button" class="btn btn-secondary btn-sm">Cotizar</button>
					</a>
				</div>
			</div>
			<div class="carousel-item">
				<div class="overlay-image" style="background-image: url(<?=PATH?>public/img/3.jpg);"></div>
				<div class="container">
					<h2>Fiesta de Año Nuevo</h2>
					<p>En definitiva, al terminar cada año nos damos cuenta de los retos que nos trajo y como logramos aprender de ellos y verlos como oportunidades...</p>
					<a href="<?=PATH?>eventos/evento&id=7&detail=fiesta-de-fin-de-año">
	        			<button type="button" class="btn btn-secondary btn-sm">Cotizar</button>
					</a>
				</div>
			</div>
		</div>
		<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Previous</span>
		</button>
		<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Next</span>
		</button>
	</div>
</div>
<?php if($events->num_rows != 0): ?>
<section class="section-padding">
	<div class="container">
		<h3 class="text-uppercase text-center">Bienvenido a eventos UBK</h3>
		<p class="text-center mb-lg-5 mb-4">Organización de eventos fiestas y recepciones para eventos sociales y empresariales, Casa de Banquetes y Catering - experiencia y cumplimiento</p>
		<div class="row row-cols-1 row-cols-md-3 g-4">
		  <?php while ($event = $events->fetch_object()): 
		  	$eventName = str_replace(' ', '-', strtolower($event->name));
		  	?>
		  <div class="col">
		    <div class="card">
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
	</div>
</section>
<?php endif; ?>	