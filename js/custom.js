(function($) {
	
	//01. Cache jQuery Selector
	var $window		= $(window),
		$header		= $('#header'),					// Update Header Style + Scroll to Top
        $dropdown  = $('.dropdown-toggle'),
		$image_slider = $('.image-gallery')
	
	
	
	
	// 02. Update Header Style + Scroll to Top
	function headerStyle() {
		if($header.length){
			var windowpos = $window.scrollTop();
			if (windowpos >= 100) {
				$header.addClass('fixed-top');
			} else {
				$header.removeClass('fixed-top');
			}
		}
	}
	
	// 03. Preloader For Hide loader
	function handlePreloader() {
		if($('.preloader').length){
			$('.preloader').delay(500).fadeOut(500);
			$('body').removeClass('page-load');
		}
	}
	
	// 04. dropdown submenu on hover in desktopand dropdown sub menu on click in mobile	
	$('#navbarSupportedContent').each(function() {
		$dropdown.on('click', function(e){
			if($window.width() < 1100){
				if($(this).parent('.dropdown').hasClass('visible')){
				//	$(this).parent('.dropdown').children('.dropdown-menu').first().stop(true, true).slideUp(300);
				//	$(this).parent('.dropdown').removeClass('visible');
					window.location = $(this).attr('href');
				}
				else{
					e.preventDefault();
					$(this).parent('.dropdown').siblings('.dropdown').children('.dropdown-menu').slideUp(300);
					$(this).parent('.dropdown').siblings('.dropdown').removeClass('visible');
					$(this).parent('.dropdown').children('.dropdown-menu').slideDown(300);
					$(this).parent('.dropdown').addClass('visible');
				}
				e.stopPropagation();
			}
		});
		
		$('body').on('click', function(e){
			$dropdown.parent('.dropdown').removeClass('visible');
		});
		
		$window.on('resize', function(){
			if($window.width() > 991){
				$('.dropdown-menu').removeAttr('style');
				$('.dropdown ').removeClass('visible');
			}
		});
		
	});

    // 05. Auto active class adding with navigation
    $window.on('load', function () {
        var current = location.pathname;
        var $path = current.substring(current.lastIndexOf('http://unicoderbd.com/') + 1);
        $('.navbar-nav a').each(function (e) {
            var $this = $(this);
            // if the current path is like this link, make it active
            if ($path == $this.attr('href')) {
                $this.addClass('active');
            } else if ($path == '') {
                $('.navbar-nav li:first-child > a').addClass('active');
            }
        })
    })
	
	
	// 06. Layer slider settings
			
	$('#slider').layerSlider({
		sliderVersion: '6.0.0',
		type: 'fullwidth',
		responsiveUnder: 0,
		layersContainer: 1200,
		maxRatio: 1,
		parallaxScrollReverse: true,
		hideUnder: 0,
		hideOver: 100000,
		skin: 'v5',
		showBarTimer: true,
		thumbnailNavigation: 'disabled',
		allowRestartOnResize: true,
		skinsPath: 'skins/',
		height: 840
	});
	
	
	// 07. Our Doctor Carousel HealthLine
    if ($image_slider.length) {
        $image_slider.owlCarousel({
            loop: true,
            margin: 0,
            nav: false,
            dots: false,
            autoplayHoverPause: false,
            smartSpeed: 300,
            autoplay: true,
            navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1024: {
                    items: 4
                },
                1200: {
                    items: 4
                }
            }
        });
    };
	
	
	// 08. Fact Counter For Achivement Counting
	function factCounter() {
		if($('.fact-counter').length){
			$('.fact-counter .achievement.animated').each(function() {
				var $t = $(this),
					n = $t.find(".counting").attr("data-stop"),
					r = parseInt($t.find(".counting").attr("data-speed"), 10);
					
				if (!$t.hasClass("counted")) {
					$t.addClass("counted");
					$({
						countNum: $t.find(".count-text").text()
					}).animate({
						countNum: n
					}, {
						duration: r,
						easing: "linear",
						step: function() {
							$t.find(".counting").text(Math.floor(this.countNum));
						},
						complete: function() {
							$t.find(".counting").text(this.countNum);
						}
					});
				}
				//set skill building height
					var size = $(this).children('.progress-bar').attr('aria-valuenow');
					$(this).children('.progress-bar').css('width', size+'%');
			});
		}
	}
	
	
	// 09. Elements Animation
	if($('.wow').length){
		var wow = new WOW(
		  {
			boxClass:     'wow',      // animated element css class (default is wow)
			animateClass: 'animated', // animation css class (default is animated)
			offset:       0,          // distance to the element when triggering the animation (default is 0)
			mobile:       true,       // trigger animations on mobile devices (default is true)
			live:         true       // act on asynchronously loaded content (default is true)
		  }
		);
		wow.init();
	}

   // 10. When document is Scrollig, do
	
	$window.on('scroll', function() {
		headerStyle();
		factCounter();
	});
	
	// 11. When document is loading, do	
	$window.on('load', function() {
		handlePreloader();
	});
	
	// 12. Home 1 page Offer limit
	$('.cd100').countdown100({
			endtimeYear: 0,
			endtimeMonth: 0,
			endtimeDate: 35,
			endtimeHours: 10,
			endtimeMinutes: 0,
			endtimeSeconds: 0,
		});
	
	
	
	// 14. LightBox / Fancybox
	if($('.img_view').length) {
		$('.img_view').fancybox({
			openEffect  : 'elastic',
			closeEffect : 'elastic',
			helpers : {
				media : {}
			}
		});
	}
	
	
	// 15. Gallery With Filters List
	if($('.filter-list').length){
		$('.filter-list').mixItUp({});
	}
	
	// 16. Put slider space for nav not in mini screen
	 if(document.querySelector('.nav-on-top') !== null) {
		var get_height = jQuery('.nav-on-top').height();
			if(get_height > 0 && $window.width() > 991){
			jQuery('body').css('padding-top', get_height);
		}
		$window.on('resize', function(){
			if($window.width() < 991){
				jQuery('body').css('padding-top', '0');
			}
			else {
				jQuery('body').css('padding-top', get_height);
			}
		});
	 }
	 if(document.querySelector('.nav-on-banner') !== null) {
		var get_height = jQuery('.nav-on-banner').height();
			if(get_height > 0 && $window.width() > 991){
			jQuery('#page-banner').css('padding-top', get_height);
		}
		$window.on('resize', function(){
			if($window.width() < 991){
				jQuery('#page-banner').css('padding-top', '0');
			}
			else {
				jQuery('#page-banner').css('padding-top', get_height);
			}
		});
	 }

})(jQuery);