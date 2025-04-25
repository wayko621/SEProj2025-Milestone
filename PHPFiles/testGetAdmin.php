<?php
namespace Devdogz\Se2015projTest;
use InvalidArgumentException; 
 
//Database Connection//
require_once 'dbconfig.php';

class getAdmin
{
    private $mysqli;

    public function __construct()
    {
        // Use DBConfig to get the MySQLi connection
        $dbConfig = new DBConfig();
        $this->mysqli = $dbConfig->getConnection();
    }

    public function getUserByCredentials($firstname)
    {
        
        // Prepare and execute the query to get the user
        $stmt = $this->mysqli->prepare('SELECT FirstName, AdminID, Email FROM adminmember WHERE FirstName = ?');
        
        // Use 's' for string (firstname) and 'i' for integer (AdminID)
        $stmt->bind_param('s', $firstname);  
        
        $stmt->execute();
        
        // Get the result
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        
        // Return the user if found, otherwise return null
        return $user;
    }

   

}