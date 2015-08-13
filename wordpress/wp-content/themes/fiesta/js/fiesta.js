$(document).ready(function(){

	

	
	//Function to preload hover images to prevent flickering problems.
	function preload(arrayOfImages) {
	    $(arrayOfImages).each(function(){
	        $('<img/>')[0].src = this;
	    });
	}

	function scrollToElement(element){
      var target = $(element);
      $('html, body').animate({
        scrollTop: target.offset().top
      }, 1000);
}

	preload([
	    'http://fiestafarms.ca/wp-content/themes/fiesta/images/Hussein_r.jpg',
	    'http://fiestafarms.ca/wp-content/themes/fiesta/images/Tony_r.jpg',
	    'http://fiestafarms.ca/wp-content/themes/fiesta/images/David_r.jpg',
	    'http://fiestafarms.ca/wp-content/themes/fiesta/images/Phil_r.jpg',
	    'http://fiestafarms.ca/wp-content/themes/fiesta/images/Leo_r.jpg'
	]);

	var videos = [
		"http://www.youtube.com/embed/1diRkTjyqBE",
		"http://www.youtube.com/embed/_2AWjtItksE",
		"http://www.youtube.com/embed/2SJlhEYi5_4",
		"http://www.youtube.com/embed/1GsB_D3uVsM",
		"http://www.youtube.com/embed/P8IFeMUZKqQ"
	];

	$("#btnRecipe").click(function(e){
		e.preventDefault();
		if($("#apron-big-vid").attr("src") == videos[0]) {
			window.location = "http://fiestafarms.ca/7570/food/colombian-sweet-bread#content";
		}
		else if($("#apron-big-vid").attr("src") == videos[1]) {
			window.location = "http://fiestafarms.ca/7567/food/chicken-korma#content";
		}
		else if($("#apron-big-vid").attr("src") == videos[2]) {
			window.location = "http://fiestafarms.ca/7565/food/jerk-chicken#content";
		}
		else if($("#apron-big-vid").attr("src") == videos[3]) {
			window.location = "http://fiestafarms.ca/7573/food/brodetto#content";
		}
		else if($("#apron-big-vid").attr("src") == videos[4]) {
			window.location = "http://fiestafarms.ca/7577/food/shrimp-and-lobster-sauce#content";
		}
	});

	//Load a random video into the iframe on document load.
	var randVid = videos[Math.floor(Math.random() * videos.length)];
	$("#apron-big-vid").attr('src', randVid);

	var orig, alt;
	$("#apron-videos li a").click(function(e){
		e.preventDefault();
		$("#apron-big-vid").attr('src', $(this).attr('href'));

	});

	$("#apron-videos li a img").mouseover(function(){
		orig = $(this).attr('src');
		alt = $(this).attr('data-hover-img');
		$(this).attr('src', alt);
		$(this).attr('data-hover-img', orig);
	});

	$("#apron-videos li a img").mouseout(function(){
		orig = $(this).attr('src');
		alt = $(this).attr('data-hover-img');
		$(this).attr('src', alt);
		$(this).attr('data-hover-img', orig);

	});



});

$(window).load(function(){
	$("div.casting-desc").html('Rate This Entry'); //Temp fix because it isn't pulling from the settings correctly
});


