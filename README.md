ContactForm application
========================

This application uses Symfony 3 framework to create a basic contact registry.
It uses the standard Symfony 3 stable release and all packages can be installed via composer.

Application itself uses twig templating, single controller, single entity class and single formtype to generate an easy to use addressbook style form.
Contacts can be edited by resubmitting the data or deleted at listpage.

The startpage for the application is: localhost/contactform

The paginator full implementation, search, sorting and ajax calls will be added at a later stage.

ContactForm inlcudes
========================
This project uses the standard Symfony 3 Bundles and 4 additional Bundles:

* [**Nelmio/Alice Fixtures Generator Bundle**][14] - Generates fixtures to fill the contact database
* [**KnpPaginatorBundle (Not fully implemented)**][15]
* [**Doctrine/Migrations Bundle**][16] - Generates migrations for entities, making it easier to enter/edit fields in database
* [**JMS Serializer Bundle (Not fully implemented)**][17]

  * **FrameworkBundle** - The core Symfony framework bundle

  * [**SensioFrameworkExtraBundle**][6] - Adds several enhancements, including
    template and routing annotation capability

  * [**DoctrineBundle**][7] - Adds support for the Doctrine ORM

  * [**TwigBundle**][8] - Adds support for the Twig templating engine

  * [**SecurityBundle**][9] - Adds security by integrating Symfony's security
    component

  * [**SwiftmailerBundle**] - Adds support for Swiftmailer, a library for
    sending emails

  * [**MonologBundle**][11] - Adds support for Monolog, a logging library

  * **WebProfilerBundle** (in dev/test env) - Adds profiling functionality and
    the web debug toolbar

  * **SensioDistributionBundle** (in dev/test env) - Adds functionality for
    configuring and working with Symfony distributions

  * [**SensioGeneratorBundle**][13] (in dev/test env) - Adds code generation
    capabilities

  * **DebugBundle** (in dev/test env) - Adds Debug and VarDumper component
    integration

All libraries and bundles included in the project are
released under the MIT or BSD license. 
I would like to thank Ryan Weaver for helping me with a few bugfixes with reactjs.

Enjoy!

[1]:  https://symfony.com/doc/3.2/setup.html
[6]:  https://symfony.com/doc/current/bundles/SensioFrameworkExtraBundle/index.html
[7]:  https://symfony.com/doc/3.2/doctrine.html
[8]:  https://symfony.com/doc/3.2/templating.html
[9]:  https://symfony.com/doc/3.2/security.html
[11]: https://symfony.com/doc/3.2/logging.html
[12]: https://symfony.com/doc/3.2/assetic/asset_management.html
[13]: https://symfony.com/doc/current/bundles/SensioGeneratorBundle/index.html

[14]: https://github.com/nelmio/alice
[15]: https://github.com/KnpLabs/KnpPaginatorBundle
[16]: https://github.com/doctrine/DoctrineMigrationsBundle
[17]: https://github.com/schmittjoh/JMSSerializerBundle
