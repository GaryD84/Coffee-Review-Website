<?php 

class CreateCoffeeReviewCest
{
    public function _before(AcceptanceTester $I)
    {
        // visit website root
        $I->amOnPage('/index.php?action=login');

        // we should NOT see confirmation of login user name, and a logout link - before login
        $I->dontSee('You are logged in as: admin');
        $I->dontSeeLink('logout');

        // fill in username and password and submit
        $I->submitForm('#loginForm', [
            'username' => 'admin',
            'password' => 'admin'
        ]);

        // we should see confirmation of login user name, and a logout link
        $I->see('You are logged in as: admin');
        $I->seeLink('logout');
    }

    public function createCoffeeReviewAndSeeInList(AcceptanceTester $I)
    {
        // visit coffee review list page
        $CoffeeReviewListURL = 'index.php?action=list';
        $I->amOnPage($CoffeeReviewListURL);

        // before insert we should NOT see coffee shop/name in list
        $I->dontSee('coffee shop north star');

        $I->click('CREATE a new CoffeeReview');

        // fill in username and password and submit
        $I->submitForm('#newCoffeeReviewForm', [
            'title' => 'North Star',
            'category' => 'Cappachino',
            'price' => 2.99
        ]);

        // we should now see north star in list
        $I->see('North Star');
    }
}
