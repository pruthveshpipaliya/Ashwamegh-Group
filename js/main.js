jQuery(function($) {'use strict',

	//#main-slider
	$(function(){
		$("#show-submenu").hide();
		
		$('#main-slider.carousel').carousel({
			interval: 8000
		});
		$('#hide-submenu').on('click',function() {			        
			$(this).parent().parent().next('.list-group').toggle('slide');
			$(this).hide() ;
			$(this).next('#show-submenu').show() ;
			
		});
		$('#show-submenu').on('click',function() {			        
			$(this).parent().parent().next('.list-group').toggle('slide');
			$(this).hide() ;
			$(this).prev('#hide-submenu').show() ;
			
		});

		$('.mini-submenu').on('click',function(){		
			$(this).next('.list-group').toggle('slide');
			$('.mini-submenu').hide();
		})
		
		$('.list-group-item').on('click', function() {
			var $this = $(this);
			$(this).parent().children('.list-group-item').removeClass('active');
			//$('.active').removeClass('active');
			$this.toggleClass('active')
		})

	});

	// accordian
	$('.accordion-toggle').on('click', function(){
		$(this).closest('.panel-group').children().each(function(){
		$(this).find('>.panel-heading').removeClass('active');
		 });

	 	$(this).closest('.panel-heading').toggleClass('active');
	});
	
	//Initiat WOW JS
	new WOW().init();

	// portfolio filter
	$(window).load(function(){'use strict';
		var $portfolio_selectors = $('.portfolio-filter >li>a');
		var $portfolio = $('.portfolio-items');
		$portfolio.isotope({
			itemSelector : '.portfolio-item',
			layoutMode : 'fitRows'
		});
		
		$portfolio_selectors.on('click', function(){
			$portfolio_selectors.removeClass('active');
			$(this).addClass('active');
			var selector = $(this).attr('data-filter');
			$portfolio.isotope({ filter: selector });
			return false;
		});
	});

	// Contact form
	var form = $('#main-contact-form');
	form.submit(function(event){
		event.preventDefault();
		var form_status = $('<div class="form_status"></div>');
		$.ajax({
			type: 'POST',
			url: $(this).attr('action'),
            data: form.serialize(),
			beforeSend: function(){
				form.prepend( form_status.html('<p><i class="fa fa-spinner fa-spin"></i> Email is sending...</p>').fadeIn() );
			}
		}).done(function(data){
			
			if( data.type == 'CaptchaError' )
			{
				form_status.html('<p class="text-success">' + data.message + '</p>').delay(3000).fadeOut();
			}
			else
			{
				form_status.html('<p class="text-success">' + data.message + '  ' + data.type + '</p>').delay(3000).fadeOut();
				form.trigger('reset') ;
			}
		});
	});
	
	//goto top
	$('.gototop').click(function(event) {
		event.preventDefault();
		$('html, body').animate({
			scrollTop: $("body").offset().top
		}, 500);
	});	

	//Pretty Photo
	$("a[rel^='prettyPhoto']").prettyPhoto({
		social_tools: false
	});	
});

jQuery(document).ready(function(){
	
	var firsttrig = $(this).find('a.list-group-item') ;
	var image_div = $('#image_to_show');
	//image_div.fadeOut() ;
	var selector = firsttrig.attr('data-filter');
	
	$.post( "libs/image_input.php", { ID: selector })
	  .done(function( data ) {
		image_div.empty().append( data );
		 $("a[rel^='prettyPhoto']").prettyPhoto({
			social_tools: false
			
		});	
	  });
	
    jQuery('a.list-group-item').on('click', function(e){    
        //Prevent the link from working as an anchor tag
		e.preventDefault();
        //Make AJAX call to the PHP file/database query
		var image_div = $('#image_to_show');
		//image_div.fadeOut() ;
		var selector = $(this).attr('data-filter');
		
		$.post( "libs/image_input.php", { ID: selector })
		  .done(function( data ) {
			image_div.empty().append( data );
			 $("a[rel^='prettyPhoto']").prettyPhoto({
				social_tools: false
				
			});	
		  });
		//image_div.fadeIn() ;
    });
	
});