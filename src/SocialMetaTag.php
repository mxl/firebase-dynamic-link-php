<?php


namespace MichaelLedin\FirebaseDynamicLink;


class SocialMetaTag extends SimpleBuilder
{
    /**
     * The title to use when the Dynamic Link is shared in a social post.
     * @param string $title
     * @return $this
     */
    public function withTitle(string $title): self
    {
        return $this->with('st', $title);
    }

    /**
     * The description to use when the Dynamic Link is shared in a social post.
     * @param string $description
     * @return $this
     */
    public function withDescription(string $description): self
    {
        return $this->with('sd', $description);
    }

    /**
     * The URL to an image related to this link. The image should be at least 300x200 px, and less than 300 KB.
     * @param string $url
     * @return $this
     */
    public function withImage(string $url): self
    {
        return $this->with('si', $url);
    }
}
