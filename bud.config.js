/**
 * Build configuration
 *
 * @see {@link https://roots.io/docs/sage/ sage documentation}
 * @see {@link https://bud.js.org/guides/configure/ bud.js configuration guide}
 *
 * @typedef {import('@roots/bud').Bud} Bud
 * @param {Bud} app
 */
export default async (app) => {
  /**
   * Application entrypoints
   * @see {@link https://bud.js.org/docs/bud.entry/}
   */
  app
    .entry({
      app: ['@scripts/app', '@styles/app'],
      editor: ['@scripts/editor', '@styles/editor'],
    })

    /**
     * Directory contents to be included in the compilation
     * @see {@link https://bud.js.org/docs/bud.assets/}
     */
    .assets(['images'])

    /**
     * Matched files trigger a page reload when modified
     * @see {@link https://bud.js.org/docs/bud.watch/}
     */
    .watch(['resources/views', 'app'])

    /**
     *.proxy('http\:\/\/sandbox.local')
     * @see {@link https://bud.js.org/docs/bud.proxy('http\:\/\/sandbox.local')
     */
    .proxy('http\:\/\/sandbox.local')

    /**
     * Development origin
     * @see {@link https://bud.js.org/docs/bud.serve/}
     */
    .serve('http://localhost:3000')

    /**
     * URI of the `public` directory
     * @see {@link https://bud.js.org/docs/bud.setPublicPath/}
     */
    .setPublicPath('/app/themes/sage/public/')

    /**
     * Generate WordPress `theme.json`
     *
     * @note This overwrites `theme.json` on every build.
     *
     * @see {@link https://bud.js.org/extensions/sage/theme.json/}
     * @see {@link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-json/}
     */
    .wpjson.settings({
      color: {
        custom: false,
        customDuotone: false,
        customGradient: false,
        defaultDuotone: false,
        defaultGradients: false,
        defaultPalette: false,
        duotone: [],
        palette: [
          {
            "name": "Zwart",
            "slug": "black",
            "color": "#001220"
          },
          {
            "name": "Wit",
            "slug": "white",
            "color": "#ffffff"
          },
          {
            "name": "Primair",
            "slug": "primary",
            "color": "#3ba55b"
          },
          {
            "name": "Secundair",
            "slug": "secondary",
            "color": "#cc5200"
          },
          {
            "name": "Licht",
            "slug": "light",
            "color": "#fbfdff"
          }
        ],
      },
      custom: {
        spacing: {},
        typography: {
          'font-size': {},
          'line-height': {},
        },
      },
      spacing: {
        padding: true,
        units: ['rem'],
        spacingSizes: [
          {
            "size": "0",
            "slug": "0",
            "name": "0"
          },
          {
            "size": "0.5rem",
            "slug": "1",
            "name": "1"
          },
          {
            "size": "0.75rem",
            "slug": "2",
            "name": "2"
          },
          {
            "size": "1.25rem",
            "slug": "3",
            "name": "3"
          },
          {
            "size": "2rem",
            "slug": "4",
            "name": "4"
          },
          {
            "size": "5rem",
            "slug": "5",
            "name": "5"
          },
        ]
      },
      typography: {
        customFontSize: false,
      }
    }
    )
    .enable();
};

