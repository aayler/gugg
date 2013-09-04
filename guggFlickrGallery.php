<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link style="text/css" media="screen" rel="stylesheet" href="guggFlickr.css" />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script> //link to Google CDN for jQuery library
</head>
<body>
	<?php
		require_once('guggFlickrImg.php');
		include('guggFlickr.php');
	?>
	<div id="banner"></div> <!-- borrowed from Guggenheim site ;) -->
	<div id="nav">
		<ul id="select">
			<li class="active"><a href="#all">All</a></li>
			<li><a href="#museum">Museum</a></li>
			<li><a href="#education">Education</a></li>
		</ul>
	</div>
	<div id="gallery">
		<div id="all"><?php createGallery($allGallery,'all'); ?></div>
		<div id="museum"><?php createGallery($turrellGallery,'jamesturrell'); ?></div>
		<div id="education"><?php createGallery($eduGallery,'education'); ?></div>
	</div>
	<script type="text/javascript" src="gugg.js"></script>
</body>
</html>
