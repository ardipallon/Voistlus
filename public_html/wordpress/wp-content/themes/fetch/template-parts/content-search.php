<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Fetch
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
<?php 
		$featured_image = get_theme_mod( 'featured_image',true );
	    $featured_image_size = get_theme_mod ('featured_image_size','1');
		if( $featured_image &&  has_post_thumbnail() ) : ?>
			<?php
		        if ( $featured_image_size == '1' ) :?>	  	
						<div class="post-thumb">
						  <?php	if( $featured_image && has_post_thumbnail() ) : 
								    the_post_thumbnail('fetch-blog-large-width');
			                endif;?>
			            </div> <?php
		        else: ?>
		 	            <div class="post-thumb">
		 	                 <?php if( has_post_thumbnail() && ! post_password_required() ) :   
					               the_post_thumbnail('fetch-small-featured-image-width');
								endif;?>
			             </div>  <?php				
	            endif; ?>
	           <?php
		endif;?>
</header><!-- .entry-header -->
    <div class="latest-content">
		<header class="header-content"> 
		   
			<div class="entry-content">   
				<?php
					/* translators: %s: Name of current post */
					the_content( sprintf(
						__( 'Read More', 'fetch' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					) );
				
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages: ', 'fetch' ),
					'after'  => '</div>',
				) );
			    ?>
				
			</div><!-- .entry-content -->

			<?php if ( 'post' == get_post_type() ): ?>
				<footer class="entry-footer">
					<?php fetch_entry_footer(); ?>
				</footer><!-- .entry-footer -->
			<?php endif;?>
		</header><!-- .entry-header -->
	</div>

</article><!-- #post-## -->
