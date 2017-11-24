# Codeigniter Artisan :package:

Makes it easy for you to write webapps and REST APIs with less code.

## Features
- Laravel Helpers
- JWT Authentication (APIs)
- Mailer Library (PHP-Mailer)
- Simplified Request Validation

```php
$this->validate($this->input->post(), [
  'email' => 'required|valid_email|unique,users:email',
  'password' => 'required',
]);

//...

$this->validate($this->input->post(), [
  'user_id' => 'required|exist,users:id'
]);
```

- Push Notififications (Android & IOS)

```php
$this->notification->send($user, [
  'message' => 'Hello John'
]);
```
- Internal Http Requests (Non-Blocking)

```php
$url = base_url() . 'Controller/method';

$this->async->run($run, [
  'name'        => 'Bruce Wayne',
  'super_power' => 'He is Rich',
]);
```

- Templating

```php
$this->data['name'] = "Clark Kent";
return $this->render('view');
```
- Query Logging
- Ajax DataTables

## Getting Started

Its simple :

```bash
$ git clone https://github.com/jagroop/codeigniter-artisan.git
$ cd codeigniter-artisan
$ php -S localhost:8000 # Now visit http://localhost:8000
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
