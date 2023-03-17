<?php
use Phalcon\Db\Adapter\Pdo\Mysql;
use Phalcon\Mvc\Micro;
use Phalcon\Http\Response;

// Initialize the application
$app = new Micro();

// Set up the database connection
$db = new Mysql(array(
    "host" => "localhost",
    "username" => "root",
    "password" => "",
    "dbname" => "mydatabase"
));

// User registration
$app->post('/register', function () use ($app, $db) {
    // Retrieve the request data
    $data = $app->request->getJsonRawBody();

    // Check if the email address is already registered
    $query = "SELECT * FROM users WHERE email = :email";
    $result = $db->fetchAll($query, Phalcon\Db::FETCH_ASSOC, array(
        "email" => $data->email
    ));
    if (count($result) > 0) {
        $response = new Response();
        $response->setStatusCode(409);
        $response->setJsonContent(array("message" => "Email address already registered"));
        return $response;
    }

    // Insert the new user record
    $query = "INSERT INTO users (email, phone, password) VALUES (:email, :phone, :password)";
    $success = $db->execute($query, array(
        "email" => $data->email,
        "phone" => $data->phone,
        "password" => password_hash($data->password, PASSWORD_DEFAULT)
    ));
    if (!$success) {
        $response = new Response();
        $response->setStatusCode(500);
        $response->setJsonContent(array("message" => "Error registering user"));
        return $response;
    }

    // Return a success message
    $response = new Response();
    $response->setStatusCode(201);
    $response->setJsonContent(array("message" => "User registered successfully"));
    return $response;
});

// User profile
$app->get('/profile', function () use ($app, $db) {
    // Retrieve the user ID from the authentication token
    $userId = $app->request->getHeader("Authorization");

    // Retrieve the user record
    $query = "SELECT first_name, last_name, role FROM users WHERE id = :id";
    $result = $db->fetchOne($query, Phalcon\Db::FETCH_ASSOC, array(
        "id" => $userId
    ));
    if (!$result) {
        $response = new Response();
        $response->setStatusCode(404);
        $response->setJsonContent(array("message" => "User not found"));
        return $response;
    }

    // Return the user profile
    $response = new Response();
    $response->setJsonContent($result);
    return $response;
});

// Update user profile
$app->put('/profile', function () use ($app, $db) {
    // Retrieve the user ID from the authentication token
    $userId = $app->request->getHeader("Authorization");

    // Retrieve the request data
    $data = $app->request->getJsonRawBody();

    // Update the user record
    $query = "UPDATE users SET first_name = :first_name, last_name = :last_name WHERE id = :id";
    $success = $db->execute($query, array(
        "first_name" => $data->first_name,
        "last_name" => $data->last_name,
        "id" => $userId
    ));
    if (!$success) {
        $response = new Response();
        $response->setStatusCode(500);
        $response->setJsonContent(array("message" => "Error updating user profile"));
        return $response;
    }
    
    // Return a success message
    $response = new Response();
    $response->setJsonContent(array("message" => "User profile updated successfully"));
    return $response;
    });
    
