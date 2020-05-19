<?php


namespace Tudublin;


use Mattsmithdev\PdoCrudRepo\DatabaseTableRepository; /* create your own pdocrudrepo database table?*/

class StaffRepository extends DatabaseTableRepository
{
    public function getStaffByStaffName($Staffname)
    {
        // get DB connection object
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        // create template SQL, with ':<var>' slot for parameter binding
        $sql = 'SELECT * FROM user WHERE (Staffname = :Staffname)';

        // create a preparedd SQL statement
        $statement = $connection->prepare($sql);

        // bind in parameter
        $statement->bindParam(':Staff Name', $Staffname);

        // set fetch mode, so PDO returns us Objects rather than arrays
        $statement->setFetchMode(\PDO::FETCH_CLASS, $this->getClassNameForDbRecords());

        // execute the query
        $statement->execute();

        // retrieve the object (or get NULL if no row returned from query)
        $user = $statement->fetch();
        return $Staff;
    }
}