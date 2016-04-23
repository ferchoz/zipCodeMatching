# Zip Code Matching

In order to run this aplication correctly follow the steps:

1) clone the repository:
```sh
git clone https://github.com/ferchoz/zipCodeMatching.git
```

2) run composer:
> if you do not have composer installed run:
> ```sh
> sudo apt-get install -y curl
> curl -sS https://getcomposer.org/installer | php
> sudo mv composer.phar /usr/local/bin/composer
> ```

enter in the folder of the project:
```sh
cd zipCodeMatching
```
and run composer
```sh
composer install
```
after that, copy the sample enviroment file
```sh
cp .env.example .env
```
now generate a new key with:
```sh
php artisan key:generate
```
modified the database config in:
```sh
vim .env
```

now run the migration:
```sh
php artisan migrate
```

now run:
```sh
php artisan serve
```

and you can surf the site in [http://localhost:8000/](http://localhost:8000/)

Enjoy!!!

##Extra:
in the table "agents" you can add any numbers of agents!

it will work! :rocket:
 
