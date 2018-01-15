# Lumen with JWT Authentication

Basically this is a starter kit for you to integrate Lumen with JWT Authentication

## Quick Start

- Clone this repo or download it's release archive and extract it somewhere
- You may delete .git folder if you get this code via git clone
- Run composer install
- Configure your .env file for authenticating via database
- Run docker-compose build
- Run docker-compose up -d
- Run the following command to populate database tables and seeds.

	```bash
	$ docker-compose exec php php artisan migrate --seed
	```

- Visit `localhost:8084`

> **Note:**
- You can now use:
- ```POST /auth/login``` –> with email and password, obtain a JWT token
- ```GET /posts``` –> anyone gets a list of all the posts in the database
- ```POST /posts``` –> any authenticated user (using JWT, for instance) can create a post
- ```PUT /posts/:post_id ``` –> the Owner of :post_id (authenticated using JWT, for instance) can modify the post

And remember, JWT requires you to provide the token as a header.






