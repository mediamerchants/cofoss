import domReady from '@roots/sage/client/dom-ready';
import 'bootstrap';
import 'superfish';
import './lib/responsive.min.js';
/**
 * Application entrypoint
 */
domReady(async () => {


	$(".js-superfish").superfish({
		delay: 100,
		animation: {
			opacity: "show",
			height: "show"
		},
		dropShadows: !1
	})

});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
