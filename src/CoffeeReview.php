<?php


namespace Tudublin;


class CoffeeReview
{
    const CREATE_TABLE_SQL =
        <<<HERE
CREATE TABLE IF NOT EXISTS CoffeeReview (
    id integer PRIMARY KEY AUTO_INCREMENT,
    title text,
    category textId,
    price float,
    voteTotal integer,
    numVotes integer
)

HERE;

    private $id;
    private $title;
    private $categoryId;
    private $price;
    private $voteTotal;
    private $numVotes;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getCategoryId()
    {
        return $this->categoryId;
    }

    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getNumVotes()
    {
        return $this->numVotes;
    }

    public function setNumVotes($numVotes)
    {
        $this->numVotes = $numVotes;
    }

    public function getVoteTotal()
    {
        return $this->voteTotal;
    }

    public function setVoteTotal($voteTotal)
    {
        $this->voteTotal = $voteTotal;
    }



    public function getVoteAverage()
    {

        if($this->numVotes < 1){
            return 0;
        }
        return intval($this->voteTotal / $this->numVotes);
    }



    public function getStarImage()
    {
        if($this->getVoteAverage() > 85){
            return 'stars5.png';
        }
        if($this->getVoteAverage() > 70){
            return 'stars4.png';
        }
        if($this->getVoteAverage() >= 50){
            return 'stars3.png';
        }
        if($this->getVoteAverage() > 40){
            return 'stars2.png';
        }
        if($this->getVoteAverage() > 15){
            return 'stars1.png';
        }

        // if get here, less than 16%, so a half-star
        return 'starsHalf.png';
    }

    public function getCategory()
    {
        // if not NULL id, then find and return associated user
        if(!empty($this->categoryId)){
            $categoryRepository = new CategoryRepository();
            return $categoryRepository->find($this->categoryId);
        }

        // if id NULL, then return NULL
        return null;
    }



}


