<?php namespace App;

use Ixyz\Maverick\Core\Route;

class Router
{
    public static function regist()
    {
        $route = Route::instance();

        $route->function('ConfigController@themeSupport');
        $route->function('ConfigController@removeActions');

        $route->template('index', 'Page\IndexController@index');
        $route->template('single', 'Page\PostController@single');
        $route->template('page', 'Page\PostController@page');
        $route->template('404', 'Page\ErrorController@_404');

        return $route;
    }
}
