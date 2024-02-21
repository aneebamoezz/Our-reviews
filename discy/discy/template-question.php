<?php /* Template Name: Questions */
get_header();
	include locate_template("theme-parts/logged-only.php");
	$page_id = $post_id_main = $post->ID;
	$wp_page_template = discy_post_meta("_wp_page_template",$post_id_main,false);
	$its_question     = wpqa_questions_type;
	include locate_template("theme-parts/loop.php");
get_footer();?>