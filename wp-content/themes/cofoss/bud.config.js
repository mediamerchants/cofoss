import bs from 'browser-sync-webpack-plugin';

export default async (app) => {
  // Application assets & entrypoints
  app
  .entry('app', ['@scripts/app', '@styles/app'])
  .entry('editor', ['@scripts/editor', '@styles/editor'])
  .assets(['images']);

  // Set public path
  app.setPublicPath('/wp-content/themes/cofoss/public/');

  // Development server settings
  app
  .setUrl('http://localhost:3000')
  .setProxyUrl('http://cofoss.test')
  .watch('resources/**/**/*', 'app/**/*')
  .use({
    name: 'browser-sync-webpack-plugin',
    make: () => new bs({ proxy: 'http://cofoss.test' }),
  });
  app.provide({
    jquery: ["jQuery", "$"],
  })
  // Generate WordPress theme.json
  app.wpjson
  .set('settings.color.custom', false)
  .set('settings.color.customDuotone', false)
  .set('settings.color.customGradient', false)
  .set('settings.color.defaultDuotone', false)
  .set('settings.color.defaultGradients', false)
  .set('settings.color.defaultPalette', false)
  .set('settings.color.duotone', [])
  .set('settings.custom.spacing', {})
  .set('settings.custom.typography.font-size', {})
  .set('settings.custom.typography.line-height', {})
  .set('settings.spacing.padding', true)
  .set('settings.spacing.units', ['px', '%', 'em', 'rem', 'vw', 'vh'])
  .set('settings.typography.customFontSize', false)
  .enable();
};
