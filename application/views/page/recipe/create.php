<main class="container" id="fn-recipe-create">
	
	<h1>Submit a Recipe</h1>

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

	<form action="<?=base_url('recipe/new')?>" 
				method="post" 
				enctype="multipart/form-data"
				data-parsley-validate="true"
				class="frm-create">
		
		<input type="hidden" name="<?=$this->security->get_csrf_token_name()?>" value="<?=$this->security->get_csrf_hash()?>">

		<fieldset class="form-group row">
			
			<label for="recipe_name" class="col-md-2 col-xs-12 col-form-label">Recipe Title: <span class="required">*</span></label>
			<div class="col-md-10 col-xs-12">
				
				<input type="text" 
							 class="form-control" 
							 value="" 
							 id="recipe_name" 
							 name="recipe_name" 
							 data-parsley-required="true"
							 placeholder="Recipe Title" />
			</div>
		</fieldset>

		<fieldset class="form-group row">
			
			<label for="recipe_img" class="col-md-2 col-xs-12 col-form-label">Recipe Image: <span class="required">*</span></label>
			<div class="col-md-10 col-xs-12">
				
				<input type="file" 
							 class="form-control-file" 
							 value="" 
							 id="recipe_img" 
							 name="recipe_img" 
							 data-parsley-required="true"
							 placeholder="Recipe Image" />
			</div>
		</fieldset>

		<fieldset class="form-group row">
			
			<label for="category_name" class="col-md-2 col-xs-12 col-form-label">Category Name: <span class="required">*</span></label>
			<div class="col-md-10 col-xs-12">

				<select name="category_name" id="category_name" class="form-control" data-parsley-required="true" data-parsley-notequal="default">

					<option value="default">Choose Category</option>
					<?php foreach($categories as $category): ?>
						<option value="<?=$category['category_name'] ?>"><?=$category['category_name'] ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</fieldset>

		<fieldset class="form-group row">

			<textarea name="recipe_details" id="recipe_details" cols="30" rows="10" class="wyswig"></textarea>	
		</fieldset>
		
		<input type="submit" id="btn-create" class="btn btn-primary btn-lg pull-right" value="Submit" />
	</form>
</main>