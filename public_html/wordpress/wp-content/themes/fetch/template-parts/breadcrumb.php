<?php
/**
 * The template used for displaying page breadcrumb
 *
 * @package Fetch
 */

 $breadcrumb = get_theme_mod( 'breadcrumb',true ); 
if( !is_front_page() ): ?>
	<div class="breadcrumb"> 
		<div class="container"><?php
		    if( !is_search() && !is_archive() && !is_404() ) : ?>
				<div class="sixteen columns">
					<?php the_title('<h1>','</h1>');?>	
					<?php if( $breadcrumb ) : ?>	
						<div class="breadcrumb-text">
							<?php fetch_breadcrumbs(); ?>
						</div>
					<?php endif; ?>
				</div><?php
			endif; ?>
		</div>
	</div><?php  
endif;