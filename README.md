# Notes App
#### Chad Cantrell

### Setup
1. create container
2. create tables
3. install passport oAuth

```
$ docker-compose build && docker-compose up -d
$ docker-compose exec app php artisan migrate
$ docker-compose exec app php artisan passport:install
```
**After running passport, please note user id's and secrets for testing purposes.

Using postman:

1. http://localhost/register

```
{
    "name": "Your Name",
    "email": "youremail@gmail.com",
    "password": "123456"
}
```

** take use the 'token' value in the return to make API calls

2. http://localhost/v1/api/note/create
```
/** code here **/
```

### About
Notes App is built on Laravel/Lumen.