jQuery( document ).ready( function () {
	var $slider = jQuery( '#reviews-items' );
	console.log( $slider.length );
	if ( $slider.length > 0 ) {
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