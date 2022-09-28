<?php
/*
Template Name: Homepage
*/
defined('ABSPATH') || exit;
get_header();
$options = get_option('ct_settings');
?>

<div id="primary" class="content-area w-100">
		<main id="main" class="site-main">

		<div class="container">

		<h1 class="text-accent"><?=the_title(); ?></h1>
		<?=the_content(); ?>
		
		<div class="d-flex f-between">
			<div class="py-2 col-2">
				<h2>Contact Us</h2>
				<hr>
				<form id="contactForm" class='ajax pe-2' action="" method="post" enctype="multipart/form-data">	
					
						<input type="text" placeholder="Full Name" class="full-name w-100" id="full-name" name="full-name">
					
					<div class="two-halves-wrapper">
						<input class="phone py-2" type="text" placeholder="Phone Number" id="phone-number" name="phone-number">
						<input class="email py-2" type="email" placeholder="Email" id="email" name="email">
					</div>
						<textarea placeholder="How did you hear about us?" rows="10" id="message"></textarea>

					
					<div class="form-footer py-1 d-flex f-between bg-light">
						<button type="submit" id="submitForm" class="btn btn-custom">Submit</button>
						<div class="d-flex fv-center">
						<div class="success_msg" style="display: flex">Message
							Sent Successfully</div>

						<div class="error_msg" style="display: none">Message
							Not Sent, There is some error.</div>
					</div>
					</div>
				</form>
			</div>
			<div class="py-2 col-2 ps-2">
				<h2>Reach Us</h2>
				<hr>
				<address>
					<?= $options['ct_settings_company_address'] ?>
				</address>
			</div>
		</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();