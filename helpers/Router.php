<?php


class Router
{
    private static $url;
    private static $controller;
    private static $action;


    public static function getAction()
    {
        return self::$action;
    }

    public static function getController()
    {
        return self::$controller;
    }


    public static function parse($url)
    {
        self::$url = urldecode(trim($url, '/'));
        $controller_action = explode('?', self::$url)[0];
        $url_array = explode('/', $controller_action);
        self::$controller = (isset($url_array[0]) && !empty($url_array[0]))? $url_array[0] : DEFAULT_CONTROLLER;
        self::$action = (isset($url_array[1]) && !empty($url_array[0]))? $url_array[1] : DEFAULT_ACTION;

    }

    public static function getContentByUrl($url)
    {
        self::parse($url);
        $request = new Request();
        $controller_str = self::getController() . 'Controller';
        $controller = new $controller_str;
        $action = self::getAction() . 'Action';

        if (!method_exists($controller, $action)) {
            throw new Exception("{$action} not found", 404);
        }
        return $controller->$action($request);
    }


}