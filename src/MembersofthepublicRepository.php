<?php


namespace Tudublin;


use Mattsmithdev\PdoCrudRepo\DatabaseTableRepository; /* create your own pdocrudrepo database table?*/

class MembersofthepublicRepository extends DatabaseTableRepository
{
    public function getMembersofthepublicByMembersofthepublicName($Membersofthepublicname)
    {
        // get DB connection object
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        // create template SQL, with ':<var>' slot for parameter binding
        $sql = 'SELECT * FROM user WHERE (username = :username)';

        // create a preparedd SQL statement
        $statement = $connection->prepare($sql);

        // bind in parameter
        $statement->bindParam(':Members of the public name', $Membersofthepublicname);

        // set fetch mode, so PDO returns us Objects rather than arrays
        $statement->setFetchMode(\PDO::FETCH_CLASS, $this->getClassNameForDbRecords());

        // execute the query
        $statement->execute();

        // retrieve the object (or get NULL if no row returned from query)
        $user = $statement->fetch();
        return $Membersofthepublic;
    }
}