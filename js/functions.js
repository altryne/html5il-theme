
// masonry code 
$(document).ready(function() {
  $('#post-grid').masonry({
    itemSelector : '.grid-item',
    columnWidth: function( containerWidth ) {
      return containerWidth / 2;
    },
      isResizable : true,
      isAnimated: true,
      animationOptions: {
        duration: 400,
        easing: 'linear',
        queue: false
      }

  });
  	moment.lang('en', {
	    relativeTime : {
	        future: "%s to go",
	        past:   "%s ago",
	        s:  "seconds",
	        m:  "<em>1</em> minute",
	        mm: "<em>%d</em> minutes",
	        h:  "<em>1</em> hour",
	        hh: "<em>%d</em> hours",
	        d:  "<em>1</em> day",
	        dd: "<em>%d</em> days",
	        M:  "<em>1</em> month",
	        MM: "<em>%d</em> months",
	        y:  "<em>1</em> year",
	        yy: "<em>%d</em> years"
	    }
	});
    var past = $.getJSON('/wp-content/themes/gridly/get.php?type=past');
    var future = $.getJSON('/wp-content/themes/gridly/get.php?type=future');

    $.when(past, future).then(function (past, future) {
        console.log('got events from meetup API!');
        var past_meetups = past[0].results;
        var future_meetups = future[0].results;


        if (past_meetups && past_meetups.length) {
            var evt = past_meetups[past_meetups.length - 1],
                parent = $("#meetup").find(".past_event");

            $('#meetup').addClass('past');
            parent.find('time').html(moment(evt.time).fromNow());
            parent.find('h3 a').attr('href', evt.event_url);
        }
        if (future_meetups && future_meetups.length) {
            var evt = future_meetups[0],
                parent = $("#meetup").find(".next_event");

            $('#meetup').addClass('next');
            parent.find('time').html(moment(evt.time).fromNow());
            parent.find('h3 a').attr('href', evt.event_url);
            $('#join').attr('href', evt.event_url);

            var seatsLeft = evt.rsvp_limit - evt.yes_rsvp_count,
                seatsText = seatsLeft + ' seat' + (seatsLeft != 1 ? 's' : '') + ' left';
            parent.find('small').html(seatsText);
        }
    });


    window.setTimeout(function () {
        $('#post-grid').masonry('reload')
    }, 1500);

	$('.preview').on('click',function(){
	    id = $(this).data('youtube');
	    title = $(this).data('title');
		var iframe = $('<iframe></iframe>');
		iframe.attr({
			src : 'http://www.youtube.com/embed/' + id + '?rel=0&showinfo=0&autoplay=1',
			frameborder : 0,
			allowfullscreen : true
		});
		mixpanel.track('VideoPlay',{
			"youtube_id" : id,
			"post_title" : title
		});
		$(this).html(iframe);
	})
});


// hover code for index  templates
$(document).ready(function() {
	
		$('#post-grid').find('.image').hover(
			function() {
				$(this).stop().fadeTo(300, 0.8);
			},
			function() {
				$(this).fadeTo(300, 1.0);
			}
		);

		
	
});


// comment form values
$(document).ready(function(){
	$("#comment-form").find("input").focus(function () {
		var origval = $(this).val();	
		$(this).val("");
		//console.log(origval);
		$("#comment-form").find("input").blur(function () {
			if($(this).val().length === 0 ) {
				$(this).val(origval);	
				origval = null;
			}else{
				origval = null;
            }
        });
	});
});

//$(window).bind('resize', function(){
//
//        var width = $('.body-width').outerWidth();
//
//        /* Make sure we destroy the Isotope when we get to a single column level to reduce stress */
//        if (width >= 768) {
//            if (pb_isotope_on(postGrid) == true) {
//                postGrid.isotope('reLayout');
//            } else {
//                pb_isotope_init(postGrid, 'article');
//            }
//        } else if (pb_isotope_on(postGrid) == true) {
//            postGrid.isotope('destroy');
//        }
//
//        headerHeight = $('.header').height();
//
//    });

// clear text area
$('textarea.comment-input').focus(function() {
   $(this).val('');
});