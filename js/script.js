$(document).ready(function() {

	$(".main").css({
		opacity: 0
   });
   
   $(".site-header").css({
      opacity: 0,
      position: 'relative',
      top: '-3em'
   });
   
   
   $(".intro h1").css({
      opacity: 0,
      position: 'relative',
      top: '-3em'
   });

      $(".intro h2").css({
      opacity: 0,
      position: 'relative',
      left: '-3em'
   });

   window.myRunloop = jQuery.runloop();
   
   myRunloop.addMap({
   	  '5%': function(){  $(".main").animate( { opacity:1 }, { duration:1000, queue:false } ); },
   	  '10%': function(){  $(".site-header").animate( { opacity:1, top:0 }, { duration:500, queue:false } ); },
      '20%': function(){  $(".intro h1").animate( { opacity:1, top:0 }, { duration:500, queue:false } ); },
      '25%': function(){  $(".intro h2").animate( { opacity:1, left:0 }, { duration:500, queue:false } );  }
   });

   myRunloop.play(8000);
   
   /* intro loop */
   
   /* dribble plugin */
   
   $.jribbble.getShotsByPlayerId('vincentmilliken', function (playerShots) {
				var html = [];
				$.each(playerShots.shots, function (i, shot) {
					html.push('<li> ');
					html.push('<a href="' + shot.url + '">');
					html.push('<img src="' + shot.image_url + '" ');
					html.push('alt="' + shot.title + '"></a></li>');
				});
					
				$('.dribbble-big').html(html.join(''));
			}, {page: 1, per_page: 4});	
			
	$('.dynamo').dynamo()	
	
	
$.jribbble.getShotsByPlayerId('vincentmilliken', function (playerShots) {
		var html = [];
		$.each(playerShots.shots, function (i, shot) {
			html.push('<li> ');
			html.push('<a href="' + shot.url + '">');
			html.push('<img src="' + shot.image_url + '" ');
			html.push('alt="' + shot.title + '"></a></li>');
		});
			
		$('#dribbble').html(html.join(''));
	}, {page: 1, per_page: 8});	
		

});