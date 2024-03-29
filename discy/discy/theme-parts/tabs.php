<?php include locate_template("includes/slugs.php");

$active_points = discy_options("active_points");
$question_bump = discy_options("question_bump");
if (isset($tab_category) && $tab_category == true) {
	$get_home_tabs = discy_options("category_tabs");
	$tabs_menu_select = $tabs_menu = "";
}else if (isset($tab_tag) && $tab_tag == true) {
	$get_home_tabs = discy_options("tag_tabs");
	$tabs_menu_select = $tabs_menu = "";
}else {
	$post_id_main      = (isset($post_id_main)?$post_id_main:"");
	$search_box        = discy_post_meta("search_box",$post_id_main);
	$search_type_box   = discy_post_meta("search_type_box",$post_id_main);
	$ask_question_box  = discy_post_meta("ask_question_box",$post_id_main);
	$get_home_tabs     = discy_post_meta("home_tabs",$post_id_main);
	$categories_filter = discy_post_meta("categories_filter",$post_id_main);
	$tabs_menu         = get_option("tabs_menu");
	$tabs_menu_select  = get_option("tabs_menu_select");
}

if (!isset($tab_category) && !isset($tab_tag)) {
	if ($categories_filter == "on") {
		$exclude = apply_filters('wpqa_exclude_question_category',array());
		$args = array_merge($exclude,array(
			'child_of'     => 0,
			'orderby'      => 'name',
			'order'        => 'ASC',
			'hide_empty'   => 1,
			'hierarchical' => 1,
			'taxonomy'     => wpqa_question_categories
		));
		$options_categories = get_categories($args);
	}

	if ($search_box == "on" && has_wpqa()) {
		$search_type = wpqa_search_type();
		$show_button = false;
		$show_search_form_filter = apply_filters("wpqa_show_search_form_filter",true,$search_type);
		if ($show_search_form_filter == true) {
			include wpqa_get_template(array('search-form.php'));
		}else {
			do_action("wpqa_action_search_form",$search_type);
		}
	}

	if ($ask_question_box == "on") {?>
		<div class="ask-box-question wpqa-question<?php echo apply_filters('wpqa_pop_up_class','').apply_filters('wpqa_pop_up_class_question','')?>">
			<?php $user_id = get_current_user_id();
			do_action("wpqa_user_avatar",array("user_id" => $user_id,"size" => 29));?>
			<div class="box-question">
				<i class="icon-chat"></i><?php esc_html_e("What's your question?","discy")?>
				<a href="<?php echo (has_wpqa()?wpqa_add_question_permalink():"#")?>" class="wpqa-question<?php echo apply_filters('wpqa_pop_up_class','').apply_filters('wpqa_pop_up_class_question','')?>"></a>
			</div>
			<div class="clearfix"></div>
		</div>
	<?php }
}

$first_one = discy_home_setting($get_home_tabs,((isset($tab_category) && $tab_category == true) || (isset($tab_tag) && $tab_tag == true)?$category_id:""));?>
<div id="row-tabs-home" class="row row-warp row-tabs">
	<?php if ($tabs_menu != "on" && ($tabs_menu_select == "default" || $tabs_menu_select == "")) {
		if (isset($get_home_tabs) && is_array($get_home_tabs)) {
			if (isset($first_one) && $first_one != "") {?>
				<div class="col <?php echo (isset($options_categories) && is_array($options_categories) && $categories_filter == "on"?apply_filters("discy_col9_tab","col9"):"col12")?>">
					<?php discy_home_tabs($get_home_tabs,$first_one,(isset($category_id) && $category_id > 0?$category_id:0),"",(isset($post_id_main) && $post_id_main != ""?$post_id_main:""));?>
				</div><!-- End col9 -->
			<?php }
		}
		
		if (isset($options_categories) && is_array($options_categories) && $categories_filter == "on") {
			if (isset($_POST['home_categories'])) {
				wp_safe_redirect(esc_url($_POST['home_categories']));
				exit;
			}?>
			<div class="col <?php echo apply_filters("discy_col3_tab","col3")?>">
				<div class="categories-home">
					<div class="search-form">
						<?php do_action("discy_before_select_filter");?>
						<div class="search-filter-form">
							<span class="styled-select cat-filter">
								<select class="home_categories">
									<option value="<?php echo get_post_type_archive_link(wpqa_questions_type)?>"><?php esc_html_e('All Categories','discy')?></option>
									<?php foreach ($options_categories as $category) {?>
										<option value="<?php echo get_term_link($category->slug,wpqa_question_categories)?>"><?php echo esc_html($category->name)?></option>
									<?php }?>
								</select>
							</span>
						</div>
						<?php do_action("discy_after_select_filter");?>
					</div><!-- End search-form -->
				</div><!-- End categories-home -->
			</div><!-- End col3 -->
		<?php }
	}?>
</div><!-- End row -->

<?php $get_loop = $orderby_post = "";
if (isset($wp_page_template) && $wp_page_template == "template-home.php" && isset($first_one) && $first_one != "") {
	$get_tax = get_term_by('slug',$first_one,wpqa_question_categories);
}
$tabs_available = apply_filters("discy_home_page_tabs_available",false,$get_home_tabs,$first_one);
if (isset($first_one) && $first_one != "" && ($tabs_available == true || ($first_one == $feed_slug && isset($get_home_tabs["feed"]["value"]) && $get_home_tabs["feed"]["value"] != "" && $get_home_tabs["feed"]["value"] != "0") || ($first_one == $recent_questions_slug && isset($get_home_tabs["recent-questions"]["value"]) && $get_home_tabs["recent-questions"]["value"] != "" && $get_home_tabs["recent-questions"]["value"] != "0") || ($first_one == $questions_for_you_slug && isset($get_home_tabs["questions-for-you"]["value"]) && $get_home_tabs["questions-for-you"]["value"] != "" && $get_home_tabs["questions-for-you"]["value"] != "0") || ($first_one == $most_answers_slug && isset($get_home_tabs["most-answers"]["value"]) && $get_home_tabs["most-answers"]["value"] != "" && $get_home_tabs["most-answers"]["value"] != "0") || ($first_one == $no_answers_slug && isset($get_home_tabs["no-answers"]["value"]) && $get_home_tabs["no-answers"]["value"] != "" && $get_home_tabs["no-answers"]["value"] != "0") || ($first_one == $most_visit_slug && isset($get_home_tabs["most-visit"]["value"]) && $get_home_tabs["most-visit"]["value"] != "" && $get_home_tabs["most-visit"]["value"] != "0") || ($first_one == $most_vote_slug && isset($get_home_tabs["most-vote"]["value"]) && $get_home_tabs["most-vote"]["value"] != "" && $get_home_tabs["most-vote"]["value"] != "0") || ($first_one == $random_slug && isset($get_home_tabs["random"]["value"]) && $get_home_tabs["random"]["value"] != "" && $get_home_tabs["random"]["value"] != "0") || ($first_one == $question_new_slug && isset($get_home_tabs["new-questions"]["value"]) && $get_home_tabs["new-questions"]["value"] != "" && $get_home_tabs["new-questions"]["value"] != "0") || ($first_one == $question_sticky_slug && isset($get_home_tabs["sticky-questions"]["value"]) && $get_home_tabs["sticky-questions"]["value"] != "" && $get_home_tabs["sticky-questions"]["value"] != "0") || ($first_one == $question_polls_slug && isset($get_home_tabs["polls"]["value"]) && $get_home_tabs["polls"]["value"] != "" && $get_home_tabs["polls"]["value"] != "0") || ($first_one == $question_followed_slug && isset($get_home_tabs["followed"]["value"]) && $get_home_tabs["followed"]["value"] != "" && $get_home_tabs["followed"]["value"] != "0") || ($first_one == $question_favorites_slug && isset($get_home_tabs["favorites"]["value"]) && $get_home_tabs["favorites"]["value"] != "" && $get_home_tabs["favorites"]["value"] != "0") || ($first_one == $poll_feed_slug && isset($get_home_tabs["poll-feed"]["value"]) && $get_home_tabs["poll-feed"]["value"] != "" && $get_home_tabs["poll-feed"]["value"] != "0") || ($first_one == $recent_posts_slug && isset($get_home_tabs["recent-posts"]["value"]) && $get_home_tabs["recent-posts"]["value"] != "" && $get_home_tabs["recent-posts"]["value"] != "0") || ($first_one == $posts_visited_slug && isset($get_home_tabs["posts-visited"]["value"]) && $get_home_tabs["posts-visited"]["value"] != "" && $get_home_tabs["posts-visited"]["value"] != "0") || ($question_bump == "on" && $active_points == "on" && $first_one == $question_bump_slug && isset($get_home_tabs["question-bump"]["value"]) && $get_home_tabs["question-bump"]["value"] != "" && $get_home_tabs["question-bump"]["value"] != "0") || ($first_one == $feed_slug_2 && isset($get_home_tabs["feed-2"]["value"]) && $get_home_tabs["feed-2"]["value"] != "" && $get_home_tabs["feed-2"]["value"] != "0") || ($first_one == $recent_questions_slug_2 && isset($get_home_tabs["recent-questions-2"]["value"]) && $get_home_tabs["recent-questions-2"]["value"] != "" && $get_home_tabs["recent-questions-2"]["value"] != "0") || ($first_one == $questions_for_you_slug_2 && isset($get_home_tabs["questions-for-you-2"]["value"]) && $get_home_tabs["questions-for-you-2"]["value"] != "" && $get_home_tabs["questions-for-you-2"]["value"] != "0") || ($first_one == $most_answers_slug_2 && isset($get_home_tabs["most-answers-2"]["value"]) && $get_home_tabs["most-answers-2"]["value"] != "" && $get_home_tabs["most-answers-2"]["value"] != "0") || ($first_one == $no_answers_slug_2 && isset($get_home_tabs["no-answers-2"]["value"]) && $get_home_tabs["no-answers-2"]["value"] != "" && $get_home_tabs["no-answers-2"]["value"] != "0") || ($first_one == $most_visit_slug_2 && isset($get_home_tabs["most-visit-2"]["value"]) && $get_home_tabs["most-visit-2"]["value"] != "" && $get_home_tabs["most-visit-2"]["value"] != "0") || ($first_one == $most_vote_slug_2 && isset($get_home_tabs["most-vote-2"]["value"]) && $get_home_tabs["most-vote-2"]["value"] != "" && $get_home_tabs["most-vote-2"]["value"] != "0") || ($first_one == $random_slug_2 && isset($get_home_tabs["random-2"]["value"]) && $get_home_tabs["random-2"]["value"] != "" && $get_home_tabs["random-2"]["value"] != "0") || ($first_one == $question_new_slug_2 && isset($get_home_tabs["new-questions-2"]["value"]) && $get_home_tabs["new-questions-2"]["value"] != "" && $get_home_tabs["new-questions-2"]["value"] != "0") || ($first_one == $question_sticky_slug_2 && isset($get_home_tabs["sticky-questions-2"]["value"]) && $get_home_tabs["sticky-questions-2"]["value"] != "" && $get_home_tabs["sticky-questions-2"]["value"] != "0") || ($first_one == $question_polls_slug_2 && isset($get_home_tabs["polls-2"]["value"]) && $get_home_tabs["polls-2"]["value"] != "" && $get_home_tabs["polls-2"]["value"] != "0") || ($first_one == $question_followed_slug_2 && isset($get_home_tabs["followed-2"]["value"]) && $get_home_tabs["followed-2"]["value"] != "" && $get_home_tabs["followed-2"]["value"] != "0") || ($first_one == $question_favorites_slug_2 && isset($get_home_tabs["favorites-2"]["value"]) && $get_home_tabs["favorites-2"]["value"] != "" && $get_home_tabs["favorites-2"]["value"] != "0") || ($first_one == $poll_feed_slug_2 && isset($get_home_tabs["poll-feed-2"]["value"]) && $get_home_tabs["poll-feed-2"]["value"] != "" && $get_home_tabs["poll-feed-2"]["value"] != "0") || ($first_one == $recent_posts_slug_2 && isset($get_home_tabs["recent-posts-2"]["value"]) && $get_home_tabs["recent-posts-2"]["value"] != "" && $get_home_tabs["recent-posts-2"]["value"] != "0") || ($first_one == $posts_visited_slug_2 && isset($get_home_tabs["posts-visited-2"]["value"]) && $get_home_tabs["posts-visited-2"]["value"] != "" && $get_home_tabs["posts-visited-2"]["value"] != "0") || ($question_bump == "on" && $active_points == "on" && $first_one == $question_bump_slug_2 && isset($get_home_tabs["question-bump-2"]["value"]) && $get_home_tabs["question-bump-2"]["value"] != "" && $get_home_tabs["question-bump-2"]["value"] != "0") || ($first_one == $answers_slug && isset($get_home_tabs["answers"]["value"]) && $get_home_tabs["answers"]["value"] != "" && $get_home_tabs["answers"]["value"] != "0") || ($first_one == $answers_might_like_slug && isset($get_home_tabs["answers-might-like"]["value"]) && $get_home_tabs["answers-might-like"]["value"] != "" && $get_home_tabs["answers-might-like"]["value"] != "0") || ($first_one == $answers_for_you_slug && isset($get_home_tabs["answers-for-you"]["value"]) && $get_home_tabs["answers-for-you"]["value"] != "" && $get_home_tabs["answers-for-you"]["value"] != "0") || ($first_one == $answers_slug_2 && isset($get_home_tabs["answers-2"]["value"]) && $get_home_tabs["answers-2"]["value"] != "" && $get_home_tabs["answers-2"]["value"] != "0") || ($first_one == $answers_might_like_slug_2 && isset($get_home_tabs["answers-might-like-2"]["value"]) && $get_home_tabs["answers-might-like-2"]["value"] != "" && $get_home_tabs["answers-might-like-2"]["value"] != "0") || ($first_one == $answers_for_you_slug_2 && isset($get_home_tabs["answers-for-you-2"]["value"]) && $get_home_tabs["answers-for-you-2"]["value"] != "" && $get_home_tabs["answers-for-you-2"]["value"] != "0"))) {
	$get_loop = true;
}else if (isset($first_one) && $first_one != "" && ((($first_one == "all" || $first_one == "q-0") && isset($get_home_tabs["cat-q-0"]["value"]) && $get_home_tabs["cat-q-0"]["value"] != "" && $get_home_tabs["cat-q-0"]["value"] == "q-0") || (isset($get_tax->term_id) && $get_tax->term_id > 0))) {
	$get_loop = true;
	$its_question = wpqa_questions_type;
}else {
	echo '<div class="alert-message error"><i class="icon-cancel"></i><p>'.esc_html__("Sorry, this page is not found.","discy").'</p></div>';
}

if ($get_loop == true) {
	if (isset($first_one) && $first_one != "") {
		if ($first_one == $most_answers_slug || $first_one == $most_answers_slug_2) {
			$orderby_post = "popular";
		}else if ($first_one == $no_answers_slug || $first_one == $no_answers_slug_2) {
			$orderby_post = "no_answer";
		}else if ($first_one == $most_visit_slug || $first_one == $most_visit_slug_2 || $first_one == $posts_visited_slug || $first_one == $posts_visited_slug_2) {
			$orderby_post = "most_visited";
		}else if ($first_one == $most_vote_slug || $first_one == $most_vote_slug_2) {
			$orderby_post = "most_voted";
		}else if ($first_one == $random_slug || $first_one == $random_slug_2) {
			$orderby_post = "random";
		}else if ($question_bump == "on" && $active_points == "on" && ($first_one == $question_bump_slug || $first_one == $question_bump_slug_2)) {
			$orderby_post = "question_bump";
		}
		
		if ($first_one != $recent_posts_slug && $first_one != $recent_posts_slug_2 && $first_one != $posts_visited_slug && $first_one != $posts_visited_slug_2) {
			$its_question = wpqa_questions_type;
		}
		
		include locate_template("theme-parts/loop.php");
	}
}?>