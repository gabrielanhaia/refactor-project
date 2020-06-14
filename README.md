[![CircleCI](https://circleci.com/gh/gabrielanhaia/refactor-project/tree/master.svg?style=svg&circle-token=be30451dd26d1f9c810b1ecb52d4b83a9bedaa9f)](https://circleci.com/gh/gabrielanhaia/refactor-project/tree/master)

# Refactor Project

## Technologies and methodologies

* CircleCi: I am using CircleCi for the continuous integration, It's running the Unit tests only but it is easy to add more steps in the build pipeline.
* Docker: I am using docker as I always do when working in a new project. We bring only advantages to our team using it.
* Scrum (kind of): I used a board to track the things that I thought I should do.
* Symfony: It was the framework in the original project, I believe it is an amazing and powerful framework.
* PSRs: I always follow the PSRs in my projects, It's the best way to have a standard in our code and improve the quality and legibility.
* REST API
* DDD: I decided to use DDD because It's good applying patterns solving more complex problems. I agree that in a small project like this it is not necessary, but if the system grows it would be better to have a structure like this.
We are not depending on a specific Framework, I could easily create implementations using Eloquent ORM (Infrastructure Layer) and migrate it to a Laravel project or another framework.
Besides that, we not too much effort we could use Event-driven, or/and work in a microservice-oriented architecture.
* PHPUnit: I didn't cover everything.
* UUIDs: It's better mainly when working with microservices.
* PHP 7.4
* MySQL

## How do I use it?
 
Pre-requirements: 
  - Docker
 
 #### For the first time running:
 1. Clone the project on your machine.
 2. Open the terminal on the project folder.
 3. Copy *.env.example* to *.env* (You don't need to change the environment variables related to DB. If you change you will need to change the docker files as well).
 4. Run: ```# docker-compose up -d```
 5. Run: ```# docker-compose exec php-fpm composer install``` (It installs the dependencies)
 6. Run: ```# docker-compose exec php-fpm php bin/console doctrine:migrations:migrate``` (It creates the tables...)
 7. Run: ```# docker-compose exec php-fpm php bin/console doctrine:fixtures:load``` (It inserts data in our database)

You can interact with the API using *http://localhost:8000/api/v1...*.
The database is running on port 3306 and you can access the data with your favorite client using the default parameters:
```
HOST: localhost or 127.0.0.1
PORT: 3306
USERNAME: rf_user
PASSWORD: rf_pass
DATABASE: rf_db

ADMIN_USERNAME: root
ADMIN_PASSWORD: rf_pass
```

### Interacting with the API:

The documentation of the API can be imported on postman using the file *./refactor.postman_collection.json* or you can see [HERE](https://hotelsproject.docs.apiary.io/#) or https://www.getpostman.com/collections/ee8bfcdb9699a4eabddc.

### Testing the widgets:

There is a file *test.html* on the main folder where I am importing the JS file.

### Final considerations:

- I think there are a lot of things that can be improved, I would love to discuss all of them. I took note of these things.
- Besides all the structural changes, I fixed a few small bugs (like AUTO_INCREMENT in the default migrations, ObjectManager in the Fixture classes.…etc)
- Look at the commits, you can see the timeline of the changes and evolution of the project. I use tags to track it (feature, refactor, fix...).
- I am using DDD, the most of the code in the folder “app”, I use to name this folder as “src” but I left the original name to don’t change the structure used by Symfony.
- API versions to guarantee the Integrations/apps will work properly if we have new releases/features.
- I am using UUIDs as binary(16) to increase the performance instead of the popular CHAR(16).
- For the Chain hotel, I decided to create a table “company”, if a new hotel (small business with only one unity) decide to use our system, It will have 1 row in “company” and 1-row “hotel”. We can store in the table “company” more information about the chain of hotels.
- The APIController was deprecated, I created one for each kind of resource (companies, hotels…)

### Plus: 
Interesting functions to work with UUID:
```
nteresting functions for UUID
SET GLOBAL log_bin_trust_function_creators = 1;

CREATE
    FUNCTION `uuid_to_ouuid`(uuid VARCHAR(36))
    RETURNS BINARY(16) DETERMINISTIC
    RETURN UNHEX(CONCAT(
            SUBSTR(uuid, 15, 4),
            SUBSTR(uuid, 10, 4),
            SUBSTR(uuid, 1, 8),
            SUBSTR(uuid, 20, 4),
            SUBSTR(uuid, 25, 12)
        ));

CREATE
    FUNCTION ouuid_to_uuid(uuid BINARY(16))
    RETURNS VARCHAR(36)
    RETURN LOWER(CONCAT(
            SUBSTR(HEX(uuid), 9, 8), '-',
            SUBSTR(HEX(uuid), 5, 4), '-',
            SUBSTR(HEX(uuid), 1, 4), '-',
            SUBSTR(HEX(uuid), 17, 4), '-',
            SUBSTR(HEX(uuid), 21, 12)
        ));
```