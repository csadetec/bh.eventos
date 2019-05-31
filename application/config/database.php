<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if($_SERVER['SERVER_NAME'] == 'lucas-app.atwebpages.com'):
	$active_group = 'eohost';
else:
	$active_group = 'default';
endif;
$query_builder = TRUE;

$db['default'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost',
	'username' => 'server',
	'password' => 'server',
	'database' => 'bh_eventos',
	'dbdriver' => 'mysqli',
	'dbprefix' => 'eventos_',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);

$db['eohost'] = array(
	'dsn'	=> '',
	'hostname' => 'fdb4.eohost.com',
	'username' => '1909344_lucas',
	'password' => 'eohost@7c8',
	'database' => '1909344_lucas',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);

