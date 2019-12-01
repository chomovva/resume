
jQuery( document ).ready( function () {
	var $container = jQuery( '#counter404' ),
		counter = 0;
	function setCounter() {
		if ( counter <= 404 ) {
			counter = counter + 9;
			$container.text( counter );
			setTimeout( setCounter, 100 );
		} else {
			$container.text( 404 );
		}
	}
	if ( $container.length > 0 ) {
		setCounter();
	}
} );
