# SYMFONY 4 API PLATFORM DOCKER PROJECT

## COPYRIGHTS

This project based on dokcer image deployed on github

```https://github.com/nielsvandermolen/example_symfony4_api```

## INTRO 

We will use this project to create all the backend part using SM4 api platform and docker

## FIXES

### COMPOSER UPDATE MEMORY LIMIT

PHP config limits the memory, if there is any memory problem while using composer update, juste run 

```php -d memory_limit=-1 $(which composer) update```
