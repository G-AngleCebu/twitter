<?php 	
	date_default_timezone_set('Asia/Tokyo');

	function formatDate($date){
		$y = date('Y', strtotime($date));
		$m = date('m', strtotime($date));
		$d = date('d', strtotime($date));

		$fdate = $y.'年'.$m.'月'.$d.'日';
		return $fdate;
	}

	function randomStringGenerator(){
		$length = 20;
		$characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$charLen = strlen($characters);
		$randomString = "";
			for($i = 0; $i < $length; $i++){
				$randomString .= $characters[rand(0, $charLen -1)];
			}
		return $randomString;
	}

	function formatFooter($tweet){
		include_once "formatJapaneseDate.php";

		$retweet_user = $tweet->user->name;
		$retweet_date = formatRetweetTime($tweet->created_at);

		$footer = '<p class="retweet_user">retweeted by '.$retweet_user.'</p>
								<p class="retweet_time">retweeted at '.$retweet_date.'</p>
					</div></div>';
		return $footer;
	}

	function formatRetweetTime($date){
		return date('H:i:s', strtotime($date));
	}

	function headerFormat($tweet){
		$post_date = formatDate($tweet->created_at);
		$prof_img_url = $tweet->user->profile_image_url;
		$screen_name = $tweet->user->screen_name; //@algeki_info
		$user_name = $tweet->user->name; //劇団アルタイル公式
		$tweet_id = $tweet->id;

		$header = '<p class="post_story-icon">
					<a href="https://twitter.com/'.$screen_name.'?lang=ja" target="_blank">
					<img src="'.$prof_img_url.'" alt="alive-test" width="65" height="65" /><!--icon-->
					</a>
					</p>
					<div class="article_story">
					<h2>
					<a href="https://twitter.com/'. $screen_name .'?lang=ja" target="_blank">'.$user_name.' @'.$screen_name.'</a><!--User Name-->
					<span class="story_date"><a href="https://twitter.com/'.$screen_name.'/status/'.$tweet_id.'" target="_blank">'.$post_date.'</a></span><!--Tweet date-->
					</h2>
					<!--<p class="story_cat">★アル劇</p>--><!--keyword-->';

		return $header;
	}

	function headerFormat_reply($tweet){
		$post_date = formatDate($tweet->created_at);
		$prof_img_url = $tweet->user->profile_image_url;
		$screen_name = $tweet->user->screen_name; //@algeki_info
		$reply_to_screen_name = $tweet->in_reply_to_screen_name;
		$user_name = $tweet->user->name; //劇団アルタイル公式
		$tweet_id = $tweet->id;

		$header = '<p class="post_story-icon">
					<a href="https://twitter.com/'.$screen_name.'?lang=ja" target="_blank">
					<img src="'.$prof_img_url.'" alt="alive-test" width="65" height="65" /><!--icon-->
					</a>
					</p>
					<div class="article_story">
					<h2>
					<a href="https://twitter.com/'.$screen_name.'?lang=ja" target="_blank">'.$user_name.' @'.$screen_name.'</a><!--User Name-->
					<span class="story_date"><a href="https://twitter.com/'.$screen_name.'/status/'.$tweet_id.'" target="_blank">'.$post_date.'</a></span><!--Tweet date-->
					</h2>

					<a href="https://twitter.com/'.$reply_to_screen_name.'" class="tweet-reply">@'.$reply_to_screen_name.'</a> ';

		return $header;
	}

	function headerFormat_retweet($tweet){ // FOR B
		$retweet_imgsrc = $tweet->retweeted_status->user->profile_image_url;
		// $retweet_urls = "https://".$tweet->retweeted_status->entities->media[0]->display_url;
		$retweet_user = $tweet->retweeted_status->user->screen_name;
		$retweet_date = formatRetweetTime($tweet->retweeted_status->created_at);

		$headerB = '<div class="retweet_article">
						<p class="retweet_icon">
							<a href="https://twitter.com/'.$retweet_user.'" target="_blank">
								<img src="'.$retweet_imgsrc.'" width="65" height="65" />
							</a>
						</p>';

		return $headerB;
	}

	function headerFormat_retweetWithComment($tweet){ // FOR C
		$retweet_imgsrc = $tweet->quoted_status->user->profile_image_url;
		// $retweet_urls = "https://".$tweet->quoted_status->entities->media[0]->display_url;
		$retweet_user = $tweet->quoted_status->user->screen_name;
		$retweet_date = formatRetweetTime($tweet->quoted_status->created_at);
		$retweet_quoted_text = extractTweetTextOnly($tweet);

		$headerB = $retweet_quoted_text;
		$headerB .= '<div class="retweet_article">
						<p class="retweet_icon">
							<a href="https://twitter.com/'.$retweet_user.'" target="_blank">
								<img src="'.$retweet_imgsrc.'" width="65" height="65" />
							</a>
						</p>';
		return $headerB;

	}

	// return only text from the tweet->full_text
	// i.e. removing the t.co links
	function extractTweetTextOnly($tweet){
		return substr($tweet->full_text, $tweet->display_text_range[0], $tweet->display_text_range[1]);
	}

	function getMediaUrls_comment($tweet){
		$ct = count($tweet->quoted_status->extended_entities->media);
		$urls = "";

		// for($i=0; $i < $ct; $i++){
		// 	if($tweet->quoted_status->extended_entities->media[$i]->display_url != ''):
		// 		$url = "https://".$tweet->quoted_status->extended_entities->media[$i]->display_url;
		// 		$format = ' <a href="'.$url.'" target="_blank">'.$url.'</a>';
		// 		$urls .= $format;
		// 	endif;
		// }

		$url = "https://".$tweet->quoted_status->extended_entities->media[0]->display_url;
		$urls = ' <a href="'.$url.'" target="_blank">'.$url.'</a>';

		return $urls;
	}

	function getMediaUrls($tweet){
		$ct = count($tweet->retweeted_status->extended_entities->media);
		$urls = "";
		for($i=0; $i < $ct; $i++){
			$url = "https://".$tweet->retweeted_status->extended_entities->media[$i]->display_url;
			$format = ' <a href="'.$url.'" target="_blank">'.$url.'</a>';
			$urls .= $format;
		}
		return $urls;
	}
 ?>