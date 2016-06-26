# shamir-secret-sharing-web
Badges to be added here.

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
