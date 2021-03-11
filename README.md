# Notes App
#### Chad Cantrell

### Setup
1. download dependencies
2. create container
3. create tables
4. install passport oAuth

```
$ composer install
$ docker-compose build && docker-compose up -d
$ docker-compose exec app php artisan migrate
$ docker-compose exec app php artisan passport:install
```
**After running passport, please note user id's and secrets for testing purposes.

Using postman:

**Register** http://localhost/register

```
{
    "name": "Your Name",
    "email": "youremail@gmail.com",
    "password": "123456"
}
```
---

**List All Notes By User Token** http://localhost:8000/v1/api/notes

**View Note**  http://localhost/v1/api/note/{id}

**Add Note**  http://localhost/v1/api/note/create
```
{
    "title": "testing title 1",
    "note": "here is a test notes to see"
}
```

**Update Note** http://localhost/v1/api/note/update/{id}
```
{
    "title": "New Title",
    "note": "New note text"
}
```

**Delete Note** http://localhost/v1/api/note/delete/{id}