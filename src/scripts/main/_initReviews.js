jQuery( document ).ready( function () {

	var $slider = jQuery( '#reviews-items' );

	if ( $slider.length > 0 ) {

		$slider.on( 'init', function( event, slick ) {
			$slider.find( '.item .content' ).each( function ( index, content ) {
				var $content = jQuery( content );
				if ( $content.height() > 150 ) {
					var $inner = $content.closest( '.item' ).clone().attr( 'class', 'reviews__item item' );
					$inner.find( 'img[data-lazy]' ).each( function ( i, image ) {
						jQuery( image ).attr( 'src', jQuery( image ).attr( 'data-lazy' ) );
						console.log( jQuery( image ).attr( 'src' ) );
					} );
					$content.addClass( 'content--collapse' );
					$content.append( jQuery( '<div>', {
						class: 'expand-button',
					} ).click( function () {
							jQuery.fancybox.open( {
								src : jQuery( '<div>' ).append( $inner ),
								type : 'html',
								slideClass : 'fancybox-top'
							} );
					} ) );
				}
			} );
		} );

		$slider.slick( {
			lazyLoad: 'ondemand',
			dots: false,
			arrows: true,
			infinite: false,
			speed: 300,
			slidesToShow: 2,
			slidesToScroll: 2,
			prevArrow: '#reviews-slider-prev',
			nextArrow: '#reviews-slider-next',
			responsive: [
				{
					breakpoint: 980,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1,
					}
				}
			],
		} );

	}

} );