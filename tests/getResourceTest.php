<?php
namespace Devdogz\Se2015projTest;

use PHPUnit\Framework\TestCase;

final class getResourceTest extends TestCase
{
    private $mysqli;
    private $resourceRepository;

    protected function setUp(): void
    {
        // Connect to mysqli
        $dbConfig = new DBConfig();
        $this->mysqli = $dbConfig->getConnection();
        
        // Initialize getResource with the database connection
        $this->resourceRepository = new getResource();
    }


      public function testGetResource()
    {
        $resourcename = 'Podium1';
        
        // Pass user's login info by FirstName and FacID
        $resourceItem = $this->resourceRepository->getResourceByName($resourcename);

        // Verify if item exist
        $this->assertNotNull($resourceItem, 'User should not be null');  // Ensure the user is found
        $this->assertEquals('Podium1', $resourceItem['resourceName'], 'Resource name does not match');  

         // Verify if item does not exist
        $this->assertNotNull($resourceItem, 'User should not be null');  // Ensure the user is found
        $this->assertEquals('RandomName', $resourceItem['resourceName'], 'Resource name does not match');  
        
    }

    protected function tearDown(): void
    {
        // Close the mysqli connection
        $this->mysqli->close();
    }
}
