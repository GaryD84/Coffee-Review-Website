<?php


namespace Tudublin;


//use Mattsmithdev\PdoCrudRepo\DatabaseTableRepository;

class CoffeeReviewController extends Controller
{
    protected $CoffeeReviewRepository; //public

    public function __construct()
    {
        parent::__construct();
        $this->CoffeeReviewRepository = new CoffeeReviewRepository();
    }

    public function listCoffeeReview()
    {
        $CoffeeReview = $this->CoffeeReviewRepository->findAll();
        $comments = $this->commentRepository->findAll();

        $comments = array_reverse($comments);

        $template = 'list.html.twig';
        $args = [
            'CoffeeReview' => $CoffeeReview,

            'comments'  =>  $comments
        ];


        $html = $this->twig->render($template, $args); //'render'
        print $html;
    }


    public function delete()
    {
        $id = filter_input(INPUT_GET, 'id');
        $success = $this->CoffeeReviewRepository->delete($id);

        if ($success) {
            $this->listCoffeeReview();
        } else {
            $message = 'error trying to delete CoffeeReview with ID = ' . $id;
            $this->error($message);
        }
    }

    public function error($errorMessage)
    {
        $template = 'error.html.twig';
        $args = [
            'errorMessage' => $errorMessage
        ];
        $html = $this->twig->render($template, $args);
        print $html;
    }

    public function createForm($errors = [], $CoffeeReview = null)
    {
        $template = 'newCoffeeReviewForm.html.twig';

        if (count($errors) > 0) {
            $args = [
                'errors' => $errors,
                'CoffeeReview' => $CoffeeReview
            ];
        } else {
            $args = [];
        }

       // $html = $this->twig->render($template, $args);
       // print $html;
   // }

    /*$args = [];
    $html = $this->twig->render($template, $args);
    print $html;
}*/

    //public

        $m = new CoffeeReview();
$m->setTitle($title);
$m->setCategory($Category);
$m->setPrice($price);
$m->setVoteTotal(0);
$m->setNumVotes(0);

$this->CoffeeReviewRepository->create($m);

$this->listCoffeeReview();
}

private function validateCoffeeReview(CoffeeReview $CoffeeReview)
{
    $errors = [];

    // title
    if (empty($CoffeeReview->getTitle())) {
        $errors[] = "title :: must have a value";
    } else {
        if (strlen($CoffeeReview->getTitle()) < 3) {
            $errors[] = "title :: must have at least 3 characters";
        }
    }

    // category
    if (empty($CoffeeReview->getCategoryId())) {
        $errors[] = "category :: must have a value";
    } else {
        if (strlen($CoffeeReview->getCategoryId()) < 3) {
            $errors[] = "category :: must have at least 3 characters";
        }
    }

    // price
    if (empty($CoffeeReview->getPrice())) {
        $errors[] = "price :: must have a value";
    } else {
        if (!is_numeric($CoffeeReview->getPrice())) {
            $errors[] = "price :: must be a number";
        }
    }

    return $errors;
}


public function edit()
{
    $id = filter_input(INPUT_GET, 'id');
    $CoffeeReview = $this->CoffeeReviewRepository->find($id);

    // if not NULL pass Coffee Review object to editForm method
    if ($CoffeeReview) {
        $this->editForm($CoffeeReview);
    } else {
        $message = 'error trying to edit Coffee Review with ID = ' . $id;
        $this->error($message);
    }
}


public function editForm($CoffeeReview)
{
    $template = 'editCoffeeReviewForm.html.twig';
    $args = [
        'CoffeeReview' => $CoffeeReview
    ];
    $html = $this->twig->render($template, $args);
    print $html;
}

public function processUpdateCoffeeReview()
{
    $id = filter_input(INPUT_POST, 'id');
    $title = filter_input(INPUT_POST, 'title');
    $categoryId = filter_input(INPUT_POST, 'categoryId');
    $price = filter_input(INPUT_POST, 'price');
    $voteTotal = filter_input(INPUT_POST, 'voteTotal');
    $numVotes = filter_input(INPUT_POST, 'numVotes');

    $m = new CoffeeReview();
    $m->setId($id);
    $m->setTitle($title);
    $m->setCategoryId($categoryId);
    $m->setPrice($price);
    $m->setVoteTotal($voteTotal);
    $m->setNumVotes($numVotes);

    $success = $this->CoffeeReviewRepository->update();

    if ($success) {
        $this->listCoffeeReview();
    } else {
        $message = 'error trying to EDIT Coffee Review with ID = ' . $id;
        $this->error($message);
    }
}
}





//public function processNewCoffeeReview()









