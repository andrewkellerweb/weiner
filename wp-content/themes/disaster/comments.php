<?php
	/* If a post password is required or no comments are given and comments/pings are closed, return. */
	if ( post_password_required() || ( ! have_comments() && ! comments_open() && ! pings_open() ) )
		return;
?>

	<div id="comments-template">

		<div class="comments-wrap">

			<div class="comments" id="comments">

				<?php if ( have_comments() ) : ?>

					<h3 id="comments-number" class="comments-header comment-title"><?php comments_number( __( 'No Responses', 'raakbookoo' ), __( 'One Response', 'raakbookoo' ), __( '% Responses', 'raakbookoo' ) ); ?></h3>

					<?php if ( get_option( 'page_comments' ) ) : ?>
						<div class="comments-nav">
							<span class="page-numbers"><?php printf( __( 'Page %1$s of %2$s', 'raakbookoo' ), ( get_query_var( 'cpage' ) ? absint( get_query_var( 'cpage' ) ) : 1 ), get_comment_pages_count() ); ?></span>
							<?php previous_comments_link(); ?>
							<?php next_comments_link(); ?>
						</div><!-- .comments-nav -->
					<?php endif; ?>

					<?php do_action( 'tokokoo_comment_list_before' ); ?>

						<ol class="commentlist">
							<?php wp_list_comments( hybrid_list_comments_args() ); ?>
						</ol><!-- .comment-list -->

					<?php do_action( 'tokokoo_comment_list_after' ); ?>

				<?php endif; ?>

				<?php if ( pings_open() && !comments_open() ) : ?>

					<p class="comments-closed pings-open">
						<?php printf( __( 'Comments are closed, but <a href="%s" title="Trackback URL for this post">trackbacks</a> and pingbacks are open.', 'raakbookoo' ), esc_url( get_trackback_url() ) ); ?>
					</p><!-- .comments-closed .pings-open -->

				<?php elseif ( !comments_open() && ( of_get_option( 'tokokoo_comment_form' ) == 0 ) ) : ?>

					<p class="comments-closed">
						<?php _e( 'Comments are closed.', 'raakbookoo' ); ?>
					</p><!-- .comments-closed -->

				<?php endif; ?>

			</div><!-- #comments -->

			<?php
			$commenter = wp_get_current_commenter();
			$req = get_option( 'require_name_email' );
			$aria_req = ( $req ? " aria-required='true'" : '' );

			$fields =  array(
				'author' => '<p class="comment-form-author"><label for="author">' . __( 'Name', 'raakbookoo' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) . '<input id="author" class="input-text" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
				'email' => '<p class="comment-form-email"><label for="email">' . __( 'Email', 'raakbookoo' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) . '<input id="email" class="input-text" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
				'url' => '<p class="comment-form-url"><label for="url">' . __( 'Website', 'raakbookoo' ) . '</label><input id="url" class="input-text" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>'
			);

			$args = array(
				'id_submit' => 'button',
				'label_submit' => __( 'Post Comment', 'raakbookoo' ),
				'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun', 'raakbookoo' ) . '</label><textarea class="input-text" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
				'fields' => apply_filters( 'tokokoo_comment_form_default_fields', $fields ),
			);

			comment_form( $args ); // Loads the comment form. ?>

		</div><!-- .comments-wrap -->

	</div><!-- #comments-template -->