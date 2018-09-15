<?php
/**
 * Created by PhpStorm.
 * User: alessandro
 * Date: 15/09/18
 * Time: 15:09
 */

namespace Application\Controller;


abstract class Controller
{
    /**
     * @param string $viewName
     * @param $data
     */
    protected function render(string $viewName, $data = [])
    {
        $filename =  __DIR__ . "../../views/$viewName.phtml";

        if (is_file($filename)) {
            die("$viewName file not found");
        }

        require $filename;
    }

    /**
     * @param string $route
     */
    protected function redirect(string $route)
    {
        header('location: ' . $route);
    }
}