<?php
/**
 * Template for displaying pages
 * 
 * @package bootstrap-basic
 */

get_header();

/**
 * determine main column size from actived sidebar
 */
$main_column_size = bootstrapBasicGetMainColumnSize();
?> 
<?php get_sidebar('left'); ?> 
				<div class="col-md-<?php echo $main_column_size; ?> content-area" id="main-column">

					<main id="main" class="site-main" role="main">
						<?php 
						while (have_posts()) {
							the_post();

							// Include the page content template.
							get_template_part( 'template-parts/content', 'page' );
							
							// If comments are open or we have at least one comment, load up the comment template
							if (comments_open() || '0' != get_comments_number()) {
								comments_template();
							}

							echo "\n\n";

						} //endwhile;
						?> 

					<?php if ( function_exists('yoast_breadcrumb') ) { ?>
					<div class="breadcrumb">
						<?php yoast_breadcrumb('<p id="breadcrumbs">','</p>'); ?>
					</div>
					<? } ?>
					</main>
				</div>
<?php get_sidebar('right'); ?> 
<?php get_footer(); ?> 