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

**Register** 

POST/ http://localhost/register

```
{
    "name": "Your Name",
    "email": "youremail@gmail.com",
    "password": "123456"
}
```
---

> Use return token in postman's Authentication/Bearer to make API calls.  JSON objects should be body/JSON.

**List All Notes By User Token** 

GET/ http://localhost:8000/v1/api/notes

**View Note**  

GET/ http://localhost/v1/api/note/{id}

**Add Note**  

POST/ http://localhost/v1/api/note/create
```
{
    "title": "testing title 1",
    "note": "here is a test notes to see"
}
```

**Update Note** 

PUT/ http://localhost/v1/api/note/update/{id}

```
{
    "title": "New Title",
    "note": "New note text"
}
```

**Delete Note** 

DELETE/ http://localhost/v1/api/note/delete/{id}