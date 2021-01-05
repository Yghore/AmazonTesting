# AmazonTesting 0.8
## By Yghore#3309
 Web service for manage a product test with amazon

## Configuration 

The configuration file is located in 
```.env and config/*```
After configuration run :
``` 
php artisan migrate:install
php artisan cache:clear
php artisan config:clear
```

## Create new user (for first utilisation)

``` php artisan create_user ```

## FrameWork

> Laravel 7

> Bootstrap 5
