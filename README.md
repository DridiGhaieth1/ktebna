# KTEBNA

## COPYRIGHTS

Most of the docker configs based on a project from GitHub

```https://github.com/nielsvandermolen/example_symfony4_api```

Angular project based on our angular validation project

```https://github.com/taghouti/covid```

## INTRODUCTION

We will use this project to create all the backend part using Symfony 5.3, 
frontend based on angular, 
all the services provided as docker images

## LOCAL DEPLOYMENT

### HOSTS

Our application based on 3 domains:

* ktebna.tn: angular application
* backend.ktebna.tn: symfony application
* db.ktebna.tn: phpmyadmin container

All the domains routed using **nginx reverse proxy**

### PROD ENVIRONMENT

* OS : Ubuntu 18.04.5 LTS
* Docker : version 20.10.7, build f0df350
* Docker compose : version 1.17.1, build unknown

### INSTALLATION

You need to add all the domains to your hosts file

```
127.0.0.1 ktebna.tn
127.0.0.1 backend.ktebna.tn
127.0.0.1 db.ktebna.tn
```

```shell
docker-compose up -d
```

## TOOLS

### GENERATE JWT RSA KEYS

```shell
php bin/console lexik:jwt:generate-keypair
```

### DOCKER-COMPOSE

```docker-compose up -d``` to start all the services
```docker-compose down``` will stop all the containers
```docker-compose build``` to build any changes
```docker-compose logs -f``` show all services log

### SYMFONY.SH

```./symfony.sh``` open bash inside php container

### ANGULAR.SH

```./angular.sh``` open bash inside node container

### FIXTURES

```shell
php bin/console doctrine:fixtures:load --help
```

## FIXES

### COMPOSER UPDATE MEMORY LIMIT

PHP config limits the memory, if there is any memory problem while using composer update, juste run

```php -d memory_limit=-1 $(which composer) update```

### NO DISK SPACE

```shell
docker image prune -a
```
## EXTRA

### SM5 REST TUTORIALS

- [PART 1 - Create a controller](https://h-benkachoud.medium.com/symfony-rest-api-without-fosrestbundle-and-using-jwt-authentication-part-1-944aa4faf946)
- [PART 2 - JWT Integration](https://h-benkachoud.medium.com/symfony-rest-api-without-fosrestbundle-using-jwt-authentication-part-2-be394d0924dd)