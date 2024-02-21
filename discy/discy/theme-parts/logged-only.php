<?php $logged_only = discy_post_meta("logged_only");
if ($logged_only == "on" && !is_user_logged_in()) {
	echo '<article class="article-post article-logged-only clearfix">
		<div class="alert-message warning"><i class="icon-flag"></i><p>'.esc_html__("Sorry, log in to see the content.","discy").'</p></div>
	</article>';
	get_footer();
	die();
}?>