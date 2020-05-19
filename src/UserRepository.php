<?php


namespace Tudublin;


use Mattsmithdev\PdoCrudRepo\DatabaseManager;
use Mattsmithdev\PdoCrudRepo\DatabaseTableRepository; /* create your own pdocrudrepo database table?*/

class UserRepository extends DatabaseTableRepository
{
    public function getUserByUserName($Username)
    {
        // get DB connection object
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        // create template SQL, with ':<var>' slot for parameter binding
        $sql = 'SELECT * FROM user WHERE (Username = :Username)';

        // create a preparedd SQL statement
        $statement = $connection->prepare($sql);

        // bind in parameter
        $statement->bindParam(':Username', $Username);

        // set fetch mode, so PDO returns us Objects rather than arrays
        $statement->setFetchMode(\PDO::FETCH_CLASS, $this->getClassNameForDbRecords());

        // execute the query
        $statement->execute();

        // retrieve the object (or get NULL if no row returned from query)
        $user = $statement->fetch();
        return $Username;
    }
}