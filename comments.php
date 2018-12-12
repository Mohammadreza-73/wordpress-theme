<?php
/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>
  <?php if ( have_comments() ) : ?>
                  <?php wp_list_comments('type=comment&avatar_size=80&callback=advanced_comment'); ?>
    <?php
      // Are there comments to navigate through?
      if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
    ?>
    <nav class="navigation comment-navigation" role="navigation">
      <h1 class="screen-reader-text section-heading"><?php _e( 'صفحات دیدگاه', 'twentythirteen' ); ?></h1>
      <div class="nav-previous"><?php previous_comments_link( __( '&larr; قدیمی تر', 'twentythirteen' ) ); ?></div>
      <div class="nav-next"><?php next_comments_link( __( 'جدیدتر &rarr;', 'twentythirteen' ) ); ?></div>
    </nav><!-- .comment-navigation -->
    <?php endif; // Check for comment navigation ?>
  <?php endif; // have_comments() ?>
<?php if ( comments_open()) : ?>
  <?php
  $args = array(
  'id_form'              => 'commentform',
  'id_submit'            => 'submit',
  'class_submit'         => 'btn btn-success has_icon',
  'title_reply'          => __( '' ),
  'title_reply_to'       => __( 'ارسال پاسخ به %s' ),
  'cancel_reply_link'    => __( 'لغو پاسخ' ),
  'label_submit'         => __( 'Post Comment' ),
  'comment_field'        =>  '<div class="row"><div class="col-12 col-md-8 "><textarea id="comment" placeholder="متن دیدگاه شما" name="comment" cols="58" rows="3" aria-required="true">' .'</textarea>' .'</div>',
  'must_log_in'          => 'برای پاسخ باید با حساب کاربری وارد شوید',
  'logged_in_as'         => '<p class="logged-in-as">' . sprintf( __( 'شما با حساب کاربری  <a href="%1$s">%2$s</a> وارد شده‌اید. <a href="%3$s" title="خروج از این حساب کاربری ">خارج می‌شوید؟</a>' ),admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
  'comment_notes_before' => '',
  'comment_notes_after'  => '',
  'fields'               => apply_filters( 'comment_form_default_fields', array(
  'author'               =>'<div class="col-12 col-md-4"><label for="name">نام شما</label><input id="author" placeholder="مثلا: علی" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .'"/>',
  'email'                =>'<label for="email">ایمیل شما</label><input id="email" name="email" placeholder="Example@yahoo.com" type="text" value=" ' . esc_attr(  $commenter['comment_author_email'] ) .'" size="30"/></div>',
    )
  ),
);
comment_form( $args, get_the_ID() );
?>
</div>
<?php endif; ?>
