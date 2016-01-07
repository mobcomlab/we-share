<?php

function callInstagram($url){
	$ch = curl_init();
	curl_setopt_array($ch, array(
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_SSL_VERIFYPEER => false,
		CURLOPT_SSL_VERIFYHOST => 2
	));

	$result = curl_exec($ch);
	curl_close($ch);
	return $result;
}

function show_image($results){
	foreach($results['data'] as $item){
	    $image_link = $item['images']['low_resolution']['url'];
	    
	    echo "Url picture : ".$image_link."<br>";
	    echo '<img src="'.$image_link.'" />'."<br>";
	}
}

function show_image_comment($results){
	foreach($results['data'] as $item){
	    $image_link = $item['images']['low_resolution']['url'];
	    
	    echo "Url picture : ".$image_link."<br>";
	    echo '<img src="'.$image_link.'" />'."<br>";

	    $comment_count = $item['comments']['count'];
	    echo "Comment count : ".$comment_count."<br>";
	    $i=0;
	    while ($i < $comment_count) {
	    	$image_comment = $item['comments']['data'][$i]['text'];
	    	echo "Comment ".$i." ".$image_comment."<br>";
	    	$i++;
	    }
	}
}

function show_image_comment_like($results){
	foreach ($results['data'] as $item) {
		// image
		$image_link = $item['images']['low_resolution']['url'];
	    echo "Url picture : ".$image_link."<br>";
	    echo '<img src="'.$image_link.'" />'."<br>";
	    // like
	    $like_count = $item['likes']['count'];
	    echo "Like count : ".$like_count."<br>";
		// comment
	    $comment_count = $item['comments']['count'];
	    echo "Comment count : ".$comment_count."<br>";
	    $i=0;
	    while ($i < $comment_count) {
	    	$image_comment = $item['comments']['data'][$i]['text'];
	    	echo "Comment ".$i." ".$image_comment."<br>";
	    	$i++;
	    }
	}
}

function show_image_comment_like_post($results){
	foreach ($results['data'] as $item) {
		// image
		$image_link = $item['images']['low_resolution']['url'];
	    echo "Url picture : ".$image_link."<br>";
	    echo '<img src="'.$image_link.'" />'."<br>";
	    // like
	    $like_count = $item['likes']['count'];
	    echo "Like count : ".$like_count."<br>";
	    // post of name
	    $post_name = $item['user']['full_name'];
	    echo "Post of name : ".$post_name."<br>";
		// comment
	    $comment_count = $item['comments']['count'];
	    echo "Comment count : ".$comment_count."<br>";
	    $i=0;
	    while ($i < $comment_count) {
	    	$image_comment = $item['comments']['data'][$i]['text'];
	    	echo "Comment ".$i." ".$image_comment."<br>";
	    	$i++;
	    }
	}
}

function show_image_comment_like_post_commentname($results){
	foreach ($results['data'] as $item) {
		// image
		$image_link = $item['images']['low_resolution']['url'];
	    echo "Url picture : ".$image_link."<br>";
	    echo '<img src="'.$image_link.'" />'."<br>";
	    // like
	    $like_count = $item['likes']['count'];
	    echo "Like count : ".$like_count."<br>";
	    // post of name
	    $post_name = $item['user']['full_name'];
	    echo "Post of name : ".$post_name."<br>";
		// comment
	    $comment_count = $item['comments']['count'];
	    echo "Comment count : ".$comment_count."<br>";
	    $i=0;
	    while ($i < $comment_count) {
	    	$image_comment = $item['comments']['data'][$i]['text'];
	    	$comment_name = $item['comments']['data'][$i]['from']['full_name'];
	    	echo "Comment ".$i." ".$image_comment.' by '.$comment_name."<br>";
	    	$i++;
	    }
	}
}
?>