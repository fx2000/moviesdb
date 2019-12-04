# movies-db
SocialYou Technical Test (PHP)

Create a Movies DB app where movies could be added and removed and for each movie we have a title and release year. Store all the data in the DB.

## API:
__/api/addmovie/{title}/{releaseYear}__  
Adds new movie, if movie is already there display an error

__/api/removemovie/{title}__  
Removes movie from the DB, if the movie is not there display an error
  
The project has been developed using the [Lumen Micro-Framework](https://lumen.laravel.com/).  
  
The API is currently deployed in https://moviesdb.appstic.net/api/
  
### Installation:  

- Clone this repository into your server  
- Run 'composer update' to install dependencies
- Rename .env.example to .env and update MySQL information
- Create a database called 'moviesdb'
- Run 'php artisan migrate' to create all necessary tables
- Place public folder in appropriate location and update settings accordingly
- Unit tests are located in the tests folder, run them with 'vendor/bin/phpunit'
  
