<?php


namespace Core;


use Core\Http\Request;
use Core\Http\Response;
use Core\Http\Router;
use Core\session\SessionHandler;

class App
{
    protected static string $root;

    protected string $configPath;
    protected string $routerPath;

    protected static array $config = [];

    protected ?Request $request = null;

    public function __construct()
    {
        self::$root = getcwd();
        $this->configPath = self::$root . "/config/config.php";
        $this->routerPath = self::$root . "/config/routes.php";
    }

    /**
     * @param string $configPath
     * @return App
     */
    public function setConfigPath(string $configPath): App
    {
        $this->configPath = self::$root . $configPath;
        return $this;
    }

    /**
     * @param string $routerPath
     * @return App
     */
    public function setRouterPath(string $routerPath): App
    {
        $this->routerPath = self::$root . $routerPath;
        return $this;
    }

    public function run()
    {
        /**
         * @var Response $response
         */
        $response = $this->init()
            ->startSession()
            ->dispatch();
        $this->terminate($response);
    }

    protected function init()
    {
        self::$config = include $this->configPath;

        $this->request = Request::init();
        View::init(self::$root. self::config('app.view_path'));
        Router::setRoutes($this->routerPath);
        set_error_handler([ErrorHandler::class, "error"]);
        set_exception_handler([ErrorHandler::class, "exception"]);

        return $this;
    }

    protected function startSession()
    {
        session_save_path(self::$root. self::config('app.session_save_path'));
        session_set_save_handler(new SessionHandler());
        session_start();

        $_SESSION['authorized'] ??= false;

        return $this;
    }

    protected function dispatch()
    {
        return (new Http\Router)->dispatch($this->request);
    }

    protected function terminate(Response $response)
    {
        foreach ($response->getHeaders() as $headers => $value){
            header("$headers:$value");
        }
        http_response_code($response->getStatus());
        exit($response->getContent());
    }

    /**
     * @param string $keyPath
     * @param null $default
     * @return mixed
     */
    public static function config(string $keyPath, $default = null){
        $keys = explode('.', $keyPath);
        $value = self::$config;

        foreach ($keys as $key){
            $value = $value[$key] ?? $default;
        }
        return $value;
    }
}
