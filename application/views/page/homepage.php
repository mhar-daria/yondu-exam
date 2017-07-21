<main class="container fn-main">
	
	<div class="col-md-8 col-xs-12 column-left">
		
		
		<?php foreach($featured_recipe as $recipe): ?>
			
			<div class="col-md-12 col-xs-12 recipe-container">
			
				<div class="col-md-4 col-xs-12 img-container">
					
				<img src="<?=base_url($upload_path.$recipe['img_path']) ?>" alt="<?=$recipe['recipe_name'] ?>" class="img-responsive images-lazy" />
				</div>

				<div class="col-md-8 col-xs-12 details-container">
					
					<a href="<?=base_url($recipe['category_name'].'/'.$recipe['title_key']) ?>"><h2 class="title"><?=$recipe['recipe_name'] ?></h2></a>
					<h4 class="category-name"><?=$recipe['category_name'] ?></h4>

					<p class="details">
						<?=htmlspecialchars_decode($recipe['recipe_details']) ?>
					</p>
					
					<a href="<?=base_url($recipe['category_name'].'/'.$recipe['title_key']) ?>" class="read-more">Read More...</a>
				</div>
			</div>
		<?php endforeach; ?>
	</div>

	<div class="col-md-4 col-xs-12 column-right">
		
		<div class="col-md-12 col-xs-12 btn-create-recipe-container">
			
			<a href="<?php echo base_url('recipe/create') ?>">

				<button class="btn btn-lg btn-primary btn-recipe">Submit a Recipe</button>
			</a>
		</div> <!-- submit a recipe -->

		<div class="col-md-12 col-xs-12 featured-recipe-container">
			
			<div class="col-md-12 col-xs-12 featured-recipe-title-container">
				
				<span class="col-md-12 col-xs-12 featured-recipe-title">Featured Recipe</span>
			</div>

			<div class="col-md-12 col-xs-12 featured-recipe-image-container">
				
				<img src="<?php echo base_url($upload_path.'/'.$featured_img['img_path']) ?>" alt="<?=$featured_img['recipe_name'] ?>" class="img-responsive images-lazy center-block" />	

				<p class="text-center" style="padding-top: 10px;"><a href="<?=base_url($featured_img['category_name'].'/'.fn_permalink($featured_img['recipe_name'])) ?>"><?=$featured_img['recipe_name'] ?></a></p>
			</div>

		</div><!-- end featured recipe -->
	</div>
</main>