=== WP-Symfony Router ===

This is an approach to using a symfony based router within a WordPress installation

Based on: http://symfony.com/doc/current/create_framework/index.html

It uses composer to bring in some dependencies:

- Composer's autoloader
- symfony/http-foundation
- symfony/routing
- symfony/http-kernel

run 'composer intstall' from the plugin dir in the terminal to load up dependencies.

The core of the framework is in front.php

Routes are added to the lib/routes.php file

Route names match up to the template name used for route.

Template files are added to lib/templates.

Controllers and model classes can be added to the respective folders in the lib directory.

--
There are 3 sample routes added:

- sample controller with end of url as a parameter:

/sample-controller/anything-as-variable

- sample inline controller in route declaration:

/sample-inline-controller/

- redirect from one page to another:

/some/page/
