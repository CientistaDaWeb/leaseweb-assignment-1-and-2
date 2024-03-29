## Leaseweb Fernando Henrique Application to Senior Fullstack Developer

### How to configure and run
- clone the repository
- copy the .env.example to .env
- run `composer install`
- run `vendor/bin/sail up -d`
- connect to the app container
- run `php artisan migrate:fresh --seed`
- access the app at http://localhost:8082

### How to test
- connect to the app container
- run `php artisan test`

### The Assigment Part 1

- The files relatives to this test are: `app/Models/Recipe.php` `app/Models/Ingredient.php`
- The teste relatives to this test is `tests/Models/RecipeTest.php`

### The Assigment Part 2
- I'm facing some CORS issues and can't make the frontend work properly work direct with the API, but the integration tests are working fine to this part.
