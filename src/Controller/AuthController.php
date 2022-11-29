<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\UserRepository;

class AuthController extends AbstractController
{
    private UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function login(): void
    {
        if(false === empty($_POST)) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->userRepository->findOneByEmail($email);

            if (false === $user) {
                die('Email não existe');
            }

            if (false === password_verify($password, $user->password)) 
            {
                die('Senha incorreta');
            }

                die('Deu rock');

                return;
        };
        // $this->render('auth/login', [], false);
        $this->render('auth/login', navbar: false); // apenas a partir do PHP8
    }

    public function logout(): void
    {

    }
}