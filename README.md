# two-oceans-task
Coding test for PHP developer
here's a brief explanation of how I approached the problem of creating a REST API with the given features.

User Registration
For user registration, I created a POST route "/register" which accepts email, phone, password, and confirm_password as request parameters. I validated the email and phone fields to ensure they are unique and well-formatted. I also ensured that the password and confirm_password fields matched before creating a new user in the database.

User Profile
I created a User model with first_name, last_name, and role attributes. Registered users can view their profiles by accessing the GET route "/users/{id}" and can update their profiles by sending a PUT request to "/users/{id}". Only authenticated users can access these routes.

Article Creation
I created an Article model with title and post attributes. Users with the "writer" role can create articles by sending a POST request to "/articles". The articles are associated with the user who created them, so they can only read, update, and delete their own articles.

Article Comments
I created a Comment model with text and user_id attributes. Users with the "writer" role can view comments on their own articles by sending a GET request to "/articles/{article_id}/comments". Users with the "editor" role can view comments on all articles by sending a GET request to "/articles/{article_id}/comments".

Authentication and Authorization
I used JSON Web Tokens (JWT) for authentication and authorization. Registered users can obtain a token by sending a POST request to "/login" with their email and password. The token is then included in the Authorization header of subsequent requests. I also added middleware to ensure that users are authenticated and authorized to access certain routes.

Framework and Libraries
To build the REST API, I used the Laravel PHP framework, which provided a lot of helpful tools and libraries out of the box. For example, I used Laravel's validation library to validate user input, and its Eloquent ORM to interact with the database.

Overall, I followed the Model-View-Controller (MVC) architecture pattern to keep the code organized and maintainable. I also wrote unit tests for each of the routes to ensure that they behaved as expected. Finally, I wrote API documentation using Swagger, which provided a clear and easy-to-use interface for exploring the API's endpoints and parameters.




