<?php

/* update when a post is created or edited */
add_action('save_post', 'update_custom_terms');

function update_custom_terms($post_id) {
	
	// looks for bible references in input
	$regex_pattern = '/\b(Genesis|Exodus|Leviticus|Numbers|Deuteronomy|Joshua|Judges|Ruth|1 Samuel|2 Samuel|1 Kings|2 Kings|1 Chronicles|2 Chronicles|Ezra|Nehemiah|Esther|Job|Psalm|Proverbs|Ecclesiastes|Song of Solomon|Isaiah|Jeremiah|Lamentations|Ezekiel|Daniel|Hosea|Joel|Amos|Obadiah|Jonah|Micah|Nahum|Habakkuk|Zephaniah|Haggai|Zechariah|Malachi|Matthew|Mark|Luke|John|Acts|Romans|1 Corinthians|2 Corinthians|Galatians|Ephesians|Philippians|Colossians|1 Thessalonians|2 Thessalonians|1 Timothy|2 Timothy|Titus|Philemon|Hebrews|James|1 Peter|2 Peter|1 John|2 John|3 John|Jude|Revelation)\s(\d{1,3})(:\d{1,3}(\-\d{1,3}(:\d{1,3})?)?)?/';

	$post_type = get_post_type($post_id);

  	// update terms only for these custom post types
  	if ($post_type != 'sermon'  && $post_type != 'article' && $post_type != 'read' ) {
		return;
  	}

  	// don't create or update terms for system generated posts
  	if (get_post_status($post_id) == 'auto-draft') {
    	return;
  	}	

	// identify where child terms will go

	$top_parent_term_sermon = term_exists( 'Sermons', 'scripture' );
	switch ($post_type) {
		case "sermon":
			$top_parent_term = term_exists( 'Cross References', 'scripture' );
			break;
		case "read":
			$top_parent_term = term_exists( 'Scripture of the Day', 'scripture' );
			break;
		case "article":
			$top_parent_term = term_exists( 'Articles', 'scripture' );
			break;	
	}

	// get the terms currently associated with the post
	$post_terms = wp_get_object_terms( $post_id, 'scripture' );

	// delete child terms only associated with this post
	foreach ($post_terms as $post_term) {
		if ($post_term->count == 1) {
			wp_delete_term( $post_term->term_id, 'scripture');		
		}
	}

	// delete all existing relationships between post and terms
	wp_delete_object_term_relationships($post_id, 'scripture');

	// search fields from post
	$input_string = get_post_field('post_title', $post_id) . get_post_field('post_content', $post_id);
	$input_string_sermon = get_field('sermon_text');

	$terms = find_verses($input_string, $regex_pattern);
	insert_and_set_terms($terms, $top_parent_term, $post_id);

	if ($input_string_sermon) {
		$terms = find_verses($input_string_sermon, $regex_pattern);
		insert_and_set_terms($terms, $top_parent_term_sermon, $post_id);
	}

	return;
}

function insert_and_set_terms($terms, $top_parent_term, $post_id) {

	// loop through every verse found
	foreach ($terms as $ref => $book) {

			// insert term under book name
			delete_option("scripture_children"); // clear taxonomy cache
			$parent_term = term_exists( $book, 'scripture', $top_parent_term['term_id'] ); // array is returned if taxonomy is given
			wp_insert_term( $ref, 'scripture', array( 'parent' => $parent_term['term_id'] ));

			// Create relationship between CPT and term
			delete_option("scripture_children"); // clear taxonomy cache
			$ref_term = term_exists( $ref, 'scripture', $parent_term['term_id'] );
			$ref_term_id = (int) $ref_term['term_id'];
			wp_set_object_terms( $post_id, $ref_term_id, 'scripture', true );

	}
}

function find_verses($input_string, $regex_pattern) {

	// finds all matches
	preg_match_all($regex_pattern, $input_string, $matches_out);

	// creates an associative array where the key is the full reference name and the value is the book, 
	// e.g. "1 Thessalonians 5:12" => "1 Thessalonians"
	$terms = array_combine($matches_out[0], $matches_out[1]);

	return $terms;
}

function scripture_library_output_table() {
	
	$terms_ot = array(
		'Genesis', 'Exodus', 'Leviticus', 'Numbers', 'Deuteronomy', 'Joshua', 
		'Judges', 'Ruth', '1 Samuel', '2 Samuel', '1 Kings', '2 Kings', '1 Chronicles', 
		'2 Chronicles', 'Ezra', 'Nehemiah', 'Esther', 'Job', 'Psalm', 'Proverbs', 'Ecclesiastes', 
		'Song of Solomon', 'Isaiah', 'Jeremiah', 'Lamentations', 'Ezekiel', 'Daniel', 'Hosea', 'Joel', 
		'Amos', 'Obadiah', 'Jonah', 'Micah', 'Nahum', 'Habakkuk', 'Zephaniah', 'Haggai', 'Zechariah', 'Malachi');
	
	$terms_nt = array(
		'Matthew', 'Mark', 'Luke', 'John', 'Acts', 'Romans', 
		'1 Corinthians', '2 Corinthians', 'Galatians', 'Ephesians', 
		'Philippians', 'Colossians', '1 Thessalonians', '2 Thessalonians', 
		'1 Timothy', '2 Timothy', 'Titus', 'Philemon', 'Hebrews', 'James', 
		'1 Peter', '2 Peter', '1 John', '2 John', '3 John', 'Jude', 'Revelation');

	$return = output_rows($terms_nt);
	$return .= output_rows($terms_ot);
	
	echo $return;
}

function output_rows ($terms) {
	
	$sermon_term = term_exists( 'Sermons', 'scripture' );
	$crossref_term = term_exists( 'Cross References', 'scripture' );
	$article_term = term_exists( 'Articles', 'scripture' );
	$read_term = term_exists( 'Scripture of the Day', 'scripture' );
	
	$term_ids = array (
	 	(int) $sermon_term['term_id'],
		(int) $crossref_term['term_id'],
		(int) $article_term['term_id'],
		(int) $read_term['term_id'],
	);
	
	$desc = array (
		"Sermons",
		"Cross Refs",
		"Articles",
		"SOTD"
	);
	
	$return = "";
		
	// Output Rows
	foreach ($terms as $book) {
	
		$i = 0;
		$return .= '<div class="scripture-library">';
		$return .= '<h3>' . $book . '</h3>';

		foreach ($term_ids as $id) {
			$book_term = term_exists ( $book, 'scripture', $id );
			$book_term_id = (int) $book_term['term_id'];
			$book_term_link = get_term_link ($book_term_id, 'scripture');
			$book_term_count = count(get_term_children($book_term_id, 'scripture'));
			
			if ($book_term_count == 0) {
				$book_term_link = "#";
			}
			
			$return .= '<p style="float: left; margin-right: 10px;">';
			$return .= $desc[$i] . "<br/><a href='" . $book_term_link . "'>" . $book_term_count ."</a></p>";
			$i++;
		}
	
		$return .= '<br clear="both"/></div>';
	}
	
	return $return;
	
}