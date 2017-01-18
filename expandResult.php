<?php 
	function expandResult($tweet){

		$text = $tweet->full_text;
				//entity urls
		if($ect = count($tweet->entities->urls) > 0):
			for($i=0; $i < $ect; $i++){
				$shortened_url = $tweet->entities->urls[$i]->url;
				$expanded_url = '<a href="'.$tweet->entities->urls[$i]->expanded_url.'">'.$tweet->entities->urls[$i]->expanded_url.'</a>';
				$text = str_replace($shortened_url, $expanded_url, $text);

			}
		endif;
		$text = mediaUrls($tweet, $text);
		$text = extendedEntityExpandUrl($tweet, $text);
		return $text;
	}

	function expandResult_noLink($tweet){

		$text = $tweet->full_text;
				//entity urls
		if($ect = count($tweet->entities->urls) > 0):
			for($i=0; $i < $ect; $i++){
				$shortened_url = $tweet->entities->urls[$i]->url;
				$expanded_url = $tweet->entities->urls[$i]->expanded_url;
				$text = str_replace($shortened_url, $expanded_url, $text);

			}
		endif;
		$text = mediaUrls($tweet, $text);
		$text = extendedEntityExpandUrl($tweet, $text);
		return $text;
	}

	function extendedEntityExpandUrl($tweet, $txt){
		if($exct = count($tweet->extended_entities->media) > 0):
			for($j=0; $j<$exct; $j++){
				$shortened_url = $tweet->extended_entities->media[$j]->url;
				$expanded_url = '<a class="extended_entity" href="'.$tweet->extended_entities->media[$j]->expanded_url.'">'.$tweet->extended_entities->media[$j]->expanded_url.'</a>';
				$txt = str_replace($shortened_url, $expanded_url, $txt);
			}
		endif;

		return $txt;
	}

	//retweeted urls
	function retweetedExpandUrl($tweet){
		$text = $tweet->retweeted_status->full_text;
		if(isset($tweet->retweeted_status)):
			$text = expandResult($tweet->retweeted_status, $text);
			$text = mediaUrls($tweet->retweeted_status, $text);
			$text = extendedEntityExpandUrl($tweet->retweeted_status, $text);
		endif;
		return $text;
	}


	function quotedExpandUrl($tweet){
		$text = $tweet->quoted_status->full_text;
		
		$text = expandResult($tweet->quoted_status, $text);
		$text = mediaUrls($tweet->quoted_status, $text);
		$text = extendedEntityExpandUrl($tweet->quoted_status, $text);
	
		return $text;
	}
	function mediaUrls($tweet, $txt){
		if($c = count($tweet->entities->media) > 0):
			for($i=0; $i < $c; $i++){
				$shortened_url = $tweet->entities->media[$i]->url;
				$expanded_url = '<a class="entity" href="'.$tweet->entities->media[$i]->expanded_url.'">'.$tweet->entities->media[$i]->expanded_url.'</a>';

				$txt = str_replace($shortened_url, $expand_url, $txt);
			}
		endif;

		return $txt;
	}


	function breakYoutube($tweet){
		$txt = expandResult_noLink($tweet);
		preg_match('~(?:https?://)?(?:www.)?(?:youtube.com|youtu.be)/(?:watch\?v=)?([^\s]+)~', $txt, $match);
		$newTxt = str_replace($match[0], '<br><a href="'.$match[0].'">'.$match[0].'</a></br>', $txt);
		return $newTxt;
	}

	function reverseEngineer($text){
		$pos = strpos($text, 'https://t.co');
		if($pos !== false):
			$url = substr($text, $pos, 23);
			$org = unshorten_url($url);
			return str_replace($url, "<a href='".$org."'>".$org."</a>", $text);
		else:
			return $text;
		endif;
	}

	function unshorten_url($url) {
	  $ch = curl_init($url);
	  curl_setopt_array($ch, array(
	    CURLOPT_FOLLOWLOCATION => TRUE,  // the magic sauce
	    CURLOPT_RETURNTRANSFER => TRUE,
	    CURLOPT_SSL_VERIFYHOST => FALSE, // suppress certain SSL errors
	    CURLOPT_SSL_VERIFYPEER => FALSE, 
	  ));
	  curl_exec($ch); 
	  return curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
	}
 ?>