<?php 
	
	function formatTweet_a1($tweet){

		include_once "formatJapaneseDate.php";
		$text = reverseEngineer(expandResult($tweet));
		$header = headerFormat($tweet);
		
		$formatted = $header . '<!--text-->
						'.nl2br($text).'
						<!--text-->
					</div>';

		return $formatted;
	}

	function formatTweet_a2($tweet){
		$text = $tweet->full_text;
		$formatted = formatWithImage($tweet);
		$mediaUrl = $tweet->extended_entities->media[0]->media_url;
		if($mediaUrl != ''){
			$content = file_get_contents($mediaUrl);
			$file_name = randomStringGenerator();
			$path =  "images/" .$file_name. ".jpg";
			file_put_contents($path, $content);
			$imgsrc = "images/".$file_name.".jpg";
			$formatted .= '<div><a class="fancybox img_thum" rel="group" href="'.$mediaUrl.'"><img src="'.$imgsrc.'" alt=""></a></div></section></div></div>';
		}
		
		return $formatted;
	}

	function formatTweet_a3($tweet){
		$formatted = formatWithImage($tweet) . '<section class="twitter_img_02"><div class="left">';
		for($i=0;$i<1;$i++){
			$mediaUrl = $tweet->extended_entities->media[$i]->media_url;
			if($mediaUrl != ''){
				$content = file_get_contents($mediaUrl);
				$file_name = randomStringGenerator();
				$path =  "images/" .$file_name. ".jpg";
				file_put_contents($path, $content);
				$imgsrc = "images/".$file_name.".jpg";
				$formatted .= '<a class="fancybox img_thum" rel="group" href="'.$mediaUrl.'"><img src="'.$imgsrc.'" alt=""></a></div>';
			}
		}
		$formatted .= '<div class="right">';
		for($i=1;$i<2;$i++){
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

		$formatted .= "</div></section></div></div>";
		return $formatted;
	}

	function formatTweet_a4($tweet){
		$formatted = formatWithImage($tweet) . '<section class="twitter_img_03"><div class="left">';
		for($i=0;$i<1;$i++){
			$mediaUrl = $tweet->extended_entities->media[$i]->media_url;
			if($mediaUrl != ''){
				$content = file_get_contents($mediaUrl);
				$file_name = randomStringGenerator();
				$path =  "images/" .$file_name. ".jpg";
				file_put_contents($path, $content);
				$imgsrc = "images/".$file_name.".jpg";
				$formatted .= '<a class="fancybox img_thum" rel="group" href="'.$mediaUrl.'"><img src="'.$imgsrc.'" alt=""></a></div>';
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

	function formatTweet_a5($tweet){
		$formatted = formatWithImage($tweet);
		$formatted .= '<section class="twitter_img_04"><div class="left">';
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


	function formatTweet_a6($tweet){
		include_once "formatJapaneseDate.php";
		$text = expandResult($tweet);

		$header = headerFormat($tweet);
		$videoUrl = $tweet->extended_entities->media[0]->expanded_url;
		$displayUrl = $tweet->extended_entities->media[0]->display_url;
		$mediaUrl = $tweet->extended_entities->media[0]->media_url;
		$formatted = $header . nl2br($text) . '<div class="twitter_movie">
			<a href="'.$videoUrl.'" target="_blank">'.$displayUrl.'</a>
			<img src="'.$mediaUrl.'"></div></div>';

		return $formatted;
	}

	function formatTweet_a7($tweet){
		
		include_once "formatJapaneseDate.php";
		$text = expandResult($tweet);
		$txt = reverseEngineer(breakYoutube($tweet));
		$header = headerFormat($tweet);
		$formatted = $header . nl2br($txt) . "</div>";

		return $formatted;
	}

	function formatTweet_a8($tweet){
		$formatted = formatImageOnly($tweet) ;
		$mediaUrl = $tweet->extended_entities->media[0]->media_url;
		if($mediaUrl != ''){
			$content = file_get_contents($mediaUrl);
			$file_name = randomStringGenerator();
			$path =  "images/" .$file_name. ".jpg";
			file_put_contents($path, $content);
			$imgsrc = "images/".$file_name.".jpg";
			$formatted .= '<section class="twitter_img_01"><div><a class="fancybox img_thum" rel="group" href="'.$mediaUrl.'"><img src="'.$imgsrc.'" alt=""></a></div></section></div></div></div>';
		}

		return $formatted;
	}

	function formatTweet_a9($tweet){
		$formatted = formatImageOnly($tweet).'<section class="twitter_img_02">';
		
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
		for($i=1;$i<2;$i++){
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

		$formatted .= "</div></section></div></div>";
		return $formatted;
	}

	function formatTweet_a10($tweet){
		$formatted = formatImageOnly($tweet) . '<section class="twitter_img_03"><div class="left">';
		$mediaUrl = $tweet->extended_entities->media[0]->media_url;
		if($mediaUrl != ''){
			$content = file_get_contents($mediaUrl);
			$file_name = randomStringGenerator();
			$path =  "images/" .$file_name. ".jpg";
			file_put_contents($path, $content);
			$imgsrc = "images/".$file_name.".jpg";
			$formatted .= '<a class="fancybox img_thum" rel="group" href="'.$mediaUrl.'"><img src="'.$imgsrc.'" alt=""></a>';
		}
		$formatted .= '</div><div class="right">';
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

	function formatTweet_a11($tweet){
		$formatted = formatImageOnly($tweet);
		$formatted .= '<section class="twitter_img_04"><div class="left">';
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

	function formatTweet_a12($tweet){
		$header = headerFormat($tweet);
		$videoUrl = $tweet->extended_entities->media[0]->expanded_url;
		$displayUrl = $tweet->extended_entities->media[0]->display_url;
		$mediaUrl = $tweet->extended_entities->media[0]->media_url;
		$formatted = $header . '<div class="twitter_movie">
			<a href="'.$videoUrl.'" target="_blank">'.$displayUrl.'</a>
			<img src="'.$mediaUrl.'"></div></div>';
		return $formatted;
	}

	function formatTweet_a13($tweet){
		include_once "formatJapaneseDate.php";
		$text = expandResult($tweet);
		$txt = reverseEngineer(breakYoutube($tweet));
		$header = headerFormat($tweet);
		$formatted = $header . nl2br($txt) . "</div>";
		return $formatted;
	}

	function formatWithImage($tweet){
		include_once "formatJapaneseDate.php";
		$header = headerFormat($tweet);
		$text = reverseEngineer(expandResult($tweet));
		
		$formatted = $header.'<!--text-->
						'.nl2br($text).'
						<!--text-->
						<div id="twitter_img-box">';
		return $formatted;
	}

	function formatImageOnly($tweet){
		include_once "formatJapaneseDate.php";
		$header = headerFormat($tweet);
		$formatted = $header.'<div id="twitter_img-box">';
		return $formatted;
	}
 ?>