[Go Back](https://github.com/jagroop/codeigniter-artisan)

## Laravel Helpers :bulb:

```php
str_random(30);
str_limit($str, 20);
//...
array_only($array, $keys);
//.. check laravel_helper.php for more..
```

## Mailer Library (PHP-Mailer) :page_facing_up:

```php
// Email Templates are in /path/to/app/views/emails/
$user = $this->db->get_where('users', ['id' => 123])->row();
$this->mailer->send('email_template', compact('user'))
      ->to('john@gmail.com')
      ->subject('Meeting at 9AM.')
      ->deliver();
```

## Simplified Request Validation :robot:

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

## Push Notififications (Android & IOS) :speech_balloon:

```php
$this->notification->send($user, [
  'message' => 'Hello John'
]);
```
## Internal Http Requests (Non-Blocking) :rocket:

```php
$url = base_url() . 'Controller/method';

$this->async->run($url, [
  'name'        => 'Bruce Wayne',
  'super_power' => 'He is Rich',
]);
```

## Templating :bookmark:

```php
$this->data['name'] = "Clark Kent";
return $this->render('view');
```
