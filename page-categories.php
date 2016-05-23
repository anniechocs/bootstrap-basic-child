<?php
/**
 *  Template Name: Categories Page
 * Template for displaying posts within a category
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

 						<div class="row" id="about-us">  

 							<div id="second-col" class="col-sm-6 col-sm-push-6">
 								<?php 								     	
									$field = "page_extra";
									$catField =  get_post_meta($post->ID, $field, true);
	     							if ($catField != '') {
	     								echo "<div>" . $catField . "</div>";
	     							} ?> 
 							</div>
							        
							<div id="first-col" class="col-sm-6 col-sm-pull-6 about-us-groups">   		

	                		<?php 

	                			$field = "page_category";
								$category =  get_post_meta($post->ID, $field, true);

									$args1 = array(
 									'posts_per_page'=>10,
									'post_type'=>'post',
									'order'=>'ASC',
									'orderby'=>'name',
									'category_name'=>$category,
									);


	                		$query1 = new WP_Query( $args1);
	               
	                		while ( $query1->have_posts() ) {
										$query1->the_post();
										?>

									<a href="<?php echo the_permalink(); ?>" title="<?php echo the_title(); ?>" >
										<div class="each-group">

													<h3> <?php echo the_title() ?> </h3>
										 	
									     	<?php 
				     							if ( has_post_thumbnail() ) {
													$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
											?>
												<div class="col-xs-6">
													<img class="groups-thmb" src="<?php echo $url; ?>"> 
													<div class="clearfix"></div>
												</div>
												<div class="col-xs-6">
													<?php the_excerpt(); ?> 
													<div class="clearfix"></div>
												</div>
												<div class="clearfix"></div>
											<?php } //end of if 
											else { ?>

												<div class="col-xs-12"><?php the_excerpt(); ?> </div>
												<div class="clearfix"></div>
												<?php } //end of else ?>

				     					</div>	
				     				</a>

									<?php }
										wp_reset_postdata(); ?>

	                		
	                			</div> <!-- end col -->

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