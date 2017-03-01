<?php
/*
 Template Name: Field Notes Page
 *
 * This is your custom page template. You can create as many of these as you need.
 * Simply name is "page-whatever.php" and in add the "Template Name" title at the
 * top, the same way it is here.
 *
 * When you create your page, you can just select the template and viola, you have
 * a custom page template to call your very own. Your mother would be so proud.
 *
 * For more info: http://codex.wordpress.org/Page_Templates
*/
?>

<?php get_header(); ?>
			<div id="content">

				<div id="inner-content" class="wrap cf">

					<main id="main" class="m-all t-5of7 d-4of5 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

						<div id="masonry-container">
							
						<?php

						$args = array( 'posts_per_page' => 20 );

						$myposts = get_posts( $args );
						foreach ( $myposts as $post ) : setup_postdata( $post );  
								$featured_image = get_field("featured_image");
								$size = "full"; 
								$blurb = get_field("blurb");
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
												<?php echo $blurb; ?>
												<div class="read-more">Read more <i class="fa fa-angle-double-right" aria-hidden="true"></i><div>
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
								
								
								
						<?php endforeach; 
						wp_reset_postdata();?>

						</div>
					
					</main>

					<?php get_sidebar(); ?>
					
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