[![Latest Version on Packagist](https://img.shields.io/packagist/v/phpsa/filament-feed.svg?style=flat-square)](https://packagist.org/packages/phpsa/filament-feed)
[![Semantic Release](https://github.com/phpsa/filament-feed/actions/workflows/release.yml/badge.svg)](https://github.com/phpsa/filament-feed/actions/workflows/release.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/phpsa/filament-feed.svg?style=flat-square)](https://packagist.org/packages/phpsa/filament-feed)

# Filament Feed Widget

Show feeds on your dashboard, simply update the config file to include the feeds you wish to display

## Installation


You can install the package via composer:

```bash
composer require phpsa/filament-feed
```

Publish the config file
```
php artisan vendor:publish --tag=filament-feed-config
```

Showing Feeds - Config structure as follows, each feed item will be a new card on the dashboard.
```
return [
    'feeds' => [
        'FEED HEADING' => [
            'url' => 'https://feed.laravel-news.com/', //feed url - required
            'limit' => 5,// feed limit -- optional (default 5)
            'refresh' => 300, //cache refresh time -- optional default 300
        ],
        ... //next feeds if required
    ],
];

```
## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [Phpsa](https://github.com/phpsa)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
