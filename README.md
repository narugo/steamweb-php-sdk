Steam Web PHP SDK
================

An SDK for interfacing with Steam's Web API using PHP

Configuration
=============

Set your Steam Web API key in *steamwebapi_config.php.*

Creating Request
================

Normally, you'd make a request to the Steam Web API like so:

* **_http://api.steampowered.com/_**_ISteamUser/GetPlayerSummaries/v0002/?key=XXXXXXXXXXXXXXXXXXXXXXX&steamids=76561198041546169_

...and deal with that in your back-end somehow. The Steam Web PHP API proxy is
for usage on the client-side, however. To use it in your applications, simply
change the base URL to your API proxy URL.

* **_http://example.com/steamwebapi/_**_ISteamUser/GetPlayerSummaries/v0002/?steamids=76561198041546169_

Extending
=========

The Steam Web PHP API included does not wrap every interface and method
provided by the Steam Web API. To extend its functionality for your project,
you can create new Slim routes. Interfaces and methods are separated by groups
to avoid repeating the same URL segments for multiple routes:

```php
/********************************************************************************
* IDOTA2Match_570
*******************************************************************************/

$app->group('/IDOTA2Match_570', function () use ($app) {

    $app->group('/GetMatchHistory', function () use ($app) {

        $app->get('/v001/', function () use ($app) {
        	get($app, '/IDOTA2Match_570/GetMatchHistory/v001/');
        });

    });

});
```
