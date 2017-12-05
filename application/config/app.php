<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['name']     = env('APP_NAME', 'Codeigniter Artisan');;
$config['base_url'] = env('APP_URL', 'http://localhost:8000/');

/* Mail Configuration */
$config['mailer_host']     = env('MAIL_HOST', 'smtp.gmail.com');
$config['mailer_port']     = env('MAIL_PORT', 465);
$config['mailer_enc']      = env('MAIL_ENCRYPTION', 'tls');
$config['mailer_username'] = env('MAIL_USERNAME', 'foobar@gmail.com');
$config['mailer_password'] = env('MAIL_PASSWORD', '123456');
$config['mailer_from']     = ['address' => env('MAIL_FROM_ADDRESS', 'test@gmail.com'), 'name' => env('MAIL_FROM_NAME', 'Admin')];
