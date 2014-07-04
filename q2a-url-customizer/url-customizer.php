<?php

	if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
		header('Location: ../');
		exit;
	}

function qa_q_request($questionid, $title)
{
	// clean URL
	if (qa_opt('url_customizer_c_enable')){ //clean url's title
		$words = qa_opt('url_customizer_c_words');
		$raw_title = $title;
		// ~~ str_replace method
		//$word_list = explode(',', $words);
		//$title = str_replace($word_list, '', $raw_title);
		
		// ~~preg_replace method with Q2A functions
		require_once QA_INCLUDE_DIR.'qa-util-string.php';
		$word_list = qa_block_words_to_preg($words);
		$title=trim(qa_block_words_replace($title, $word_list , ''));

		if ( (strlen($title)==0) && (qa_opt('url_customizer_c_remove_if_all_common')) )
			$title = $raw_title;
	}

	$url = qa_q_request_base($questionid, $title);

	// capitalize letters
	if (qa_opt('url_customizer_capitalization')){
		$type = qa_opt('url_customizer_capitalization_type');
		if($type==0){ // first word's first letter
			$parts = explode('/', $url);
			$parts[1] = ucfirst($parts[1]);
			$url = implode('/', $parts);
		}else if($type==1) // all word's first letter
			$url = str_replace(' ', '?', ucwords(str_replace('?', ' ',  str_replace(' ', '/', ucwords(str_replace('/', ' ', str_replace(' ', '-', ucwords( str_replace('-', ' ', strtolower($url)) )) )) ))));
		else // whole words
			$url = strtoupper($url);
	}

    return $url;
}

/*
	Omit PHP closing tag to help avoid accidental output
*/