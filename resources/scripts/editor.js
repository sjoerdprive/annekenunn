import domReady from '@roots/sage/client/dom-ready';
import { registerBlockStyle, unregisterBlockStyle } from '@wordpress/blocks';

/**
 * Editor entrypoint
 */
domReady(() => {
  unregisterBlockStyle('core/button', 'outline');

  registerBlockStyle('core/button', {
    name: 'outline',
    label: 'Outline',
  });

  registerBlockStyle('core/group', {
    name: 'segmented',
    label: 'Gesegmenteerd',
  });

  registerBlockStyle('core/group', {
    name: 'outlined',
    label: 'Omlijnd',
  });
  
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
import.meta.webpackHot?.accept(console.error);
