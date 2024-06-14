prerequisites: 
    1- PHP 8.1 or higher
    2- composer2.3 or higher 
    3- pdo_pgsql extension active in your php.ini
    4- active postgresql database

To run this project:
    1- copy .env.example into .env
    2- change DB credentials (DB_CONNECTION=pgsql, DB_HOST, DB_DATABASE, DB_USERNAME, DB_PASSWORD) into your active database
    3- run composer install
    4- run php artisan migrate
    5- run php artisan serve

Now that your app is active, you can try these APIs
requires authentication means it needs the Authorization header with a bearer token as follows "Bearer {access token from login API}"
Blog Posts APIs:
    1- GET /api/blog-posts: Retrieve all blog posts.
    2- GET /api/blog-posts/{id}: Retrieve a specific blog post by ID.
    3- POST /api/blog-posts: Create a new blog post (requires authentication).
    4- DELETE /api/blog-posts/{id}: Delete a blog post by ID (requires authentication).
    5- PATCH /api/blog-posts/{id}: Update a blog post by ID (requires authentication).
Authentication APIs:

    1- POST /api/auth/login: Login with credentials to obtain an access token.
    2- POST /api/auth/register: Register a new user.
