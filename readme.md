# Codeigniter Artisan :package:

Makes it easy for you to write webapps and REST APIs with less code.

## Features
- Templating :bookmark:
- Query Logging :memo:
- Laravel Helpers :bulb:
- JWT Authentication (APIs) :alien:
- Ajax DataTables as a service :tada:
- Simplified Request Validation :robot:
- Mailer Library (PHP-Mailer) :page_facing_up:
- Internal Http Requests (Non-Blocking) :rocket:
- Push Notififications (Android & IOS) :speech_balloon:

Check snippets for above features [here](https://github.com/jagroop/codeigniter-artisan/blob/master/snippets.md)

## Getting Started

Its simple :

```bash
$ git clone https://github.com/jagroop/codeigniter-artisan.git project-name
$ cd project-name
$ cp application/.env.example application/.env
$ touch application/logs/logs.log && chmod 777 application/logs/logs.log
```
 - Change configuration in __application/.env__
 - Import the DB __database.sql__

```bash
$ php -S localhost:8000 # Now visit http://localhost:8000
```
#### Admin Panel
> http://localhost:8000/admin

Login Details:
```
admin@admin.com
admin
```
### Prerequisites

PHP >= 5.3


## Built With

* [Codeigniter 3.1.5](https://codeigniter.com/) - The web framework used

## Contributing

Fork this repository, make changes and open a pull request.
 

## Authors

* **Jagroop Singh** - *Initial work* - [jagroop](https://github.com/jagroop)

## License

This project is licensed under the MIT License.

## Acknowledgments

* [Codeigniter](https://codeigniter.com)

## Screenshots

![Dasboard](https://github.com/jagroop/codeigniter-artisan/blob/master/docs/screenshots/dashboard.png)
![Customers](https://github.com/jagroop/codeigniter-artisan/blob/master/docs/screenshots/customers.png)
![Logs](https://github.com/jagroop/codeigniter-artisan/blob/master/docs/screenshots/query_logs.png)
