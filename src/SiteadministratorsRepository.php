<?php


namespace Tudublin;


use Mattsmithdev\PdoCrudRepo\DatabaseTableRepository; /* create your own pdocrudrepo database table?*/

class SiteadministratorsRepository extends DatabaseTableRepository
{
    public function getUserBySiteadministratorsName($Siteadministratorsname)
    {
        // get DB connection object
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        // create template SQL, with ':<var>' slot for parameter binding
        $sql = 'SELECT * FROM user WHERE (Siteadministratorsname = :Siteadministratorsname)';

        // create a preparedd SQL statement
        $statement = $connection->prepare($sql);

        // bind in parameter
        $statement->bindParam(':username', $Siteadministratorsname);

        // set fetch mode, so PDO returns us Objects rather than arrays
        $statement->setFetchMode(\PDO::FETCH_CLASS, $this->getClassNameForDbRecords());

        // execute the query
        $statement->execute();

        // retrieve the object (or get NULL if no row returned from query)
        $Siteadministrators = $statement->fetch();
        return $Siteadministrators;
    }
}