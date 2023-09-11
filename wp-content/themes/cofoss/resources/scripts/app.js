import domReady from '@roots/sage/client/dom-ready';
import 'bootstrap';
import 'superfish';
import './lib/responsive.min.js';
import './lib/custom.js';
import Swiper from "swiper";
import { Navigation, Pagination } from 'swiper/modules';
/**
 * Application entrypoint
 */
domReady(async () => {

	var swiper = new Swiper(".banner-slider", {
		modules: [Navigation, Pagination],
		slidesPerView: 1,
		pagination: {
			el: ".swiper-pagination",
			clickable: true,
		},
	});

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
