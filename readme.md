## RSS Reader

This is a RSS Reader based on Laravel 5.6 offering the following features:
- Registration
- My RSS, lists all user added RSS.
- My RSS Reader, reads a specific user RSS based on a defined url.

## Install

Clone Repository

```
git clone https://github.com/AdrianHL/rss-reader.git
```

Access Project path

```
cd rss-reader
```

Install Dependencies

```
composer install
```

Copy `.env` file

```
cp .env.example .env
```

Create a sqlite (empty) file for storing the database (other driver requires additional set up); by default it has to be create in the following relative path `database\database.sqlite`.

Then run migrations

```
php artisan migrate
```

Then serve the project

```
php artisan serve
```

Which output a URL as follows

```
Laravel development server started: <http://127.0.0.1:8000>
[Wed Oct 14 00:44:54 2020] PHP 7.4.11 Development Server (http://127.0.0.1:8000) started
```

Then Navigate to that URL, register as a user and start playing.

Please note there is an existing issue with the redirect after register which leads to a 404 page (http://127.0.0.1:8000/home); please visit http://127.0.0.1:8000/ manually if that happens.

## Tests

Run the following command in order to run the tests 

```
vendor/bin/phpunit
```

## ToDos

This is an incomplete project and the following actions are in the ToDo list:

- Fix the after registration bug.
- Paginate My RSS list.
- Include some feature for finding a specific RSS.
- Include a separate class (repository or service) to handle the RSS read and return a controller resource (e.g. a RSS View Object) to the RSS Viewer.
- Evaluate Security, specially taking into account that this project is using Laravel 5.6 and other libraries (such as Bootstrap 3) which are out of maintenance and have different known issues.
- Increase test coverage.
- Finish ToDos in code.
- Code tidy up, linter, prettier... 

## Security Vulnerabilities

If you discover a security vulnerability within RSS Reader, please leave a issue in the repository. All security vulnerabilities will be promptly addressed.

## License

RSS Reader is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
