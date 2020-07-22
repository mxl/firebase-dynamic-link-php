<?php


namespace MichaelLedin\FirebaseDynamicLink\Tests;

use MichaelLedin\FirebaseDynamicLink\Android;
use MichaelLedin\FirebaseDynamicLink\DynamicLink;
use MichaelLedin\FirebaseDynamicLink\GooglePlayAnalytics;
use MichaelLedin\FirebaseDynamicLink\IOS;
use MichaelLedin\FirebaseDynamicLink\ITunesConnectAnalytics;
use MichaelLedin\FirebaseDynamicLink\SocialMetaTag;
use PHPUnit\Framework\TestCase;

class DynamicLinkTest extends TestCase
{
    public function testClone()
    {
        $link = DynamicLink::for('example.page.link', 'https://example.com');
        $this->assertNotEquals($link->build(), $link->withoutAppPreviewPage()->build());
    }

    public function testBuild()
    {
        $this->assertEquals(
            'https://your_subdomain.page.link/?link=https%3A%2F%2Fyour_domain.com%2Fpath%2Fto%2Fpage&apn=com.your_domain.app&amv=123&afl=https%3A%2F%2Fyour_domain.com%2Ffallback%2Fandroid&ibi=com.your_domain.app&imv=1.2.3&ifl=https%3A%2F%2Fyour_domain.com%2Ffallback%2Fios&isi=app.store.id&ius=customUrlScheme&ipbi=com.your_domain.iPadApp&ipfl=https%3A%2F%2Fyour_domain.com%2Ffallback%2Fipad&gclid=gclid&utm_campaign=utm_campaign&utm_content=utm_content&utm_medium=utm_medium&utm_source=utm_source&utm_term=utm_term&at=affiliate_token&ct=campaign_token&mt=8&pt=provider_token&ofl=https%3A%2F%2Fyour_domain.com%2Ffallback%2Fother&st=title&si=https%3A%2F%2Fyour_domain.com%2Fimg.jpeg&sd=description&ofr=1',
            DynamicLink::for('your_subdomain.page.link', 'https://your_domain.com/path/to/page')
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
                ->build());
    }
}
