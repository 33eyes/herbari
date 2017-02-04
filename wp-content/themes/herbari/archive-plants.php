<?php
/*
 * CUSTOM POST TYPE ARCHIVE TEMPLATE
 *
 * This is the custom post type archive template. If you edit the custom post type name,
 * you've got to change the name of this template to reflect that name change.
 *
 * For Example, if your custom post type is called "register_post_type( 'bookmarks')",
 * then your template name should be archive-bookmarks.php
 *
 * For more info: http://codex.wordpress.org/Post_Type_Templates
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

					<main id="main" class="m-all t-all d-all cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : ?>
							
							<div id="masonry-container">
							
								<?php while (have_posts()) : the_post(); 
								$featured_image = get_field("featured_image");
								$size = "full"; 
								?>

								<div class="masonry-item">
									<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
										<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">

											<header class="article-header">

												<h1 class="h2 entry-title"><?php the_title(); ?></h1>
												<p class="byline entry-meta vcard">
																					<?php print(
																/* the time the post was published */
																'<time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time>'
															); ?>
												</p>

											</header>

											<section class="entry-content cf">
											
											<?php if($featured_image) { ?>
												
												<div class="plant-featured-image text-center">
												<?php echo wp_get_attachment_image( $featured_image, $size ); ?>
												</div>
												<?php }
												else { ?>
												<div class="post-excerpt">
													<?php the_excerpt(); ?>
												</div>
												<?php } ?>
											</section>

											<footer class="article-footer cf">
												<p class="footer-comment-count">
													<?php comments_number( '', __( '<span>1</span> Comment', 'bonestheme' ), __( '<span>%</span> Comments', 'bonestheme' ) );?>
												</p>

											</footer>

										</article>
									</a>	
								</div>

							<?php endwhile; ?>

							</div>
							
							<?php bones_page_navi(); ?>

							<?php else : ?>

									<article id="post-not-found" class="hentry cf">
										<header class="article-header">
											<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the custom posty type archive template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</main>

				</div>

			</div>

<?php get_footer(); ?>


<!-- Wordpress Masonry script -->
<script type="text/javascript">	

	jQuery(window).load(function() {
		var container = document.querySelector('#masonry-container');
		var msnry = new Masonry( container, {
			itemSelector: '.masonry-item',
			columnWidth: '.masonry-item',                
		});  
  
	});

</script>