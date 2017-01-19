<?php 



	function formatWithImage_C($tweet, $text){
		// echo 'hello';
		include_once "formatJapaneseDate.php";
		$header = headerFormat($tweet) . headerFormat_retweetWithComment($tweet);
		$retweet_urls = getMediaUrls_comment($tweet);
		$text = reverseEngineer(quotedExpandUrl($tweet));
		
		$formatted = $header.'<p class="retweet_txt">
						'.nl2br($text).$retweet_urls.'
						</p>
						<div id="twitter_img-box">';
		return $formatted;
	}

	function formatImageOnly_C($tweet){
		include_once "formatJapaneseDate.php";
		$header = headerFormat($tweet) . headerFormat_retweetWithComment($tweet);
		$formatted = $header . '<div id="twitter_img-box>';
		return $formatted;
	}

	function formatTweet_c1($tweet){
		include_once "formatJapaneseDate.php";
		$text = reverseEngineer(quotedExpandUrl($tweet));
		$header = headerFormat($tweet) . headerFormat_retweetWithComment($tweet);
		$footer = formatFooter($tweet);
		$retweet_urls =$tweet->quoted_status->entities->media[0]->display_url;

		$formatted = $header . '<p class="retweet_txt">' . $text . '<a href="' . $retweet_urls . '" target="_blank">' . $retweet_urls . '</a></p>' . $footer;
		return $formatted;
	}

	function formatTweet_c2($tweet){
		include_once "formatJapaneseDate.php";
		$formatted = formatWithImage_C($tweet, $text) . '<section class="twitter_img_01">';
		$footer = formatFooter($tweet);
		$mediaUrl = $tweet->quoted_status->extended_entitites->media[0]->media_url;

		if($mediaUrl != ''){
			$content = file_get_contents($mediaUrl);
			$file_name = randomStringGenerator();
			$path =  "images/" .$file_name. ".jpg";
			file_put_contents($path, $content);
			$imgsrc = "images/".$file_name.".jpg";
			$formatted .= '<div><a class="fancybox img_thum" rel="group" href="'.$mediaUrl.'"><img src="'.$imgsrc.'" alt=""></a></div></section></div>';
		}

		$formatted .= $footer;

		return $formatted;

	}

	function formatTweet_c3($tweet){
		include_once "formatJapaneseDate.php";
		$formatted = formatWithImage_C($tweet, $text) . '<section class="twitter_img_02">';
		$footer = formatFooter($tweet);
		for($i=0;$i<1;$i++){
			$mediaUrl = $tweet->quoted_status->extended_entities->media[$i]->media_url;
			if($mediaUrl != ''){
				$content = file_get_contents($mediaUrl);
				$file_name = randomStringGenerator();
				$path =  "images/" .$file_name. ".jpg";
				file_put_contents($path, $content);
				$imgsrc = "images/".$file_name.".jpg";
				$formatted .= '<div class="left"><a class="fancybox img_thum" rel="group" href="'.$mediaUrl.'"><img src="'.$imgsrc.'" alt=""></a></div>';
			}
		}
		for($i=1;$i<2;$i++){
			$mediaUrl = $tweet->quoted_status->extended_entities->media[$i]->media_url;
			if($mediaUrl != ''){
				$content = file_get_contents($mediaUrl);
				$file_name = randomStringGenerator();
				$path =  "images/" .$file_name. ".jpg";
				file_put_contents($path, $content);
				$imgsrc = "images/".$file_name.".jpg";
				$formatted .= '<div class="right"><a class="fancybox img_thum" rel="group" href="'.$mediaUrl.'"><img src="'.$imgsrc.'" alt=""></a></div>';
			}
		}

		$formatted .= $footer;
		return $formatted;
	}

	function formatTweet_c4($tweet){
		include_once "formatJapaneseDate.php";
		$formatted = formatWithImage_C($tweet, $text) . '<section class="twitter_img_03">';
		$footer = formatFooter($tweet);
		for($i=0;$i<1;$i++){
			$mediaUrl = $tweet->quoted_status->extended_entities->media[$i]->media_url;
			if($mediaUrl != ''){
				$content = file_get_contents($mediaUrl);
				$file_name = randomStringGenerator();
				$path =  "images/" .$file_name. ".jpg";
				file_put_contents($path, $content);
				$imgsrc = "images/".$file_name.".jpg";
				$formatted .= '<div class="left"><a class="fancybox img_thum" rel="group" href="'.$mediaUrl.'"><img src="'.$imgsrc.'" alt=""></a></div>';
			}
		}

		$formatted .= '<div class="right">';
		for($i=1;$i<3;$i++){
			$mediaUrl = $tweet->quoted_status->extended_entities->media[$i]->media_url;
			if($mediaUrl != ''){
				$content = file_get_contents($mediaUrl);
				$file_name = randomStringGenerator();
				$path =  "images/" .$file_name. ".jpg";
				file_put_contents($path, $content);
				$imgsrc = "images/".$file_name.".jpg";
				$formatted .= '<a class="fancybox img_thum" rel="group" href="'.$mediaUrl.'"><img src="'.$imgsrc.'" alt=""></a>';
			}
		}

		$formatted .= '</div></section></div>'.$footer;
		return $formatted;
	}

	function formatTweet_c5($tweet){
		include_once "formatJapaneseDate.php";
		$formatted = formatWithImage_C($tweet, $text) . '<section class="twitter_img_04">';
		$footer = formatFooter($tweet);
		$formatted .= '<div class="left">';
		for($i=0;$i<2;$i++){
			$mediaUrl = $tweet->quoted_status->extended_entities->media[$i]->media_url;
			if($mediaUrl != ''){
				$content = file_get_contents($mediaUrl);
				$file_name = randomStringGenerator();
				$path =  "images/" .$file_name. ".jpg";
				file_put_contents($path, $content);
				$imgsrc = "images/".$file_name.".jpg";
				$formatted .= '<a class="fancybox img_thum" rel="group" href="'.$mediaUrl.'"><img src="'.$imgsrc.'" alt=""></a>';
			}
		}
		$formatted .= '</div><div class="right">';
		for($i=2;$i<4;$i++){
			$mediaUrl = $tweet->quoted_status->extended_entities->media[$i]->media_url;
			if($mediaUrl != ''){
				$content = file_get_contents($mediaUrl);
				$file_name = randomStringGenerator();
				$path =  "images/" .$file_name. ".jpg";
				file_put_contents($path, $content);
				$imgsrc = "images/".$file_name.".jpg";
				$formatted .= '<a class="fancybox img_thum" rel="group" href="'.$mediaUrl.'"><img src="'.$imgsrc.'" alt=""></a>';
			}
		}
		$formatted .= '</div></section></div>'.$footer;

		return $formatted;
	}

	function formatTweet_c6($tweet){
		$header = headerFormat($tweet) . headerFormat_retweetWithComment($tweet);
		$footer = formatFooter($tweet);
		$videoUrl = $tweet->quoted_status->extended_entities->media[0]->expanded_url;
		$displayUrl = $tweet->quoted_status->extended_entities->media[0]->display_url;
		$mediaUrl = $tweet->quoted_status->extended_entities->media[0]->media_url;

		$formatted = $header . '<p class="retweet_txt">'
					.nl2br($text).'</p><div class="twitter_movie"><a href="'.$videoUrl.'" target="_blank">'.$displayUrl.'</a><img src="'.$mediaUrl.'"></div>'.$footer;

		return $formatted;
	}

	function formatTweet_c7($tweet){
		include_once "formatJapaneseDate.php";
		
		$text = quotedExpandUrl($tweet);
		$header = headerFormat($tweet) . headerFormat_retweetWithComment($tweet);
		$footer = formatFooter($tweet);
		$youtubeUrl = $tweet->quoted_status->entities->urls[0]->expanded_url;
		$formatted = $header . $youtubeUrl . $footer;

		return $formatted;
	}

	function formatTweet_c8($tweet){
		$formatted = $formatImageOnly_C($tweet) . '<section class="twitter_img_01">';
		$footer = formatFooter($tweet);
		$mediaUrl = $tweet->quoted_status->extended_entities->media[0]->media_url;
		if($mediaUrl != ''){
			$content = file_get_contents($mediaUrl);
			$file_name = randomStringGenerator();
			$path =  "images/" .$file_name. ".jpg";
			file_put_contents($path, $content);
			$imgsrc = "images/".$file_name.".jpg";
			$formatted .= '<div><a class="fancybox img_thum" rel="group" href="'.$mediaUrl.'"><img src="'.$imgsrc.'" alt=""></a></div></section></div>'.$footer;
		}

		return $formatted;
	}

	function formatTweet_c9($tweet){
		$formatted = $formatImageOnly_C($tweet) . '<section class="twitter_img_02">';
		$footer = formatFooter($tweet);
		$mediaUrl = $tweet->quoted_status->extended_entities->media[0]->media_url;
		if($mediaUrl != ''){
			$content = file_get_contents($mediaUrl);
			$file_name = randomStringGenerator();
			$path =  "images/" .$file_name. ".jpg";
			file_put_contents($path, $content);
			$imgsrc = "images/".$file_name.".jpg";
			$formatted .= '<div class="left"><a class="fancybox img_thum" rel="group" href="'.$mediaUrl.'"><img src="'.$imgsrc.'" alt=""></a></div>';
		}
		$formatted .= '<div class="right">';
		for($i=1;$i<2;$i++){
			$mediaUrl = $tweet->quoted_status->extended_entities->media[$i]->media_url;
			if($mediaUrl != ''){
				$content = file_get_contents($mediaUrl);
				$file_name = randomStringGenerator();
				$path =  "images/" .$file_name. ".jpg";
				file_put_contents($path, $content);
				$imgsrc = "images/".$file_name.".jpg";
				$formatted .= '<a class="fancybox img_thum" rel="group" href="'.$mediaUrl.'"><img src="'.$imgsrc.'" alt=""></a>';
			}
		}

		$formatted .= "</div></section></div>".$footer;
		return $formatted;
	}

	function formatTweet_c10($tweet){
		$formatted = $formatImageOnly_C($tweet).'<section class="twitter_img_03">';
		$footer = formatFooter($tweet);

		$mediaUrl = $tweet->quoted_status->extended_entities->media[0]->media_url;
		if($mediaUrl != ''){
			$content = file_get_contents($mediaUrl);
			$file_name = randomStringGenerator();
			$path =  "images/" .$file_name. ".jpg";
			file_put_contents($path, $content);
			$imgsrc = "images/".$file_name.".jpg";
			$formatted .= '<div class="left"><a class="fancybox img_thum" rel="group" href="'.$mediaUrl.'"><img src="'.$imgsrc.'" alt=""></a></div>';
		}
		$formatted .= '<div class="right">';
		for($i=1;$i<3;$i++){
			$mediaUrl = $tweet->quoted_status->extended_entities->media[$i]->media_url;
			if($mediaUrl != ''){
				$content = file_get_contents($mediaUrl);
				$file_name = randomStringGenerator();
				$path =  "images/" .$file_name. ".jpg";
				file_put_contents($path, $content);
				$imgsrc = "images/".$file_name.".jpg";
				$formatted .= '<a class="fancybox img_thum" rel="group" href="'.$mediaUrl.'"><img src="'.$imgsrc.'" alt=""></a>';
			}
		}

		$formatted .= "</div></section></div>".$footer;
		return $formatted;
	}

	function formatTweet_c11($tweet){
		$formatted = $formatImageOnly_C($tweet) . '<section class="twitter_img_04">';
		$footer = formatFooter($tweet);

		$formatted .= '<div class="left">';
		for($i=0;$i<2;$i++){
			$mediaUrl = $tweet->quoted_status->extended_entities->media[$i]->media_url;
			if($mediaUrl != ''){
				$content = file_get_contents($mediaUrl);
				$file_name = randomStringGenerator();
				$path =  "images/" .$file_name. ".jpg";
				file_put_contents($path, $content);
				$imgsrc = "images/".$file_name.".jpg";
				$formatted .= '<div class="left"><a class="fancybox img_thum" rel="group" href="'.$mediaUrl.'"><img src="'.$imgsrc.'" alt=""></a></div>';
			}
		}
		$formatted .= '</div><div class="right">';
		for($i=2;$i<4;$i++){
			$mediaUrl = $tweet->quoted_status->extended_entities->media[$i]->media_url;
			if($mediaUrl != ''){
				$content = file_get_contents($mediaUrl);
				$file_name = randomStringGenerator();
				$path =  "images/" .$file_name. ".jpg";
				file_put_contents($path, $content);
				$imgsrc = "images/".$file_name.".jpg";
				$formatted .= '<a class="fancybox img_thum" rel="group" href="'.$mediaUrl.'"><img src="'.$imgsrc.'" alt=""></a>';
			}
		}
		$formatted .= '</div></section></div>'.$footer;
		return $formatted;
	}


	function formatTweet_c12($tweet){
		$header = headerFormat($tweet) . headerFormat_retweetWithComment($tweet);
		$footer = formatFooter($tweet);
		$videoUrl = $tweet->quoted_status->extended_entities->media[0]->expanded_url;
		$displayUrl = $tweet->quoted_status->extended_entities->media[0]->display_url;
		$mediaUrl = $tweet->quoted_status->extended_entities->media[0]->media_url;
	
		$formatted = $header . '<p class="retweet_txt">'
					.$text.'</p><div class="twitter_movie"><a href="'.$videoUrl.'" target="_blank">'.$displayUrl.'</a><img src="'.$mediaUrl.'"></div>'.$footer;

		return $formatted;
	}

	function formatTweet_c13($tweet){
		$text = quotedExpandUrl($tweet);
		
		$header = headerFormat($tweet) . headerFormat_retweetWithComment($tweet);
		$footer = formatFooter($tweet);
		$text = reverseEngineer(breakYoutube($tweet));
		$formatted = $header . nl2br($text) . $footer;
	}

 ?>