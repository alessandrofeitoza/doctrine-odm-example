<?php
/**
 * Created by PhpStorm.
 * User: alessandro
 * Date: 15/09/18
 * Time: 08:39
 */

namespace Application;

use Application\Controller\UserController;
use Application\Repository\UserRepository;
use Symfony\Component\Console\Application;

include '../vendor/autoload.php';

$documentManager = include_once '../config/connection.php';

$userController = new UserController(
    new UserRepository($documentManager)
);


$route = $_SERVER['REQUEST_URI'];

switch ($route) {
    case '/user':
        $userController->indexAction();
        break;

    case '/user/add':
        $userController->addAction();

        break;

    case '/user/insert':
        $userController->insertAction($_POST);
        break;

    default:
        header('HTTP/1.0 404 Not Found', true, 404);
        die('404 - Page not found');
}
