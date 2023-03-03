<p align="center">
    <img src="https://www.kinetic.com/wp-content/uploads/2021/04/rgb-kinetic-logo-horizontal-white-copy.jpg" alt="Kinetic" width="410">
</p>

<p align="center">
    <strong>Block editor-ready theme</strong>
</p>

# [Theme by Kinetic](https://kinetic.com)

Version 3.0.0

---

## Some Light Reading 📚

- [Block editor global styles and theme.json](https://fullsiteediting.com/lessons/global-styles/)

---

## Getting Started 🏃🏻‍♀️

### Set up your local environment

#### Required tools

- [PHP >= 8.0](https://php.net/)
- [Node.js >=16.10](https://nodejs.dev/learn/how-to-install-nodejs)
- [NPM](https://docs.npmjs.com/downloading-and-installing-node-js-and-npm)
- [wp-cli](https://wp-cli.org/#installing)

#### Optional (but recommended) IDE extensions

- IntelliSense for CSS class names in HTML ([VS Code](https://marketplace.visualstudio.com/items?itemName=Zignd.html-css-class-completion))
- PHP Intelephense ([VS Code](https://marketplace.visualstudio.com/items?itemName=bmewburn.vscode-intelephense-client))
- Prettier - Code formatter ([VS Code](https://marketplace.visualstudio.com/items?itemName=esbenp.prettier-vscode))
- Stylelint ([VS Code](https://marketplace.visualstudio.com/items?itemName=stylelint.vscode-stylelint))
- WordPress Hooks IntelliSense ([VS Code](https://marketplace.visualstudio.com/items?itemName=johnbillion.vscode-wordpress-hooks))

---

### Create a new blank repo on GitHub

On GitHub, create a new project.

- Repository name should be prefixed with client code
- Description should be descriptive
- Private repository
- No README
- No .gitignore
- No license

---

### Set up repo and WordPress locally

**1.** Clone this repo into a new folder on your local machine and move into it.

```bash
git clone git@github.com:KineticTeam/kin-theme-brink.git {{ new-project-name }} && cd $_
```

**2.** We'll make this a fresh repo by removing `.git` and reinitializing it. Change the origin of the local repository to the new GitHub repository and push an initial commit.

```bash
rm -rf .git
git init
git remote add origin git@github.com:KineticTeam/{{ new-repo-slug }}.git
git add .
git commit -am "Initial commit"
git push --set-upstream origin main
```

**3.** Create a development branch off of main and push to GitHub.

```bash
git checkout -b development
git push -u origin development
```

**4.** Install WordPress using WP CLI.

```bash
wp core download
wp core config --prompt     # Shell will prompt you for credentials
wp db create                # If the database doesn't already exist
wp core install --prompt
```

> **🔔 REMINDER**<br>
> Now is a great time to add the newly minted admin credentials to Kodex.

**5.** Set up valet to work with the new site _(optional)_.

```bash
valet link {{ test-domain }} # Leave off the tld; Valet will add it automatically
valet secure                 # Creates an ssl cert for use with bud later on
```

> **⚠️ NOTE**<br>
> If you use a different local environment, create a cert and add your new local domain now.

**6.** Add the following lines to the top of `wp-config.php`:

```php
// Set the environment
define('WP_ENVIRONMENT_TYPE', 'local'); // local, development, staging, production
```

**7.** Install the default plugins and change some settings. Set up and activate the theme.

```bash
# Install default premium plugins
wp plugin install --activate \
    wp-content/themes/brink/init-files/default-plugins/advanced-custom-fields-pro.zip \
    wp-content/themes/brink/init-files/default-plugins/backupbuddy.zip \
    wp-content/themes/brink/init-files/default-plugins/gravityforms.zip \
    wp-content/themes/brink/init-files/default-plugins/gravityformsgutenberg.zip \
    wp-content/themes/brink/init-files/default-plugins/ithemes-security-pro.zip \
    wp-content/themes/brink/init-files/default-plugins/wp-sync-db-master.zip \
    wp-content/themes/brink/init-files/default-plugins/wp-sync-db-media-files-master.zip

# Remove default plugins
wp plugin delete hello akismet

# Remove premium plugin zip and other files from the project
rm -rf wp-content/themes/brink/init-files
# Modify functions.php to remove last function including tgm_pa.php

# Update theme composer dependencies and install; activate theme
cd wp-content/themes/brink/
npm install; npm run dev
wp theme activate brink

# Remove default WP themes; one for every year as of 5.9 😫
wp theme delete twentytwenty twentytwentyone twentytwentytwo

# Set some sane defaults
wp rewrite structure '/%postname%/'
wp rewrite flush --hard
wp option update timezone_string "America/Chicago"
wp post delete 2
wp post create --post_title=Welcome --post_status=publish --post_type=page
wp post create --post_title=Blog --post_status=publish --post_type=page
wp option update show_on_front page
wp option update page_on_front $(wp post list --pagename=welcome --field=ID)
wp option update page_for_posts $(wp post list --pagename=blog --field=ID)
wp menu create "Primary Navigation"
wp menu item add-post primary-navigation $(wp post list --pagename=blog --field=ID)
wp menu location assign primary-navigation primary_navigation

```

**8.** Edit `/wp-content/themes/brink/webpack.mix.js` and change the browser sync URL to the local URL you created in the valet step above.

**9.** Edit `/wp-content/mu-plugins/acf.php` and safelist the admin username you created.

**10.** Commit and push your changes to the newly created project repo.

---

## Congratulations! 🥳

You have set up a new project in your local environment.

## Version Log

- 1.0
- 2.0 Gutenberg support and childtheme added.
- 2.1 Mix Added
- 3.0 Child Theme removed, ACF JSON added, overhauled file structure, mix versioning for css and js files, etc.
