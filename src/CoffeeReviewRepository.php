<?php


namespace Tudublin;


use Mattsmithdev\PdoCrudRepo\DatabaseTableRepository;

class CoffeeReviewRepository extends DatabaseTableRepository
{
    public function findAll()
    {
        $CoffeeReview = [];

        $m1 = new CoffeeReview();
        $m1->setId(1);
        $m1->setTitle('NorthStar Coffee');
        $m1->setCategoryId('Amer ic ano');
        $m1->setPrice(2.20);
        $m1->setVoteTotal(5);
        $m1->setNumVotes(1);
        $CoffeeReview[] = $m1;

        $m2 = new CoffeeReview();
        $m2->setId(2);
        $m2->setTitle('The Oul Rambler');
        $m2->setCategoryId('espresso');
        $m2->setPrice(3.10);
        $m2->setVoteTotal(77 * 90);
        $m2->setNumVotes(77);
        $CoffeeReview[] = $m2;

        $m3 = new CoffeeReview();
        $m3->setId(3);
        $m3->setTitle('Coffee Hub');
        $m3->setCategoryId('Latte');
        $m3->setPrice(2.45);
        $m3->setVoteTotal(5 * 50);
        $m3->setNumVotes(5);
        $CoffeeReview[] = $m3;

        $m4 = new CoffeeReview();
        $m4->setId(4);
        $m4->setTitle('dock stop coffee');
        $m4->setCategoryId('mo cca');
        $m4->setPrice(2.05);
        $m4->setVoteTotal(0);
        $m4->setNumVotes(0);
        $CoffeeReview[] = $m4;

        $m5 = new CoffeeReview();

        $m5->setId(5);
        $m5->setTitle('java express');
        $m5->setCategoryId('Amer ic ano');
        $m5->setPrice(3.15);
        $m5->setVoteTotal(95 * 201);
        $m5->setNumVotes(201);
        $CoffeeReview[] = $m5;

        return $CoffeeReview;
       // var_dump($CoffeeReview);

        //$CoffeeReview = $CoffeeReviewRepository;  //remove method findAll()
        // from class coffee review Repository and make this empty class inherit from your own database table
       // print '<pre>';



    }

    public function update($CoffeeReview)
    {
        return $CoffeeReview;
    }

    public function delete($id)
    {
        return $id;
    }

}






