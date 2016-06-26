# shamir-secret-sharing-web
More important badges:

[![Build Status](https://travis-ci.org/marcinlawnik/shamir-secret-sharing-web.svg?branch=master)](https://travis-ci.org/marcinlawnik/shamir-secret-sharing-web)
[![Latest Stable Version](https://poser.pugx.org/marcinlawnik/shamir-secret-sharing-web/version)](https://packagist.org/packages/marcinlawnik/shamir-secret-sharing-web)
[![Dependency Status](https://www.versioneye.com/user/projects/57702ba0671894004fedd384/badge.svg?style=flat-square)](https://www.versioneye.com/user/projects/57702ba0671894004fedd384)
[![StyleCI](https://styleci.io/repos/61990996/shield)](https://styleci.io/repos/61990996)
[![License](https://poser.pugx.org/marcinlawnik/shamir-secret-sharing-web/license)](https://packagist.org/packages/marcinlawnik/shamir-secret-sharing-web)

Less important badges:

[![Total Downloads](https://poser.pugx.org/marcinlawnik/shamir-secret-sharing-web/downloads)](https://packagist.org/packages/marcinlawnik/shamir-secret-sharing-web)
[![Monthly Downloads](https://poser.pugx.org/marcinlawnik/shamir-secret-sharing-web/d/monthly)](https://packagist.org/packages/marcinlawnik/shamir-secret-sharing-web)
[![composer.lock available](https://poser.pugx.org/marcinlawnik/shamir-secret-sharing-web/composerlock)](https://packagist.org/packages/marcinlawnik/shamir-secret-sharing-web)
[![Latest Unstable Version](https://poser.pugx.org/marcinlawnik/shamir-secret-sharing-web/v/unstable)](//packagist.org/packages/marcinlawnik/shamir-secret-sharing-web)
![](https://reposs.herokuapp.com/?path=marcinlawnik/shamir-secret-sharing-web&style=flat)

This is a web interface for using the Shamir Secret Sharing Scheme (ssss), based on the teqneers/shamir library.

More info [in the Wikipedia article](https://en.wikipedia.org/wiki/Shamir%27s_Secret_Sharing)

## Installation

Head over to [Releases](https://github.com/marcinlawnik/shamir-secret-sharing-web/releases) and download an archive.
Extract and point your webserver at the /public directory.
You can use the built-in php web server lby using this command and navigating to [http://localhost:8000](http://localhost:8000):

    php -S localhost:8000 -t public public/index.php



Start using.

If you want to use scheduled cron tasks for cache cleaning, add this to your crontab (optional):

    * * * * * php /path/to/artisan schedule:run >> /dev/null 2>&1
    
## License

The shamir-secret-sharing-web project is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
