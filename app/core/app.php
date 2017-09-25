<?php

Class App
{
    protected $controller = 'home';
    protected $method = 'index';
    protected $param = [];

    /**     * App constructor.     */
    public function __construct()
    {
        $page = true;
        $url = self::parseUrl($_GET['url'] ?? 'home');
        if (file_exists("app/controllers/" . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }
        require_once 'app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;
        if (isset($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            $page = false;
            unset($url[1]);
        }
        $head = null;
        $this->param = $url ? array_values($url) : [];
        if (method_exists($this->controller, 'head')) {
            $head = call_user_func_array([$this->controller, 'head'], $this->param);
        }
        if ($page) {
            require_once './app/model/menu.php';
            $menu = new Menu();
            $color = array('azul', 'verde', 'laranja', 'rosa');
            include_once 'view/templates/header.php';
        }
        call_user_func_array([$this->controller, $this->method], $this->param);
        if ($page) {
            include_once 'view/templates/footer.php';
        }
    }

    private function parseUrl($url)
    {
        return explode("/", filter_var(rtrim($url), FILTER_SANITIZE_URL));
    }
}