<?php 
// key api yt: AIzaSyBBfL9A3VencI_9qgNwFYgc4s4AEGcGrDg
// https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id=UCkXmLjEr95LVtGuIm3l2dPg&key=AIzaSyBBfL9A3VencI_9qgNwFYgc4s4AEGcGrDg
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'https://www.googleapis.com/youtube/v3/search?key=AIzaSyBBfL9A3VencI_9qgNwFYgc4s4AEGcGrDg&channelId=UCkXmLjEr95LVtGuIm3l2dPg&maxResults=1&order=date&part=snippet');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($curl);
curl_close($curl);
$result = json_decode($result);

var_dump($result->items["0"]->id->videoId);
// $ytProfilePicture = $result['items'][0]["snippet"]["thumbnails"]["medium"]["url"];
// $ytTitle = $result['items'][0]["snippet"]['title'];
// $ytSubs = $result['items'][0]["statistics"]["subscriberCount"];
// var_dump($result->items[0]->snippet->thumbnails->medium->url);

?>