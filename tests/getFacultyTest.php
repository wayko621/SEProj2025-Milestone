<?php
namespace Devdogz\Se2015projTest;

use PHPUnit\Framework\TestCase;

final class getFacultyTest extends TestCase
{
    private $mysqli;
    private $facultyRepository;

    protected function setUp(): void
    {
        // Connect to mysqli
        $dbConfig = new DBConfig();
        $this->mysqli = $dbConfig->getConnection();
        
        // Initialize getFacutly with the database connection
        $this->facultyRepository = new getFaculty();
    }

    public function testGetUserByCredentials()
    {
        $firstname = 'Jose';
        $email = "ortizj41@montclair.edu";

        // Pass user's login info by FirstName and FacID
        $facultyuser = $this->facultyRepository->getUserByCredentials($firstname);

        // Verify if user exist
        $this->assertNotNull($facultyuser, 'User should not be null');  // Ensure the user is found
        $this->assertEquals('Jose', $facultyuser['FirstName'], 'Firstname does not match');  
        $this->assertEquals("ortizj41@montclair.edu", $facultyuser['Email'], 'Email does not match');

         // Verify if user does not exist
        $this->assertNotNull($facultyuser, 'User should not be null');  // Ensure the user is found
        $this->assertEquals($firstname, $facultyuser['FirstName'], 'Firstname does not match');  
        $this->assertEquals($email, $facultyuser['Email'], 'Email does not match');
    }

    protected function tearDown(): void
    {
        // Close the mysqli connection
        $this->mysqli->close();
    }
}
