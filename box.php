<?php
/*
	Name: Thesis 2 bbPress Helper Box
	Author: Tim Milligan
	Description: Quick (and dirty) conversion of Kristarella's bbPress-Thesis compatibility pack into a box
	Version: 1.0
	Class: t2bbp_helper
*/

class t2bbp_helper extends thesis_box {
	protected function translate() {
		$this->title = __('bbPress', 't2bbp');
	}
	
	public function html($args = false) {
		extract($args = is_array($args) ? $args : array());
		$tab = str_repeat("\t", !empty($depth) ? $depth : 0);
		
		if (!(bbp_is_single_user() || bbp_is_single_user_edit()))
			do_action( 'bbp_template_notices' );
		
		if (bbp_is_forum_archive()) {
			bbp_remove_all_filters('the_content');
			bbp_get_template_part( 'bbpress/content', 'archive-forum' );
		}
		elseif (bbp_is_topic_archive()) {
			bbp_get_template_part( 'bbpress/content', 'archive-topic' );
		}
		
		if (bbp_is_topic_tag_edit()) {
				bbp_get_template_part( 'content', 'topic-tag-edit' );
		}
		elseif (bbp_is_topic_tag()) {
				bbp_get_template_part( 'content', 'archive-topic' );
		}
		
		if (bbp_is_single_forum()) {
				if ( bbp_user_can_view_forum() )
					bbp_get_template_part( 'bbpress/content', 'single-forum' );
				else
					bbp_get_template_part( 'bbpress/feedback', 'no-access' );
		}
		elseif (bbp_is_topic_edit()) {
				bbp_get_template_part( 'bbpress/form', 'topic' );
		}
		elseif (bbp_is_topic_merge()) {
				bbp_get_template_part( 'bbpress/form', 'topic-merge' );
		}
		elseif (bbp_is_topic_split()) {
				bbp_get_template_part( 'bbpress/form', 'topic-split' );
		}
		elseif (bbp_is_single_topic()) {
				if ( bbp_user_can_view_forum() )
					bbp_get_template_part( 'bbpress/content', 'single-topic' );
				else
					bbp_get_template_part( 'bbpress/feedback', 'no-access' );
		}
		elseif (bbp_is_reply_edit()) {
				bbp_get_template_part( 'bbpress/form', 'reply' );
		}
		elseif (bbp_is_reply()) {
				bbp_get_template_part( 'bbpress/content', 'reply' );
		}
		elseif (bbp_is_single_view()) {
				bbp_get_template_part( 'bbpress/content', 'single-view' );
		}
		
		if (bbp_is_single_user_edit()) {
				bbp_get_template_part( 'bbpress/content', 'single-user-edit' );
		}
		elseif (bbp_is_single_user()) {
				bbp_get_template_part( 'bbpress/content', 'single-user' );
		}
		elseif (bbp_is_single_view()) {
				bbp_get_template_part( 'bbpress/content', 'single-view' );
		}
	}
	
}