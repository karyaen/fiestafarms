// START OF MIXIT UP FILTERING ======================
// https://mixitup.kunkalabs.com/learn/tutorial/advanced-filtering/

// To keep our code clean and modular, all custom functionality will be contained inside a single object literal called "buttonFilter".
$ = jQuery;

var buttonFilter = {
  
  // Declare any variables we will need as properties of the object
  
  $filters: null,
  $reset: null,
  groups: [],
  outputArray: [],
  outputString: '',
  
  // The "init" method will run on document ready and cache any jQuery objects we will need.
  
  init: function(){
    var self = this; // As a best practice, in each method we will asign "this" to the variable "self" so that it remains scope-agnostic. We will use it to refer to the parent "buttonFilter" object so that we can share methods and properties between all parts of the object.
    
    self.$filters = $('#Filters');
    self.$reset = $('#Reset');
    self.$container = $('#Container');
    
    self.$filters.find('div').each(function(){
      self.groups.push({
        $buttons: $(this).find('.filter-btn'),
        active: ''
      });
    });
    
    self.bindHandlers();
  },
  
  // The "bindHandlers" method will listen for whenever a button is clicked. 
  
  bindHandlers: function(){
    var self = this;
    
    // Handle filter clicks
    
    self.$filters.on('click', '.filter-btn', function(e){
      e.preventDefault();

      $('#Container .error-msg').remove();
      
      var $button = $(this);
      
      // If the button is active, remove the active class, else make active and deactivate others.
      
      $button.hasClass('active') ?
        $button.removeClass('active') :
        $button.addClass('active').siblings('.filter-btn').removeClass('active');
      
      self.parseFilters();
    });
    
    // Handle reset click
    
    self.$reset.on('click', function(e){
      e.preventDefault();

      $('#Container .error-msg').remove();
      
      self.$filters.find('.filter-btn').removeClass('active');
      
      self.parseFilters();
    });
  },
  
  // The parseFilters method checks which filters are active in each group:
  
  parseFilters: function(){
    var self = this;
 
    // loop through each filter group and grab the active filter from each one.
    
    for(var i = 0, group; group = self.groups[i]; i++){
      group.active = group.$buttons.filter('.active').attr('data-filter') || '';
    }
    
    self.concatenate();
  },
  
  // The "concatenate" method will crawl through each group, concatenating filters as desired:
  
  concatenate: function(){
    var self = this;
    
    self.outputString = ''; // Reset output string
    
    for(var i = 0, group; group = self.groups[i]; i++){
      self.outputString += group.active;
    }
    
    // If the output string is empty, show all rather than none:
    
    !self.outputString.length && (self.outputString = 'all'); 
    
    console.log(self.outputString); 
    
    // ^ we can check the console here to take a look at the filter string that is produced
    
    // Send the output string to MixItUp via the 'filter' method:
    
	  if(self.$container.mixItUp('isLoaded')){
    	self.$container.mixItUp('filter', self.outputString);
	  }
  }
};
  


// ============ EXPAND FULL POST

// $('.mix').click(function(e) {
// 	e.preventDefault();

// 	var toparea = $(this).next('.og-expander');

// 	$(this).next('.og-expander').hide().slideDown(800);

// 	$('html, body').animate({
// 		'scrollTop': $(toparea).offset().top + 10
// 	}, 'fast');

// });

$('.og-close').on('click', function(e){ 
  $('.now-open').removeClass('now-open');
	$('.og-expander').fadeOut(500);
});




// ====================== LIGHTBOX APPLICATION

var lightboxInfo = { };

// when a single post container is clicked
lightboxInfo.events = jQuery( function( $ ) {
  $( '.mix' ).on( 'click', function ( e ) {
    e.preventDefault(); 

     var toparea = $(this).next('.og-expander');

     $(toparea).addClass('now-open');
     
     $(this).next('.og-expander').hide().slideDown(800);

     $('html, body').animate({
       'scrollTop': $(toparea).offset().top + 10
     }, 'fast');

     lightboxInfo.grabid($(this));
  });
});


// grab the id from the data attribute and pass it on
lightboxInfo.grabid = function($thepost) {
  var $theid = $thepost.data('postid');

  lightboxInfo.getcontent($theid);
};

// use the API to grab the post info
lightboxInfo.getcontent = function($theid){

  var currenturl = window.location.href; 
  // console.log(currenturl);

  if ( currenturl !== 'http://hypelabs.ca/dev/apron-strings/' || currenturl !== 'http://hypelabs.ca/dev/fiestafarms/'  ) {

    var hype = '';

  } else {

    var hype = '/dev/apron-strings';

  }

  $.ajax( {
      url: hype + '/wp-json/wp/v2/posts/' + $theid, 
      //this needs to be '/dev/apron-strings/wp-json/posts/' on hypelabs
      success: function ( res ) {
        console.log(res);
        lightboxInfo.printInfo(res);
      },
      cache: false
    } );
};


// print a post in the proper container
lightboxInfo.printInfo = function(thepost) {
    var $title      = $('<h2>').html('<a href="' + thepost.link + '" target="_blanks">' + thepost.title.rendered + '</a>');
    var $thedate    = $('<p>'). html(thepost.date);
    var $content    = $('<div>').addClass('the-post').html(thepost.content.rendered); 
    var $closebot   = $('<div>').addClass('og-close-bottom').text('CLOSE');

    $('.now-open .og-expander-inner .og-details').append($title, $content, $closebot);

    $('.og-close-bottom').on('click', function(e){ 
    var parentdiv = $(this).parent();

    $('.og-expander').fadeOut(500);

    $('html, body').animate({
      'scrollTop': $(parentdiv).offset().top - 300
    }, 'fast');

    });
};


// initialize lightboxInfo events
lightboxInfo.init = function() {
  lightboxInfo.events();
};


// ============= On document ready
$(function(){

  $("#tabs").tabs();

  // $('.container').children('.mix').each(function(i) {
  //   if(i > 9){ // check the first index and add 
  //     $(this).addClass('init-hide');
  //   }
  // });

  // $('.init-hide').hide(100);
      
  // Initialize buttonFilter code
      
  buttonFilter.init();
      
  // Instantiate MixItUp
      
  $('#Container').mixItUp({
    selectors: {
        filter: 'filter-btn'
    },
    pagination: {
        limit: 10
    },
    controls: {
        enable: true //default
    },
    callbacks: {
      onMixFail: function(){
        // alert('No items were found matching the selected filters.');
        var $errormsg = $('<h3>').addClass('error-msg').html('Oops! No items were found matching the selected filters.');
        $('#Container').append($errormsg);
      }
    }
  });    
});

// Youtube Video
var tag = document.createElement('script');

tag.src = "//www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

var player;

function onYouTubeIframeAPIReady() {
    player = new YT.Player('ytplayer', {
        events: {
            'onReady': onPlayerReady
        }
    });
}

function onPlayerReady() {
    player.playVideo();
    // Mute!
    player.mute();
    player.seekTo(7);

}