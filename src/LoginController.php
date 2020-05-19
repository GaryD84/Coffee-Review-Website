<?php


namespace Tudublin;


class LoginController extends Controller
{

    public function userNameFromSession()
    {
        if ($this->isLoggedIn()) {
            return $_SESSION['username'];
        }

        return null;
    }

    public function isGranted($role)
    {
        if($this->isLoggedIn()){
            $roleInSession = $this->roleFromSession();
            if($role == $roleInSession){
                return true;
            }
        }

        // if get here, then either not logged in, or didn't have specified role
        return false;
    }


    public function roleFromSession()
    {
        if(isset($_SESSION['role'])){
            return $_SESSION['role'];
        }

        return '';
    }

    public function loginForm()
    {
        $template = 'loginForm.html.twig';
        $args = [];
        $html = $this->twig->render($template, $args);
        print $html;
    }

    public function processLogin()
    {
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');

        $role = $this->checkCredentials($username, $password);

        if(!empty($role)){
            // store value in session ...
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role;
            $mainController = new MainController();
            $mainController->home();
        } else {
            $coffeeReviewController = new CoffeeReviewController();
            $coffeeReviewController->error('bad username or password');
        }
    }


    public function isLoggedIn()
    {
        if(isset($_SESSION['username'])){
            return true;
        }

        return false;
    }

    public function logout()
    {
        $_SESSION = [];
        $mainController = new MainController();
        $mainController->home();
    }


    public function checkCredentials($username, $password)
    {
        $userRepository = new UserRepository();
        $user = $userRepository->getUserByUserName($username);

        if($user) {
            $passwordFromDatabase = $user->getPassword();
            $role = $user->getRole();
            if(password_verify($password, $passwordFromDatabase)){
                return $role;
            }
        }

        return '';
    }
}

    /*public function isLoggedIn()
    {
    }

    public function isGranted($string)
    {
    }

    public function processLogin()
    {
    }

    public function logout()
    {
    }

    public function loginForm()
    {
    }

}*/