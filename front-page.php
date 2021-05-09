<?php
/**
 * The template for displaying a static Front Page in the child theme.
 *
 *
 * @package understrap-child
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>

<div class="wrapper" id="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<main class="site-main" id="main">
			
			<article class="latest-news">

				<h2 class="text-center divider line razor">Latest News</h2> 

					<div class="row">
								
						<?php 
						// the query
						$news_query = new WP_Query( array(
							'category_name' => 'news',
							'posts_per_page' => 4,
						)); 
						?>
								
						<?php if ( $news_query->have_posts() ) : ?>
					
							<?php while ( $news_query->have_posts() ) : $news_query->the_post();  ?>   
										
								<div class="col-sm-6 col-lg-3 card glimmer p-3 bkground_ice">							

									<div class="d-flex justify-content-center" > 
									

									<?php if ( has_post_thumbnail() ) : ?><a href="<?php the_permalink(); ?>" >
									
										<?php the_post_thumbnail('large'); ?></a>

									</div>

									<?php
										the_title(
										sprintf( '<h2 class="text-center"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
										'</a></h2>'
										);
									?>
										
									<?php endif?>
		
								</div>		

							<?php endwhile; ?>
								
							<?php wp_reset_postdata(); ?>
							
								<?php else : ?>
							
								<p><?php __('No News'); ?></p>
							
									<?php endif; ?>
						
						</div>

						<div class="row">

							  <a href="<?php echo esc_url( get_permalink(73) ); ?>" class="btn btn-primary btn-lg mx-auto text-white my-5" target="blank" rel="noopener noreferrer" role="button" aria-pressed="true">More News</a>

						</div>
  
				</article>
				
		</main><!-- #main -->

	</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php get_footer();
