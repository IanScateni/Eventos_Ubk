<div class="container">
	<div class="section-padding">
		<h1 class="text-center">Nuestra Carta</h1>
		<p class="text-center">Aquí puede conocer nuestro menú gastronómico.</p>
		<div class="container">
			<div class="row row-cols-1 row-cols-md-2 g-4">
			<?php foreach ($menuCategory as $category) {
				$menuitems = $menu->getMenu($category['title']);
				if ($menuitems->num_rows > 0) {?>
				<div class="col">
					<div class="card">
				    	<img style= "max-height:280px; min-width: 100%;" src="<?=PATH?>public/img/<?php echo $category['cover']; ?>" class="card-img-top" alt="<?php echo $category['title']; ?>">
						<div class="card-body">
							<h5 class="card-title text-center font-title-menu"><?php echo ucfirst($category['title']); ?></h5><hr>
							<?php foreach ($menuitems as $item) {?>
								<div class="row">
									<?php if ($item['price'] == 0) {?>
										<div class="col-md-12 text-center font-Name-menu"><?php echo ucfirst($item['name']); ?></div>
									<?php } else {?>
										<div class="col-md-10 text-left font-Name-menu"><?php echo ucfirst($item['name']); ?></div>
										<div class="col-md-2 text-right font-Price-menu">$<?php echo number_format($item['price'],0, '.', '.'); ?></div>
									<?php }?>
								</div><hr>
							<?php } ?>
						</div>
				    </div><br>
				</div>
				<?php } ?>
			<?php } ?>
			</div>
		</div>
	</div>
</div><br>