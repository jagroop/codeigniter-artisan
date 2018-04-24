<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$config['ENABLE_JWT']            = true;

$config['JWT_KEY']               = "4JCum2S253JqZ336ZAJbn6TT";

$config['JWT_ENC_KEY']           = 'sec!ReT423TrexzillaGod*&';

$config['JWT_EXPIRE']            = carbon()->now()->addMonth()->toDateTimeString();

$config['JWT_SAFE_METHODS']      = ['register', 'login'];

$config['JWT_INVALIDATE_TOKENS'] = true;
