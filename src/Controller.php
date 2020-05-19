<?php


namespace Tudublin;


class Controller
{
    const PATH_TO_TEMPLATES = __DIR__ . '/../templates';
    protected $twig;

    protected $CoffeeReviewRepository;
    protected $commentRepository;
    protected $userRepository;
    //protected $CoffeeReviewRepository;

    public function __construct()
    {
        $this->twig = new \Twig\Environment(new \Twig\Loader\FilesystemLoader(self::PATH_TO_TEMPLATES));
        $this->twig->addGlobal('session', $_SESSION);

        $this->CoffeeReviewRepository = new CoffeeReviewRepository();
        $this->commentRepository = new CommentRepository();
        $this->userRepository = new UserRepository();
        //$this->CoffeeReviewRepository = new CoffeeReviewRepository();
    }
}