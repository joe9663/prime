<div <?php BoldGrid::add_class( 'page_header_wrapper', [ 'page-header-wrapper', get_theme_mod( 'bgtfw_global_title_background_container' ) ] ); ?>>
	<header <?php BoldGrid::add_class( 'single_page_title', [ 'entry-header', 'page-header', has_post_thumbnail( get_option( 'page_for_posts', true ) ) ? 'has-featured-image-header' : '' ] ); ?> <?php bgtfw_featured_img_bg( $post->ID ); ?>>
		<div <?php BoldGrid::add_class( 'featured_image_single', [ 'featured-imgage-header', get_theme_mod( 'bgtfw_global_title_content_container' ) ] ); ?>>
			<?php the_title( sprintf( '<p class="entry-title page-title ' . get_theme_mod( 'bgtfw_global_title_size' ) . '"><a ' . BoldGrid::add_class( 'posts_title', [ 'link' ], false ) . ' href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></p>' ); ?>
			<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta">
				<?php boldgrid_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php endif; ?>
		</div>
	</header><!-- .entry-header -->
</div>