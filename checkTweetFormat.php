<?php 

function checkTweetFormat($type, $tweet){
	$letter = '';
	switch($type){
		case 'tweet':
			$letter = 'A';

			break;
		case 'comment':

			$letter = 'C';
			break;
		case 'retweet':

			$letter = 'B';
			break;
		case 'reply':

			$letter = 'D';
			break;
	}

	$media = array();
	$entity_urls = array();

	// if quoted
	if($letter == 'C'){
		// check if quoted status has extended_entities and extended_entities->media
		if(isset($tweet->quoted_status->extended_entities) && isset($tweet->quoted_status->extended_entities->media)) {
			$media = $tweet->quoted_status->extended_entities->media;
		}

		$entity_urls = $tweet->quoted_status->entities->urls;
	}
	// if tweet is a reply
	// else if ($letter == 'D') {
	// 	if(isset($tweet->in_reply_to_tweet)) {
	// 		// check if replied to tweet has extended_entities and extended_entities->media
	// 		if(isset($tweet->in_reply_to_tweet->extended_entities) && isset($tweet->in_reply_to_tweet->extended_entities->media)) {
	// 			$media = $tweet->in_reply_to_tweet->extended_entities->media;
	// 		}

	// 		$entity_urls = $tweet->in_reply_to_tweet->entities->urls;
	// 	}
	// }
	else if($letter == 'B') {
		// check if tweet has extended_entities and extended_entities->media
		if(isset($tweet->retweeted_status->extended_entities) && isset($tweet->retweeted_status->extended_entities->media)) {
			$media = $tweet->retweeted_status->extended_entities->media;
		}

		$entity_urls = $tweet->retweeted_status->entities->urls;
	}
	else {
		// check if tweet has extended_entities and extended_entities->media
		if(isset($tweet->extended_entities) && isset($tweet->extended_entities->media)) {
			$media = $tweet->extended_entities->media;
		}

		$entity_urls = $tweet->entities->urls;
	}

	if(isset($tweet->full_text) && count($media) == 0): //text only
		$urls = "";
		$hasYoutubeURL = false;
		if($ct = count($entity_urls) > 0):
			for($i = 0; $i<$ct; $i++){
				$urls .= $entity_urls[$i]->expanded_url;
			}

			if( strpos( $urls, 'youtu' ) !== false ):
				return $letter.'7';
			else:
				return $letter.'1';
			endif;
		else:
			return $letter.'1';
		endif;
	elseif(isset($tweet->full_text) && (count($media) > 0)): //text with media
		$imagesCt = 0;
		$videoCt = 0;
		
		for($i=0; $i<count($media); $i++){
			if($media[$i]->type == 'photo'):
				$imagesCt++;
			elseif($media[$i]->type == 'video'):
				$videoCt++;
			endif;
		}

		if($imagesCt == 1 && $videoCt == 0):
			return $letter.'2';
		elseif($imagesCt == 2 && $videoCt == 0):
			return $letter.'3';
		elseif($imagesCt == 3 && $videoCt == 0):
			return $letter.'4';
		elseif($imagesCt == 4 && $videoCt == 0):
			return $letter.'5';
		elseif($videoCt == 1 && $imagesCt == 0):
			return $letter.'6';
		endif;
	elseif(!(isset($tweet->full_text)) && (count($media) > 0)): //media only
		$imagesCt = 0;
		$videoCt = 0;
		for($i=0; $i<count($media); $i++){
			if($media[$i]->type == 'photo'):
				$imagesCt++;
			elseif($media[$i]->type == 'video'):
				$videoCt++;
			endif;
		}

		if($imagesCt == 1 && $videoCt == 0):
			return $letter.'8';
		elseif($imagesCt == 2 && $videoCt == 0):
			return $letter.'9';
		elseif($imagesCt == 3 && $videoCt == 0):
			return $letter.'10';
		elseif($imagesCt == 4 && $videoCt == 0):
			return $letter.'11';
		elseif($videoCt == 1 && $videoCt == 0):
			return $letter.'12';
		endif;	
	endif;
}

 ?>