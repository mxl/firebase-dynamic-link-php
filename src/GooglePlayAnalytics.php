<?php


namespace MichaelLedin\FirebaseDynamicLink;

/**
 * Google Play analytics parameters.
 * Class GooglePlayAnalytics
 * @package MichaelLedin\FirebaseDynamicLink
 */
class GooglePlayAnalytics extends SimpleBuilder
{
    public function withGclid(string $gclid): self
    {
        return $this->with('gclid', $gclid);
    }

    public function withUtmCampaign(string $utmCampaign): self
    {
        return $this->with('utm_campaign', $utmCampaign);
    }

    public function withUtmContent(string $utmContent): self
    {
        return $this->with('utm_content', $utmContent);
    }

    public function withUtmMedium(string $utmMedium): self
    {
        return $this->with('utm_medium', $utmMedium);
    }

    public function withUtmSource(string $utmSource): self
    {
        return $this->with('utm_source', $utmSource);
    }

    public function withUtmTerm(string $utmTerm): self
    {
        return $this->with('utm_term', $utmTerm);
    }
}
