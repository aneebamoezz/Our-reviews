<?php if (isset($custom_faqs) && is_array($custom_faqs)) {
	$faqs_i = 0;
	echo "<div class='accordion toggle-accordion'>";
	foreach ($custom_faqs as $faqs_key => $faqs) {
		$faqs_title = $faqs["text"];
		$faqs_content = $faqs["textarea"];
		echo "<div class='accordion-content'>
			<h4 class='accordion-title'><a href='#'><i class='icon-plus'></i>".$faqs_title."</a></h4>
			<div class='accordion-inner'>".nl2br($faqs_content)."</div>
		</div>";
	}
	echo "</div>";
}?>