<?php


namespace MichaelLedin\FirebaseDynamicLink;

/**
 * iTunes Connect analytics parameters.
 * Class ITunesConnectAnalytics
 * @package MichaelLedin\FirebaseDynamicLink
 */
class ITunesConnectAnalytics extends SimpleBuilder
{
    public function withAffiliateToken(string $affiliateToken): self
    {
        return $this->with('at', $affiliateToken);
    }

    public function withCampaignToken(string $campaignToken): self
    {
        return $this->with('ct', $campaignToken);
    }

    public function withMediaType(string $mediaType): self
    {
        return $this->with('mt', $mediaType);
    }

    public function withProviderToken(string $providerToken): self
    {
        return $this->with('pt', $providerToken);
    }
}
