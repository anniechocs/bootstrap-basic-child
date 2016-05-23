<?php
/**
 * Template Name: Home Page
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

			?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="margin-bottom:5px;">
			<header class="entry-header">
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header><!-- .entry-header -->

		<!--  Main content row   -->

			<div class="row">

				<div class="col-xs-12 entry-content">
					<?php the_content(); ?> 
					<div class="clearfix"></div>
				</div><!-- .entry-content -->

			</div> <!-- end row -->

		<!--  Second row  -->
		
			<div class="row flex-row">

				<?php 
					$args1 = array(
						'posts_per_page'=>6,
					'post_type'=>'post',
					'order'=>'DESC',
					'category_name'=>'front-page',
					);

					$query1 = new WP_Query( $args1);

   					if ( $query1->have_posts() ) { 
   						$numberPosts = $query1->post_count; 

   						?> 

		    		<?php while ( $query1->have_posts() ) {
								$query1->the_post();
								?>

								  	<div class="vert-card">

								       <div class="card-head">	
											<a href="<?php echo the_permalink(); ?>" title="<?php echo the_title(); ?>" >
												<h3> <?php echo the_title(); ?> </h3>
											</a>
								       </div>

								       <div class="flex-grow">
								       		<?php if ( has_post_thumbnail() ) {
								       			$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
								       			<div class="flex-img-holder">
								       				<img class="card-thumb" src="<?php echo $url; ?>">
								       			</div>
													<? } ?>
								       		<?php the_excerpt(); ?> 
								       </div>
								       <div class="card-footer">
								       		<a href="<?php echo the_permalink(); ?>" title="<?php echo the_title(); ?>" >
											 	<p class="read-more">read more</p> 
											</a>
								       </div>
								  	</div>

							<?php } //end while ?>

					<?php }  //end if 
					wp_reset_postdata(); ?>
		
	 
			</div> <!-- end row -->
			
		</article><!-- #post-## -->

			
		<?php
		} //endwhile have posts;
		?> 

		<!-- Facebook Feed goes here -->
		<?php 
 							$field = "facebook-feed";
							$catField1 =  get_post_meta($post->ID, $field, true);
							$field = "calendar-shortcode";
							$catField2 =  get_post_meta($post->ID, $field, true);
 							if ($catField1 != '') { ?>
 								<div class="clearfix"></div>
 								<div class="row">
									<div class="col-sm-12 facebook">
 										<h2>Facebook Feed</h2>
 										<?php echo do_shortcode("$catField1"); ?>
 									</div>	
 								</div>   									
 							<?php }?>


	</main>
</div>
<?php get_sidebar('right'); ?> 
<?php get_footer(); ?> 