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

**Register** http://localhost/register

```
{
    "name": "Your Name",
    "email": "youremail@gmail.com",
    "password": "123456"
}
```

** take note of the 'token' value in the return to make API calls

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