import domReady from '@roots/sage/client/dom-ready';
import alpineInit from './alpine/alpine-init.js';

/**
 * Application entrypoint
 */
domReady(async () => {
  alpineInit()
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
import.meta.webpackHot?.accept(console.error);
