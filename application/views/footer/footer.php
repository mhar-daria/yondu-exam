		<footer class="container" id="footer">
			
			<div class="col-md-12 col-xs-12 footer-nav-container">
				<ul class="nav navbar-nav footer-nav">
					<li><a href="<?=base_url('/') ?>">home</a></li>
					<?php foreach(fn_get_categories() as $category): ?>
							
						<li>
							
							<a href="<?=base_url($category['category_name']) ?>" data-category="<?=$category['category_name'] ?>"><?=ucwords($category['category_title']) ?></a>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>

			<p class="copyright">Recipe &copy; <?php echo date('Y'); ?> All Rights Reserved</p>
		</footer>

		<script type="text/javascript" src="<?php echo base_url('public/js/main.vendor.build.js') ?>"></script>
		<script type="text/javascript" src="<?php echo base_url('public/js/main.build.js') ?>"></script>
	</body>
</html>