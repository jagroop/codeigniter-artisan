# Codeigniter Artisan :package:

Makes it easy for you to write webapps and REST APIs with less code.

## Features
- Laravel Helpers :bulb:

```php
str_random(30);
str_limit($str, 20);
//...
array_only($array, $keys);
//.. check laravel_helper.php for more..
```

- JWT Authentication (APIs) :alien:
![jwt](https://raw.githubusercontent.com/jagroop/codeigniter-artisan/master/screenshots/jwt.png "JWT Authentication")

- Mailer Library (PHP-Mailer) :page_facing_up:

```php
// Email Templates are in /path/to/app/views/emails/
$user = $this->db->get_where('users', ['id' => 123])->row();
$this->mailer->send('email_template', compact('user'))
      ->to('john@gmail.com')
      ->subject('Meeting at 9AM.')
      ->deliver();
```

- Simplified Request Validation :robot:

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

- Push Notififications (Android & IOS) :speech_balloon:

```php
$this->notification->send($user, [
  'message' => 'Hello John'
]);
```
- Internal Http Requests (Non-Blocking) :rocket:

```php
$url = base_url() . 'Controller/method';

$this->async->run($url, [
  'name'        => 'Bruce Wayne',
  'super_power' => 'He is Rich',
]);
```

- Templating :bookmark:

```php
$this->data['name'] = "Clark Kent";
return $this->render('view');
```
- Query Logging :memo:
![query logs](https://raw.githubusercontent.com/jagroop/codeigniter-artisan/master/screenshots/query_log.png "Query logs")

- Ajax DataTables as a service :tada:
![data tables](https://raw.githubusercontent.com/jagroop/codeigniter-artisan/master/screenshots/datatables.png "Ajax DataTables")

## Getting Started

Its simple :

```bash
$ git clone https://github.com/jagroop/codeigniter-artisan.git
$ mv application/.env.example application/.env
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
