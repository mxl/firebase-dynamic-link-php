<?php


namespace MichaelLedin\FirebaseDynamicLink;

/**
 * @see https://firebase.google.com/docs/dynamic-links/create-manually
 */
class DynamicLink extends BaseBuilder
{
    /** @var string */
    private $domain;

    protected function __construct(string $domain, string $link)
    {
        parent::__construct(compact('link'));

        $this->domain = $domain;
    }

    /**
     * The link your app will open. Specify a URL that your app can handle, typically the app's content or payload,
     * which initiates app-specific logic (such as crediting the user with a coupon or displaying a welcome screen).
     * This link must be a well-formatted URL, be properly URL-encoded, use either HTTP or HTTPS,
     * and cannot be another Dynamic Link.
     * @param string $domain
     * @param string $link
     * @return static
     */
    public static function for(string $domain, string $link): self
    {
        return new self($domain, $link);
    }

    public function withAndroid(Android $info): self
    {
        return $this->merge($info);
    }

    public function withIOS(IOS $info): self
    {
        return $this->merge($info);
    }

    /**
     * The link to open on platforms beside Android and iOS. This is useful to specify a different behavior on desktop,
     * like displaying a full web page of the app content/payload (as specified by param link)
     * with another dynamic link to install the app.
     * @param string $url
     * @return $this
     */
    public function withOtherFallbackLink(string $url): self
    {
        return $this->with('ofl', $url);
    }

    /**
     * Skip the app preview page when the Dynamic Link is opened, and instead redirect to the app or store.
     * The app preview page (enabled by default) can more reliably send users to the most appropriate destination
     * when they open Dynamic Links in apps; however, if you expect a Dynamic Link to be opened only in apps
     * that can open Dynamic Links reliably without this page, you can disable it with this parameter.
     * Note: the app preview page is only shown on iOS currently, but may eventually be shown on Android.
     * This parameter will affect the behavior of the Dynamic Link on both platforms.
     * @return $this
     */
    public function withoutAppPreviewPage(): self
    {
        return $this->with('ofr', 1);
    }

    public function withSocialMetaTag(SocialMetaTag $info): self
    {
        return $this->merge($info);
    }

    /**
     * Google Play analytics parameters.
     * @param GooglePlayAnalytics $info
     * @return $this
     */
    public function withGooglePlayAnalytics(GooglePlayAnalytics $info): self
    {
        return $this->merge($info);
    }

    /**
     * iTunes Connect analytics parameters.
     * @param ITunesConnectAnalytics $info
     * @return $this
     */
    public function withITunesConnectAnalytics(ITunesConnectAnalytics $info): self
    {
        return $this->merge($info);
    }

    /**
     * Constructs and returns Dynamic Link URL
     * @return string
     */
    public function build(): string
    {
        return 'https://' . $this->domain . '/?' . http_build_query($this->getData());
    }

    public function __toString()
    {
        return $this->build();
    }
}
