<?php
/**
 * Steam Web PHP API
 */
require 'Slim/Slim.php';
require 'Unirest.php';
require 'steamwebapi_config.php';

const STEAM_WEB_API_BASE_URL = 'http://api.steampowered.com';

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();
$app->setName('Steam Web API');

// Do nothing when we index the Steam Web PHP API
$app->get(
    '/',
    function () use ($app) {
        $app->halt(403);
    }
);

// Do nothing when we don't find an API endpoint
$app->notFound(function () {
});

function get($app, $endpoint) {
	$parameters = ['key' => STEAM_WEB_API_KEY];
    foreach ($app->request->get() as $key => $value) {
    	$parameters[$key] = $value;
    }

    $response = Unirest::get(STEAM_WEB_API_BASE_URL . $endpoint,
    						 NULL,
    						 $parameters);

    $app->response->setStatus($response->code);
    foreach ($response->headers as $key => $value) {
    	$app->response->headers->set($key, $value);
    }

    return $response->raw_body;
}

$app->group('/ISteamUser', function () use ($app) {

    $app->group('/GetPlayerSummaries', function () use ($app) {

        $app->get('/v0002', function () use ($app) {
        	echo get($app, '/ISteamUser/GetPlayerSummaries/v0002/');
        });

    });

});

$app->run();
