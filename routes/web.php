<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/{streamer}/{follower}[/{timezone}]', function ($streamer, $follower, $timezone = 'America/Phoenix') use ($router) {
    $url = file_get_contents('http://api.newtimenow.com/follow-length/?channel=' . $streamer . '&user=' . $follower);
    $time_started = \Carbon\Carbon::parse($url);
    $time_started->tz($timezone);
    return $time_started->diffForHumans(null, true);
});
