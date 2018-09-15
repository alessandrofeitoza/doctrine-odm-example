<?php
/**
 * Created by PhpStorm.
 * User: alessandro
 * Date: 15/09/18
 * Time: 15:04
 */

namespace Application\Controller;

use Application\Document\User;
use Application\Repository\UserRepository;

class UserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function indexAction()
    {
        try {
            $users = $this->userRepository->findAll();
        } catch (\Exception $exception) {
            die ($exception->getMessage());
        }

        $this->render('user', [
            'users' => $users,
        ]);
    }

    public function addAction()
    {
        $this->render('add_user');
    }

    public function insertAction($request)
    {
        $user = new User();
        $user
            ->setName($request['name'])
            ->setEmail($request['email'])
            ->setPassword(password_hash($request['password'], PASSWORD_ARGON2I));

        try {
            $this->userRepository->save($user);
        } catch (\Exception $exception) {
            die ($exception->getMessage());
        }

        $this->redirect('/user');
    }
}