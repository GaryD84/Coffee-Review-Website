<?php


namespace Tudublin;


class MainController extends Controller
{
    public function processNewComment()
    {


        $commentText = filter_input(INPUT_POST, 'comment');

        // only create a comment if it's not an empty string
        if(!empty($commentText)) {
            $comment = new Comment();
            $comment->setComment($commentText);

            // store logged-in user ID, if a user is logged-in
            $loginController = new LoginController($this->twig);// trying to pass in twig
            if($loginController->isLoggedIn()){
                $userName = $loginController->userNameFromSession();
                $loggedInUser = $this->userRepository->getUserByUserName($userName);

                // store ID of logged-in user in new Comment object
                $comment->setUserId($loggedInUser->getId());

        }

        $this->commentRepository->create($comment);
    }

        $CoffeeReviewController = new CoffeeReviewController();
        $CoffeeReviewController->listCoffeeReview();
    }

    public function home()
    {
        $template = 'index.html.twig';
        $args = [];
        $html = $this->twig->render($template, $args);
        print $html;
    }

    public function about()
    {
        $template = 'about.html.twig';
        $args = [];
        $html = $this->twig->render($template, $args);
        print $html;
    }

    public function contact()
    {
        $template = 'contact.html.twig';
        $args = [];
        $html = $this->twig->render($template, $args);
        print $html;
    }

    public function list()
    {
        $template = 'list.html.twig';
        $args = [];
        $html = $this->twig->render($template, $args);
        print $html;
    }

    public function sitemap()
    {
        $template = 'sitemap.html.twig';
        $args = [];
        $html = $this->twig->render($template, $args);
        print $html;
    }

    public function loginForm()
    {
        $template = 'loginForm.html.twig';
        $args = [];
        $html = $this->twig->render($template, $args);
        print $html;
    }



}