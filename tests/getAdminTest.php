<?php
namespace Devdogz\Se2015projTest;

use PHPUnit\Framework\TestCase;

final class getAdminTest extends TestCase
{
    private $mysqli;
    private $adminRepository;

    protected function setUp(): void
    {
        // Connect to mysqli
        $dbConfig = new DBConfig();
        $this->mysqli = $dbConfig->getConnection();
        
        // Initialize getAdmin with the database connection
        $this->adminRepository = new getAdmin();
    }

    public function testGetUserByCredentials()
    {
        $firstname = 'Jose';
        $email = "ortizj41@montclair.edu";

        // Pass user's login info by FirstName and AdminID
        $adminuser = $this->adminRepository->getUserByCredentials($firstname);

        // Verify if user exist
        $this->assertNotNull($adminuser, 'User should not be null');  // Ensure the user is found
        $this->assertEquals('Jose', $adminuser['FirstName'], 'Firstname does not match');  // Ensures the first name entered matches the one in the DB
        $this->assertEquals("ortizj41@montclair.edu", $adminuser['Email'], 'Email does not match'); // Ensures the email entered matches the one in the DB
    }

    protected function tearDown(): void
    {
        // Close the mysqli connection
        $this->mysqli->close();
    }
}
