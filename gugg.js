//jQuery function to toggle between navigation tabs
$(document).ready(function() {
	$('div#gallery > div').hide();
	$('div#gallery div:first-child').show();
	$('ul#select li').click(function() {
		var selected = $(this).find('a').attr('href');
		$('ul#select li').removeClass('active');
		$(this).addClass('active');
		$('div#gallery > div').hide();
		$('div' + selected).fadeIn();
		return false;
	});
});