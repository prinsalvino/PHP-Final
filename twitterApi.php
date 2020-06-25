<?php
require "twitterapi/vendor/autoload.php";
include "header.php";

use Abraham\TwitterOAuth\TwitterOAuth;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
try {
    $consumer_key = '';
    $consumer_secret = '';
    $access_token = '';
    $access_token_secret = '';
    
    
    $connection = new TwitterOAuth($consumer_key, $consumer_secret, $access_token, $access_token_secret);
    $content = $connection->get("account/verify_credentials");
    echo "My developer account for twitter hasn't been approved so i cant test this api because it requires some keys";

    
    $query = array(
        "q" => "#kobe",
        "count" => 5,
        "result_type" => "recent"
    );
    $tweets = $connection->get('search/tweets', $query);
    echo "<br>";
    print_r($tweets);
    } 
    catch (\Throwable $th) {
        echo "My developer account for twitter hasn't been approved so i cant test this api because it requires some keys";
    }

?>