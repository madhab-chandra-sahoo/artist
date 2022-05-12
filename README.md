# Artist API's
Artist APIs in laravel
- Download the code open command prompt & run 'composer install' in command prompt
```bash
composer install
```
- update the .env file with your database details
- then run 'php artisan migrate'
```bash
php artisan migrate
```
- after successful migration run 'php artisan serve'
```bash
php artisan serve
```
- import the postman collection & update variables as required

### Get Artists List By Likes In Descending Order
> `http://localhost:8000/api/artists` method `GET`

### Create Artist
> `http://localhost:8000/api/artists` method `POST`
```
Request
{
	"name": "Test Artist",
	"email": "testmail@yopmail.com",
	"mobile": "8596748596",
	"brand_name": "Rock Band",
	"genre": "Rock",
	"location": "Hyd"
}
```

### Get Artist Details By ID
> `http://localhost:8000/api/artists/1` method `GET`

### Update Artist
> `http://localhost:8000/api/artists` method `PUT`
```
Request
{
	"name": "Test Artist",
	"email": "testmail@yopmail.com",
	"mobile": "8596748596",
	"brand_name": "Rock Band",
	"genre": "Rock",
	"location": "Hyd"
}
```

### Like Artist
> `http://localhost:8000/api/artists/like/1` method `GET`

### Dislike Artist
> `http://localhost:8000/api/artists/dislike/1` method `GET`

