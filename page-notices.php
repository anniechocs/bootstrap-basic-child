<?php
/**
 *  Template Name: Notices Page
 * Template for displaying groups
 * @package bootstrap-basic-child
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
						<article id="all-churches-page" class="page">
						<?php while (have_posts()) {
							the_post(); ?>
							<header class="entry-header">
								<h1 class="entry-title"><?php the_title(); ?> </h1>  	
							</header>

						<div><?php  the_content(); ?></div>	

 						<div class="row" id="notices">  
 							<?php 
									$args = array(
 									'posts_per_page'=>10,
									'post_type'=>'post',
									'order'=>'DESC',
									'category_name'=>'notices',
									);
 								?>

							        
							<div id="first-col" class="col-md-9 about-us-groups">   		

	                		<?php 

	                		$query = new WP_Query( $args);
	               
	                		while ( $query->have_posts() ) {
										$query->the_post();
										?>

										<div class="each-group">
												<a href="<?php echo the_permalink(); ?>" title="<?php echo the_title(); ?>" >
													<h2> <?php echo the_title() ?> </h2>
												</a>
										 	
									     	<?php 
				     							if ( has_post_thumbnail() ) {
													$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
											?>
												<img class="cat-thmb" src="<?php echo $url; ?>"> 
												<?php the_content(); ?> 

												<div class="clearfix"></div>

												<div class="clearfix"></div>
											<?php } //end of if 
											else { ?>

												<div class="col-xs-12">
												<?php the_content(); ?> 
												</div>
												<div class="clearfix"></div>
												<?php } //end of else ?>

				     					</div>	

									<?php }   // end of while for query
										wp_reset_postdata(); ?>

								</div> <!-- end first column -->
								<div id="second-col" class="col-sm-6 about-us-groups">		




	                		
	                			</div> <!-- end second-col -->
	                		</div> <!-- end of row -->

	                			<?php 
								} //endwhile for page;
								?> 
						
						</article>

					<?php if ( function_exists('yoast_breadcrumb') ) { ?>
					<div class="breadcrumb">
						<?php yoast_breadcrumb('<p id="breadcrumbs">','</p>'); ?>
					</div>
					<? } ?>
					</main>
				</div>
<?php get_sidebar('right'); ?> 
<?php get_footer(); ?> 