<?php
require_once 'twitteroauth.php';

date_default_timezone_set("Asia/Tokyo");

define('CONSUMER_KEY', 'qfo8TJlLKD49hdJXqrV7yKPTU');
define('CONSUMER_SECRET', 'd4dm11GrAO7DVOD7afpQmJrtsR1At5stK0qDmtCRkJflRorhat');
define('ACCESS_TOKEN', '168614971-pmsnz4mKwpEl9qQ6mlf4fsNs4VOF1HOIxnssukt4');
define('ACCESS_TOKEN_SECRET', 'k7f1PL8UabqDU7T5prddvTqFg0HWbtGejNVHKtjTjvHEP');

$search_keywords = array('アル劇★','test');
// $search_keywords = array('こんにちは','テスト');
// $search_keywords = array("#mobile", "#app");

function search(array $query){
	
	$toa = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);

	return $toa->get('search/tweets', $query);

	// $array_1 = (array) $toa->get('search/tweets', ["q"=>$query[0]]);
	// $array_2 = (array) $toa->get('search/tweets', ["q"=>$query[1]]);
	// return (object) array_merge($array_1, $array_2);

	// return (object) array_merge((array) $array_1, (array) $array_2);
	// return $toa->get('search/tweets', ["q"=>'劇団アルタイル']);
}

	
/*eunicecode*/

function formatTwitterDate($text) {
	$dt = DateTime::createFromFormat('D M d H:i:s P Y', $text);
	return $dt->format('Y-m-d H:i:s'); 
}


function checkTweetType($tweet){
	if(isset($tweet->retweeted_status)):
		return 'retweet';
	elseif(isset($tweet->quoted_status)):
		return 'comment';
	elseif(isset($tweet->in_reply_to_status_id)):
		return 'reply';
	else:
		return 'tweet';
	endif;
}

include_once "checkTweetFormat.php";
include_once "expandResult.php";
include_once "tweetFormats.php";
include_once "tweetFormats_C.php";
include_once "tweetFormats_D.php";
include_once "tweetFormats_B.php";
/*eunicecode*/

$query = array(
	// "tweet_mode" => "extended",
	"screen_name" => "algeki_info",
	"count" => 100,
	"q" => implode(" OR ", $search_keywords)
);

$results = search($query);
$tweetCt = count($results);
$today = strtotime(date('Y/m/d H:i'));

// echo json_encode($results);exit;

// foreach($results->statuses as $result){
// 	echo checkTweetType($result)."<br>";
// 	echo $result->full_text."<br>";
// 	echo $result->text."<br><br>";
// }
// exit;

foreach ($results->statuses as $result) {
	$tweetDate = $today - strtotime(formatTwitterDate($result->created_at));
	if($tweetDate <= 691200){ 

		$tweet_type = checkTweetType($result);
		$tweetFormat = checkTweetFormat($tweet_type, $result);
		$fulltext1 = expandResult($result);
		$fulltext2 = extendedEntityExpandUrl($result, $fulltext1);
		$fulltext3 = retweetedExpandUrl($result, $fulltext2);
		$fulltext = mediaUrls($result, $fulltext3);

		// for testing
		echo "<hr/>";
		echo "<h1>{$result->id} {$tweet_type} / {$tweetFormat}</h1>";
		// for testing

		switch ($tweetFormat) {
			case 'A1':
				echo formatTweet_a1($result, $fulltext);
				break;
			case 'A2':
				echo formatTweet_a2($result, $fulltext);
				break;
			case 'A3':
				echo formatTweet_a3($result, $fulltext);
				break;
			case 'A4':
				echo formatTweet_a4($result, $fulltext);
				break;
			case 'A5':
				echo formatTweet_a5($result, $fulltext);
				break;
			case 'A6':
				echo formatTweet_a6($result, $fulltext);
				break;
			case 'A7':
				echo formatTweet_a7($result, $fulltext);
				break;
			case 'A8':
				echo formatTweet_a8($result);
				break;
			case 'A9':
				echo formatTweet_a9($result);
				break;
			case 'A10':
				echo formatTweet_a10($result);
				break;
			case 'A11':
				echo formatTweet_a11($result);
				break;
			case 'A12':
				echo formatTweet_a12($result);
				break;
			case 'A13':
				echo formatTweet_a13($result, $fulltext);
				break;
			case 'B1':
				echo formatTweet_b1($result);
				break;
			case 'B2':
				echo formatTweet_b2($result);
				break;
			case 'B3':
				echo formatTweet_b3($result);
				break;
			case 'B4':
				echo formatTweet_b4($result);
				break;
			case 'B5':
				echo formatTweet_b5($result);
				break;
			case 'B6':
				echo formatTweet_b6($result);
				break;
			case 'B7':
				echo formatTweet_b7($result);
				break;
			case 'B8':
				echo formatTweet_b8($result);
				break;
			case 'B9':
				echo formatTweet_b9($result);
				break;
			case 'B10':
				echo formatTweet_b10($result);
				break;
			case 'B11':
				echo formatTweet_b11($result);
				break;
			case 'B12':
				echo formatTweet_b12($result);
				break;
			case 'B13':
				echo formatTweet_b13($result);
				break;
			case 'C1':
				echo formatTweet_c1($result);
				break;
			case 'C2':
				echo formatTweet_c2($result);				
				break;
			case 'C3':
				echo formatTweet_c3($result);				
				break;
			case 'C4':
				echo formatTweet_c4($result);				
				break;
			case 'C5':
				echo formatTweet_c5($result);				
				break;
			case 'C6':
				echo formatTweet_c6($result);				
				break;	
			case 'C7':
				echo formatTweet_c7($result);				
				break;
			case 'C8':
				echo formatTweet_c8($result);				
				break;
			case 'C9':
				echo formatTweet_c9($result);				
				break;
			case 'C10':
				echo formatTweet_c10($result);				
				break;
			case 'C11':
				echo formatTweet_c11($result);				
				break;
			case 'C12':
				echo formatTweet_c12($result);				
				break;
			case 'C13':
				echo formatTweet_c13($result);				
				break;	
			case 'D1':
				echo formatTweet_d1($result, $fulltext);				
				break;
			// case 'D2':
			// 	echo formatTweet_d2($result, $fulltext);				
			// 	break;
			// case 'D3':
			// 	echo formatTweet_d3($result, $fulltext);				
			// 	break;
			// case 'D4':
			// 	echo formatTweet_d4($result, $fulltext);				
			// 	break;
			// case 'D5':
			// 	echo formatTweet_d5($result, $fulltext);				
			// 	break;
			// case 'D6':
			// 	echo formatTweet_d6($result, $fulltext);				
			// 	break;
			// case 'D7':
			// 	echo formatTweet_d7($result, $fulltext);				
			// 	break;
			// case 'D8':
			// 	echo formatTweet_d8($result);				
			// 	break;
			// case 'D9':
			// 	echo formatTweet_d9($result);				
			// 	break;
			// case 'D10':
			// 	echo formatTweet_d10($result);				
			// 	break;
			// case 'D11':
			// 	echo formatTweet_d11($result);				
			// 	break;
			// case 'D12':
			// 	echo formatTweet_d12($result);				
			// 	break;
			// case 'D13':
			// 	echo formatTweet_d13($result, $fulltext);				
			// 	break;

			default:
				echo $fulltext."<br><br>";
				break;
		}
		
	}	
	/*eunicecode*/
}


?>
