# firebase-dynamic-link
[![Current version](https://img.shields.io/packagist/v/mxl/firebase-dynamic-link.svg?logo=composer)](https://packagist.org/packages/mxl/firebase-dynamic-link)
[![Monthly Downloads](https://img.shields.io/packagist/dm/mxl/firebase-dynamic-link.svg)](https://packagist.org/packages/mxl/firebase-dynamic-link/stats)
[![Total Downloads](https://img.shields.io/packagist/dt/mxl/firebase-dynamic-link.svg)](https://packagist.org/packages/mxl/firebase-dynamic-link/stats)
[![Build Status](https://travis-ci.org/mxl/firebase-dynamic-link-php.svg?branch=master)](https://travis-ci.org/mxl/firebase-dynamic-link-php)

Firebase Dynamic Link URL builder for PHP.

Builds Dynamic Links as described [here](https://firebase.google.com/docs/dynamic-links/create-manually).

For creating Dynamic Links via Firebase API use [kreait/firebase-php](https://github.com/kreait/firebase-php).

## Installation

```bash
$ composer require mxl/firebase-dynamic-link
```

## Usage

```php
use MichaelLedin\FirebaseDynamicLink\Android;
use MichaelLedin\FirebaseDynamicLink\DynamicLink;
use MichaelLedin\FirebaseDynamicLink\GooglePlayAnalytics;
use MichaelLedin\FirebaseDynamicLink\IOS;
use MichaelLedin\FirebaseDynamicLink\ITunesConnectAnalytics;
use MichaelLedin\FirebaseDynamicLink\SocialMetaTag;

$dynamicLink = DynamicLink::for('your_subdomain.page.link', 'https://your_domain.com/path/to/page')
    ->withAndroid(
        Android::new()
            ->withPackageName('com.your_domain.app')
            ->withMinimumVersionCode(123)
            ->withFallbackLink('https://your_domain.com/fallback/android')
    )
    ->withIOS(
        IOS::new()
            ->withBundleID('com.your_domain.app')
            ->withMinimumVersionNumber('1.2.3')
            ->withFallbackLink('https://your_domain.com/fallback/ios')
            ->withAppStoreID('app.store.id')
            ->withUrlScheme('customUrlScheme')
            ->withIPadBundleID('com.your_domain.iPadApp')
            ->withIPadFallbackLink('https://your_domain.com/fallback/ipad')
    )
    ->withGooglePlayAnalytics(
        GooglePlayAnalytics::new()
            ->withGclid('gclid')
            ->withUtmCampaign('utm_campaign')
            ->withUtmContent('utm_content')
            ->withUtmMedium('utm_medium')
            ->withUtmSource('utm_source')
            ->withUtmTerm('utm_term')
    )
    ->withITunesConnectAnalytics(
        ITunesConnectAnalytics::new()
            ->withAffiliateToken('affiliate_token')
            ->withCampaignToken('campaign_token')
            ->withMediaType('8')
            ->withProviderToken('provider_token')
    )
    ->withOtherFallbackLink('https://your_domain.com/fallback/other')
    ->withSocialMetaTag(
        SocialMetaTag::new()
            ->withTitle('title')
            ->withImage('https://your_domain.com/img.jpeg')
            ->withDescription('description')
    )
    ->withoutAppPreviewPage()
    ->build();
```

## Maintainers

- [@mxl](https://github.com/mxl)

## Other useful PHP libraries from the author

- [mxl/laravel-queue-rate-limit](https://github.com/mxl/laravel-queue-rate-limit) - simple Laravel queue rate limiting;
- [mxl/laravel-job](https://github.com/mxl/laravel-job) - dispatch a job from command line and more;
- [mxl/laravel-api-key](https://github.com/mxl/laravel-api-key) - API Key Authorization for Laravel with replay attack prevention

## License

See the [LICENSE](https://github.com/mxl/firebase-dynamic-link/blob/master/LICENSE) file for details.


