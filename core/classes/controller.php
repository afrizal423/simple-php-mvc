<?php

abstract class Controller {

    private $route = [];

    private $args = 0;

    private $params = [];

    function __construct () {

        $this->route = explode('/', URI);

        $this->args = count($this->route);

        $this->router();

    }

    private function router () {
        /*
        Fungsi class_exists ini memeriksa apakah kelas yang diberikan
         telah ditentukan atau tidak.
        */
        //var_dump($this->route[1]);
        if (class_exists($this->route[1])) {

            if ($this->args >= 3) {
                if (method_exists($this, $this->route[2])) {
                    $this->uriCaller(2, 3);
                } else {
                    $this->uriCaller(0, 2);
                }
            } else {
                $this->uriCaller(0, 2);
            }

        } else {

            if ($this->args >= 2) {
                if (method_exists($this, $this->route[1])) {
                    $this->uriCaller(1, 2);
                } else {
                    $this->uriCaller(0, 1);
                }
            } else {
                $this->uriCaller(0, 1);
            }

        }

    }

    private function uriCaller ($method, $param) {
       // var_dump($method, $param);

        for ($i = $param; $i < $this->args; $i++) {
            $this->params[$i] = $this->route[$i];
        }//var_dump($i);

        if ($method == 0)
            call_user_func_array(array($this, 'Index'), $this->params);
        else
            call_user_func_array(array($this, $this->route[$method]), $this->params);

    }

    abstract function Index ();

    function model ($path, $data = []) {

        $path = $path;

        $class = explode('/', $path);
        //var_dump($class);
        $class = $class[count($class)-1];
        //var_dump($class);
        if (is_array($data))
            extract($data);
        $path = strtolower($path);

        require(ROOT . '/app/models/' . $path . '.php');

        $this->$class = new $class;

    }

    function view ($path, $data = []) {

        if (is_array($data))
            extract($data);

        require(ROOT . '/app/views/' . $path . '.php');

    }

}

?>