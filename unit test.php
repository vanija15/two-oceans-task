<?php
use PHPUnit\Framework\TestCase;

//example of how you could write unit tests for the REST API

class UserRegistrationTest extends TestCase {
    public function testRegistration() {
        $client = new GuzzleHttp\Client(['base_uri' => 'http://localhost']);
        
        // test valid registration
        $response = $client->post('/register', [
            'form_params' => [
                'email' => 'testuser@example.com',
                'phone' => '1234567890',
                'password' => 'password123',
                'confirm_password' => 'password123'
            ]
        ]);
        $this->assertEquals(200, $response->getStatusCode());
        
        // test invalid registration (missing required field)
        $response = $client->post('/register', [
            'form_params' => [
                'email' => 'testuser@example.com',
                'password' => 'password123',
                'confirm_password' => 'password123'
            ]
        ]);
        $this->assertEquals(400, $response->getStatusCode());
    }
}

class UserProfileTest extends TestCase {
    private $client;
    private $token;
    
    public function setUp() {
        $this->client = new GuzzleHttp\Client(['base_uri' => 'http://localhost']);
        
        // log in as a registered user
        $response = $this->client->post('/login', [
            'form_params' => [
                'email' => 'testuser@example.com',
                'password' => 'password123'
            ]
        ]);
        $data = json_decode((string)$response->getBody(), true);
        $this->token = $data['token'];
    }
    
    public function testCreateProfile() {
        // create a new user profile
        $response = $this->client->post('/profiles', [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->token
            ],
            'form_params' => [
                'first_name' => 'Test',
                'last_name' => 'User',
                'role' => 'writer'
            ]
        ]);
        $this->assertEquals(200, $response->getStatusCode());
    }
    
    public function testUpdateProfile() {
        // update the user's profile
        $response = $this->client->put('/profiles/1', [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->token
            ],
            'form_params' => [
                'first_name' => 'Updated',
                'last_name' => 'User'
            ]
        ]);
        $this->assertEquals(200, $response->getStatusCode());
    }
}

class UserPostTest extends TestCase {
    private $client;
    private $token;
    
    public function setUp() {
        $this->client = new GuzzleHttp\Client(['base_uri' => 'http://localhost']);
        
        // log in as a registered user with writer role
        $response = $this->client->post('/login', [
            'form_params' => [
                'email' => 'testuser@example.com',
                'password' => 'password123'
            ]
        ]);
        $data = json_decode((string)$response->getBody(), true);
        $this->token = $data['token'];
    }
    
    public function testCreatePost() {
        // create a new post
        $response = $this->client->post('/posts', [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->token
            ],
            'form_params' => [
                'title' => 'Test Post',
                'post
