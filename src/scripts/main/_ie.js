( function () {
	if ( /MSIE 10/i.test(navigator.userAgent) || /MSIE 9/i.test(navigator.userAgent) || /rv:11.0/i.test(navigator.userAgent) ) {
		console.log( 'IE' );
		let style = window.document.createElement( 'link' );
		style.href = ACTTheme.url+'styles/ie.css';
		style.rel = 'stylesheet';
		window.document.getElementsByTagName('head')[0].appendChild( style )
	}
} )();