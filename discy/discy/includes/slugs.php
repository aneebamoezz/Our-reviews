<?php if (isset($category_id) && $category_id > 0?$category_id:0) {
	$term = get_term($category_id);
	$is_tag = (isset($term->taxonomy) && $term->taxonomy == wpqa_question_tags?"tag":"category");
	$is_tag_dash = ($is_tag == "tag"?"_tag":"");
	$feed_slug                 = "";
	$answers_might_like_slug   = "";
	$answers_for_you_slug      = "";
	$questions_for_you_slug    = "";
	$poll_feed_slug            = "";
	$recent_questions_slug     = discy_options("recent_questions_slug".$is_tag_dash);
	$most_answers_slug         = discy_options("most_answers_slug".$is_tag_dash);
	$question_bump_slug        = discy_options("question_bump_slug".$is_tag_dash);
	$answers_slug              = discy_options($is_tag."_answers_slug".$is_tag_dash);
	$most_visit_slug           = discy_options("most_visit_slug".$is_tag_dash);
	$most_vote_slug            = discy_options("most_vote_slug".$is_tag_dash);
	$no_answers_slug           = discy_options("no_answers_slug".$is_tag_dash);
	$recent_posts_slug         = discy_options("recent_posts_slug".$is_tag_dash);
	$posts_visited_slug        = discy_options("posts_visited_slug".$is_tag_dash);
	$random_slug               = discy_options("random_slug".$is_tag_dash);
	$question_new_slug         = discy_options("question_new_slug".$is_tag_dash);
	$question_sticky_slug      = discy_options("question_sticky_slug".$is_tag_dash);
	$question_polls_slug       = discy_options("question_polls_slug".$is_tag_dash);
	$question_followed_slug    = discy_options("question_followed_slug".$is_tag_dash);
	$question_favorites_slug   = discy_options("question_favorites_slug".$is_tag_dash);

	$feed_slug_2               = "";
	$answers_might_like_slug_2 = "";
	$answers_for_you_slug_2    = "";
	$questions_for_you_slug_2  = "";
	$poll_feed_slug_2          = "";
	$recent_questions_slug_2   = discy_options("recent_questions_slug_2".$is_tag_dash);
	$most_answers_slug_2       = discy_options("most_answers_slug_2".$is_tag_dash);
	$question_bump_slug_2      = discy_options("question_bump_slug_2".$is_tag_dash);
	$answers_slug_2            = discy_options("answers_slug_2".$is_tag_dash);
	$most_visit_slug_2         = discy_options("most_visit_slug_2".$is_tag_dash);
	$most_vote_slug_2          = discy_options("most_vote_slug_2".$is_tag_dash);
	$no_answers_slug_2         = discy_options("no_answers_slug_2".$is_tag_dash);
	$recent_posts_slug_2       = discy_options("recent_posts_slug_2".$is_tag_dash);
	$posts_visited_slug_2      = discy_options("posts_visited_slug_2".$is_tag_dash);
	$random_slug_2             = discy_options("random_slug_2".$is_tag_dash);
	$question_new_slug_2       = discy_options("question_new_slug_2".$is_tag_dash);
	$question_sticky_slug_2    = discy_options("question_sticky_slug_2".$is_tag_dash);
	$question_polls_slug_2     = discy_options("question_polls_slug_2".$is_tag_dash);
	$question_followed_slug_2  = discy_options("question_followed_slug_2".$is_tag_dash);
	$question_favorites_slug_2 = discy_options("question_favorites_slug_2".$is_tag_dash);
}else {
	$post_id = (int)(isset($tabs_menu)?$tabs_menu:get_the_ID());
	$feed_slug                 = discy_post_meta("feed_slug",$post_id);
	$recent_questions_slug     = discy_post_meta("recent_questions_slug",$post_id);
	$questions_for_you_slug    = discy_post_meta("questions_for_you_slug",$post_id);
	$most_answers_slug         = discy_post_meta("most_answers_slug",$post_id);
	$question_bump_slug        = discy_post_meta("question_bump_slug",$post_id);
	$answers_slug              = discy_post_meta("answers_slug",$post_id);
	$answers_might_like_slug   = discy_post_meta("answers_might_like_slug",$post_id);
	$answers_for_you_slug      = discy_post_meta("answers_for_you_slug",$post_id);
	$most_visit_slug           = discy_post_meta("most_visit_slug",$post_id);
	$most_vote_slug            = discy_post_meta("most_vote_slug",$post_id);
	$no_answers_slug           = discy_post_meta("no_answers_slug",$post_id);
	$recent_posts_slug         = discy_post_meta("recent_posts_slug",$post_id);
	$posts_visited_slug        = discy_post_meta("posts_visited_slug",$post_id);
	$random_slug               = discy_post_meta("random_slug",$post_id);
	$question_new_slug         = discy_post_meta("question_new_slug",$post_id);
	$question_sticky_slug      = discy_post_meta("question_sticky_slug",$post_id);
	$question_polls_slug       = discy_post_meta("question_polls_slug",$post_id);
	$question_followed_slug    = discy_post_meta("question_followed_slug",$post_id);
	$question_favorites_slug   = discy_post_meta("question_favorites_slug",$post_id);
	$poll_feed_slug            = discy_post_meta("poll_feed_slug",$post_id);

	$feed_slug_2               = discy_post_meta("feed_slug_2",$post_id);
	$recent_questions_slug_2   = discy_post_meta("recent_questions_slug_2",$post_id);
	$questions_for_you_slug_2  = discy_post_meta("questions_for_you_slug_2",$post_id);
	$most_answers_slug_2       = discy_post_meta("most_answers_slug_2",$post_id);
	$question_bump_slug_2      = discy_post_meta("question_bump_slug_2",$post_id);
	$answers_slug_2            = discy_post_meta("answers_slug_2",$post_id);
	$answers_might_like_slug_2 = discy_post_meta("answers_might_like_slug_2",$post_id);
	$answers_for_you_slug_2    = discy_post_meta("answers_for_you_slug_2",$post_id);
	$most_visit_slug_2         = discy_post_meta("most_visit_slug_2",$post_id);
	$most_vote_slug_2          = discy_post_meta("most_vote_slug_2",$post_id);
	$no_answers_slug_2         = discy_post_meta("no_answers_slug_2",$post_id);
	$recent_posts_slug_2       = discy_post_meta("recent_posts_slug_2",$post_id);
	$posts_visited_slug_2      = discy_post_meta("posts_visited_slug_2",$post_id);
	$random_slug_2             = discy_post_meta("random_slug_2",$post_id);
	$question_new_slug_2       = discy_post_meta("question_new_slug_2",$post_id);
	$question_sticky_slug_2    = discy_post_meta("question_sticky_slug_2",$post_id);
	$question_polls_slug_2     = discy_post_meta("question_polls_slug_2",$post_id);
	$question_followed_slug_2  = discy_post_meta("question_followed_slug_2",$post_id);
	$question_favorites_slug_2 = discy_post_meta("question_favorites_slug_2",$post_id);
	$poll_feed_slug_2          = discy_post_meta("poll_feed_slug_2",$post_id);
}

$feed_slug                 = ($feed_slug != ""?$feed_slug:"feed");
$recent_questions_slug     = ($recent_questions_slug != ""?$recent_questions_slug:"recent-questions");
$questions_for_you_slug    = ($questions_for_you_slug != ""?$questions_for_you_slug:"questions-for-you");
$most_answers_slug         = ($most_answers_slug != ""?$most_answers_slug:"most-answers");
$question_bump_slug        = ($question_bump_slug != ""?$question_bump_slug:"question-bump");
$answers_slug              = ($answers_slug != ""?$answers_slug:"answers");
$answers_might_like_slug   = ($answers_might_like_slug != ""?$answers_might_like_slug:"answers-might-like");
$answers_for_you_slug      = ($answers_for_you_slug != ""?$answers_for_you_slug:"answers-for-you");
$most_visit_slug           = ($most_visit_slug != ""?$most_visit_slug:"most-visit");
$most_vote_slug            = ($most_vote_slug != ""?$most_vote_slug:"most-vote");
$random_slug               = ($random_slug != ""?$random_slug:"random");
$question_new_slug         = ($question_new_slug != ""?$question_new_slug:"new");
$question_sticky_slug      = ($question_sticky_slug != ""?$question_sticky_slug:"sticky");
$question_polls_slug       = ($question_polls_slug != ""?$question_polls_slug:"polls");
$question_followed_slug    = ($question_followed_slug != ""?$question_followed_slug:"followed");
$question_favorites_slug   = ($question_favorites_slug != ""?$question_favorites_slug:"favorites");
$no_answers_slug           = ($no_answers_slug != ""?$no_answers_slug:"no-answers");
$poll_feed_slug            = ($poll_feed_slug != ""?$poll_feed_slug:"poll-feed");
$recent_posts_slug         = ($recent_posts_slug != ""?$recent_posts_slug:"recent-posts");
$posts_visited_slug        = ($posts_visited_slug != ""?$posts_visited_slug:"posts-visited");

$feed_slug_2               = ($feed_slug_2 != ""?$feed_slug_2:"feed-time");
$recent_questions_slug_2   = ($recent_questions_slug_2 != ""?$recent_questions_slug_2:"recent-questions-time");
$questions_for_you_slug_2  = ($questions_for_you_slug_2 != ""?$questions_for_you_slug_2:"questions-for-you-time");
$most_answers_slug_2       = ($most_answers_slug_2 != ""?$most_answers_slug_2:"most-answers-time");
$question_bump_slug_2      = ($question_bump_slug_2 != ""?$question_bump_slug_2:"question-bump-time");
$answers_slug_2            = ($answers_slug_2 != ""?$answers_slug_2:"answers-time");
$answers_might_like_slug_2 = ($answers_might_like_slug_2 != ""?$answers_might_like_slug_2:"answers-might-like-time");
$answers_for_you_slug_2    = ($answers_for_you_slug_2 != ""?$answers_for_you_slug_2:"answers-for-you-time");
$most_visit_slug_2         = ($most_visit_slug_2 != ""?$most_visit_slug_2:"most-visit-time");
$most_vote_slug_2          = ($most_vote_slug_2 != ""?$most_vote_slug_2:"most-vote-time");
$random_slug_2             = ($random_slug_2 != ""?$random_slug_2:"random-time");
$question_new_slug_2       = ($question_new_slug_2 != ""?$question_new_slug_2:"new-time");
$question_sticky_slug_2    = ($question_sticky_slug_2 != ""?$question_sticky_slug_2:"sticky-time");
$question_polls_slug_2     = ($question_polls_slug_2 != ""?$question_polls_slug_2:"polls-time");
$question_followed_slug_2  = ($question_followed_slug_2 != ""?$question_followed_slug_2:"followed-time");
$question_favorites_slug_2 = ($question_favorites_slug_2 != ""?$question_favorites_slug_2:"favorites-time");
$no_answers_slug_2         = ($no_answers_slug_2 != ""?$no_answers_slug_2:"no-answers-time");
$poll_feed_slug_2          = ($poll_feed_slug_2 != ""?$poll_feed_slug_2:"poll-feed-time");
$recent_posts_slug_2       = ($recent_posts_slug_2 != ""?$recent_posts_slug_2:"recent-posts-time");
$posts_visited_slug_2      = ($posts_visited_slug_2 != ""?$posts_visited_slug_2:"posts-visited-time");
?>