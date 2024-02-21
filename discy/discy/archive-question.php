<?php get_header();
	$its_question  = wpqa_questions_type;
	$paged         = discy_paged();
	$active_sticky = true;
	$custom_args   = array("post_type" => wpqa_questions_type);
	$show_sticky   = true;
	include locate_template("theme-parts/loop.php");
get_footer();?>