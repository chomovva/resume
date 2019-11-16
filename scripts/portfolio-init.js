jQuery( '#portfolio-slider' ).slick( {
	lazyLoad: 'ondemand',
	dots: false,
	arrows: true,
	infinite: false,
	speed: 300,
	slidesToShow: 3,
	slidesToScroll: 3,
	prevArrow: '#portfolio-slider-prev',
	nextArrow: '#portfolio-slider-next',
	responsive: [
		{
			breakpoint: 768,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 2
			}
		},
		{
			breakpoint: 480,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			}
		}
	],
} )
.on( 'lazyLoaded', function ( event, slick, image, imageSource ) {
	jQuery( image ).closest( '.entry' ).css( 'opacity', '1' );
} );