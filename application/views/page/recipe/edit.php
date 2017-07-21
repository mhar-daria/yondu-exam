<main class="container fn-main" id="fn-recipe-edit">

	<?php 

		if ( ! empty($this->session->flashdata('error')) )
		{
	?>

			<div class="alert alert-danger" role="alert">
				<?=$this->session->flashdata('error') ?>
			</div>
	<?php
		}
	?>


	<?php 

		if ( ! empty($this->session->flashdata('success')) )
		{
	?>
			<div class="alert alert-success" role="alert">
			  <?=$this->session->flashdata('success') ?>
			</div>
	<?php
		}
	?>

	<div class="col-md-8 col-xs-12 column-left">

		<div class="col-md-12 col-xs-12 recipe-container">
				
			<div class="col-md-12 col-xs-12">
				
				<img src="<?=base_url($upload_path.$recipe['img_path']) ?>" alt="<?=$recipe['recipe_name'] ?>" class="img-responsive images-lazy" />
			</div>
		</div>

		<div class="clearfix" style="margin-bottom: 10px;"></div>
		
		<form action="<?=base_url('recipe/update/'.$recipe['id'])?>" 
				method="post" 
				enctype="multipart/form-data"
				data-parsley-validate="true"
				class="frm-create">

			<input type="hidden" name="<?=$this->security->get_csrf_token_name()?>" value="<?=$this->security->get_csrf_hash()?>">

			<fieldset class="form-group row">
			
				<label for="publish_date" class="col-md-3 col-xs-12 col-form-label">Publish Date: <span class="required">*</span></label>
				<div class="col-md-9 col-xs-12">
					
					<input type="date" 
								 class="form-control" 
								 value="<?=$recipe['publish_date'] ?>" 
								 id="publish_date" 
								 name="publish_date" 
								 data-parsley-required="true"
								 placeholder="Recipe Title" />
				</div>
			</fieldset>

			<fieldset class="form-group row">
			
				<label for="recipe_name" class="col-md-3 col-xs-12 col-form-label">Recipe Title: <span class="required">*</span></label>
				<div class="col-md-9 col-xs-12">
					
					<input type="text" 
								 class="form-control" 
								 value="<?=$recipe['recipe_name'] ?>" 
								 id="recipe_name" 
								 name="recipe_name" 
								 data-parsley-required="true"
								 placeholder="Recipe Title" />
				</div>
			</fieldset>

			<fieldset class="form-group row">
			
				<label for="recipe_img" class="col-md-3 col-xs-12 col-form-label">Recipe Image: <span class="required">*</span></label>
				<div class="col-md-9 col-xs-12">
					
					<input type="file" 
								 class="form-control-file" 
								 value="" 
								 id="recipe_img" 
								 name="recipe_img" 
								 placeholder="Recipe Image" />
				</div>
			</fieldset>

			<fieldset class="form-group row">
			
				<label for="category_name" class="col-md-3 col-xs-12 col-form-label">Category Name: <span class="required">*</span></label>
				<div class="col-md-9 col-xs-12">

					<select name="category_name" id="category_name" class="form-control" data-parsley-required="true" data-parsley-notequal="default">

						<option value="default">Choose Category</option>
						<?php foreach(fn_get_categories() as $category): ?>
							<option value="<?=$category['category_name'] ?>" <?php echo ($category['category_name'] === $recipe['category_name']) ? 'selected' : '' ?>><?=$category['category_name'] ?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</fieldset>

			<fieldset class="form-group row">

				<textarea name="recipe_details" id="recipe_details" cols="30" rows="10" class="wyswig">
					<?=$recipe['recipe_details'] ?>
				</textarea>	
			</fieldset>

			<input type="submit" id="btn-create" class="btn btn-primary btn-lg pull-right" value="Save" />
		</form>
	</div>

	<div class="col-md-4 col-xs-12 column-right">
		
		<div class="col-md-12 col-xs-12 btn-create-recipe-container">

			<a href="<?php echo base_url('recipe/create') ?>">

				<button class="btn btn-lg btn-primary btn-recipe col-md-12 col-xs-12" style="margin-top: 15px;">Submit a Recipe</button>
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