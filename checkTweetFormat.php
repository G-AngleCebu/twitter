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

	if($letter == 'C'){ // if quoted
		$extended_entities = $tweet->quoted_status->extended_entities;
		$entity_urls = $tweet->quoted_status->entities;
	}
	else {
		$extended_entities = $tweet->extended_entities;
		$entity_urls = $tweet->entities;
	}

	// echo count($extended_entities->media);

	if((isset($tweet->full_text)) && (count($extended_entities->media) == 0)): //text only
		$urls = "";
		$hasYoutubeURL = false;
		if($ct = count($entity_urls->urls) > 0):
			for($i = 0; $i<$ct; $i++){
				$urls .= $entity_urls->urls[$i]->expanded_url;
			}

			if( strpos( $urls, 'youtu' ) !== false ):
				return $letter.'7';
			else:
				return $letter.'1';
			endif;
		else:
			return $letter.'1';
		endif;
	elseif((isset($tweet->full_text)) && (count($extended_entities->media) > 0)): //text with media
		$imagesCt = 0;
		$videoCt = 0;
		
		for($i=0; $i<count($extended_entities->media); $i++){
			if($extended_entities->media[$i]->type == 'photo'):
				$imagesCt++;
			elseif($extended_entities->media[$i]->type == 'video'):
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
	elseif(!(isset($tweet->full_text)) && (count($extended_entities->media) > 0)): //media only
		$imagesCt = 0;
		$videoCt = 0;
		for($i=0; $i<count($extended_entities->media); $i++){
			if($extended_entities->media[$i]->type == 'photo'):
				$imagesCt++;
			elseif($extended_entities->media[$i]->type == 'video'):
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