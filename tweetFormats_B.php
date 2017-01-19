<?php 

error_reporting(0);

	function formatTweet_b1($tweet){
		include_once "formatJapaneseDate.php";
		$header = headerFormat($tweet);
		$headerRetweet = headerFormat_retweet($tweet);
		$footer = formatFooter($tweet);
		$text = reverseEngineer(retweetedExpandUrl($tweet));
		$formatted = $header.$headerRetweet.'<p class="retweet_txt">'.nl2br($text).'</p>
						<!--text-->'.$footer.'
					</div>';

		return $formatted;
	}
 
	function formatTweet_b2($tweet, $text){
		$formatted = formatWithImage_retweet($tweet);
		$footer = formatFooter($tweet);
		$formatted .= '<section class="twitter_img_01">';
		$twitter_img = $tweet->extended_entities->media[0]->media_url;
			if($twitter_img != ''){
					$content = file_get_contents($twitter_img);
					$file_name = randomStringGenerator();
					$path =  "images/" .$file_name. ".jpg";
					file_put_contents($path, $content);
					$imgsrc = "images/".$file_name.".jpg";
			
				$formatted = $formatted.'
								<div>
									<a class="fancybox img_thum" rel="group" href="'.$twitter_img.'">
										<img src="'.$imgsrc.'" alt="">
									</a>
								</div>
							</section>
						</div>
						<!--text-->'.$footer.'
					</div>';

			return $formatted;
		}
	}

	function formatTweet_b3($tweet, $text){
		$footer = formatFooter($tweet);
		$formatted = formatWithImage_retweet($tweet, $text).'<section class="twitter_img_02">
								<div class="left">';

		for($i=0;$i<1;$i++){
			$twitter_img = $tweet->extended_entities->media[$i]->media_url;
			if($twitter_img != ''){
				$content = file_get_contents($twitter_img);
				$file_name = randomStringGenerator();
				$path =  "images/" .$file_name. ".jpg";
				file_put_contents($path, $content);
				$imgsrc = "images/".$file_name.".jpg";
				$formatted .= '<a class="fancybox img_thum" rel="group" href="'.$twitter_img.'">
										<img src="'.$imgsrc.'" alt="">
									</a>
								</div>';
			}
		}

		$formatted .= '<div class="right">';
		for($i=1;$i<2;$i++){
			$twitter_img = $tweet->extended_entities->media[$i]->media_url;
			if($twitter_img != ''){
				$content = file_get_contents($twitter_img);
				$file_name = randomStringGenerator();
				$path =  "images/" .$file_name. ".jpg";
				file_put_contents($path, $content);
				$imgsrc = "images/".$file_name.".jpg";
				$formatted .= '
									<a class="fancybox img_thum" rel="group" href="'.$twitter_img.'">
										<img src="'.$imgsrc.'" alt="">
									</a>
								';
			}
		}
		$formatted .= '</div></section>'.$footer.'</div></div>';
		return $formatted;
	}

	function formatTweet_b4($tweet, $text){
		$footer = formatFooter($tweet);
		$formatted = formatWithImage_retweet($tweet, $text) . '<section class="twitter_img_03">';
		for($i=0;$i<1;$i++){
			$twitter_img = $tweet->extended_entities->media[$i]->media_url;
			if($twitter_img != ''){
				$content = file_get_contents($twitter_img);
				$file_name = randomStringGenerator();
				$path =  "images/" .$file_name. ".jpg";
				file_put_contents($path, $content);
				$imgsrc = "images/".$file_name.".jpg";
				$formatted .= '<div class="left">
									<a class="fancybox img_thum" rel="group" href="'.$twitter_img.'">
										<img src="'.$imgsrc.'" alt="">
									</a>
								</div>';
			}
		}

		$formatted .= '<div class="right">';
		for($i=1;$i<3;$i++){
			$twitter_img = $tweet->extended_entities->media[$i]->media_url;
			if($twitter_img != ''){
				$content = file_get_contents($twitter_img);
				$file_name = randomStringGenerator();
				$path =  "images/" .$file_name. ".jpg";
				file_put_contents($path, $content);
				$imgsrc = "images/".$file_name.".jpg";
				$formatted .= '<a class="fancybox img_thum" rel="group" href="'.$twitter_img.'"><img src="'.$imgsrc.'" alt=""></a>';
			}
		}

		$formatted .= '</div></section>'.$footer.'</div></div>';
		return $formatted;
	}

	function formatTweet_b5($tweet, $text){
		$footer = formatFooter($tweet);
		$formatted = formatWithImage_retweet($tweet, $text) . '<section class="twitter_img_04">';
		
		$formatted .= '<div class="left">';
		for($i=0;$i<2;$i++){
			$twitter_img = $tweet->extended_entities->media[$i]->media_url;
			if($twitter_img != ''){
				$content = file_get_contents($twitter_img);
				$file_name = randomStringGenerator();
				$path =  "images/" .$file_name. ".jpg";
				file_put_contents($path, $content);
				$imgsrc = "images/".$file_name.".jpg";
				$formatted .= '<a class="fancybox img_thum" rel="group" href="'.$twitter_img.'"><img src="'.$imgsrc.'" alt=""></a>';
			}
		}
		$formatted .= '</div><div class="right">';
		for($i=2;$i<4;$i++){
			$twitter_img = $tweet->extended_entities->media[$i]->media_url;
			if($twitter_img != ''){
				$content = file_get_contents($twitter_img);
				$file_name = randomStringGenerator();
				$path =  "images/" .$file_name. ".jpg";
				file_put_contents($path, $content);
				$imgsrc = "images/".$file_name.".jpg";
				$formatted .= '<a class="fancybox img_thum" rel="group" href="'.$twitter_img.'"><img src="'.$imgsrc.'" alt=""></a>';
			}
		}

		$formatted .= '</div></section>'.$footer.'</div></div>';
		return $formatted;
	}

	function formatTweet_b6($tweet, $text){
		$header = headerFormat($tweet);
		$headerRetweet = headerFormat_retweet($tweet);
		$footer = formatFooter($tweet);

		$videoUrl = $tweet->extended_entities->media[0]->expanded_url;
		$displayUrl = $tweet->extended_entities->media[0]->display_url;
		$twitter_img = $tweet->extended_entities->media[0]->media_url;

		$formatted = $header . $headerRetweet . nl2br($text) . '<div class="twitter_movie">
			<a href="'.$videoUrl.'" target="_blank">'.$displayUrl.'</a>
			<img src="'.$twitter_img.'">'.$footer.'</div></div>';
	}

	function formatTweet_b7($tweet, $text){
		$header = headerFormat($tweet);
		$headerRetweet = headerFormat_retweet($tweet);
		$footer = formatFooter($tweet);
		$text = reverseEngineer(breakYoutube($tweet));
		$formatted = $header . $headerRetweet . nl2br($text) . $footer;

		return $formatted;


	}


	function formatTweet_b8($tweet){
		$formatted = formatImageOnly($tweet);
		$footer = formatFooter($tweet);

		$twitter_img = $tweet->extended_entities->media[0]->media_url;
			if($twitter_img != ''){
					$content = file_get_contents($twitter_img);
					$file_name = randomStringGenerator();
					$path =  "images/" .$file_name. ".jpg";
					file_put_contents($path, $content);
					$imgsrc = "images/".$file_name.".jpg";
			
				$formatted .= '<section class="twitter_img_01">
								<div>
									<a class="fancybox img_thum" rel="group" href="'.$twitter_img.'">
										<img src="'.$imgsrc.'" alt="">
									</a>
								</div>
							</section>
						</div>
						<!--text-->'.$footer.'
					</div>';

			return $formatted;
		}
	}

	function formatTweet_b9($tweet){
		$footer = formatFooter($tweet);
		$formatted = formatImageOnly_B($tweet).'<section class="twitter_img_02">';
		
		for($i=0;$i<1;$i++){
			$twitter_img = $tweet->extended_entities->media[$i]->media_url;
			if($twitter_img != ''){
				$content = file_get_contents($twitter_img);
				$file_name = randomStringGenerator();
				$path =  "images/" .$file_name. ".jpg";
				file_put_contents($path, $content);
				$imgsrc = "images/".$file_name.".jpg";
				$formatted .= '<div class="left">
									<a class="fancybox img_thum" rel="group" href="'.$twitter_img.'">
										<img src="'.$imgsrc.'" alt="">
									</a>
								</div>';
			}
		}
		$formatted .= '<div class="right">';
		for($i=1;$i<2;$i++){
			$twitter_img = $tweet->extended_entities->media[$i]->media_url;
			if($twitter_img != ''){
				$content = file_get_contents($twitter_img);
				$file_name = randomStringGenerator();
				$path =  "images/" .$file_name. ".jpg";
				file_put_contents($path, $content);
				$imgsrc = "images/".$file_name.".jpg";
				$formatted .= '<a class="fancybox img_thum" rel="group" href="'.$twitter_img.'">
										<img src="'.$imgsrc.'" alt="">
									</a>';
			}
		}
		$formatted .= '</div></section>'.$footer.'</div></div>';
		return $formatted;
	}

	function formatTweet_b10($tweet){
		$footer = formatFooter($tweet);
		$formatted = formatImageOnly_B($tweet).'<section class="twitter_img_03"><div class="left">';
		
		for($i=0;$i<1;$i++){
			$twitter_img = $tweet->extended_entities->media[$i]->media_url;
			if($twitter_img != ''){
				$content = file_get_contents($twitter_img);
				$file_name = randomStringGenerator();
				$path =  "images/" .$file_name. ".jpg";
				file_put_contents($path, $content);
				$imgsrc = "images/".$file_name.".jpg";
				$formatted .= '<a class="fancybox img_thum" rel="group" href="'.$twitter_img.'">
										<img src="'.$imgsrc.'" alt="">
									</a>';
			}
		}
		$formatted .= '</div><div class="right">';
		for($i=1;$i<3;$i++){
			$twitter_img = $tweet->extended_entities->media[$i]->media_url;
			if($twitter_img != ''){
				$content = file_get_contents($twitter_img);
				$file_name = randomStringGenerator();
				$path =  "images/" .$file_name. ".jpg";
				file_put_contents($path, $content);
				$imgsrc = "images/".$file_name.".jpg";
				$formatted .= '<a class="fancybox img_thum" rel="group" href="'.$twitter_img.'">
										<img src="'.$imgsrc.'" alt="">
									</a>
								';
			}
		}
		$formatted .= '</div></section>'.$footer.'</div></div>';
		return $formatted;
	
	}

	function formatTweet_b11($tweet){
		$footer = formatFooter($tweet);
		$formatted = formatImageOnly($tweet).'<section class="twitter_img_04"><div class="left">';
		
		for($i=0;$i<2;$i++){
			$twitter_img = $tweet->extended_entities->media[$i]->media_url;
			if($twitter_img != ''){
				$content = file_get_contents($twitter_img);
				$file_name = randomStringGenerator();
				$path =  "images/" .$file_name. ".jpg";
				file_put_contents($path, $content);
				$imgsrc = "images/".$file_name.".jpg";
				$formatted .='<a class="fancybox img_thum" rel="group" href="'.$twitter_img.'">
										<img src="'.$imgsrc.'" alt="">
									</a>
								';
			}
		}
		$formatted .= '</div><div class="right">';
		for($i=2;$i<4;$i++){
			$twitter_img = $tweet->extended_entities->media[$i]->media_url;
			if($twitter_img != ''){
				$content = file_get_contents($twitter_img);
				$file_name = randomStringGenerator();
				$path =  "images/" .$file_name. ".jpg";
				file_put_contents($path, $content);
				$imgsrc = "images/".$file_name.".jpg";
				$formatted .= '<a class="fancybox img_thum" rel="group" href="'.$twitter_img.'">
										<img src="'.$imgsrc.'" alt="">
									</a>
								';
			}
		}
		$formatted .= '</div></section>'.$footer.'</div></div>';
		return $formatted;
	}


	function formatTweet_b12($tweet){
		$header = headerFormat($tweet);
		$headerRetweet = headerFormat_retweet($tweet);
		$footer = formatFooter($tweet);

		$videoUrl = $tweet->extended_entities->media[0]->expanded_url;
		$displayUrl = $tweet->extended_entities->media[0]->display_url;
		$twitter_img = $tweet->extended_entities->media[0]->media_url;

		$formatted = $header . $headerRetweet . '<div class="twitter_movie">
			<a href="'.$videoUrl.'" target="_blank">'.$displayUrl.'</a>
			<img src="'.$twitter_img.'">'.$footer.'</div></div>';

		return $formatted;
	}

	function formatTweet_b13($tweet, $text){
		$header = headerFormat($tweet);
		$headerRetweet = headerFormat_retweet($tweet);
		$footer = formatFooter($tweet);
		$text = reverseEngineer(breakYoutube($tweet));
		$formatted = $header . $headerRetweet . nl2br($text) . $footer;

		return $formatted;
	}

	function formatWithImage_retweet($tweet){

		include_once "formatJapaneseDate.php";
		$text = reverseEngineer(retweetedExpandUrl($tweet));
		$header = headerFormat($tweet);
		$headerRetweet = headerFormat_retweet($tweet);
		$urls = getMediaUrls($tweet);
		$formatted = $header.$headerRetweet.'<p class="retweet_txt">'.nl2br($text).$urls.'
						</p><div id="twitter_img-box">';
		return $formatted;
	}


	function formatImageOnly_B($tweet){
		include_once "formatJapaneseDate.php";
		$header = headerFormat($tweet) . headerFormat_retweet($tweet);
		$formatted = $header . '<div id="twitter_img-box>';
		return $formatted;
	}

?>