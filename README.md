# KTEBNA

## COPYRIGHTS

Most of the docker configs based on a project from github

```https://github.com/nielsvandermolen/example_symfony4_api```

Angular project based on our angular validation project

```https://github.com/taghouti/covid```

## INTRODUCTION

We will use this project to create all the backend part using SM4 api platform / easyadmin, 
frontend based on angular, 
all the services provided as docker images

## LOCAL DEPLOYMENT

### HOSTS

Our application based on 3 domains:

* ktebna.tn: angular application
* backend.ktebna.tn: symfony application
* db.ktebna.tn: phpmyadmin container

All the domains routed using **nginx reverse proxy**

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

### DOCKER-COMPOSE

```docker-compose up -d``` to start all the services
```docker-compose down``` will stop all the containers
```docker-compose build``` to build any changes
```docker-compose logs -f``` show all services log

### SYMFONY.SH

```./symfony.sh``` open bash inside php container

### ANGULAR.SH

```./angular.sh``` open bash inside node container

## FIXES

### COMPOSER UPDATE MEMORY LIMIT

PHP config limits the memory, if there is any memory problem while using composer update, juste run

```php -d memory_limit=-1 $(which composer) update```