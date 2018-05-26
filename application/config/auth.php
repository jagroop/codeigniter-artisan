<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$config['jwt'] = [
  'enable' => env('JWT_ENABLE', false),
  'issuer' => $_SERVER['REMOTE_ADDR'],
  'safe_methods' => ['register', 'login'],
  'invalidate' => env('JWT_INIVALIDATE', false),
  'secret' => env('JWT_SECRET', 'sec!ReT423TrexzillaGod*&'),
  'expire' => carbon()->now()->addMinutes(59)->toDateTimeString(),
];
