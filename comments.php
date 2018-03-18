<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package selfish
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">

	<?php
    // You can start editing here -- including this comment!

    $comments_args = array(
        'comment_notes_before' => '',
        'comment_notes_after' => '',
        'comment_field' => '<div class="comment-form comment form-group"><label for="comment">' . __('Comment', 'selfish') . ' <span class="required">*</span></label><textarea id="comment" name="comment" class="form-control" rows="5" aria-required="true" placeholder="' . __('Write comment here', 'selfish') . '" required></textarea></div>',
        'fields' => array(
            'author' => '<div class="comment-form author form-group"><label for="author">' . __('Name', 'selfish') . ' <span class="required">*</span></label><input type="text" class="form-control" id="author" name="author" aria-required="true" placeholder="' . __('Your name', 'selfish') . '" required></input></div>',
            'email' => '<div class="comment-form email form-group"><label for="email">' . __('Email', 'selfish') . ' <span class="required">*</span></label><input type="email" class="form-control" id="email" name="email" aria-required="true" placeholder="email@example.com" required></input></div>',
            'url' => '<div class="comment-form url form-group"><label for="url">' . __('Your Website URL', 'selfish') . '</label><input type="url" class="form-control" id="url" name="url" placeholder="http://www.example.com"></input></div>',
        ),
        'submit_button' => '<button type="submit" id="%2$s" class="%3$s btn btn-primary">Post Comment</button>',
        'format' => 'xhtml'
    );
    comment_form($comments_args);
    ?>

    <div id="fake-comment" class="mb-4"><?php _e('Write your comment', 'selfish') ?></div> 
    
    <?php if (have_comments()) : ?>
		<h2 class="comments-title border-bottom py-1 mb-4">
			<?php
            $selfish_comment_count = get_comments_number();
            if ('1' === $selfish_comment_count) {
                printf(
                    /* translators: 1: title. */
                    esc_html__('One thought on &ldquo;%1$s&rdquo;', 'selfish'),
                    '<span>' . get_the_title() . '</span>'
                );
            } else {
                printf(// WPCS: XSS OK.
                    /* translators: 1: comment count number, 2: title. */
                    esc_html(_nx('%1$s comment', '%1$s comments', $selfish_comment_count, 'comments title', 'selfish')),
                    number_format_i18n($selfish_comment_count)
                );
            }
            ?>
		</h2><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
            wp_list_comments(array(
                'style'      => 'ol',
                'short_ping' => true,
            ));
            ?>
		</ol><!-- .comment-list -->

		<?php
        the_comments_navigation();

        // If comments are closed and there are comments, let's leave a little note, shall we?
        if (! comments_open()) :
            ?>
			<p class="no-comments"><?php esc_html_e('Comments are closed.', 'selfish'); ?></p>
			<?php
        endif;

    endif; // Check for have_comments().

    ?>

</div><!-- #comments -->
