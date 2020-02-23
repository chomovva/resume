jQuery( document ).ready( function () {
	var $slider = jQuery( '#portfolio-items' );
	console.log( $slider.length );
	if ( $slider.length > 0 ) {
		$slider.slick( {
			lazyLoad: 'ondemand',
			dots: false,
			arrows: true,
			infinite: false,
			speed: 300,
			slidesToShow: 3,
			slidesToScroll: 1,
			prevArrow: '#portfolio-slider-prev',
			nextArrow: '#portfolio-slider-next',
			responsive: [
				{
					breakpoint: 768,
					settings: {
						slidesToShow: 2,
					}
				},
				{
					breakpoint: 480,
					settings: {
						slidesToShow: 1,
					}
				}
			],
		} )
		.on( 'lazyLoaded', function ( event, slick, image, imageSource ) {
			jQuery( image ).closest( '.entry' ).css( 'opacity', '1' );
		} )
		.on( 'afterChange', function( event, slick, currentSlide ) {
			var $preloader = jQuery( '#portfolio-preloader' );
			if ( slick.slideCount === currentSlide + slick.options.slidesToShow ) {
				jQuery.ajax( {
					url: resume.ajaxurl,
					type: 'POST',
					data: {
						action: 'portfolio_pagination',
						offset: slick.slideCount,
					},
					beforeSend: function() {
						$preloader.css( 'display', '' );
					},
					complete: function() {
						$preloader.css( 'display', 'none' );
					},
					success: function( data ) {
						if ( data ) {
							slick.slickAdd( data );
						}
					},
					error: function( data ) {
						console.log( data );
					}
				} );
			}
		} );
	}
} );