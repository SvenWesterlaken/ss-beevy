$(function() {

	var isChallengePage = $('body').is('.ChallengePage');

	var $document = $(document);
	var $element = $('.header-menu');
	var className = 'fixed';

	$(window).on('scroll', function() {
		var scrollTop = $(this).scrollTop();
		var scroll = $(window).scrollTop();


		if (scroll >= 50) {
			$element.addClass(className);
			$('.header-logo').attr('src', '/ss-beevy/public/images/svg/logo-yellow.svg');
		} else {
			$element.removeClass(className);
			$('.header-logo').attr('src', '/ss-beevy/public/images/svg/logo-white.svg');
		}

		$('.content-item').each(function() {
			var topDistance = $(this).offset().top - 310;

			if ( (topDistance) < scrollTop ) {
				$('.content-item').removeClass('active');
				$(this).addClass('active');
			}
		});
	});

	$('#benefit-holder .benefit').first().addClass('active-toggle');
	$('#benefit-holder .benefit h3').click(function(){
		$('#benefit-holder .benefit').removeClass('active-toggle');
		$(this).parent().addClass('active-toggle');
	});

	//$('#faq-holder .faq').first().addClass('active-toggle');
	$('#faq-holder .faq h4').click(function(){
		$('#faq-holder .faq').removeClass('active-toggle');
		$(this).parent().toggleClass('active-toggle');
	});

	if ( ! $('.small-header').find('.header-image').length ){
		$('.small-header').addClass('no-image');
	}

	$('.field_upload').change( function(){
		var filename = $('input[type=file]').val().replace(/C:\\fakepath\\/i, '');
		$('.field_upload .middleColumn').text(filename);
	});

	$('#menu-button').click( function(){
		$(this).toggleClass('clicked');
		$('#navigation').toggleClass('clicked');
		$('.header-menu').toggleClass('clicked');
	});

	if ($(window).width() > 1024) {
		$('#menu-button').removeClass('clicked');
		$('#navigation').removeClass('clicked');
		$('.header-menu').removeClass('clicked');
	}

	$('.selection-wrapper span#toggle-list').click( function() {
		$('.list-box').toggleClass('list-open');
		$(this).toggleClass('stay-open');
	});
	$('.selection-wrapper .list-box > span').click(function(event) {
		event.preventDefault();

		var currentItem = $(this).attr('id');
		var targetDiv = $('div#challenge-content .content-item[id='+currentItem+']');

		$('html, body').animate({
        scrollTop: $(targetDiv).offset().top - 150
		}, 1500);

		$('.list-box').removeClass('list-open');
		$('span#toggle-list').removeClass('stay-open');
	});

	if ( isChallengePage ) {
		var setChallengeName = $('.challenge-name').text();
		localStorage.setItem('challengeName', setChallengeName);

	}
});
