Steam Web PHP SDK
================

An SDK for interfacing with Steam's Web API using PHP

### Installation

Manually install the Slim Framwork into your API proxy directory. You only need
/Slim.

http://www.slimframework.com/install

Install Unirest for PHP from source from GitHub so that /Unirest and
/Unirest.php sit in your API proxy directory.

http://unirest.io/php.html

Configuration
=============

Set your Steam Web API key in steamwebapi_config.php.

Creating Request
================

Normally, you'd make a request to the Steam Web API like so:

```
http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=XXXXXXXXXXXXXXXXXXXXXXX&steamids=76561198041546169
```

...and deal with that in your back-end somehow. The Steam Web PHP API proxy is
for usage on the client-side, however. To use it in your applications, simply
change the base URL to your API proxy URL.

```
http://example.com/steamwebapi/ISteamUser/GetPlayerSummaries/v0002/?key=XXXXXXXXXXXXXXXXXXXXXXX&steamids=76561198041546169
```
