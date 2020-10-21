<?php

namespace Core\Http;

use Exception;
use Core\Http\Response;

class Router
{
    protected static $routes = [];
    protected static $patch;

    public static function setRoutes(string $routesPath)
    {
        self::$routes = include $routesPath;

        return new static();
    }

    public static function dispatch(?Request $request): Response
    {
        // есть ли вообще обработчик на этом роуте?
        $handler = self::$routes[$request->path()] ?? null;
        // нет? - 404 страница не найдена
        if (is_null($handler)) {
            throw new Exception("404 not found");
        }
        // если найден - вызвать его с аргументами ($request, $response)
        $response = call_user_func_array($handler, [$request, new Response()]);
        // если мы вместо Response{} получили текст - оборачиваем в Response{}
        if (! $response instanceof Response) {
            return (new Response())->send($response);
        }
        // возвращаем ответ
        return $response;
    }
}