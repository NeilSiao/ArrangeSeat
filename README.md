# ArrangeSeat
This is use to arrange seat for students, after every exam, lots of teacher will switch students seat. 

## Setting up
```
// donwload project 
git clone https://github.com/NeilSiao/ArrangeSeat.git

cd ./ArrangeSeat

// use laravel sail docker image

./vendor/bin/sail up

./vendor/bin/sail shell

composer install && npm install 

php artisan key:generate

php artisan migrate && php artisan db:seed

//done!! 
//visit it by accessing http://localhost

```
> db:seed will create a default account

> account: test@test.com
> password: 12345678



