<?php 
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

	echo unshorten_url("https://t.co/v7aT9wAmuo");
 ?>