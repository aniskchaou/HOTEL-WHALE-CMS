<?php
	global $post;

	$show_author_meta = cs_get_option( 'post-author-meta' );
	$show_author_meta = !empty( $show_author_meta ) ? "" : "hidden";

	$show_date_meta = cs_get_option( 'post-date-meta' );
	$show_date_meta = !empty( $show_date_meta ) ? "" : "hidden";	

	$show_comment_meta = cs_get_option( 'post-comment-meta' );
	$show_comment_meta = !empty( $show_comment_meta ) ? "" : "hidden";

	$show_category_meta = cs_get_option( 'post-category-meta' );
    $show_category_meta = !empty( $show_category_meta ) ? "" : "hidden";
    
    $show_post_likes = cs_get_option( 'post-likes' );
	$show_post_likes = !empty( $show_post_likes ) ? "" : "hidden";

	$show_post_views = cs_get_option( 'post-views' );
	$show_post_views = !empty( $show_post_views ) ? "" : "hidden";

	$show_tag_meta = cs_get_option( 'post-tag-meta' );
	$show_tag_meta = !empty( $show_tag_meta ) ? "" : "hidden";

	$post_meta = get_post_meta($post->ID ,'_dt_post_settings',TRUE);
	$post_meta = is_array($post_meta) ? $post_meta : array();

	$format = !empty( $post_meta['post-format-type'] ) ? $post_meta['post-format-type'] : 'standard'; ?>

    <!-- Featured Image -->
    <div class="entry-thumb">

        <?php get_template_part( 'framework/loops/partials/entry', 'thumb' );

		// If video format...
		if( $format === "video" ):?>
			<div class="entry-video-thumb"><?php
                if( has_post_thumbnail() ) : ?>
                    <?php the_post_thumbnail("full");?><?php
                endif;?>
                <!-- .entry-meta -->
                <div class="entry-meta vertically-centered"><?php
                    $categories = get_the_category();
                    if ( ! empty( $categories ) ):?>
                        <p class="<?php echo esc_attr( $show_category_meta );?> category"><?php the_category(' '); ?></p><?php
                    endif;?>

                    <div class="entry-title">
                        <h4><a href="<?php the_permalink();?>" title="<?php printf( esc_attr__('Permalink to %s','diaz'), the_title_attribute('echo=0'));?>"><?php the_title(); ?></a></h4>
                    </div>

                    <div class="entry-info">
                        <div class="author <?php echo esc_attr( $show_author_meta );?>"><i class="zmdi zmdi-account-box zmdi-hc-fw"> </i> <a href="<?php echo get_author_posts_url(get_the_author_meta('ID'));?>" title="<?php esc_attr_e('View all posts by ', 'diaz'); echo get_the_author();?>"><?php echo get_the_author();?></a></div>

                        <div class="date <?php echo esc_attr($show_date_meta);?>"><i class="zmdi zmdi-calendar zmdi-hc-fw"> </i><?php echo get_the_date('M');?> <?php echo get_the_date('d,');?> <?php echo get_the_date('Y');?></div>

                        <div class="comments <?php echo esc_attr($show_comment_meta);?>"><?php
                          comments_popup_link('<i class="zmdi zmdi-comment-list zmdi-hc-fw"> </i> 0 '.esc_html__('comments', 'diaz'), '<i class="zmdi zmdi-comment-list zmdi-hc-fw"> </i> 1 '.esc_html__('comment', 'diaz'), '<i class="zmdi zmdi-comment-list zmdi-hc-fw"> </i> % '.esc_html__('comments', 'diaz'), '', '<i class="zmdi zmdi-comment-list zmdi-hc-fw"> </i>'.esc_html('comments off', 'diaz'));?></div>

						<?php if( shortcode_exists( 'dt_sc_post_view_count' ) && class_exists( 'DTCorePlugin' ) ): ?>
                            <div class="views <?php echo esc_attr($show_post_views);?>"><i class="zmdi zmdi-eye zmdi-hc-fw"> </i> <?php echo do_shortcode('[dt_sc_post_view_count post_id="'.$post->ID.'" /]');?> <?php esc_html_e('Views', 'diaz');?> </div>
                        <?php endif;?>

                        <?php if( shortcode_exists( 'dt_sc_post_like_count' ) && class_exists( 'DTCorePlugin' ) ): ?>
                            <div class="likes dt_like_btn <?php echo esc_attr($show_post_likes);?>">
                                <i class="zmdi zmdi-favorite-outline zmdi-hc-fw"> </i>
                                <a href="#" data-postid="<?php the_ID(); ?>" data-action="like">
                                    <i><?php echo do_shortcode('[dt_sc_post_like_count post_id="'.$post->ID.'" /]');?></i>
                                    <span><?php esc_html_e('Likes', 'diaz');?></span>
                                </a>
                            </div>
                        <?php endif;?>
                    </div>
                </div><!-- .entry-meta -->
            </div><?php
		endif;?>

        <!-- .entry-meta -->
        <div class="entry-meta vertically-centered"><?php
			$categories = get_the_category();
			if ( ! empty( $categories ) ):?>
				<p class="<?php echo esc_attr( $show_category_meta );?> category"><?php the_category(' '); ?></p><?php
			endif;?>

            <div class="entry-title">
            	<h4><a href="<?php the_permalink();?>" title="<?php printf( esc_attr__('Permalink to %s','diaz'), the_title_attribute('echo=0'));?>"><?php the_title(); ?></a></h4>
	        </div>

            <div class="entry-info">
                <div class="author <?php echo esc_attr( $show_author_meta );?>"><i class="zmdi zmdi-account-box zmdi-hc-fw"> </i> <a href="<?php echo get_author_posts_url(get_the_author_meta('ID'));?>" title="<?php esc_attr_e('View all posts by ', 'diaz'); echo get_the_author();?>"><?php echo get_the_author();?></a></div>

                <div class="date <?php echo esc_attr($show_date_meta);?>"><i class="zmdi zmdi-calendar zmdi-hc-fw"> </i><?php echo get_the_date('M');?> <?php echo get_the_date('d,');?> <?php echo get_the_date('Y');?></div>

                <div class="comments <?php echo esc_attr($show_comment_meta);?>"><?php
				  comments_popup_link('<i class="zmdi zmdi-comment-list zmdi-hc-fw"> </i> 0 '.esc_html__('comments', 'diaz'), '<i class="zmdi zmdi-comment-list zmdi-hc-fw"> </i> 1 '.esc_html__('comment', 'diaz'), '<i class="zmdi zmdi-comment-list zmdi-hc-fw"> </i> % '.esc_html__('comments', 'diaz'), '', '<i class="zmdi zmdi-comment-list zmdi-hc-fw"> </i>'.esc_html('comments off', 'diaz'));?></div>

				<?php if( shortcode_exists( 'dt_sc_post_view_count' ) && class_exists( 'DTCorePlugin' ) ): ?>
                    <div class="views <?php echo esc_attr($show_post_views);?>"><i class="zmdi zmdi-eye zmdi-hc-fw"> </i> <?php echo do_shortcode('[dt_sc_post_view_count post_id="'.$post->ID.'" /]');?> <?php esc_html_e('Views', 'diaz');?> </div>
                <?php endif;?>

                <?php if( shortcode_exists( 'dt_sc_post_like_count' ) && class_exists( 'DTCorePlugin' ) ): ?>
                    <div class="likes dt_like_btn <?php echo esc_attr($show_post_likes);?>">
                        <i class="zmdi zmdi-favorite-outline zmdi-hc-fw"> </i>
                        <a href="#" data-postid="<?php the_ID(); ?>" data-action="like">
                            <i><?php echo do_shortcode('[dt_sc_post_like_count post_id="'.$post->ID.'" /]');?></i>
                            <span><?php esc_html_e('Likes', 'diaz');?></span>
                        </a>
                    </div>
                <?php endif;?>
            </div>
        </div><!-- .entry-meta -->
    </div><!-- Featured Image -->

    <div class="entry-details">
      <div class="entry-body">
		 <?php the_content();?>
		 <?php wp_link_pages( array( 'before'=>'<div class="page-link">', 'after'=>'</div>', 'link_before'=>'<span>', 'link_after'=>'</span>', 'next_or_number'=>'number',
						  'pagelink' => '%', 'echo' => 1 ) );?>
      </div><!-- Category & Tag -->

      <div class="entry-meta-data">
      	 <?php the_tags("<p class='tags {$show_tag_meta}'><span>".esc_html__('Tag List', 'diaz')."</span> ",' ',"</p>"); ?>
      </div><!-- Category & Tag -->

      <!-- Share -->
      <?php if( shortcode_exists( 'dt_sc_post_social_share' ) && class_exists( 'DTCorePlugin' ) ):
      			echo do_shortcode('[dt_sc_post_social_share post_id="'.$post->ID.'" /]');
      		endif;?><!-- Share -->

	  <?php edit_post_link( esc_html__( ' Edit ','diaz' ) ); ?>
    </div><!-- .entry-details -->