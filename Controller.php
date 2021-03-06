<?php
    class Controller
    {
        public $config = array();

        /***
         * Конструктор класса
         *
         * @param array $config
         */
        function __construct(array $config = array())
        {
            $this->config = array_merge(
                array(
                    'controllersPath' => dirname(__FILE__) . '/Controllers/',
                ),
                $config
            );
        }

        /**
         * Обработка входящего запроса
         *
         * @param $uri
         */
        public function handleRequest($uri)
        {
            // Определяем страницу для вывода
            $request = explode('/', $uri);
            // Имена контроллеров у нас с большой буквы
            $name = ucfirst($request[0]);
            // Полный путь до запрошенного контроллера
            $file = $this->config['controllersPath'] . $name . '.php';
            // Если нужного контроллера нет, то используем контроллер Home
            if (!file_exists($file)) {
                $file = $this->config['controllersPath'] . 'ControllersJson.php';
                $class = 'ControllersJson';
            }
            // Если контроллер еще не был загружен - загружаем его
            if (!class_exists($class)) {
                require_once $file;
            }
            // И запускаем
            /** @var ControllersJson $controller */
            $controller = new $class($this); // Передавая экземпляр текущего класс в него - $this
            $response = $controller->run();
            echo $response;
        }
    }