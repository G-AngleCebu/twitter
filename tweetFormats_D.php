<?php 

	function formatWithImage_D($tweet, $text){

		include_once "formatJapaneseDate.php";
		$header = headerFormat_reply($tweet);
		$text = reverseEngineer(expandResult($tweet));
		$formatted = $header . nl2br($text) . '<div id="twitter_img-box">';

		return $formatted;
	}

	function formatImageOnly_D($tweet){
		include_once "formatJapaneseDate.php";
		$header = headerFormat_reply($tweet);
		$formatted = $header.'<div id="twitter_img-box">';
		return $formatted;
	}

	function formatTweet_d1($tweet) {
		include_once "formatJapaneseDate.php";
		$text = reverseEngineer(expandResult($tweet));

		$header = headerFormat_reply($tweet);
		$formatted = $header . nl2br($text)."</div>";
		return $formatted;
	}

	function formatTweet_d2($tweet, $text){
		$formatted = formatWithImage_D($tweet, $text).'<section class="twitter_img_01">';
		$mediaUrl = $tweet->extended_entities->media[0]->media_url;
		if($mediaUrl != ''){
			$content = file_get_contents($mediaUrl);
			$file_name = randomStringGenerator();
			$path =  "images/" .$file_name. ".jpg";
			file_put_contents($path, $content);
			$imgsrc = "images/".$file_name.".jpg";
			$formatted .= '<div>
							<a class="fancybox img_thum" rel="group" href="'.$mediaUrl.'">
								<img src="'.$imgsrc.'" alt="">
							</a>
							</div>
							</section>
							</div>
							</div>';

		}

		return $formatted;

	}

	function formatTweet_d3($tweet, $text){
		$formatted = formatWithImage_D($tweet, $text) . '<section class="twitter_img_02">';
		for($i=0;$i<1;$i++){
			$mediaUrl = $tweet->extended_entities->media[$i]->media_url;
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
			$mediaUrl = $tweet->extended_entities->media[$i]->media_url;
			if($mediaUrl != ''){
				$content = file_get_contents($mediaUrl);
				$file_name = randomStringGenerator();
				$path =  "images/" .$file_name. ".jpg";
				file_put_contents($path, $content);
				$imgsrc = "images/".$file_name.".jpg";
				$formatted .= '<div class="right"><a class="fancybox img_thum" rel="group" href="'.$mediaUrl.'"><img src="'.$imgsrc.'" alt=""></a></div>';
			}
		}

		$formatted .= "</section></div></div>";
		return $formatted;
	}

	function formatTweet_d4($tweet, $text){
		$formatted = formatWithImage_D($tweet, $text).'<section class="twitter_img_03">';
		for($i=0;$i<1;$i++){
			$mediaUrl = $tweet->extended_entities->media[$i]->media_url;
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
			$mediaUrl = $tweet->extended_entities->media[$i]->media_url;
			if($mediaUrl != ''){
				$content = file_get_contents($mediaUrl);
				$file_name = randomStringGenerator();
				$path =  "images/" .$file_name. ".jpg";
				file_put_contents($path, $content);
				$imgsrc = "images/".$file_name.".jpg";
				$formatted .= '<a class="fancybox img_thum" rel="group" href="'.$mediaUrl.'"><img src="'.$imgsrc.'" alt=""></a>';
			}
		}

		$formatted .= '</div></section></div></div>';
		return $formatted;
	}

	function formatTweet_d5($tweet, $text){
		$formatted = formatWithImage_D($tweet, $text).'<section class="twitter_img_04">';
		$formatted .= '<div class="left">';
		for($i=0;$i<2;$i++){
			$mediaUrl = $tweet->extended_entities->media[$i]->media_url;
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
			$mediaUrl = $tweet->extended_entities->media[$i]->media_url;
			if($mediaUrl != ''){
				$content = file_get_contents($mediaUrl);
				$file_name = randomStringGenerator();
				$path =  "images/" .$file_name. ".jpg";
				file_put_contents($path, $content);
				$imgsrc = "images/".$file_name.".jpg";
				$formatted .= '<a class="fancybox img_thum" rel="group" href="'.$mediaUrl.'"><img src="'.$imgsrc.'" alt=""></a>';
			}
		}

		$formatted .= '</div></section></div></div>';
		return $formatted;
	}

	function formatTweet_d6($tweet, $text) {
		include_once "formatJapaneseDate.php";
		$header = headerFormat_reply($tweet);
		$videoUrl = $tweet->extended_entities->media[0]->expanded_url;
		$displayUrl = $tweet->extended_entities->media[0]->display_url;
		$mediaUrl = $tweet->extended_entities->media[0]->media_url;
		$text = extractTweetTextOnly($tweet);
		
		$formatted = $header . nl2br($text) . '<div class="twitter_movie">
			<a href="'.$videoUrl.'" target="_blank">'.$displayUrl.'</a>
			<img src="'.$mediaUrl.'"></div></div>';

		return $formatted;
	}

	function formatTweet_d7($tweet, $text){
		include_once "formatJapaneseDate.php";
		$header = headerFormat($tweet);
		$text = reverseEngineer(breakYoutube($tweet));

		$formatted = $header . nl2br($text) . "</div>";

		return $formatted;
	}

	function formatTweet_d8($tweet){
		$formatted = formatImageOnly_D($tweet).'<section class="twitter_img_01">';
		$mediaUrl = $tweet->extended_entities->media[0]->media_url;
		if($mediaUrl != ''){
			$content = file_get_contents($mediaUrl);
			$file_name = randomStringGenerator();
			$path =  "images/" .$file_name. ".jpg";
			file_put_contents($path, $content);
			$imgsrc = "images/".$file_name.".jpg";
			$formatted .= '<div><a class="fancybox img_thum" rel="group" href="'.$mediaUrl.'"><img src="'.$imgsrc.'" alt=""></a></div></section></div></div></div>';
		}

		return $formatted;
	}

	function formatTweet_d9($tweet){
		$formatted = formatImageOnly_D($tweet).'<section class="twitter_img_02">';
		$mediaUrl = $tweet->extended_entities->media[0]->media_url;
		if($mediaUrl != ''){
			$content = file_get_contents($mediaUrl);
			$file_name = randomStringGenerator();
			$path =  "images/" .$file_name. ".jpg";
			file_put_contents($path, $content);
			$imgsrc = "images/".$file_name.".jpg";
			$formatted .= '<div class="left"><a class="fancybox img_thum" rel="group" href="'.$mediaUrl.'"><img src="'.$imgsrc.'" alt=""></a></div>';
		}
		
		for($i=1;$i<2;$i++){
			$mediaUrl = $tweet->extended_entities->media[$i]->media_url;
			if($mediaUrl != ''){
				$content = file_get_contents($mediaUrl);
				$file_name = randomStringGenerator();
				$path =  "images/" .$file_name. ".jpg";
				file_put_contents($path, $content);
				$imgsrc = "images/".$file_name.".jpg";
				$formatted .= '<div class="right"><a class="fancybox img_thum" rel="group" href="'.$mediaUrl.'"><img src="'.$imgsrc.'" alt=""></a></div>';
			}
		}

		$formatted .= "</section></div></div>";
		return $formatted;
	}

	function formatTweet_d10($tweet){
		$formatted = formatImageOnly_D($tweet).'<section class="twitter_img_03">';
		$mediaUrl = $tweet->extended_entities->media[0]->media_url;
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
			$mediaUrl = $tweet->extended_entities->media[$i]->media_url;
			if($mediaUrl != ''){
				$content = file_get_contents($mediaUrl);
				$file_name = randomStringGenerator();
				$path =  "images/" .$file_name. ".jpg";
				file_put_contents($path, $content);
				$imgsrc = "images/".$file_name.".jpg";
				$formatted .= '<a class="fancybox img_thum" rel="group" href="'.$mediaUrl.'"><img src="'.$imgsrc.'" alt=""></a>';
			}
		}
		$formatted .= '</div></section></div></div>';

		return $formatted;	
	}

	function formatTweet_d11($tweet){
		$formatted = formatImageOnly_D($tweet).'<section class="twitter_img_04">';
		$formatted .= '<div class="left">';
		for($i=0;$i<2;$i++){
			$mediaUrl = $tweet->extended_entities->media[$i]->media_url;
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
			$mediaUrl = $tweet->extended_entities->media[$i]->media_url;
			if($mediaUrl != ''){
				$content = file_get_contents($mediaUrl);
				$file_name = randomStringGenerator();
				$path =  "images/" .$file_name. ".jpg";
				file_put_contents($path, $content);
				$imgsrc = "images/".$file_name.".jpg";
				$formatted .= '<a class="fancybox img_thum" rel="group" href="'.$mediaUrl.'"><img src="'.$imgsrc.'" alt=""></a>';
			}
		}

		$formatted .= '</div></section></div></div>';
		return $formatted;
	}

	function formatTweet_d12($tweet){
		$header = headerFormat_reply($tweet);
		$videoUrl = $tweet->extended_entities->media[0]->expanded_url;
		$displayUrl = $tweet->extended_entities->media[0]->display_url;
		$mediaUrl = $tweet->extended_entities->media[0]->media_url;
		$formatted = $header . '<div class="twitter_movie">
			<a href="'.$videoUrl.'" target="_blank">'.$displayUrl.'</a>
			<img src="'.$mediaUrl.'"></div></div>';
		return $formatted;
	}

	function formatTweet_d13($tweet){
		$header = headerFormat($tweet);
		$text = reverseEngineer(breakYoutube($tweet));

		$formatted = $header . nl2br($text) . "</div>";
		return $formatted;
	}
 ?>