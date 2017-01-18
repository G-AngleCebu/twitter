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

	if((isset($tweet->full_text)) && (count($tweet->extended_entities->media) == 0)): //text only
		$urls = "";
		$hasYoutubeURL = FALSE;
		if($ct = count($tweet->entities->urls) > 0):
			for($i = 0; $i<$ct; $i++){
				$urls .= $tweet->entities->urls[$i]->expanded_url;
			}
			if( strpos( $urls, 'youtu' ) !== false ):
				return $letter.'7';
			else:
				return $letter.'1';
			endif;
		else:
			return $letter.'1';
		endif;
	elseif((isset($tweet->full_text)) && (count($tweet->extended_entities->media) > 0)): //text with media
		$imagesCt = 0;
		$videoCt = 0;
		for($i=0; $i<count($tweet->extended_entities->media); $i++){
			if($tweet->extended_entities->media[$i]->type == 'photo'):
				$imagesCt++;
			elseif($tweet->extended_entities->media[$i]->type == 'video'):
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
		elseif($videoCt == 1 && $videoCt == 0):
			return $letter.'6';
		endif;
	elseif(!(isset($tweet->full_text)) && (count($tweet->extended_entities->media) > 0)): //media only
		$imagesCt = 0;
		$videoCt = 0;
		for($i=0; $i<count($tweet->extended_entities->media); $i++){
			if($tweet->extended_entities->media[$i]->type == 'photo'):
				$imagesCt++;
			elseif($tweet->extended_entities->media[$i]->type == 'video'):
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