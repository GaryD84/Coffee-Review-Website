<?php
namespace Tudublin;

class WebApplication
{


    //const PATH_TO_TEMPLATES = __DIR__ . '/..../templates';
    private $mainController;
    private $CoffeeReviewController;
    private $loginController;
    private $AdminController;

    public function __construct()
    {
        //$twig = new\Twig\Environment(new \Twig\loader\FilesystemLoader
       // ( paths: self::PATH_TO_TEMPLATES));

        // $this->mainController = new MainController($twig);
        // }


        $this->mainController = new MainController();
        $this->CoffeeReviewController = new CoffeeReviewController();
        $this->loginController = new LoginController();
        $this->AdminController = new AdminController();

//
   //     $dotEnvLoader = new DotEnvLoader();
    //    $dotEnvLoader->loadDBConstantsFromDotenv();
    }


    public function run()
    {
        $action = filter_input(INPUT_GET, 'action');
        if (empty($action)) {
            $action = filter_input(INPUT_POST, 'action');
        }

        $module = filter_input(INPUT_GET, 'module');
        if (empty($module)) {
            $module = filter_input(INPUT_POST, 'module');
        }

        switch ($module) {
            case 'admin':
                if ($this->loginController->isGranted('ROLE_ADMIN')) {
                    $this->adminFunctions($action);
                } else {
                    $this->CoffeeReviewController->error('you are not authorised for this action');
                }
                break;

            default:
                $this->defaultFunctions($action);
        }
    }

    private function defaultFunctions($action)
    {
        switch ($action) {
            case 'processComment':
                $this->mainController->processNewComment();
                break;

            case 'processLogin':
                $this->loginController->processLogin();
                break;

            case 'logout':
                $this->loginController->logout();
                break;

            case 'login':
                $this->loginController->loginForm();
                break;

            case 'processEditCoffeeReview':
                if($this->loginController->isLoggedIn()){
                    $this->CoffeeReviewController->processUpdateCoffeeReview();
                } else {
                    $this->CoffeeReviewController->error('not authorised for this action');
                }
                break;

            case 'editCoffeeReview':
                $this->CoffeeReviewController->edit();
                break;

            case 'processNewCoffeeReview':
                if($this->loginController->isLoggedIn()){
                    $this->CoffeeReviewController->processNewCoffeeReview();
                } else {
                    $this->CoffeeReviewController->error('not authorised for this action');
                }
                break;

            case 'newCoffeeReviewForm':
                $this->CoffeeReviewController->createForm();
                break;

            case 'deleteCoffeeReview':
                if($this->loginController->isLoggedIn()){
                    $this->CoffeeReviewController->delete();
                } else {
                    $this->CoffeeReviewController->error('not authorised for this action');
                }
                break;

            case 'about':
                $this->mainController->about();
                break;

            case 'contact':
                $this->mainController->contact();
                break;

            case 'list':
                $this->mainController->list();
                break;


            case 'sitemap':
                $this->mainController->sitemap();
                break;

            case 'loginForm':
                $this->mainController->loginForm();
                break;

            case 'resetDatabase':
                print '<a href="/">home</a><hr>';
                require_once __DIR__ . '/../db/migrateAndLoadUserFixtures.php';
                require_once __DIR__ . '/../db/migrationAndFixtures.php';
                break;

            default:
                $this->mainController->home();
        }
    }

    private function adminFunctions($action)
    {
        switch ($action) {
            case 'processNewUser':
                $this->AdminController->processNewUser();
                break;

            case 'newUserForm':
                $this->AdminController->newUserForm();
                break;

            default:
                $this->mainController->home();
        }
    }
}