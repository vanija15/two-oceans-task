# two-oceans-task
Coding test for PHP developer


how the API request and response documentation could look like for the REST API with the features mentioned
file:///C:/Users/ASUS/AppData/Local/Temp/Temp1_Untitled%20document.zip/Untitleddocument.html

how I would approach solving the REST API problem:

Define the API endpoints: The first step is to define the API endpoints that will handle the various functionalities mentioned in the problem statement. The endpoints will include user registration, profile creation, post creation, post updating, post deletion, and comment creation.

Define the database schema: Based on the endpoint requirements, we can define the database schema, including tables for users, profiles, posts, and comments.

Set up the PHP framework: Next, we can set up a PHP framework like Laravel or CodeIgniter that can handle routing, controllers, and database connections. We can create controllers for each endpoint that will handle the business logic.

Implement user registration: We can start with implementing user registration, which will involve creating a user in the database with a hashed password. We can also add validation to ensure that the email and password fields are filled out correctly.

Implement profile creation: After registration, users will be able to create a profile with their first name, last name, and role. We can create an endpoint to handle profile creation and add validation to ensure that the required fields are filled out.

Implement post creation: Users with the writer role will be able to create posts, which will include a title and body. We can create an endpoint to handle post creation and add validation to ensure that the required fields are filled out.

Implement post updating and deletion: Writers will be able to update and delete their own posts. We can create endpoints to handle post updating and deletion and add validation to ensure that the user is authorized to perform these actions.

Implement comment creation: Writers will be able to read comments on their posts, and editors will be able to comment on any post. We can create an endpoint to handle comment creation and add validation to ensure that the required fields are filled out.

Test and document the API: Finally, we can test the API thoroughly and document the endpoints, request and response parameters, and error codes to make it easy for developers to use the API.

Overall, this approach follows the standard MVC architecture, where the framework handles routing and database connections, the controllers handle the business logic, and the views handle the presentation. Unit tests can be added to ensure that each endpoint works as expected, and API documentation can be generated using tools like Swagger or Postman.








