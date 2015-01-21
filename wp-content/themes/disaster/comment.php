<?php
	global $post, $comment;
?>

	<li id="comment-<?php comment_ID(); ?>" class="<?php hybrid_comment_class(); ?>">

		<div class="inner">

			<?php echo hybrid_avatar(); ?>

			<div class="comment-content comment-text comment-body">

				<?php echo apply_atomic_shortcode( 'comment_meta', '<div class="comment-meta">[comment-author after=" -"] [comment-published] [comment-permalink before="- "] [comment-edit-link before="- "] [comment-reply-link before="- "]</div>' ); ?>

				<div class="commenttext">

					<?php if ( '0' == $comment->comment_approved ) : ?>
						<?php echo apply_atomic_shortcode( 'comment_moderation', '<p class="alert moderation">' . __( 'Your comment is awaiting moderation.', 'raakbookoo' ) . '</p>' ); ?>
					<?php endif; ?>

					<?php comment_text( $comment->comment_ID ); ?>

				</div><!-- .commenttext -->

			</div><!-- .comment-content .comment-text -->

		</div><!-- .inner -->

	<?php /* No closing </li> is needed.  WordPress will know where to add it. */ ?>