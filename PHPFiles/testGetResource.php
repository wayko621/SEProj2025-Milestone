<?php
namespace Devdogz\Se2015projTest;
use InvalidArgumentException;  

//Database Connection//
require_once 'dbconfig.php';

class getResource
{
    private $mysqli;

    public function __construct()
    {
        // Use DBConfig to get the MySQLi connection
        $dbConfig = new DBConfig();
        $this->mysqli = $dbConfig->getConnection();
    }
    
    public function getResourceByName($resourcename)
    {
        // Prepare and execute the query to get the user
        $stmt = $this->mysqli->prepare('SELECT resourceName FROM resourcelist WHERE resourceName = ?');
        
        // Use 's' for string (resourcename) 
        $stmt->bind_param('s', $resourcename);  
        
        $stmt->execute();
        
        // Get the result
        $result = $stmt->get_result();
        $resourceFound = $result->fetch_assoc();
        
        // Return the user if found, otherwise return null
        return $resourceFound;
    }

}