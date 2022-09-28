<?php
/*
Template Name: Homepage
*/
defined('ABSPATH') || exit;
?>

<div id="primary" class="content-area">
		<main id="main" class="site-main">
<?php if (have_posts()): ?>

<?php while (have_posts()):
        the_post(); ?>

		<div class="container">

		<?=the_title(); ?>
		
		<?=the_content(); ?>
		
</div>
<?php
    endwhile;
endif;
?>

</div>
<?php
get_footer();

