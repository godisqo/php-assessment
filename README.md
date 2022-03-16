## Local Setup

After cloning the repo locally with `$ git clone` or downloading zip, install dependencies with [Composer](https://getcomposer.org/doc/00-intro.md).  
`$ composer install`

Create .env file from .env.example

### Docker
The application can be setup locally with [Docker](https://www.docker.com/products/docker-desktop).  
Official nginx and php-fpm docker images are used to build the app.

##### Build the stack locally
`$ docker-compose up -d` <br>

#### Create Database and User:
You should be able to connect to database on localhost:33061 with root user and MYSQL_ROOT_PASSWORD configured in docker-compose.yml

Execute below queries.  
`CREATE USER 'notes_admin'@'%' IDENTIFIED WITH mysql_native_password BY 'admin123';`  
`GRANT ALL PRIVILEGES ON *.* TO 'notes_admin'@'%';`  
`CREATE DATABASE IF NOT EXISTS notes_app;`

#### Artisan commands:
Open shell for php container  
`$ docker exec -it php /bin/bash`

Run artisan commands  
`php artisan key:generate && php artisan migrate && php artisan db:seed`

#### Confirm below Api endpoints are available:

1. <p>Get all notes</p>

`curl -v http://localhost:8080/api/notes -H "Accept: application/json" -u "test1@test1.com:password" | less`

2. <p>Create a note</p>

`curl --data "title=example_title_content&note=example_note_content"  -u "test1@test1.com:password" -v http://localhost:8080/api/notes | less`
