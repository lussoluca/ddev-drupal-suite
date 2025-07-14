[![add-on registry](https://img.shields.io/badge/DDEV-Add--on_Registry-blue)](https://addons.ddev.com)
[![last commit](https://img.shields.io/github/last-commit/lussoluca/ddev-drupal-suite)](https://github.com/lussoluca/ddev-drupal-suite/commits)
[![release](https://img.shields.io/github/v/release/lussoluca/ddev-drupal-suite)](https://github.com/lussoluca/ddev-drupal-suite/releases/latest)

# DDEV Drupal Suite 

This add-on can be used to set up a DDEV environment for developing Drupal contrib modules and themes.
You can use it to spin up any version of Drupal core and clone into it any contrib module or theme.

# Features

- Spin up any version of Drupal core into a DDEV environment.
- Clone any combination of contrib modules and themes.
- Download and install Drupal recipes.
- Download any other Drupal contrib module or theme.
- Run PHPStan, PHPUnit, and PHPCS on your contrib modules.
- No need to add DDEV specific artifacts to your contrib modules.

## Install

Let's say you need to work on the `ai` module for Drupal 11.2.2, you can run the following commands:

```bash
mkdir ai-dev && cd ai-dev
ddev config --project-type=drupal11 --docroot=web --php-version=8.3 --corepack-enable
ddev add-on get lussoluca/ddev-drupal-suite
ddev drupal-init 11.2.2
ddev drupal-get-module ai 1.2.x
```

This will set up a DDEV environment with Drupal 11.2.2 and clone the `1.2.x` branch of the `ai` module into the `web/modules/contrib/ai` directory.
You can then work in the `web/modules/contrib/ai` directory as usual, by adding your changes, committing them, and pushing them to your remote repository.

### Work on more modules

If later you also need to work on the `ai_agents` module, you can add its source code to your DDEV environment by running:

```bash
ddev drupal-get-module ai_agents 1.2.x
```

### Require other contrib modules

If you just need a contrib module or theme to be present, but you don't need to work on it, you can use standard `composer` commands to add it to your DDEV environment:

```bash
ddev composer require drupal/ai_provider_openai:^1.1
```

### Download Drupal recipes

You can also download Drupal recipes to your DDEV environment. For example, to download the `drupal/ai-dev-recipe` recipe, you can run:

```bash
ddev drupal-get-recipe ai-dev-recipe
```

This will download the recipe and install it in your DDEV environment, making it available for use.

## Run PHPStan, PHPUnit, and PHPCS

You can run PHPStan, PHPUnit, and PHPCS on your contrib modules by using the following commands:

```bash
ddev phpstan ai
ddev phpunit ai
ddev phpcs ai
```

These commands will analyze the `ai` module for bugs, run unit tests, and check coding standards, respectively.
You can replace `ai` with the name of any other module you have cloned into your DDEV environment.
