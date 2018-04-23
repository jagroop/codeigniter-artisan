<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$config['ENABLE_JWT']  = false;

$config['JWT_KEY']     = "59ba36addc2";

$config['JWT_ENC_KEY'] = 'sec!ReT423TrexzillaGod*&';

$config['JWT_EXPIRE']  = carbon()->now()->addMonth()->toDateTimeString();
