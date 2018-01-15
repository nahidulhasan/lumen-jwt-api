# Lumen with JWT Authentication

Basically this is a starter kit for you to integrate Lumen with JWT Authentication

## Quick Start

- Clone this repo or download it's release archive and extract it somewhere
- You may delete .git folder if you get this code via git clone
- Run composer install
- Configure your .env file for authenticating via database
- Run php artisan migrate --seed
- Run docker-compose build
- Run docker-compose up -d
- Run the following command to populate database tables and seeds.

	```bash
	$ docker-compose exec php php artisan migrate --seed
	```

- Visit `localhost:8084`.




