<?php
/*
* GuggFlickrImg.php
*
* GuggFlickrImg class file
* @version 4-September-2013
*/
class GuggFlickrImg {
	/* @var string title, link to Flickr image, image source, published date, @var array tags list */
	public $title, $imglink, $media, $imgdate, $tags = array();
	
	/* initialize GuggFlickrImg with selected fields from Flickr photostream through their API */
	public function __construct($input = 'false') {
		if(is_array($input)) {
			foreach($input as $key=>$value) {
				$this->$key = $value;
			}
		}
	}
	
	public function showImage($tagterm) {
	/* method to prepare Flickr data for HTML output */
		$tagclass = implode(" ", $this->tags);
		$imgobj = '<li class="'.$tagclass.'">';
		foreach($this->tags as $key=>$tag) {
			$formatdate = substr($this->imgdate,0,10); //excerpt to prepare for date output
			$formatdate = strtotime($formatdate);
			$postdate = date('l, j F Y', $formatdate);
			if($tagterm == $tag) {
				$imgobj .= '<a href="'.$this->imglink.'"><img src="'.$this->media.'" /></a><div><p class="caption">'.$this->title.'</p><p class="postdate">'.$postdate.'</div>';
			}
		}
		$imgobj .= '</li>';
		return $imgobj;
	}
}
?>
