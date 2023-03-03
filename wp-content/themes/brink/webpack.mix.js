const mix = require("laravel-mix");

// Set the build location
mix.setPublicPath("./public");

// Browsersync
mix.browserSync({
  proxy: "https://meffect.test", // Change to your local dev domain
  open: false, // Whether or not a brower window opens on every start
  reloadOnRestart: true, // Whether or not existing bs browser windows will refresh when mix is restarted
  files: ["**/*.php", "public/**/*.js", "public/**/*.css"],
});

mix
  .js("resources/scripts/site.js", "scripts/site.js")
  .js(
    "resources/scripts/jquery.hoverIntent.min.js",
    "scripts/jquery.hoverIntent.min.js"
  )
  .js("resources/scripts/navigation.js", "scripts/navigation.js")
  .js(
    "resources/scripts/skip-link-focus-fix.js",
    "scripts/skip-link-focus-fix.js"
  )
  .js("resources/scripts/videoplayer.js", "scripts/videoplayer.js");

mix
  .sass("resources/styles/screen.scss", "styles")
  .sass("resources/styles/print.scss", "styles")
  .sass("resources/styles/login.scss", "styles")
  .sass("resources/styles/blocks.scss", "styles")
  .sass("resources/styles/style-editor.scss", "styles")
  .sass("resources/styles/woocommerce.scss", "styles")
  .options({ processCssUrls: false });

mix
  .copyDirectory("resources/images", "public/images")
  .copyDirectory("resources/scripts/slick", "public/scripts/slick");

mix.sourceMaps(false, "source-map").version();
