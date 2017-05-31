<?php namespace App;

use Ixyz\Landbaron\Core\Route;

class Router
{
    public static function register()
    {
        $route = Route::instance();

        $route->function('ConfigController@themeSupport');
        $route->function('ConfigController@removeActions');

        $route->template('index', 'Page\IndexController@index', 'a', 'b');
        $route->template('single', 'Page\PostController@single');
        $route->template('page', 'Page\PostController@page');
        $route->template('404', 'Page\ErrorController@_404');

        return $route;
    }
}
