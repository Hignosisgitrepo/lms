<!-- Footer -->
<?php 
	$company = setting('config_company_name', 'config');
	$company_name = $company->value;
	$logo_img = setting('config_logo', 'config');
	$logo = $logo_img->value;
	$icon_img = setting('config_icon', 'config');
	$icon = $icon_img->value;
?>
<!-- Footer -->

<div class="bg-white border-top-2 mt-auto">
	<div class="container-fluid page__container page-section d-flex flex-column">
		<p class="text-70 brand mb-24pt">
			<img class="brand-icon"
				 src="<?php echo $this->config->item('default_url'); ?>/assets/image/<?php echo $logo; ?>"
				 width="30"
				 alt="Luma"> <?php echo $company_name; ?>
		</p>
		<p class="measure-lead-max text-50 small mr-8pt"><?php echo $company_name; ?> is a beautifully crafted user interface for modern Education Platforms, including Courses & Tutorials, Video Lessons, Student and Teacher Dashboard, Curriculum Management, Earnings and Reporting, ERP, HR, CMS, Tasks, Projects, eCommerce and more.</p>
		<p class="mb-8pt d-flex">
			<a href=""
			   class="text-70 text-underline mr-8pt small">Terms</a>
			<a href=""
			   class="text-70 text-underline small">Privacy policy</a>
		</p>
		<p class="text-50 small mt-n1 mb-0">Copyright 2019 &copy; All rights reserved.</p>
	</div>
</div>

<!-- // END Footer -->
