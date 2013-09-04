<?php
require_once('guggFlickrImg.php');

function decodeJson($url,$tags) {
	$fullurl = $url.'&tags='.$tags;
	$flickr_json = file_get_contents($fullurl);
	$clean_json = strip_tags($flickr_json); //clean for valid JSON
	$clean_json = stripcslashes($clean_json); 
	$gugg_flickr = json_decode($clean_json);
	return $gugg_flickr;
}

function initGallery($newarray) {
//create instance of new object and place in array
	$initarray = array();
	foreach($newarray->items as $key=>$item) {
			$alltags = $item->tags." all";
			$tagarray = explode(" ",$alltags);
			$initarray[] = new GuggFlickrImg(array('title'=>$item->title,'imglink'=>$item->link,'media'=>$item->media->m,'imgdate'=>$item->date_taken,'tags'=>$tagarray)); 
		}
	return $initarray;
}

function createGallery($gallery,$searchtag) {
//create images to populate the image gallery
	$ulist = '<ul class="imageset">';
	foreach($gallery as $newgallery) {
		$ulist .= $newgallery->showImage($searchtag);
	}
	$ulist .= '</ul>';
	echo $ulist;
}

//JSON feed request via twitter API using tag terms
$turrellFlickr = decodeJson('http://ycpi.api.flickr.com/services/feeds/photos_public.gne?id=67725727@N00&format=json&nojsoncallback=1','jamesturrell');	
$eduFlickr = decodeJson('http://ycpi.api.flickr.com/services/feeds/photos_public.gne?id=67725727@N00&format=json&nojsoncallback=1','education'); 

$turrellGallery = initGallery($turrellFlickr); 
$eduGallery = initGallery($eduFlickr);

$allGallery = array_merge($turrellGallery, $eduGallery);
?>

