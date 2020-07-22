<?php


namespace MichaelLedin\FirebaseDynamicLink;

class Android extends SimpleBuilder
{
    /**
     * The package name of the Android app to use to open the link. The app must be connected to your project
     * from the Overview page of the Firebase console. Required for the Dynamic Link to open an Android app.
     * @param string $packageName
     * @return $this
     */
    public function withPackageName(string $packageName): self
    {
        return $this->with('apn', $packageName);
    }

    /**
     * The versionCode of the minimum version of your app that can open the link.
     * If the installed app is an older version, the user is taken to the Play Store to upgrade the app.
     * @param int $versionCode
     * @return $this
     */
    public function withMinimumVersionCode(int $versionCode): self
    {
        return $this->with('amv', $versionCode);
    }

    /**
     * The link to open when the app isn't installed. Specify this to do something other than install your app
     * from the Play Store when the app isn't installed, such as open the mobile web version of the content,
     * or display a promotional page for your app.
     * @param string $url
     * @return $this
     */
    public function withFallbackLink(string $url): self
    {
        return $this->with('afl', $url);
    }
}
